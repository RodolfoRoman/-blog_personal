<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    //
    public function home(Request $request)
    {
        $search = $request->search;
        /*$posts = Post::latest()->paginate();*/
        $posts = Post::where('title','like',"%{$search}%")
            ->with('user')
            ->latest()->paginate();

        return view('home', ['posts'=>$posts]);
    } 

    /*
    public function blog()
    {
        //$posts = Post::get(); //todos los datos
        //$posts = Post::first(); //Primer dato
        //$posts = Post::find(25); //todos los datos

        //para poder paginar
        $posts = Post::latest()->paginate();
        
        return view('blog', ['posts'=>$posts]);
    } 
    /*se elimino lo anterior por que se requier ela home en el principioi*/

    public function post(Post $post)
    {
    
        return view('post', ['post'=>$post]);

    } 
}
