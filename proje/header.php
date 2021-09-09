	
<?php

require_once 'netting/baglan.php';

$ayarlar=mysqli_query($conn,"select * from ayarlar");
$ayargetir=mysqli_fetch_assoc($ayarlar);


?>

<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>

	<meta charset="UTF-8">
	<meta name="description" content="<?php echo $ayargetir['ayar_aciklama'] ?>">
	<meta name="keywords" content="<?php echo $ayargetir['ayar_keyword'] ?>">
	<meta name="author" content="Theodore IV">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon-->
	<link rel="shortcut icon" href="img/fav.png">
	<!-- Author Meta -->
	<meta name="author" content="codepixer">
	<!-- Meta Description -->
	<meta name="description" content="">
	<!-- Meta Keyword -->
	<meta name="keywords" content="">
	<!-- meta character set -->
	<meta charset="UTF-8">
	<!-- Site Title -->
	<title><?php echo $ayargetir['ayar_title']; ?></title>

	<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">			
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			<header id="header" id="home">
				<div class="container">
					<div class="row align-items-center justify-content-between d-flex">
						<div id="logo">
							<a href="index.php"><img width="192px" height="30px" src="<?php echo $ayargetir['ayar_logo'] ?>"  alt="Logo" title="" /></a>
						</div>
						<nav id="nav-menu-container">
							<ul class="nav-menu">

								<?php 

								$menu=mysqli_query($conn,"select * from menuler order by m_sira asc");

								while ($menugetir=mysqli_fetch_assoc($menu)) { ?>

									<li><a href="<?php echo $menugetir['m_yol'] ?>"><?php echo $menugetir['m_adi'] ?></a></li>
									<?php	
								}
								?>
								<?php 
								if (isset($_SESSION['kullanici'])) {
									?>	
									<li class="menu-has-children"><a href=""><?php echo $_SESSION['kullanici']; ?></a>
										<ul>
											<li><a href="bilgiguncelle.php">Kişisel Veriler</a></li>
											<li><a href="kiraladıgınaraclar.php">Kiraladığın Araçlar</a></li>
											<li><a href="favoriler.php">Favorileri Araçların</a></li>		
											<?php 
											$yetki=mysqli_query($conn,"select k_id,k_adi,k_parola,k_yonetici_tip from kullanici where k_adi='".$_SESSION["kullanici"]."'");
											$yetkial=mysqli_fetch_assoc($yetki);

											if($yetkial['k_yonetici_tip']==0){

											}
											else 
											{
												echo "<li><a href='admin/index.php' target='_blank'>Sayfayı Yönet</a></li>";
											}
											?>
											
											<li><a href="logout.php">Çıkış</a></li>
										</ul>
									</li> 
									<?php 
								}
								else 
								{
									echo "<li><a href='login.php'>Üye Ol/Giriş</a></li> ";
								}
								?>	


							</ul>
						</nav><!-- #nav-menu-container -->		    		
					</div>
				</div>

			  </header><!-- #header -->

			  