<?php 

include 'header.php';
include 'sidebar.php';


if ($_SESSION["yetki"]!=$yetkiadi[1] && $_SESSION["yetki"]!=$yetkiadi[2] ) 
{
	header("location: index.php?yetki=yetkisiz erişim");
}

?>



<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-head-line">Web Sitenizin Ayarlarını Buradan Değiştirebilirsiniz!</h1>
				<?php 
				if(@$_GET['guncelle']=="ok")
				{
					echo "<h1 class='page-subhead-line'>güncelleme başarılı</h1>";
				}
				else if(@$_GET['guncelle']=="no")
				{
					echo "<h1 class='page-subhead-line'>güncelleme başarısız</h1>";
				}
				else if(@$_GET['boyut']=="yuksek")
				{
					echo "<h1 class='page-subhead-line'>Logonun Boyutu yüksek</h1>";
				}
				else if(@$_GET['dosya']=="no")
				{
					echo "<h1 class='page-subhead-line'>Yanlızca jpg ve png uzantılı dosyalar</h1>";
				}
				else
				{
					echo "<h1 class='page-subhead-line'>Açıklama Paneli</h1>";
				}
				?>

				<form action="../netting/islem.php" method="post" enctype="multipart/form-data">

					<div class="col-md-12">
						<div class="form-group col-md-12">
							<label class="control-label col-lg-4">Logo</label>
							<img witdh=250px; height=90px; src="<?php echo "../".$ayargetir['ayar_logo'] ?>">
							<div class="">
								<div class="fileupload fileupload-new" data-provides="fileupload">

									<span class="btn btn-file btn-default">
										<span class="fileupload-new">Resim Seç</span>
										<span class="fileupload-exists">Değiştir</span>
										<input type="file" name="logo">
									</span>
									<span class="fileupload-preview"></span>
									<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-12">                 
						<div class="form-group col-md-12">
							<label>Sayfa Başlığı</label>
							<input name="ayar_title" class="form-control" required="" type="text" value="<?php echo $ayargetir['ayar_title'] ?>">
						</div>                 
						<div class="form-group col-md-12">
							<label>Sayfa Açıklaması</label>
							<input class="form-control" type="text" name="ayar_aciklama" required="" value="<?php echo $ayargetir['ayar_aciklama'] ?>" >

						</div>
					</div>
					<div class="col-md-12">                 
						<div class="form-group col-md-3">
							<label>Telefon Numarası</label>
							<input class="form-control" type="text"  name="ayar_telefon" required="" value="<?php echo $ayargetir['ayar_telefon'] ?>">

						</div>
						<div class="form-group col-md-3">
							<label>Anahtar Kelimeler</label>
							<input class="form-control" type="text" name="ayar_keyword" required="" value="<?php echo $ayargetir['ayar_keyword'] ?>">

						</div>
						<div class="form-group col-md-3">
							<label>Facebook</label>
							<input class="form-control" type="text" name="ayar_face" required="" value="<?php echo $ayargetir['ayar_face'] ?>">

						</div>
						<div class="form-group col-md-3">
							<label>Twitter</label> 
							<input class="form-control" type="text" name="ayar_twitter" required=""  value="<?php echo $ayargetir['ayar_twitter'] ?>">

						</div>
					</div>   
					<div class="col-md-12">                       
						<div class="form-group col-md-12">
							<label>Footer</label>
							<input class="form-control" type="text" name="ayar_footer" required="" value="<?php echo $ayargetir['ayar_footer'] ?>">

						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group col-md-6">
							<label>Adres</label>
							<input class="form-control" type="text" name="ayar_adres" required="" value="<?php echo $ayargetir['ayar_adres'] ?>">
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input class="form-control" type="text" name="ayar_mail" required="" value="<?php echo $ayargetir['ayar_mail'] ?>">

						</div>
					</div>
					<div class="col-md-12">

						<div class="form-group col-md-12">
							<label>Hakkımızda</label>
							<textarea name="hakkimizda" class="ckeditor"><?php echo $ayargetir['hakkimizda']; ?></textarea>
						</div>

					</div>
					<div class="col-md-12">
						<div class="form-group col-md-12">
							<input type="submit" class="btn btn-success"  name="ayarguncele" value="Güncelle">
						</div>  
					</div>

				</form>

				

			</div>
		</div>
	</div>
</div>












<?php include 'footer.php' ?>