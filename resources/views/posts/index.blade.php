@extends('layouts.main')
@section('content')

   <h1 class="my-3 text-success text-center">Blog Archive</h1>

   {{-- Users posts --}}
   <div class="mb-3 p-3 rounded bg-primary text-light">
      @foreach($posts as $post)
      <article>
         <h2>{{ $post->title }}</h2>
         <h3 class="author">Author: {{ $post->user->name }}</hh3>
         <h4>Created: {{ $post->created_at }}, Last update: {{ $post->updated_at }}</h4>
         <p>{{ $post->body }}</p>
      </article>

      @if (!$loop->last)
      <hr>
      @endif
      </div>
      <div class="mb-5 p-3 rounded bg-info">
         <h3>Comments</h3>
         @forelse ($post->comments as $comment)
         <span><strong>"{{ $comment->title }}"</strong> by {{ $comment->name }}</span>
         <p>{{ $comment->body }}</p>
         <p>Created: {{ $comment->created_at }}, Last update: {{ $comment->updated_at }}</p>
         @if (!$loop->last)
         <hr>
         @endif
         @empty
         <p>No comments yet.</p>
         @endforelse
      </div>
      @endforeach

   {{-- Navigation --}}
   {{ $posts->links() }}

@endsection