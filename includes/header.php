<?php
ob_start();
session_start();
include "classes/config.php";
include "classes/functions.php";
if($db->is_logged_in()!="")
{ $user_id = $_SESSION['uid'];
$name = info($user_id, "fullname");
$creditBalance = info($user_id, "ewallet");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LUXURY HOTEL | Life is beautiful</title>
     <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/plugins/slicknav.min.css" rel="stylesheet">
    <link href="assets/css/plugins/magnific-popup.css" rel="stylesheet">
    <link href="assets/css/plugins/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/css/plugins/gijgo.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/reset.css" rel="stylesheet">
    <link rel="stylesheet" href="aos-master/dist/aos.css" />
    <link href="assets/css/default.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link href="style.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Seaweed+Script&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <script src="assets/js/roomListModal.js"></script>
    <style>
        body {
            margin: 0px;
        }
        .logotxt{
                color:white;
                font-size:28px;
                font-weight:300;
                float:right;
            }
            @media (min-width: 399px) {
                 .logotxt{
                color:white;
                font-size:28px;
                font-weight:300;
                float:left;
            }
        }
        
        /*== Header Top CSS Start ==*/

        #header-area,
        #header-area a {
            color: #fff;
        }

        #header-top {
            background-color: #1e2228;
            padding: 8px 0;
        }

        #header-top i {
            color: #ffd000;
            font-size: 15px;
            margin-right: 2px;
        }

        #header-area .header-social-icons a i.fa {
            color: #fff;
            font-size: 15px;
            margin-left: 10px;
            -webkit-transition: 0.4s;
            transition: 0.4s;
        }

        #header-area .header-social-icons a:hover i.fa,
        #header-area .mainmenu ul li.active a,
        #header-area .mainmenu ul li:hover a {
            color: #ffd000;
        }

        header.fixTotop #header-top {
            display: none !important;
        }

        /*== Header Top CSS End ==*/

        /*== Header Bottom CSS Start ==*/

        #header-bottom {
            background-color: rgba(09,41,98,0.9);
            padding: 15px 0;
            -webkit-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }

        header.fixTotop #header-bottom {
            background-color: rgba(0, 0, 0, 1);
            -webkit-transition: all 0.4s ease 0s;
            transition: all 0.4s ease 0s;
        }
        .title {
            color:#000; 
            font-size: 44px; 
            font-weight: bold; 
            font-family: 'Josefin Sans', sans-serif;
            text-align: center;
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
        /* === rooms === */
        .gallery
        {
            display: inline-block;
            margin-top: 20px;
        }
        .btnDiv {
            position: absolute;
            z-index: 1;
            left: 40%;
            top: 60%;
        }
        .detailBtn {
            margin-top: 4rem;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: #fff;
            background: rgba(09,41,98,0.9);
            font-size: 15px;
            font-family: inherit;
            letter-spacing: .2rem;
            transition: .2s;
        }
        .viewdetailBtn {
            margin-top: 2rem;
            padding: 15px;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: #fff;
            background: rgba(09,41,98,0.9);
            font-size: 15px;
            font-family: inherit;
            letter-spacing: .2rem;
            transition: .2s;
        }
        .sliderBtn {
            margin-top: 4rem;
            padding: 25px;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: #fff;
            background: rgba(09,41,98,0.9);
            font-size: 26px;
            font-weight: bold;
            font-family: inherit;
            letter-spacing: .2rem;
            transition: .2s;
        }
        @media (max-width: 399px) {
        .btnDiv {
            margin: 0 auto;
            position: absolute;
            z-index: 1;
            left: 30%;
            top: 30%;
        }
        .detailBtn {
            margin-top: 4rem;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: #fff;
            background: rgba(09,41,98,0.9);
            font-size: 12px;
            font-family: inherit;
            letter-spacing: .2rem;
            transition: .2s;
            
        }
        .viewdetailBtn {
            margin-top: 2rem;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 100rem;
            color: #fff;
            background: rgba(09,41,98,0.9);
            font-size: 12px;
            font-family: inherit;
            letter-spacing: .2rem;
            transition: .2s;
            
        }
}

    </style>
</head>
<body>
    <!--== Header Area Start ==-->
    <header id="header-area" class="fixed-top">
        <!--== Header Top Start ==-->
        <div id="header-top" class="d-none d-xl-block">
            <div class="container">
                <div class="row">
                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-left">
                        <i class="fa fa-map-marker"></i> Luxury Hotel.
                    </div>
                    <!--== Single HeaderTop End ==-->

                    <!--== Single HeaderTop Start ==-->
                    <div class="col-lg-3 text-center">
                        <i class="fa fa-mobile"></i> +234(0)703-2270-3050
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
                    <div class="col-lg-6">
                        <a href="index" class="logo-car">
                             <div class="logotxt" style=" padding-right:55px;"><span style="font-family: 'Seaweed Script', cursive;">LUXURY HOTEL</span></div>
                        </a>
                    </div>
                    <!--== Logo End ==-->

                    <!--== Main Menu Start ==-->
                    <div class="col-lg-6 d-none d-xl-block">
                        <nav class="mainmenu alignright">
                            <ul>
                                <!--<li class="active"><a href="#">Home</a>
                                </li>-->
                               <?php if(isset($_SESSION['uid'])) {
                                   echo '<li><a href="clients"><i class="fa fa-user"></i>  '.info($user_id, "fullname").'</a></li>
                                         <li><a href="clients"><i class="fa fa-credit-card"></i>  ₦'.number_format(info($user_id, "ewallet")).'.00 </a></li>
                                         <li><a href="logout.php"><i class="fa fa-sign-out"></i> Logout </a></li>';
                                }else{ 
                                echo '<li><a href="clients">Login</a></li>
                                <li><a href="clients">Register</a></li>';
                               }
                               ?>
                            </ul>
                        </nav>
                    </div>
                    <!--== Main Menu End ==-->
                </div>
            </div>
        </div>
        <!--== Header Bottom End ==-->
    </header>