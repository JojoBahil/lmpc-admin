<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 

    if(isset($_POST['appdat_name'])){

        $appDATName = $_POST['appdat_name'];
        $CURRENT_ACADEMIC_YEAR = '2020-2021';
        $file_count_offset = 0;
        $file_count_limit = 50;

         // $sqlDownload = "SELECT award_no, pdf_attachment FROM vw_for_admin WHERE application_datfile_name ='".$appDATName."' AND ac_year='".$CURRENT_ACADEMIC_YEAR."' AND pdf_attachment != ''";
        // $resDownload = mysqli_query($connect, $sqlDownload);
        // $checkDownload = mysqli_num_rows($resDownload);
        // if($checkDownload > 0){
        //     if($checkDownload > $file_count_limit){
        //         $zip_export_max_counter = $checkDownload / $file_count_limit;

        //         if($zip_export_max_counter != floor($zip_export_max_counter)){
        //             $zip_export_max_counter = $zip_export_max_counter + 1;
        //         }
        //         else{
        //             $zip_export_max_counter = $zip_export_max_counter;
        //         }

        $sqlDownload = "SELECT DISTINCT(application_datfile_batch) FROM tbl_lbp_form WHERE application_datfile_name ='".$appDATName."' AND ac_year='".$CURRENT_ACADEMIC_YEAR."' AND pdf_attachment != ''";
        $resDownload = mysqli_query($connect, $sqlDownload);
        $checkDownload = mysqli_num_rows($resDownload);
        if($checkDownload > 0){
            $zip_export_max_counter = $checkDownload;    
        }
        else{
            $zip_export_max_counter = 0;   
        }
        echo 
        "<label style='font-size:12px;'>Batch #</label>
        <input type='number' name='batch_number' min='1' max='20' value='1' id='batch_number' class='batch_number' style='width:100;'>
        ";         
    }
    else{
        echo 
        "<label style='font-size:12px;'>Batch #</label>
        <input type='number' name='batch_number' min='1' max='1' value='1' id='batch_number' class='batch_number' style='width:100;'>
        ";
    }
?>


<script src="assets/bootstrap/js/bootstrap.min.js"></script> 




