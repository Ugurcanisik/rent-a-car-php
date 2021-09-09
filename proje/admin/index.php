<?php include 'header.php';
	  include 'sidebar.php';


if ($_SESSION["yetki"]==$yetkiadi[0]) 
{
    header("location:../index.php");
}

?> 



<div id="page-wrapper">
	<div id="page-inner">
		<div class="row">
			<div class="col-md-12">
				<h3 class="page-head-line">Buradan Sayfanızı Yönetebilirsiniz!</h3>
				<h1 class="page-subhead-line"><?php 

if(isset($_GET["yetki"]))
{
	echo "Yetkisiz Erişim İstediği";
}
else
{
	echo "Hoşgeldiniz ".$_SESSION["kullanici"];
}


				 ?></h1>

			</div>
		</div>






	</div>
</div>







<?php include 'footer.php' ?>