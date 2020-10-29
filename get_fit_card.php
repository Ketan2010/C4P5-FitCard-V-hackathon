<?php
session_start();
include('connection/db.php');

if(isset($_POST['submit'])) {
  $mail = $_POST['mail'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $pass = $_POST['pass'];
  $conf_pass = $_POST['conf_pass'];
  
  $card_no = $_POST['card_no'];
  $exp = $_POST['exp'];
  $cvv = $_POST['cvv'];
  $card_name = $_POST['card_name'];
  $rs = $_POST['rs'];
  $status='done';
  
  if($pass == $conf_pass){
    $profile=mysqli_query($conn,"insert into fit_card_request (name,email,contact,address,pass) values ('$name','$mail','$contact','$address','$pass' )");
    $fit_id = $conn->insert_id;
    $payment=mysqli_query($conn,"insert into payment (fit_id,card_no,payment_rs ,status ,payment_date) values ('$fit_id','$card_no','$rs','$status',CURDATE())");
    
    $display='Registration successful !!! Thanks for registration , you will get your fit card soon .Till then you can use ' .  $fit_id .' as your fit card id.' ;
    }else{
      echo "<script>alert('Password and confirm password are not matching!')</script>";
    }
  
 
  
  
  if(!empty($profile) and !empty($payment)){
         
     echo "<script>alert( ' $display' )</script>";
     $_SESSION['fit_pat_own'] = $fit_id;
     $_SESSION['start_own'] = time();
      // Ending a session in 5 minutes from the starting time.
      $_SESSION['expire_own'] = $_SESSION['start_own'] + (30 * 60);
      header("location:fit_card_owner.php?i=1");
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
          <h1 style="font-size:20px" data-aos="fade-up">Register here to get your Fit Card</h1>




        <div class="row">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Register</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Payment</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                    <form method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" class="form-control" name="name" aria-describedby="emailHelp" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="mail" name="mail" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col">
                                <input type="text" name="contact" class="form-control" placeholder="Contact Number" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Your Address" required>
                            <small id="emailHelp" class="form-text text-muted">you will get Fit Card on this address.</small>
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
                        

                    
                
                </div>
                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                
                        <div class="form-group">
                            <input type="text" class="form-control" name="card_no"  placeholder="Credit/Debit Card Number" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                <input type="text" name="exp" class="form-control" placeholder="Expiry (MM/YY)" required>
                                </div>
                                <div class="col">
                                <input type="text" name="cvv" class="form-control" placeholder="CVV" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <input type="text" class="form-control" id="address" name="card_name" placeholder="Name on Card" required>
                            <small id="emailHelp" class="form-text text-muted"></small>
                        </div>
                        <div class="form-group">
                            <input type="text" value="Rs. 500" class="form-control" id="address" name="rs" readonly>
                        </div>
                        <!--<button type="submit" class="btn btn-primary">Submit</button>-->
						            <input  class="btn-get-started scrollto"  id="submit" value="Register" name="submit" type="submit" >

                    </form> 
                
                </div>
                </div>
            </div>
            <h1 style="font-size:15px" >Already Registered? <a href="card_owner_login.php">Login Here</a></h1>
            

        </div>




        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/register.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  

  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
  
</html>
