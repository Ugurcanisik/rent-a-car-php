<?php include 'header.php' ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">	
	<div class="overlay overlay-bg"></div>
	<div class="container">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<h1 class="text-white">
					Arabalar			
				</h1>	
				<p class="text-white link-nav"><a href="index.php">Anasayfa </a>  <span class="lnr lnr-arrow-right"></span>  <a href="arabalar.php"> Arabalar</a></p>
			</div>											
		</div>
	</div>
</section>
<!-- End banner Area -->	

<!-- Start model Area -->
<section class="model-area section-gap" id="cars">
	<div class="container">
		<div class="row d-flex justify-content-center pb-40">
			<div class="col-md-8 pb-40 header-text">
				<h1 class="text-center pb-10">İstediğiniz Arabayı Kirayabilirsiniz</h1>
				<div class="form-group">
					<!--<p class="text-center"><input type="text" width="40px" name="arama" class="form-control txt-field"></p>-->
				</div>
			</div>
		</div>

		<?php 

		$arababak=mysqli_query($conn,"select * from arabalar where durum='Musait' and silindimi='0' order by a_sira desc ");

		if(mysqli_num_rows($arababak)==1)
		{
			$ara=mysqli_fetch_assoc($arababak);
			?>
			<div class="row align-items-center single-model item">
				<div class="col-lg-6 model-left">
					<div class="title justify-content-between d-flex">
						<h4 class="mt-20"><?php echo $ara['marka']." ".$ara['seri']." ".$ara['model']; ?></h4>
						<h2><?php echo $ara['gunluk']." "."TL"; ?><span>/Günlük</span></h2>
					</div>
					<p>
						<?php echo $ara['aciklama']; ?>
					</p>
					<p>
						Plaka             : <?php echo $ara['plaka']; ?> <br>
						Vites Tipi        : <?php echo $ara['vitestipi']; ?> <br>
						Yakıt Tipi        : <?php echo $ara['yakittipi']; ?> <br>
						KM                : <?php echo $ara['km']; ?> <br>
						Renk              : <?php echo $ara['renk']; ?> <br>
						Haftalık          : <?php echo $ara['haftalik']; ?> <br>
						Aylık             : <?php echo $ara['aylik']; ?> 
					</p>
					<a class="text-uppercase primary-btn" href="arackirala.php?plaka=<?php echo $ara['plaka'] ?>">Şimdi Kirala</a>
					<?php 

					if(!isset($_SESSION["kullanici"]))
					{

					}
					else
					{
						$favkid=$_SESSION["k_id"];
						$favaid=$ara['a_id'];

						$favorikontrol=mysqli_query($conn,"select * from favoriler where f_k_id='$favkid' and f_a_id='$favaid'");

						if (mysqli_num_rows($favorikontrol)>0) 
						{ 

							echo "<a class='btn btn-succes' disabled>Favorilerinizde Ekli</a>";

						}
						else
							{?>

								<a class="btn btn-succes" href="netting/islem.php?favekle=<?php echo $arabaal['a_id']; ?>">Favorilerime Ekle</a>
								<?php
							}
						}

						?>

					</div>
					<div class="col-lg-6 model-right">
						<img class="img-fluid" width="945px" height="650px" src="<?php echo $ara['resim'] ?>" alt="">
					</div>
				</div>	


				<?php
			}
			else if(mysqli_num_rows($arababak)>1)
			{ 
				?>
				<div class="active-model-carusel">
					<?php 

					while ($arabaal=mysqli_fetch_assoc($arababak)) { ?>


						<div class="row align-items-center single-model item">
							<div class="col-lg-6 model-left">
								<div class="title justify-content-between d-flex">
									<h4 class="mt-20"><?php echo $arabaal['marka']." ".$arabaal['seri']." ".$arabaal['model']; ?></h4>
									<h2><?php echo $arabaal['gunluk']." "."TL"; ?><span>/Günlük</span></h2>
								</div>
								<p>
									<?php echo $arabaal['aciklama']; ?>
								</p>
								<p>
									Plaka             : <?php echo $arabaal['plaka']; ?> <br>
									Vites Tipi        : <?php echo $arabaal['vitestipi']; ?> <br>
									Yakıt Tipi        : <?php echo $arabaal['yakittipi']; ?> <br>
									KM                : <?php echo $arabaal['km']; ?> <br>
									Renk              : <?php echo $arabaal['renk']; ?> <br>
									Haftalık          : <?php echo $arabaal['haftalik']; ?> <br>
									Aylık             : <?php echo $arabaal['aylik']; ?> 
								</p>
								<a class="text-uppercase primary-btn" href="arackirala.php?plaka=<?php echo $arabaal['plaka'] ?>">Şimdi Kirala</a>

								<?php 

								if(!isset($_SESSION["kullanici"]))
								{

								}
								else
								{
									$favkid=$_SESSION["k_id"];
									$favaid=$arabaal['a_id'];

									$favorikontrol=mysqli_query($conn,"select * from favoriler where f_k_id='$favkid' and f_a_id='$favaid'");

									if (mysqli_num_rows($favorikontrol)>0) 
									{ 

										echo "<a class='btn btn-succes' disabled>Favorilerinizde Ekli</a>";

									}
									else
										{?>

											<a class="btn btn-succes" href="netting/islem.php?favekle=<?php echo $arabaal['a_id']; ?>">Favorilerime Ekle</a>
											<?php
										}
									}

									?>
								</div>
								<div class="col-lg-6 model-right">
									<img class="img-fluid"  width="945px" height="650px" src="<?php echo $arabaal['resim'] ?>" alt="">
								</div>
							</div>	


							<?php
						}

						?>


					</div>



					<?php
				}

				?>

			</div>	
		</section>
		<!-- End model Area -->			



		<?php include 'footer.php' ?>