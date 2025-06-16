<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Artikel;

class SyncFacebookPosts extends Command
{
    protected $signature = 'sync:facebook-posts';
    protected $description = 'Ambil postingan dari Facebook Page ke database Laravel';

    public function handle()
    {
        $pageId = 'ID_HALAMAN_FACEBOOK';
        $accessToken = 'TOKEN_HALAMAN_FACEBOOK';
        $response = Http::get("https://graph.facebook.com/{$pageId}/posts", [
            'access_token' => $accessToken,
            'fields' => 'message,created_time,full_picture,id',
        ]);

        $posts = $response->json()['data'] ?? [];

        foreach ($posts as $post) {
            if (!Artikel::where('facebook_post_id', $post['id'])->exists()) {
                Artikel::create([
                    'judul' => Str::limit($post['message'], 100),
                    'deskripsi' => $post['message'],
                    'tanggal_terbit' => $post['created_time'],
                    'gambar' => $post['full_picture'] ?? null,
                    'facebook_post_id' => $post['id']
                ]);
            }
        }

        $this->info('Sinkronisasi selesai.');
    }
}

