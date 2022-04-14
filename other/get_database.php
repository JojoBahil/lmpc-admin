<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
    $output = "";
    if($_POST['database'] == 'hei_database'){
        $output .= "
        <h2 align='center'>List of Higher Education Institutions</h2> 
        <table id='table_grantees' class='table table-striped table-bordered table-sm'>  
        <thead class='table_header' style='font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;'>  
            <tr>  
                <td width='12%'>HEI UII.</td>
                <td width='38%'>HEI Name</td>
                <td width='20%'>HEI Type</td>
                <td width='20%'>HEI Role</td>
                <td width='10%'>View</td>
            </tr>  
        </thead>
        <tbody>"; 
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
                        
                            $output .= "
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
            $output .="
                    </tbody>   
                </table>  
                <!-- Modal -->";
                include('hei_profilemodal.php');
                $output .= "
                <script>
                    $(document).ready(function(){  
                        $('#table_grantees').DataTable({
                            'dom': 'ftipr',
                            'pageLength': 25,
                            language: {
                                searchPlaceholder: 'keyword'
                            }
                        });
                    });   
                </script> 

                <!-- get table row value script -->
                <script>  
                    $(document).ready(function(){  
                        $('#table_grantees tbody').on('click', '.btn_', function(){  
                            var hei_uii = $(this).attr('id');
                            $.ajax({  
                                    url:'other/selectheiuii.php',  
                                    method:'post',  
                                    data:{hei_uii:hei_uii},  
                                    success:function(data){  
                                        $('#hei_detail').html(data);  
                                        $('#modal_hei_profile').modal('show'); 
                                    },  
                                    error: function(data) {
                                        alert('Ajax Data Fetch Error');
                                    }
                            });  
                        });  
                        $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); //move search bar to left 
                    });  
                </script>

                <script src='assets/bootstrap/js/bootstrap.min.js'></script> 
            ";
        echo $output;
    }
    elseif($_POST['database'] == 'lbp_database'){
        $output .= "
        <h2 align='center'>List of LandBank Branches</h2> 
        <table id='table_grantees' class='table table-striped table-bordered table-sm'>  
        <thead class='table_header' style='font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;'>  
            <tr>  
                <td width='20%'>Branch Name.</td>
                <td width='20%'>Branch Head</td>
                <td width='45%'>Address</td>
                <td width='10%'>Region</td>
                <!-- <td width='5%'>View</td> -->
            </tr>  
        </thead>
        <tbody>"; 
                $sqlLBP = "SELECT * FROM tbl_lbp_branches";
                $resLBP = mysqli_query($connect, $sqlLBP);
                $checkLBP = mysqli_num_rows($resLBP);
                if($checkLBP){
                    while($row = mysqli_fetch_assoc($resLBP)){
                            $branch_name = mysqli_real_escape_string($connect, $row['branch_name']);
                            $branch_head = mysqli_real_escape_string($connect, $row['branch_head']);
                            $address = mysqli_real_escape_string($connect, $row['address']);
                            $region = mysqli_real_escape_string($connect, $row['region']);
                            $view = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$branch_name.'" name="'.$branch_name.'" data-target="#modal_hei_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';
                        
                            $output .= "
                                <tr>
                                    <td>$branch_name</td>
                                    <td>$branch_head</td>
                                    <td>$address</td>
                                    <td>$region</td>
                                    <!-- <td style='text-align:center;'>$view</td> -->
                                </tr>
                            ";
                    }
                }
            $output .="
                    </tbody>   
                </table>  
                <!-- Modal -->";
                include('lbp_profilemodal.php');
                $output .= "
                <script>
                    $(document).ready(function(){  
                        $('#table_grantees').DataTable({
                            'dom': 'ftipr',
                            'pageLength': 25,
                            language: {
                                searchPlaceholder: 'keyword'
                            }
                        });
                    });   
                </script> 

                <!-- get table row value script -->
                <script>  
                    $(document).ready(function(){  
                        $('#table_grantees tbody').on('click', '.btn_', function(){  
                            var award_no = $(this).attr('id');
                            $.ajax({  
                                    url:'other/selectawardno.php',  
                                    method:'post',  
                                    data:{award_no:award_no},  
                                    success:function(data){  
                                        $('#student_detail').html(data);  
                                        $('#dataModal').modal('show'); 
                                    },  
                                    error: function(data) {
                                        alert('Ajax Data Fetch Error');
                                    }
                            });  
                        });  
                        $('.dataTables_filter').addClass('pull-left col-xl-3 col-lg-3 col-md-4'); //move search bar to left 
                    });  
                </script>

                <script src='assets/bootstrap/js/bootstrap.min.js'></script> 
        ";
        echo $output;
    }
?>


    