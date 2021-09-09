
<?php include 'header.php';

if (!isset($_SESSION["kullanici"])) {

	header('location:index.php');

}

?>

<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<div class="col-lg-5  col-md-6 header-right">
				<h4 class="text-white pb-30">Kişisel Bilgileriniz!</h4>
				<?php 

				if(isset($_GET['veri'])=="no")
				{
					echo "<p>Bilgieriniz Aynı değişiklik yapınız</p>";
				}
				else if(@$_GET['guncelle']=="no")
				{
					echo "<p>hata</p>";
				}
				else if(@$_GET['guncelle']=="ok")
				{
					echo "<p>Güncelleme Başarılı</p>";
				}


				?>
				<form action="netting/islem.php" method="post">
					<div class="form-group">
						<div class="default-select" id="default-select">
							<input type="text" class="form-control" name="kullaniciadi" value="<?php echo $yetkial['k_adi'] ?>"> 
						</div>
					</div>

					<div class="from-group">
						<input class="form-control txt-field" type="text" name="kullaniciparola" value="<?php echo $yetkial['k_parola'] ?>" >

					</div>
					<div class="form-group row">
						<div class="col-md-12">
							<input type="submit" name="kguncelle" value="Güncelle" class="btn btn-default btn-lg btn-block text-center text-uppercase">
							<input type="hidden" name="k_id" value="<?php echo $yetkial['k_id'] ?>">
						</div>
					</div>
				</form>
			</div>											
		</div>
	</div>					
</section>
<!-- End banner Area -->	




<?php include 'footer.php'; ?>




