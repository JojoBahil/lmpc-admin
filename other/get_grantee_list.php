<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
?>

<div class='form-group'>
        <?php
            $sqlTotalGranteesInHEI = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."'";
            $resTotalGranteesInHEI = mysqli_query($connect, $sqlTotalGranteesInHEI);
            $checkTotalGranteesInHEI = mysqli_num_rows($resTotalGranteesInHEI);
            if($checkTotalGranteesInHEI > 0){
                while($row=mysqli_fetch_assoc($resTotalGranteesInHEI)){
                    $totalGrantee = $row['Count(*)'];
                }
            }    
            else{
                $totalGrantee = 0;
            } 

            $sqlFinalized = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."' AND status = 'Finalized'";
            $resFinalized = mysqli_query($connect, $sqlFinalized);
            $checkFinalized = mysqli_num_rows($resFinalized);
            if($checkFinalized > 0){
                while($row=mysqli_fetch_assoc($resFinalized)){
                    $finalized = $row['Count(*)'];
                }
            }
            else{
                $finalized = 0;
            }

            $sqlAppDAT = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."' AND status = 'App-DAT'";
            $resAppDAT = mysqli_query($connect, $sqlAppDAT);
            $checkAppDAT = mysqli_num_rows($resAppDAT);
            if($checkAppDAT > 0){
                while($row=mysqli_fetch_assoc($resAppDAT)){
                    $appDAT = $row['Count(*)'];
                }
            }
            else{
                $appDAT = 0;
            }

            $sqlApproved = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."' AND status = 'Approved'";
            $resApproved = mysqli_query($connect, $sqlApproved);
            $checkApproved = mysqli_num_rows($resApproved);
            if($checkApproved > 0){
                while($row=mysqli_fetch_assoc($resApproved)){
                    $approved = $row['Count(*)'];
                }
            }
            else{
                $approved = 0;
            }

            $sqlClaimed = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."' AND status = 'Claimed'";
            $resClaimed = mysqli_query($connect, $sqlClaimed);
            $checkClaimed = mysqli_num_rows($resClaimed);
            if($checkClaimed > 0){
                while($row=mysqli_fetch_assoc($resClaimed)){
                    $claimed = $row['Count(*)'];
                }
            }
            else{
                $claimed = 0;
            }

            $sqlNotFinalized = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."' AND status = 'Not Finalized'";
            $resNotFinalized = mysqli_query($connect, $sqlNotFinalized);
            $checkNotFinalized = mysqli_num_rows($resNotFinalized);
            if($checkNotFinalized > 0){
                while($row=mysqli_fetch_assoc($resNotFinalized)){
                    $notFinalized = $row['Count(*)'];
                }
            }
            else{
                $notFinalized = 0;
            }      
        ?>  
        <div class='form-row' >
            <div class="col alert alert-secondary alert-dismissible" style="margin:5px;">
                <label>Not Finalized: </label><br><?php echo '<p style="text-align:center;">'.$notFinalized.'</p>'; ?>
            </div>
            <div class="col alert alert-success alert-dismissible" style="margin:5px;">
                <label>Finalized: </label><br><?php echo '<p style="text-align:center;">'.$finalized.'</p>'; ?>
            </div>
            <div class="col alert alert-info alert-dismissible" style="margin:5px;">
                <label>Application Exported: </label><br><?php echo '<p style="text-align:center;">'.$appDAT.'</p>'; ?>
            </div>
            <div class="col alert alert-primary alert-dismissible" style="margin:5px;">
                <label>Approved Applications: </label><br><?php echo '<p style="text-align:center;">'.$approved.'</p>'; ?>
            </div>
            <div class="col alert alert-warning alert-dismissible" style="margin:5px;">
                <label>Claimed LMPC: </label><br><?php echo '<p style="text-align:center;">'.$claimed.'</p>'; ?>
            </div>
            <div class="col alert alert-danger alert-dismissible" style="margin:5px;">
                <label>Total Grantees: </label><br><?php echo '<p style="text-align:center;">'.$totalGrantee.'</p>'; ?>
            </div>
        </div>     
    </div>

    <table id="table_grantees" class="table table-striped table-bordered table-sm">  
        <thead class="table_header"  style="font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;">  
            <tr>  
                <th width="20%">Award No.</th>
                <th width="15%">Last Name</th>
                <th width="15%">First Name</th>
                <th width="15%">Middle Name</th>
                <th width="10%">Sex</th>
                <th width="10%">Status</th>
                <th width="15%">Actions</th> 
            </tr>  
        </thead>  
        <tbody>
            <?php
                $hei_uii = $_POST['hei_uii'];

                $sqlGrantees = "SELECT * FROM vw_for_admin WHERE hei_uii ='".$_POST['hei_uii']."'";
                $resGrantees = mysqli_query($connect, $sqlGrantees);
                $checkGrantees = mysqli_num_rows($resGrantees);
                if($checkGrantees > 0){
                    while($row = mysqli_fetch_assoc($resGrantees)){
                        $awardno = mysqli_real_escape_string($connect, $row['award_no']);
                        $lastname = mysqli_real_escape_string($connect, $row['lname']);
                        $firstname = mysqli_real_escape_string($connect, $row['fname']);
                        $middlename = mysqli_real_escape_string($connect, $row['mname']);
                        $sex = mysqli_real_escape_string($connect, $row['sex']);
                        $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                        $pdf_attachment = mysqli_real_escape_string($connect, $row['pdf_attachment']);
                        $wallet_number = mysqli_real_escape_string($connect, $row['wallet_number']);
                        $device_number = mysqli_real_escape_string($connect, $row['device_number']);
                        $transaction_datfile_export_date = mysqli_real_escape_string($connect, $row['transaction_datfile_export_date']);
                        $status = mysqli_real_escape_string($connect, $row['status']);
                        
                        if(!empty($pdf_attachment) && empty($wallet_number) && empty($device_number) && empty($transaction_datfile_export_date)){
                            $disable = '';
                        }
                        else{
                            $disable = 'disabled';
                        }
                        
                        $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                   <input type="button" class="btn btn-success btn_unfinalize_data" value="Unfinalize" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;" '.$disable.'>
                                   <input type="hidden" class="hdn_awardno" id="hdn_awardno" name="hdn_awardno" value="'.$awardno.'">';

                        echo "
                            <tr>
                                <td>$awardno</td>
                                <td>$lastname</td>
                                <td>$firstname</td>
                                <td>$middlename</td>
                                <td>$sex</td>
                                <td>$status</td>
                                <td style='text-align:center;'>$action</td>
                            </tr>
                        ";
                    }
                }   
            ?>  
        </tbody>
    </table> 

