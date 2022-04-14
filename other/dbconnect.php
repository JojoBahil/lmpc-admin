<?php

$dbservername = "localhost";
$dbusername = "root";

$dbpassword = "20unifast19TES";
$dbname = "unifastg_ufdb";

$connect = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);

if(!$connect){
    die("Cant connect");
}

?>