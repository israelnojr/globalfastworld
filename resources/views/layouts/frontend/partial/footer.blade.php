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
                                    <li><a href="###" class="social-icon icon-white"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a href="###" class="social-icon icon-white"><i class="fa fa-instagram"></i></a></li>
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
                            <p>Copyrights &copy; 2019 Global Fast World. All Right Reserved <a href="http://twitter.com/juisdev">Developed by JuisDev</a> </p>
                        </div>
                    </div>
                <div class="col-md-6">
                <div id="footer-menu">
                    <ul>
                        <li><a href="#about">About</a></li>
                        <li><a href="{{ route('category.products') }}">Product</a></li>
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
