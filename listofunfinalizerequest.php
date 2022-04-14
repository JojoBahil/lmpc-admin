<?php  
     include('other/dbconnect.php');
     include('other/navigation.php');
     header("Content-Type:text/html; charset=ISO-8859-1"); 

     if(!$_SESSION['username']){
          header('location: index.php');
     }
?>  

<script>
</script>
<!DOCTYPE html>  
<html>  
     <head>  
          <title>Admin Portal - Unfinalize Requests</title> 
          <script src="assets/js/jquery.min.js"></script>  
          <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
          <script src="assets/datatables/datatables.min.js"></script> 
          <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
          <link rel="stylesheet" href="assets/css/loader.css">
          <link rel="stylesheet" href="assets/css/listofgrantees.css">
          <link rel="stylesheet" href="assets/css/all.min.css">
          <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
          
          
     </head>  
     <body  style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">       
          <br /><br />  
          <div class="container" style="height:800px;">  
               <h4 align="left" style="font-family:helvetica;color:#444;">List of Unfinalize Requests</h4>  
               <br /> 
               
               <div class="row">
                    <div class="col" style="text-align:right;font-size:14px;padding-top:17px;margin-bottom:10px;">
                         <?php
                              if(isset($_GET['errmsg'])){
                                   echo "<div class='form-row' style='background-color:#FFD2D2;text-align:center;border-radius:7px;'><div class='col'><span style='color:#D8000C;'>".$_GET['errmsg']."</span></div></div>";
                              }
                              if(isset($_GET['sucmsg'])){
                                   echo "<div class='form-row' style='background-color:#DFF2BF;text-align:center;border-radius:7px;'><div class='col'><span style='color:#4F8A10;'>".$_GET['sucmsg']."</span></div></div>";
                              }
                         ?>  
                    </div>
               </div>
               
               <!-- TABLE -->
               <div class="table-responsive table_div" id="table_div" style="font-size:13px;">  
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
                                   $sqlGrantees = "SELECT * FROM tbl_lbp_form WHERE status ='REQTOUNFINALIZE'";
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

                                             if(empty($wallet_number) && empty($device_number) && empty($transaction_datfile_export_date)){
                                                  $disable = '';
                                             }
                                             else{
                                                  $disable = 'disabled';
                                             }

                                             $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                                            <input type="button" class="btn btn-success btn_unfinalize_data" value="Unfinalize" id="'.$awardno.'" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;" '.$disable.'>
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
                         include('other/student_profilemodal.php'); 
                         include('other/batch_opening_modal.php');
                         include('other/claim_update_modal.php');
                    ?>
               </div>  <!-- table-responsive table_div-->
          </div> <!-- container -->
          <?php
               include('footer.php');
          ?>
     </body>  
</html>  

<script>  
     $(document).ready(function(){ 

          $('#txt_award_no').keypress(function(e){
               if(e.keyCode==13)
               $('#btn_get_grantee').click();
          });


          // DATA TABLE SCRIPT 
          $('#table_grantees').DataTable({
               "dom": 'ftipr',
               "pageLength": 10,
               language: {
                    searchPlaceholder: "Search by keyword..."
               }
          });

          // GET TABLE ROW VALUE SCRIPT
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

          $('#btn_bot').on('click', function() {
               $('#modalbot').modal("show"); 
          });

          $('#table_grantees tbody').on('click', '.btn_unfinalize_data', function(){ 
              var award_no = $(this).attr("id");
              document.location.href = 'other/unfinalize2.php?awardno='+award_no;
          });
     }); //END OF DOCUMENT.READY  
</script> 
 
<!-- TABLE AJAX SCRIPT -->
<script>

     function getHEIList(hei_type){
          var_region = $('#sel_region').val()
          
          $.ajax({
               type: "POST",
               url: "other/get_hei_list.php",
               data: {region: var_region, hei_type: hei_type},
               success: function(data){
                    $("#sel_hei_name").html(data);
               }
          });
     }

     function getGranteeList(){
          var_hei_uii = $('#sel_hei_name').val();
          $.ajax({               
               type: "POST",
               url: "other/get_grantee_list.php",
               data: {hei_uii: var_hei_uii},
               success: function(data){
                    $("#table_div").html(data);
               }
          });
     }

     function getTheGrantee(){
          var_award_no = $('#txt_award_no').val();
          $.ajax({
               type: "POST",
               url: "other/get_the_grantee.php",
               data: {award_no: var_award_no},
               success: function(data){
                    $("#table_div").html(data);
               }
          });
     }

</script>


 <!-- BOOTSTRAP PLUGIN SCRIPT -->
 <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
 <script src="assets/js/all.min.js"></script>
