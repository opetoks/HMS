<?php
ob_start();
session_start();
include "classes/connect_db.php";
include "classes/xfunct.php";
if(!isset($_SESSION['user_id'])){
    header('Location: index.php');
}
$uid = $_SESSION['user_id'];
$prefix = "GREATIFEALUMNI";
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> <?php echo Info($uid,'firstname');	?>'s Profile Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
<style>
    * {
       font-size: 18px;
       line-height: 1.428;
      }
    .navbar-nav > li > a {padding-top:25px !important; padding-bottom:25px !important; font-weight:bold; font-size:16px;}
    .navbar {min-height:80px !important}
</style>
</head>
<body>
<nav class="navbar navbar-default"> <!--navbar navbar-default-->
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#"><img src="images/logo.png" height="50px"> </a>
    </div>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#">Home</a></li>
      <li><a href="">Payment History</a></li>
      <li><a href="#">My profile</a></li>
      <li style="float:right"> <?php if(isset($_SESSION['user_id'])){
             echo'<a href="logout"><i class="fa fa-power-off 3x"></i> Logout </a>';}
              ?></li>
    </ul>
  </div>
</nav>

<div class="container">
<div class="row">
<div class="col-md-4">
    <div class="panel panel-default">
    <div class="panel-heading"><strong>Welcome! <?php echo Info($uid,'firstname')." ".Info($uid,'lastname');   ?></h2></strong></div>
    <div class="panel-body no-padding">
       
            <img alt="image" class="img-thumbnail" src="images/<?php echo Info($uid,'image');?>" style="width:100%">
            <br>
            <button type="button" class="user-button btn btn-success btn-sm btn-block" data-toggle="modal" data-target="#pictureModal" data-id="<?php echo $uid; ?>">
            <i class="fa fa-pencil"></i> Picture </button>
        <br>
        <div class="ibox-content profile-content">
            <p><i class="fa fa-map-marker"></i> <?php echo Info($uid,'countryId');   ?><br>
            <h5><strong>About me</strong></h5>
            </p>
            
            <p>
            <span>
                <?php $aboutme = Info($uid,'aboutme'); if($aboutme==""){echo "Tell us about you";}else{ print $aboutme;}?>
            </span> 
            </p>
            <p><button class="btn btn-success btn-sm" data-toggle="modal" data-target="#aboutModal" data-id="<?php echo $uid; ?>"><i class="fa fa-edit"></i> Edit About me</button></p>
        </div><!-- /profile-content -->
    </div>
    </div>
</div>
    
<div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading"><strong>  Membership ID:<?php echo $prefix."/00".$_SESSION['user_id']; ?> </strong></div>
        <div class="panel-body no-padding">
        <?php
            if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
        
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        ?>
        
        <div class="row">
            <div class="col-xs-12 col-md-12">
              <a href="payment.php" class="btn btn-success btn-lg" role="button"><i class="fa fa-money"></i> <br/>Membership Subscription </a>
              <a href="donation.php" class="btn btn-info btn-lg" role="button"><i class="fa fa-money"></i> <br/> Donate here </a>
              <a href="#" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#paymentHistory" role="button"><i class="fa fa-list"></i> <br/> Payment History</a>
              <a href="#" class="btn btn-warning btn-lg" role="button"><i class="fa fa-bullhorn"></i> <br/>Latest News</a>
            </div>
        </div>
        <br>
        
        
     
       <div class="row">
        <div class="col-sm-6">
          Email: <?php echo Info($uid,'email'); ?>
        </div>
        <div class="col-sm-6">
          Phone: <?php echo Info($uid,'phone'); ?>
        </div>
       </div>
      <hr>
      <hr>
      <div class="row">
        <div class="col-sm-12">
          <button class="btn btn-success edit" data-toggle="modal" data-target="#editModal" data-id="<?php echo $uid; ?>"><i class="fa fa-pencil"></i> view profile</button>
        </div>
      </div>
      
      
           
    </div>
   </div>
   
   <!-- 2nd pannel-->
   
   <div class="panel panel-default">
    <div class="panel-heading"><strong>  Available projects </strong></div>
      <div class="panel-body no-padding">
          <div class="col-lg-4 col-md-6 col-sm-10">
				<div class="project-item mb-30">
					<img src="assets/img/project/hostel.jpg" class="img-thumbnail" >
					<div class="content">
						<h5 class="title">
							<a href="#">Hostel Construction for Students.</a>
						</h5>
                        <span class="value-title">Join us to complete the project</span>
					    <div class="cats">
							<a href="#">DONATE NOW</a>
						</div>
					</div>
				</div>
			</div>
			
            <div class="col-lg-4 col-md-6 col-sm-10">
				<div class="project-item mb-30">
					<img src="assets/img/project/library.jpg" class="img-thumbnail" >
					<div class="content">
						<h5 class="title">
							<a href="#">Donating to equip Student's Library.</a>
						</h5>
                        <span class="value-title">Join us to complete the project</span>
                        <div class="cats">
							<a href="#">DONATE NOW</a>
						</div>
					</div>
				</div>
			</div>
			
			<div class="col-lg-4 col-md-6 col-sm-10">
				<div class="project-item mb-30">
					<img src="assets/img/project/computerlab.jpg" class="img-thumbnail" >
					<div class="content">
						<h5 class="title">
							<a href="#">Donating to equip Student's Computer Lab.</a>
						</h5>
                        <span class="value-title">Join us to complete the project</span>
                        <div class="cats">
							<a href="#">DONATE NOW</a>
						</div>
					</div>
				</div>
			</div>
        
        
     
      
      
           
      </div>
   </div>
