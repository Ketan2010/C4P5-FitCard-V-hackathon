<?php
session_start();
include('connection/db.php');

if(isset($_POST['submit'])) {
  $doc_name = $_POST['doc_name'];
  $doc_mail = $_POST['doc_mail'];
  $doc_contact = $_POST['doc_contact'];
  $category = $_POST['category'];
  $pass = $_POST['pass'];
  $conf_pass = $_POST['conf_pass'];
  
  
  if($pass == $conf_pass){
    $profile=mysqli_query($conn,"insert into doctor (doc_name,doc_mail,doc_contact,category,doc_pass) values ('$doc_name','$doc_mail','$doc_contact','$category','$pass' )");
    
    }else{
      echo "<script>alert('Password and confirm password are not matching!')</script>";
    }
  
 
  
  
  if(!empty($profile)){
         
     echo "<script>alert( 'Registration Successful' )</script>";
     $_SESSION['doc_mail'] = $doc_mail;
    
      header("location:doctor_side.php");
    } else {
      echo "<script>alert('Something went wrong, please register again!')</script>";
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
                <label for="doc_name">Name</label>
                <input type="text" class="form-control" name="doc_name"  placeholder="Enter your name here" required>
            </div>
            <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="mail" name="doc_mail" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col">
                                <input type="text" name="doc_contact" class="form-control" placeholder="Contact Number" required>
                                </div>
                            </div>
            </div>
            <div class="form-group">
                                  <label for="category">Category</label>
                                  <select name="category" id="category" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="laboratory">laboratory</option>
                                    <option value="Farmacist">Farmacist</option>
                                  </select>
            </div>
            <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                                </div>
                                <div class="col">
                                <input type="password" class="form-control" name="conf_pass" placeholder="Confirm password" required>
                                </div>
                            </div>
            </div>
           
         

           
            
           
          <div data-aos="fade-up" data-aos-delay="800">
            <input  class="btn-get-started scrollto" id="submit"  name="submit" type="submit" > 

          </div>
          <h1 style="font-size:15px" >Do not have Account? <a href="doc_register.php">Register Here</a></h1>

        </form> 
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/own.png" class="img-fluid animated" alt="">
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

