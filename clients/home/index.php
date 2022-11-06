<?php
ob_start();
session_start();
include "../../classes/config.php";
include "../../classes/functions.php";
if($db->is_logged_in() =="")
{ 
  $db->redirect('../');  
}else{
$user_id = $_SESSION['uid'];
$name = info($user_id, "fullname");
$creditBalance = info($user_id, "ewallet");
}
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="Luxury Hotel">
    <meta name="Description" content="Luxury Hotel"> 
    <title>Luxury Hotel |  <?php echo info($user_id,'fullname');  ?>'s Profile Page</title> 
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="cart.css">
</head>
<body> 
    <!-- Navigation bar and user notifications -->    
    <nav class="navbar navbar-custom p-3">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-2 mb-lg-0 flex-wrap flex-md-nowrap">
            <a class="navbar-brand" href="#">
            <b>LUXURY HOTEL & SUITS</b>
            </a>
            <div class="navbar-toggler ml-auto d-md-none collapsed mb-3 custom-toggler"
            type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </div>
        </div>
        
        <div class="col-12 col-md-4 col-lg-2">
        <!-- <span>Occupied Rooms: </span>
        <h6>
        <span class="header-wallet-ico" style="color: #87d682;"><i class="fas fa-home"></i>
            6</span>   
        </h6> -->
        </div>
        <div class="col-12 col-md-4 col-lg-2">
        <!-- <div class="mr-5">
            <span> Available Rooms </span>
            <h6 style="color: #7ad9e3;">
            <span class="header-wallet-ico" style="color: #87d682;"><i class="fas fa-home"></i>
                    <?php 
                    //echo $creditBalance
                    ?> 
            </span> 20 </h6>   
            </div> -->
        </div> 
        <div class="col-12 col-md-4 col-lg-2">
        <div class="mr-5">
            <span> Credit Balance: </span>
            <h6 style="color: #7ad9e3;">
            <span class="header-wallet-ico" style="color: #87d682;">
            <i class="fas fa-currency"></i>
            </span> 
                ₦ <?php echo number_format($creditBalance); ?>
            </h6>   
            </div> 
        </div>
        <div class="col-12 col-md-4 col-lg-2 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div class="dropdown" style="background-color:white; color: #001c71;">
            <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Welcome! <?php echo info($user_id,'fullname'); ?>
            </div>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <li><a class="dropdown-item" href="?profile"><i class="fas fa-user"></i>Profile</a></li>
                <li><a class="dropdown-item" href="?logout"><i class="fas fa-sign-out-alt"></i>Sign out</a></li>
            </ul>
            </div>
        </div>
        </nav>


         <!-- the side bar -->  
    <div class="container-fluid">
    <div class="row">
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <!-- sidebar content goes in here -->  
            <div class="position-sticky pt-md-5">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="?">
                        <i class="fas fa-tachometer-alt"></i>
                        <span class="ml-2">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['clients'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?clients">
                    <i class="fas fa-book"></i>
                    <span class="ml-2"> Booking history </span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['roomslist'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?viewrooms">
                    <i class="fas fa-bed"></i>
                    <span class="ml-2"> View Available rooms </span>
                    </a>
                </li>
                
                </ul>
            </div>
        </nav>

        <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4"> 
            <!-- page insertions -->

                <?php
                    if(isset($_GET['addrooms'])){
                        require("addrooms.php");
                    }
                    elseif(isset($_GET['rooms'])){
                        require("rooms.php");
                    }
                    
                    elseif(isset($_GET['logout'])){
                    SESSION_UNSET(); // this unset every session and thus logs the user out
                    header('Location:../');
                    }
                    else{
                        echo'
                        <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                        </nav>

                        <div class="wallet-box-scroll"> 
                        <div class="wallet-bradcrumb">
                            <h2><i class="fas fa-bed"></i> Rooms in your cart </h2>  
                        </div>
                        ';
                        }
                    $stmt = $db->query("SELECT * FROM booking_cart WHERE user_id = ?",[$user_id]);
                    while($row = $stmt->fetch()){
                        ?>
                        <div class="card">
                                <div class="container-fliud">
                                    <div class="wrapper row">
                                        <div class="preview col-md-6">
                                            
                                            <div class="preview-pic tab-content">
                                            <div class="tab-pane active" id="pic-1"><img src="../../images/rooms/<?php echo $row['roomImg']; ?>" with="400" /></div>
                                            </div>
                                            <ul class="preview-thumbnail nav nav-tabs">
                                            <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="../../images/rooms/<?php echo $row['roomImg']; ?>" /></a></li>
                                            </ul>
                                            
                                        </div>
                                        <div class="details col-md-6">
                                            <h3 class="product-title"> <?php echo $row['roomType']; ?>  </h3>
                                            <div class="rating">
                                                <div class="stars">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </div>
                                                <span class="review-no">41 reviews</span>
                                            </div>
                                            <p class="product-description"> <?php //echo $roomDescription; ?></p>
                                            <h4 class="price">current price: <span>₦ <?php echo number_format($row['price']); ?></span></h4>
                                            
                                            <div class="action">
                                                <button class="add-to-cart btn btn-default" type="button">Proceed to pay</button>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                     }
                       
                ?>
        <?php
        if(!empty($error)){
            echo"<script type='text/javascript'>
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '".$error."!',
                    footer: '<a>Try again</a>'
                    })
                </script>";
                }else{}
            if(!empty($success)){
                echo"<script type='text/javascript'>
                    Swal.fire({
                        icon: 'success',
                        title: 'Great!',
                        text: '".$success."!',
                        footer: '<a>Continue</a>'
                        })
                    </script>";
        }else{}
        ?>
        </main>
        <!-- logout model area -->
        <div id="logout" class="modal fade remove-theme-popup" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><i class="fas fa-times"></i></button>
                    <div class="remove-popup">
                        <h3>Are you sure want to logout ?</h3>
                        <div class="remove-popuo-btn clearfix">
                            <button class="remove-btn cancel-btn" data-dismiss="modal">Cancel</button>
                            <a href="?logout" type="button" class="remove-btn" data-dismiss="modal">Logout</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- logout model area -->
        
        <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#pics').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>    
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>  
<script src="assets/js/custom.js"></script>
</body>
</html>
  
