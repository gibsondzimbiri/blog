<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    //show all posts
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(5)
        ]);
    }

    //edit posts
    public function edit(Post $post)
    {
        return view('admin.posts.edit', [
            'posts' => $post
        ]);
    }

    //update a post
    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'thumbnail' => 'image',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required',
            'status' => 'required'
        ]);

        if (isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }
        //check if user has checked the checkbox
        if(request()->has('user_id')) {
            $attributes['user_id'] = auth()->id();
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated!');
    }

    //delete a post
    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post is deleted');
    }
}
