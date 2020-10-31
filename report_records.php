
    <!-- ======= reports Section ======= -->
    <section id="features" class="features">
    <div class="container">
    
        <div style="background-color:#dfe8f7; margin-top:-60px" class="card card-1">
            <div class="card-header">
                <h3>Reports</h3>
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
                            <th>View Report</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
			            $no='1';
                        $query_report = mysqli_query($conn,"select * from reports where fit_id='$fit_id' and visible='1' ORDER BY report_date DESC");
			
			            while($row1 = mysqli_fetch_array($query_report)) {
                    ?>  
                        <tr>
                            <td><?php echo $no ?></td>
                            <td><?php echo $row1['report_categry']?></td>
                            <td><?php echo $row1['report_name']?></td>
                            <td><?php $dt= date_create($row1['report_date']); echo date_format($dt,'d/m/Y'); ?></td>
                            <td><?php echo $row1['uploaded_by']?></td>
                            <td><?php echo $row1['report_description']?></td>
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
                            <th>View Report</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        
    </div>
    </section><!-- End reports Section -->