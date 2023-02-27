<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Category extends Controller
{
    public function getAllCategory()
    {
        $allCat = \App\Models\Category::all()->toArray();

        return view('list-categories', ['categories' => $allCat]);
    }

    public function new(Request $request)
    {
        return view('create-category');
    }

    public function newMake(Request $request)
    {
        $errors = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $newCat = new \App\Models\Category();
        $newCat->name = $request->name;
        $newCat->save();
        Session::flash('flash_message', 'Элемент добавлен');


        return view('index');
    }

    public function updateCategory(Request $request)
    {

        if( !empty($_POST) ){
            $errors = $request->validate([
                'name' => 'required|max:255',
            ]);
            $cat = \App\Models\Category::find($request->id);
            $cat->name = $request->name;
            $cat->save();
            Session::flash('flash_message', 'Элемент обновлен');

            return view('/Category/all');
        }else{

            $id = $request->id;
            $cat = \App\Models\Category::find($id);
            $name = $cat->name;
            return view('update-category', ['id' => $id, 'name' => $name ] );
        }

        return view('update-category');
    }

    public function deleteCategory(Request $request)
    {
        $category = \App\Models\Category::find($request->id);
        $category->delete();

        header('Location: http:/Category/all');
    }

}
