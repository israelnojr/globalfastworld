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
                        <li><a href="{{route('category.products')}}">Product</a></li>
                        <li><a href="#have-a-look">Projects</a></li>
                        <li><a href="#event">Event</a></li>
                        <li><a href="#contact">Contact</a></li>
                        <li><button type="button" class="btn button" data-toggle="modal" data-target="#exampleModalScrollable">Get Quotation</button></li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.row -->
        </nav>

