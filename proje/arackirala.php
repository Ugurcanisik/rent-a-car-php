<?php include 'header.php' ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<?php 


			if (!isset($_GET['plaka']) || !isset($_SESSION["kullanici"])) {

				header('location:arabalar.php');

			}
			else
			{
				$arac=mysqli_query($conn,"select * from arabalar where plaka='$_GET[plaka]'");
				$araccek=mysqli_fetch_assoc($arac);
			}


			?>


			<div class="banner-content col-lg-7 col-md-6 " style="color: white;">
				<div class="col-lg-9  col-md-12 header-right">
					<form  action="netting/islem.php" method="post">

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Plaka
								<input type="text" name="" class="form-control" value="<?php echo $araccek['plaka'] ?>" disabled>
								<input type="hidden" name="plaka" value="<?php echo $araccek['plaka'] ?>">

							</div>
							<div class="col-md-6 wrap-right">
								Marka
								<input type="text" name="" class="form-control" value="<?php echo $araccek['marka'] ?>" disabled>
								<input type="hidden" name="marka" value="<?php echo $araccek['marka'] ?>">
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Seri
								<input type="text" name="" class="form-control" value="<?php echo $araccek['seri'] ?>" disabled>
								<input type="hidden" name="seri" value="<?php echo $araccek['seri'] ?>">
								
							</div>
							<div class="col-md-6 wrap-right">
								Model
								<input type="text" name="" class="form-control" value="<?php echo $araccek['model'] ?>" disabled>
								<input type="hidden" name="model" value="<?php echo $araccek['model'] ?>">
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Vites Tipi
								<input type="text" name="" class="form-control" value="<?php echo $araccek['vitestipi'] ?>" disabled>
								
							</div>
							<div class="col-md-6 wrap-right">
								Yakit Tipi
								<input type="text" name="" class="form-control" value="<?php echo $araccek['yakittipi'] ?>" disabled>
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Renk
								<input type="text" name="" class="form-control" value="<?php echo $araccek['renk'] ?>" disabled>
								
							</div>
							<div class="col-md-6 wrap-right">
								Gunluk
								<input type="text" name="" class="form-control" value="<?php echo $araccek['gunluk'] ?>" disabled>

								<input type="hidden" name="gunluk" value="<?php echo $araccek['gunluk'] ?>">
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Haftalık
								<input type="text" name="" class="form-control" value="<?php echo $araccek['haftalik'] ?>" disabled>
								<input type="hidden" name="haftalik" value="<?php echo $araccek['haftalik'] ?>">
							</div>
							<div class="col-md-6 wrap-right">
								Aylık
								<input type="text" name="" class="form-control" value="<?php echo $araccek['aylik'] ?>" disabled>
								<input type="hidden" name="aylik" value="<?php echo $araccek['aylik'] ?>">
							</div>
						</div>

						
					</div>
				</div>


				<div class="col-lg-5  col-md-6 header-right" style="color: white;">
					<h4 class="text-white pb-30" >Kiralama Bilgileri</h4>
					
					<?php 

					if(@$_GET['kraskl']=="no")
					{
						echo "<p>Lütfen Kiralama Şeklini Seçiniz!!</p>";
					}
					else if(@$_GET['tarih']=="no")
					{
						echo "<p>Teslim Tarihi Alış Tarihinden Önce olamaz</p>";
					}
					else
					{
						echo "<p>Tarihleri AY/GÜN/YIL şeklinde Seçiniz</p>";
					}

					?>

					
					<div class="form-group row">
						<div class="col-md-6 wrap-left">
							<div class="input-group dates-wrap">                                              
								<input id="datepicker2" class="dates form-control" id="exampleAmount" placeholder="Alış Tarihi" type="text" name="alistarihi" required="">                        
								<div class="input-group-prepend">
									<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
								</div>											
							</div>
						</div>
						<div class="col-md-6 wrap-right">
							<div class="input-group dates-wrap">                                          
								<input id="datepicker" class="dates form-control" id="exampleAmount" placeholder="Teslim Harihi" type="text" name="teslimtarihi" required="">                        
								<div class="input-group-prepend">
									<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
								</div>											
							</div>
						</div>
					</div>


					
					<div class="form-group row">
						<div class="col-md-12">
							<input type="submit" name="arackirala" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Kirala">
						</div>
					</div>




				</form>
			</div>	




		</div>
	</div>					
</section>
<!-- End banner Area -->	
<?php include 'footer.php'; ?>