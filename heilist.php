<?php
    include('other/dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
    include('other/navigation.php');

    if(!$_SESSION['username']){
        header('location: index.php');
    }

?>
<head>  
    <title>HEI List</title>  
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
    <h4 align="left" style="font-family:helvetica;color:#444;">Status Per Higher Education Institutions</h4>  
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
        <table id="table_heis" class="table table-striped table-bordered table-sm" style='font-size:13px;'>  
            <thead class="table_header"  style="font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;">  
                <tr>  
                    <th width="15%">Region</th>
                    <th width="5%">HEI UII</th>
                    <th width="40%">HEI Name</th>
                    <th width="6%">Not Finalized</th>
                    <th width="6%">Finalized</th>
                    <th width="6%">Application Exported</th>
                    <th width="6%">Approved</th>
                    <th width="6%">Claimed</th>
                    <th width="10%">Total Grantees</th> 
                </tr>  
            </thead>  
            <tbody>
                <?php

                    $sqlHEIStatusList = "SELECT * FROM tbl_heis";
                    $resHEIStatusList = mysqli_query($connect, $sqlHEIStatusList);
                    $checkHEIStatusList = mysqli_num_rows($resHEIStatusList);
                    if($checkHEIStatusList > 0){
                        while($row = mysqli_fetch_assoc($resHEIStatusList)){
                            $hei_region_nir = mysqli_real_escape_string($connect, $row['hei_region_nir']);
                            $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                            $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                            
                            // $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                            //            <input type="button" class="btn btn-success btn_unfinalize_data" value="Unfinalize" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;" '.$disable.'>
                            //            <input type="hidden" class="hdn_awardno" id="hdn_awardno" name="hdn_awardno" value="'.$awardno.'">';

                            //Not Finalized
                            $sqlNotFinalized = "SELECT Count(*) FROM vw_for_admin WHERE status = 'Not Finalized' AND hei_uii = '$hei_uii'";
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

                            //Finalized
                            $sqlFinalized = "SELECT Count(*) FROM vw_for_admin WHERE status = 'Finalized' AND hei_uii = '$hei_uii'";
                            $resFinalized = mysqli_query($connect, $sqlFinalized);
                            $checkFinalized = mysqli_num_rows($resFinalized);
                            if($checkFinalized > 0){
                                while($row=mysqli_fetch_assoc($resFinalized)){
                                    $finalized = $row['Count(*)'];
                                }
                            }
                            else{
                                $finalzied = 0;
                            }

                            //Application Exported
                            $sqlApplicationExported = "SELECT Count(*) FROM vw_for_admin WHERE status = 'App-DAT' AND hei_uii = '$hei_uii'";
                            $resApplicationExported = mysqli_query($connect, $sqlApplicationExported);
                            $checkApplicationExported = mysqli_num_rows($resApplicationExported);
                            if($checkApplicationExported > 0){
                                while($row=mysqli_fetch_assoc($resApplicationExported)){
                                    $appDAT = $row['Count(*)'];
                                }
                            }
                            else{
                                $appDAT = 0;
                            }

                            //Approved
                            $sqlApproved = "SELECT Count(*) FROM vw_for_admin WHERE status = 'Approved' AND hei_uii = '$hei_uii'";
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

                            //Claimed
                            $sqlClaimed = "SELECT Count(*) FROM vw_for_admin WHERE status = 'Claimed' AND hei_uii = '$hei_uii'";
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

                            //Total Grantee
                            $sqlTotalGrantee = "SELECT Count(*) FROM vw_for_admin WHERE hei_uii = '$hei_uii'";
                            $resTotalGrantee = mysqli_query($connect, $sqlTotalGrantee);
                            $checkTotalGrantee = mysqli_num_rows($resTotalGrantee);
                            if($checkTotalGrantee > 0){
                                while($row=mysqli_fetch_assoc($resTotalGrantee)){
                                    $total = $row['Count(*)'];
                                }
                            }
                            else{
                                $total = 0;
                            }

                            echo "
                                <tr>
                                    <td>$hei_region_nir</td>
                                    <td>$hei_uii</td>
                                    <td>$hei_name</td>
                                    <td>$notFinalized</td>
                                    <td>$finalized</td>
                                    <td>$appDAT</td>
                                    <td>$approved</td>
                                    <td>$claimed</td>
                                    <td>$total</td>
                                </tr>
                            ";
                        }
                    }   
                ?>  
            </tbody>
        </table> 
    </div> <!-- Container Div -->
</body>

    <script>
    $(document).ready(function(){  
        $('#table_heis').DataTable({
            "dom": 'ftipr',
            "pageLength": 10,
            language: {
                searchPlaceholder: "keyword"
            }
        });

        // $('#btn_bot').on('click', function() {
        //     $('#modalbot').modal("show"); 
        // });
    });   
    $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); 
</script> 
