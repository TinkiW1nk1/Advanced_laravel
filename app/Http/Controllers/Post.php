<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Post extends Controller
{
    public function getPosts()
    {
        $posts = \App\Models\Post::all()->toArray();

        return view('list-post', ['posts' => $posts]);
    }

    public function new(Request $request)
    {
        $categories = \App\Models\Category::all()->toArray();
        $tags = \App\Models\Tag::all()->toArray();

        return view('create-post', ['categories' => $categories, 'tags' => $tags]);
    }

    public function newMake(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $post = new \App\Models\Post();
        $post->name = $request->name;
        $post->text = $request->text;
        $post->category_id = $request->category;
        $post->save();
        Session::flash('flash_message', 'Элемент добавлен');


        return view('index');
    }

    public function update(Request $request)
    {
        if( !empty($_POST) ){
            $errors = $request->validate([
                'name' => 'required|max:255',
            ]);
            $post = \App\Models\Post::find($request->id);
            $post->name = $request->name;
            $post->text = $request->text;
          //  $post->category = $request->category;
         //   $post->tag = $request->tag;
            $post->save();
            Session::flash('flash_message', 'Элемент обновлен');

            return redirect('Post/all');
        }else{

            $id = $request->id;
            $post = \App\Models\Post::find($id);
            $name = $post->name;
            $text = $post->text;
            $category = $post->category;
            $tag = $post->tag;
            return view('update-post', ['id' => $id, 'name' => $name, 'text' => $text,
                'categoty' => $category, 'tag'=> $tag ] );
        }

        return view('update-category');
    }

    public function delete(Request $request)
    {
        $post = \App\Models\Post::find($request->id);
        $post->delete();

        return redirect('Post/all');
    }
}
