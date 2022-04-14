<!-- Modal -->
<div id="modalbot_forclaiming_update" class="modal fade">  
    <div class="modal-dialog modal-lg modal_small" role="document">  
            <div class="modal-content">  
                <div class="modal-header" style="background-image:url('image/modal-heading.png');background-size:cover;text-align:center;"> 
                    <h5 class="modal-title">Upload Excel File</h5>  
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>  
                <div class="modal-body" id="bot" class="bot">
                    <form action="other/update_data.php" method="POST" enctype="multipart/form-data">
                        <div class="row" style="margin-top:10px;">
                            <div class="col">
                                <label>Select Excel File</label><br>
                                <input type="file" class="file_forclaiming_update" id="file_forclaiming_update" name="file_forclaiming_update">
                            </div>
                        </div>
                        
                        <!--buttons -->
                        <div class="row">
                            <div class="col" style="text-align:center;padding-top:30px;">
                                <input type="submit" class="btn btn-info btn_update_for_claiming" name="btn_update_for_claiming" id="btn_update_for_claiming" value="Update Records" style="width:90%;">
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

