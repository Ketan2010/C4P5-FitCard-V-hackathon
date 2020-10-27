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

  <!-- ======= symptoms Section ======= -->
<section id="features" class="features">
        <div class="section-title" data-aos="fade-up">
          <h2>Upload Report</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="fit_card.php" class="btn-get-started scrollto">Go back to Fit Card</a>
          </div>
        </div>
        
    <div class="container">
       
        <div style="background-color:#dfe8f7"class="card card-1 mb-3" style="max-width: 1200px;">
          <div class="row no-gutters">
              <div class="col-md-4">
                  <img style="height:400px ;width: 370px"src="assets/img/mp.png" class="card-img" alt="...">
              </div>
              <div class="col-md-8">
                  <div class="card-body">
                      
                  <form method="post">
                        <div class="form-group">
                            <label for="report_name">Report Name</label>
                            <input type="text" class="form-control" name="report_name" id="report_name" placeholder="Report name" required>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="report_date">Report Date</label>
                                <input type="date" class="form-control" name="report_date" id="report_date" placeholder="" required>    
                            </div>
                            <div class="col">
                                <label for="uploaded_by">Your Name</label>
                                <input type="text" class="form-control" name="uploaded_by" id="uploaded_by" placeholder="your name" required>    
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="report_description">Report Description</label>
                            <textarea class="form-control" name="report_description" id="report_description" rows="3" ></textarea>  
                        </div>
                        <div class="form-group">
                            <label for="report_file">Upload Report</label>
                            <input type="file" class="form-control-file" name="report_file" id="report_file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                  </div>
              </div>
          </div>
      </div>
        
    </div>
    </section><!-- End symptoms Section -->

  

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

