<?php
session_start();
include('classes/connect_db.php');
include('classes/functions.php');

if(isset($_POST['btnlogin'])){
    $uemail = isset($_POST['login_mail']) ? $_POST['login_mail'] : '';
    $upass = isset($_POST['login_pass']) ? $_POST['login_pass'] : '';
    
    $uemail = protect($uemail);
    $upass = protect($upass);
    $upass = md5($upass);
    //print_r($_POST);
        $stmt = $db->prepare("SELECT * FROM admins WHERE aemail = '$uemail' AND password = '$upass'");
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        //print_r($row);//Array ( [id] => 1 [userRole] => superAdmin [aemail] => admin@admin.com [password] => 0659c7992e268962384eb17fafe88364 ) 
        if($stmt->rowCount() > 0){
            $_SESSION['uid'] = $row['id'];
            $_SESSION['userRole'] = $row['userRole'];
            //print_r($row['userRole']);
            $success = "Login successful";
            header('Location: myaccount/');
            }
            else{
                $error = "Login failed";
        } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/53b611154b.js" crossorigin="anonymous"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>LUXURY Hotel | Admin </title>
    <style>
        body{
            margin: 0;
        }
    </style>
</head>
<body>
<div class="wrapper">
        
        <div class="headline">
            <h1 style="text-align:center"> ADMIN PANEL  Luxury Hotel.</h1>
        </div>

        <form class="form" name="signupform" method="post" id="form1">
           <div class="signup">
               <div class="form-group">
                   <input type="text" name="signup_name" id="signup_name" placeholder="Full Name" required>
               </div>

               <div class="form-group">
                   <input type="email" name="signup_email" id="signup_email" placeholder="Email" required>
               </div>

               <div class="form-group">
                   <input type="password" id="signup_pass" name="signup_pass" placeholder="Password" required>
               </div>

               <button type="submit" class="btn" id="signupbtn" name="signupbtn">SIGN UP</button>

               <div class="account-exist">
                   Already have an account? <a href="#" id="login">Login</a>
               </div>
           </div>
          </form>

          <form class="form" name="loginform" method="post" id="form2">
           <div class="signin"> 
               <div class="form-group">
                   <input type="email" name="login_mail" id="login_mail" placeholder="Email" required>
               </div>
               <div class="form-group">
                   <input type="password" name="login_pass" id="login_pass" placeholder="Password" required>
               </div>

               <div class="forget-password">
                   <div class="check-box">
                       <input type="checkbox" id="checkbox">
                       <label for="checkbox">Remember me</label>
                   </div>
                   <a href="#">Forget password?</a>
               </div>
               <button class="btn" type="submit" id="btnlogin" name="btnlogin"> LOGIN </button>
               <div class="account-exist">
                   Create New a account? <a href="#" id="signup"> Signup </a>
               </div>
           </div>
        </form>
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
    </div>  
   <script src="main.js"></script>
</body>
</html>