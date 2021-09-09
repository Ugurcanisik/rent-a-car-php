<?php include 'header.php' ?>
			<!-- start banner Area -->
			<section class="banner-area relative" id="home">	
				<div class="overlay overlay-bg"></div>
				<div class="container">
					<div class="row d-flex align-items-center justify-content-center">
						<div class="about-content col-lg-12">
							<h1 class="text-white">
								Hakımızda				
							</h1>	
							<p class="text-white link-nav"><a href="index.php">Anasayfa </a>  <span class="lnr lnr-arrow-right"></span>  <a href="hakkimizda.php"> Hakımızda</a></p>
						</div>											
					</div>
				</div>
			</section>
			<!-- End banner Area -->	

			<!-- Start home-about Area -->
			<section class="home-about-area" id="about">
				<div class="container-fluid">				
					<div class="row justify-content-center align-items-center">
						<div class="col-lg-6 no-padding home-about-left">
							<img class="img-fluid" src="img/about-img.jpg" alt="">
						</div>
						<div class="col-lg-6 no-padding home-about-right">
							<h1>***** Araç Kiralama Nedir</h1><br>

							<p><?php echo $ayargetir['hakkimizda'] ?></p>
							
						</div>
					</div>
				</div>	
			</section>
			<!-- End home-about Area -->	

	<?php include 'footer.php' ?>