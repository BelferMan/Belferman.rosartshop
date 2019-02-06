<?php

namespace App\Http\Controllers;

use App\Categorie;
use App\Order;
use App\Product;
use Cart;
use Illuminate\Http\Request;
use Session;

class ShopController extends MainController
{
    public function categories($curl)
    {
        Product::getProduct($curl, self::$data);
        self::$data['title'] .= 'Products';
        Categorie::getCategories(self::$data);
        return view('product', self::$data);
    }

    public function addToShopingCart(Request $request)
    {
        Product::addToChart($request['pid'], $request['pquantity']);
    }

    public function shoppingCart()
    {
        Categorie::getCategories(self::$data);
        self::$data['title'] .= 'Shopping-Cart';
        return view('shopping-cart', self::$data);
    }

    public function clearCart()
    {
        Cart::clear();
        return \redirect('shop/shopping-cart');
    }

    public function removeItem(Request $request)
    {
        $pid = $request['pid'];
        Cart::remove($pid);
        return \redirect()->back();

    }
    public function checkout()
    {
        if (!Cart::isEmpty()) {
            self::$data['title'] .= 'Check Out';
            return view('checkout', self::$data);
        } else {
            Session::flash('emptyCart', 'Shopping cart is empty!');
            return \redirect('/');
        }
    }

    public function postOrder(Request $orderReq)
    {
        Order::save_order($orderReq);
        Session::flash('showMassege', 'Thank you!');
        return \Redirect('/');
    }
}