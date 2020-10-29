<?php

include('connection/db.php');
 

$did = $_GET['id'];
$query_k = mysqli_query($conn,"select * from reports where fake_id= '$did'");
while($row= mysqli_fetch_array($query_k)) {
  $fit_id = $row['fit_id'];
  $report_file = $row['report_file'];
}
$path = 'upload/'.$fit_id.'/'.$report_file;

$query = mysqli_query($conn,"delete from reports where fake_id= '$did'");

if($query){
    unlink($path);
  header('location:fit_card_owner.php');
}else {
  echo "<script>alert('Error!')</script>";
}

?>