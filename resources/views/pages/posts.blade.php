@extends('layout')

@section('content')
<p>
    <a href="{{ $twitchLink }}">Twitch Auth</a>
</p>

    @foreach($posts as $post)
    @include('partials.post', ['post' => $post])
        @endforeach

@endsection
