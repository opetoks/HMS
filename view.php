<?php include('includes/header.php'); ?>
<?php
if(isset($_POST['bookRoombtn'])){
  $roomNo = $_POST['roomNo'];
  $quantity = $_POST['quantity'];
  $price = roomInfo($roomNo, 'price');
  $roomtype = roominfo($roomNo, 'roomType');
  $roomImg = roominfo($roomNo, 'roomPICT');
  $roomDescription = roominfo($roomNo, 'roomDescription');

if(isset($_SESSION['uid'])){
  $stmt = $db->query("SELECT * FROM booking_cart WHERE user_id = :user_id AND roomNo = :roomNo", [$user_id, $roomNo]);
  $row = $stmt->fetch();

  if($stmt->num_rows() < 1){
      try{
          $data = array(
              'user_id' => $user_id,
              'roomNo' => $roomNo,
              'quantity' => $quantity,
              'price' => $price,
              'roomType' => $roomtype,
              'roomImg' => $roomImg,
              'roomDescription' => $roomDescription);
          $stmt = $db->insert('booking_cart', $data);
          if($db->affectedRows() == 0){
              $success = "Room added to cart";
              header('refresh:3, clients/home');
              }     
      }
      catch(Exception $e){
          $output['message'] = $e->getMessage();
          echo json_encode($output);
       }
  }
  else{
      $error = 'Room already in cart';
      header('refresh:3, clients/home');
      
  }
}
else{
  $db->redirect('clients/');   
}

}
?>

<div class="container mt-150">
<h1 class="mb-4 title">Available Rooms
</h1>
<div class="row">
<?php
$rooms = $db->query("SELECT * FROM Rooms ");
while($roomlist = $rooms->fetch()){
?>

<div class="col-md-4 mb-10">
    <div class="panel panel-danger">
        <div class="panel-heading">
          <img class="img-fluid rounded" height="400px" src="images/rooms/<?php echo $roomlist['roomPICT'];?>" alt="rooms">
        </div>
        <div class="panel-body text-center">
            <p class="lead">
                
                <strong>₦ <?php echo number_format($roomlist['price']);?> / Night</strong></p>
        </div>
        <ul class="list-group list-group-flush text-center">
        
            <li class="list-group-item"><i class="icon-ok text-danger"></i><?php echo $roomlist['roomType']; ?></li>
            <li class="list-group-item"><i class="icon-ok text-danger"></i><?php if($roomlist['Rstatus'] == "YES"){ echo "<span class='badge badge-success'>Room Available</span>"; } ?></li>
            
        </ul>
        <div class="panel-footer">
        <form name="booking" method="post">
          <input type="hidden" name="roomNo" value="<?php echo $roomlist['roomNo']; ?>" />
          <input type="hidden" name="quantity" value="1" />
          <button  class="viewdetailBtn btn btn-lg btn-block" name="bookRoombtn" >BOOK NOW!</button>
        </form>
          </div>

    </div>
</div>


<?php
}
?>
  
</div>
<!-- /.row -->

</div>
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
<?php include('includes/footer.php'); ?>