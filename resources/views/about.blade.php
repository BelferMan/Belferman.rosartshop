@extends('master')
@section('main-section')

<div class="container">
    <header class="about-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">ABOUT ME</h1>
            <p class="inner-space mb-0">Art from the heart</p>
        </div><!-- / header-content -->
    </header>
</div><!-- / container -->

<div class="spacer-2x">&nbsp;</div>

<section id="about" class="bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-9 mb-3">
                <h4 class="section-title mb-0">{{$aboutContent['title']}}</h4>
                <div class="spacer spacer-line border-primary ml-0">&nbsp;</div>
                <div class="spacer">&nbsp;</div>
                <p class="mb-3 text-center">
                    {!!$aboutContent['text']!!}
                </p>
            </div><!-- / column -->
        </div><!-- / row -->
    </div><!-- / container -->
</section><!-- / about -->
<div class="spacer-2x">&nbsp;</div>
@endsection
