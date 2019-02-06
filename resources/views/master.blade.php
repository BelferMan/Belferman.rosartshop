<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Bootstrap 4 Template">
    <meta name="author" content="kingstudio.ro">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('inc/css_master')
</head>

<script>
    var MAIN_URL = "{{url('')}}";
</script>

<body>
    <div id="preloader">
        <div class="preloader">
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="top-menu top-menu-primary ">
        <div class="container">
            <p>
                <span class="social margin-fix left">
                    <a class="no-margin" href="https://www.facebook.com/rosartbyVG/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.instagram.com/veredgoldman/" target="_blank"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.youtube.com/watch?v=OWfoAU0a1no&t=2s" target="_blank"><i class="fab fa-youtube"></i></a>
                </span>
                <span class="right">
                    @if(Session::has('user_name'))
                    <a href=""><i class="fas fa-user mr-1"></i> <span>{{Session::get('user_name')}}</span></a>
                    <a href="{{url('user/signout')}}"><i class="fas fa-lock mr-1"></i>
                        <span>Sign Out</span></a>
                    @if(Session::has('is_admin'))
                    <a href="{{url('cms/orders')}}"><span>Admin</span></a>
                    @endif
                    @else
                    <a href="#x" data-toggle="modal" data-target=".login-modal"><i class="fas fa-user mr-1"></i> <span>Login</span></a>
                    <a href="#x" data-toggle="modal" data-target=".register-modal"><i class="fas fa-lock mr-1"></i>
                        <span>Register</span></a>
                    @endif

                </span>
            </p>
        </div><!-- / container -->
    </div><!-- / top-menu -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white custom-menu split-menu">
        <div class="container">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-toggle-1"
                aria-controls="navbar-toggle-1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
                <span class="sr-only">Toggle navigation</span>
            </button><!-- / navbar-toggler -->

            <a class="navbar-brand mobile-brand m-auto" href="#"><img src="{{asset('tpl/images/logoRosart4.jpg')}}" alt=""></a>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-toggle-2"
                aria-controls="navbar-toggle-2" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar top-bar"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
                <span class="sr-only">Toggle navigation</span>
            </button><!-- / navbar-toggler -->

            <div class="collapse navbar-collapse" id="navbar-toggle-1">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link first-menu-item active " href="{{url('/')}}">Home</a>

                    </li><!-- / dropdown -->
                    <li class="nav-item after-dropdown">
                        <a class="nav-link" href="{{url('/about')}}">About Me</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#x" id="dropdown2" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Categories</a>
                        <div class="dropdown-menu drop-to-right animated fadeIn fast" aria-labelledby="dropdown2">
                            @foreach($categories as $category )


                            <a class="dropdown-item" href="{{url('shop/').'/'.$category['cat_url']}}">
                                {{$category['cat_name']}}</a>

                            @endforeach
                        </div><!-- / dropdown-menu -->
                    </li><!-- / dropdown -->
                </ul><!-- / navbar-nav -->
            </div><!-- / navbar-collapse -->

            <a class="navbar-brand m-auto" href="{{url('/')}}"><img src="{{asset('tpl/images/logoRosart4.jpg')}}" alt=""></a>

            <div class="collapse navbar-collapse" id="navbar-toggle-2">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                    </li>
                    <li class="nav-item dropdown extra-dropdowns">
                        <a class="nav-link last-menu-item has-dropdown-toggle dropdown-toggle" href="#" id="dropdown3"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shopping
                            Cart<span class="count count-primary">{{Cart::getTotalQuantity()}}</span></a>
                        <div class="dropdown-menu animated fadeIn fast" aria-labelledby="dropdown3">

                            @if(!Cart::isEmpty())
                            @foreach($cart as $item)
                            <div class="cart-small">
                                <img src="{{asset('tpl/images/'.'/'.$item['attributes'][0])}}" alt="">
                                <p><a href="#x" class="text-black">{{$item['name']}}</a> <br> <span>{{$item['quantity']}}
                                        x ${{$item['price']}}</span></p>
                                <a href="{{url('/shop/remove-item?pid=').$item['id']}}"> <i class="md-icon dp14 close-icon">close</i></a>
                            </div><!-- / cart-small -->
                            @endforeach
                            @endif


                            <p class="text-left cart-small-total"><b>Subtotal: ${{Cart::getTotal() }}</b></p>
                            <div class="cart-small-footer text-center">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="{{url('shop/shopping-cart')}}" class="mini-cart-btn"><i class="md-icon dp12 mr-1">shopping_cart</i>
                                            <span class="va-middle"><b>VIEW CART</b></span></a>
                                    </div><!-- / column -->
                                    <div class="col-sm-6">
                                        <a href="{{url('shop/checkout')}}" class="mini-cart-btn mb-0"><i class="md-icon dp12 mr-1">exit_to_app</i>
                                            <span class="va-middle"><b>CHECKOUT</b></span></a>
                                    </div><!-- / column -->
                                </div><!-- / row -->
                            </div><!-- / cart-small-footer -->
                        </div><!-- / dropdown-menu -->
                    </li><!-- / dropdown -->
                </ul><!-- / navbar-nav -->
            </div><!-- / navbar-collapse -->
        </div><!-- / container -->
    </nav><!-- / split-navbar -->



    @yield('main-section')


    <div class="footer-widgets">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 text-center">
                    <div class="widget">
                        <img src="{{asset('tpl/images/logoRosart3.jpg')}}" alt="logo" class="footer-logo">
                        <p class="mb-3">Art from the heart.</p>
                    </div><!-- / widget -->
                </div><!-- / column-->

                <div class="col-lg-3 text-center">
                    <div class="widget">
                        <h3 class="widget-title">USEFUL LINKS</h3>
                        <ul class="footer-list pl-0 mb-0">
                            <li class="mb-3"><a href="{{url('blog')}}">Blog</a></li>
                            <li class="mb-3"><a href="{{url('about')}}">About</a></li>

                        </ul>
                    </div><!-- / widget -->
                </div><!-- / column-->

                <div class="col-lg-3 text-center">
                    <div class="widget">
                        <h3 class="widget-title">CATEGORIES</h3>
                        <ul class="footer-list pl-0 mb-0">
                            @foreach($categories as $category )
                            <li class="mb-3"><a href="{{url('shop/').'/'.$category['cat_url']}}">
                                    {{$category['cat_name']}}</a></li>
                            @endforeach
                        </ul>
                    </div><!-- / widget -->
                </div><!-- / column-->

                <div class="col-lg-3 text-center">
                    <div class="widget">
                        <h3 class="widget-title">CONTACT ME</h3>
                        <ul class="footer-list pl-0 mb-0">
                            <li class="mb-3"><address><a href="mailto:design.by.rosart@gmail.com"><i class="fas fa-envelope mr-2"></i>
                                        design.by.rosart@gmail.com</a></address></li>

                        </ul>
                    </div><!-- / widget -->
                </div><!-- / column-->
            </div><!-- / row -->
        </div><!-- / container -->
    </div><!-- / footer-widgets -->


    <footer class="bg-white">
        <div class="container-fluid text-center">
            <p>{{date('Y')}} &copy; <a href="{{url('')}}">Rosart</a></p>
        </div><!-- / container-fluid -->
    </footer>

    <!-- modals -->

    <!-- login-modal -->
    <div class="modal fade login-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">LOG IN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- / modal-header -->
                <div class="modal-body">
                    <div class="custom-form">
                        <div class="form-wrapper">
                            <div class="">
                                <ul>
                                    <li class="error_mail text-danger"></li>
                                    <li class="error_pass text-danger"></li>
                                </ul>
                            </div>
                            <form action="{{url('user/sign-in')}}" method="POST">

                                <input name="email" type="text" value="{{old('email')}}" class="form-control mb-3 signin_email"
                                    id="login-input" placeholder="Email">
                                <input name="password" type="password" class="form-control mb-3 signin_password" id="login-password-input"
                                    placeholder="Password">

                                <div class="form-inline-extras">
                                    <div class="left-area">
                                        <div class="checkbox checkbox-primary ml-2">
                                            <label class="hidden"><input type="checkbox"></label>
                                            <input id="checkbox5" type="checkbox" name="rem">
                                            <label for="checkbox5">
                                                Remember Me
                                            </label>
                                        </div><!-- / checkbox -->
                                    </div><!-- / left-area -->
                                    <div class="right-area">
                                        <input type="submit" value="LOG IN" class="btn btn-primary rectangle signin_submit"
                                            name="submit">
                                    </div><!-- / right-area -->
                            </form>
                        </div><!-- / form-inline-extras -->
                        <div class="text-left mt-2">
                            <a href="#x">Forgot your password?</a>
                        </div><!-- / text-left -->
                    </div><!-- / form-wrapper -->
                </div><!-- / custom-form -->
            </div><!-- / modal-body -->
        </div><!-- / modal-content -->
    </div><!-- / modal-dialog -->
    </div><!-- / modal -->
    <!-- / login-modal -->

    <!-- register-modal -->
    <div class="modal fade register-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">REGISTER</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div><!-- / modal-header -->
                <div class="modal-body">
                    <div class="custom-form">
                        <div class="form-wrapper">
                            <div class="">
                                <ul>
                                    <li class="register_error_mail text-danger"></li>
                                    <li class="register_error_pass text-danger"></li>
                                    <li class="register_error_name text-danger"></li>
                                </ul>
                            </div>
                            <form action="{{url('user/register')}}" method="POST">
                                <input type="email" value="{{old('email')}}" name="email" class="form-control mb-3 register_email"
                                    id="register-email" placeholder="Email Address">
                                <input type="text" value="{{old('name')}}" class="form-control mb-3 register_name" name="name"
                                    id="register-username" placeholder="Username">
                                <input type="password" class="form-control mb-3 register_password" name="password" id="register-password-input"
                                    placeholder="Password">
                                <div class="form-inline-extras sixty-fourty">
                                    <div class="left-area">
                                        <div class="checkbox checkbox-primary ml-1">
                                            <label class="hidden"><input type="checkbox"></label>
                                            <input id="checkbox6" type="checkbox">
                                            <label for="checkbox6">
                                                I Accept <a href="#x">Terms &amp; Conditions</a>
                                            </label>
                                        </div><!-- / checkbox -->
                                    </div><!-- / left-area -->
                                    <div class="right-area">
                                        <a href="" name="submit" class="btn btn-primary rectangle register_submit">REGISTER</a>
                                    </div><!-- / right-area -->
                                </div><!-- / form-inline-extras -->
                            </form>
                        </div><!-- / form-wrapper -->
                    </div><!-- / custom-form -->
                </div><!-- / modal-body -->
            </div><!-- / modal-content -->
        </div><!-- / modal-dialog -->
    </div><!-- / modal -->
    <!-- / register-modal -->

    @include('inc/js')


</body>

</html>
