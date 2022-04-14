<?php
    include('../../dbconnect.php');
    header("Content-Type:text/html; charset=ISO-8859-1"); 

    $ac_year = $_POST['ac_year'];
?>
<label>Landbank Branch</label>
<input type="text" class="custom-select custom-select-sm" name="sel_lbpbranch" list="sel_lbpbranch"  style="font-size:13px;width:100%;height:30px;border-radius:3px;margin-bottom:20px;" autocomplete="off"/>
<datalist id="sel_lbpbranch">
    <?php
        $sqlLBPBranch = "SELECT DISTINCT(lbp_branch) FROM tbl_lbp_form WHERE ac_year='$ac_year'";
        $resLBPBranch = mysqli_query($connect, $sqlLBPBranch);
        $checkLBPBranch = mysqli_num_rows($resLBPBranch);
        while($row = mysqli_fetch_assoc($resLBPBranch)){
            echo "<option value='".$row['lbp_branch']."'>".$row['lbp_branch']."</option>";
        }
    ?>
</datalist>
