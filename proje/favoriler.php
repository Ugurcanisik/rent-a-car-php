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
								<h3 style="color: white;">Favori Araçların</h3>
							</center>
							<br>
						</div>
						<?php 
						if(@$_GET['favsil']=="ok")
						{
							echo "<p>Favori Silme Başarılı</p>";
						}
						elseif(@$_GET['favsil']=="no")
						{
							echo "<p>HATA!!</p>";
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
											<th>Vites Tipi</th>
											<th>Yakıt Tipi</th>
											<th>KM</th>
											<th>Renk</th>
											<th>Favori Çıkart</th>
										</tr>
									</thead>

									<tbody>
										<?php 
										$favori=mysqli_query($conn,"select * from favoriler where f_k_id='".$_SESSION["k_id"]."'");
										$fav=array();
										$favid=array();
										while($favoriyaz=mysqli_fetch_assoc($favori))
										{
											array_push($fav, $favoriyaz['f_a_id']);
											array_push($favid, $favoriyaz['f_id']);
										}

										for($x=0; $x<count($fav); $x++)
										{
											$aracid=$fav[$x];
											$favoriarac=mysqli_query($conn,"select * from arabalar where a_id='$aracid'");
											$favoriaracyaz=mysqli_fetch_assoc($favoriarac);
											?>
											<tr>
												<td><?php echo $favoriaracyaz['plaka']; ?></td>
												<td><?php echo $favoriaracyaz['marka']; ?></td>
												<td><?php echo $favoriaracyaz['seri']; ?></td>
												<td><?php echo $favoriaracyaz['model']; ?></td>
												<td><?php echo $favoriaracyaz['vitestipi']; ?></td>
												<td><?php echo $favoriaracyaz['yakittipi']; ?></td>
												<td><?php echo $favoriaracyaz['km']; ?></td>
												<td><?php echo $favoriaracyaz['renk']; ?></td>
												<td style="width: 40px;"><a href="netting/islem.php?favorisil=<?php echo $favid[$x]; ?>"><button class="btn btn-danger">Favori Çıkart</button></td></a>
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