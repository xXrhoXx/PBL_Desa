<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportFacebookPosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-facebook-posts';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    
    public function handle()
    {
    $pageId = 'YOUR_PAGE_ID';
    $accessToken = 'YOUR_PAGE_ACCESS_TOKEN';

    $response = Http::get("https://graph.facebook.com/v18.0/$pageId/posts", [
        'access_token' => $accessToken,
        'fields' => 'message,created_time,attachments{media,url}'
    ]);

    foreach ($response['data'] as $post) {
        $judul = Str::limit($post['message'] ?? 'Tanpa Judul', 50);
        $deskripsi = $post['message'] ?? 'Tidak ada isi';
        $tanggal = date('Ymd', strtotime($post['created_time']));
        $gambarUrl = $post['attachments']['data'][0]['media']['image']['src'] ?? null;

        $exists = Artikel::where('deskripsi', $deskripsi)->exists();
        if (!$exists) {
            $filename = null;
            if ($gambarUrl) {
                $img = file_get_contents($gambarUrl);
                $filename = uniqid() . '.jpg';
                file_put_contents(public_path('storage/gambar/' . $filename), $img);
            }

            Artikel::create([
                'judul' => $judul,
                'jurnalis' => 'Facebook Page',
                'deskripsi' => $deskripsi,
                'tanggal_terbit' => $tanggal,
                'gambar' => $filename
            ]);
        }
    }

    $this->info('Import dari Facebook selesai.');
}
    }

