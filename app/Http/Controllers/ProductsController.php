<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Http\Requests\ProductsRequest;
use App\Product;
use Session;

class ProductsController extends MainController
{

    public function index()
    {
        self::$data['products'] = Product::all()->toArray();
        Categorie::getCategories(self::$data);
        return view('cms/products', self::$data);
    }

    public function create()
    {
        Categorie::getCategories(self::$data);
        return view('cms/add_products', self::$data);
    }

    public function store(ProductsRequest $request)
    {

        Product::save_new($request);
        return \redirect('cms/products');
    }

    public function show($id)
    {
        self::$data['item_id'] = $id;
        return view('cms/delete_product', self::$data);
    }

    public function edit($id)
    {
        Categorie::getCategories(self::$data);
        self::$data['item'] = Product::find($id)->toArray();
        return view('cms/edit_product', self::$data);

    }

    public function update(ProductsRequest $request, $id)
    {
        Product::update_item($request, $id);
        return \redirect('cms/products');
    }

    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('showMassege', 'Product deleted!');
        return \redirect('cms/products');
    }
}