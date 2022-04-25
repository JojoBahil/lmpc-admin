<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
?>

    <table id="table_grantees" class="table table-striped table-bordered table-sm">  
        <thead class="table_header"  style="font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;">  
            <tr>  
                <th width="10%">Award No.</th>
                <th width="10%">Last Name</th>
                <th width="10%">First Name</th>
                <th width="10%">Middle Name</th>
                <th width="5%">Sex</th>
                <th width="30%">HEI Name</th>
                <th width="10%">Actions</th> 
            </tr>  
        </thead>  
        <tbody>
            <?php
                if(empty($_POST['hei_uii']) && empty($_POST['ac_year'])){
                    $sqlGrantees = "SELECT * FROM tbl_lbp_form";
                    $resGrantees = mysqli_query($connect, $sqlGrantees);
                    $checkGrantees = mysqli_num_rows($resGrantees);
                    if($checkGrantees){
                        while($row = mysqli_fetch_assoc($resGrantees)){
                            $awardno = mysqli_real_escape_string($connect, $row['award_no']);
                            $lastname = mysqli_real_escape_string($connect, $row['lname']);
                            $firstname = mysqli_real_escape_string($connect, $row['fname']);
                            $middlename = mysqli_real_escape_string($connect, $row['mname']);
                            $sex = mysqli_real_escape_string($connect, $row['sex']);
                            $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                            $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';

                            $sqlHEI = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
                            $resHEI = mysqli_query($connect, $sqlHEI);
                            $checkHEI = mysqli_num_rows($resHEI);
                            if($checkHEI){
                                while($row = mysqli_fetch_assoc($resHEI)){
                                    $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                                }
                            }
                            echo "
                                <tr>
                                    <td>$awardno</td>
                                    <td>$lastname</td>
                                    <td>$firstname</td>
                                    <td>$middlename</td>
                                    <td>$sex</td>
                                    <td>$hei_name</td>
                                    <td style='text-align:center;'>$action</td>
                                </tr>
                            ";
                        }
                    }
                }
                elseif(!empty($_POST['hei_uii']) && empty($_POST['ac_year'])){
                    $sqlGrantees = "SELECT * FROM tbl_lbp_form WHERE hei_uii = '".$_POST['hei_uii']."'";
                    $resGrantees = mysqli_query($connect, $sqlGrantees);
                    $checkGrantees = mysqli_num_rows($resGrantees);
                    if($checkGrantees){
                        while($row = mysqli_fetch_assoc($resGrantees)){
                            $awardno = mysqli_real_escape_string($connect, $row['award_no']);
                            $lastname = mysqli_real_escape_string($connect, $row['lname']);
                            $firstname = mysqli_real_escape_string($connect, $row['fname']);
                            $middlename = mysqli_real_escape_string($connect, $row['mname']);
                            $sex = mysqli_real_escape_string($connect, $row['sex']);
                            $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                            $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';

                            $sqlHEI = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
                            $resHEI = mysqli_query($connect, $sqlHEI);
                            $checkHEI = mysqli_num_rows($resHEI);
                            if($checkHEI){
                                while($row = mysqli_fetch_assoc($resHEI)){
                                    $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                                }
                            }
                            echo "
                                <tr>
                                    <td>$awardno</td>
                                    <td>$lastname</td>
                                    <td>$firstname</td>
                                    <td>$middlename</td>
                                    <td>$sex</td>
                                    <td>$hei_name</td>
                                    <td style='text-align:center;'>$action</td>
                                </tr>
                            ";
                        }
                    }
                }
                elseif(empty($_POST['hei_uii']) && !empty($_POST['ac_year'])){
                    $sqlGrantees = "SELECT * FROM tbl_lbp_form WHERE ac_year = '".$_POST['ac_year']."'";
                    $resGrantees = mysqli_query($connect, $sqlGrantees);
                    $checkGrantees = mysqli_num_rows($resGrantees);
                    if($checkGrantees){
                        while($row = mysqli_fetch_assoc($resGrantees)){
                            $awardno = mysqli_real_escape_string($connect, $row['award_no']);
                            $lastname = mysqli_real_escape_string($connect, $row['lname']);
                            $firstname = mysqli_real_escape_string($connect, $row['fname']);
                            $middlename = mysqli_real_escape_string($connect, $row['mname']);
                            $sex = mysqli_real_escape_string($connect, $row['sex']);
                            $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                            $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';

                            $sqlHEI = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
                            $resHEI = mysqli_query($connect, $sqlHEI);
                            $checkHEI = mysqli_num_rows($resHEI);
                            if($checkHEI){
                                while($row = mysqli_fetch_assoc($resHEI)){
                                    $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                                }
                            }
                            echo "
                                <tr>
                                    <td>$awardno</td>
                                    <td>$lastname</td>
                                    <td>$firstname</td>
                                    <td>$middlename</td>
                                    <td>$sex</td>
                                    <td>$hei_name</td>
                                    <td style='text-align:center;'>$action</td>
                                </tr>
                            ";
                        }
                    }
                }
                elseif(!empty($_POST['hei_uii']) && !empty($_POST['ac_year'])){
                    $sqlGrantees = "SELECT * FROM tbl_lbp_form WHERE ac_year = '".$_POST['ac_year']."' AND hei_uii = '".$_POST['hei_uii']."'";
                    $resGrantees = mysqli_query($connect, $sqlGrantees);
                    $checkGrantees = mysqli_num_rows($resGrantees);
                    if($checkGrantees){
                        while($row = mysqli_fetch_assoc($resGrantees)){
                            $awardno = mysqli_real_escape_string($connect, $row['award_no']);
                            $lastname = mysqli_real_escape_string($connect, $row['lname']);
                            $firstname = mysqli_real_escape_string($connect, $row['fname']);
                            $middlename = mysqli_real_escape_string($connect, $row['mname']);
                            $sex = mysqli_real_escape_string($connect, $row['sex']);
                            $hei_uii = mysqli_real_escape_string($connect, $row['hei_uii']);
                            $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">';

                            $sqlHEI = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '$hei_uii'";
                            $resHEI = mysqli_query($connect, $sqlHEI);
                            $checkHEI = mysqli_num_rows($resHEI);
                            if($checkHEI){
                                while($row = mysqli_fetch_assoc($resHEI)){
                                    $hei_name = mysqli_real_escape_string($connect, $row['hei_name']);
                                }
                            }
                            echo "
                                <tr>
                                    <td>$awardno</td>
                                    <td>$lastname</td>
                                    <td>$firstname</td>
                                    <td>$middlename</td>
                                    <td>$sex</td>
                                    <td>$hei_name</td>
                                    <td style='text-align:center;'>$action</td>
                                </tr>
                            ";
                        }
                    }
                }
            ?>  
        </tbody>
    </table> 

<!-- Modal -->
<?php 
    include('student_profilemodal.php'); 
    include('batch_opening_modal.php');
?>

<script>
    $(document).ready(function(){  
        $('#table_grantees').DataTable({
            "dom": 'ftipr',
            "pageLength": 25,
            language: {
                searchPlaceholder: "keyword"
            }
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
            
            $('#btn_bot').on('click', function() {
                $('#modalbot').modal("show"); 
            });
        });  
</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script> 




