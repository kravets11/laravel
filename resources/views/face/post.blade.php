@extends('master')

@section('title', 'Пост ' . $post->title)

@section('content')
	{{ $post->title }}
	<br>
	{!! $post->body !!}
	<div class="author">Author is: <a href="{!! route('author', $post->author->slug) !!}"> {!! $post->author->firstname !!} {!! $post->author->lastname !!}</a></div>
@endsection