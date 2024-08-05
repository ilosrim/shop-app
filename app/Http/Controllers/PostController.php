<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        // $posts = Post::where('id', 1)->first();
        // dd($posts->title);

        # Updates
        // $post = Post::find(3);
        // $post->title = 'chaned title 3';
        // $post->save();

        # Mass Updates
        // Post::where('id', 4)->update(['title' => 'updated title 4']);

        // $posts = Post::all();
        return view("posts.index", [
            "posts" => Post::orderBy('id', 'desc')->paginate(6),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view("posts.create")->with([
            "users" => User::all(),
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("post-images");
        }

        $post = Post::create([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $path ?? null,
            "content" => $request->content,
            "user_id" => $request->user_id,
            "category_id" => $request->category_id,
        ]);

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View
    {
        return view("posts.show")->with([
            "post" => $post,
            "recent_posts" => Post::latest()
                ->get()
                ->except($post->id)
                ->take(5),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view("posts.edit")->with(["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile("image")) {
            if (isset($post->image)) {
                Storage::delete($post->image);
            }

            $path = $request->file("image")->store("post-images");
        }

        $post->update([
            "title" => $request->title,
            "description" => $request->description,
            "image" => $path ?? $post->image,
            "content" => $request->content,
            "user_id" => $request->user_id,
        ]);

        return redirect()->route("posts.show", ["post" => $post->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (isset($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route("posts.index");
    }
}
