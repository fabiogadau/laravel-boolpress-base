@extends('layouts.main')
@section('content')

   <h1 class="my-3 text-success text-center">Welcome to Laravel Blog</h1>

   {{-- User details --}}
   @foreach ($users as $user)
   <div class="user p-3 rounded bg-primary text-light">
      <h2>{{ $user->name }}</h2>
      <img src="{{ $user->info['avatar'] }}" alt="{{ $user->name }}">
      <h5>Email address: {{ $user->email }}</h5>
      <h5>Phone number: {{ $user->info['phone'] }}</h5>

      {{-- User posts --}}
      <h3 class="mt-5 text-center">Posts</h3>
      <ul class="list-group text-dark">
         @foreach ($user->posts as $post)
            <li class="list-group-item">
               <h4>
                  {{  $post->title }}
               </h4>
               <p>
                  {{  $post->body }}
               </p>
            </li>
         @endforeach
      </ul>
   </div>
   
      @if (!$loop->last)
      <hr>
      @endif
   @endforeach

@endsection