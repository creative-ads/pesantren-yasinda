<?php 
$host  = "localhost";
$user  = "root";
$pass  = "";
$db    = "yasinda";

$koneksi = mysqli_connect($host, $user, $pass, $db);
if (!$koneksi){
    die (" tidak konek");
}