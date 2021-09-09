<?php 

session_start();
session_destroy();

$gelen=@$_GET['yetki'];


header("location: login.php?yetki=$gelen");


 ?>