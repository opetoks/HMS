<?php
ob_start();
error_reporting(E_ALL);
ini_set('error_log', 'error.log');
set_error_handler("var_dump");
session_start();
include('../config/connect_db.php');
include('../config/functions.php');
if(!isset($_SESSION['userRole'])){
    header('Location: ../index.php');
}
$adminRole = $_SESSION['userRole'];
$id = $_SESSION['uid'];

if(isset($_POST['addRoombtn'])){
    //print_r($_POST);
    $roomid = protect($_POST['room_id']);
    $status = trim($_POST['availability']);
    $roomDesc = htmlspecialchars($_POST['roomDescription']);
    $roomCategory = trim($_POST['roomCategory']);
    $price = protect($_POST['price']);
    
    try {
        $stmt = $db->prepare("SELECT roomNo FROM Rooms WHERE roomNo = '$roomid'");
        $stmt->execute();
        if($stmt->rowCount() > 0){
            $error = "Room number already exist";
        }
        else{
            if(isset($_FILES['fileToUpload'])){
		    $basename = $_FILES["fileToUpload"]['name'];
		    $imageFileType = strtolower(pathinfo($basename,PATHINFO_EXTENSION));
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){
                $error ="File extension must be JPG, PNG or JPEG";
                    //header('refresh:2; addrooms.php');
            }
            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
                $error ='File size is too high!';
                        //header('refresh:2; addrooms.php');
            }
       
            $pic_file = $_FILES["fileToUpload"]['tmp_name'];
            $dest_file = "../../images/rooms/".$basename;
            move_uploaded_file($pic_file, $dest_file) or die('The Upload is not successful, Please try again');
            chmod($dest_file,0644);
            $query = $db->prepare("INSERT INTO Rooms SET roomPICT = '$basename', roomNo = '$roomid', 
            roomDescription ='$roomDesc',roomType = '$roomCategory',price = '$price', Rstatus = '$status'");
                if($query->execute()){
                            $success = 'Room is successfully Updated';
                        }
                        else{
                            $error ='Content is not submitted, pls check';
                        }
    } 
}
}catch (Exception $e) {
         die($e->getMessage());
    }
    
}

