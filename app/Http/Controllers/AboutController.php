<?php

namespace App\Http\Controllers;

use App\About;
use App\Http\Requests\AboutRequest;

class AboutController extends MainController
{

    public function index()
    {
        About::getContent(self::$data);
        return view('cms/about', self::$data);
    }

    public function create()
    {
        return view('cms/add_category', self::$data);
    }

    public function store(AboutRequest $request)
    {

        About::save_new($request);
        return \redirect('cms/about');
    }
/*
public function show($id)
{
self::$data['item_id'] = $id;
return view('cms/delete_category', self::$data);
}

public function edit($id)
{
self::$data['item'] = Categorie::find($id)->toArray();
return view('cms/edit_category', self::$data);

}

public function update(CategoriesRequest $request, $id)
{
Categorie::update_item($request, $id);
return \redirect('cms/categories');
}

public function destroy($id)
{
Categorie::destroy($id);
Session::flash('showMassege', 'Category deleted!');
return \redirect('cms/categories');
}
 */
}