</div>
</div>




    
    
      

<!--About me Modal -->
<div class="modal fade" id="aboutModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">About me</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="aboutme.php">
            <input type="hidden" id="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>" name="id" value="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>">
            <textarea class="form-control" rows="3" name="aboutme_content"><?php $aboutme = Info($uid,'aboutme'); if($aboutme==""){echo "Tell us about you";}else{echo $aboutme;}?>
            </textarea>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-flat" name="aboutme"><i class="fa fa-check-square-o"></i> Submit</button>
          </div>
            
        </form>
      </div>
      
     
    </div>
  </div>
</div>
    
 <!--Picture Modal -->
<div class="modal fade" id="pictureModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST" action="pictureupload.php" enctype="multipart/form-data">
            <input type="hidden" id="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>" name="id" value="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>">
            <img alt="image" id="pics" class="img-responsive" src="images/<?php echo Info($uid,'image');?>">
            <input type="file" onchange="readURL(this);" name="fileToUpload" id="fileToUpload">
             <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Upload</button>
          </div>
            
        </form>
      </div>
      
     
    </div>
  </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal">
  <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <center>Profile Editor</center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b><span id="memberid"></span></b></h4> 
                  </div>
                  <div class="modal-body">
                    <form class="form-horizontal" method="POST" action="profile_row.php">
                      <input type="hidden" id="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>" name="id" value="<?php if(isset($_SESSION['user_id'])) {echo $_SESSION['user_id'];} ?>">
                      <div class="form-group">
                          <label for="firstname" class="col-sm-3 control-label">First Name</label>

                          <div class="col-md-6"> 
                            <div class="date">
                              <input type="text" class="form-control" id="firstname" name="edit_firstname" value="<?php if(isset($_SESSION['user_id'])) { echo Info($uid,'firstname'); }?>">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="lastname" class="col-sm-3 control-label">Last Name</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                              <input type="text" class="form-control timepicker" id="lastname" name="edit_lastname" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'lastname');} ?>">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="lastname" class="col-sm-3 control-label">Email:</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                              <input type="text" class="form-control timepicker" id="email" name="edit_email" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'email');} ?>">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="" class="col-sm-3 control-label">Country of Residence</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                              <input type="text" class="form-control timepicker"  name="edit_country" value="<?php $city = Info($uid,'countryId'); 
                                    if($city == 'Others')
                                  {
                                    echo Info($uid,'other_country');
                                  } 
                                  else{
                                    echo Info($uid,'countryId');
                                  } 
                                 ?>">
                            </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <label for="" class="col-sm-3 control-label">Course of study</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                            <input type="text" class="form-control timepicker" id="course" name="edit_course" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'course_of_study');} ?>">
                            </div>
                          </div>
                      </div>
                      
                      
                      <div class="form-group">
                          <label for="Phone" class="col-sm-3 control-label">Phone <i class="fa fa-phone"></i>:</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                              <input type="text" class="form-control timepicker" id="phone" name="edit_phone" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'phone');} ?>">
                            </div>
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="Phone" class="col-sm-3 control-label">Birth Day <i class="fa fa-calendar"></i>:</label>

                          <div class="col-md-6">
                            <div class="bootstrap-timepicker">
                              <input type="text" class="form-control timepicker" id="bday" name="edit_birth_month" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'birth_month');} ?>" placeholder="YYYY">

                              <input type="text" class="form-control timepicker" id="bday" name="edit_birth_" value="<?php if(isset($_SESSION['user_id'])) {echo Info($uid, 'birth_day');} ?>" placeholder="YYYY">
                            </div>
                          </div>
                      </div>
                      
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                    <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                    </form>
                  </div>
              </div>
          </div>
</div>
    
<!--Payment history modal-->
<div class="modal fade" id="paymentHistory">
  <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <center>Payment History</center>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><b><span id="memberid"></span></b></h4> 
                  </div>
                  <div class="modal-body">
                    
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>ORDER ID</th>
                            <th>AMOUNT PAID</th>
                            <th>PAYMENT DESCRIPTION</th>
                            <th>DATE</th>
                          </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = $db->prepare("SELECT * FROM payments WHERE user_id = $uid ORDER BY id ASC");
									$query->execute();
									if($query->rowCount() > 0) {
									   $i = 0;
									while($row = $query->fetch()){
									    $i++;
									    $pid = $row['id'];
									    $transaction_id = $row['tranx_ref'];
									    $amount = $row['amount'];
									    $description = $row['payment_description'];
									    $status = $row['status'];
									    $date = $row['date'];

									    echo "<tr>";
									    echo "<td> $i </td>";
									    echo "<td>$transaction_id</td>";
									    echo "<td>$amount</td>";
									    echo "<td>$description</td>";
									    echo "<td>$date</td>";
									    echo "</tr>";
									}
									
								}
								else{ echo "NO PAYMENT YET!";}
							?>
                        </tbody>
                      </table>
                    
                  </div>
              </div>
          </div>
</div>

    

    <div class="clearfix"></div>
     <footer id="footer"> 
        <div class="text-center clearfix">
                <br><br> 
                <a href="#" class="btn btn-xs btn-circle btn-twitter"><i class="fa fa-twitter"></i></a> 
                <a href="#" class="btn btn-xs btn-circle btn-facebook"><i class="fa fa-facebook"></i></a> 
                <a href="#" class="btn btn-xs btn-circle btn-gplus"><i class="fa fa-google-plus"></i></a> 
            </p> 
        </div> 
    </footer>
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
  </div>
  </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>