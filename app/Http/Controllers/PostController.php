<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStorePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      $posts = \App\Models\Post::all();

      return view("posts.index", ["posts" => $posts ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestStorePost $request)
    {
        //$data = $request->only(["title", "content"]);
        $data["Title"] = $request->get("title");
        $data["Content"] = $request->get("content");
        $data["Slug"]= Str::slug($data["Title"], "-");
        $data["Active"] = true;
      
        $post = Post::create($data);
        $post->save();

        $request->session()->flash("status", "Post was created ! ");

       // return redirect()->route("posts.show", ["post" => $post->id]);
        return redirect()->route("posts.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::find($id);
        return view("posts.show", ["post" => $post ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
