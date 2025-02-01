<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Gate::authorize('modify', $request->user()->posts());


        $fields = request()->validate([
            'title' => "required|max:255",
            'body' => "required"
        ]);


        $post = $request->user()->posts()->create($fields);

        return $post;
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $post;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        // Gate::authorize('modify', $post);

        $fields = request()->validate([
            'title' => "required|max:255",
            'body' => "required"
        ]);


        $post->update($fields);

        return $post;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        // Gate::authorize('modify', $post);

        $post->delete();

        return [ "message" => "The post was deleted" ];
    }
}
