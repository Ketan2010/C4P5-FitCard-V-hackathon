<?php
include('connection/db.php');
  session_start();
  if($_SESSION['fit_pat_own']==true){
    $fit_id = $_SESSION['fit_pat_own'];
    $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire_own']) {
            header('location:log_out.php?i=11');
        }
  }else{
    header('location:card_owner_login.php');
  }
?>
<?php
include('connection/db.php');

$query =  mysqli_query($conn,"select * from  fit_card_request where fit_id= '$fit_id'");
while($row= mysqli_fetch_array($query)) {
  $name = $row['name'];
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

  <!-- ======= symptoms Section ======= -->
<section id="features" class="features">
        <div class="section-title" data-aos="fade-up">
          <h2>Upload Report</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="fit_card_owner.php" class="btn-get-started scrollto">Go back to Fit Card</a>
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
                      
                  <form method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                  <label for="report_name">Report Name</label>
                                  <input type="text" class="form-control" name="report_name" id="report_name" placeholder="Report name" required>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                  <label for="report_categry">Report Category</label>
                                  <select name="report_categry" id="report_categry" class="form-control">
                                    <option value="">Select</option>
                                    <option value="Radiology Report">Radiology Report</option>
                                    <option value="Pathology Report">Pathology Report</option>
                                    <option value="Laboratory Report">Laboratory Report</option>
                                    <option value="Doctor Report">Doctor Report</option>
                                    <option value="Prescription">Prescription</option>
                                    <option value="Other">Other</option>
                                  </select>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col">
                                <label for="report_date">Report Date</label>
                                <input type="date" class="form-control" name="report_date" id="report_date" placeholder="" required>    
                            </div>
                            <div class="col">
                                <label for="uploaded_by">Your Name</label>
                                <input type="text" value="<?php echo $name?>" class="form-control" name="uploaded_by" id="uploaded_by" placeholder="your name" required readonly>    
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="report_description">Report Description</label>
                            <textarea class="form-control" name="report_description" id="report_description" rows="3" ></textarea>  
                        </div>
                        <div class="form-group">
                            <label for="report_file">Upload Report</label>
                            <input type="file" class="form-control-file" name="report_file" id="report_file" accept=".jpg, .jpeg, .png, .pdf" required>
                        </div>
                        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
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

<?php
include('connection/db.php');

if(isset($_POST['submit']))
{
    $report_name = $_POST['report_name'];
    $report_categry = $_POST['report_categry'];
    $report_date = $_POST['report_date'];
    $uploaded_by = $_POST['uploaded_by'];
    $report_description = $_POST['report_description'];
    $report_file = $_FILES['report_file'];
    $upload_report_file = $_FILES['report_file']['name'];
    $file = "upload/$fit_id";
    if(!is_dir($file)) 
    {
      mkdir("upload/$fit_id");
    }
    move_uploaded_file($_FILES['report_file']['tmp_name'],"upload/$fit_id/".$_FILES['report_file']['name']);
    $query = mysqli_query($conn,"INSERT INTO reports(report_name, report_date, uploaded_by, report_description, report_file,  fit_id, report_categry)values('$report_name', '$report_date', '$uploaded_by', '$report_description', '".$upload_report_file."' , '$fit_id', '$report_categry')");
    if($query)
    {
      $query = mysqli_query($conn,"select * from fit_card_request where fit_id='$fit_id'");
      $row = mysqli_fetch_array($query);
      $to = $row['email'];
      $subject =  'Report uploaded on Fit Card';
      $body = nl2br("Hello " . $row["name"]. ", You have successfuly uploaded the ".$report_name." in your Fit Card.");
      require("PHPMailer/src/PHPMailer.php");
      require("PHPMailer/src/SMTP.php");
      require("PHPMailer/src/Exception.php");  
      $mail = new PHPMailer\PHPMailer\PHPMailer(true);
      $mail->setFrom('admin@example.com');
      $mail->addAddress($to);
      $mail->Subject = $subject;
      $mail->Body = $body;
      $mail->IsSMTP();
      $mail->SMTPSecure = 'ssl';
      $mail->Host = 'ssl://smtp.gmail.com';
      $mail->SMTPAuth = true;
      $mail->Port = 465;
      $mail->Username = 'medtechsolutions.vit@gmail.com';
      $mail->Password = 'medtech@1234';
      $mail->send();

      echo "<script>alert('Report Uploaded Successfully!')</script>";
    }
    else
    {
      echo mysqli_error($conn);
    }
}

?>