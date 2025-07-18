<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\PerangkatDesa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Produk;



class DesaController extends Controller
{
public function home()
    {
        $response = Http::get('http://127.0.0.1:8000/api/produk-user');
        $produk = json_decode(json_encode($response->json())); // fix array jadi object
        $perangkat = PerangkatDesa::all();
        //dd($response->json());
        return view('home', compact('produk', 'perangkat'));
    }


public function berita(Request $request)
{
    $search = $request->search;

    // Artikel dari database
    $query = \App\Models\Artikel::query();
    if ($search) {
        $query->where('judul', 'like', '%' . $search . '%');
    }

    $artikelDB = $query->get()->map(function ($a) {
        return [
            'judul' => $a->judul,
            'jurnalis' => $a->jurnalis,
            'deskripsi' => $a->deskripsi,
            'tanggal_terbit' => $a->tanggal_terbit,
            'gambar' => $a->gambar ? asset('storage/' . $a->gambar) : null,
            'is_facebook' => false,
        ];
    });

    // Artikel dari Facebook
    $fbPosts = [];
    $pageId = config('services.facebook.page_id');
    $accessToken = config('services.facebook.access_token');

    $response = Http::get("https://graph.facebook.com/{$pageId}/posts", [
        'access_token' => $accessToken,
        'fields' => 'id,message,created_time,full_picture,permalink_url'
    ]);

    if ($response->successful()) {
        foreach ($response->json('data') as $post) {
            if ($search && !Str::contains(Str::lower($post['message'] ?? ''), Str::lower($search))) {
                continue;
            }

            $fbPosts[] = [
                'judul' => Str::limit($post['message'] ?? 'Tanpa Judul', 30),
                'jurnalis' => 'Facebook Page',
                'deskripsi' => $post['message'] ?? '-',
                'tanggal_terbit' => \Carbon\Carbon::parse($post['created_time'])->format('Y'),
                'gambar' => $post['full_picture'] ?? null,
                'is_facebook' => true,
            ];
        }
    }

    // Gabungkan dan sort berdasarkan tahun terbit
    $gabungan = collect($fbPosts)->merge($artikelDB)->sortByDesc('tanggal_terbit')->values();

    // Manual paginate
    $perPage = 9;
    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $currentItems = $gabungan->slice(($currentPage - 1) * $perPage, $perPage)->all();
    $paginated = new LengthAwarePaginator($currentItems, $gabungan->count(), $perPage, $currentPage, [
        'path' => $request->url(),
        'query' => $request->query()
    ]);

    return view('user/berita_user', ['artikel' => $paginated]);
}

    public function produk()
    {
        $response = Http::get('http://127.0.0.1:8000/api/produk-user');
        $produk = json_decode(json_encode($response->json())); // fix array jadi object

        return view('produk', compact('produk'));
    }

    public function informasi()
{
    $perangkat = PerangkatDesa::all();
    return view('informasi', compact('perangkat'));
}

    // Tampilkan form login
    // public function showLoginForm()
    // {
    //     return view('login');
    // }
    public function Login()
    {
        return view('login');
    }



    // Logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }


// Tampilkan semua perangkat desa
public function perangkatIndex()
{
    $perangkat = PerangkatDesa::all();
    return view('admin.perangkat', compact('perangkat'));
}

// Simpan perangkat desa baru
public function perangkatStore(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'kontak' => 'required',
        'foto' => 'required|image|max:2048',
    ]);

    $fotoPath = $request->file('foto')->store('perangkat', 'public');

    PerangkatDesa::create([
        'nama' => $request->nama,
        'jabatan' => $request->jabatan,
        'kontak' => $request->kontak,
        'foto' => $fotoPath,
    ]);

    return redirect()->back()->with('success', 'Perangkat berhasil ditambahkan');
}


// Hapus perangkat desa
public function perangkatDestroy($id)
{
    $perangkat = PerangkatDesa::findOrFail($id);

    // Hapus file foto dari storage (opsional)
    if ($perangkat->foto && \Storage::disk('public')->exists($perangkat->foto)) {
        \Storage::disk('public')->delete($perangkat->foto);
    }

    $perangkat->delete();

    return redirect()->back()->with('success', 'Perangkat berhasil dihapus');
}
public function perangkatUpdate(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jabatan' => 'required',
        'kontak' => 'required',
        'foto' => 'nullable|image|max:2048',
    ]);

    $perangkat = PerangkatDesa::findOrFail($id);

    $perangkat->nama = $request->nama;
    $perangkat->jabatan = $request->jabatan;
    $perangkat->kontak = $request->kontak;

    if ($request->hasFile('foto')) {
        // Hapus foto lama jika ada
        if ($perangkat->foto && \Storage::disk('public')->exists($perangkat->foto)) {
            \Storage::disk('public')->delete($perangkat->foto);
        }

        // Simpan foto baru
        $fotoBaru = $request->file('foto')->store('perangkat', 'public');
        $perangkat->foto = $fotoBaru;
    }

    $perangkat->save();

    return redirect()->back()->with('success', 'Data perangkat berhasil diperbarui');
}


}
