<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('likes')->latest()->get();
        return view('posts', compact('posts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|string|max:255',
            'content'=>'required|string'
        ]);

        Post::create([
            'title'=>$request->title,
            'content'=>$request->content,
            'user_id'=>session('user_id')
        ]);

        return redirect()->back();
    }
public function update(Request $request, Post $post)
{
    if ($post->user_id != session('user_id')) {
        abort(403, "You are not allowed to update this post");
    }

    $request->validate([
        'title'=>'required|string|max:255',
        'content'=>'required|string'
    ]);

    $post->update([
        'title'=>$request->title,
        'content'=>$request->content
    ]);

    return redirect('/posts')->with('success', 'Post updated successfully!');
}
public function edit(Post $post)
{
    // check if user owns the post
    if ($post->user_id != session('user_id')) {
        abort(403, "You are not allowed to edit this post");
    }

    return view('posts_edit', compact('post'));
}

public function destroy(Post $post)
{
    if ($post->user_id != session('user_id')) {
        abort(403, "You are not allowed to delete this post");
    }

    $post->delete();
    return redirect()->back();
}

public function like(Post $post)
{
    $user_id = session('user_id');

    $like = Like::where('post_id', $post->id)
                ->where('user_id', $user_id)
                ->first();

    if($like){
        // unlike
        $like->delete();
    }else{
        // like
        Like::create([
            'post_id'=>$post->id,
            'user_id'=>$user_id
        ]);
    }

    return redirect()->back();
}

}