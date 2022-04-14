<?php  
     include('other/dbconnect.php');
     include('other/navigation.php');
     header("Content-Type:text/html; charset=ISO-8859-1"); 

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
          <link rel="stylesheet" href="assets/css/loader.css">
          <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
          <link rel="stylesheet" href="assets/css/listofgrantees.css">
     </head>  
     <body  style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">  
          <div class="loader">
               <img src="image/preloading.gif" alt="Loading..." width="30" height="30">
          </div>     
          <br /><br />  
          <div class="container">  
               <h4 align="left" style="font-family:helvetica;color:#444;">UniFAST Database</h4>  
               <br />  
               <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-4">
                    <label style="font-size:12px;">Select Database Here: </label>
                    </div>
               </div>
               <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-5">
                         <select class="sel_database" id="sel_database" name="sel_database" OnChange="getDatabase(this.value)" style="width:100%;height:30px;border-radius:3px;margin-bottom:20px;">
                              <option value="hei_database">Higher Education Institutions</option>
                              <option value="lbp_database">LandBank Branches</option>
                         </select>
                    </div>
               </div>  
               <div class="table-responsive table_div" id="table_div" style="font-size:13px;"> 
               <h2 align="center">List of Higher Education Institutions</h2> 
                    <table id="table_grantees" class="table table-striped table-bordered table-sm">  
                         <thead class="table_header" style="font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;">  
                              <tr>  
                                   <td width="12%">HEI UII.</td>
                                   <td width="38%">HEI Name</td>
                                   <td width="20%">HEI Type</td>
                                   <td width="20%">HEI Role</td>
                                   <td width="10%">View</td>
                              </tr>  
                         </thead>
                         <tbody> 
                              <?php  
                                   $sqlHEI = "SELECT * FROM tbl_heis";
                                   $resHEI = mysqli_query($connect, $sqlHEI);
                                   $checkHEI = mysqli_num_rows($resHEI);
                                   if($checkHEI){
                                        while($row = mysqli_fetch_assoc($resHEI)){
                                             $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                                             $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                                             $hei_type = mysqli_real_escape_string($connect, $row['hei_it']);
                                             $hei_role = mysqli_real_escape_string($connect, $row['hei_ct']);
                                             $view = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$hei_uii.'" name="'.$hei_uii.'" data-target="#modal_hei_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';
                                            
                                             echo "
                                                  <tr>
                                                       <td>$hei_uii</td>
                                                       <td>$hei_name</td>
                                                       <td>$hei_type</td>
                                                       <td>$hei_role</td>
                                                       <td style='text-align:center;'>$view</td>
                                                  </tr>
                                             ";
                                        }
                                   }
                                   
                              ?>
                         </tbody>   
                    </table>  
                    <!-- Modal -->
                    <?php include('other/hei_profilemodal.php'); ?>
               </div>  <!-- table-responsive table_div-->
          </div> <!-- container -->
          <?php
            include('footer.php');
          ?>
     </body>  
</html>  
<script>  
     $(window).on('load', function(){
          $('.loader').addClass('hidden');
     });
     $(document).ready(function(){ 
          // DATA TABLE SCRIPT 
          $('#table_grantees').DataTable({
               "dom": 'ftipr',
               "pageLength": 25,
               language: {
                    searchPlaceholder: "Search by keyword..."
               }
          });

          // GET TABLE ROW VALUE SCRIPT
          $('#table_grantees tbody').on('click', '.btn_', function(){
               var hei_uii = $(this).attr("id");
               $.ajax({  
                    url:"other/selectheiuii.php",  
                    method:"post",  
                    data:{hei_uii:hei_uii},  
                    success:function(data){  
                         $('#hei_detail').html(data);  
                         $('#modal_hei_profile').modal("show"); 
                    },  
                    error: function(data) {
                        alert('Ajax Data Fetch Error');
                    }  
               });  
          }); 
          
          // ADD CLASS FOR SEARCH BAR
          $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); //move search bar to left

     }); //END OF DOCUMENT.READY  
</script> 
 
 <!-- TABLE REFRESH AJAX SCRIPT -->
<script>   
     function getDatabase(val){
          $.ajax({
               type: "POST",
               url: "other/get_database.php",
               data: "database=" +val,
               success: function(data){
               $("#table_div").html(data);
               }
          });
     }
</script>


 <!-- BOOTSTRAP PLUGIN SCRIPT -->
 <script src="assets/bootstrap/js/bootstrap.min.js"></script> 