<?php
include('connection/db.php');
  session_start();
  if($_SESSION['doc_mail']==true){
    $doc_mail = $_SESSION['doc_mail'];
    
  }else{
    header('location:doc_login.php');
  }
?>
<?php
include('connection/db.php');

$query =  mysqli_query($conn,"select * from  doctor where doc_mail= '$doc_mail'");
while($row= mysqli_fetch_array($query)) {
  $doc_name = $row['doc_name'];
  $doc_mail = $row['doc_mail'];
  $doc_contact = $row['doc_contact'];
  $category = $row['category'];

  
}



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
          <h2>Your Profile</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="fit_card_login.php" class="btn-get-started scrollto">Fit Card</a>
            <a href="log_out.php?i=33" class="btn-get-started scrollto">Log Out</a>
          </div>
        </div>
        
        <div style="background-color:#dfe8f7"class="card card-1 mb-3" style="max-width: 1200px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img style="height:220px ;width: 220px"src="assets/img/doc.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="h4"><b>You are loged in as</b> <?php echo $category?></p>
                        <p class="h4"><b>Name:</b> <?php echo $doc_name?></p>
                        <p class="h4"><b>Email:</b> <?php echo $doc_mail?></p>
                        <p class="h4"><b>Contact:</b> <?php echo $doc_contact?></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

  </section><!-- End Hero -->
  


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  
    <script>
      feather.replace();
    </script>
</body>
  
</html>

