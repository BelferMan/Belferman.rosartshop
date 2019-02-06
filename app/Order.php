<?php

namespace App;

use App\Product;
use Cart;
use Illuminate\Database\Eloquent\Model;
use Session;

class Order extends Model
{
    public static function save_order($request)
    {
        $items = Cart::getContent();
        foreach ($items as $item) {
            $id = $item->id;
            $quantity = $item->quantity;
            Product::update_available($id, $quantity);
        }

        $order = new self;
        $order->uid = Session::get('user_id') ? Session::get('user_id') : '0';
        $order->total = Cart::getTotal();
        $order->data = serialize([
            'first_name' => $request['first-name'],
            'last_name' => $request['last-name'],
            'email' => $request['email'],
            'tel' => $request['tel'],
            'address_line' => $request['address-line'],
            'zip' => $request['zip'],
            'country' => $request['country'],
            'city' => $request['city'],
        ]);
        $order->order_details = serialize(Cart::getContent()->toArray());
        $order->save();
        Cart::clear();
    }
}