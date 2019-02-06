<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Rosart Dashboard</title>

    @include('./inc/css_master')

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
    <!-- Custom styles for this template -->
    <link href="{{asset('tpl/css/dashboard.css')}}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-dark fixed-top bg-dark  p-0 shadow mb-5">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="">Rosart</a>
        <ul class="">
            <li class="">
                <a class="pt-2 " href="{{url('user/signout')}}">Sign out</a>
                <a class="m-3 pt-2" target="_blank" href="{{url('')}}">To site</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/about')}}">
                                About
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/categories')}}">
                                Categories
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/products')}}">
                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/orders')}}">
                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{url('cms/blog')}}">
                                Blog
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                @yield('cms_main_section')
            </main>
        </div>
    </div>
    @include('./inc/js')
</body>

</html>
