<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacebookController extends Controller
{
    public function postPhoto()
    {
        $pageAccessToken = 'TOKEN_KAMU';
        $pageId = 'PAGE_ID_KAMU';
        $imagePath = public_path('image.jpg');

        if (!file_exists($imagePath)) {
            return "Gambar tidak ditemukan.";
        }

        $photo = new \CURLFile($imagePath, mime_content_type($imagePath), basename($imagePath));
        $data = [
            'access_token' => $pageAccessToken,
            'source' => $photo,
            'caption' => 'Foto dari Laravel',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/$pageId/photos");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        curl_close($ch);

        return $err ?: $response;
    }
}
