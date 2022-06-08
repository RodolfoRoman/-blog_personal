<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //metodo para ver
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->paginate()
        ]);
    }

    //metodo para eliminar
    public function destroy(Post $post)
    {

        $post->delete();
        //regresear a la anterior
        return back();
    }


    //metodo para ver
    public function create(Post $post)
    {
        return view('posts.create', ['post' => $post]);
    }

    //metodo para editar
    public function edit(Post $post)
    {
        return view('posts.edit', ['post' => $post]);
    }

    //metodo para editar
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug,'.$post->id,
            'body' => 'required',
        ]);

        $post -> update([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,


        ]);
        return redirect()->route('posts.edit', $post);
    }


    //metodo para guardar
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:posts,slug',
            'body' => 'required',
        ]);


        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'slug'  => $request->slug,
            'body'  => $request->body,


        ]);
        return redirect()->route('posts.edit', $post);
    }
}
