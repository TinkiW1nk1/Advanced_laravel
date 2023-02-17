<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
class Tag extends Controller
{
    public function getAllTags()
    {
        $alltag = \App\Models\Tag::all()->toArray();

        return view('list-tags', ['tags' => $alltag]);
    }

    public function newTag(Request $request)
    {
        if(!empty($_POST))
        {
            $newTag = new \App\Models\Tag();
            $newTag->name = $request->name;
            $newTag->save();
            header('Location: http:/');
        }

        return view('create-tag');
    }

    public function updateTag(Request $request)
    {
        if( !empty($_POST) ){
            $tag = \App\Models\Tag::find($_POST['id']);
            $tag->name = $request->name;
            $tag->save();
            header('Location: http:/Tag/all');
        }else{
            $id = $request->id;
            $tag = \App\Models\Tag::find($id);
            $name = $tag->name;
            return view('update-tag', ['id' => $id, 'name' => $name ] );
        }

        return view('update-tag');
    }

    public function deleteTag(Request $request)
    {
        $tag = \App\Models\Tag::find($request->id);
        $tag->delete();

        header('Location: http:/Tag/all');
    }

}
