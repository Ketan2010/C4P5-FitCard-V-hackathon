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

.myButton {
	background-color:#5c8de0;
	border-radius:39px;
	border:1px solid #7d91cc;
	display:inline-block;
	cursor:pointer;
	color:white;
	font-family:Arial;
	font-size:16px;
	padding:11px 23px;
	text-decoration:none;
	text-shadow:0px 1px 0px #283966;
}
.myButton:hover {
	background-color:#75a8e6;
}
.myButton:active {
	position:relative;
	top:1px;
}
</style>  

<script>
function submitContactForm(){
    var reg = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var email = $('#user_mail').val();
    if(email.trim() == '' ){
        alert('Please enter Email.');
        $('#user_mail').focus();
        return false;
    }else{
        $.ajax({
            type:'POST',
            url:'submit_form.php',
            data:'contactFrmSubmit=1&email='+email,
            beforeSend: function () {
                $('.submitBtn').attr("disabled","disabled");
                $('.modal-body').css('opacity', '.5');
            },
            success:function(msg){
                if(msg == 'ok'){
                    
                    $('#user_mail').val('');
                    
                    $('.statusMsg').html('<span style="color:green;">We Have sent your Fit card ID on registered mail and contact number</p>');
                }else if(msg == 'no'){
                  $('.statusMsg').html('<span style="color:red;">There is no Fit card associated with this mail, Please try again</span>');
                }else if(msg == 'err'){
                  $('.statusMsg').html('<span style="color:red;">Some problem occurred, please try again.</span>');
                }
                $('.submitBtn').removeAttr("disabled");
                $('.modal-body').css('opacity', '');
            }
        });
    }
}
</script>

</head>

<body>
  <!-- ========Nav Bar========== -->
  <?php include("nav.php");?>
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Get your <span style="color:#4287f5">Fit Card</span> here!</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Be smart, use Fit card</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="get_started.php" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

   

    

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="icofont-simple-smile"></i>
                    <span data-toggle="counter-up">65</span>
                    <p><strong>Happy Clients</strong> Using Fit Card</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                  <i class="icofont-question"></i>
                    <span style="font-size: 25px;">Forgot Fit Card ID?</span>
                    <p><a  data-toggle="modal" data-target="#modalForm" style="color:white" class="myButton" >Get it here</a></p>
                    
                  </div>
                </div>

                



              </div>
            </div><!-- End .content-->
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->











    

<!-- Modal -->
<div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Forgot Fit Card ID?</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                  <div class="form-group">
                    <label for="">Email Id</label>
                     <input type="text" class="form-control" id="user_mail" name="email"  placeholder="Enter your mail ID here" required>
                      <small id="emailHelp" class="form-text text-muted">We'll send your Fit card ID on this mail and registered contact number</small>
                 </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary submitBtn" onclick="submitContactForm()">SUBMIT</button>
            </div>
        </div>
    </div>
</div>



    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Features</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a href="">History Taking </a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a href="">Progress Reports</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
             <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a href="">Data Security</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a href="">Authentication</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
           
         
        </div>

      </div>
    </section><!-- End Features Section -->

    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Pricing</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="zoom-in-right" data-aos-delay="200">
             
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-md-0">
            <div class="box recommended" data-aos="zoom-in" data-aos-delay="100">
              <h3>Pricing</h3>
              <h4><sup>₹</sup>500<span> / Year</span></h4>
              <ul>
                <li>History Taking</li>
                <li>Progress Reports</li>
                <li>Data Security</li>
                <li>Authentication</li>
              </ul>
              <div class="btn-wrap">
                <a href="get_fit_card.php" class="btn-buy">Register Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-4 mt-lg-0">
            <div class="box" data-aos="zoom-in-left" data-aos-delay="200">
              
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Pricing Section -->

  

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
</main>
  

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
  
</html>




