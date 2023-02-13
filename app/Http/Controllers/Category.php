<?php

namespace App\Http\Controllers;

use App\Models\User;

class Category extends Controller
{
    public function getAllCategory()
    {
        $allCat = \App\Models\Category::all()->toArray();

        return view('list-categories', ['categories' => $allCat]);
    }

    public function new()
    {
        if(!empty($_POST))
        {
            $newCat = new \App\Models\Category();
            $newCat->name = $_POST['name'];
            $newCat->save();
            header('Location: http:/');
        }

        return view('create-category');
    }

    public function updateCategory()
    {
        if( !empty($_POST) ){
            $cat = \App\Models\Category::find($_POST['id']);
            $cat->name = $_POST['name'];
            $cat->save();
            header('Location: http:/Category/all');
        }else{
            $id = $_GET['id'];
            $cat = \App\Models\Category::find($id);
            $name = $cat->name;
            return view('update-category', ['id' => $id, 'name' => $name ] );
        }

        return view('update-category');
    }

    public function deleteCategory()
    {
        $category = \App\Models\Category::find($_GET['id']);
        $category->delete();

        header('Location: http:/Category/all');
    }

}
