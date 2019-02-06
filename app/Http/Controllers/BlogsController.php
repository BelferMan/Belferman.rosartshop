<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Http\Requests\BlogRequest;
use Session;

class BlogsController extends MainController
{

    public function index()
    {
        //Blog::getBlogs(self::$data);
        self::$data['blogs'] = Blog::all()->toArray();
        return view('cms/blog', self::$data);
    }

    public function create()
    {
        return view('cms/add_blog', self::$data);
    }

    public function store(BlogRequest $request)
    {
        Blog::save_new($request);
        return \redirect('cms/blog');
    }

    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms/delete_blog', self::$data);
    }

    public function edit($id)
    {
        self::$data['item'] = Blog::find($id)->toArray();
        return view('cms/edit_blog', self::$data);

    }

    public function update(BlogRequest $request, $id)
    {
        Blog::update_item($request, $id);
        return \redirect('cms/blog');
    }
    public function destroy($id)
    {
        Blog::destroy($id);
        Session::flash('showMassege', 'Blog deleted!');
        return \redirect('cms/blog');
    }
}