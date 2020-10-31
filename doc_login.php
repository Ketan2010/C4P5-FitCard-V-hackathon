<?php
session_start();
include('connection/db.php');
if(isset($_POST['submit'])) {
  $doc_mail = $_POST['doc_mail'];
  $doc_pass = $_POST['doc_pass'];
  $query = mysqli_query($conn, "select * from doctor where doc_mail='$doc_mail' and doc_pass='$doc_pass' ");
  if($query){
        if(mysqli_num_rows($query)>0){
            $_SESSION['doc_mail'] = $doc_mail;
             header("location:doctor_side.php");
             
        } else {
            echo "<script>alert('invalid Fit Mail ID or Password, please try again!')</script>";
        }

 

}
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
                <label for="exampleInputEmail1">Mail ID</label>
                <input type="text" class="form-control" name="doc_mail"  placeholder="Enter your mail ID here" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Password</label>
                <input type="password" class="form-control" name="doc_pass"  placeholder="Enter your password here" required>
            </div>
            
           
          <div data-aos="fade-up" data-aos-delay="800">
            <input  class="btn-get-started scrollto" id="submit"  name="submit" type="submit" > 

          </div>
          <h1 style="font-size:15px" >Do not have Account? <a href="doc_register.php">Register Here</a></h1>

        </form> 
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/doc.png" class="img-fluid animated" alt="">
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

