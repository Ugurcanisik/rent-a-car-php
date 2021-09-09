<?php include 'header.php' ?>
<!-- start banner Area -->
<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">
			<?php 


			if (!isset($_GET['kira_id'])) {

				header('location:kiraladıgınaraclar.php');

			}
			else
			{
				$kiraarac=mysqli_query($conn,"select * from kiraarac where kira_id='$_GET[kira_id]'");
				$kiraaraccek=mysqli_fetch_assoc($kiraarac);

				$aracplaka=$kiraaraccek['plaka'];

				$arac=mysqli_query($conn,"select * from arabalar where plaka='$aracplaka'");
				$araccek=mysqli_fetch_assoc($arac);
			}


			

			?>


			<div class="banner-content col-lg-7 col-md-6 ">
				<div class="col-lg-9  col-md-12 header-right">
					<form  action="netting/islem.php" method="post">
						<input type="hidden" name="kira_id" value="<?php echo $_GET['kira_id'] ?>">
						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Plaka
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['plaka'] ?>" disabled>
								<input type="hidden" name="plaka" value="<?php echo $kiraaraccek['plaka'] ?>">
								

							</div>
							<div class="col-md-6 wrap-right">
								Marka
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['marka'] ?>" disabled>
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Seri
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['seri'] ?>" disabled>
								
								
							</div>
							<div class="col-md-6 wrap-right">
								Model
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['model'] ?>" disabled>
								
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Kira Şekli
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['kirasekli'] ?>" disabled>
								
							</div>
							<div class="col-md-6 wrap-right">
								Tutar
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['tutar'] ?>" disabled>
								
							</div>
						</div>

						<div class="form-group row">
							<div class="col-md-6 wrap-left">
								Toplam Gun
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['toplamgun'] ?>" disabled>
								
							</div>
							<div class="col-md-6 wrap-right">
								Toplam Tutar
								<input type="text" name="" class="form-control" value="<?php echo $kiraaraccek['toplamtutar'] ?>" disabled>
								
							</div>
						</div>
					</div>
				</div>


				<div class="col-lg-5  col-md-6 header-right">
					<h4 class="text-white pb-30">Kiralama Bilgileri</h4>
					
					<?php 

					if(@$_GET['kraskl']=="no")
					{
						echo "<p>Lütfen Kiralama Şeklini Seçiniz!!</p>";
					}
					else if(@$_GET['tarih']=="no")
					{
						echo "<p>Teslim Tarihi Alış Tarihinden Önce olamaz</p>";
					}
					



					?>

					<div class="form-group">  
						
					</div>	


					<div class="form-group row">
						<div class="col-md-6 wrap-left">
							<div class="input-group dates-wrap">                                              
								<input id="datepicker2" class="dates form-control" id="exampleAmount"  type="text" name="alistarihi" required="" value="<?php echo $kiraaraccek['alistarihi'] ?>" disabled>                        
								<div class="input-group-prepend">
									<input type="hidden" name="alistarihi" value="<?php echo $kiraaraccek['alistarihi'] ?>" >
									<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
								</div>											
							</div>
						</div>
						<div class="col-md-6 wrap-right">
							<div class="input-group dates-wrap">                                          
								<input id="datepicker" class="dates form-control" id="exampleAmount" type="text" name="teslimtarihi" required="" value="<?php echo $kiraaraccek['teslimtarihi'] ?>">                        
								<div class="input-group-prepend">
									<span  class="input-group-text"><span class="lnr lnr-calendar-full"></span></span>
								</div>											
							</div>
						</div>
					</div>



					<div class="form-group row">
						<div class="col-md-12">
							<input type="submit" name="aractarihguncelle" class="btn btn-default btn-lg btn-block text-center text-uppercase" value="Güncelle">
						</div>
					</div>




				</form>
			</div>	




		</div>
	</div>					
</section>
<!-- End banner Area -->	
<?php include 'footer.php'; ?>