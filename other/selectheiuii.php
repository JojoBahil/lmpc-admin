<?php  
    header("Content-Type:text/html; charset=ISO-8859-1");
    if(isset($_POST["hei_uii"]))  
    {  
        $output = '';  
        include('dbconnect.php');
        $query = "SELECT * FROM tbl_heis WHERE hei_uii = '".$_POST["hei_uii"]."'"; 
        $result = mysqli_query($connect, $query); 
        $output .= '
            <div class="table-responsive">  
                <table class="table table-bordered" style="border-color:red;>';
        while($row = mysqli_fetch_array($result))  
            {  
                $hei_sid = mysqli_real_escape_string($connect, $row["hei_sid"]);
                $hei_uii = mysqli_real_escape_string($connect, $row["hei_uii"]);
                $hei_name = mysqli_real_escape_string($connect, $row["hei_name"]);
                $hei_it = mysqli_real_escape_string($connect, $row["hei_it"]);
                $hei_ct = mysqli_real_escape_string($connect, $row["hei_ct"]);
                $hei_ched_recog = mysqli_real_escape_string($connect, $row["hei_ched_recog"]);
                $hei_pnsl = mysqli_real_escape_string($connect, $row["hei_pnsl"]);
                $hei_stat = mysqli_real_escape_string($connect, $row["hei_stat"]);
                $hei_psg_region = mysqli_real_escape_string($connect, $row["hei_psg_region"]);
                $hei_region_nir = mysqli_real_escape_string($connect, $row["hei_region_nir"]);
                $hei_prov_code = mysqli_real_escape_string($connect, $row["hei_prov_code"]);
                $hei_prov_name = mysqli_real_escape_string($connect, $row["hei_prov_name"]);
                $hei_citymun_code = mysqli_real_escape_string($connect, $row["hei_citymun_code"]);
                $hei_city_name = mysqli_real_escape_string($connect, $row["hei_city_name"]);
                $hei_interlevel = mysqli_real_escape_string($connect, $row["hei_interlevel"]);
                $hei_income_class = mysqli_real_escape_string($connect, $row["hei_income_class"]);
                $hei_street = mysqli_real_escape_string($connect, $row["hei_street"]);
                $hei_zipcode_oprkm = mysqli_real_escape_string($connect, $row["hei_zipcode_oprkm"]);
                $hei_zipcode_uf = mysqli_real_escape_string($connect, $row["hei_zipcode_uf"]);
                $hei_telno = mysqli_real_escape_string($connect, $row["hei_telno"]);
                $hei_email = mysqli_real_escape_string($connect, $row["hei_email"]);
                $hei_website = mysqli_real_escape_string($connect, $row["hei_website"]);
                $hei_established = mysqli_real_escape_string($connect, $row["hei_established"]);
                $hei_head = mysqli_real_escape_string($connect, $row["hei_head"]);
                $hei_head_pos = mysqli_real_escape_string($connect, $row["hei_head_pos"]);

                // check if field is empty
                if(empty($hei_sid)){
                    $hei_sid = "N/A";
                }

                if($hei_interlevel == "Mun"){
                    $hei_interlevel = "Municipality";
                }

                if($hei_ched_recog==0){
                    $hei_ched_recog = "No";
                }
                elseif($hei_ched_recog==1){
                    $hei_ched_recog = "Yes";
                }

                if($hei_pnsl==0){
                    $hei_pnsl = "No";
                }
                elseif($hei_pnsl==1){
                    $hei_pnsl = "Yes";
                }

                if(empty($hei_website)){
                    $hei_website = "N/A";
                }

                $output .= '  
                <tr align="center">
                    <td colspan = "4" style="vertical-align:middle;text-align:center;border-right-color:#fff;border-left-color:#fff;border-top-color:#fff;border-bottom-color:#414141;">
                        <label style="font-size:30px;"><b> '.$hei_name.' </b></label><br>
                        <label style="font-size:18px;color:#606060;"> '.$hei_head.' </label><br>
                        <label style="font-size:13px;color:#606060;"> '.$hei_head_pos.' </label><br>
                    </td>
                </tr>

                <tr>
                    <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                        <label style="font-size:18px;"><b>HEI Identifications</b></label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Unique Institution ID:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_uii.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>System Institution ID:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_sid.' </label>
                    </td>
                </tr>

                <tr>
                    <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                        <label style="font-size:18px;"><b>HEI Classifications</b></label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Institution Type:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_it.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Campus Type:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_ct.' </label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>CHED Recognized:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_ched_recog.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>PHEI without SUC/LUC:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_pnsl.' </label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Income Class:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_income_class.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>HEI Interlevel:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_interlevel.' </label>
                    </td>
                </tr>

                <tr>
                    <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                        <label style="font-size:18px;"><b>HEI Location</b></label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Region:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_region_nir.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Province:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_prov_name.' </label>
                    </td>
                </tr>
                
                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>City/Municipality:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_city_name.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Street:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_street.' </label>
                    </td>
                </tr>

                <tr>
                    <td colspan = "4" style="vertical-align:middle;background-color:#ffa665;border-color:#414141;">
                        <label style="font-size:18px;"><b>HEI Contact</b></label>
                    </td>
                </tr>

                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Telephone Number:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_telno.' </label>
                    </td>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Email Address:</b></label>
                    </td> 
                    <td style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_email.' </label>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align:middle;background-color:#aaa;border-color:#414141;">
                        <label><b>Webiste:</b></label>
                    </td> 
                    <td colspan = "3" style="vertical-align:middle;background-color:rgba(255,255,255,0.9);border-color:#414141;">    
                        <label> '.$hei_website.' </label>
                    </td>
                </tr>
                ';  
            }  
        $output .= "</table></div>";  
        echo $output;
    }  
?>
