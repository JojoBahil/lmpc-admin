<?php
    session_start();
    include('dbconnect.php');

    if(isset($_POST['btn_login'])){

        $msg ="";

        $username = $_POST['txt_username'];
        $password = $_POST['txt_password'];

        if(empty($username) || empty($password)){
            $msg = "Username and Password is required";
            header('location: ../index.php?empty='.$msg);
            exit();
        }      
        
        $sqlAccount = "SELECT * FROM tbl_lbp_admin_account WHERE username='$username' AND password='$password'";
        $resAccount = mysqli_query($connect, $sqlAccount);
        $checkAccount = mysqli_num_rows($resAccount);
            
        if($checkAccount > 0){
            $row = mysqli_fetch_assoc($resAccount);
            $loggedinuid = mysqli_real_escape_string($connect, $row['uid']);
            $loggedinusername = mysqli_real_escape_string($connect, $row['username']);
            $loggedinfirstname = mysqli_real_escape_string($connect, $row['firstname']);
            $loggedinmiddlename = mysqli_real_escape_string($connect, $row['middlename']);
            $loggedinlastname = mysqli_real_escape_string($connect, $row['lastname']);
            $loggedindesignation = mysqli_real_escape_string($connect, $row['designation']);
                    
            $_SESSION['username'] = $row['username'];                    
            header('location: ../dashboard.php');                    
                
        }
        else{
            $msg = "Username and Password did not matched";
            header('location: ../index.php?errmsg='.$msg);
        }
        
    }
?>
