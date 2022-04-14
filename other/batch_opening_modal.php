<!-- Modal -->
<div id="modalbot" class="modal fade">  
    <div class="modal-dialog modal-lg modal_small" role="document">  
            <div class="modal-content">  
                <div class="modal-header" style="background-image:url('image/modal-heading.png');background-size:cover;text-align:center;"> 
                    <h5 class="modal-title">Generate Files</h5>  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="bot" class="bot">
                    <form action="other/export_data.php" method="POST">
                        <div class="row" style="margin-top:10px;">
                            <div class="col">
                                <label>Academic Year</label>
                                <select name="sel_academic_year" class="sel_academic_year custom-select custom-select-sm" id="sel_academic_year" required="" style="font-size:13px;width:100%;height:30px;border-radius:3px;margin-bottom:20px;" onCHange="getBOTAcademicYear(this.value)">
                                    <option></option>                                   
                                    <?php
                                       $sqlAcademicYear = "SELECT DISTINCT(setting) as ac_year FROM tbl_settings WHERE setting!='ACTIVE_AY'";
                                       $resAcademicYear = mysqli_query($connect, $sqlAcademicYear);
                                       $checkAcademicYear = mysqli_num_rows($resAcademicYear);
                                       while($row = mysqli_fetch_assoc($resAcademicYear)){
                                            echo "<option value='".$row['ac_year']."'>".$row['ac_year']."</option>";
                                       }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col" style="text-align:left;">
                            <label>Re-export Application Excel/DAT File</label>
                                <select name='sel_reexport' class='sel_reexport' id='sel_reexport' style="font-size:13px;width:100%;height:30px;border-radius:3px;margin-bottom:20px;">
                                    <option></option>
                                    <?php
                                        $sqlAvailableName = "SELECT DISTINCT(application_datfile_name) FROM vw_for_admin WHERE application_datfile_name IS NOT NULL";
                                        $resAvaialbleName = mysqli_query($connect, $sqlAvailableName);
                                        $checkAvailableName = mysqli_num_rows($resAvaialbleName);
                                        if($checkAvailableName > 0){
                                            while($row=mysqli_fetch_assoc($resAvaialbleName)){
                                                echo '<option>'.$row['application_datfile_name'].'</option>';
                                            }
                                        }
                                        else{
                                            echo '<option></option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <!-- buttons -->
                        <div class="row">
                            <div class="col" style="text-align:center;padding-top:30px;">
                                <input type="submit" class="btn btn-info button_generate" name="btn_generate" id="btn_generate" value="Generate Application Excel File" style="width:90%;">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col" style="text-align:center;padding-top:30px;">
                                <input type="submit" class="btn btn-info button_generate" name="btn_generate_datfile" id="btn_generate_datfile" value="Generate Application DAT File" style="width:90%;">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col" style="text-align:center;padding-top:30px;">
                                <input type="submit" class="btn btn-info button_generate" name="btn_generate_transaction_datfile" id="btn_generate_transaction_datfile" value="Generate Transaction DAT File" style="width:90%;">
                            </div>
                        </div>
                    </form>
                </div>  
                <div class="modal-footer" style="border-radius:3px;background-image:url('image/modal-footer.png');background-size:cover;text-align:center;">  
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>  
                </div>  
            </div>  
    </div>  
</div> <!-- modal -->


<script>
    function getBOTAcademicYear(val){
        $.ajax({
            type: "POST",
            url: "other/ajax/BOT/select_lbp_branches.php",
            data: {ac_year:val},
            success: function(data){
                $("#div_lbp_branch").html(data);
            }
        });
    }
</script>
