@extends('layouts.main')
@section('content')

   {{-- Create title --}}
   <h1 class="my-3 text-success text-center">Create new post</h1>

   {{-- Alert message in case of error --}}
   @if ($errors->any())
   <div class="alert alert-danger">
      <ul>
         @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
         @endforeach
      </ul>
   </div>
   @endif

   {{-- Create post --}}
   <form action="{{ route('posts.store') }}" method="POST">
   @csrf
   @method('POST')

      <div class="form-group">
         <label for="title">Title</label>
         <input class="form-control mb-3" type="text" value="{{ old('title') }}" name="title" id="title">

         <label for="body">Body</label>
         <textarea class="form-control" type="text" name="body" id="body">{{ old('body') }}</textarea>
      </div>

      @foreach ($tags as $tag)
      <div class="form-check">
         <input class="form-check-input" type="checkbox" name="tags[]" id="tag-{{ $loop->iteration }}" value="{{ $tag->id }}">
         <label for="tag-{{ $loop->iteration }}">{{ $tag->name }}</label>
      </div>
      @endforeach

      <input class="mt-4 btn btn-primary" type="submit" value="Create post">
   </form>

@endsection