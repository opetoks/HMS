<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <title> DELUX HOTEL | Life is beautiful </title>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--=== Slicknav CSS ===-->
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <!--=== Magnific Popup CSS ===-->
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <!--=== Owl Carousel CSS ===-->
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <!--=== Gijgo CSS ===-->
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <!--=== FontAwesome CSS ===-->
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <!--=== Theme Reset CSS ===-->
    <link href="assets/css/reset.css" rel="stylesheet">
    <!--=== AOS CSS ===-->
    <link rel="stylesheet" href="aos-master/dist/aos.css" />
    <!--=== Default CSS ===-->
    <link href="assets/css/default.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!--=== Main Style CSS ===-->
    <link href="style.css" rel="stylesheet">
    <!--=== Responsive CSS ===-->
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Seaweed+Script&display=swap" rel="stylesheet"> 
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvVTRDkVBKwGRLZLB4b-s_gANsV6zrtbY&libraries&libraries=places&callback=initMap"
        async defer></script>
    <style>
        .logotxt{
                color:white;
                font-size:28px;
                font-weight:300;
                float:right;
            }
            @media (min-width: 399px;) {
                 .logotxt{
                color:white;
                font-size:28px;
                font-weight:300;
                float:left;
            }
        }
        .slideshow-container {
		  max-width: 10000px;
		  position: relative;
		  margin: auto;
		  padding: 0px;
		}
        .mySlides {display: none;}
		img {
			vertical-align: middle;
			background-size: cover;
		}
        /* Caption text */
		.text {
		  color: #f2f2f2;
		  font-size: 30px;
		  padding: 8px 12px;
		  position: absolute;
		  bottom: 8px;
		  width: 100%;
		  text-shadow: 4px 4px black;
		  text-align: center;
		}

		/* Number text (1/3 etc) */
		.numbertext {
		  color: #f2f2f2;
		  font-size: 12px;
		  padding: 8px 12px;
		  position: absolute;
		  top: 0;
		}

		/* The dots/bullets/indicators */
		.dot {
		  height: 15px;
		  width: 15px;
		  margin: 0 2px;
		  background-color: white;
		  border-radius: 50%;
		  display: inline-block;
		  transition: background-color 0.6s ease;
		}

		.active {
		  background-color: #717171;
		}

		/* Fading animation */
		.fade {
		  -webkit-animation-name: fade;
		  -webkit-animation-duration: 1.5s;
		  animation-name: fade;
		  animation-duration: 1.5s;
		}

		@-webkit-keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

		@keyframes fade {
		  from {opacity: .4} 
		  to {opacity: 1}
		}

        
        
    
        ul.timeline {
        list-style-type: none !important;
        position: relative;
        }
        p,ul.timeline{
            padding: 0 0 0 15px;
        }
        ul.timeline:before {
            content: ' ';
            background: #d4d9df;
            display: inline-block;
            position: absolute;
            left: 29px;
            width: 2px;
            height: 100%;
            z-index: 400;
        }
        ul.timeline > li {
            margin: 20px 0;
            padding-left: 20px;
        }
        ul.timeline > li:before {
            content: ' ';
            background: white;
            display: inline-block;
            position: absolute;
            border-radius: 50%;
            border: 3px solid #22c0e8;
            left: 20px;
            width: 20px;
            height: 20px;
            z-index: 400;
        }
        @media (max-width: 399px) {
        .mid-button {
            margin: 0 auto;
        }
        .button-small-solid{
            position: absolute;
            left:22%;
            top: 100%;
            margin-top: 10px !important;
        }
        }
    </style>

    <!--[if lt IE 9]>
        <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="loader-active">
    <noscript>
        You need to enable JavaScript to run this app.
    </noscript>
   
    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> Opykin solutions.
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +234(0)703-2270-305
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-clock-o"></i> 24Hrs service
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Social Icons Start ==-->
                    <div class="col-lg-3 text-right">
                        <div class="header-social-icons">
                            <a href="#"><i class="fa fa-behance"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-linkedin"></i></a>
                        </div>
                    </div>
                    <!--== Social Icons End ==-->
                </div>
            </div>
        </div>
        <!--== Header Top End ==-->

        <!--== Header Bottom Start ==-->
        <div id="header-bottom">
            <div class="container">
                <div class="row">
                    <!--== Logo Start ==-->
                    <div class="col-lg-3">
                        <a href="index" class="logo-car">
                            <img src="assets/img/logo-new.png" alt="travelrides"> <div class="logotxt" style=" padding-right:55px;"><span style="font-family: 'Seaweed Script', cursive;">CarpÖ </span></div>
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-9 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <!--<li class="active"><a href="#">Home</a>
                                </li>-->
                                <li><a href="signin">Login</a></li>
                                <li><a href="signup">Register</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>
    <!--== Header Area End ==-->

    <!--== Slider Area Start ==-->
    <div class="slideshow-container">
        <div class="mySlides fade">
        <img id="1" src="images/1.jpg" style="width:100%">
        <div class="text">ENJOY THE DREAM EXPERIENCE</div>
        </div>

        <div class="mySlides fade">
        <img id="2" src="images/2.jpg" style="width:100%">
        <div class="text">REDEfINE LUXURY</div>
        </div>

        <div class="mySlides fade">
        <img id="3" src="images/3.jpg" style="width:100%">
        <div class="text">SAVOUR EVERY SERVE, EVERY SERVICE</div>
        </div>
    </div>
    <br>
		<div style="text-align:center">
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		  <span class="dot"></span> 
		</div>
        <script>
		var slideIndex = 0;
		showSlides();

		function showSlides() {
		  var i;
		  var slides = document.getElementsByClassName("mySlides");
		  var dots = document.getElementsByClassName("dot");
		  for (i = 0; i < slides.length; i++) {
		    slides[i].style.display = "none";  
		  }
		  slideIndex++;
		  if (slideIndex > slides.length) {slideIndex = 1}    
		  for (i = 0; i < dots.length; i++) {
		    dots[i].className = dots[i].className.replace(" active", "");
		  }
		  slides[slideIndex-1].style.display = "block";  
		  dots[slideIndex-1].className += " active";
		  setTimeout(showSlides, 4500); // Change image every 4.5 seconds
		}
		</script>


    <!--== Slider Area End ==-->
    
    <!-- === How it works == -->
    <section class="py-5 bg-light" id="section-about">
        <div class="container">

          <div class="row">
            <div class="col-md-12 col-lg-4 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">
              <img src="assets/img/mobile-app.jpg" alt="Image" class="img-fluid rounded">
            </div>
            <div class="col-md-12 col-lg-8 order-lg-1" data-aos="fade-up"> <!-- data-aos="fade-up" -->
              <h4 class="mb-4" style="color:#000; font-size: 44px; font-weight: bold; font-family: 'Josefin Sans', sans-serif;">How it Works</h4>
              <div class="col-md-12">
              <ul class="timeline">
                <li>
                  <p>Search the people who share similar journey and match criteria.</p>
                </li>
                <li>
                  <p>Check and compare vehicles and drivers offers to seal the best deal and book your ride in few clicks. </p>
                </li>
                <li>
                  <p>Contact the driver, Share and achieve your goal together and pay on the app as soon as your journey is completed. You can also share live events as you go on the journey. </p>
                </li>
              </ul>
              </div>
              <p><a href="#"  data-fancybox class="btn btn-primary text-white py-2 mr-3 text-uppercase letter-spacing-1" style="background: #dc5a14; color: #fff; border: 1px solid #dc5a14">Watch the video <i class="fa fa-play-circle"></i></a></p>
            </div>
            
          </div>
        </div>
    </section>
     <!-- === /How it works == -->
    <section>
        <!-- Footer Bottom Start -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script>  <i class="fa fa-heart-o" aria-hidden="true"></i> <a href="https://opykinsolutions" target="_blank">OPYKIN SOLUTIONS</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom End -->
    </section>
    <!--== Footer Area End ==-->

    <!--== Scroll Top Area Start ==-->
    <div class="scroll-top">
        <img src="assets/img/scroll-top.png" alt="JSOFT">
    </div>
    <!--== Scroll Top Area End ==-->
    
    
    <!--=======================Javascript============================-->
    <!--=== Jquery Min Js ===-->
    <script src="assets/js/jquery-3.2.1.min.js"></script>
    <!--=== Jquery Migrate Min Js ===-->
    <script src="assets/js/jquery-migrate.min.js"></script>
    <!--=== Popper Min Js ===-->
    <script src="assets/js/popper.min.js"></script>
    <!--=== AOS Js ===-->
    <script src="assets/js/aos.js"></script>
    <!--=== Bootstrap Min Js ===-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--=== Gijgo Min Js ===-->
    <script src="assets/js/plugins/gijgo.js"></script>
    <!--=== Vegas Min Js ===-->
    <script src="assets/js/plugins/vegas.min.js"></script>
    <!--=== Isotope Min Js ===-->
    <script src="assets/js/plugins/isotope.min.js"></script>
    <!--=== Owl Caousel Min Js ===-->
    <script src="assets/js/plugins/owl.carousel.min.js"></script>
    <!--=== Waypoint Min Js ===-->
    <script src="assets/js/plugins/waypoints.min.js"></script>
    <!--=== CounTotop Min Js ===-->
    <script src="assets/js/plugins/counterup.min.js"></script>
    <!--=== YtPlayer Min Js ===-->
    <script src="assets/js/plugins/mb.YTPlayer.js"></script>
    <!--=== Magnific Popup Min Js ===-->
    <script src="assets/js/plugins/magnific-popup.min.js"></script>
    <!--=== Slicknav Min Js ===-->
    <script src="assets/js/plugins/slicknav.min.js"></script>

    <!--=== Mian Js ===-->
    <script src="assets/js/main.js"></script>
      <script>
            $(function() {
                $("#datepicker").datepicker({
                minDate : 0,
            });
            });
      </script>
       <script src="aos-master/dist/aos.js"></script>
       <script>
          AOS.init({
            easing: 'ease-in-out-sine'
          });
       </script>

</body>

</html>