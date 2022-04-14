<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 
?>

    
    <?php
        $region = $_POST['region'];
        $hei_type = $_POST['hei_type'];

        $sqlHEINames = "SELECT hei_name, hei_uii FROM tbl_heis WHERE hei_psg_region ='".$region."' AND hei_it ='".$hei_type."'  ORDER BY hei_name ASC";
        $resHEINames = mysqli_query($connect, $sqlHEINames);
        $checkHEINames = mysqli_num_rows($resHEINames);
        if($checkHEINames > 0){
            while($row = mysqli_fetch_assoc($resHEINames)){
                $hei_name = $row['hei_name'];
                $hei_uii = $row['hei_uii'];
                echo "<option value='".$hei_uii."'>".$hei_name."</option>";
            }
        }
        else{
            echo "<option></option>";
        }
        
    ?>  


