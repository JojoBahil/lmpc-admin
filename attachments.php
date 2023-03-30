<?php  
     include('other/dbconnect.php');
     include('other/navigation.php');
     header("Content-Type:text/html; charset=ISO-8859-1"); 

     if(!$_SESSION['username']){
          header('location: index.php');
     }

     $student_portal = 'tes.lbp.app';
?>  
<!DOCTYPE html>  
<html>  
     <head>  
          <title>LMPC Admin Portal</title>
          <link rel="icon" type="image/x-icon" href="image/lmpcadminicon.ico">
          <script src="assets/js/jquery.min.js"></script>  
          <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
          <script src="assets/datatables/datatables.min.js"></script> 
          <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
          <link rel="stylesheet" href="assets/css/loader.css">
          <link rel="stylesheet" href="assets/css/listofgrantees.css">
          <link rel="stylesheet" href="assets/css/all.min.css">
          <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
          <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" /> 
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
          
     </head>  
     <body  style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">  
          <div class="loader">
               <img src="image/preloading.gif" alt="Loading..." width="30" height="30">
          </div>     
     <br /><br />  
          <div class="container">  
               <h4 align="left" style="font-family:helvetica;color:#444;">PDF Files</h4>  
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
               <div class="row">
                    <div class="col-lg-6 col-md-12">
                         <form action='other/export_data.php' method='POST'>
                              <div class="form-row" style="text-align:left">
                                   <div class="col-lg-9 col-md-9">
                                        <div class="row">
                                             <div class="col">

                                             </div>
                                        </div>
                                        <label style='font-size:12px;'>Filter by Application DAT File Export Date</label>
                                        <select name='sel_reexport' class='sel_reexport' id='sel_reexport' style="font-size:13px;width:100%;height:30px;border-radius:3px;margin-bottom:30px;" OnChange='get_max_batch(this.value)'>
                                             <?php
                                                  $sqlDATFileName = "SELECT DISTINCT(application_datfile_name), application_datfile_export_date FROM tbl_lbp_form WHERE application_datfile_name IS NOT NULL OR application_datfile_name != '' ORDER BY application_datfile_export_date DESC, application_datfile_name DESC";
                                                  $resDATFileName = mysqli_query($connect, $sqlDATFileName);
                                                  $checkDATFileName = mysqli_num_rows($resDATFileName);
                                                  if($checkDATFileName > 0){
                                                       echo '<option disabled selected>-- Select DAT File --</option>';
                                                       while($row=mysqli_fetch_assoc($resDATFileName)){
                                                            $datFileName = $row['application_datfile_name'];
                                                            echo '<option value="'.$datFileName.'">'.$datFileName.'</option>';
                                                       }
                                                  }
                                                  else{
                                                       echo '<option></option>';
                                                  }
                                             ?>
                                        </select>
                                   </div>
                                   <div class='col-lg-3 col-md-3' id='div_batch'>
                                        <label style='font-size:12px;'>Batch #</label><br>
                                        <input type='number' min='1' value='1' name='batch_number' id='batch_number' class='batch_number' style='width:84px;' disabled>
                                   </div>            
                              </div><br>
                              <div class="form-row" style="text-align:left">
                                   <div class="col-lg-12 col-md-12">
                                        <input type='submit' class="btn btn-info" id='btn_download' name='btn_download' value='Download PDF' style='width:100%;margin-bottom:5px;'>
                                        <input type='submit' class="btn btn-info" id='btn_download_text' name='btn_download_text' value='Download Text' style='width:100%;'></br></br>
                                        <input type='submit' class="btn btn-warning" id='btn_unload_pdfs' name='btn_unload_pdfs' value='Unload PDF and IDs' style='width:100%'  <?php if($_SESSION['username'] != 'admin'){echo 'disabled';} ?>>
                                   </div>
                              </div>
                         </form>
                    </div>
                    <div class="col-lg-6 col-md-12">
                         <div class="form-row">
                              <div style="text-align:left;font-size:13px;color:#111;"><br>
                                   <?php
                                        $disktotalspace = disk_total_space('/home/u246964555/domains/unifast.gov.ph/public_html');
                                        $disktotalspace = $disktotalspace/1073741824;
                                        
                                        $diskfreespace = disk_free_space('/home/u246964555/domains/unifast.gov.ph/public_html');
                                        $diskfreespace = $diskfreespace/1073741824;      
                                        $useddiskspace = $disktotalspace-$diskfreespace;

                                        $percent_diskfreespace = ($diskfreespace/$disktotalspace)*100;
                                        $percent_useddiskspace = ($useddiskspace/$disktotalspace)*100;
                                        
                                   ?>
                                   <table style="font-family:sans-serif;font-size:13px;">
                                        <tr>
                                             <td>
                                                  Disk Free Space:
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>".round($diskfreespace, 2)."</b> GB"; ?>
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>".round($percent_diskfreespace, 2)."</b>%"; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  Used Space:
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>".round($useddiskspace, 2)."</b> GB"; ?>
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>".round($percent_useddiskspace, 2)."</b>%"; ?>
                                             </td>
                                        </tr>
                                        <tr>
                                             <td>
                                                  Total Space:
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>".round($disktotalspace, 2)."</b> GB"; ?>
                                             </td>
                                             <td style="padding-left:30px;padding-bottom:5px;">
                                                  <?php echo "<b>100</b>%"; ?>
                                             </td>
                                        </tr>
                                   </table><br>
                              </div>
                         </div>
                         <div class="form-row">
                              <div class="col-lg-12 col-md-12">
                                   <div class="card">
                                        <div class="card-body">
                                             <canvas id="diskSpaceChart" width="1" height="1"></canvas>
                                        </div>
                                   </div>
                              </div>
                         </div>                    
                    </div>
               </div>     
               <!-- Modal -->
               <?php 
                    include('other/student_profilemodal.php'); 
                    include('other/batch_opening_modal.php');
               ?>
          </div> <!-- container -->
          <?php
               include('footer.php');
          ?>
     </body>  
