@extends('master')
@section('main-section')

<div class="container">
    <header class="cart-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">SHOPPING CART</h1>
            <p class="inner-space mb-0">Art from the heart</p>
        </div><!-- / header-content -->
    </header>
</div><!-- / container -->

<div class="spacer-2x">&nbsp;</div>

<div class="container">
    <table class="shopping-cart">
        <thead>
            <tr>
                <th class="image">&nbsp;</th>
                <th>PRODUCT</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cart as $item)
            <tr class="cart-item">
                <td class="image"><a href="#"><img src="{{asset('tpl/images/'.'/'.$item['attributes'][0])}}" alt=""></a></td>
                <td><a href="#x"><b>{{$item['name']}}</b></a></td>
                <td>${{$item['price']}}</td>
                <td>{{$item['quantity']}}</td>
                <td class="text-center">${{$item['price']*$item['quantity']}}</td>
                <td class="remove"><a href="{{url('/shop/remove-item?pid=').$item['id']}}" class="btn btn-danger-filled x-remove">×</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div><!-- / container -->

<div class="spacer-2x">&nbsp;</div>

<section id="cart-features" class="bg-white">
    <div class="container">
        <div class="row cart-footer">
            <div class="col-md-6 cart-total">
                <h4 class="pb-3">CART TOTAL</h4>
                <p>Subtotal: <span class="text-primary">${{cart::getTotal()}}</span></p>
                <p>Shippping: <span class="text-primary">$5</span></p>
                <p>Total: <span class="text-primary">${{cart::getTotal() + 5}}</span></p>
            </div><!-- / cart-total -->

            <div class="col-md-6 cart-checkout">
                <a href="{{url('shop/clear-cart')}}" class="btn btn-black rectangle mt-1 mb-1"><i class="lnr lnr-exit"></i>
                    <span>CLEAR
                        CART</span></a>

                <a href="{{url('shop/check-out')}}" class="btn btn-black rectangle mt-1 mb-1"><i class="lnr lnr-exit"></i>
                    <span>PROCEED
                        TO CHECKOUT</span></a>

            </div><!-- / cart-checkout -->

        </div>
    </div><!-- / container -->
</section><!-- / cart-features -->



@endsection
