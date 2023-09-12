<?php

$dbservername = "localhost";
$dbusername = "unifastgov_ufdb";

$dbpassword = "dJTBrFKM4aazRszR";
$dbname = "unifastgov_ufdb";

$connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if(!$connect){
    die("Cant connect");
}

?>