<!-- Modal -->
<?php
    include('student_profilemodal.php'); 
    include('batch_opening_modal.php');
    include('transaction_datfile_modal.php');
?>

<script>
    $(document).ready(function(){  
        $('#table_grantees').DataTable({
            "dom": 'ftipr',
            "pageLength": 10,
            language: {
                searchPlaceholder: "keyword"
            }
        });

        $('#btn_bot').on('click', function() {
            $('#modalbot').modal("show"); 
        });
    });   
</script> 

<!-- get table row value script -->
<script>  
     $(document).ready(function(){  
        $('#table_grantees tbody').on('click', '.btn_', function(){  
               var award_no = $(this).attr("id");
               $.ajax({  
                    url:"other/selectawardno.php",  
                    method:"post",  
                    data:{award_no:award_no},  
                    success:function(data){  
                        $('#student_detail').html(data);  
                        $('#dataModal').modal("show"); 
                    },  
                    error: function(data) {
                        alert('Ajax Data Fetch Error');
                    }
               });  
          });  
          $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); //move search bar to left 
         
         // Go to Unfinalize Php Script
         $('#table_grantees tbody').on('click', '.btn_unfinalize_data', function(){ 
              var award_no = $('#hdn_awardno').val();
              document.location.href = 'other/unfinalize.php?awardno='+award_no;
         });
     });  
</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script> 




