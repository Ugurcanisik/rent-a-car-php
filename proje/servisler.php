<?php include 'header.php' ?>


<!-- start banner Area -->
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Servisler			
				</h1>	
				<p class="text-white link-nav"><a href="index.php">Anasayfa </a>  <span class="lnr lnr-arrow-right"></span>  <a href="servisler.php"> Servisler</a></p>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	

<!-- Start feature Area -->
<section class="feature-area section-gap" id="service">
	<div class="container">
		<div class="row d-flex justify-content-center">
			<div class="col-md-8 pb-40 header-text">
				<h1>Müşterilerimize Hangi Hizmetleri Sunuyoruz</h1>
			</div>
		</div>
		<div class="row">

			<?php 
			$servis=mysqli_query($conn,"select s_baslik,s_icerik,s_sira from servisler  order by s_sira ASC ");

			while ($serviscek=mysqli_fetch_assoc($servis)) { ?>

				<div class="col-lg-4 col-md-6">
					<div class="single-feature">
						<h4><?php echo $serviscek['s_baslik'] ?></h4>
						<p><?php echo $serviscek['s_icerik']; ?></p>
					</div>
				</div>
				<?php	
			}
			?>






		</div>
	</div>	
</section>
<!-- End feature Area -->				


<?php include 'footer.php' ?>