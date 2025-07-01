<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;

class ArtikelController extends Controller
{
    public function index()
{
    $artikelDB = Artikel::all();

    $pageId = config('services.facebook.page_id');
    $accessToken = config('services.facebook.access_token');

    $fbPosts = [];
    $response = Http::get("https://graph.facebook.com/{$pageId}/posts", [
        'access_token' => $accessToken,
        'fields' => 'id,message,created_time,full_picture,permalink_url'
    ]);

    if ($response->successful()) {
        $fbRaw = $response->json('data');
        foreach ($fbRaw as $post) {
            $fbPosts[] = [
                'judul' => Str::limit($post['message'] ?? 'FB - Tanpa Judul', 30),
                'jurnalis' => 'Facebook Page',
                'deskripsi' => $post['message'] ?? '-',
                'tanggal_terbit' => \Carbon\Carbon::parse($post['created_time'])->format('Y'),
                'gambar' => $post['full_picture'] ?? null,
                'is_facebook' => true,
                'id_facebook' => $post['id'] ?? null,
                'link' => $post['permalink_url'] ?? null,
            ];
        }
    }

    // Mapping artikel dari DB supaya mirip struktur dengan FB post
    $artikelLocal = $artikelDB->map(function ($a) {
        return [
            'judul' => $a->judul,
            'jurnalis' => $a->jurnalis,
            'deskripsi' => $a->deskripsi,
            'tanggal_terbit' => $a->tanggal_terbit,
            'gambar' => $a->gambar ? asset('storage/' . $a->gambar) : null,
            'is_facebook' => false,
            'id' => $a->id,
        ];
    });

    // Gabungkan
    $artikelGabung = $fbPosts + $artikelLocal->toArray();

    return view('artikel.index', ['artikelGabung' => $artikelGabung]);
}


    private function simpanGambarDariUrl($url)
    {
        if (!$url) return null;

        try {
            $contents = file_get_contents($url);
            $namaFile = 'artikel/' . uniqid() . '.jpg';
            \Storage::disk('public')->put($namaFile, $contents);
            return $namaFile;
        } catch (\Exception $e) {
            return null;
        }
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|min:3',
            'jurnalis' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'tanggal_terbit' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = $gambar;
        }

        $artikel = Artikel::create($data);

        \Log::info("PAGE_ID: " . config('services.facebook.page_id'));
        \Log::info("ACCESS_TOKEN: " . \Illuminate\Support\Str::limit(config('services.facebook.access_token'), 20));

        $this->postToFacebook($artikel);

        return redirect()->route('artikel.index')->with('success', 'Artikel Berhasil Ditambahkan');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($artikel->gambar && \Storage::exists($artikel->gambar)) {
            \Storage::delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function edit($id)
    {
        $artikelDetail = Artikel::findOrFail($id);
        $artikel = Artikel::all();

        return view('artikel.index', compact('artikel', 'artikelDetail'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $data = $request->validate([
            'judul' => 'required|min:3',
            'jurnalis' => 'required|min:3',
            'deskripsi' => 'required|min:3',
            'tanggal_terbit' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($artikel->gambar && file_exists(public_path('storage/' . $artikel->gambar))) {
                unlink(public_path('storage/' . $artikel->gambar));
            }

            $gambar = $request->file('gambar')->store('gambar', 'public');
            $data['gambar'] = $gambar;
        }

        $artikel->update($data);

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil diperbarui');
    }

    public function fetchFacebookPosts()
    {
        $pageId = config('services.facebook.page_id');
        $accessToken = config('services.facebook.access_token');

        $response = Http::get("https://graph.facebook.com/{$pageId}/posts", [
            'access_token' => $accessToken,
            'fields' => 'id,message,created_time,full_picture,permalink_url'
        ]);

        if ($response->failed()) {
            \Log::error("Gagal mengambil postingan Facebook: " . $response->body());
            return back()->with('error', 'Gagal mengambil data dari Facebook');
        }

        $posts = $response->json('data');

        return view('admin.facebook_posts', compact('posts'));
    }

    public function deleteFacebookPost($postId)
    {
        $accessToken = config('services.facebook.access_token');
        $response = Http::delete("https://graph.facebook.com/{$postId}", [
            'access_token' => $accessToken,
        ]);

        return redirect()->back()->with('success', 'Post berhasil dihapus dari Facebook.');
    }

    public function updateFacebookPost(Request $request, $postId)
    {
        $accessToken = config('services.facebook.access_token');
        $response = Http::post("https://graph.facebook.com/{$postId}", [
            'access_token' => $accessToken,
            'message' => $request->caption,
        ]);

        return redirect()->back()->with('success', 'Post berhasil diperbarui.');
    }

    private function postToFacebook($artikel)
    {
        $pageAccessToken = config('services.facebook.access_token');
        $pageId = config('services.facebook.page_id');

        if (!$pageAccessToken || !$pageId || $pageId == '0') {
            \Log::error("FB_PAGE_ID atau FB_PAGE_ACCESS_TOKEN belum terbaca");
            return;
        }

        $gambarPath = public_path('storage/' . $artikel->gambar);
        if (!$artikel->gambar || !file_exists($gambarPath)) {
            \Log::error("Gambar tidak ditemukan di path: " . $gambarPath);
            return;
        }

        $photo = new \CURLFile($gambarPath, mime_content_type($gambarPath), basename($gambarPath));

        $data = [
            'access_token' => $pageAccessToken,
            'source' => $photo,
            'caption' => $artikel->judul . "\n\n" . $artikel->deskripsi,
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/{$pageId}/photos");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            \Log::error('Facebook Post Error: ' . curl_error($ch));
        } else {
            \Log::info('Facebook Post Response: ' . $response);
        }

        curl_close($ch);
    }
    public function editFacebookPost($id)
{
    $accessToken = config('services.facebook.access_token');

    $response = Http::get("https://graph.facebook.com/{$id}", [
        'access_token' => $accessToken,
        'fields' => 'id,message,full_picture,created_time'
    ]);

    if ($response->failed()) {
        \Log::error("Gagal mengambil data Facebook Post ID {$id}");
        return back()->with('error', 'Gagal mengambil postingan Facebook.');
    }

    $fbPost = $response->json();

    return view('admin.edit_facebook', compact('fbPost'));
}

}
