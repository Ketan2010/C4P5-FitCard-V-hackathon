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
if(isset($_GET['i'])){
    $display='Registration successful !!! Thanks for registration , you will get your fit card soon .Till then you can use ' .  $fit_id .' as your fit card id.' ;
    echo "<script>alert( ' $display' )</script>";


}
$query =  mysqli_query($conn,"select * from  fit_card_request where fit_id= '$fit_id'");
while($row= mysqli_fetch_array($query)) {
  $name = $row['name'];
  $email = $row['email'];
  $contact = $row['contact'];
}

$query_latest_report =  mysqli_query($conn,"select * from reports where fake_id= (SELECT max(fake_id) FROM reports WHERE fit_id='$fit_id')");

if(mysqli_num_rows($query_latest_report)>0){
    $q = 1;
    $row_latest= mysqli_fetch_array($query_latest_report);
    $last_time = $row_latest['time'];
    $dt= date_create($last_time);
    $update_date = date_format($dt,'d/m/Y');
    $newDateTime = date('h:i A', strtotime($last_time));
}else{
    $q = 0;
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
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script>
function myFunction(id) {

  var r = confirm("Do you really want to delete report?");
  if (r == true) {
    window.location.href = "delete_report.php?id="+id;
  } else {

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
        <div class="section-title" data-aos="fade-up">
          <h2>Fit Card</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="report_upload_own.php" class="btn-get-started scrollto">Upload Reports</a>
            <a href="log_out.php?i=12" class="btn-get-started scrollto">Log Out</a>
          </div>
        </div>
        
        <div style="background-color:#dfe8f7"class="card card-1 mb-3" style="max-width: 1200px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img style="height:220px ;width: 220px"src="assets/img/hp.png" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <p class="h4"><b>Hello, <?php echo $name?> your Fit Card ID is:</b> <?php echo $fit_id?></p>
                        <p class="h4"><b>Email:</b> <?php echo $email?></p>
                        <p class="h4"><b>Contact:</b> <?php echo $contact?></p>
                        <p class="h5"><small class="text-muted"><?php if($q == 1){echo 'Last updated on '.$update_date.','.$newDateTime ;}else{echo 'No reports uploaded yet';}?></small></p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    

  </section><!-- End Hero -->
  

<!-- ======= symptoms Section ======= -->
<!-- <section id="features" class="features">
    <div class="container">
    
        <div style="background-color:#dfe8f7; margin-top:-60px" class="card card-1">
            <div class="card-header">
                <h3>Sign and Symptomps</h3>
            </div>
            
            <div class="card-body">  
            </div>
        </div>
        
    </div>
    </section> -->
    <!-- End symptoms Section -->

    <!-- ======= reports Section ======= -->
    <section id="features" class="features">
    <div class="container">
    
        <div style="background-color:#dfe8f7; margin-top:-60px" class="card card-1">
            <div class="card-header">
                <h3>Manage report visibility here</h3>
            </div>
            
            <div class="card-body">
                
                <table id="example" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Category</th>
                            <th>Report Name</th>
                            <th>Report Date</th>
                            <th>Uploaded by</th>
                            <th>Report Description</th>
                            <th>Public Visibility</th>
                            <th>Delete Report</th>
                            <th>View Report</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
			            $no='1';
                        $query_report = mysqli_query($conn,"select * from reports where fit_id='$fit_id' ORDER BY report_date DESC");
			
			            while($row1 = mysqli_fetch_array($query_report)) {
                    ?>  
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row1['report_categry']?></td>
                            <td><?php echo $row1['report_name']?></td>
                            <td><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></td>
                            <td><?php echo $row1['uploaded_by']?></td>
                            <td><?php echo $row1['report_description']?></td>
                            <td><?php if($row1['visible']=='1'){ echo '<a href="visible_off.php?id='.$row1['fake_id'].'"><button type="button" class="btn btn-outline-secondary">Off</button>';}else{echo '<a href="visible_on.php?id='.$row1['fake_id'].'"><button type="button" class="btn btn-outline-primary">On</button>';}?></td>
                            <td> 
                                
                                    <button onclick="myFunction(<?php echo $row1['fake_id']?>)" style="padding: 0;border: none;background: none;color:red">
                                        <i data-feather="trash-2"></i>
                                    </button>
                               
                            </td>
                            <td>
                                <a target="_blank" href="<?php echo 'upload/'.$fit_id.'/'. $row1['report_file'];?>" ><button  class="btn btn-primary">
                                    <i data-feather="eye"></i> View
                                </button>
                            </td>
                        </tr>
                        <?php $no=$no+1;  } ?>
                       
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Category</th>
                            <th>Report Name</th>
                            <th>Report Date</th>
                            <th>Uploaded by</th>
                            <th>Report Description</th>
                            <th>Public Visibility</th>
                            <th>Delete Report</th>
                            <th>View Report</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
    </div>
    </section><!-- End reports Section -->
    
    

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

