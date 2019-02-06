@extends('master')
@section('main-section')

<div class="container">
    <header class="blog-header parallax">
        <div class="header-content dark text-center">
            <h1 class="header-title mb-0">BLOG</h1>
            <p class="inner-space mb-0">Read about what really matters!</p>
        </div><!-- / header-content -->
    </header>
</div><!-- / container -->

<div class="spacer-2x">&nbsp;</div>

<section id="posts">
    <div class="container">
        <div class="row">
            <div class="col-md-8 blog-content">

                @foreach($blogs as $blog)
                <div class="blog block mb-5">

                    <div class="post-content">
                        <div class="post-meta">
                            <p class="text-sm"><i class="far fa-clock text-primarymr-1 mr-2"></i>{{date('d/m/Y -
                                H:i',strtotime($blog->updated_at))}}</p>
                        </div><!-- / post-meta -->
                        <h3 class="post-title">{{$blog->title}}</h3>
                        <p class="mb-3">{!!$blog->article!!}</p>
                    </div><!-- / post-content -->
                </div><!-- / blog-block -->
                @endforeach
                <div class="spacer">&nbsp;</div>
            </div>

            <div class="col-md-4 blog-sidebar mt-3">
                <div class="sidebar-widget">
                    <div class="about-widget">
                        <h4 class="widget-title text-center">ABOUT ME</h4>
                        <div class="about-image text-center">
                            <img src="{{asset('tpl/images/vered.jpg')}}" alt="">
                        </div><!-- / about-image -->
                        <p class="text-center">Quisque tincidunt sodales ante, nec porttitor sem pharetra vitae.
                            Nullam
                            quis dui sit amet lectus facilisis iaculis pulvinar.</p>
                    </div><!-- / about-widget -->
                </div><!-- / sidebar-widget -->
            </div><!-- / blog-sidebar -->
        </div><!-- / row -->
    </div><!-- / container -->
</section><!-- / posts -->
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center ml-auto">
            {{ $blogs->links() }}
        </div>
    </div>
</div>
@endsection
