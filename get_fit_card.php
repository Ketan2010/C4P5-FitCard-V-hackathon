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
                            <label for="address">Address</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Your Address" required>
                            <small id="emailHelp" class="form-text text-muted">you will get Fit Card on this address.</small>
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
                            <input type="text" value="Rs. 2000" class="form-control" id="address" name="rs" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>

                    </form> 
                
                </div>
                </div>
            </div>
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