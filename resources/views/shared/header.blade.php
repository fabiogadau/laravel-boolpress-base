<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Blog</title>
</head>
<body>
    
   <header>
        <div class="navbar">
            <h2 class="nav-brand">Laravel Blog</h2>

            <ul class="navbar-list">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('users.index') }}">Users</a></li>
                <li><a href="{{ route('posts.index') }}">Blog archive</a></li>
            </ul>
        </div>
    </header>