<?php include 'header.php';


if (!isset($_SESSION["kullanici"])) {

	header('location:index.php');

}


?>


<section class="banner-area relative" id="home">
	<div class="overlay overlay-bg"></div>	
	<div class="container">
		<div class="row fullscreen d-flex align-items-center justify-content-center">

			<div class="col-lg-12  col-md-6 header-right">

				<div class="col-md-12">

					<!--    Hover Rows  -->
					<div class="panel panel-default" style="color: white;">
						<div class="panel-heading">
							<center>
								<h3 style="color: white;">Kiraladığın Araçlar</h3>
							</center>
							<br>
						</div>
						<?php 
						if(@$_GET['kira']=="ok")
						{
							echo "<p>Kiralama Başarılı</p>";
						}
						else if(@$_GET['kira']=="no")
						{
							echo "<p>Kiralama Başarısız HATA!!</p>";
						}
						else if(@$_GET['guncelle']=="ok")
						{
							echo "<p>Süre Uzatma Başarılı</p>";
						}
						else if(@$_GET['guncelle']=="no")
						{
							echo "<p>Süre Uzatma HATALI!!!!!!!!!</p>";
						}
						elseif(@$_GET['teslim']=="ok")
						{
							echo "<p>Araç Teslim Talebiniz Alınmıştır!!!</p>";
						}
						elseif(@$_GET['teslim']=="no")
						{
							echo "<p> HATALI!!!!!!!!!</p>";
						}

						?>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th>Plaka</th>
											<th>Marka</th>
											<th>Seri</th>
											<th>Model</th>
											<th>Alis Tarihi</th>
											<th>Teslim Tarihi</th>
											<th>Toplam Gün</th>
											<th>Ücret</th>
											<th>Tarih Uzat</th>
											<th>Teslim Talep</th>

										</tr>
									</thead>

									<tbody>
										<?php 
										$kiraaraba=mysqli_query($conn,"select * from kiraarac where k_adi='".$_SESSION["kullanici"]."' and silindimi='0'");
										while ($kiraarabayaz=mysqli_fetch_assoc($kiraaraba)) { ?>
											<tr>
												<td><?php echo $kiraarabayaz['plaka']; ?></td>
												<td><?php echo $kiraarabayaz['marka']; ?></td>
												<td><?php echo $kiraarabayaz['seri']; ?></td>
												<td><?php echo $kiraarabayaz['model']; ?></td>
												<td><?php echo $kiraarabayaz['alistarihi']; ?></td>
												<td><?php echo $kiraarabayaz['teslimtarihi']; ?></td>
												<td><?php echo $kiraarabayaz['toplamgun']; ?></td>
												<td><?php echo $kiraarabayaz['toplamtutar']; ?></td>


												<td style="width: 40px;"><a href="aractarihuzat.php?kira_id=<?php echo $kiraarabayaz['kira_id']; ?>"><button class="btn btn-success">Tarih Uzat</button></td></a>



												<td style="width: 40px;"><a href="netting/islem.php?teslimtalep=<?php echo $kiraarabayaz['kira_id']; ?>"><button class="btn btn-danger">Teslim Talep</button></td></a>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>


					</div>

					<!-- End  Hover Rows  -->
				</div>

			</div>



		</div>
	</div>					
</section>
<?php include 'footer.php'; ?>