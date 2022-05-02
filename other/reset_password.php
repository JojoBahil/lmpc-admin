<?php
    include('dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1");
    session_start();

    if(!$_SESSION['username']){
        header('location: ../index.php');
    }

    date_default_timezone_set('Asia/Manila');

    $CURRENT_ACADEMIC_YEAR = '2018-2019'; 
    $student_portal = 'tes.lbp.app';
    $awardno = $_GET['awardno'];

    $sqlDefaultPassword = "SELECT a.award_no, a.title, a.fname, a.mname, a.lname, a.def_password, a.email, a.status, b.hei_name, b.hei_uii, b.hei_region_nir FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE award_no = '".$awardno."'";
    $resDefaultPassword = mysqli_query($connect, $sqlDefaultPassword);
    $checkDefaultPassword = mysqli_num_rows($resDefaultPassword);
    if($checkDefaultPassword > 0){
        $row=mysqli_fetch_assoc($resDefaultPassword);
        $award_no = $row['award_no'];
        $title = $row['title'];
        $fname = $row['fname'];
        $mname = $row['mname'];
        $lname = $row['lname'];
        $email = $row['email'];
        $status = $row['status'];
        $hei_name = $row['hei_name'];
        $hei_uii = $row['hei_uii'];
        $hei_region_nir = $row['hei_region_nir'];
        $def_password = $row['def_password'];
        $md5password = md5($def_password);
        
        $updateResetPassword = "UPDATE tbl_lbp_form SET password = '".$md5password."' WHERE award_no = '".$awardno."'";
        if(mysqli_query($connect, $updateResetPassword)){
            // SEND EMAIL TO NOTIFY GRANTEE        
            $mailheader = 'FROM: UniFAST ICT Unit<unifastgov@chedvs01.ched.gov.ph>'."\r\n".'CC: unifast_teslmpc@ched.gov.ph'."\r\n".'Reply-To: unifast_teslmpc@ched.gov.ph'."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=iso-8859-1';
            $msg = "<b>Full Name: </b>".$fname." ".$mname." ".$lname."<br><b>TES Award Number: </b>".$award_no."<br><b>Region: </b>".$hei_region_nir."<br><b>HEI Unique ID: </b>".$hei_uii."<br><b>HEI Name: </b>".$hei_name."<br><b>Application Status: </b>".$status."<br><br><br><br>Good day ".$title.". ".$fname." ".$lname.",<br><p>Your password was reset to default as requested. Please use the following credential to access your LMPC Portal account: <br><br> <b>Username: </b> ".$award_no." <br><b>Password: </b>".$def_password."</p><br> Thank you.<br><br><br><br><b>Information and Communication Technology Unit</b><br>UniFAST Secretariat - Central Office";

            $msg = wordwrap($msg,70);

            if(mail($email,"LMPC PORTAL PASSWORD RESET NOTIFICATION",$msg,$mailheader)){
                header('location:../listofgrantees.php?sucmsg='.$awardno.'\'s password was reset to default. An email notification was sent to grantee');
            }
            else{
                header('location:../listofgrantees.php?sucmsg='.$awardno.'\'s password was reset to default. Email notification was failed to send');
            }
        }
    }
    else{
        header('location:../listofgrantees.php?errmsg=Grantee Not Found');
    }
?>
