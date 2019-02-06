<?php

namespace App;

use Cart;
use Illuminate\Database\Eloquent\Model;
use Session;

class Categorie extends Model
{
    public static function getCategories(&$data)
    {
        $categories = Categorie::all()->toArray();
        $data['categories'] = $categories;
        $cart = Cart::getContent()->toArray();
        $data['cart'] = $cart;
        view('master', $data);
    }

    public static function save_new($request)
    {
        $categorie = new self;
        $categorie->cat_name = $request['title'];
        $categorie->cat_url = $request['url'];
        $categorie->save();
        Session::flash('showMassege', $categorie->cat_name . ' is a new category!');
    }

    public static function update_item($request, $id)
    {
        $categorie = Categorie::find($id);
        $categorie->cat_name = $request['title'];
        $categorie->cat_url = $request['url'];
        $categorie->save();
        Session::flash('showMassege', $categorie->cat_name . ' Updated!');
    }
}