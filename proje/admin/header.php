<?php 

require_once '../netting/baglan.php';

$ayarlar=mysqli_query($conn,"select * from ayarlar");
$ayargetir=mysqli_fetch_assoc($ayarlar);

date_default_timezone_set('Europe/Istanbul');

if(!isset($_SESSION['kullanici']))
{
    header("location: ../login.php");
}



 ?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    
       <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-fileupload.min.css">
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Şirket Adı</a>
            </div>

            <div class="header-right">

                 <a href="../index.php" class="btn btn-info" ><i class="fa fa-home">Anasayfa</i></a>
                <a href="../logout.php" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa"></i>Güvenli Çıkış</a>


            </div>
        </nav>