<?php
include('connection/db.php');
  session_start();
  if($_SESSION['superhero']==true && $_SESSION['fitid']==true && $_SESSION['doc_mail']==true ){
    $doc_mail = $_SESSION['doc_mail'];
    $otp = $_SESSION['superhero'];
    $fit_id = $_SESSION['fitid'];
	

  }else{
    header('location:index.php');
  }
   
?>
<?php

include('connection/db.php');

$query =  mysqli_query($conn,"select * from  doctor where doc_mail= '$doc_mail'");
while($row= mysqli_fetch_array($query)) {
  $doc_name = $row['doc_name'];
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
  

  
</head>

<body>
  <!-- ========Nav Bar========== -->
  <?php include("nav.php");?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">


        <form method="post">
            <div class="form-group">
                <label for="otp">Hi, <?php echo $doc_name?> Enter OTP</label>
                <input type="text"  class="form-control" name="otp"  placeholder="Enter 4 digit OTP here" required>
            </div>
           
          <div data-aos="fade-up" data-aos-delay="800">
            <input  class="btn-get-started scrollto" id="submit"  name="submit" type="submit" >
          </div>
        </form> 
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/lock.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->


  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</main>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
  
</html>
<?php

include('connection/db.php');
if(isset($_POST['submit'])) {
  $otp_entered = $_POST['otp'];
  
  if($otp_entered == $otp)
  {
      $_SESSION['report_passport'] = $fit_id;
      $_SESSION['start'] = time();
      // Ending a session in 5 minutes from the starting time.
      $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
      header("location:fit_card.php");
  }else{
     
      echo "<script>alert('Invalid OTP Code!, Please try again.')</script>";
      echo "<script>window.location = 'fit_card_login.php'</script>";
  }

}


?>



