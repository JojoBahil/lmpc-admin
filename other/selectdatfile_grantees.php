<?php  
    header("Content-Type:text/html; charset=ISO-8859-1");

    $student_portal = 'tes.lbp.app';

    if(isset($_POST["export_name"]))  
    {  
        $export_name = $_POST["export_name"];
        $output = '';  

        include('dbconnect.php');

        //TOTAL GRANTEES
        $sqlTotalGrantees = "SELECT Count(*) FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
        $resTotalGrantees = mysqli_query($connect, $sqlTotalGrantees);
        $checkTotalGrantees = mysqli_num_rows($resTotalGrantees);
        if($checkTotalGrantees > 0){
            $row=mysqli_fetch_assoc($resTotalGrantees);
            $total_grantees = $row['Count(*)'];
        }

            
        
        $output .= '
            <div class="container table-responsive" style="background-color:white;margin-top:10px;">
                <div class="form-row">
                    <div class="col alert alert-info alert-dismissible" style="margin:5px;">
                        <label><b>DAT File Name: </b>'.$export_name.'</label>
                    </div>
                    <div class="col alert alert-warning alert-dismissible" style="margin:5px;">
                        <label><b>Total Grantees: </b>'.$total_grantees.'</label>
                    </div>
                </div><br>          
                <table class="table table-bordered" id="table_exported_grantees">
                    <thead style="background-color:orange;">
                        <tr>
                            <th>TES Award Number</th></th>
                            <th>Branch Code</th>
                            <th>Branch Name</th>
                            <th>Batch No</th>
                            <th>Front ID</th>
                            <th>Back ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>'
                    ;
                    //GRANTEES
        $sqlGrantees = "SELECT * FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
        $resGrantees = mysqli_query($connect, $sqlGrantees);
        $checkGrantees = mysqli_num_rows($resGrantees);    
        if($checkGrantees > 0){
            while($row=mysqli_fetch_assoc($resGrantees)){
                $award_no = $row['award_no'];
                $lbp_branch_code = $row['lbp_branch_code'];
                $lbp_branch = $row['lbp_branch'];
                $application_datfile_batch = $row['application_datfile_batch'];
                $id_front_photo = $row['id_front_photo'];
                $id_back_photo = $row['id_back_photo'];

                $id_front_photo=substr($id_front_photo, 2);
                $id_back_photo=substr($id_back_photo, 2);

                $id_front_photo = '../'.$student_portal.$id_front_photo;
                $id_back_photo = '../'.$student_portal.$id_back_photo;

                $action =         '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$award_no.'" name="'.$award_no.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                   <input type="button" class="btn btn-success btn_unfinalize_data" value="Unfinalize" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                   <input type="hidden" class="hdn_awardno" id="hdn_awardno" name="hdn_awardno" value="'.$award_no.'">';

                $output .= 
                '<tr>
                    <td>'.$award_no.'</td>
                    <td>'.$lbp_branch_code.'</td>
                    <td>'.$lbp_branch.'</td>
                    <td>'.$application_datfile_batch.'</td>
                    <td><img src="'.$id_front_photo.'" height=100></td>
                    <td><img src="'.$id_back_photo.'" height=100></td>
                    <td>'.$action.'</td>
                </tr>';
            }            
        }

            $total_grantees = $row['Count(*)'];
        
        $output .= '
                </tbody>
            </table>
        </div>';

        echo $output;
    }  
?>

<script>
    $(document).ready(function(){  
        $('#table_exported_grantees').DataTable({
            "dom": 'ftipr',
            "pageLength": 100,
            language: {
                searchPlaceholder: "keyword"
            }
        });

        // Go to Unfinalize Php Script
        $('#table_grantees tbody').on('click', '.btn_unfinalize_data', function(){ 
            var award_no = $('#hdn_awardno').val();
            document.location.href = 'other/unfinalize.php?awardno='+award_no;
        });
    });  
</script>
