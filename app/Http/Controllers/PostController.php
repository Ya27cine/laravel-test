<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestStorePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostController extends Controller
{


    public function __construct()
    {
        // Protecting routes(requiring authentication) 
       // $this->middleware('auth')->only(['create', 'edit', 'store', 'update', 'destroy']);
       $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request){

      $posts = \App\Models\Post::withCount("comments")->get();
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
        $post = Post::findOrFail($id);
        return view("posts.edit", ["post" => $post ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RequestStorePost $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post["Title"] = $request->get("title");
        $post["Content"] = $request->get("content");
        $post["Slug"]= Str::slug($post["Title"], "-");

        $post->save();
       
        $request->session()->flash("status", "Post id ".$id." was updated ! ");
         return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Post::destroy($id);
        $request->session()->flash("status", "Post id ".$id." was deleted ! ");
        return redirect()->route("posts.index");
    }
}
