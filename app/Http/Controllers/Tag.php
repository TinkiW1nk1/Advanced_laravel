<?php

namespace App\Http\Controllers;

class Tag
{
    public function getAllTags()
    {
        $alltag = \App\Models\Tag::all()->toArray();

        return view('list-tags', ['tags' => $alltag]);
    }

    public function newTag()
    {
        if(!empty($_POST))
        {
            $newTag = new \App\Models\Tag();
            $newTag->name = $_POST['name'];
            $newTag->save();
            header('Location: http:/');
        }

        return view('create-tag');
    }

    public function updateTag()
    {
        if( !empty($_POST) ){
            $tag = \App\Models\Tag::find($_POST['id']);
            $tag->name = $_POST['name'];
            $tag->save();
            header('Location: http:/Tag/all');
        }else{
            $id = $_GET['id'];
            $tag = \App\Models\Tag::find($id);
            $name = $tag->name;
            return view('update-tag', ['id' => $id, 'name' => $name ] );
        }

        return view('update-tag');
    }

    public function deleteTag()
    {
        $tag = \App\Models\Tag::find($_GET['id']);
        $tag->delete();

        header('Location: http:/Tag/all');
    }

}
