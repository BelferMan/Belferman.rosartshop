<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;
use Session;

class Blog extends Model
{
    public static function getBlogs(&$data)
    {
        $blogs = DB::table('blogs AS b')
            ->select('*')
            ->paginate(3);
        if (!$blogs->count()) {
            abort(404);
        } else {
            $data['blogs'] = $blogs;

        }
    }

    public static function update_item($request, $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request['title'];
        $blog->article = $request['text'];
        $blog->save();
        Session::flash('showMassege', $blog->title . ' Updated!');
    }

    public static function save_new($request)
    {

        $blog = new self;
        $blog->title = $request['title'];
        $blog->article = $request['text'];
        $blog->save();
        Session::flash('showMassege', $blog->title . ' Added!');
    }
}