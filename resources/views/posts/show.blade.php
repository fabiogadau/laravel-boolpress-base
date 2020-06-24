@extends('layouts.main')
@section('content')

   {{-- Post title --}}
   <h1 class="my-3 text-success text-center">{{ $post->title }}</h1>

   {{-- Post body --}}
   <p class="mb-2 p-3 rounded bg-primary text-light">{{ $post->body }}</p>

   {{-- Post tags --}}
   <div class="mb-3">
      <h5>Tags</h5>

      @forelse ( $post->tags as $tag )
      <span class="badge badge-pill badge-primary">{{ $tag->name }}</span>
      @empty
      <p>No tags for this post</p>
      @endforelse
   </div>

   {{-- Post options --}}
   <div class="post-options mb-4 d-flex justify-content-between">
      {{-- Edit post --}}
      <a class="btn btn-success" href="{{ route('posts.edit', $post->id) }}">Edit post</a>

      {{-- Delete post --}}
      <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
      @csrf
      @method('DELETE')
         <input class="btn btn-danger" type="submit" value="Delete post">
      </form>
   </div>

   {{-- Post comments --}}
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

@endsection