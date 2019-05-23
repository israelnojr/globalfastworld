<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- <link rel="shortcut icon" href="images/star.png" type="favicon/ico" /> -->

        <title>Global Fast Word Fire Service Company</title>

        <link rel="stylesheet" href=" {{asset('frontend/css/bootstrap.min.css')}} ">
        <link rel="stylesheet" href=" {{asset('frontend/css/font-awesome.min.css')}} ">
        <link rel="stylesheet" href=" {{asset('frontend/css/owl.carousel.css')}} ">
        <link rel="stylesheet" href=" {{asset('frontend/css/owl.theme.css')}} ">
        <link rel="stylesheet" href=" {{asset('frontend/css/animate.css')}} ">
        <link rel="stylesheet" href=" {{asset('frontend/css/flexslider.css')}} ">
        <link rel="stylesheet" href="{{asset('frontend/css/pricing.css')}} ">
        <link rel="stylesheet" href="{{asset('frontend/css/main.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

        <style>
            #contact-info{
            background-image: url({{asset('images/world-map.PNG')}});
            background-repeat: no-repeat;
            background-size: contain;
            }
        </style>
        <style>
            @foreach($sliders as $key=>$slider)
            .owl-wrapper .owl-item:nth-child({{ $key + 1 }}) .item{
                    background: url({{ asset('uploads/slider/'.$slider->image) }});
                    background-size: cover;
                    height: 86vh;
                }
            @endforeach
        </style>
        
        <style>
            @foreach($abouts as $about)
                #about-bg-diagonal{
                    width: 60%;
                    height: 700px;
                    float: right;
                    background-image: url({{asset('uploads/about/'.$about->image)}});
                    border-left: 200px solid #fff;
                    border-top: 700px solid transparent;
                }
            @endforeach
        </style>
        <script src=" {{asset('frontend/js/jquery-1.11.2.min.js')}} "></script>
        <script type="text/javascript" src="{{asset('frontend/js/jquery.flexslider.min.js')}}"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('.flexslider').flexslider({
                 animation: "slide",
                 controlsContainer: ".flexslider-container"
                });
            });
        </script>
    </head>
    <body>
    <div id="app">
        <div class="wrapper">
            <div class="main-panel">
                @include('layouts.frontend.partial.header')
        
                @yield('content')
            
                @include('layouts.frontend.partial.footer')
            </div>
        </div>
    </div>

    <script src=" {{asset('frontend/js/bootstrap.min.js')}} "></script>
        <script src=" {{asset('frontend/js/owl.carousel.min.js')}} "></script>
        <script type="text/javascript" src=" {{asset('frontend/js/jquery.mixitup.min.js')}} " ></script>
        <script src=" {{asset('frontend/js/wow.min.js')}} "></script>
        <script src=" {{asset('frontend/js/jquery.validate.js')}} "></script>
        <script type="text/javascript" src=" {{asset('frontend/js/jquery.hoverdir.js')}} "></script>
        <script type="text/javascript" src=" {{asset('frontend/js/jQuery.scrollSpeed.js')}} "></script>
        <script src=" {{asset('frontend/js/script.js')}} "></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
            <script>
                toastr.error('{{ $error }}');
            </script>
        @endforeach
        @endif
        <script>
    </body>
</html>