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
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/datatables/datatables.min.js"></script> 
        <link rel="stylesheet" href="assets/datatables/datatables.min.css" />
        <link rel="stylesheet" href="assets/css/loader.css">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
        <link rel="stylesheet" href="assets/css/navigation.css">
        <script>
            var region = url.searchParams.get("region");
        </script>
    </head>
    <body style="background-image:url('image/background2.png');background-attachment: fixed; background-position: center;">
        <div class="container" style="background-color:rgba(255,255,255,0.9);margin-top:20px;border-radius:3px;">
        <h4 style="margin-bottom:30px;padding-top:10px;font-family:helvetica;color:#444;">Dashboard</h4>
            
        <?php    
            $region = $_GET['region'];
        ?>
            <h1><?php echo $region; ?></h1>
        <?php
            //Rename Regions
            if($region == 'Region 1'){
                $region = '01';
            }
            elseif($region == 'Region 2'){
                $region = '02';
            }
            elseif($region == 'Region 3'){
                $region = '03';
            }
            elseif($region == 'Region 4'){
                $region = '04';
            }
            elseif($region == 'Region 5'){
                $region = '05';
            }
            elseif($region == 'Region 6'){
                $region = '06';
            }
            elseif($region == 'Region 7'){
                $region = '07';
            }
            elseif($region == 'Region 8'){
                $region = '08';
            }
            elseif($region == 'Region 9'){
                $region = '09';
            }
            elseif($region == 'Region 10'){
                $region = '10';
            }
            elseif($region == 'Region 11'){
                $region = '11';
            }
            elseif($region == 'Region 12'){
                $region = '12';
            }
            elseif($region == 'NCR'){
                $region = '13';
            }
            elseif($region == 'CAR'){
                $region = '14';
            }
            elseif($region == 'BARMM-A'){
                $region = '15A';
            }
            elseif($region == 'BARMM-B'){
                $region = '15B';
            }
            elseif($region == 'CARAGA'){
                $region = '16';
            }
            elseif($region == 'MIMAROPA'){
                $region = '17';
            }
        ?>

        <?php
        //TOTAL GRANTEES IN REGION    
            $sqlOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND (status != '' AND status != 'WAIVED/DELISTED') AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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
            
        //TOTAL NEW GRANTEES IN REGION
            $sqlNewGrantees = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND (status != '' AND status != 'WAIVED/DELISTED') AND (tag = 'NEW')";
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

        //TOTAL ONGOING GRANTEES IN REGION
            $sqlOnGoingGrantees = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND (status != '' AND status != 'WAIVED/DELISTED') AND (tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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







            $sqlFinalized = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Finalized' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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

            $sqlSubmitted = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'SubToUniFAST' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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

            $sqlAppDAT = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'App-DAT' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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

            $sqlApproved = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Approved' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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
            
            $sqlRejected = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Rejected' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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

            $sqlNotFinalized = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Not Finalized' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
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

            $sqlFinalizedOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Finalized' AND tag = 'ON-GOING'";
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

            $sqlAppDATOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'App-DAT' AND tag = 'ON-GOING'";
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

            $sqlApprovedOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Approved' AND tag = 'ON-GOING'";
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
            
            $sqlRejectedOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Rejected' AND tag = 'ON-GOING'";
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

            $sqlForClaimingOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'For Claiming' AND tag = 'ON-GOING'";
            $resForClaimingOnGoing = mysqli_query($connect, $sqlForClaimingOnGoing);
            $checkForClaimingOnGoing = mysqli_num_rows($resForClaimingOnGoing);
            if($checkForClaimingOnGoing > 0){
                while($row=mysqli_fetch_assoc($resForClaimingOnGoing)){
                    $forClaimingOnGoing = $row['Count(*)'];
                }
            }
            else{
                $forClaimingOnGoing = 0;
            }
            $forClaimingOnGoingPercent = $forClaimingOnGoing/$onGoingGrantees;
            $forClaimingOnGoingPercent = round($forClaimingOnGoingPercent*100,2).'%';

            $sqlClaimedOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Claimed' AND tag = 'ON-GOING'";
            $resClaimedOnGoing = mysqli_query($connect, $sqlClaimedOnGoing);
            $checkClaimedOnGoing = mysqli_num_rows($resClaimedOnGoing);
            if($checkClaimedOnGoing > 0){
                while($row=mysqli_fetch_assoc($resClaimedOnGoing)){
                    $claimedOnGoing = $row['Count(*)'];
                }
            }
            else{
                $claimedOnGoing = 0;
            }
            $claimedOnGoingPercent = $claimedOnGoing/$onGoingGrantees;
            $claimedOnGoingPercent = round($claimedOnGoingPercent*100,2).'%';

            $sqlNotFinalizedOnGoing = "SELECT Count(*) FROM tbl_lbp_form a INNER JOIN tbl_heis b ON a.hei_uii = b.hei_uii WHERE b.hei_psg_region = '".$region."' AND status = 'Not Finalized' AND tag = 'ON-GOING'";
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


            $overAllOnGoingFinalized = $finalizedOnGoing + $appDATOnGoing + $approvedOnGoing + $rejectedOnGoing + $forClaimingOnGoing + $claimedOnGoing;
            $overAllOnGoingFinalizedPercentage = $overAllOnGoingFinalized/$onGoingGrantees;
            $overAllOnGoingFinalizedPercentage = round($overAllOnGoingFinalizedPercentage*100,2);

            $overAllOnGoingFinalizedDifference = $onGoingGrantees - $overAllOnGoingFinalized;
            $overAllOnGoingFinalizedPercentageDifference = 100 - $overAllOnGoingFinalizedPercentage;




              

            $totalFinalizedApplications = $finalized + $submitted + $appDAT + $approved;
            $overAllFinalizedPercentage = $totalFinalizedApplications/$onGoing;
            $overAllFinalizedPercentage = round($overAllFinalizedPercentage*100,2);

            $overAllFinalizedDifference = $onGoing - $totalFinalizedApplications;
            $overAllFinalizedPercentageDifference = 100 - $overAllFinalizedPercentage;
      ?>

            <!-- CARDS -->
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
                    <div class="progress" style="height:60px;width:100%;text-align:center;padding:8px;">
                        <h3 style=""><?php echo $overAllOnGoingFinalizedPercentage; ?><span style="font-size:13px;">%</span></h3><br>
                        <p>Overall Percentage</p>
                    </div>
                </div>
                <div class="col-10">
                    <div class="progress" style="height:60px;">
                        <div class="progress-bar bg-success" role="progressbar" style="text-align:center;width: <?php echo $overAllFinalizedPercentage; ?>%;height:100%" aria-valuenow="<?php echo $totalFinalizedApplications; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo $totalFinalizedApplications; ?></b></p>
                            <p>Total Finalized Applications</p>
                        </div>
                        <div class="progress-bar" role="progressbar" style="background-color:#ccc;text-align:center;width: <?php echo $overAllFinalizedPercentageDifference; ?>%;height:100%" aria-valuenow="<?php echo $overAllFinalizedDifference; ?>" aria-valuemin="0" aria-valuemax="<?php echo $onGoing; ?>">
                            <p style="color:#555;margin-bottom:0px;margin-top:10px;font-size:18px;"><b><?php echo $overAllFinalizedDifference; ?></b></p>
                            <p style="color:#555;">Not Finalized</p>
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
                            <div class="row"><div class="card-text col-lg-6 col-md-6" style="margin-bottom:-20px;text-align:center;display:inline-block;margin-top:-10px;"><?php echo ' <span style="font-size:12px;color:#666;font-family:Bahnschrift;">New</span><br><b style="font-size:15px;font-family:sans-serif;color:#666;">'.number_format($newGrantees).'</b>'; ?></div><div class="card-text col-lg-6 col-md-6" style="margin-bottom:-20px;text-align:center;display:inline-block;margin-top:-10px;"><?php echo ' <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Continuing</span><br><b style="font-size:15px;font-family:sans-serif;color:#666;">'.number_format($onGoingGrantees).'</b>'; ?></div></div><br>
                            <div class="card-text" style="margin-bottom:-25px;text-align:center;"><?php echo '<b style="font-size:24px;font-family:sans-serif;color:#444;">'.number_format($onGoing).'</b> <span style="font-size:12px;color:#666;font-family:Bahnschrift;">Grantees</span>'; ?></div>
                            <br>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OVERALL STATUS -->
            <div class="row">                
                <div class="col-xl-1" style="margin-top:20px;">
                
                </div>
                <div class="col-xl-10" style="margin-top:20px;">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="myChart" width="3" height="2"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-1" style="margin-top:20px;">
                    
                </div>
            </div><br><br>

            <!-- HEI LIST -->
            <div class="row">
                <div class="col" align='center'> 
                <h3>Higher Education Institutions</h3>               
                <table id="table_heis_region" class="table table-striped table-bordered table-sm" style='font-size:13px;'>  
                        <thead class="table_header"  style="font-size:13px; background-color:rgb(255, 204, 142); font-weight: bold;">  
                            <tr>  
                                <th width="8%">HEI Type</th>
                                <th width="5%">HEI UII</th>
                                <th width="40%">HEI Name</th>
                                <th width="">Not Finalized</th>
                                <th width="">Finalized</th>
                                <th width="">Submitted</th>
                                <th width="">Exported</th>
                                <th width="">Approved</th>
                                <th width="">Rejected</th>
                                <th width="">Total Grantees</th> 
                                <th width="">Approved Percentage</th> 
                            </tr>  
                        </thead>  
                        <tbody>
                            <?php

                                $sqlHEIStatusList = "SELECT * FROM tbl_heis WHERE hei_psg_region = '".$region."'";
                                $resHEIStatusList = mysqli_query($connect, $sqlHEIStatusList);
                                $checkHEIStatusList = mysqli_num_rows($resHEIStatusList);
                                if($checkHEIStatusList > 0){
                                    while($row = mysqli_fetch_assoc($resHEIStatusList)){
                                        $hei_region_nir = $row['hei_region_nir'];
                                        $hei_it = $row['hei_it'];
                                        $hei_uii = $row['hei_uii'];
                                        $hei_name = utf8_decode($row['hei_name']);
                                        
                                        // $action = '<input type="submit" class="btn btn-primary btn_ view_data" value="View" data-toggle="modal" id="'.$awardno.'" name="'.$awardno.'" data-target="#modal_profile" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;">
                                        //            <input type="button" class="btn btn-success btn_unfinalize_data" value="Unfinalize" style="padding:5px; font-size:10px; padding-top:2px; padding-bottom:2px;" '.$disable.'>
                                        //            <input type="hidden" class="hdn_awardno" id="hdn_awardno" name="hdn_awardno" value="'.$awardno.'">';

                                        //Not Finalized
                                        $sqlNotFinalized = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Not Finalized' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resNotFinalized = mysqli_query($connect, $sqlNotFinalized);
                                        $checkNotFinalized = mysqli_num_rows($resNotFinalized);
                                        if($checkNotFinalized > 0){
                                            while($row=mysqli_fetch_assoc($resNotFinalized)){
                                                $notFinalizedRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $notFinalizedRegion = 0;
                                        }

                                        //Finalized
                                        $sqlFinalized = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Finalized' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resFinalized = mysqli_query($connect, $sqlFinalized);
                                        $checkFinalized = mysqli_num_rows($resFinalized);
                                        if($checkFinalized > 0){
                                            while($row=mysqli_fetch_assoc($resFinalized)){
                                                $finalizedRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $finalziedRegion = 0;
                                        }

                                        //Submitted
                                        $sqlSubmitted = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'SubToUniFAST' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resSubmitted = mysqli_query($connect, $sqlSubmitted);
                                        $checkSubmitted = mysqli_num_rows($resSubmitted);
                                        if($checkSubmitted > 0){
                                            while($row=mysqli_fetch_assoc($resSubmitted)){
                                                $submittedRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $submittedRegion = 0;
                                        }

                                        //Application Exported
                                        $sqlApplicationExported = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'App-DAT' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resApplicationExported = mysqli_query($connect, $sqlApplicationExported);
                                        $checkApplicationExported = mysqli_num_rows($resApplicationExported);
                                        if($checkApplicationExported > 0){
                                            while($row=mysqli_fetch_assoc($resApplicationExported)){
                                                $appDATRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $appDATRegion = 0;
                                        }

                                        //Approved
                                        $sqlApproved = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Approved' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resApproved = mysqli_query($connect, $sqlApproved);
                                        $checkApproved = mysqli_num_rows($resApproved);
                                        if($checkApproved > 0){
                                            while($row=mysqli_fetch_assoc($resApproved)){
                                                $approvedRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $approvedRegion = 0;
                                        }

                                        //Rejected
                                        $sqlRejected = "SELECT Count(*) FROM tbl_lbp_form WHERE status = 'Rejected' AND hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resRejected = mysqli_query($connect, $sqlRejected);
                                        $checkRejected = mysqli_num_rows($resRejected);
                                        if($checkRejected > 0){
                                            while($row=mysqli_fetch_assoc($resRejected)){
                                                $rejectedRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $rejectedRegion = 0;
                                        }

                                        //Total Grantee
                                        $sqlTotalGrantee = "SELECT Count(*) FROM tbl_lbp_form WHERE hei_uii = '$hei_uii' AND (tag = 'NEW' OR tag = 'ON-GOING' OR tag = 'AWARDED THROUGH RESIDENCY' OR tag = 'EXTENDED OJT DUE TO PANDEMIC' OR tag = 'ON-GOING LISTAHANAN')";
                                        $resTotalGrantee = mysqli_query($connect, $sqlTotalGrantee);
                                        $checkTotalGrantee = mysqli_num_rows($resTotalGrantee);
                                        if($checkTotalGrantee > 0){
                                            while($row=mysqli_fetch_assoc($resTotalGrantee)){
                                                $totalRegion = $row['Count(*)'];
                                            }
                                        }
                                        else{
                                            $totalRegion = 0;
                                        }

                                        //Percentage of Approved Application
                                        $approvedOverallPercentage = ($approvedRegion/$totalRegion)*100;
                                        if(is_nan($approvedOverallPercentage)==true){
                                            $approvedOverallPercentage = 0;
                                            $percentColumn = "<td style='color:#808080;'><b>$approvedOverallPercentage</b></td>";
                                        }
                                        else{
                                            $approvedOverallPercentage = round($approvedOverallPercentage,2);
                                            if($approvedOverallPercentage == 100){
                                                $percentColumn = "<td style='color:#16a04a;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                            elseif($approvedOverallPercentage >= 90 && $approvedOverallPercentage <= 99){
                                                $percentColumn = "<td style='color:#91c74b;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                            elseif($approvedOverallPercentage >= 70 && $approvedOverallPercentage <= 89){
                                                $percentColumn = "<td style='color:#cccc00;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                            elseif($approvedOverallPercentage >= 40 && $approvedOverallPercentage <= 69){
                                                $percentColumn = "<td style='color:#dbac00;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                            elseif($approvedOverallPercentage >= 30 && $approvedOverallPercentage <= 39){
                                                $percentColumn = "<td style='color:#faa41b;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                            elseif($approvedOverallPercentage >= 0 && $approvedOverallPercentage <= 29){
                                                $percentColumn = "<td style='color:#f26223;'><b>$approvedOverallPercentage%</b></td>";
                                            }
                                        }
                                        
                                        

                                        echo "
                                            <tr>
                                                <td>$hei_it</td>
                                                <td>$hei_uii</td>
                                                <td>$hei_name</td>
                                                <td>$notFinalizedRegion</td>
                                                <td>$finalizedRegion</td>
                                                <td>$submittedRegion</td>
                                                <td>$appDATRegion</td>
                                                <td>$approvedRegion</td>
                                                <td>$rejectedRegion</td>
                                                <td>$totalRegion</td>
                                                $percentColumn
                                            </tr>
                                        ";
                                    }
                                }   
                            ?>  
                        </tbody>
                    </table> 
                </div>
            </div>
            
        </div>
        <?php
            include('footer.php');
        ?>
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
                    text:'Region '+<?php echo $region; ?>+' Status',    
                    fontSize:20
                },
                legend:{
                    display: true,
                    position:'top'
                }
            }
        });


    </script>
 </body> 
    <script src="assets/bootstrap/js/bootstrap.min.js"></script> 
    <script>
        $(document).ready(function(){ 
            $('#table_heis_region').dataTable({
                "aaSorting": [[10,'desc'],[9,'desc']],
                "bPaginate": true,
                "bLengthChange": false,
                "bFilter": true,
                "bInfo": false,
                "bAutoWidth": false
            });
        });  
    </script>   
</html>
