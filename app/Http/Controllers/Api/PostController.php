<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts=Post::all();
        return response()->json($posts,200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=Post::create($request->all());
        return response()->json($post,201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        $post=Post::find($id);
        $post=Post::where('id',$id)->get();
        if($post->isEmpty()){
            return response()->json(['message'=>'Post not found'],404);
        }
        return response()->json($post,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post->update($request->all());
        return response()->json($post,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post=Post::find($id);
        if($post){
            $post->delete();
            return response()->json(['message'=>'Post deleted successfully'],200);
        }
        return response()->json(['message'=>'Post not found'],404);
    }
}
