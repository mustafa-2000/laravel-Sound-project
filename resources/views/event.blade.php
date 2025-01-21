<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>One Music</title>

    <!-- Favicon -->
    <link rel="icon" href="img/core-img/favicon.ico">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- ##### Header Area Start ##### -->
    <header class="header-area">
        <!-- Navbar Area -->
        <div class="oneMusic-main-menu">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Menu -->
                    <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                        <!-- Nav brand -->
                        <a href="index" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">

                            <!-- Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="index">Home</a></li>
                                    <li><a href="albums">Albums</a></li>
                                    <li><a href="media">Media</a></li>
                                    <li><a href="event">Events</a></li>
                                    <li><a href="blog">News</a></li>
                                    <li><a href="contact">Contact</a></li>
                                </ul>

                                <div style="position: relative; display: inline-block;">
                                    <button 
                                        onclick="toggleDropdown()" 
                                        style=" margin-left:150px ;padding: 10px 20px; border: none; background-color: #c61414; color: white; font-size: 16px; border-radius: 20px; cursor: pointer; transition: background-color 0.3s;">
                                        {{ Auth::user()->name }}
                                        <span style="margin-left: 10px;">▼</span>
                                    </button>
                                
                                    <div id="dropdownMenu" style="display: none; position: absolute; right: 0; margin-top: 5px; background-color: white; border: 1px solid #ddd; border-radius: 5px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); z-index: 1;">
                                        {{-- <a href="{{ route('profile.edit') }}" style="display: block; padding: 10px 20px; color: #333; text-decoration: none; transition: background-color 0.3s;">Profile</a> --}}
                                        <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                                            @csrf
                                            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" style="display: block; padding: 10px 20px; color: #333; text-decoration: none; transition: background-color 0.3s;">Log Out</a>
                                        </form>
                                    </div>
                                </div>
                                
                                <script>
                                    function toggleDropdown() {
                                        const dropdown = document.getElementById('dropdownMenu');
                                        dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
                                    }

                                    window.onclick = function(event) {
                                        const dropdown = document.getElementById('dropdownMenu');
                                        // Check if the click was outside the button and the dropdown
                                        if (!event.target.matches('button') && !dropdown.contains(event.target)) {
                                            dropdown.style.display = 'none';
                                        }
                                    }

                                </script>
                            </div>
                            <!-- Nav End -->

                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url(img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>See what’s new</p>
            <h2>Events</h2>
        </div>
    </section>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Events Area Start ##### -->
    <section class="events-area section-padding-100">
        <div class="container">
            <div class="row">

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e1.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Dj Night Party</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">VIP Sala</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e2.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>The Mission</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Gold Arena</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e3.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Planet ibiza</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Space Ibiza</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e4.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Dj Night Party</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">VIP Sala</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e5.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>The Mission</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Gold Arena</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e6.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Planet ibiza</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Space Ibiza</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e7.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Dj Night Party</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">VIP Sala</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e8.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>The Mission</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Gold Arena</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

                <!-- Single Event Area -->
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="single-event-area mb-30">
                        <div class="event-thumbnail">
                            <img src="img/bg-img/e9.jpg" alt="">
                        </div>
                        <div class="event-text">
                            <h4>Planet ibiza</h4>
                            <div class="event-meta-data">
                                <a href="#" class="event-place">Space Ibiza</a>
                                <a href="#" class="event-date">June 15, 2018</a>
                            </div>
                            <a href="#" class="btn see-more-btn">See Event</a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-12">
                    <div class="load-more-btn text-center mt-70">
                        <a href="#" class="btn oneMusic-btn">Load More <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Events Area End ##### -->

    <!-- ##### Newsletter & Testimonials Area Start ##### -->
    <section class="newsletter-testimonials-area">
        <div class="container">
            <div class="row">

                <!-- Newsletter Area -->
                <div class="col-12 col-lg-6">
                    <div class="newsletter-area mb-100">
                        <div class="section-heading text-left mb-50">
                            <p>See what’s new</p>
                            <h2>Subscribe to newsletter</h2>
                        </div>
                        <div class="newsletter-form">
                            <form action="#">
                                <input type="search" name="search" id="newsletterSearch" placeholder="E-mail">
                                <button type="submit" class="btn oneMusic-btn">Subscribe <i class="fa fa-angle-double-right"></i></button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Testimonials Area -->
                <div class="col-12 col-lg-6">
                    <div class="testimonials-area mb-100 bg-img bg-overlay" style="background-image: url(img/bg-img/bg-3.jpg);">
                        <div class="section-heading white text-left mb-50">
                            <p>See what’s new</p>
                            <h2>Testimonial</h2>
                        </div>
                        <!-- Testimonial Slide -->
                        <div class="testimonials-slide owl-carousel">
                            <!-- Single Slide -->
                            <div class="single-slide">
                                <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum.</p>
                                <div class="testimonial-info d-flex align-items-center">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/t1.jpg" alt="">
                                    </div>
                                    <p>William Smith, Customer</p>
                                </div>
                            </div>
                            <!-- Single Slide -->
                            <div class="single-slide">
                                <p>Nam tristique ex vel magna tincidunt, ut porta nisl finibus. Vivamus eu dolor eu quam varius rutrum. Fusce nec justo id sem aliquam fringilla nec non lacus. Suspendisse eget lobortis nisi, ac cursus odio. Vivamus nibh velit, rutrum.</p>
                                <div class="testimonial-info d-flex align-items-center">
                                    <div class="testimonial-thumb">
                                        <img src="img/bg-img/t1.jpg" alt="">
                                    </div>
                                    <p>Nazrul Islam, Developer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ##### Newsletter & Testimonials Area End ##### -->

    <!-- ##### Contact Area Start ##### -->
    <section class="contact-area section-padding-100 bg-img bg-overlay bg-fixed has-bg-img" style="background-image: url(img/bg-img/bg-2.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-heading white">
                        <p>See what’s new</p>
                        <h2>Get In Touch</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <!-- Contact Form Area -->
                    <div class="contact-form-area">
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="name" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="email" placeholder="E-mail">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" class="form-control" id="message" cols="30" rows="10" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-12 text-center">
                                    <button class="btn oneMusic-btn mt-30" type="submit">Send <i class="fa fa-angle-double-right"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Contact Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    <footer class="footer-area">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-12 col-md-6">
                    <a href="#"><img src="img/core-img/logo.png" alt=""></a>
                    <p class="copywrite-text"><a href="#"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>

                <div class="col-12 col-md-6">
                    <div class="footer-nav">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Albums</a></li>
                            <li><a href="#">Events</a></li>
                            <li><a href="#">News</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="js/active.js"></script>
</body>

</html>