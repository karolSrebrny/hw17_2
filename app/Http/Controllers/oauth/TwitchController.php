<?php


namespace App\Http\Controllers\oauth;


use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class TwitchController
{
    public function __invoke()

    {
        $link = 'https://id.twitch.tv/oauth2/token';
        $parameters = [
            'client_id' => env('OAUTH_TWITCH_CLIENT_ID'),
            'client_secret' => env('OAUTH_TWITCH_CLIENT_SECRET'),
            'code' => request() ->get('code'),
            'grant_type' => 'authorization_code',
            'redirect_uri' => env('OAUTH_TWITCH_REDIRECT_URI'),
        ];
        $link .= '?' . http_build_query($parameters);
        $response = Http::post($link);
        $data = [];
        parse_str($response->body(), $data);
//        dd($data);
//        exit;

        $response = Http::withHeaders(['Authorization' => 'Bearer' . $data['access_token']])
            ->get('https://api.twitch.tv/helix/');

        dd($response->body());


























//
//        $userInfo = $response->json();
//
//        $response = Http::withHeaders(['Authorization'=> 'token ' . $data['access_token']])
//            ->get('https://api.github.com/user/emails');
//
//        $userEmails = $response->json();
//        $email = $userEmails[0]['email'];

//        if (null == ($user = User::where('email', $email)->first())){
//            $data = [
//                'name' => $userInfo['name'],
//                'email' => $email,
//                'password' => Hash::make($userInfo['node_id']),
//
//            ];
//
//            $user = User::create($data);
//        }
//        Auth::login($user);
//        return redirect()->route('home')->with('success', 'Message');
    }
}
















































//
//        $response = Http::withHeaders(['Authorization'=> 'token ' . $data['access_token']])
//            ->get('https://api.github.com/user');
//
//        $userInfo = $response->json();
//
//        $response = Http::withHeaders(['Authorization'=> 'token ' . $data['access_token']])
//            ->get('https://api.github.com/user/emails');
//
//        $userEmails = $response->json();
//        $email = $userEmails[0]['email'];
//
//        if (null == ($user = User::where('email', $email)->first())){
//            $data = [
//                'name' => $userInfo['name'],
//                'email' => $email,
//                'password' => Hash::make($userInfo['node_id']),
//
//            ];
//
//            $user = User::create($data);
//        }
//        Auth::login($user);
//        return redirect()->route('home')->with('success', 'Message');
//    }
//}
