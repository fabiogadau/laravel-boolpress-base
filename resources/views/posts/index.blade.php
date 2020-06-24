@extends('layouts.main')
@section('content')

   {{-- Blog index title --}}
   <h1 class="my-3 text-success text-center">Blog Archive</h1>

   {{-- Message of successfully deleted post --}}
   @if (session('post-deleted'))
   <div class="alert alert-success">
      <p>Post successfully deleted:</p>
      {{ session('post-deleted') }}
   </div>
   @endif

   {{-- Users posts --}}
   <div class="mb-4 p-3 rounded bg-primary text-light">
      @foreach($posts as $post)
      <article>
         <h2>{{ $post->title }}</h2>
         <h3 class="author">Author: {{ $post->user->name }}</h3>
         <h5>Created: {{ $post->created_at }}, Last update: {{ $post->updated_at }}</h5>
         <p>{{ \Illuminate\Support\Str::limit($post->body, 300, '...') }}</p>
         <a class="my-2 btn btn-info" href="{{ route('posts.show', $post->slug) }}">Read more</a>
      </article>

      @if (!$loop->last)
      <hr>
      @endif
      @endforeach
   </div>

   {{-- Navigation --}}
   <div class="navigation mb-3 d-flex justify-content-center">
      {{ $posts->links() }}
   </div>

@endsection