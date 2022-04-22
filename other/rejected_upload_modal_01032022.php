<!-- Modal -->
<div id="modalbot_rejected_update_01032022" class="modal fade">  
    <div class="modal-dialog modal-lg modal_small" role="document">  
            <div class="modal-content">  
                <div class="modal-header" style="background-image:url('image/modal-heading.png');background-size:cover;text-align:center;"> 
                    <h5 class="modal-title">Reject Custom Upadter</h5>  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="bot" class="bot">
                    <form action="other/update_data.php" method="POST" enctype="multipart/form-data">
                        <div class="row" style="margin-top:10px;">
                            <div class="col">
                                <label>Select Excel File</label><br>
                                <input type="file" class="file_application_rejected_report_01032022" id="file_application_rejected_report_01032022" name="file_application_rejected_report_01032022">
                            </div>
                        </div>
                        
                        <!--buttons -->
                        <div class="row">
                            <div class="col" style="text-align:center;padding-top:30px;">
                                <input type="submit" class="btn btn-info btn_update_reject_records_01032022" name="btn_update_reject_records_01032022" id="btn_update_reject_records_01032022" value="Update Records" style="width:90%;">
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
