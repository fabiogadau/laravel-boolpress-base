@extends('layouts.main')
@section('content')

   <h1>Blog Archive</h1>

   {{-- Users posts --}}
   @foreach($posts as $post)
   <article>
      <h2>{{ $post->title }}</h2>
      <h3 class="author">Autore: {{ $post->user->name }}</hh3>
      <h4>Created: {{ $post->created_at }}, Last update: {{ $post->updated_at }}</h4>
      <p>{{ $post->body }}</p>
   </article>

   @if (!$loop->last)
   <hr>
   @endif

   <h3>Comments</h3>
   @forelse ($post->comments as $comment)
   <h4><strong>"{{ $comment->title }}"</strong> by {{ $comment->name }}</h4>
   <p>{{ $comment->body }}</p>
   @if (!$loop->last)
   <hr>
   @endif
   @empty
   <p>No comments yet.</p>
   @endforelse
   @endforeach

   <h4>Navigation</h4>
   {{ $posts->links() }}

@endsection