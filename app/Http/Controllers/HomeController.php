<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController
{
    public function __invoke()
    {
        $twitchLink = 'https://id.twitch.tv/oauth2/authorize';
        $parameters = [
            'client_id' => env('OAUTH_TWITCH_CLIENT_ID'),
            'redirect_uri' => env('OAUTH_TWITCH_REDIRECT_URI'),
            'response_type'=> 'code',
            'scope'=>'user:read:email',
        ];

        $twitchLink .= '?' . http_build_query($parameters);

//        dd($twitchLink);
//        exit;


        $posts = Post::with(['user', 'category', 'tags'])->paginate(15);

        return view('pages.posts', compact('posts', 'twitchLink'));
    }
}
