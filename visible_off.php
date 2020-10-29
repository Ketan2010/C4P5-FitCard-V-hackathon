<?php
include('connection/db.php');

if(isset($_GET['id'])){
    $fake_id = $_GET['id'];
    $result = "UPDATE reports SET visible='0' WHERE fake_id='$fake_id' ";
    if($result){ 
        mysqli_query($conn,$result );

        header('location:fit_card_owner.php');
	
    } 
	else {
      echo "<script>alert('Something went wrong, please try again!')</script>";
    } 
 
    
}

?>