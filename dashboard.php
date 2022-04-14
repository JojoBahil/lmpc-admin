<?php
    include('other/dbconnect.php');
    include('other/navigation.php');
    header("Content-Type:text/html; charset=ISO-8859-1");

    if(!$_SESSION['username']){
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>LMPC Application Admin Portal</title>
        <link rel="icon" type="image/png" href="image/favicon-16x16.png" />
        <link rel="stylesheet" href="assets/css/loader.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <link rel="stylesheet" href="assets/css/navigation.css">
    </head>
    <body style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">
        <div class="container" style="background-color:rgba(255,255,255,0.9);margin-top:20px;border-radius:3px;">
        <h4 style="margin-bottom:10px;padding-top:10px;font-family:helvetica;color:#444;">Dashboard</h4>
        <?php    
            $sqlOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE (status != '' AND status != 'WAIVED/DELISTED') AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resOnGoing = mysqli_query($connect, $sqlOnGoing);
            $checkOnGoing = mysqli_num_rows($resOnGoing);
            if($checkOnGoing > 0){
                while($row=mysqli_fetch_assoc($resOnGoing)){
                    $onGoing = $row['Count(*)'];
                }
            }
            else{
                $onGoing = 0;
            }



            $sqlNewGrantees = "SELECT Count(*) FROM tbl_lbp_form WHERE (status != '' AND status != 'WAIVED/DELISTED') AND tag = 'NEW'";
            $resNewGrantees = mysqli_query($connect, $sqlNewGrantees);
            $checkNewGrantees = mysqli_num_rows($resNewGrantees);
            if($checkNewGrantees > 0){
                while($row=mysqli_fetch_assoc($resNewGrantees)){
                    $newGrantees = $row['Count(*)'];
                }
            }
            else{
                $newGrantees = 0;
            }

            $sqlOnGoingGrantees = "SELECT Count(*) FROM tbl_lbp_form WHERE (status != '' AND status != 'WAIVED/DELISTED') AND tag = 'ON-GOING'";
            $resOnGoingGrantees = mysqli_query($connect, $sqlOnGoingGrantees);
            $checkOnGoingGrantees = mysqli_num_rows($resOnGoingGrantees);
            if($checkOnGoingGrantees > 0){
                while($row=mysqli_fetch_assoc($resOnGoingGrantees)){
                    $onGoingGrantees = $row['Count(*)'];
                }
            }
            else{
                $onGoingGrantees = 0;
            }



            // OVERALL NEW + ON GOING GRANTEES
            $sqlFinalized = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Finalized' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resFinalized = mysqli_query($connect, $sqlFinalized);
            $checkFinalized = mysqli_num_rows($resFinalized);
            if($checkFinalized > 0){
                while($row=mysqli_fetch_assoc($resFinalized)){
                    $finalized = $row['Count(*)'];
                }
            }
            else{
                $finalized = 0;
            }
            $finalizedPercent = $finalized/$onGoing;
            $finalizedPercent = round($finalizedPercent*100,2).'%';
            
            $sqlUnfinalizeRequest = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'REQTOUNFINALIZE' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resUnfinalizeRequest = mysqli_query($connect, $sqlUnfinalizeRequest);
            $checkUnfinalizeRequest = mysqli_num_rows($resUnfinalizeRequest);
            if($checkUnfinalizeRequest > 0){
                while($row=mysqli_fetch_assoc($resUnfinalizeRequest)){
                    $unfinalizeRequest = $row['Count(*)'];
                }
            }
            else{
                $unfinalizeRequest = 0;
            }
            $unfinalizeRequestPercent = $unfinalizeRequest/$onGoing;
            $unfinalizeRequestPercent = round($unfinalizeRequestPercent*100,2).'%';

            $sqlSubmitted = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'SubToUniFAST' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resSubmitted = mysqli_query($connect, $sqlSubmitted);
            $checkSubmitted = mysqli_num_rows($resSubmitted);
            if($checkSubmitted > 0){
                while($row=mysqli_fetch_assoc($resSubmitted)){
                    $submitted = $row['Count(*)'];
                }
            }
            else{
                $submitted = 0;
            }
            $submittedPercent = $submitted/$onGoing;
            $submittedPercent = round($submittedPercent*100,2).'%';

            $sqlAppDAT = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'App-DAT' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resAppDAT = mysqli_query($connect, $sqlAppDAT);
            $checkAppDAT = mysqli_num_rows($resAppDAT);
            if($checkAppDAT > 0){
                while($row=mysqli_fetch_assoc($resAppDAT)){
                    $appDAT = $row['Count(*)'];
                }
            }
            else{
                $appDAT = 0;
            }
            $appDATPercent = $appDAT/$onGoing;
            $appDATPercent = round($appDATPercent*100,2).'%';

            $sqlApproved = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Approved' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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
            $approvedPercent = $approved/$onGoing;
            $approvedPercent = round($approvedPercent*100,2).'%';
            
            $sqlRejected = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Rejected' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resRejected = mysqli_query($connect, $sqlRejected);
            $checkRejected = mysqli_num_rows($resRejected);
            if($checkRejected > 0){
                while($row=mysqli_fetch_assoc($resRejected)){
                    $rejected = $row['Count(*)'];
                }
            }
            else{
                $rejected = 0;
            }
            $rejectedPercent = $rejected/$onGoing;
            $rejectedPercent = round($rejectedPercent*100,2).'%';

            $sqlForClaiming = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'For Claiming' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resForClaiming = mysqli_query($connect, $sqlForClaiming);
            $checkForClaiming = mysqli_num_rows($resForClaiming);
            if($checkForClaiming > 0){
                while($row=mysqli_fetch_assoc($resForClaiming)){
                    $forClaiming = $row['Count(*)'];
                }
            }
            else{
                $forClaiming = 0;
            }
            $forClaimingPercent = $forClaiming/$onGoing;
            $forClaimingPercent = round($forClaimingPercent*100,2).'%';

            $sqlClaimed = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Claimed' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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
            $claimedPercent = $claimed/$onGoing;
            $claimedPercent = round($claimedPercent*100,2).'%';

            $sqlNotFinalized = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Not Finalized' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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
            $notFinalizedPercent = $notFinalized/$onGoing;
            $notFinalizedPercent = round($notFinalizedPercent*100,2).'%';
            
            
            

            /* ON GOING COUNTS ONLY for PROGRESS BAR ------------------------------------------------------- */

            $sqlFinalizedOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Finalized' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resFinalizedOnGoing = mysqli_query($connect, $sqlFinalizedOnGoing);
            $checkFinalizedOnGoing = mysqli_num_rows($resFinalizedOnGoing);
            if($checkFinalizedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resFinalizedOnGoing)){
                    $finalizedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $finalizedOnGoing = 0;
            }
            $finalizedOnGoingPercent = $finalizedOnGoing/$onGoingGrantees;
            $finalizedOnGoingPercent = round($finalizedOnGoingPercent*100,2).'%';
            
            $sqlSubmittedOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'SubToUniFAST' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resSubmittedOnGoing = mysqli_query($connect, $sqlSubmittedOnGoing);
            $checkSubmittedOnGoing = mysqli_num_rows($resSubmittedOnGoing);
            if($checkSubmittedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resSubmittedOnGoing)){
                    $submittedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $submittedOnGoing = 0;
            }
            $submittedOnGoingPercent = $submittedOnGoing/$onGoingGrantees;
            $submittedOnGoingPercent = round($submittedOnGoingPercent*100,2).'%';

            $sqlAppDATOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'App-DAT' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resAppDATOnGoing = mysqli_query($connect, $sqlAppDATOnGoing);
            $checkAppDATOnGoing = mysqli_num_rows($resAppDATOnGoing);
            if($checkAppDATOnGoing > 0){
                while($row=mysqli_fetch_assoc($resAppDATOnGoing)){
                    $appDATOnGoing = $row['Count(*)'];
                }
            }
            else{
                $appDATOnGoing = 0;
            }
            $appDATOnGoingPercent = $appDATOnGoing/$onGoingGrantees;
            $appDATOnGoingPercent = round($appDATOnGoingPercent*100,2).'%';

            $sqlApprovedOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Approved' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resApprovedOnGoing = mysqli_query($connect, $sqlApprovedOnGoing);
            $checkApprovedOnGoing = mysqli_num_rows($resApprovedOnGoing);
            if($checkApprovedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resApprovedOnGoing)){
                    $approvedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $approvedOnGoing = 0;
            }
            $approvedOnGoingPercent = $approvedOnGoing/$onGoingGrantees;
            $approvedOnGoingPercent = round($approvedOnGoingPercent*100,2).'%';
            
            $sqlRejectedOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Rejected' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resRejectedOnGoing = mysqli_query($connect, $sqlRejectedOnGoing);
            $checkRejectedOnGoing = mysqli_num_rows($resRejectedOnGoing);
            if($checkRejectedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resRejectedOnGoing)){
                    $rejectedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $rejectedOnGoing = 0;
            }
            $rejectedOnGoingPercent = $rejectedOnGoing/$onGoingGrantees;
            $rejectedOnGoingPercent = round($rejectedOnGoingPercent*100,2).'%';

            $sqlNotFinalizedOnGoing = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Not Finalized' AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resNotFinalizedOnGoing = mysqli_query($connect, $sqlNotFinalizedOnGoing);
            $checkNotFinalizedOnGoing = mysqli_num_rows($resNotFinalizedOnGoing);
            if($checkNotFinalizedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resNotFinalizedOnGoing)){
                    $notFinalizedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $notFinalizedOnGoing = 0;
            }
            $notFinalizedOnGoingPercent = $notFinalizedOnGoing/$onGoingGrantees;
            $notFinalizedOnGoingPercent = round($notFinalizedOnGoingPercent*100,2).'%';


            $overAllOnGoingFinalized = $finalizedOnGoing + $submittedOnGoing + $appDATOnGoing + $approvedOnGoing + $rejectedOnGoing;
            $overAllOnGoingFinalizedPercentage = $overAllOnGoingFinalized/$onGoingGrantees;
            $overAllOnGoingFinalizedPercentage = round($overAllOnGoingFinalizedPercentage*100,2);

            $overAllOnGoingFinalizedDifference = $onGoingGrantees - $overAllOnGoingFinalized;
            $overAllOnGoingFinalizedPercentageDifference = 100 - $overAllOnGoingFinalizedPercentage;
            

             /* NEW GRANTEE COUNTS ONLY for PROGRESS BAR ------------------------------------------------------- */

             $sqlFinalizedNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Finalized' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
             $resFinalizedNew = mysqli_query($connect, $sqlFinalizedNew);
             $checkFinalizedNew = mysqli_num_rows($resFinalizedNew);
             if($checkFinalizedNew > 0){
                 while($row=mysqli_fetch_assoc($resFinalizedNew)){
                     $finalizedNew = $row['Count(*)'];
                 }
             }
             else{
                 $finalizedNew = 0;
             }
             $finalizedNewPercent = $finalizedNew/$newGrantees;
             $finalizedNewPercent = round($finalizedNewPercent*100,2).'%';
            
            $sqlSubmittedNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'SubToUniFAST' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
            $resSubmittedNew = mysqli_query($connect, $sqlSubmittedNew);
            $checkSubmittedNew = mysqli_num_rows($resSubmittedNew);
            if($checkSubmittedNew > 0){
                while($row=mysqli_fetch_assoc($resSubmittedNew)){
                    $submittedNew = $row['Count(*)'];
                }
            }
            else{
                $submittedNew = 0;
            }
            $submittedNewPercent = $submittedNew/$newGrantees;
            $submittedNewPercent = round($submittedNewPercent*100,2).'%';
  
             $sqlAppDATNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'App-DAT' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
             $resAppDATNew = mysqli_query($connect, $sqlAppDATNew);
             $checkAppDATNew = mysqli_num_rows($resAppDATNew);
             if($checkAppDATNew > 0){
                 while($row=mysqli_fetch_assoc($resAppDATNew)){
                     $appDATNew = $row['Count(*)'];
                 }
             }
             else{
                 $appDATNew = 0;
             }
             $appDATNewPercent = $appDATNew/$newGrantees;
             $appDATNewPercent = round($appDATNewPercent*100,2).'%';
 
             $sqlApprovedNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Approved' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
             $resApprovedNew = mysqli_query($connect, $sqlApprovedNew);
             $checkApprovedNew = mysqli_num_rows($resApprovedNew);
             if($checkApprovedNew > 0){
                 while($row=mysqli_fetch_assoc($resApprovedNew)){
                     $approvedNew = $row['Count(*)'];
                 }
             }
             else{
                 $approvedNew = 0;
             }
             $approvedNewPercent = $approvedNew/$newGrantees;
             $approvedNewPercent = round($approvedNewPercent*100,2).'%';
             
             $sqlRejectedNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Rejected' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
             $resRejectedNew = mysqli_query($connect, $sqlRejectedNew);
             $checkRejectedNew = mysqli_num_rows($resRejectedNew);
             if($checkRejectedNew > 0){
                 while($row=mysqli_fetch_assoc($resRejectedNew)){
                     $rejectedNew = $row['Count(*)'];
                 }
             }
             else{
                 $rejectedNew = 0;
             }
             $rejectedNewPercent = $rejectedNew/$newGrantees;
             $rejectedNewPercent = round($rejectedNewPercent*100,2).'%';
 
             $sqlNotFinalizedNew = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Not Finalized' AND (tag = 'NEW' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
             $resNotFinalizedNew = mysqli_query($connect, $sqlNotFinalizedNew);
             $checkNotFinalizedNew = mysqli_num_rows($resNotFinalizedNew);
             if($checkNotFinalizedNew > 0){
                 while($row=mysqli_fetch_assoc($resNotFinalizedNew)){
                     $notFinalizedNew = $row['Count(*)'];
                 }
             }
             else{
                 $notFinalizedNew = 0;
             }
             $notFinalizedNewPercent = $notFinalizedNew/$newGrantees;
             $notFinalizedNewPercent = round($notFinalizedNewPercent*100,2).'%';
 
 
             $overAllNewFinalized = $finalizedNew + $submittedNew + $appDATNew + $approvedNew + $rejectedNew;
             $overAllNewFinalizedPercentage = $overAllNewFinalized/$newGrantees;
             $overAllNewFinalizedPercentage = round($overAllNewFinalizedPercentage*100,2);
 
             $overAllNewFinalizedDifference = $newGrantees - $overAllNewFinalized;
             $overAllNewFinalizedPercentageDifference = 100 - $overAllNewFinalizedPercentage;
        ?>
            <div class="row" style = "margin-bottom:30px;">
                <div class="col">
                    <?php
                        date_default_timezone_set("Asia/Singapore");
                        echo '<span style="font-size:12px;"><b>Date:</b> '.date('D, M d, Y').' <b>Time:</b> '.date('h:i a').'</span>';
                    ?>
                </div>
            </div>
            
            <div class="row">
                <div class="col-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="progress" style="height:60px;width:100%;text-align:center;padding:8px;">
                                <h3 style=""><?php echo $overAllNewFinalizedPercentage; ?><span style="font-size:13px;">%</span></h3><br>
                                <p> of New Grantees</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="col-10">
                    <div class="progress" style="height:60px;">
                        <div class="progress-bar bg-success" role="progressbar" style="text-align:center;width: <?php echo $overAllNewFinalizedPercentage; ?>%;height:100%" aria-valuenow="<?php echo $overAllNewFinalized; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo number_format($overAllNewFinalized); ?></b></p>
                            <p>Total Applications Received</p>
                        </div>
                        <div class="progress-bar" role="progressbar" style="background-color:#ccc;text-align:center;width: <?php echo $overAllNewFinalizedPercentageDifference; ?>%;height:100%" aria-valuenow="<?php echo $overAllNewFinalizedDifference; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="color:#555;margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo number_format($overAllNewFinalizedDifference); ?></b></p>
                            <p style="color:#555;">Applications Not Yet Submitted</p>
                        </div>
                    </div>
                </div>
            </div><br>

            
            <div class="row">
                <div class="col-2">
                    <div class="progress" style="height:60px;width:100%;text-align:center;padding:8px;">
                        <h3 style=""><?php echo $overAllOnGoingFinalizedPercentage; ?><span style="font-size:13px;">%</span></h3><br>
                        <p> of Continuing Grantees</p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="progress" style="height:60px;">
                        <div class="progress-bar bg-success" role="progressbar" style="text-align:center;width: <?php echo $overAllOnGoingFinalizedPercentage; ?>%;height:100%" aria-valuenow="<?php echo $overAllOnGoingFinalized; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo number_format($overAllOnGoingFinalized); ?></b></p>
                            <p>Total Applications Received</p>
                        </div>
                        <div class="progress-bar" role="progressbar" style="background-color:#ccc;text-align:center;width: <?php echo $overAllOnGoingFinalizedPercentageDifference; ?>%;height:100%" aria-valuenow="<?php echo $overAllOnGoingFinalizedDifference; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="color:#555;margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo number_format($overAllOnGoingFinalizedDifference); ?></b></p>
                            <p style="color:#555;">Applications Not Yet Submitted</p>
                        </div>
                    </div>
                </div>
            </div><br>

            
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#FFE5B4;">
                        <div class="card-body" style="background-color:#FFE5B488">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Not Finalized</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($notFinalized).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$notFinalizedPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div><br>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#9EE09E;">
                        <div class="card-body" style="background-color:#9EE09E88">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Finalized</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($finalized).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$finalizedPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div><br>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#40cfb2;">
                        <div class="card-body" style="background-color:#40cfb288">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Submitted to UniFAST</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($submitted).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$submittedPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div><br>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#9EC1CF;">
                        <div class="card-body" style="background-color:#9EC1CF88">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Exported</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($appDAT).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$appDATPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div><br>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#FDFD97;">
                        <div class="card-body" style="background-color:#FDFD9788">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Approved</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($approved).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$approvedPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div><br>
                
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:10px;">
                    <div class="card" style="border-color:#FF6663;">
                        <div class="card-body" style="background-color:#FF666388">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Rejected</b></h5>
                            <hr>
                            <div class="card-text" style="margin-bottom:8px;"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.number_format($rejected).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Applications</span>'; ?></div>
                            <div class="card-text"><?php echo '<b style="font-size:20px;font-family:sans-serif;color:#555;">'.$rejectedPercent.'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">of Total Target</span>'; ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" style="margin-bottom:5px;">
                    <div class="card" style="border-color:#CCCCCC;">
                        <div class="card-body" style="background-color:#DDDDDD">
                            <h5 class="card-title" style="font-family:sans-serif;color:#666;"><b>Total Target</b></h5>
                            <hr>
                            <div class="row"><div class="card-text col-lg-6 col-md-6" style="margin-bottom:-20px;text-align:center;display:inline-block;margin-top:-10px;"><?php echo ' <span style="font-size:12px;color:#666;font-family:sans-serif;">New</span><br><b style="font-size:15px;font-family:sans-serif;color:#666;">'.number_format($newGrantees).'</b>'; ?></div><div class="card-text col-lg-6 col-md-6" style="margin-bottom:-20px;text-align:center;display:inline-block;margin-top:-10px;"><?php echo ' <span style="font-size:12px;color:#666;font-family:sans-serif;">Continuing</span><br><b style="font-size:15px;font-family:sans-serif;color:#666;">'.number_format($onGoingGrantees).'</b>'; ?></div></div><br>
                            <div class="card-text" style="margin-bottom:-25px;text-align:center;"><?php echo '<b style="font-size:24px;font-family:sans-serif;color:#444;">'.number_format($onGoing).'</b> <span style="font-size:12px;color:#666;font-family:sans-serif;">Grantees</span>'; ?></div>
                            <br>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                <!-- OVERALL STATUS -->
                <div class="col-xl-2" style="margin-top:20px;">
                
                </div>
                <div class="col-xl-8" style="margin-top:20px;">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart" width="3" height="2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2" style="margin-top:20px;">
                    
                </div>

                <!-- STATUS PER REGION -->
                <div class="col-xl-12" style="margin-top:20px;">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="statusPerRegionChart" width="2" height="2"></canvas>
                        </div>
                    </div>
                </div>

                <!-- FINALIZED PDF -->
                <div class="col-xl-12" style="margin-top:20px;">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="FinalizedChart" width="3" height="1"></canvas>
                        </div>
                    </div>
                </div>
          
                <div class="col-xl-2" style="margin-top:20px;">
                    
                </div>
                <div class="col-xl-8" style="margin-top:20px;">
                    
                </div>
                <div class="col-xl-2" style="margin-top:20px;">
                    
                </div>
            </div>
        </div>

    <script>
        // CHART FOR STUDENTS
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Not Finalized', 'Finalized', 'Submitted', 'Exported', 'Approved', 'Rejected'],
                datasets: [{
                    label: 'Number of Students',
                    data: [<?php echo $notFinalized; ?>, <?php echo $finalized; ?>, <?php echo $submitted; ?>, <?php echo $appDAT; ?>, <?php echo $approved; ?>, <?php echo $rejected; ?>],
                    backgroundColor: [
                        '#FFE5B4',
                        '#9EE09E',
                        '#40cfb2',
                        '#9EC1CF',                        
                        '#FDFD97',
                        '#FF6663'
                    ],
                    borderColor: [
                        '#FFE5B4',
                        '#9EE09E',
                        '#40cfb2',
                        '#9EC1CF',                        
                        '#FDFD97',
                        '#FF6663'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        },
                        display:false,
                        gridLines: {
                            color: "rgba(0, 0, 0, 0)",
                        }
                    }]
                },  
                title:{
                    display: true,
                    text:'Overall Status',    
                    fontSize:20
                },
                legend:{
                    display: true,
                    position:'top'
                },
                plugins: {
                    datalabels: {
                    formatter: (value, ctx) => {
                        let datasets = ctx.chart.data.datasets;
                        if (datasets.indexOf(ctx.dataset) === datasets.length - 1) {
                            let sum = datasets[0].data.reduce((a, b) => a + b, 0);
                            let percentage = Math.round((value / sum) * 100) + '%';
                            return percentage;
                        } 
                        else {
                            return percentage;
                        }
                    },
                    color: '#fff',
                    }
                }
            }
        });

        //STATUS PER REGION        
        <?php
            //$sqlStatusPerRegion = "SELECT hei.hei_psg_region, COUNT(lbp.app_id) AS OG_GRANTEES, COUNT(CASE WHEN lbp.status='Not Finalized' THEN lbp.app_id END) AS NOT_FINALIZED, COUNT(CASE WHEN lbp.status='Finalized' THEN lbp.app_id END) AS FINALIZED, COUNT(CASE WHEN lbp.status='App-DAT' THEN lbp.app_id END) AS EXPORTED, COUNT(CASE WHEN lbp.status='Approved' THEN lbp.app_id END) AS APPROVED, COUNT(CASE WHEN lbp.status='Rejected' THEN lbp.app_id END) AS REJECTED FROM tbl_lbp_form lbp INNER JOIN tbl_heis hei ON hei.hei_uii=lbp.hei_uii WHERE status != 'WAIVED/DELISTED' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN') GROUP BY hei.hei_psg_region";
            // $sqlStatusPerRegion = "SELECT hei.hei_psg_region, COUNT(CASE WHEN lbp.status='Not Finalized' THEN lbp.app_id END) AS NOT_FINALIZED, COUNT(CASE WHEN lbp.status='Finalized' THEN lbp.app_id END) AS FINALIZED, COUNT(CASE WHEN lbp.status='App-DAT' THEN lbp.app_id END) AS EXPORTED, COUNT(CASE WHEN lbp.status='Approved' THEN lbp.app_id END) AS APPROVED, COUNT(CASE WHEN lbp.status='Rejected' THEN lbp.app_id END) AS REJECTED FROM tbl_lbp_form lbp INNER JOIN tbl_heis hei ON hei.hei_uii=lbp.hei_uii WHERE status != 'WAIVED/DELISTED' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN') GROUP BY hei.hei_psg_region";
            // $resStatusPerRegion = mysqli_query($connect, $sqlStatusPerRegion);
            // $checkStatusPerRegion = mysqli_num_rows($resStatusPerRegion);
            // if($checkStatusPerRegion > 0){
            // $statusPerRegion = array();
            // $row_number = 0;
            //      while($row = mysqli_fetch_assoc($resStatusPerRegion)){
            //         // $statusPerRegion[$row_number][1] = $row['OG_GRANTEES'];
            //         $statusPerRegion[$row_number][1] = $row['NOT_FINALIZED'];
            //         $statusPerRegion[$row_number][2] = $row['FINALIZED'];
            //         $statusPerRegion[$row_number][3] = $row['EXPORTED'];
            //         $statusPerRegion[$row_number][4] = $row['APPROVED'];
            //         $statusPerRegion[$row_number][5] = $row['REJECTED'];
            //         $row_number++;
            //      }
            // }
        ?>

        <?php
            //$sqlStatusPerRegion = "SELECT hei.hei_psg_region, COUNT(lbp.app_id) AS OG_GRANTEES, COUNT(CASE WHEN lbp.status='Not Finalized' THEN lbp.app_id END) AS NOT_FINALIZED, COUNT(CASE WHEN lbp.status='Finalized' THEN lbp.app_id END) AS FINALIZED, COUNT(CASE WHEN lbp.status='App-DAT' THEN lbp.app_id END) AS EXPORTED, COUNT(CASE WHEN lbp.status='Approved' THEN lbp.app_id END) AS APPROVED, COUNT(CASE WHEN lbp.status='Rejected' THEN lbp.app_id END) AS REJECTED FROM tbl_lbp_form lbp INNER JOIN tbl_heis hei ON hei.hei_uii=lbp.hei_uii WHERE status != 'WAIVED/DELISTED' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN') GROUP BY hei.hei_psg_region";
            $sqlStatusPerRegion = "SELECT hei.hei_psg_region, COUNT(CASE WHEN lbp.status='Not Finalized' THEN lbp.app_id END) AS NOT_FINALIZED, COUNT(CASE WHEN lbp.status='SubToUniFAST' THEN lbp.app_id END) AS SUBMITTED, COUNT(CASE WHEN lbp.status='Finalized' THEN lbp.app_id END) AS FINALIZED, COUNT(CASE WHEN lbp.status='App-DAT' THEN lbp.app_id END) AS EXPORTED, COUNT(CASE WHEN lbp.status='Approved' THEN lbp.app_id END) AS APPROVED, COUNT(CASE WHEN lbp.status='Rejected' THEN lbp.app_id END) AS REJECTED FROM tbl_lbp_form lbp INNER JOIN tbl_heis hei ON hei.hei_uii=lbp.hei_uii WHERE status != 'WAIVED/DELISTED' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN') GROUP BY hei.hei_psg_region";
            $resStatusPerRegion = mysqli_query($connect, $sqlStatusPerRegion);
            $checkStatusPerRegion = mysqli_num_rows($resStatusPerRegion);
            if($checkStatusPerRegion > 0){
            $statusPerRegion = array();
            $row_number = 0;
                 while($row = mysqli_fetch_assoc($resStatusPerRegion)){
                    // $statusPerRegion[$row_number][1] = $row['OG_GRANTEES'];
                    $statusPerRegion[$row_number][1] = $row['NOT_FINALIZED'];
                    $statusPerRegion[$row_number][2] = $row['FINALIZED'];
                    $statusPerRegion[$row_number][3] = $row['SUBMITTED'];
                    $statusPerRegion[$row_number][4] = $row['EXPORTED'];
                    $statusPerRegion[$row_number][5] = $row['APPROVED'];
                    $statusPerRegion[$row_number][6] = $row['REJECTED'];
                    $row_number++;
                 }
            }
        ?>
        

       var ctx = document.getElementById('statusPerRegionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'horizontalBar',
            data: {
                labels:['Region 1', 'Region 2', 'Region 3', 'Region 4', 'Region 5', 'Region 6', 'Region 7', 'Region 8', 'Region 9', 'Region 10', 'Region 11', 'Region 12', 'NCR', 'CAR', 'BARMM-A', 'BARMM-B', 'CARAGA', 'MIMAROPA'],
                datasets: [
                    {
                    data:[<?php echo $statusPerRegion[0][1]; ?>, <?php echo $statusPerRegion[1][1]; ?>, <?php echo $statusPerRegion[2][1]; ?>, <?php echo $statusPerRegion[3][1]; ?>, <?php echo $statusPerRegion[4][1]; ?>, <?php echo $statusPerRegion[5][1]; ?>, <?php echo $statusPerRegion[6][1]; ?>, <?php echo $statusPerRegion[7][1]; ?>, <?php echo $statusPerRegion[8][1]; ?>, <?php echo $statusPerRegion[9][1]; ?>, <?php echo $statusPerRegion[10][1]; ?>, <?php echo $statusPerRegion[11][1]; ?>, <?php echo $statusPerRegion[12][1]; ?>, <?php echo $statusPerRegion[13][1]; ?>, <?php echo $statusPerRegion[14][1]; ?>, <?php echo $statusPerRegion[15][1]; ?>, <?php echo $statusPerRegion[16][1]; ?>, <?php echo $statusPerRegion[17][1]; ?>],
                    label: "Not Finalized",
                    borderColor:"#FFE5B4",
                    backgroundColor:"#FFE5B4",
                    fill:false
                },{
                    data:[<?php echo $statusPerRegion[0][2]; ?>, <?php echo $statusPerRegion[1][2]; ?>, <?php echo $statusPerRegion[2][2]; ?>, <?php echo $statusPerRegion[3][2]; ?>, <?php echo $statusPerRegion[4][2]; ?>, <?php echo $statusPerRegion[5][2]; ?>, <?php echo $statusPerRegion[6][2]; ?>, <?php echo $statusPerRegion[7][2]; ?>, <?php echo $statusPerRegion[8][2]; ?>, <?php echo $statusPerRegion[9][2]; ?>, <?php echo $statusPerRegion[10][2]; ?>, <?php echo $statusPerRegion[11][2]; ?>, <?php echo $statusPerRegion[12][2]; ?>, <?php echo $statusPerRegion[13][2]; ?>, <?php echo $statusPerRegion[14][2]; ?>, <?php echo $statusPerRegion[15][2]; ?>, <?php echo $statusPerRegion[16][2]; ?>, <?php echo $statusPerRegion[17][2]; ?>],
                    label: "Finalized",
                    borderColor:"#9EE09E",
                    backgroundColor:"#9EE09E",
                    fill:false
                },{
                    data:[<?php echo $statusPerRegion[0][3]; ?>, <?php echo $statusPerRegion[1][3]; ?>, <?php echo $statusPerRegion[2][3]; ?>, <?php echo $statusPerRegion[3][3]; ?>, <?php echo $statusPerRegion[4][3]; ?>, <?php echo $statusPerRegion[5][3]; ?>, <?php echo $statusPerRegion[6][3]; ?>, <?php echo $statusPerRegion[7][3]; ?>, <?php echo $statusPerRegion[8][3]; ?>, <?php echo $statusPerRegion[9][3]; ?>, <?php echo $statusPerRegion[10][3]; ?>, <?php echo $statusPerRegion[11][3]; ?>, <?php echo $statusPerRegion[12][3]; ?>, <?php echo $statusPerRegion[13][3]; ?>, <?php echo $statusPerRegion[14][3]; ?>, <?php echo $statusPerRegion[15][3]; ?>, <?php echo $statusPerRegion[16][3]; ?>, <?php echo $statusPerRegion[17][3]; ?>],
                    label: "Submitted",
                    borderColor:"#40cfb2",
                    backgroundColor:"#40cfb2",
                    fill:false
                },{
                    data:[<?php echo $statusPerRegion[0][4]; ?>, <?php echo $statusPerRegion[1][4]; ?>, <?php echo $statusPerRegion[2][4]; ?>, <?php echo $statusPerRegion[3][4]; ?>, <?php echo $statusPerRegion[4][4]; ?>, <?php echo $statusPerRegion[5][4]; ?>, <?php echo $statusPerRegion[6][4]; ?>, <?php echo $statusPerRegion[7][4]; ?>, <?php echo $statusPerRegion[8][4]; ?>, <?php echo $statusPerRegion[9][4]; ?>, <?php echo $statusPerRegion[10][4]; ?>, <?php echo $statusPerRegion[11][4]; ?>, <?php echo $statusPerRegion[12][4]; ?>, <?php echo $statusPerRegion[13][4]; ?>, <?php echo $statusPerRegion[14][4]; ?>, <?php echo $statusPerRegion[15][4]; ?>, <?php echo $statusPerRegion[16][4]; ?>, <?php echo $statusPerRegion[17][4]; ?>],
                    label: "Exported",
                    borderColor:"#9EC1CF",
                    backgroundColor:"#9EC1CF",
                    fill:false
                },{
                    data:[<?php echo $statusPerRegion[0][5]; ?>, <?php echo $statusPerRegion[1][5]; ?>, <?php echo $statusPerRegion[2][5]; ?>, <?php echo $statusPerRegion[3][5]; ?>, <?php echo $statusPerRegion[4][5]; ?>, <?php echo $statusPerRegion[5][5]; ?>, <?php echo $statusPerRegion[6][5]; ?>, <?php echo $statusPerRegion[7][5]; ?>, <?php echo $statusPerRegion[8][5]; ?>, <?php echo $statusPerRegion[9][5]; ?>, <?php echo $statusPerRegion[10][5]; ?>, <?php echo $statusPerRegion[11][5]; ?>, <?php echo $statusPerRegion[12][5]; ?>, <?php echo $statusPerRegion[13][5]; ?>, <?php echo $statusPerRegion[14][5]; ?>, <?php echo $statusPerRegion[15][5]; ?>, <?php echo $statusPerRegion[16][5]; ?>, <?php echo $statusPerRegion[17][5]; ?>],
                    label: "Approved",
                    borderColor:"#FDFD97",
                    backgroundColor:"#FDFD97",                    
                    fill:false
                },{
                    data:[<?php echo $statusPerRegion[0][6]; ?>, <?php echo $statusPerRegion[1][6]; ?>, <?php echo $statusPerRegion[2][6]; ?>, <?php echo $statusPerRegion[3][6]; ?>, <?php echo $statusPerRegion[4][6]; ?>, <?php echo $statusPerRegion[5][6]; ?>, <?php echo $statusPerRegion[6][6]; ?>, <?php echo $statusPerRegion[7][6]; ?>, <?php echo $statusPerRegion[8][6]; ?>, <?php echo $statusPerRegion[9][6]; ?>, <?php echo $statusPerRegion[10][6]; ?>, <?php echo $statusPerRegion[11][6]; ?>, <?php echo $statusPerRegion[12][6]; ?>, <?php echo $statusPerRegion[13][6]; ?>, <?php echo $statusPerRegion[14][6]; ?>, <?php echo $statusPerRegion[15][6]; ?>, <?php echo $statusPerRegion[16][6]; ?>, <?php echo $statusPerRegion[17][6]; ?>],
                    label: "Rejected",
                    borderColor:"#FF6663",
                    backgroundColor:"#FF6663",
                    fill:false
                }]
            },
            options:{
                title:{
                    display:true,
                    text:"Status Per Region",
                    fontSize:20
                },
                scales:{
                    // xAxes:[{
                    //     stacked:true
                    // }],
                    // yAxes:[{
                    //     stacked:true
                    // }]
                },
                // tooltips: {
                //     callbacks: {
                //         label: function(tooltipItem, data) {
                //             var dataset = data.datasets[tooltipItem.datasetIndex];
                //         var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                //             return previousValue + currentValue;
                //         });
                //         var currentValue = dataset.data[tooltipItem.index];
                //         var percentage = Math.floor(((currentValue/total) * 100)+0.5);         
                //         return percentage + "%";
                //         }
                //     }
                // }
            }
        });



        //FINALIZED PDF PER DAY        
        <?php
            $sqlFinalizedPerDay = "SELECT date_exported, COUNT(*) FROM tbl_lbp_form WHERE date_exported <> '' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN') GROUP BY date_exported ORDER BY date_exported DESC LIMIT 20";
            $resFinalizedPerDay = mysqli_query($connect, $sqlFinalizedPerDay);
            $checkFinalizedPerDay = mysqli_num_rows($resFinalizedPerDay);
            if($checkFinalizedPerDay > 0){
                while($row=mysqli_fetch_assoc($resFinalizedPerDay)){
                    $day = date('M d, Y', strtotime($row['date_exported']));
                    $days[] = $day; 
                    $counts[] = $row['COUNT(*)']; 
                }
            }
        ?>
        
        
        var ctx = document.getElementById('FinalizedChart').getContext('2d');
        var myChart2 = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['<?php if(!empty($days[0])){echo $days[0];}else{echo "NULL";} ?>', '<?php if(!empty($days[1])){echo $days[1];}else{echo "NULL";} ?>', '<?php if(!empty($days[2])){echo $days[2];}else{echo "NULL";} ?>', '<?php if(!empty($days[3])){echo $days[3];}else{echo "NULL";} ?>', '<?php if(!empty($days[4])){echo $days[4];}else{echo "NULL";} ?>', '<?php if(!empty($days[5])){echo $days[5];}else{echo "NULL";} ?>', '<?php if(!empty($days[6])){echo $days[6];}else{echo "NULL";} ?>', '<?php if(!empty($days[7])){echo $days[7];}else{echo "NULL";} ?>', '<?php if(!empty($days[8])){echo $days[8];}else{echo "NULL";} ?>', '<?php if(!empty($days[9])){echo $days[9];}else{echo "NULL";} ?>', '<?php if(!empty($days[10])){echo $days[10];}else{echo "NULL";} ?>', '<?php if(!empty($days[11])){echo $days[11];}else{echo "NULL";} ?>', '<?php if(!empty($days[12])){echo $days[12];}else{echo "NULL";} ?>', '<?php if(!empty($days[13])){echo $days[13];}else{echo "NULL";} ?>', '<?php if(!empty($days[14])){echo $days[14];}else{echo "NULL";} ?>'],
                
                datasets: [{
                    label: 'Number of Students',
                    data: [<?php if(!empty($counts[0])){echo $counts[0];}else{echo 0;} ?>, <?php if(!empty($counts[1])){echo $counts[1];}else{echo 0;} ?>, <?php if(!empty($counts[2])){echo $counts[2];}else{echo 0;} ?>, <?php if(!empty($counts[3])){echo $counts[3];}else{echo 0;} ?>, <?php echo $counts[4]; ?>, <?php if(!empty($counts[5])){echo $counts[5];}else{echo 0;} ?>, <?php if(!empty($counts[6])){echo $counts[6];}else{echo 0;} ?>, <?php if(!empty($counts[7])){echo $counts[7];}else{echo 0;} ?>, <?php if(!empty($counts[8])){echo $counts[8];}else{echo 0;} ?>, <?php if(!empty($counts[9])){echo $counts[9];}else{echo 0;} ?>, <?php if(!empty($counts[10])){echo $counts[10];}else{echo 0;} ?>, <?php if(!empty($counts[11])){echo $counts[11];}else{echo 0;} ?>, <?php if(!empty($counts[12])){echo $counts[12];}else{echo 0;} ?>, <?php if(!empty($counts[13])){echo $counts[13];}else{echo 0;} ?>, <?php if(!empty($counts[14])){echo $counts[14];}else{echo 0;} ?>],
                    borderColor: [
                        '#9EE09E'
                    ],
                    backgroundColor: [
                        '#9EE09E22'
                    ],
                    borderWidth: 3,
                    lineTension: 0.4
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },  
                title:{
                    display: true,
                    text:'Finalized Applications Per Day',    
                    fontSize:20
                },
                legend:{
                    display: false,
                    position:'right'
                },
                responsive: true
            }
        });

        //CHART FOR MOST SELECTED LBP BRANCH
        <?php
            // $sqlTopBranch = "SELECT lbp_branch, COUNT(*) FROM vw_complete_teslbp_data_2020_2021 WHERE lbp_branch != '' AND date_exported != '' GROUP BY lbp_branch ORDER BY COUNT(*) DESC LIMIT 5";
            // $resTopBranch = mysqli_query($connect, $sqlTopBranch);
            // $checkTopBranch = mysqli_num_rows($resTopBranch);
            // if($checkTopBranch){
            //     while($row = mysqli_fetch_assoc($resTopBranch)){
                    
            //         $branches[] = $row['lbp_branch'];
            //         $rank[] = $row['COUNT(*)'];

            //     }
            // }

            // $sqlTopHEI = "SELECT hei_uii, COUNT(*) FROM tbl_lbp_form WHERE status = 'Finalized' OR status = 'App-DAT' OR status = 'Approved' OR status = 'Claimed' GROUP BY hei_uii ORDER BY COUNT(*) DESC LIMIT 5";
            // $resTopHEI = mysqli_query($connect, $sqlTopHEI);
            // $checkTopHEI = mysqli_num_rows($resTopHEI);
            // if($checkTopHEI){
            //     while($row = mysqli_fetch_assoc($resTopHEI)){

            //         $sqlHEINames = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '".$row['hei_uii']."'";
            //         $resHEINames = mysqli_query($connect, $sqlHEINames);
            //         while($hei_row = mysqli_fetch_assoc($resHEINames)){
            //             $hei_name = $hei_row['hei_name'];
            //         }
                    
            //         $hei[] = $hei_name;
            //         $rank[] = $row['COUNT(*)'];

            //     }
            // }
        ?>
        
        
        // var ctx = document.getElementById('myChart2').getContext('2d');
        // var myChart2 = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: ['<?php echo $hei[0]; ?>', '<?php echo $hei[1]; ?>', '<?php echo $hei[2]; ?>', '<?php echo $hei[3]; ?>', '<?php echo $hei[4]; ?>'],
                
        //         datasets: [{
        //             label: 'Number of Students',
        //             data: [<?php echo $rank[0]; ?>, <?php echo $rank[1]; ?>, <?php echo $rank[2]; ?>, <?php echo $rank[3]; ?>, <?php echo $rank[4]; ?>],
        //             borderColor: [
        //                 'rgba(255, 99, 132, 1)',
        //                 'rgba(54, 162, 235, 1)',
        //                 'rgba(255, 206, 86, 1)',
        //                 'rgba(54, 72, 285, 1)',
        //                 'rgba(122, 316, 96, 1)'
        //             ],
        //             backgroundColor: [
        //                 'rgba(255, 99, 132, 0.8)',
        //                 'rgba(54, 162, 235, 0.8)',
        //                 'rgba(255, 206, 86, 0.8)',
        //                 'rgba(54, 72, 285, 0.8)',
        //                 'rgba(122, 316, 96, 0.8)'
        //             ],
        //             borderWidth: 1,
        //             lineTension: 0
        //         }]
        //     },
        //     options: {
        //         scales: {
        //             yAxes: [{
        //                 ticks: {
        //                     beginAtZero: true
        //                 }
        //             }]
        //         },  
        //         title:{
        //             display: true,
        //             text:'HEIs with Most Updates in Forms',    
        //             fontSize:20
        //         },
        //         legend:{
        //             display: false,
        //             position:'right'
        //         },
        //         responsive: true
        //     }
        // });
    </script>
            
   

        <?php
            include('footer.php');
        ?>
        
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
        <script>
            $(window).on('load', function(){
                $('.loader').addClass('hidden');
            });

            $('#statusPerRegionChart').click(function(event){
                var activepoints = myChart.getElementsAtEvent(event);
                var clickedIndex = activepoints[0]["_index"];
                var region = myChart.data.labels[clickedIndex];
                window.location.href = "dashboard_region.php?region="+region;                
            });
        </script>
    </body>
</html>
