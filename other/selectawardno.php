<?php  

    $student_portal = 'tes.lbp.app';

    header("Content-Type:text/html; charset=ISO-8859-1");
    if(isset($_POST["award_no"]))  
    {  
        $awardno = $_POST["award_no"];
        $output = '';  
        include('dbconnect.php');
        $query = "SELECT * FROM vw_complete_teslbp_data_2020_2021 WHERE award_no = '".$awardno."'"; 
        $result = mysqli_query($connect, $query);   
        $output .= '
            <div class="table-responsive">  
                <table class="table table-bordered" style="border-color:red;>';
        while($row = mysqli_fetch_array($result))  
       
            {  
                // SQL FOR HEI NAME
                $sqlSelectHEI = "SELECT hei_name FROM tbl_heis WHERE hei_uii = '".$row['hei_uii']."'";
                $resSelectHEI = mysqli_query($connect, $sqlSelectHEI);
                $checkSelectHEI = mysqli_num_rows($resSelectHEI);
                while($row_hei_name = mysqli_fetch_assoc($resSelectHEI)){
                    $hei_name = mysqli_real_escape_string($connect, $row_hei_name['hei_name']);
                }

                // SQL FOR ID TYPE
//                 $sqlSelectIDType = "SELECT id_type_name FROM tbl_lbp_id_type WHERE id_type = '".$row['id_type']."'";
//                 $resSelectIDType = mysqli_query($connect, $sqlSelectIDType);
//                 $checkSelectIDType = mysqli_num_rows($resSelectIDType);
//                 while($row_id_type = mysqli_fetch_assoc($resSelectIDType)){
//                     $id_type_name = mysqli_real_escape_string($connect, $row_id_type['id_type_name']);
//                 }

                // SQL FOR SOURCE OF FUND
//                 $sqlSelectSource = "SELECT source FROM tbl_lbp_source_fund WHERE source_id = '".$row['source_of_fund_id']."'";
//                 $resSelectSource = mysqli_query($connect, $sqlSelectSource);
//                 $checkSelectSource = mysqli_num_rows($resSelectSource);
//                 while($row_source = mysqli_fetch_assoc($resSelectSource)){
//                     $source = mysqli_real_escape_string($connect, $row_source['source']);
//                 }

                // SQL FOR GROSS SALARY
                $sqlSelectSalary = "SELECT salary_range FROM tbl_lbp_gross_salary WHERE gsalary_id = '".$row['gross_salary_id']."'";
                $resSelectSalary = mysqli_query($connect, $sqlSelectSalary);
                $checkSelectSalary = mysqli_num_rows($resSelectSalary);
                while($row_salary=mysqli_fetch_assoc($resSelectSalary)){
                    $salary = mysqli_real_escape_string($connect, $row_salary['salary_range']);
                }
                
                $award_no = mysqli_real_escape_string($connect, $row['award_no']);
                $firstname = mysqli_real_escape_string($connect, $row["fname"]);
                $middlename = mysqli_real_escape_string($connect, $row["mname"]);
                $lastname = mysqli_real_escape_string($connect, $row["lname"]);
                $birthdate = mysqli_real_escape_string($connect, $row["birthdate"]);
                $birthplace = mysqli_real_escape_string($connect, $row["birth_place"]);
                $sex = mysqli_real_escape_string($connect, $row["sex"]);
                $nationality = mysqli_real_escape_string($connect, $row["nationality"]);
                $profession = mysqli_real_escape_string($connect, $row["profession"]);
                $mfirstname = mysqli_real_escape_string($connect, $row["m_fname"]);
                $mmiddlename = mysqli_real_escape_string($connect, $row["m_mname"]);
                $mlastname = mysqli_real_escape_string($connect, $row["m_lname"]);
                $contact = mysqli_real_escape_string($connect, $row["contact"]);
                $email = mysqli_real_escape_string($connect, $row["email"]);
                $present_street = mysqli_real_escape_string($connect, $row["present_street"]);
                $present_barangay = mysqli_real_escape_string($connect, $row["present_barangay"]);
                $present_city = mysqli_real_escape_string($connect, $row["present_city"]);
                $present_province = mysqli_real_escape_string($connect, $row["present_province"]);
                $present_zip = mysqli_real_escape_string($connect, $row["present_zip"]);
                $permanent_street = mysqli_real_escape_string($connect, $row["permanent_street"]);
                $permanent_barangay = mysqli_real_escape_string($connect, $row["permanent_barangay"]);
                $permanent_city = mysqli_real_escape_string($connect, $row["permanent_city"]);
                $permanent_province = mysqli_real_escape_string($connect, $row["permanent_province"]);
                $permanent_zip = mysqli_real_escape_string($connect, $row["permanent_zip"]);
                $ac_year = mysqli_real_escape_string($connect, $row["ac_year"]);
                $lbp_branch = mysqli_real_escape_string($connect, $row["lbp_branch"]);
                $tin = mysqli_real_escape_string($connect, $row["tin"]);
                $emboss_name = mysqli_real_escape_string($connect, $row["emboss_name"]);
                $date_exported = mysqli_real_escape_string($connect, $row["date_exported"]);
                $pdf_attachment = mysqli_real_escape_string($connect, $row["pdf_attachment"]);
                $privacy_agreement = mysqli_real_escape_string($connect, $row["privacy_agreement"]);
                $editable_fields = mysqli_real_escape_string($connect, $row["editable_fields"]);
                $pickup_at_hei = mysqli_real_escape_string($connect, $row["pickup_at_hei"]);
                $application_datfile_export_date = mysqli_real_escape_string($connect, $row["application_datfile_export_date"]);
                $wallet_number = mysqli_real_escape_string($connect, $row["wallet_number"]);
                $device_number = mysqli_real_escape_string($connect, $row["device_number"]);
                $transaction_datfile_export_date = mysqli_real_escape_string($connect, $row["transaction_datfile_export_date"]);
                $status = mysqli_real_escape_string($connect, $row["status"]);

                if(!empty($pdf_attachment) && empty($wallet_number) && empty($device_number) && empty($transaction_datfile_export_date)){
                    $disable = '';
                }
                else{
                    $disable = 'disabled';
                }
            
                //LANDBANK BRANCH OR SERVICING BRANCH
                if($lbp_branch=="" || empty($lbp_branch)){
                    $sqlServicingBranch = "SELECT branch FROM tbl_lbp_servicing_branches WHERE hei_name = '$hei_name'";
                    $resServicingBranch = mysqli_query($connect, $sqlServicingBranch);
                    $checkServicingBranch = mysqli_num_rows($resServicingBranch);
                    if($checkServicingBranch > 0){
                        while($row = mysqli_fetch_assoc($resServicingBranch)){
                            $lbp_branch = $hei_name.' - '.$row['branch'];
                        }
                    }
                    else{
                        $lbp_branch = "N/A";
                    }
                }
                else{
                    $lbp_branch = $lbp_branch;
                }

                //empty present address string fix
                if(empty($present_street)){
                    $fix_present_street = $present_street;
                }
                elseif(!empty($present_street)){
                    $fix_present_street = $present_street.', ';
                }

                if(empty($present_barangay)){
                    $fix_present_barangay = $present_barangay;
                }
                elseif(!empty($present_barangay)){
                    $fix_present_barangay = $present_barangay.', ';
                }

                if(empty($present_city)){
                    $fix_present_city = $present_city;
                }
                elseif(!empty($present_city)){
                    $fix_present_city = $present_city.', ';
                }

                if(empty($present_province) || empty($present_zip)){
                    $fix_present_province = $present_province;
                }
                elseif(!empty($present_province) && !empty($present_zip)){
                    $fix_present_province = $present_province.', ';
                }

                if(empty($present_zip)){
                    $fix_present_zip = $present_zip;
                }
                elseif(!empty($present_zip)){
                    $fix_present_zip = $present_zip;
                }

                $present_address = "<label>$fix_present_street $fix_present_barangay $fix_present_city $fix_present_province $fix_present_zip</label>";

                
                //empty permanent address string fix
                if(empty($permanent_street)){
                    $fix_permanent_street = $permanent_street;
                }
                elseif(!empty($permanent_street)){
                    $fix_permanent_street = $permanent_street.', ';
                }

                if(empty($permanent_barangay)){
                    $fix_permanent_barangay = $permanent_barangay;
                }
                elseif(!empty($permanent_barangay)){
                    $fix_permanent_barangay = $permanent_barangay.', ';
                }

                if(empty($permanent_city)){
                    $fix_permanent_city = $permanent_city;
                }
                elseif(!empty($permanent_city)){
                    $fix_permanent_city = $permanent_city.', ';
                }

                if(empty($permanent_province) || empty($permanent_zip)){
                    $fix_permanent_province = $permanent_province;
                }
                elseif(!empty($permanent_province) && !empty($permanent_zip)){
                    $fix_permanent_province = $permanent_province.', ';
                }

                if(empty($permanent_zip)){
                    $fix_permanent_zip = $permanent_zip;
                }
                elseif(!empty($permanent_zip)){
                    $fix_permanent_zip = $permanent_zip;
                }

                $permanent_address = "<label>$fix_permanent_street $fix_permanent_barangay $fix_permanent_city $fix_permanent_province $fix_permanent_zip</label>";


                //check other empty data
                if(empty($source)){
                    $source = "";
                }
                if(empty($salary)){
                    $salary = "";
                }
                
                //set the default date to text = 'Not Yet Exported'
                if(empty($date_exported) || $date_exported == "0000-00-00"){
                    $text_date_exported = "Not Yet Exported";
                }else{
                    $text_date_exported = date("M d, Y", strtotime($date_exported));
                }

                if(empty($application_datfile_export_date) || $application_datfile_export_date == "0000-00-00"){
                    $text_application_datfile_export_date = "Not Yet Exported";
                }else{
                    $text_application_datfile_export_date = date("M d, Y", strtotime($application_datfile_export_date));
                }

                if(empty($transaction_datfile_export_date) || $transaction_datfile_export_date == "0000-00-00"){
                    $text_transaction_datfile_export_date = "Not Yet Exported";
                }else{
                    $text_transaction_datfile_export_date = date("M d, Y", strtotime($transaction_datfile_export_date));
                }
            
                $application_datfile_export_date = date("M d, Y", strtotime($application_datfile_export_date));
                $transaction_datfile_export_date = date("M d, Y", strtotime($transaction_datfile_export_date));

                $path = substr(mysqli_real_escape_string($connect, $row["photo"]), 3);
                $path = str_replace("..","",$path);
                $output .= '  
                        <tr>
                            <tr>
                                <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                                    
                                </td>
                            </tr>

                            <td rowspan = "5" style="text-align:center;background-color:#aaa;border-color:#414141;" width="25%">
                                <img src="../'.$student_portal.'/'.$path.'" alt="No Photo Uploaded" width = "250" height = "250" style="border: 7px solid gray; border-radius: 4px;">
                            </td>

                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Award Number:</b></label>
                            </td>
                            <td colspan="2" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                                <label>'.$award_no.'</label>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Full Name:</b></label>
                            </td>
                            <td colspan="2" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                                <label>'.$firstname.' '.$middlename.' '.$lastname.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Birth Date:</b></label>
                            </td>
                            <td colspan="2" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.date("M d, Y", strtotime($birthdate)).'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Birth Place:</b></label>
                            </td>
                            <td colspan="2" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$birthplace.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Sex:</b></label>
                            </td>
                            <td colspan="2" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$sex.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Nationality:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$nationality.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Profession:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$profession.'</label>
                            </td>
                        </tr>
                        
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Contact Number:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$contact.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;" width="25%">
                                <label><b>Email:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$email.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;" width="25%">
                                <label><b>Mother\'s Maiden Name:</b></label>
                            </td>
                            <td colspan="3" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$mfirstname.' '.$mmiddlename.' '.$mlastname.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Present Address:</b></label>
                            </td>
                            <td colspan="3" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">'
                                .$present_address.
                            '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Permanent Address:</b></label>
                            </td>
                            <td colspan="3" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">'
                                .$permanent_address.
                            '</td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Institution:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$hei_name.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Academic Year:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$ac_year.'</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                                <label style="font-size:18px;"><b>Additional Informations For LandBank</b></label>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>LandBank Branch:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$lbp_branch.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>TIN Number:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$tin.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Source of Fund:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>Stipend</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Gross Salary Range:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$salary.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Emboss Name:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.strtoupper($emboss_name).'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>PDF Export Date:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label><a href="../'.$student_portal.'/'.$student_portal.'/'.$pdf_attachment.'" target="_blank">'.$text_date_exported.'</a></label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Application DAT File Export Date:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$text_application_datfile_export_date.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Transaction DAT File Export Date:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$text_transaction_datfile_export_date.'</label>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Wallet Number:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$wallet_number.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Device Number:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$device_number.'</label>
                            </td>
                        </tr>

                        <tr>
                            <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                                <label style="font-size:18px;"><b>Account Details</b></label>
                            </td>
                        </tr>

                        <tr>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Username:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$award_no.'</label>
                            </td>
                            <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                                <label><b>Password:</b></label>
                            </td>
                            <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">
                                <label>'.$tin.'</label>
                            </td>
                        </tr>
                        
                        ';  
            }  
        $output .= "</table></div>  
        <div>
            <input type='hidden' class='hdn_awardno' id='hdn_awardno' value='$awardno'>
            <input type='button' name='btn_enable_editing' class='btn btn-success btn_enable_editing' id='btn_enable_editing' value='Enable Editing' ".$disable.">
        </div>
        
        <script>
            var btn = document.getElementById('btn_enable_editing');
            var awardno = document.getElementById('hdn_awardno').value;
            btn.addEventListener('click', function() {
                document.location.href = 'other/unfinalize.php?awardno='+awardno;
            });
        </script>"; 
        echo $output;
    }  
?>
