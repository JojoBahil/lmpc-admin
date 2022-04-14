<?php
    include('other/dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
    include('other/navigation.php');

    if(!$_SESSION['username']){
        header('location: index.php');
    }

?>
<head>  
    <title>Application DAT File List</title>  
    <script src="assets/js/jquery.min.js"></script>  
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <script src="assets/datatables/datatables.min.js"></script> 
    <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link rel="stylesheet" href="assets/css/listofgrantees.css">
    
</head>  
<body  style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">  
    <br /><br />      
    <div class="container" >
    <h4 align="left" style="font-family:helvetica;color:#444;">Application DAT Files</h4>  
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
        <table id="table_AppDAT" class="table table-striped table-bordered table-sm" style='font-size:14px;'>  
            <thead class="table_header"  style="font-size:15px; background-color:rgb(255, 204, 142); font-weight: bold;">  
                <tr>  
                    <th width="30%">Export Date</th>
                    <th width="35%">DAT File Name</th>
                    <th width="10%">Total HEIS</th>
                    <th width="10%">Total Grantees</th>
                    <th width="25%">Action</th>
                </tr>  
            </thead>  
            <tbody>
                <?php
                    $sqlAppDAT = "SELECT DISTINCT(application_datfile_name), application_datfile_export_date FROM tbl_lbp_form WHERE application_datfile_name IS NOT NULL OR application_datfile_name != '' ORDER BY application_datfile_export_date DESC, application_datfile_name DESC";
                    $resAppDAT = mysqli_query($connect, $sqlAppDAT);
                    $checkAppDAT = mysqli_num_rows($resAppDAT);
                    if($checkAppDAT > 0){
                        while($row=mysqli_fetch_assoc($resAppDAT)){
                            $export_name = $row['application_datfile_name'];
                            // $export_date = $row['application_datfile_name'];

                            $sqlExportDate = "SELECT application_datfile_export_date FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
                            $resExportDate = mysqli_query($connect, $sqlExportDate);
                            $checkExportDate = mysqli_num_rows($resExportDate);
                            if($checkExportDate > 0){
                                $row = mysqli_fetch_assoc($resExportDate);
                                $export_date = $row['application_datfile_export_date'];
                                $text_export_date = date("M d, Y", strtotime($export_date));
                            }

                            $sqlTotalHEIS = "SELECT DISTINCT(hei_uii) AS totalheis FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
                            $resTotalHEIS = mysqli_query($connect, $sqlTotalHEIS);
                            $checkTotalHEIS = mysqli_num_rows($resTotalHEIS);
                            if($checkTotalHEIS > 0){
                                $total_heis = $checkTotalHEIS;
                            }

                            $sqlTotalGrantees = "SELECT Count(*) FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
                            $resTotalGrantees = mysqli_query($connect, $sqlTotalGrantees);
                            $checkTotalGrantees = mysqli_num_rows($resTotalGrantees);
                            if($checkTotalGrantees > 0){
                                $row=mysqli_fetch_assoc($resTotalGrantees);
                                $total_grantees = $row['Count(*)'];
                            }
                            
                             $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View HEIs" data-toggle="modal" id="'.$export_name.'" name="'.$export_name.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                        <input type="submit" class="btn btn-success btn_grantee view_data" value="View Grantees" data-toggle="modal" id="'.$export_name.'" name="'.$export_name.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                        <input type="hidden" class="hdn_total_grantees" id="hdn_total_grantees" name="hdn_total_grantees" value="'.$total_grantees.'">';

                            echo "
                            <tr>
                                <td>$export_date</td>
                                <td>$export_name</td>
                                <td>$total_heis</td>
                                <td>$total_grantees</td>
                                <td>$action</td>
                            </tr>
                        ";
                        }
                    }         
                ?>  
            </tbody>
        </table> 
        <?php
            include('other/datfile_details.php'); 
            include('other/datfile_grantee_details.php'); 
        ?>
    </div> <!-- Container Div -->

</body>



<script>
    $(document).ready(function(){  
        $('#table_AppDAT').DataTable({
            "dom": 'ftipr',
            "pageLength": 20,
            "order": [[ 0, 'desc' ], [ 1, 'desc' ]],
            language: {
                searchPlaceholder: "keyword"
            }
        });

        // $('#btn_bot').on('click', function() {
        //     $('#modalbot').modal("show"); 
        // });
    });   
    $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); 

    $('#table_AppDAT tbody').on('click', '.btn_', function(){  
        var export_name = $(this).attr("id");
        $.ajax({  
            url:"other/selectdatfile.php",  
            method:"post",  
            data:{export_name:export_name},  
            success:function(data){  
                $('#datfile_detail').html(data);  
                $('#datFileModal').modal("show"); 
            },  
            error: function(data) {
                alert('Ajax Data Fetch Error');
            }
        });  
    }); 
    
    $('#table_AppDAT tbody').on('click', '.btn_grantee', function(){  
        var export_name = $(this).attr("id");
        $.ajax({  
            url:"other/selectdatfile_grantees.php",  
            method:"post",  
            data:{export_name:export_name},  
            success:function(data){  
                $('#datfile_grantee_detail').html(data);  
                $('#datFileModalGrantee').modal("show"); 
            },  
            error: function(data) {
                alert('Ajax Data Fetch Error');
            }
        });  
    }); 
</script> 

<!-- BOOTSTRAP PLUGIN SCRIPT -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<script src="assets/js/all.min.js"></script>
