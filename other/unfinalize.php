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

    $sqlPDFpath = "SELECT a.fname, a.mname, a.lname, a.title, a.award_no, a.email, a.pdf_attachment, a.status, b.hei_region_nir, b.hei_uii, b.hei_name FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii=b.hei_uii WHERE award_no = '".$awardno."'";
    $resPDFpath = mysqli_query($connect, $sqlPDFpath);
    $checkPDFpath = mysqli_num_rows($resPDFpath);
    if($checkPDFpath > 0){
        while($row=mysqli_fetch_assoc($resPDFpath)){
            $pdf_attachment = $row['pdf_attachment'];
            $pdf_attachment = substr($pdf_attachment, 3);
            $fname = $row['fname'];
            $mname = $row['mname'];
            $lname = $row['lname'];
            $title = $row['title'];
            $award_no = $row['award_no'];
            $email = $row['email'];
            $status = $row['status'];
            $hei_uii = $row['hei_uii'];
            $hei_region_nir = $row['hei_region_nir'];
            $hei_name = $row['hei_name'];
        }
    }
    else{
        header('location:../listofgrantees.php?errmsg=This grantee has not finalized yet');
    }

    
    

    $updateUnfinalizeAccount = "UPDATE tbl_lbp_form SET editable_fields = NULL, pdf_attachment = NULL, application_datfile_export_date = NULL, date_exported = NULL, application_datfile_name = NULL, application_datfile_batch = NULL, status = 'Not Finalized', remarks = 'Your application was unfinalized due to wrong input/image. Please make sure to supply correct input/image to the fields' WHERE award_no = '".$awardno."'";
    if(mysqli_query($connect, $updateUnfinalizeAccount)){
        unlink('../../'.$student_portal.'/'.$pdf_attachment);

        // SEND EMAIL TO NOTIFY GRANTEE        
        $mailheader = 'FROM: UniFAST ICT Unit<unifastgov@chedvs01.ched.gov.ph>'."\r\n".'CC: unifast_teslmpc@ched.gov.ph'."\r\n".'Reply-To: unifast_teslmpc@ched.gov.ph'."\r\n".'MIME-Version: 1.0'."\r\n".'Content-type: text/html; charset=iso-8859-1';
        $msg = "<b>Full Name: </b>".$fname." ".$mname." ".$lname."<br><b>TES Award Number: </b>".$award_no."<br><b>Region: </b>".$hei_region_nir."<br><b>HEI Unique ID: </b>".$hei_uii."<br><b>HEI Name: </b>".$hei_name."<br><b>Application Status: </b>Not Finalized<br><br><br><br>Good day ".$title.". ".$fname." ".$lname.",<br><p>Your application was unfinalized due to wrong input/image. Please make sure to <b>supply correct input/image</b> to the fields then click <b style='color:blue;'>Save</b> and <b style='color:green;'>Finalize</b> again.</p> Thank you.<br><br><br><br><b>Information and Communication Technology Unit</b><br>UniFAST Secretariat - Central Office";

        $msg = wordwrap($msg,70);

        if(mail($email,"LMPC APPLICATION NOTIFICATION",$msg,$mailheader)){
            header('location:../listofgrantees.php?sucmsg='.$awardno.'\'s account is now editable. An email notification was sent to grantee');
        }
        else{
            header('location:../listofgrantees.php?sucmsg='.$awardno.'\'s account is now editable. Email notification was failed to send');
        }

        // header('location:../listofgrantees.php?sucmsg='.$awardno.'\'s account is now editable');
    }
?>
