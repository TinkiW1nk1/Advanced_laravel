<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class Category extends Controller
{
    public function getAllCategory()
    {
        $allCat = \App\Models\Category::all()->toArray();
        return view('list-categories', ['categories' => $allCat]);
    }

    public function new(Request $request)
    {
        if(!empty($_POST))
        {
            $newCat = new \App\Models\Category();
            $newCat->name = $request->name;
            $newCat->save();
            header('Location: http:/');
        }

        return view('create-category');
    }

    public function updateCategory(Request $request)
    {
        if( !empty($_POST) ){
            $cat = \App\Models\Category::find($request->id);
            $cat->name = $request->name;
            $cat->save();
            header('Location: http:/Category/all');
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
