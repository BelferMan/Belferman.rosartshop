@extends('master')

@section('main-section')

<div class="container">
    <header class="home-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">ROSART - By Vered Goldman
            </h1>
            <p class="inner-space mb-0">Art from the Heart</p>
        </div><!-- / header-content -->
    </header>
</div><!-- / container -->

<div class="container">
    <!-- gallery filter -->
    <ul class="gallery-filter list-inline text-center">
        @foreach($categories as $category )

        <li><a class="dropdown-item" href="{{url('shop/').'/'.$category['cat_url']}}">
                {{$category['cat_name']}}</a></li>

        @endforeach
    </ul>
    <!-- / gallery filter -->
</div><!-- / container -->


<section id="gallery" class="p-0 line-effect">
    <div class="container full-width">
        <h3 class="section-title hidden">GALLERY</h3>
        <ul class="row gallery line-effect list-unstyled mb-0 " id="grid">
            <!-- gallery -->


            @foreach($products as $product)

            <li class="col-md-6 col-lg-4 gallery" data-groups='["{{$product->cat_name}}}"]'>
                <figure class="gallery-item effect-bubba">
                    <img src="{{asset('tpl/images').'/'.$product->pro_image}}" alt="Rosart product" class="">
                    <figcaption>
                        <div class="hover-content">
                            <h2 class="hover-title text-center text-white">{{$product->title}}</h2><!-- / hover-title -->
                            <span class="gallery-icons">
                                <a href="#x" class="gallery-button" data-toggle="modal" data-target="{{str_ireplace(' ','','.'.$product->title)}}">
                                    <i class="fas fa-info fa-lg"></i></a>
                            </span>
                            <!--/ gallery-icons -->
                            </p><!-- / gallery-info -->
                        </div><!-- / hover-content -->
                    </figcaption>
                </figure><!-- / gallery-item -->
            </li><!-- / gallery -->


            <div class="modal fade framed-product product-modal {{str_ireplace(' ','',$product->title)}}" tabindex="-1"
                role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div><!-- / modal-header -->
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row vcenter">
                                    <div class="col-md-6">
                                        <img src="{{asset('tpl/images/').'/'.$product->pro_image}}" alt="Rosart product"
                                            class="shop-img">
                                        <div id="product-slider" class="owl-carousel owl-theme carousel-full-nav">


                                        </div><!-- / owl-carousel -->
                                    </div><!-- / column -->
                                    <div class="col-md-6">
                                        <h4 class="single-product-title">{{$product->title}}</h4>

                                        <hr>
                                        <p>{!!$product->description!!}</p>
                                        <div class="product-info pb-3 pt-3">

                                            <p class="mb-3"><i class="far fa-bookmark text-muted mr-1"></i>
                                                Price: <span class="text-black"><b>${{$product->price}}</b>
                                                </span></p>

                                            <p class="mb-3"><i class="far fa-bookmark text-muted mr-1"></i>
                                                Available: <span class="text-black"><b class="text-success">{{$product->available}}</b>
                                                </span></p>

                                            <p class="mb-3"><i class="far fa-folder-open text-muted mr-1"></i>
                                                Category:<b> {{$product->cat_name}}</b></p>

                                            <p class="mb-0 pt-1"><b>Select Quantity & Size:</b></p>

                                            <form class="form-inline">
                                                <input class="change_quantity form-control qty m-2 product-quantity {{$product->id}}"
                                                    type="number" min="1" max="{{$product->available}}" value="1" id="number-input">

                                                <select class="form-control selector shop-option m-2" id="inline-form-select-1">
                                                    <option value="1">S</option>
                                                    <option value="2">M</option>
                                                    <option value="3">L</option>
                                                    <option value="4">XL</option>
                                                </select>
                                            </form>
                                        </div><!-- / product-info -->
                                    </div><!-- / column -->
                                </div><!-- / row -->
                            </div><!-- / container-fluid -->
                        </div><!-- / modal-body -->
                        <div class="modal-footer">
                            <div class="container-fluid">
                                <div class="row vcenter">
                                    <div class="col-md-4">
                                        <p class="mb-0 text-white creator-info"><img src="{{asset('tpl/images/logoRosart2.png')}}"
                                                class="creator-image" alt="Rosart logo"> <span><b>Rose Goldman</b></span>
                                            <span class="text-sm">Designer
                                                &
                                                Painter</span></p>
                                    </div><!-- / column -->

                                    <div class="col-md-4 text-right">
                                        @if($product->available == 0)
                                        <h2 class='text-primary text-center'>Not available <i class="fas fa-shopping-cart"></i></h2>
                                        @else
                                        @if(!Cart::get($product->id))
                                        <a href="{{url('shop/add-to-shopping-cart')}}" data-id="{{$product->id}}" class="add-to-cart btn btn-primary m-2">ADD
                                            TO CART</a>
                                        @else
                                        <h2 class='text-primary text-center'>In Cart <i class="fas fa-shopping-cart"></i></h2>
                                        @endif
                                        @endif
                                    </div><!-- / column -->
                                </div><!-- / row -->
                            </div><!-- / container -fluid -->
                        </div><!-- / modal-footer -->
                    </div><!-- / modal-content -->
                </div><!-- modal-dialog -->
            </div><!-- / modal -->

            @endforeach


        </ul><!-- / gallery -->
    </div><!-- / container -->
</section>
<!-- / gallery -->


<div class="spacer-2x">&nbsp;</div>

<section id="clients" class="bg-white">
    <h4 class="text-center">Gallery</h4>
    <div class="spacer spacer-line border-primary">&nbsp;</div>
    <div class="spacer">&nbsp;</div>
    <div class="container">
        <div id="clients-carousel" class="owl-carousel owl-theme">
            <img src="{{asset('tpl/images/small/1.jpg')}}" style="margin:0 important!;" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/2.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/3.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/4.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/12.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/6.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/7.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/8.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/9.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/10.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/11.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/13.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/14.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/15.jpg')}}" alt="rosart gallery image">
            <img src="{{asset('tpl/images/small/16.jpg')}}" alt="rosart gallery image">
        </div><!-- / owl-carousel -->
        <!-- / clients carousel -->

    </div><!-- / container -->
</section><!-- / clients -->


@endsection
