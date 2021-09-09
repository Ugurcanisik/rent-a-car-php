<?php include 'header.php' ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<div class="banner-content col-lg-7 col-md-6 ">
				<div class="col-lg-9  col-md-12 header-right" style="color: white;">
					<h4 class="text-white pb-30">Üyel Ol</h4>
					<?php 

					if (@$_GET['ekle']=="no") {
						echo "<p>Üye kaydı başarısız</p>";
					}
					else if(@$_GET['ekle']=="ok")
					{
						echo "<p>Üye Kaydı Başarılı</p>";
					}
					else if(@$_GET['k']=="no")
					{
						echo "<p>Kullanici Adi Sistemde Kayıtlı</p>";
					}

					?>
					<form  action="netting/islem.php" method="post">
						<div class="form-group">
							<div class="default-select" id="default-select">
								<input type="text" class="form-control txt-field" name="newkullaniciadi" placeholder="Kullanıcı Adınız " required="">
							</div>
						</div>

						<div class="form-group">  
							<input type="text" class="form-control txt-field" name="newkullaniciparola" placeholder="Şifreniz " required="">
						</div>	

						<div class="form-group row">
							<div class="col-md-12">
								<input type="submit" name="newkullanicigiris" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Üye Ol">
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-lg-5  col-md-6 header-right" style="color: white;">

				<h4 class="text-white pb-30">Giriş Yap</h4>

				<?php 

				if (@$_GET['giris']=="no") {
					echo "<p>Kullanıcı Adı veya Şifre Hatalı</p>";
				}
				elseif(@$_GET['yetki']=="ok")
				{
					echo "<p>Yetki Güncelleme Başarılı</p>";
				}
				?>

				<form  action="netting/islem.php" method="post">
					<div class="form-group">
						<div class="default-select" id="default-select">
							<input type="text" class="form-control txt-field" name="kullaniciadi" placeholder="Kullanıcı Adınız " required="">
						</div>
					</div>
					<div class="form-group">  
						<input type="text" class="form-control txt-field" name="kullaniciparola" placeholder="Şifreniz " required="">
					</div>					
					<div class="form-group row">
						<div class="col-md-12">
							<input type="submit" name="kullanicigiris" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Giriş">
						</div>
					</div>
				</form>
			</div>											
		</div>
	</div>					
</section>
<!-- End banner Area -->	
<?php include 'footer.php'; ?>