<?php  
    header("Content-Type:text/html; charset=ISO-8859-1");
    if(isset($_POST["export_name"]))  
    {  
        $export_name = $_POST["export_name"];
        $output = ''; 

//         $text_export_date = date("M d, Y", strtotime($export_date));

        include('dbconnect.php');
        
        //TOTAL HEIS
        $sqlTotalHEIs = "SELECT DISTINCT(hei_uii) FROM tbl_lbp_form WHERE application_datfile_name = '$export_name'";
        $resTotalHEIs = mysqli_query($connect, $sqlTotalHEIs);
        $checkTotalHEIs = mysqli_num_rows($resTotalHEIs);
        if($checkTotalHEIs > 0){
            $total_heis = $checkTotalHEIs;
        }
        else{
            $total_heis = 0;
        }

        //TOTAL GRANTEES
        $sqlTotalGrantees = "SELECT Count(*) FROM tbl_lbp_form WHERE application_datfile_name = '".$export_name."'";
        $resTotalGrantees = mysqli_query($connect, $sqlTotalGrantees);
        $checkTotalGrantees = mysqli_num_rows($resTotalGrantees);
        if($checkTotalGrantees > 0){
            $row=mysqli_fetch_assoc($resTotalGrantees);
            $total_grantees = $row['Count(*)'];
        }
        
        $query = "SELECT hei_uii, Count(*) FROM tbl_lbp_form WHERE application_datfile_name ='$export_name' GROUP BY hei_uii"; 
        $result = mysqli_query($connect, $query); 
        $check = mysqli_num_rows($result);
        
        $output .= '
            <div class="container table-responsive" style="background-color:white;margin-top:10px;">
                <div class="form-row">
                    <div class="col alert alert-info alert-dismissible" style="margin:5px;">
                         <label><b>DAT File Name: </b>'.$export_name.'</label>
                    </div>
                    <div class="col alert alert-success alert-dismissible" style="margin:5px;">
                        <label><b>Total HEIs: </b>'.$total_heis.'</label>
                    </div>
                    <div class="col alert alert-warning alert-dismissible" style="margin:5px;">
                        <label><b>Total Grantees: </b>'.$total_grantees.'</label>
                    </div>
                </div><br>          
                <table class="table table-bordered" id="table_exported">
                    <thead style="background-color:orange;">
                        <tr>
                            <th>Region</th>
                            <th>HEI Name</th>
                            <th>Number of Grantees</th>
                        </tr>
                    </thead>
                    <tbody>'
                    ;
        if($check > 0){
            while($row = mysqli_fetch_assoc($result))
            {  
            $hei_uii = $row['hei_uii'];

            $sqlHEIName = "SELECT hei_name, hei_region_nir FROM tbl_heis WHERE hei_uii = '$hei_uii'";
            $resHEIName = mysqli_query($connect, $sqlHEIName);
            $heiNameRow = mysqli_fetch_assoc($resHEIName);
            $hei_name = $heiNameRow['hei_name'];
            $region = $heiNameRow['hei_region_nir'];


            $total_grantees = $row['Count(*)'];

            $output .= '
                <tr>
                    <td>'.$region.'</td>
                    <td>'.$hei_name.'</td>
                    <td>'.$total_grantees.'</td>
                </tr>
            ';
            }
        }
        else{
            $output .= '
                <tr>
                    <td>No Record</td>
                    <td>No Record</td>
                    <td>No Record</td>
                </tr>
            ';
        }
        
        $output .= '
                </tbody>
            </table>
        </div>';

        echo $output;
    }  
?>

<script>
    $(document).ready(function(){  
        $('#table_exported').DataTable({
            "dom": 'ftipr',
            language: {
                searchPlaceholder: "keyword"
            }
        });
    });  
</script>