if (isset($_GET['del'])) {
    $post_del = protect($_GET['del']);
    $del_query = $db->prepare("DELETE FROM Rooms WHERE roomID='$post_del'");
    $del_query->execute();
    if ($del_query->rowCount()> 0) {
        $success = 'Room successfully deleted';
        header('refresh:2; ?rooms');
    }
    else {
     /*echo "<script>alert('error occured.try again!');</script>";*/
     $error = 'Something went wrong,no data seleted';
    }
    }
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="Luxury Hotel">
    <meta name="Description" content="Luxury Hotel"> 
    <title>Luxury Hotel |  <?php echo info($id,'userRole');  ?>'s Profile Page</title> 
    <link rel="stylesheet" type="text/css" href="css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">     
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
         .bnlink {
            font-size: 1.5em;
            font-family: serif;
            color: #00FF00; /*#008000;*/ 
            text-align: center;
            animation: animate 
                2.5s linear infinite;
         }
         @keyframes animate {
            0% {
                opacity: 0;
            }
  
            50% {
                opacity: 0.9;
            }
  
            100% {
                opacity: 0;
            }
        }
      </style>
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
                    //echo balanceBIM($tosetaccount);
                    ?> 
            </span> 20 </h6>   
            </div> -->
        </div> 
        <div class="col-12 col-md-4 col-lg-2">
        <!-- <div class="mr-5">
            <span> Booking Range/Day: </span>
            <h6 style="color: #7ad9e3;">
            <span class="header-wallet-ico" style="color: #87d682;">
            <i class="fas fa-currency"></i>
            </span> 
            N8,000 - N50,000 
            </h6>   
            </div>  -->
        </div>
        <div class="col-12 col-md-4 col-lg-2 d-flex align-items-center justify-content-md-end mt-3 mt-md-0">
        <div class="dropdown" style="background-color:white; color: #001c71;">
            <div class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-expanded="false">
                Welcome! <?php echo info($id,'userRole'); ?>
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
                    <i class="fas fa-users"></i>
                    <span class="ml-2"> Customers</span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['rooms'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?rooms">
                    <i class="fas fa-bed"></i> 
                    <span class="ml-2">Rooms List</span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['addrooms'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?addrooms">
                    <i class="fas fa-plus"></i> 
                    <span class="ml-2">Update Rooms</span> 
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['bookings'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?bookings">
                    <i class="fas fa-book"></i>
                    <span class="ml-2"> Bookings </span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['staff'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?staff">
                    <i class="fas fa-users"></i>
                    <span class="ml-2">Staff List</span>
                    </a>
                </li>
                <li class="nav-item <?php if(isset($_GET['rewards'])){ echo 'active'; }?>">
                    <a class="nav-link" href="?rewards">
                    <i class="fas fa-gift"></i>
                    <span class="ml-2">Rewards</span>
                    </a>
                </li>  
                <li class="nav-item">
                    <a class="nav-link" href="" data-toggle="modal" data-target="#logout">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="ml-2">Sign out</span>
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
                    elseif(isset($_GET['staff'])){
                        require("staff.php");
                    }
                    elseif(isset($_GET['addstaff'])){
                        require("addstaff.php");
                    }
                    elseif(isset($_GET['clients'])){
                        require("customers.php");
                    }
                    elseif(isset($_GET['sendto'])){
                        require("transfercoin.php");
                    }
                    elseif(isset($_GET['market'])){
                        require("trade.php");
                    }
                    elseif(isset($_GET['withdraw'])){
                        require("withdraw.php");
                    }
                    elseif(isset($_GET['transactions'])){
                        require("Transactionhistory.php");
                    }
                    elseif(isset($_GET['rewards'])){
                        require("reward.php");
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
                            <h2><i class="fas fa-bed"></i>  Manage Rooms</h2>  
                        </div>
                        
                        <div class="row">';
                            
                                $room = $db->prepare("SELECT * FROM Rooms ");
                                $room->execute();
                                $totalroom = $room->rowCount();
                                    echo'
                                    <div class="card col-sm-4 mr-3 mt-2" style="color: #001c71;background-color: #627eea30;">
                                    <div class="card-body text-center">
                                    <div class="wallet-balance-ico">
                                        <i class="fas fa-users" style="line-height: 46px;"></i>
                                    </div>
                                    <h6> Total Number of Rooms </h6>
                                        <h6>'.$totalroom.'</h6>
                                        <div class="my-wallet-address" data-toggle="modal" data-target="#view-wallet">
                                        <div class="my-wallet-ico"><i class="fas fa-eye"></i><a href="?rooms"> View Rooms </a></div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card col-sm-3 mr-3 mt-2" style="cursor: pointer;color: #001c71;background-color: #627eea30; font-size: 18px;">
                                    <div class="card-body text-center" data-toggle="modal" data-target="#create-wallet">
                                        <div class="my-wallet-ico" style="background-color: #001c71; border-radius: 100%; height: 45px;width: 45px;color:#fff;margin: 0px auto 15px;font-size: 22px;">
                                            <i class="fas fa-plus" style="line-height: 46px;"></i>
                                        </div>
                                        <h6>Manage Rooms</h6>
                                    </div>                
                                    </div>    
                                </div>





                                <div class="wallet-box-scroll"> 
                                <div class="wallet-bradcrumb">
                                    <h2><i class="fas fa-users"></i> Manage Staff</h2>
                                </div>
                                
                                <div class="row">';
                            
                                $staff = $db->prepare("SELECT * FROM staff ");
                                $staff->execute();
                                $totalstaff = $staff->rowCount();
                                    echo'
                                    <div class="card col-sm-4 mr-3 mt-2" style="color: #001c71;background-color: #627eea30;">
                                    <div class="card-body text-center">
                                    <div class="wallet-balance-ico">
                                        <i class="fas fa-users" style="line-height: 46px;"></i>
                                    </div>
                                    <h6> Total Number of Staff </h6>
                                        <h6>'.$totalstaff.'</h6>
                                        <div class="my-wallet-address" data-toggle="modal" data-target="#view-wallet">
                                        <div class="my-wallet-ico"><i class="fas fa-eye"></i><a href="?staff"> View staff list </a></div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="card col-sm-3 mr-3 mt-2" style="cursor: pointer;color: #001c71;background-color: #627eea30; font-size: 18px;">
                                    <div class="card-body text-center" data-toggle="modal" data-target="#create-wallet">
                                        <div class="my-wallet-ico" style="background-color: #001c71; border-radius: 100%; height: 45px;width: 45px;color:#fff;margin: 0px auto 15px;font-size: 22px;">
                                            <i class="fas fa-plus" style="line-height: 46px;"></i>
                                        </div>
                                    <h6>Manage Staff</h6>
                                    </div>                
                                    </div>    
                                </div>
                                    ';
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
  
