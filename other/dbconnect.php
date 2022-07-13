<?php

$dbservername = "localhost";
$dbusername = "unifastgov_lmpc";

$dbpassword = "7_d[MJB(#l8A";
$dbname = "unifastgov_ufdb";

$connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if(!$connect){
    die("Cant connect");
}

?>