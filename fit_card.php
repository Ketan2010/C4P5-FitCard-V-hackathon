<?php
include('connection/db.php');
  session_start();
  if($_SESSION['report_passport']==true && $_SESSION['doc_mail']==true ){
    $doc_mail = $_SESSION['doc_mail'];
        $fit_id = $_SESSION['report_passport'];

    $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            
            header('location:log_out.php?i=21');
        }
  }else{
    header('location:fit_card_login.php');
  }
?>
<?php
include('connection/db.php');


$query_doc =  mysqli_query($conn,"select * from  doctor where doc_mail= '$doc_mail'");
while($row_doc = mysqli_fetch_array($query_doc)) {
  $doc_name = $row_doc['doc_name'];
  $doc_mail = $row_doc['doc_mail'];
  $doc_contact = $row_doc['doc_contact'];
  $category = $row_doc['category'];

  
}

$query =  mysqli_query($conn,"select * from  fit_card_request where fit_id= '$fit_id'");
while($row= mysqli_fetch_array($query)) {
  $name = $row['name'];
  $email = $row['email'];
  $contact = $row['contact'];
}

$query_latest_report =  mysqli_query($conn,"select * from reports where fake_id= (SELECT max(fake_id) FROM reports WHERE fit_id='$fit_id')");
$row_latest= mysqli_fetch_array($query_latest_report);
$last_time = $row_latest['time'];
$dt= date_create($last_time);
$update_date = date_format($dt,'d/m/Y');
$newDateTime = date('h:i A', strtotime($last_time));

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Fit Card</title>
  

  <!-- Favicons -->
  <link href="assets/img/tab_logo.png" rel="icon">
  <link href="assets/img/tab_logo.png" rel="">
  <?php include("links.php");?>
  
<style>
.card-1 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 8px 8px rgba(0,0,0,0.24);
  transition: all 0.3s cubic-bezier(.25,.8,.25,1);
}
.card-1:hover {
  box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
}
</style>
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
  <!-- datatable css -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 
</head>

<body>
  <!-- ========Nav Bar========== -->
  <?php include("nav.php");?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
  

    <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Fit Card</h2>
          <div data-aos="fade-up" data-aos-delay="800">
          <?php if($category == 'Doctor' or $category == 'laboratory' ){echo '<a href="upload_reports.php" class="btn-get-started scrollto">Upload Reports</a>';} else{echo '';} ?>
            <a href="log_out.php?i=22" class="btn-get-started scrollto">Log Out</a>
          </div>
        </div>
        
        <div style="background-color:#dfe8f7"class="card card-1 mb-3" style="max-width: 1200px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img style="height:220px ;width: 220px"src="assets/img/hp.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="h4"><b>Fit Card ID:</b> <?php echo $fit_id?></p>
                        <p class="h4"><b>Name:</b> <?php echo $name?></p>
                        <p class="h4"><b>Email:</b> <?php echo $email?></p>
                        <p class="h4"><b>Contact:</b> <?php echo $contact?></p>
                        <p class="h5"><small class="text-muted">Last updated on <?php echo $update_date;?>, <?php echo $newDateTime;?></small></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

  </section><!-- End Hero -->
  
  <?php 
  if($category=='Doctor' or $category=='Pharmacist'){
    include('report_records.php');
  }
  ?>

    
    

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script>
   $('#example').dataTable( {
  "scrollX": true
} );
  </script>
    <script>
      feather.replace();
    </script>
</body>
  
</html>

