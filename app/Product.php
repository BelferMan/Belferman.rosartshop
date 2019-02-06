<?php

namespace App;

use Cart;
use DB;
use Illuminate\Database\Eloquent\Model;
use Image;
use Session;

class Product extends Model
{
    public static function getProduct($curl, &$data)
    {
        $products = DB::table('products AS p')
            ->join('categories AS c', 'p.cat_id', '=', 'c.id')
            ->select('c.cat_name', 'c.cat_url', 'p.*')
            ->where('cat_url', '=', $curl)
            ->paginate(3);
        if (!$products->count()) {
            abort(404);
        } else {
            $data['products'] = $products;
        }
    }

    public static function getHomeProducts(&$data)
    {
        $products = DB::select('SELECT c.cat_name,c.cat_url,p.* FROM products p JOIN categories c ON p.cat_id = c.id WHERE
        p.home_show = 1');
        $data['products'] = $products;
    }

    public static function addToChart($pid, $pquantity)
    {
        if ($product = Product::find($pid)->ToArray()) {
            Cart::add($pid, $product['title'], $product['price'], $pquantity, [$product['pro_image']]);
            Session::flash('showMassege', $product['title'] . '(' . $pquantity . ')' . ' Added to cart!');
        }
    }

    public static function save_new($request)
    {
        $image_name = 'default.jpg';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = $file->getClientOriginalName();
            $file->move(public_path() . '/tpl/images', $image_name);
            $img = Image::make(public_path() . '/tpl/images/' . $image_name);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save();
        }
        $product = new self;
        $product->cat_id = $request['category'];
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->pro_image = $image_name;
        $product->home_show = $request['home_page'];
        $product->save();
        Session::flash('showMassege', $product->title . ' Added!');
    }

    public static function update_item($request, $id)
    {
        $image_name = 'default.jpg';
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $file = $request->file('image');
            $image_name = $file->getClientOriginalName();
            $file->move(public_path() . '/tpl/images/', $image_name);
            $img = Image::make(public_path() . '/tpl/images/' . $image_name);
            ////$img->resize(800, null, function ($constraint) {
            //$constraint->aspectRatio();
            //});
            //$img->save();
        }

        $product = Product::find($id);
        $product->cat_id = $request['category'];
        $product->title = $request['title'];
        $product->description = $request['description'];
        $product->price = $request['price'];
        $product->available = $request['available'];
        $product->pro_image = $image_name;
        $product->home_show = $request['home_page'];
        $product->save();
        Session::flash('showMassege', 'Product Updated!');
    }

    public static function update_available($id, $quantity)
    {
        //dd(self::all()->toArray());
        $item = self::find($id);
        //dd($item);
        $item->available = $item->available - $quantity;
        $item->save();
    }
}