<?php

$vt_host       = "localhost";
$vt_kullanici  = "root";
$vt_sifre      = "";
$vt_adi        = "proje";

$conn = mysqli_connect($vt_host,$vt_kullanici,$vt_sifre,$vt_adi);
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Baglanti basarisiz: " . $conn->connect_error);
}



session_start();

?>