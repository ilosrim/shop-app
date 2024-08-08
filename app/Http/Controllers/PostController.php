<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PostController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth', except: ['index', 'show']),
        ];
    }

    public function index(): View
    {
        $posts = Post::latest()->paginate(6);

        return view("posts.index")->with([
            "posts" => $posts,
        ]);
    }

    public function create(): View
    {
        return view("posts.create")->with([
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        if ($request->hasFile("image")) {
            $path = $request->file("image")->store("post-images");
        }

        $post = Post::create([
            "user_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "title" => $request->title,
            "description" => $request->description,
            "image" => $path ?? null,
            "content" => $request->content,
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route("posts.index");
    }

    public function show(Post $post): View
    {
        return view("posts.show")->with([
            "post" => $post,
            "recent_posts" => Post::latest()
                ->get()
                ->except($post->id)
                ->take(5),
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    public function edit(Post $post)
    {
        return view("posts.edit")->with([
            "post" => $post,
            "categories" => Category::all(),
            "tags" => Tag::all(),
        ]);
    }

    public function update(StorePostRequest $request, Post $post)
    {
        if ($request->hasFile("image")) {
            if (isset($post->image)) {
                Storage::delete($post->image);
            }

            $path = $request->file("image")->store("post-images");
        }

        $post->update([
            "user_id" => Auth::user()->id,
            "category_id" => $request->category_id,
            "title" => $request->title,
            "description" => $request->description,
            "image" => $path ?? $post->image,
            "content" => $request->content,
        ]);

        if (isset($request->tags)) {
            foreach ($request->tags as $tag) {
                $post->tags()->attach($tag);
            }
        }

        return redirect()->route("posts.show", ["post" => $post->id]);
    }

    public function destroy(Post $post)
    {
        if (isset($post->image)) {
            Storage::delete($post->image);
        }

        $post->delete();

        return redirect()->route("posts.index");
    }
}
