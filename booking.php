<?php
ob_start();
session_start();
include "classes/config.php";
include "classes/functions.php";
if($db->is_logged_in()!="")
{ 
$user_id = $_SESSION['uid'];
$name = info($user_id, "fullname");
$creditBalance = info($user_id, "ewallet");
}

//print_r($_POST);
$roomNo = $_POST['roomNo'];
// $roomtype = $_POST['roomType'];
// $price = $_POST['price'];
$quantity = $_POST['quantity'];
$roomImg = roomInfo($roomNo, 'roomPICT');
$roomtype = roomInfo($roomNo, 'roomType');
$price = roomInfo($roomNo, 'price');
$roomDescription = roomInfo($roomNo, 'roomDescription');
$roomStatus = roomInfo($roomNo, 'Rstatus');


if(isset($_SESSION['uid'])){
    $stmt = $db->query("SELECT * FROM booking_cart WHERE user_id = :user_id AND roomNo = :roomNo", [$user_id, $roomNo]);
    $row = $stmt->fetch();

    if($stmt->num_rows() < 1){
        try{
            $data = array(
                'user_id' => $user_id,
                'roomNo' => $roomNo,
                'quantity' => $quantity,
                'price' => $price);
            $stmt = $db->insert('booking_cart', $data);
            if($db->affectedRows() == 0){
                $success = "Room added to cart";
                header('refresh:2, clients/home.php');
                }     
        }
        catch(Exception $e){
            $output['message'] = $e->getMessage();
            echo json_encode($output);
         }
    }
    else{
        $error = 'Room already in cart';
        header('refresh:2, clients/home.php');
        
    }
}
else{
    $db->redirect('clients/');   
}
