@extends('master')
@section('main-section')

<div class="container">
    <header class="checkout-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">CHECKOUT</h1>
            <p class="inner-space mb-0">Art from the heart</p>
        </div><!-- / header-content -->
    </header>
</div><!-- / container -->

<div class="spacer-2x">&nbsp;</div>

<section id="checkout" class="bg-white">
    <div class="container">
        <div class="row checkout-screen">
            <div class="col-md-9 checkout-form">
                <h4>CHECKOUT</h4>
                <form action="{{url('shop/order')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 sub-col-left">
                            <input type="text" class="form-control mb-3" name="first-name" placeholder="*First Name"
                                required="">
                            <input type="text" class="form-control mb-3" name="last-name" placeholder="*Last Name"
                                required="">
                            <input type="email" class="form-control mb-3" name="email" placeholder="*Email" required="">
                        </div>
                        <div class="col-md-6 sub-col-right">
                            <input type="tel" class="form-control mb-3" name="tel" placeholder="*Phone" required="">
                            <input type="text" class="form-control mb-3" name="address-line" placeholder="*Address"
                                required="">
                            <input type="text" class="form-control mb-3" name="zip" placeholder="Zip Code" required="">
                        </div>
                    </div><!-- / row -->
                    <div class="row">
                        <div class="col-md-6 sub-col-left">
                            <input type="text" class="form-control mb-3" name="country" placeholder="Country" required="">
                            <input type="text" class="form-control mb-3" name="city" placeholder="City\State" required="">
                        </div>
                        <div class="col-md-6 sub-col-right">
                        </div>
                    </div><!-- / row -->
                    <div class="checkout-form-footer">
                        <input type="submit" value="CHECKOUT" name="submit" class="btn btn-black rectangle">
                    </div><!-- / checkout-form-footer -->
            </div><!-- / checkout-form -->
            </form>

            <div class="col-md-3 checkout-total">
                <h4>CART TOTAL: <span class="text-primary">${{Cart::getTotal()}}</span></h4>
                <div class="cart-total-footer">
                    <a href="{{url('shop/shopping-cart')}}" class="btn btn-black rectangle mt-2"><span>BACK TO CART</span></a>
                    <a href="{{url('/')}}" class="btn btn-primary rectangle mt-2"><span>CONTINUE SHOPPING</span></a>
                </div><!-- / cart-total-footer -->
            </div><!-- / checkout-total -->
        </div><!-- / row -->
    </div><!-- / container -->
</section><!-- / checkout -->

@endsection
