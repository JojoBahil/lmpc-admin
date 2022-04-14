<?php  
     include('other/dbconnect.php');
     include('other/navigation.php');
     session_start();
     //header("Content-Type:text/html; charset=ISO-8859-1"); 

     if(!$_SESSION['username']){
          header('location: index.php');
      }
?>  
<!DOCTYPE html>  
<html>  
     <head>  
          <title>TES Grantees</title>  
          <script src="assets/js/jquery.min.js"></script>  
          <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
          <script src="assets/datatables/datatables.min.js"></script> 
          <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
          <link rel="stylesheet" href="assets/css/loader.css">
          <link rel="stylesheet" href="assets/css/listofgrantees.css">
          <link rel="stylesheet" href="assets/css/all.min.css">
          <!--<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>-->
          
          
     </head>  
     <body  style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">       
          <br /><br />  
          <div class="container">  
               <h4 align="left" style="font-family:helvetica;color:#444;">List of UniFAST Tertiary Education Subsidy Grantees</h4>  
               <br /> 
                             
               <!-- BATCH OPENING TEMPLATE GENERATOR -->
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
               <div class='row'>
                    <div class='col-lg-9 col-md-9'>
                         <fieldset style="border: 1px solid #ddd !important; padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 1.5em 0 !important; border-radius: 5px;">
                              <legend style="font-size: 0.8em !important;  text-align: left !important; width:inherit; padding:0 10px;">
                                   Filter Criteria
                              </legend>
                              <div class="row">
                                   <div class="col-lg-6">
                                        <label style='font-size:11px;'>Region</label>
                                        <select name="sel_region" id="sel_region" class="sel_region" style="width:100%;padding:4px;font-size:15px;">
                                             <option value='01'>Region I</option>
                                             <option value='02'>Region II</option>
                                             <option value='03'>Region III</option>
                                             <option value='04'>Region IV</option>
                                             <option value='05'>Region V</option>
                                             <option value='06'>Region VI</option>
                                             <option value='07'>Region VII</option>
                                             <option value='08'>Region VIII</option>
                                             <option value='09'>Region IX</option>
                                             <option value='10'>Region X</option>
                                             <option value='11'>Region XI</option>
                                             <option value='12'>Region XII</option>
                                             <option value='13'>National Capital Region</option>
                                             <option value='14'>Cordillera Administrative Region</option>
                                             <option value='15'>Bangsamoro Autonomous Region in Muslim Mindanao</option>
                                             <option value='16'>CARAGA</option>
                                             <option value='17'>MIMAROPA</option>
                                        </select>
                                   </div>
                                   <div class="col-lg-6">
                                        <label style='font-size:11px;'>HEI Type</label>
                                        <select name="sel_hei_type" id="sel_hei_type" class="sel_hei_type" OnChange="getHEIList(this.value)" style="width:100%;padding:4px;font-size:15px;">
                                             <option></option>
                                             <?php
                                                  $sqlHEITypes = 'SELECT DISTINCT(hei_it) FROM tbl_heis';
                                                  $resHEITypes = mysqli_query($connect, $sqlHEITypes);
                                                  $checkHEITypes = mysqli_num_rows($resHEITypes);
                                                  if($checkHEITypes > 0){
                                                       while($row = mysqli_fetch_assoc($resHEITypes)){
                                                            echo "<option value='".$row['hei_it']."'>".$row['hei_it']."</option>";
                                                       }
                                                  }
                                             ?>
                                        </select>
                                   </div>
                              </div>
                              <div class="row">
                                   <div class="col-lg-12">
                                        <label style='font-size:11px;'>HEI Name</label>
                                        <select name="sel_hei_name" id="sel_hei_name" class="sel_hei_name" style="width:100%;padding:4px;font-size:15px;">
                                             <option></option>
                                        </select>
                                   </div>
                              </div>
                              <br>
                              <div class="row">
                                   <div class="col" style='text-align:center'>
                                        <input type="submit" value="Generate List" class="btn btn-primary btn_generate_list" style='width:80%' OnClick='getGranteeList()'>
                                   </div>
                              </div>
                              
                         </fieldset>
			    
			    <div class="row">                         
                              <div class='col-lg-9 col-md-9'>
                                   <fieldset style="border: 1px solid #ddd !important; padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 1.5em 0 !important; border-radius: 5px;">    
                                        <legend style="font-size: 0.8em !important;  text-align: left !important; width:inherit; padding:0 10px;">
                                             Search Specific Grantee
                                        </legend>
                                        <div class="row">
                                             <div class="col-lg-6" style=''>                                             
                                                  <label style='font-size:11px;'>TES Award Number</label>
                                                  <input type="text" name="txt_award_no" class="txt_award_no" id="txt_award_no" style="width:100%">               
                                             </div>
                                        </div>
                                   
                                        <br> 
                                        <div class="row">
                                             <div class="col-lg-6" style='text-align:center'>
                                                  <input type="submit" value="Search" id="btn_get_grantee" class="btn btn-primary btn_get_grantee" style='width:80%' OnClick='getTheGrantee()' style="width:100%">
                                             </div>
                                        </div>
                                   </fieldset>
                              </div>
                         </div>
                         
                    </div>

                    <div class="col-lg-3 col-md-3">
                    <fieldset style="border: 1px solid #ddd !important; padding: 0 1.4em 1.4em 1.4em !important; margin: 0 0 1.5em 0 !important; border-radius: 5px;">
                         <legend style="font-size: 0.8em !important;  text-align: left !important; width:inherit; padding:0 10px;">Actions</legend>
                         <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-success btn_bot" id="btn_bot" value="Export Application File" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
                         <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-success btn_update_wallet_number" id="btn_update_wallet_number" value="Update Approved Status" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
			          <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-success btn_update_subtounifast" id="btn_update_subtounifast" value="Revert to SubToUniFAST" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
                         <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-warning btn_update_reject_records_01032022" id="btn_update_reject_records_01032022" value="Custom Updater" style='width:100%'>
                         </div>
                         <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-success btn_status_rejected" id="btn_status_rejected" value="Update Rejected Status" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
			          <div class="row" style="margin-bottom:3px;">
                              <input type="button" class="btn btn-outline-success btn_forclaim_update" id="btn_forclaim_update" value="For Claiming LMPC Update" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
                         <div class="row">
                              <input type="button" class="btn btn-outline-success btn_claim_update" id="btn_claim_update" value="Claimed LMPC Update" style='width:100%' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
                         <div class="row">
                              <input type="button" class="btn btn-outline-success btn_download_list" id="btn_download_list" value="Download List" style='width:100%' OnClick='DownloadList()' <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                         </div>
                    </fieldset>
                          
                         <br>   
                    </div>

               </div>
                <!-- TABLE -->
               <div class="table-responsive table_div" id="table_div" style="font-size:13px;">  
		       
                    <!-- Modal -->
                    <?php 
                         include('other/student_profilemodal.php'); 
                         include('other/batch_opening_modal.php');
                         include('other/transaction_datfile_modal.php'); //Approved Update Modal
                         include('other/revertto_subtounifast_upload_modal.php'); //Revert to SubToUniFAST Update Modal
                         include('other/rejected_upload_modal_01032022.php'); //Rejected Update Modal
                         include('other/rejected_upload_modal.php'); //Rejected Update Modal
                         include('other/forclaiming_upload_modal.php'); //For Claiming Update Modal
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
               "pageLength": 50,
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
		
	     $('#btn_update_wallet_number').on('click', function() {
               $('#modalbot_update_wallet').modal("show"); 
          });
	     
	     $('#btn_update_subtounifast').on('click', function() {
               $('#modalbot_revert_to_subtounifast').modal("show"); 
          });

          $('#btn_update_reject_records_01032022').on('click', function() {
               $('#modalbot_rejected_update_01032022').modal("show"); 
          });

          $('#btn_status_rejected').on('click', function() {
               $('#modalbot_rejected_update_wallet').modal("show"); 
          });
	     
	     $('#btn_forclaim_update').on('click', function() {
               $('#modalbot_forclaiming_update').modal("show"); 
          });
	     
	     $('#btn_claim_update').on('click', function() {
               $('#modalbot_claim_update').modal("show"); 
          });

     }); //END OF DOCUMENT.READY  
</script>

<!-- TABLE AJAX SCRIPT -->
<script>

     
     function DownloadList(){
          window.location.href = "other/downloadlist.php";
     }

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
