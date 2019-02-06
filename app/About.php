<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

class About extends Model
{
    public static function getContent(&$data)
    {
        $content = self::all()->first();
        $data['aboutContent'] = $content;
    }

    public static function save_new($request)
    {
        $article = About::find(1);
        $article->title = $request['title'];
        $article->text = $request['text'];
        $article->save();
        Session::flash('showMassege', ' Updated!');
    }

    public static function update_item($request, $id)
    {
        $article = Categorie::find($id);
        $article->title = $request['title'];
        $article->text = $request['text'];
        $article->save();
        Session::flash('showMassege', ' Updated!');
    }
}