</html>  

<script>  
     $(document).ready(function(){ 
     // CHART FOR STUDENTS
        var ctx = document.getElementById('diskSpaceChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Disk Space Used', 'Free Space'],
                datasets: [{
                    label: 'Size in GB',
                    data: [<?php echo $useddiskspace; ?>, <?php echo $diskfreespace; ?>],
                    backgroundColor: [
                         '#ff57a2',
                         '#005cf0'
                    ],
                    borderColor: [
                         '#ff57a2',
                         '#005cf0'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        display:false,
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                },  
                title:{
                    display: true,
                    text:'Disk Usage',    
                    fontSize:20
                },
                legend:{
                    display: true,
                    position:'top'
                },
                plugins: {
                    datalabels: {
                    formatter: (value, ctx) => {
                        let datasets = ctx.chart.data.datasets;
                        if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                            let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = Math.round((value / sum) * 100) + '%';
                            return percentage;
                        } 
                        else {
                            return percentage;
                        }
                    },
                    color: '#fff',
                    }
                }
            }
        });




          $("#sel_reexport").select2();

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
          
          // ADD CLASS FOR SEARCH BAR
          $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); //move search bar to left

     }); //END OF DOCUMENT.READY  
</script> 
 
 <!-- TABLE REFRESH AJAX SCRIPT -->
<script>
     $(window).on('load', function(){
          $('.loader').addClass('hidden');

     });

     $("[type='number']").keypress(function (evt) {
          evt.preventDefault();
     });

     function get_max_batch(appdat_name){
          batch_number = $('#batch_number').val();
          $.ajax({               
               type: "POST",
               url: "other/get_max_batch.php",
               data: {appdat_name:appdat_name, batch_number:batch_number},
               success: function(data){
                    $("#div_batch").html(data);
               }
          });
     }

     function generatelist(){
          var academic_year = $('#sel_ac_year').val();
          var hei_uii = $('#sel_db_hei').val();
          alert(academic_year);
          alert(hei_uii);
     }     

</script>


 <!-- BOOTSTRAP PLUGIN SCRIPT -->
 <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
 <script src="assets/js/all.min.js"></script>
