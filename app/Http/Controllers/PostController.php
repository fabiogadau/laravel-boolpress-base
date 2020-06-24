<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Paginate
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();

        return view('posts.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Store validation
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:3000',
            'tags.*' => 'exists:tags,id'
        ]);

        $data = $request->all();

        // Get actual user
        $data['user_id'] = 1;

        // Create slug by getting title of actual written post
        $data['slug'] = Str::slug($data['title'], '-');

        /* Create new post from actual written post data */
        // Post instance
        $newPost = new Post();
        
        // Post filling
        $newPost->fill($data);
        
        // Post saving
        $saved = $newPost->save();

        if ($saved){
            // If not empty attach relative tags
            if (!empty($data['tags'])){
                $newPost->tags()->attach($data['tags']);
            }

            return redirect()->route('posts.show', $newPost->slug);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if (empty($post)) {
            abort('404');
        }

        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $tags = Tag::all();
        return view('posts.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // Update validation
        $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:3000',
            'tags.*' => 'exists:tags,id'
        ]);

        $data = $request->all();

        $updated = $post->update($data);

        if ($updated){
            if (!empty($data['tags'])){
                $post->tags()->sync($data['tags']);
            }
            else {
                $post->tags()->detach();
            }

            return redirect()->route('posts.show', $post->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (empty($post)){
            abort('404');
        }

        $title = $post->title;

        $post->tags()->detach();
        $deleted = $post->delete();

        if ($deleted){
            return redirect()->route('posts.index')->with('post-deleted', $title);
        }
    }
}
