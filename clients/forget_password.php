<?php
if(isset($_POST['recoverpw'])){
    
    $uemail = isset($_POST['login_mail']) ? $_POST['login_mail'] : '';
    try {
           $secretKey = rand(0,10);
            $data = array(
            'emailaddress' => $uemail,
            'secretKey' => $secreteKey
            );
            $db->insert('password_recovery', $data);
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
    } catch (Exception $e) {
        die($e->getMessage());
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title> RECOVER PASSWORD | LUXURY HOTEL </title>
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
             <h1 class="title"> ENTER EMAIL ASSOCIATED WITH YOUR ACCOUNT.</h1>
         </div>
        <form class="form" name="recoverpass" method="post" >
            <div class=""> 
                <div class="form-group">
                    <input type="email" name="login_mail" id="login_mail" placeholder="Email" required>
                </div>
                <button class="btn" type="submit" id="btnlogin" name="recoverpw"> SEND </button>
                
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
</body>
</html>