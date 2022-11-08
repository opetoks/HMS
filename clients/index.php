<?php
session_start();
include "../config/config.php";
include "../config/functions.php";
if($db->is_logged_in()!="")
{
    $db->redirect('../');
}


if(isset($_POST['signupbtn'])){
    
$fname = isset($_POST['signup_name']) ? $_POST['signup_name'] : '';
$uemail = isset($_POST['signup_email']) ? $_POST['signup_email'] : '';
$upass = isset($_POST['signup_password']) ? $_POST['signup_password'] : '';
$repass = md5($upass);

$fname = protect($fname);
$uemail = protect($uemail);
$upass = protect($upass);
//$repass = protect($repass);
$time = time();

$ip = $_SERVER['REMOTE_ADDR'];
if(!empty($uemail))//filter_var($uemail, FILTER_VALIDATE_EMAIL)
{
$stmt = $db->query("SELECT * FROM users WHERE emailaddress = ? LIMIT 1", [$uemail]);
$row = $stmt->fetch();
if($stmt->num_rows() > 0){
		//This user already exists, try forget password if you cannot remember your password 
		$error = "User already exist!";
        exit;
}
else{
	$upass = md5($upass);
	$data = array(
    'fullname' => $fname,
    'emailaddress' => $uemail,
    'password' => $upass,
    'signup_time' => $time,
    'email_verified'=> 0,
    'ewallet'=> 30000,
    'ip' => $ip);

        $db->insert('users', $data);
        if($db->affectedRows() == 0){
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "From: noreply@luxuryhotel.com";
            if(filter_var($uemail, FILTER_VALIDATE_EMAIL)){
                $mailmessage = "Thank you for being our customer at LUXURY Hotel \r\n";
                $mailmessage .= "We are glad to tell you, your account has been credited \r\n";
                $mailmessage .= "with N30,000 worth of voucher to book any of our rooms. \r\n";
                $mailmessage .= "Login to your account at https://luxuryhotel.com and enjoy our services \r\n";
                $mailmessage .= "We are here to serve you better. \r\n";
                $mailmessage .= " \r\n";

                $mailmessage .= "Management: Luxury hotel and suits. \r\n";
                
                mail($uemail, "Welcome to LUXURY HOTEL", $mailmessage, $headers);
                $uid = $db->lastid();
                $_SESSION['uid'] = $uid;
                $success = "Thank you! You have been credited ₦30,000 worth of voucher. Please check your email to confirm";
                header('refresh:3, ../');
           }
        else{
            $error = "Unable to forward your mail to ".$uemail;
        }
    }
    $error = "Information not submitted! Please recheck your detail";
}
}
else{
    $error = "Invalid email address.";
}
}

if(isset($_POST['btnlogin'])){
    $uemail = isset($_POST['login_mail']) ? $_POST['login_mail'] : '';
    $upass = isset($_POST['login_pass']) ? $_POST['login_pass'] : '';

    $uemail = protect($uemail);
    $upass = protect($upass);
    $upass = md5($upass);
	if(!empty($uemail) || !empty($upass)){
	$stmt = $db->query("SELECT * FROM users WHERE emailaddress = ? AND password = ? LIMIT 1", [$uemail,$upass]);
	$row = $stmt->fetch();
            if($stmt->num_rows() > 0) 
            {
                //This user exists
                setcookie("uid", $row['id'], time() + (86400 * 30), '/'); // 86400 = 1 day
                $last_login = $row['last_login'] + 5000;
                if (time() > $last_login)
                {
                $time = time();
                $update = $db->query("UPDATE users SET last_login = ?  WHERE id=?", [$time,$row['id']]);
                    }
                $_SESSION['uid'] = $row['id'];
                $success = "Successful login";
                header('refresh:2, ../');
        }
        else{
            $error = "User details not correct"; // No user exist;
            header('refresh:2, ./');
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign in | LUXURY HOTEL </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/53b611154b.js" crossorigin="anonymous"></script> 
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
        /* The alert message box */
        .alert {
        padding: 20px;
        background-color: #f44336; /* Red */
        color: white;
        margin-bottom: 15px;
        }

        /* The close button */
        .closebtn {
        margin-left: 15px;
        color: white;
        font-weight: bold;
        float: right;
        font-size: 22px;
        line-height: 20px;
        cursor: pointer;
        transition: 0.3s;
        }

        /* When moving the mouse over the close button */
        .closebtn:hover {
        color: black;
        }
    </style>
</head>
<body> 
     <div class="wrapper">
        
         <div class="headline">
             <h1 class="title"> Welcome to Luxury Hotel.</h1>
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
                <small id="pwerrorcheck2">  </small><br>
                <small id="pwerrorcheck3">  </small><br>
                <small id="pwerrorcheck4">  </small><br>
                <small id="pwerrorcheck1">  </small><br>

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
                    <a href="forget_password.php">Forget password?</a>
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
     <script type="text/javascript">

            $('#signup_pass').on('keyup', function () {
                if($('#signup_pass').val().length < 8) {
                    $('#pwerrorcheck1').html('Your password must be at least 8 characters <i class="fa fa-times"></i>').css('color', 'red'); //
                    } else{
                        $('#pwerrorcheck1').html('8 Characters validity ok <i class="fa fa-check"></i>').css('color', 'green');
                    }
                if ($('#signup_pass').val().search(/[A-Z]/) < 0) {
                    $('#pwerrorcheck4').html('Your password must contain at least one uppercase letter. <i class="fa fa-times"></i>').css('color', 'red'); //
                    } else{
                        $('#pwerrorcheck4').html('Uppercase validity ok <i class="fa fa-check"></i>').css('color', 'green');
                    }
                if ($('#signup_pass').val().search(/[a-z]/) < 0) {
                    $('#pwerrorcheck2').html('Your password must contain at least one lowercase letter. <i class="fa fa-times"></i>').css('color', 'red'); //
                    } else{
                        $('#pwerrorcheck2').html('Lowercase validity ok <i class="fa fa-check"></i>').css('color', 'green');
                    }

                if ($('#signup_pass').val().search(/[0-9]/) < 0) {
                    $('#pwerrorcheck3').html('Your password must contain at least one digit. <i class="fa fa-times"></i>').css('color', 'red'); //
                    } else{
                        $('#pwerrorcheck3').html('Digit validity ok <i class="fa fa-check"></i>').css('color', 'green');
                    }
                });
        </script> 
                    
     
    <script src="main.js"></script>
</body>
</html>


