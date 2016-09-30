@extends('app')

@section('content')
   
<a href="{!! $url = route('posts') !!}"> published </a> &nbsp; &nbsp; &nbsp; <a href="{!! $url = route('posts.unpublished') !!}"> unpublished </a>﻿ &nbsp; &nbsp; &nbsp; <a href="{!! $url = route('post.create') !!}"> new </a>﻿
 

    @foreach($posts as $post)
        <article>
            <h2>{{ $post->title }}</h2>
            <p>
                {!! $post->excerpt !!}
            </p>
            <p>
                published: {{ $post->published_at  }}
            </p>
        </article>
    @endforeach
@stop