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
    <body data-spy="scroll" data-target="#template-navbar">
        <!--== 4. Navigation ==-->
        <nav id="template-navbar" class="navbar navbar-default custom-navbar-default navbar-fixed-top">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Food-fair-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img id="logo" src="" alt="" class="logo img-responsive">
                    </a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="Food-fair-toggle">
                    <ul class="nav navbar-nav navbar-right">
                    <li> @include('layouts.partial.message')</li>
                        <li><a href="#about">About</a></li>
                        <li><a href="#menu-list">Product</a></li>
                        <li><a href="#have-a-look">Projects</a></li>
                        <li><a href="#event">Event</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><button type="button" class="btn button" data-toggle="modal" data-target="#exampleModalScrollable">Get Quotation</button></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>


    <!--== 5. Header ==-->
    <section id="header-slider" class=" owl-carousel item">
        @foreach($sliders as $key=>$slider)
            <div class="item">
                <div class="container">
                    <div class="header-content">
                        <h1 class="header-title">{{ $slider->title }}</h1>
                        <p class="header-sub-title">{{ $slider->sub_title }}</p>
                    </div> <!-- /.header-content -->
                </div>
            </div>
        @endforeach
    </section>
    
    <section id="clients">
        <div class="container">
            <div class="row wow animated bounceInLeft" data-wow-duration="2s"data-wow-delay=".5s">
                <div class="col-md-12 clien "> 
                    <div id="client-list" class="owl-carousel owl-theme clients" style="margin-bottom: 59px;" > 
                        @foreach($partners as $partner)
                            <div class="client">
                                <img src="{{ asset('uploads/partner/'.$partner->image) }}" class="img-responsive" alt="client">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section id="about" class="about">
        <!-- about right side with diagonal BG parallel-->
        <div id="about-bg-diagonal" class="bg-parallax"></div> 

        <!-- About left side with content-->
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div id="content-box">
                        <div id="about-content-box-outer">
                            <div id="about-content-box-inner">
                                <div class="content-title wow animated fadeInDown" data-wow-duration="2s"data-wow-delay=".5s">
                                    <h3> About Us </h3>
                                    <div class="content-title-underline"></div> 
                                        <div id="about-desc" class=" wow animated fadeInDown" data-wow-duration="2s"data-wow-delay=".5s">
                                        @foreach($abouts as $about)
                                            <p class="">
                                                {{$about->body}}
                                            </p>
                                        @endforeach
                                    </div>
                                    <div id="about-btn" class="wow animated fadeInUp" data-wow-duration="2s"data-wow-delay=".5s">
                                        <button type="button" class="btn btn-lg btn-general btn-blue" data-toggle="modal" data-target="#exampleModalScrollable">Get Quotation</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--==  7. Afordable Pricing  ==-->
    <section id="menu-list" class="menu-list">
        <div id="w">
            <div class="pricing-filter">
                <div class="pricing-filter-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="section-header">
                                    <h2 class="pricing-title">Our Products</h2>
                                    <ul id="filter-list" class="clearfix">
                                        <li class="filter" data-filter="all">All</li>
                                        @foreach($categories as $category)
                                            <li class="filter" data-filter="#{{$category->slug}}">{{ $category->name }} <span class="badge">{{ $category->products->count() }}</span></li>
                                        @endforeach
                                    </ul><!-- @end #filter-list -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <ul id="menu-pricing" class="menu-price">
                            @foreach($products as $product)
                                <li class="item" id="{{ $product->category->slug }}">
                                    <a href="#">
                                        <img src="{{ asset('uploads/product/'.$product->image) }}" class="img-responsive" alt="Product" style="height: 300px; width: 300px;" >
                                        <div class="menu-desc text-center">
                                                <span>
                                                    <h3>{{ $product->name }}</h3>
                                                    {{ $product->description }}
                                                </span>
                                        </div>
                                    </a>
                                    <h2 class="white">{{ $product->name  }}</h2>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--== 14. Have a look to our project ==-->

    <section id="have-a-look" class="have-a-look hidden-xs">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="menu-gallery" style="width: 50%; float:left;">
                        <div class="flexslider-container">
                            <div class="flexslider">
                                <ul class="slides">
                                    @foreach($projects as $project)
                                        <li>
                                            <img src=" {{asset('uploads/project/'.$project->image)}} " />
                                        </li>
                                    @endforeach
                                </ul>  
                            </div>
                        </div>
                    </div>
                    <div class="gallery-heading hidden-xs color-bg" style="width: 50%; float:right;">
                        <h2 class="section-title">Have A Look To Our Projects</h2>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </div> <!-- /.wrapper -->
    </section>


    <section class="event" id="event">
        <div class="bg-video">
            <video class="bg-video_content" autoplay muted loop>
                <source src="{{asset('images/bg-video.mp4')}}"type="video/mp4"/>
                <source src="img/video.webm"type="video/webm"/>
                your browser not supported
            </video>
        </div>
        <div class="box-area">
            @foreach($events as $event)
                <div class="box-card">
                    <input type="checkbox" name="">
                    <div class="toggle">+</div>
                    <div class="imgBx"><img src=" {{asset('uploads/event/'.$event->image)}} " alt="{{$event->title}}"> </div>
                    <div class="details">
                          <h2>{{$event->title}}</h2>
                        <p>{{$event->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <section class="quotation" id="quotation">
        <!-- Modal -->
        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalScrollableTitle">Quotation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('quotation.send') }}">
             {{ csrf_field() }}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Select Product</label>
                                <select class="form-control" name="product">
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Full Name</label>
                                <input type="text" class="form-control empty iconified" name="fullname"  placeholder="Full Name" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control empty iconified" name="email" value="" placeholder="E-mail" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Phone</label>
                                <input type="tel" class="form-control empty iconified" name="phone" placeholder="Phone" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Addess</label>
                                <input type="text" class="form-control empty iconified" name="address" placeholder="address" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Country</label>
                                <input type="text" class="form-control empty iconified" name="country" value="" placeholder="Country" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">Message</label>
                                <textarea type="text" class="form-control empty iconified" name="message" value="" placeholder="message" ></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="submit" name="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    </section>
    <footer>
        <div id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div id="contact-left">
                            <h3> Global Fast World</h3>
                            <p>We believe in <strong>Simple</strong>, <strong>Clean</strong> & <strong>Modern</strong> Design Standard with Responsive Approach.<br> Browse the amazing work of our company.</p>
                            <div id="contact-info">
                                <address> 
                                    <strong>Headquaters:</strong><br>
                                    <p>17 Olayiwola Street, New Oko-Oba Abule-Egba<br> Lagos Nigeria</p>
                                </address>
                                    <div id="phone-fax-email">
                                        <strong>Phone: </strong><span>(234) 8081589468, (234) 8083021943 </span><br>
                                        <strong>Email: </strong><span>info@globalfastworld.org</span><br>
                                    </div> 
                            </div> 
                                <ul class="social-list">
                                    <li><a href="###" class="social-icon icon-white"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="###" class="social-icon icon-white"><i class="fa fa-twitter"></i></a></li>
                                </ul>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div id="contact-right">
                            <h3>Contact Us</h3>
                            <form class="contact-form" method="post" action="{{ route('contact.send') }}">
                                @csrf
                                <input type="text" name="fullname" placeholder="Full Name" class="form-control">
                                <input type="email" name="email" placeholder="Email" class="form-control">
                                <input type="subject" name="subject" placeholder="Subject" class="form-control">
                                <textarea rows="5" name="message" placeholder="Talk to us" class="form-control"></textarea>

                                <div id="send-btn">
                                    <button type="submit" id="submit" name="submit" class="btn btn-lg btn-general btn-blue">Send </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
            <div id="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="footer-copyrights">
                                <p>Copyrights &copy; 2019 Global Fast World. All Right Reserved <a href="twitter.com/juisdev">Developed by JuisDev</a> </p>
                            </div>
                        </div>
                <div class="col-md-6">
                    <div id="footer-menu">
                        <ul>
                            <li><a href="#about">About</a></li>
                            <li><a href="#menu-list">Product</a></li>
                            <li><a href="#have-a-look">Projects</a></li>
                            <li><a href="#event">Event</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>	
        <a href="#home" id="back-to-top" class="btn btn-sm btn-blue btn-back-to-top smooth-scroll" title="home" role="button"><i class="fa fa-angle-up"></i></a>
    </footer>

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