<?php
    header("Content-Type:text/html; charset=ISO-8859-1");
    session_start();
    session_destroy();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TES - Landbank Form</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/Contact-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
        <link rel="stylesheet" href="assets/css/styles.css">
    </head>
    <body class="indexpage">        
        <div>
            <div class="login-clean">
                <form method="post" action="other/login.php">
                    <h2 class="sr-only">UniFAST Admin Portal for Student Profiles</h2>
                    <div class="illustration"><img></div>
                    
                    <?php
                        if(isset($_GET['empty'])){
                            echo "<div class='form-row' style='margin-top:-15px;margin-bottom:5px;text-align:center;font-size:13px;'><div class='col'><span style='color:#D8000C;'><i>".$_GET['empty']."</i></span></div></div>";
                        }
                        elseif(isset($_GET['errmsg'])){
                            echo "<div class='form-row' style='margin-top:-15px;margin-bottom:5px;text-align:center;font-size:13px;'><div class='col'><span style='color:#D8000C;'><i>".$_GET['errmsg']."</i></span></div></div>";
                        }
                    ?>

                    <div class="form-group"><input class="form-control txt_username" id="txt_username" type="text" name="txt_username" placeholder="Username"></div>
                    <div class="form-group"><input class="form-control txt_password" id="txt_password" type="password" name="txt_password" placeholder="Password"></div>

                    <div class="form-group"><button class="btn btn-primary btn-block" type="submit" name="btn_login">Log In</button></div>
                    

                    
                </form>
            </div>
        </div>
                
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>        
    </body>
</html>