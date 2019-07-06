@extends('master')

@section('title', 'Посты автора ' . $author->firstname . ' ' . $author->lastname)

@section('content')
    @foreach($author->posts as $post)
        <a href="{{ route('post', [$post->category->slug, $post->slug]) }}">
            {{ $post->title }}
        </a>
    @endforeach
@endsection