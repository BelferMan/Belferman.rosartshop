<script src="{{asset('tpl/js/jquery.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb"
    crossorigin="anonymous"></script>

<script src="{{asset('tpl/js/bootstrap.min.js')}}"></script>
<!-- / Core JavaScript -->



<!-- preloader -->
<script src="{{asset('tpl/js/preloader.js')}}"></script>
<!-- / preloader -->

<!-- gallery Script -->
<script src="{{asset('tpl/js/jquery.shuffle.min.js')}}"></script>
<script src="{{asset('tpl/js/gallery.js')}}"></script>

<script>
    $(document).ready(function () {
        if (Modernizr.touch) {
            // show the close overlay button
            $(".close-overlay").removeClass("hidden");
            // handle the adding of hover class when clicked
            $(".img").click(function (e) {
                if (!$(this).hasClass("hover")) {
                    $(this).addClass("hover");
                }
            });
            // handle the closing of the overlay
            $(".close-overlay").click(function (e) {
                e.preventDefault();
                e.stopPropagation();
                if ($(this).closest(".img").hasClass("hover")) {
                    $(this).closest(".img").removeClass("hover");
                }
            });
        } else {
            // handle the mouseenter functionality
            $(".img").mouseenter(function () {
                    $(this).addClass("hover");
                })
                // handle the mouseleave functionality
                .mouseleave(function () {
                    $(this).removeClass("hover");
                });
        }
    });

</script>
<!-- / gallery Script -->

<!-- Owl Carousel -->
<script src="{{asset('tpl/js/owl.carousel.min.js')}}"></script>
<script>
    $('#product-slider').owlCarousel({
        loop: false,
        margin: 10,
        smartSpeed: 1000,
        nav: true,
        dots: true,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>",
            "<i class='fas fa-long-arrow-alt-right'></i>"
        ],
        items: 1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })

</script>

<script>
    $('#product-slider-2').owlCarousel({
        loop: false,
        margin: 10,
        smartSpeed: 1000,
        nav: true,
        dots: true,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>",
            "<i class='fas fa-long-arrow-alt-right'></i>"
        ],
        items: 1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })

</script>

<script>
    $('#product-slider-3').owlCarousel({
        loop: false,
        margin: 10,
        smartSpeed: 1000,
        nav: true,
        dots: true,
        navText: ["<i class='fas fa-long-arrow-alt-left'></i>",
            "<i class='fas fa-long-arrow-alt-right'></i>"
        ],
        items: 1,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut'
    })

</script>

<script>
    $('#clients-carousel').owlCarousel({
        loop: true,
        margin: 100,
        dots: false,
        autoplay: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

</script>
<!-- / Owl Carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@if(Session::has('showMassege'))
<script>
    toastr.success("{{Session::get('showMassege')}}")

</script>
@elseif(Session::has('emptyCart'))
<script>
    toastr.warning("{{Session::get('emptyCart')}}")

</script>
@endif
<script src="{{asset('tpl/js/validation.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-lite.js"></script>
<script>
    $('#text').summernote({
        height: 250
    });

</script>
