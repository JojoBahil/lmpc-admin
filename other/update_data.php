<?php

include('dbconnect.php');
include('../PhpSpreadsheet-master/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

header("Content-Type:text/html; charset=ISO-8859-1");
date_default_timezone_set('Asia/Manila');


//Update for Approved Applications
if(isset($_POST['btn_update_records'])){
    if($_FILES['file_application_approve_report']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_application_approve_report']['name']);
        $file_extension = end($file_array);

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_application_approve_report']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_application_approve_report']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                $insert_data = array(
                    'tes_award_number' => $row[4],
                    'wallet_number' => $row[3],
                    'device_number' => $row[2]
                );

                extract($insert_data);     
//                 var_dump($insert_data);
//                 echo '<br>'.$tes_award_number;   

                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET wallet_number = '$wallet_number', device_number = '$device_number', status = 'Approved', remarks = NULL WHERE award_no = '$tes_award_number' AND wallet_number IS NULL AND device_number IS NULL";
                mysqli_query($connect, $sqlUpdateDetails);
                
                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to TES Award Number mismatch or all grantees in the excel file has already updated before';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }           
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}

//Update for Revert Applications to SubToUniFAST
if(isset($_POST['btn_update_revert_records'])){
    if($_FILES['file_application_subtounifast_revert']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_application_subtounifast_revert']['name']);
        $file_extension = end($file_array);

        $updated_rows = 0;

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_application_subtounifast_revert']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_application_subtounifast_revert']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                //$row starts at 0
                $insert_data = array(
                    'tes_award_number' => $row[1]
                );

                extract($insert_data);        

                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET status = 'SubToUniFAST', application_datfile_export_date = NULL, application_datfile_name = NULL, application_datfile_batch = NULL, application_datfile_sequence = NULL, remarks = NULL WHERE award_no = '$tes_award_number' AND status = 'App-DAT' AND wallet_number IS NULL AND device_number IS NULL";
                mysqli_query($connect, $sqlUpdateDetails);

                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to TES Award Number mismatch or all grantees in the excel file has already updated before';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }            
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}

//CUSTOM UPDATER
if(isset($_POST['btn_update_reject_records_01032022'])){
    if($_FILES['file_application_rejected_report_01032022']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_application_rejected_report_01032022']['name']);
        $file_extension = end($file_array);

        $updated_rows = 0;

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_application_rejected_report_01032022']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_application_rejected_report_01032022']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                //$row starts at 0
                $insert_data = array(
                    'tes_award_number' => $row[1]
                );

                extract($insert_data);    

                /* REJECT UPDATE WITH DEFAULT REMARKS (Your application was Rejected due to invalid inputs, please check carefully your inputs and re-finalize your application) */
                // $sqlUpdateDetails = "UPDATE tbl_lbp_form SET status = 'Rejected', application_datfile_export_date = NULL, application_datfile_name = NULL, application_datfile_batch = NULL, application_datfile_sequence = NULL, remarks = 'Your application was Rejected due to invalid inputs, please check carefully your inputs and re-finalize your application' WHERE award_no = '$tes_award_number' AND status = 'App-DAT' AND wallet_number IS NULL AND device_number IS NULL";
                
                // REVERT FROM App-DAT INTO SubToUniFAST FOR RE EXPORTING
                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET application_datfile_export_date = NULL, application_datfile_name = NULL, application_datfile_batch = NULL, application_datfile_sequence = NULL, status = 'SubToUniFAST' WHERE status = 'App-DAT' AND award_no = '$tes_award_number';";
                mysqli_query($connect, $sqlUpdateDetails);

                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to TES Award Number mismatch or all grantees in the excel file has already updated before';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }            
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}

//Update for Rejected Applications
if(isset($_POST['btn_update_rejected_records'])){
    if($_FILES['file_application_rejected_report']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_application_rejected_report']['name']);
        $file_extension = end($file_array);

        $updated_rows = 0;

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_application_rejected_report']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_application_rejected_report']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                $insert_data = array(
                    'tes_award_number' => $row[0],
                    'remarks' => $row[3]
                );

                extract($insert_data);        

//                 echo $tes_award_number.' '.$remarks.'<br>';
                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET status = 'Rejected', remarks = '$remarks', date_exported = NULL, editable_fields = NULL, application_datfile_export_date = NULL, application_datfile_name = NULL, application_datfile_batch = NULL, application_datfile_sequence = NULL, application_submitted_to_lbp = NULL WHERE award_no = '$tes_award_number' AND wallet_number IS NULL AND device_number IS NULL";
                mysqli_query($connect, $sqlUpdateDetails);

                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to TES Award Number mismatch or all grantees in the excel file has already updated before';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }            
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}

// UPDATE STATUS FOR CLAIMING
if(isset($_POST['btn_update_for_claiming'])){
    if($_FILES['file_forclaiming_update']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_forclaiming_update']['name']);
        $file_extension = end($file_array);

        $updated_rows = 0;

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_forclaiming_update']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_forclaiming_update']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                $insert_data = array(
                    'account_number' => $row[0],
                    'account_name' => $row[1],
                    'device_number' => $row[2],
                    'hei_name' => $row[3]
                );

                extract($insert_data);   
                // var_dump($insert_data)  ;     
                // echo '<br>'.$tes_award_number;       

                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET status = 'For Claiming' WHERE device_number = '$device_number' AND status = 'Approved' AND status != 'For Claiming'";
                mysqli_query($connect, $sqlUpdateDetails);

                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to Device Number mismatch or all grantees in the excel file has already "For Claiming" status';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }            
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}

// UPDATE STATUS TO CLAIMED
if(isset($_POST['btn_claim_update'])){
    if($_FILES['file_claim_update']['name'] != ''){
        $allowed_extension = array('xls','csv','xlsx');
        $file_array = explode(".", $_FILES['file_claim_update']['name']);
        $file_extension = end($file_array);

        $updated_rows = 0;

        if(in_array($file_extension, $allowed_extension)){
            $reader = IOFactory::createReader('Xlsx');
            $spreadsheet = $reader->load($_FILES['file_claim_update']['tmp_name']);

            $spreadsheet = $reader->load($_FILES['file_claim_update']['tmp_name']);
            $data = $spreadsheet->getActivesheet()->toArray();
            foreach($data as $row){
                $insert_data = array(
                    'account_number' => $row[0],
                    'account_name' => $row[1],
                    'device_number' => $row[2],
                    'hei_name' => $row[3]
                );

                extract($insert_data);   
                // var_dump($insert_data)  ;     
                // echo '<br>'.$tes_award_number;       

                $sqlUpdateDetails = "UPDATE tbl_lbp_form SET status = 'Claimed' WHERE device_number = '$device_number'";
                mysqli_query($connect, $sqlUpdateDetails);

                if(mysqli_affected_rows($connect) >= 1){
                    $updated_rows = $updated_rows + 1;
                }
                else{
                    $updated_rows = $updated_rows;
                }  
            }

            if($updated_rows == 0){
                $message = 'No grantee has been updated due to Device Number mismatch or all grantees in the excel file has already Claimed status';
                header('location:../listofgrantees.php?errmsg='.$message);
            }
            else{
                $message = 'Succesfully updated '.$updated_rows.' grantee/s';
                header('location:../listofgrantees.php?sucmsg='.$message);
            }            
        }
        else{
            $message = 'Please select XLSX or XLS File only';
            header('location:../listofgrantees.php?errmsg='.$message);
        }
    }
    else{
        $message = 'Please select a file';
        header('location:../listofgrantees.php?errmsg='.$message);
    }
}



?>
