<?php 

require_once 'baglan.php';
date_default_timezone_set('Etc/GMT-3');

if (isset($_POST['yukle'])) 
{
	$dosyaadi=$_FILES['aracyukle']["name"];
	if($dosyaadi!="")
	{
		$boyut=$_FILES['aracyukle']['size'];
		if($boyut>1024*1024*2)
		{
			header("location: ../admin/aracyukle.php?boyut=no");
		}
		else
		{
			$uzanti=explode('.',$dosyaadi); //// resim1.res.jpg  /// jpg:2. eleman /// uzunluk:3
			$uzanti=$uzanti[count($uzanti)-1];  ///uzanti bu satır çalıştığında artık değişken
			if($uzanti=="csv")
			{
				$dosyayolu=$_FILES['aracyukle']["tmp_name"];
				if(($dosya=fopen($dosyayolu, "r"))!=false)
				{
					while(($veri=fgetcsv($dosya,1000,","))!=false)
					{
						$plaka=$veri[0];
						$marka=$veri[1];
						$seri=$veri[2];
						$model=$veri[3];
						$vitestipi=$veri[4];
						$yakittipi=$veri[5];
						$km=$veri[6];
						$renk=$veri[7];
						$gunluk=$veri[8];
						$haftalik=$veri[9];
						$aylik=$veri[10];



						if($plaka=="plaka" && $marka=="marka" && $seri=="seri" && $model=="model" && $vitestipi=="vitestipi" && $yakittipi=="yakittipi" && $km=="km" && $renk=="renk" && $gunluk=="gunluk" && $haftalik=="haftalik" && $aylik=="aylik")
						{

						}
						else
						{
							//echo $plaka."<br>".$marka."<br>".$seri."<br>".$model."<br>".$vitestipi."<br>".$yakittipi."<br>".$km."<br>".$renk."<br>".$gunluk."<br>".$haftalik."<br>".$aylik;



							
							$sql=mysqli_query($conn,"select * from arabalar where plaka='$plaka'");

							if(mysqli_num_rows($sql)>0)
							{
								
								
							}
							else
							{
								
								$arcekl=mysqli_query($conn,"insert into arabalar (plaka,marka,seri,model,vitestipi,yakittipi,km,renk,gunluk,haftalik,aylik) values ('".$plaka."','".$marka."','".$seri."','".$model."','".$vitestipi."','".$yakittipi."','".$km."','".$renk."','".$gunluk."','".$haftalik."','".$aylik."')");

							}
						}

					}


					if(mysqli_affected_rows($sql2))
					{
						header("location: ../admin/aracyukle.php?ykl=no");

					}
					else
					{
						header("location: ../admin/aracyukle.php?ykl=ok");
					}	



				}
				fclose($dosya);
			}
			else
			{
				header("location: ../admin/aracyukle.php?uzantı=no");
			}
		}
	}
	else
	{
		header("location: ../admin/aracyukle.php?dosya=no");
	}
	
}



if (isset($_GET['favorisil'])) 
{
	$favid=$_GET['favorisil'];

	$sorgu18=mysqli_query($conn,"delete from favoriler where f_id='$favid'");

	if(mysqli_affected_rows())
	{
		header("location:../favoriler.php?favsil=no");

	}
	else
	{
		header("location:../favoriler.php?favsil=ok");
	}	

}


if (isset($_GET['favekle'])) {


	$favid=$_GET['favekle']; // favori arac id si
	$kid=$_SESSION["k_id"]; // kullanici id 


	$sorgu17=mysqli_query($conn,"insert into favoriler (f_k_id,f_a_id) values ('$kid','$favid')");


	if(mysqli_affected_rows())
	{
		header("location:../arabalar.php");

	}
	else
	{
		header("location:../arabalar.php");
	}	

}


if (isset($_POST['raporexcel'])) 
{
	$altay=$_POST['altay'];
	$ustay=$_POST['ustay'];

	//mb_convert_encoding("Toplam Gün", "iso-8859-9", "UTF-8");
	$gun=date('d.m.Y H:i:s');
	header("Content-Type: application/vnd.ms-excel");
	header("Content-disposition: attachment; filename=$gun.xls");

	echo 'Kiralayan'."\t".'Plaka'."\t".'Marka'."\t".'Seri'."\t".'Model'."\t".mb_convert_encoding("Kiralama Şekli", "iso-8859-9", "UTF-8")."\t".'Tutar'."\t".'Alis Tarihi'."\t".'Teslim Tarihi'."\t".mb_convert_encoding("Toplam Gün", "iso-8859-9", "UTF-8")."\t".'Toplam Tutar'."\n";


	$araba=mysqli_query($conn,"select * from kiraarac where ay between $altay and $ustay and silindimi='1'");
	


	while ($cek=mysqli_fetch_assoc($araba)) 
	{
		echo $cek['k_adi']."\t".$cek['plaka']."\t".$cek['marka']."\t".$cek['seri']."\t".$cek['model']."\t".mb_convert_encoding($cek['kirasekli'], "iso-8859-9","UTF-8")."\t".$cek['tutar']."\t".$cek['alistarihi']."\t".$cek['teslimtarihi']."\t".$cek['toplamgun']."\t".$cek['toplamtutar']."\n";
	}


}





if (isset($_POST['rapor'])) 
{
	//echo $_POST['altay']."<br>".$_POST['ustay'];

	if($_POST['altay']=="0" || $_POST['ustay']=="0")
	{
		header("location:../admin/rapor.php?tarih=no");
	}
	else
	{
		$altay=$_POST['altay'];
		$ustay=$_POST['ustay'];

		if($altay>$ustay)
		{
			header("location:../admin/rapor.php?altay=no");
		}
		else
		{
			header("location:../admin/raporlistele.php?altay=$altay&ustay=$ustay");
		}
	}
}




if(isset($_GET['teslimtalep']))
{
	$kia=$_GET['teslimtalep'];

	echo $kia;
	
	$sorgu15=mysqli_query($conn,"update kiraarac set teslim='1' where kira_id='$kia'");



	if(mysqli_affected_rows())
	{
		header("location:../kiraladıgınaraclar.php?teslim=no");

	}
	else
	{
		header("location:../kiraladıgınaraclar.php?teslim=ok");
	}	

}



if(isset($_POST['aractarihguncelle']))
{
	//echo $_POST['kira_id']."<br>".$_POST['alistarihi']."<br>".$_POST['teslimtarihi']."<br>".$_POST['kiralamasekli'];


	$gun=substr($_POST['alistarihi'],0,2);
	$ay=substr($_POST['alistarihi'],3,2);
	$yıl=substr($_POST['alistarihi'],6,9);


	$gun2=substr($_POST['teslimtarihi'],3,2);
	$ay2=substr($_POST['teslimtarihi'],0,2);
	$yıl2=substr($_POST['teslimtarihi'],6,9);
	$teslimtarihi=$gun2."/".$ay2."/".$yıl2;



	$sorgu14=mysqli_query($conn,"select * from arabalar where plaka='".$_POST['plaka']."'");
	$sorgu14cek=mysqli_fetch_assoc($sorgu14);


	if($ay2<$ay)
	{
		header("location: ../aractarihuzat.php?tarih=no&plaka=".$_POST[plaka]."&kira_id=".$_POST[kira_id]."");
	}
	elseif($ay2==$ay)
	{
		$yenigun=$gun2-$gun;

		if($yenigun<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$sorgu14cek['gunluk'];
		}
		if($yenigun<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$sorgu14cek['haftalik'];
		}
		if($yenigun>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$sorgu14cek['aylik'];
		}

		$toplamtutar=$yenigun*$kiralamatutari;


		$sorgu15=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$teslimtarihi."',toplamgun='".$yenigun."',toplamtutar='".$toplamtutar."' where kira_id='".$_POST['kira_id']."'");



		if(mysqli_affected_rows())
		{
			header("location:../kiraladıgınaraclar.php?guncelle=no");

		}
		else
		{
			header("location:../kiraladıgınaraclar.php?guncelle=ok");
		}	





	}
	elseif($ay2>$ay)
	{
		$yenigun=$gun2-$gun+30;

		if($yenigun<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$sorgu14cek['gunluk'];
		}
		if($yenigun<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$sorgu14cek['haftalik'];
		}
		if($yenigun>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$sorgu14cek['aylik'];
		}

		$toplamtutar=$yenigun*$kiralamatutari;

		$sorgu15=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$teslimtarihi."',toplamgun='".$yenigun."',toplamtutar='".$toplamtutar."' where kira_id='".$_POST['kira_id']."'");



		if(mysqli_affected_rows())
		{
			header("location:../aractarihuzat.php?guncelle=no");

		}
		else
		{
			header("location:../aractarihuzat.php?guncelle=ok");
		}	



	}
}



if(isset($_GET['teslimal']))
{
	$akid=$_GET['teslimal']; // kirada ki aracın id si

	$sorgu11=mysqli_query($conn,"select * from kiraarac where kira_id='$akid'");
	$sorgu11getir=mysqli_fetch_assoc($sorgu11);

	$plkm=$sorgu11getir['plaka'];

	$sorgu14=mysqli_query($conn,"select * from arabalar where plaka='$plkm'");
	$sorgu14cek=mysqli_fetch_assoc($sorgu14);

	$teslimplaka=$sorgu11getir['plaka'];
	$alisgun=substr($sorgu11getir['alistarihi'],0,2);
	$alisay=substr($sorgu11getir['alistarihi'],3,2);

	$bugun=date('d/m/Y');
	$teslimgun=substr($bugun,0,2);
	$teslimay=substr($bugun,3,2);


	//echo "alisgünü ".$alisgun."<br>"."alisayi". $alisay."<br>"."bugun".$bugun."<br>"."teslim gün".$teslimgun."<br>"."teslim ay".$teslimay;



	if($teslimay==$alisay)
	{
		 $gunfarki=$teslimgun-$alisgun; // kaç gün kiraladığı!!


		 if($gunfarki<7)
		 {
		 	$kiralamasekli="Günlük";
		 	$kiralamatutari=$sorgu14cek['gunluk'];
		 }
		 if($gunfarki>7 && $gunfarki<30)
		 {
		 	$kiralamasekli="Haftalık";
		 	$kiralamatutari=$sorgu14cek['haftalik'];
		 }
		 if($gunfarki>30)
		 {
		 	$kiralamasekli="Aylık";
		 	$kiralamatutari=$sorgu14cek['aylik'];
		 }

		$tplmtutar=$gunfarki*$kiralamatutari;  // kiraladığı gün kadar ki ücreti!!


		
		$sorgu12=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$bugun."',ay='".$teslimay."',toplamgun='".$gunfarki."',toplamtutar='".$tplmtutar."',silindimi='1' where kira_id='".$akid."'");

		if(mysqli_affected_rows())
		{
			header("location:../admin/kiralananaraclar.php?teslm=no");

		}
		else
		{
			$sorgu13=mysqli_query($conn,"update arabalar set durum='Musait' where plaka='".$teslimplaka."'");
			header("location:../admin/kiralananaraclar.php?teslm=ok");
		}

	}
	elseif($teslimay>$alisay)
	{
		$gunfarki=$teslimgun-$alisgun+30; // kaç gün kiraladığı!!

		if($gunfarki<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$sorgu14cek['gunluk'];
		}
		if($gunfarki>7 && $gunfarki<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$sorgu14cek['haftalik'];
		}
		if($gunfarki>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$sorgu14cek['aylik'];
		}

		$tplmtutar=$gunfarki*$kiralamatutari;  // kiraladığı gün kadar ki ücreti!!

		$sorgu12=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$bugun."',ay='".$teslimay."',toplamgun='".$gunfarki."',toplamtutar='".$tplmtutar."',silindimi='1' where kira_id='".$akid."'");

		if(mysqli_affected_rows())
		{
			header("location:../admin/kiralananaraclar.php?teslm=no");

		}
		else
		{
			$sorgu13=mysqli_query($conn,"update arabalar set durum='Musait' where plaka='".$teslimplaka."'");
			header("location:../admin/kiralananaraclar.php?teslm=ok");
		}

		
	}

}

if (isset($_GET['teslimaltalep'])) 
{
	$akid=$_GET['teslimaltalep']; // kirada ki aracın id si

	$sorgu11=mysqli_query($conn,"select * from kiraarac where kira_id='$akid'");
	$sorgu11getir=mysqli_fetch_assoc($sorgu11);

	$plkm=$sorgu11getir['plaka'];

	$sorgu14=mysqli_query($conn,"select * from arabalar where plaka='$plkm'");
	$sorgu14cek=mysqli_fetch_assoc($sorgu14);

	$teslimplaka=$sorgu11getir['plaka'];
	$alisgun=substr($sorgu11getir['alistarihi'],0,2);
	$alisay=substr($sorgu11getir['alistarihi'],3,2);

	$bugun=date('d/m/Y');
	$teslimgun=substr($bugun,0,2);
	$teslimay=substr($bugun,3,2);


	//echo "alisgünü ".$alisgun."<br>"."alisayi". $alisay."<br>"."bugun".$bugun."<br>"."teslim gün".$teslimgun."<br>"."teslim ay".$teslimay;



	if($teslimay==$alisay)
	{
		 $gunfarki=$teslimgun-$alisgun; // kaç gün kiraladığı!!


		 if($gunfarki<7)
		 {
		 	$kiralamasekli="Günlük";
		 	$kiralamatutari=$sorgu14cek['gunluk'];
		 }
		 if($gunfarki>7 && $gunfarki<30)
		 {
		 	$kiralamasekli="Haftalık";
		 	$kiralamatutari=$sorgu14cek['haftalik'];
		 }
		 if($gunfarki>30)
		 {
		 	$kiralamasekli="Aylık";
		 	$kiralamatutari=$sorgu14cek['aylik'];
		 }

		$tplmtutar=$gunfarki*$kiralamatutari;  // kiraladığı gün kadar ki ücreti!!


		
		$sorgu12=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$bugun."',ay='".$teslimay."',toplamgun='".$gunfarki."',toplamtutar='".$tplmtutar."',silindimi='1' where kira_id='".$akid."'");

		if(mysqli_affected_rows())
		{
			header("location:../admin/aracteslim.php?teslm=no");

		}
		else
		{
			$sorgu13=mysqli_query($conn,"update arabalar set durum='Musait' where plaka='".$teslimplaka."'");
			header("location:../admin/aracteslim.php?teslm=ok");
		}

	}
	elseif($teslimay>$alisay)
	{
		$gunfarki=$teslimgun-$alisgun+30; // kaç gün kiraladığı!!

		if($gunfarki<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$sorgu14cek['gunluk'];
		}
		if($gunfarki>7 && $gunfarki<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$sorgu14cek['haftalik'];
		}
		if($gunfarki>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$sorgu14cek['aylik'];
		}

		$tplmtutar=$gunfarki*$kiralamatutari;  // kiraladığı gün kadar ki ücreti!!

		$sorgu12=mysqli_query($conn,"update kiraarac set kirasekli='".$kiralamasekli."',tutar='".$kiralamatutari."',teslimtarihi='".$bugun."',ay='".$teslimay."',toplamgun='".$gunfarki."',toplamtutar='".$tplmtutar."',silindimi='1' where kira_id='".$akid."'");

		if(mysqli_affected_rows())
		{
			header("location:../admin/aracteslim.php?teslm=no");

		}
		else
		{
			$sorgu13=mysqli_query($conn,"update arabalar set durum='Musait' where plaka='".$teslimplaka."'");
			header("location:../admin/aracteslim.php?teslm=ok");
		}

		
	}
}

if (isset($_POST['arackirala'])) 
{
	//$plaka=$_POST['plaka'];
	//$marka=$_POST['marka'];
	//$seri=$_POST['seri'];
	//$model=$_POST['model'];
	//$fiyat=$_POST['kiralamasekli'];
	//$alistarihi=$_POST['alistarihi'];
	//$teslimtarihi=$_POST['teslimtarihi'];
	


	$gun=substr($_POST['alistarihi'],3,2);
	$ay=substr($_POST['alistarihi'],0,2);
	$yıl=substr($_POST['alistarihi'],6,9);
	$alistarihi=$gun."/".$ay."/".$yıl;

	$gun2=substr($_POST['teslimtarihi'],3,2);
	$ay2=substr($_POST['teslimtarihi'],0,2);
	$yıl2=substr($_POST['teslimtarihi'],6,9);
	$teslimtarihi=$gun2."/".$ay2."/".$yıl2;



	if($ay2<$ay)
	{
		header("location: ../arackirala.php?tarih=no&plaka=".$_POST[plaka]."");
	}
	if($ay2==$ay)
	{
		$toplamgun=$gun2-$gun;

		if($toplamgun<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$_POST['gunluk'];
		}
		if($toplamgun<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$_POST['haftalik'];
		}
		if($toplamgun>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$_POST['aylik'];
		}

		$toplamtutar=$toplamgun*$kiralamatutari;

		$sorgu9=mysqli_query($conn,"insert into kiraarac (k_adi,plaka,marka,seri,model,kirasekli,tutar,alistarihi,teslimtarihi,toplamgun,toplamtutar) values ('".$_SESSION["kullanici"]."','".$_POST['plaka']."','".$_POST['marka']."','".$_POST['seri']."','".$_POST['model']."','".$kiralamasekli."','".$kiralamatutari."','".$alistarihi."','".$teslimtarihi."','".$toplamgun."','".$toplamtutar."')");


		if(mysqli_affected_rows())
		{
			header("location:../kiraladıgınaraclar.php?kira=no");

		}
		else
		{
			$sorgu10=mysqli_query($conn,"update arabalar set durum='Kirada' where plaka='".$_POST['plaka']."'");
			header("location:../kiraladıgınaraclar.php?kira=ok");
		}


	}

	if($ay2>$ay)
	{
		$toplamgun=$gun2-$gun+30;

		if($toplamgun<7)
		{
			$kiralamasekli="Günlük";
			$kiralamatutari=$_POST['gunluk'];
		}
		if($toplamgun<30)
		{
			$kiralamasekli="Haftalık";
			$kiralamatutari=$_POST['haftalik'];
		}
		if($toplamgun>30)
		{
			$kiralamasekli="Aylık";
			$kiralamatutari=$_POST['aylik'];
		}

		$toplamtutar=$toplamgun*$kiralamatutari;

		$sorgu9=mysqli_query($conn,"insert into kiraarac (k_adi,plaka,marka,seri,model,kirasekli,tutar,alistarihi,teslimtarihi,toplamgun,toplamtutar) values ('".$_SESSION["kullanici"]."','".$_POST['plaka']."','".$_POST['marka']."','".$_POST['seri']."','".$_POST['model']."','".$kiralamasekli."','".$kiralamatutari."','".$alistarihi."','".$teslimtarihi."','".$toplamgun."','".$toplamtutar."')");


		if(mysqli_affected_rows())
		{
			header("location:../kiraladıgınaraclar.php?kira=no");

		}
		else
		{
			$sorgu10=mysqli_query($conn,"update arabalar set durum='Kirada' where plaka='".$_POST['plaka']."'");
			header("location:../kiraladıgınaraclar.php?kira=ok");
		}
	}
	
}







if (isset($_GET['servis'])=="sil") 
{
	$sorgu7=mysqli_query($conn,"update servisler set silindimi='1' where s_id='".$_GET['s_id']."'");

	if(mysqli_affected_rows())
	{
		header("location:../admin/servis.php?sil=no");

	}
	else
	{
		header("location:../admin/servis.php?sil=ok");
	}	


}

if (isset($_POST['servisguncelle'])) 
{
	$sorgu6=mysqli_query($conn,"update servisler set s_baslik='".$_POST['s_baslik']."',s_icerik='".$_POST['s_icerik']."',s_sira='".$_POST['s_sira']."' where s_id='".$_POST['s_id']."'");


	if(mysqli_affected_rows())
	{
		header("location:../admin/servis_guncelle.php?guncelle=no&s_id=".$_POST['s_id']."");

	}
	else
	{
		header("location:../admin/servis_guncelle.php?guncelle=ok&s_id=".$_POST['s_id']."");
	}	
}



if (isset($_POST['servisekle'])) 
{
	$sorgu5=mysqli_query($conn,"insert into servisler (s_baslik,s_icerik,s_sira) values ('".$_POST['s_baslik']."','".$_POST['s_icerik']."','".$_POST['s_sira']."')");

	if(mysqli_affected_rows())
	{
		header("location:../admin/servis_ekle.php?ekle=no");

	}
	else
	{
		header("location:../admin/servis_ekle.php?ekle=ok");
	}	

}


if (isset($_GET['arabasil'])=="asil") 
{
	$pk=$_GET['plaka'];

	$sorgu4=mysqli_query($conn,"update arabalar set silindimi='1' where plaka='$pk'");

	if(mysqli_affected_rows())
	{
		header("location:../admin/araba.php?sil=no");
	}
	else
	{
		header("location:../admin/araba.php?sil=ok");
	}	
}

if(isset($_POST['aracguncelle']))
{
	$plk=$_POST['plaka2'];
	$resimadi=$_FILES['aracresim']["name"];
	if($resimadi==""){
		$logo=mysqli_query($conn,"select * from arabalar");
		$logogetir=mysqli_fetch_assoc($logo);
		$resimadi=$logogetir['resim'];

		$guncelle=mysqli_query($conn,"update arabalar set resim='".$resimadi."',aciklama='".$_POST['aciklama']."', marka='".$_POST['marka']."',seri='".$_POST['seri']."',model='".$_POST['model']."',vitestipi='".$_POST['vitestipi']."',yakittipi='".$_POST['yakittipi']."',km='".$_POST['km']."',renk='".$_POST['renk']."',gunluk='".$_POST['gunluk']."',haftalik='".$_POST['haftalik']."',aylik='".$_POST['aylik']."',a_sira='".$_POST['sira']."' where plaka='".$_POST['plaka2']."'");


		if(mysqli_affected_rows())
		{
			header("location:../admin/araba_guncelle.php?guncelle=no&plaka=$plk");
		}
		else
		{
			header("location:../admin/araba_guncelle.php?guncelle=ok&plaka=$plk");
		}	

	}
	else
	{
		$boyut=$_FILES['aracresim']['size'];
		if($boyut>1024*1024*2)
		{
			header("location: ../admin/araba_guncelle.php?boyut=yuksek");
		}
		else
		{
			$tur=$_FILES['aracresim']["type"];
			if($tur=="image/jpeg" || $tur=="image/png")
			{
				$uploads_dir="../aracresim";
				$tmp_name=$_FILES['aracresim']["tmp_name"];
				$benzersizsayi1=rand(20000,32000);
				$benzersizsayi2=rand(20000,32000);
				$benzersizsayi3=rand(20000,32000);
				$benzersizsayi4=rand(20000,32000);

				$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

				$resimyol=substr($uploads_dir,3)."/".$benzersizad.$resimadi;

				@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$resimadi");

				$guncelle=mysqli_query($conn,"update arabalar set resim='".$resimyol."',aciklama='".$_POST['aciklama']."', marka='".$_POST['marka']."',seri='".$_POST['seri']."',model='".$_POST['model']."',vitestipi='".$_POST['vitestipi']."',yakittipi='".$_POST['yakittipi']."',km='".$_POST['km']."',renk='".$_POST['renk']."',gunluk='".$_POST['gunluk']."',haftalik='".$_POST['haftalik']."',aylik='".$_POST['aylik']."',a_sira='".$_POST['sira']."' where plaka='".$_POST['plaka2']."'");


				if(mysqli_affected_rows())
				{
					header("location:../admin/araba_guncelle.php?guncelle=no&plaka=$plk");
				}
				else
				{
					header("location:../admin/araba_guncelle.php?guncelle=ok&plaka=$plk");
				}	

			}
			else
			{
				header("location: ../admin/araba_guncelle.php?dosya=no");

			}
		}

	}
}

if(isset($_POST['aracekle']))
{


	if(strlen($_POST['plaka'])==7 || strlen($_POST['plaka'])==8)
	{
		$sorgu2=mysqli_query($conn,"select plaka from arabalar where plaka='$_POST[plaka]'");

		if(mysqli_num_rows($sorgu2)>0)
		{
			header("location:../admin/araba_ekle.php?var=ok");
		}
		else
		{
			@$araclogo=$_FILES['aracresim']["name"];
			if($araclogo=="")
			{
				header("location:../admin/araba_ekle.php?resim=no");
			}
			else
			{
				$boyut=$_FILES['aracresim']['size'];
				if($boyut>1024*1024*2)
				{
					header("location: ../admin/araba_ekle.php?boyut=yuksek");
				}

				$tur=$_FILES['aracresim']["type"];
				if($tur=="image/jpeg" || $tur=="image/png")
				{
					$uploads_dir="../aracresim";
					$tmp_name=$_FILES['aracresim']["tmp_name"];
					$benzersizsayi1=rand(20000,32000);
					$benzersizsayi2=rand(20000,32000);
					$benzersizsayi3=rand(20000,32000);
					$benzersizsayi4=rand(20000,32000);

					$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

					$resimyol=substr($uploads_dir,3)."/".$benzersizad.$araclogo;


					@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$araclogo");

					$sorgu3=mysqli_query($conn,"insert into arabalar (resim,aciklama,plaka,marka,seri,model,vitestipi,yakittipi,km,renk,gunluk,haftalik,aylik,a_sira) values ('".$resimyol."','".$_POST['aciklama']."','".$_POST['plaka']."','".$_POST['marka']."','".$_POST['seri']."','".$_POST['model']."','".$_POST['vitestipi']."','".$_POST['yakittipi']."','".$_POST['km']."','".$_POST['renk']."','".$_POST['gunluk']."','".$_POST['haftalik']."','".$_POST['aylik']."','".$_POST['sira']."')");

					if(mysqli_affected_rows())
					{
						header("location:../admin/araba_ekle.php?ekle=no");

					}
					else
					{
						header("location:../admin/araba_ekle.php?ekle=ok");
					}	
				}
				else
				{
					header("location: ../admin/araba_ekle.php?dosya=no");
				}

			}

		}
	}
	else
	{
		header("location: ../admin/araba_ekle.php?plaka=no");
	}





}


if(isset($_POST['kguncelle']))
{
	$ad=$_POST['kullaniciadi'];
	$pw=$_POST['kullaniciparola'];
	$sorgu=mysqli_query($conn,"select k_adi,k_parola from kullanici where k_adi='$ad' and k_parola='$pw'");

	if(mysqli_num_rows($sorgu)>0)
	{
		header("location:../bilgiguncelle.php?veri=no");
	}
	else
	{
		$soru1=mysqli_query($conn,"update kullanici set k_adi='".$ad."',k_parola='".$pw."' where k_id='".$_POST[k_id]."'");

		if(mysqli_affected_rows())
		{
			header('location:../bilgiguncelle.php?guncelle=no');

		}
		else
		{
			header('location:../bilgiguncelle.php?guncelle=ok');
		}	

	}
}

if(isset($_POST['newkullanicigiris']))
{


	$kontrol=mysqli_query($conn,"select k_adi from kullanici where k_adi='$_POST[newkullaniciadi]'");

	if(mysqli_num_rows($kontrol)>0)
	{
		header("location:../login.php?k=no");
	}
	else
	{
		$newuye=mysqli_query($conn,"insert into kullanici (k_adi,k_parola) values ('$_POST[newkullaniciadi]','$_POST[newkullaniciparola]')");


		if(mysqli_affected_rows())
		{
			header('location:../login.php?ekle=no');

		}
		else
		{
			header('location:../login.php?ekle=ok');
		}	
	}



}


if (isset($_POST['kullanicigiris'])) {

	@$kullaniciadi=$_POST['kullaniciadi'];
	@$kullaniciparola=$_POST['kullaniciparola'];


	$sqlkayit=mysqli_query($conn,"select * from kullanici where k_adi='$kullaniciadi' and k_parola='$kullaniciparola'");


	if (mysqli_num_rows($sqlkayit)>0) {

		$sqlkayitcek=mysqli_fetch_assoc($sqlkayit);

		$_SESSION["k_id"]=$sqlkayitcek['k_id'];
		

		$_SESSION["kullanici"]=$kullaniciadi;

		$yetki=mysqli_query($conn,"select y_ad from yetki where k_y_id=(select k_yonetici_tip from kullanici where k_adi='$kullaniciadi')");

		$yetkial=mysqli_fetch_assoc($yetki);

		$_SESSION["yetki"]=$yetkial['y_ad'];


		header("location:../index.php");
	}
	else
	{
		header("location:../login.php?giris=no");
	}  
}


if(isset($_POST['ayarguncele']))
{
	$resimadi=$_FILES['logo']["name"];
	if($resimadi==""){
		$logo=mysqli_query($conn,"select * from ayarlar");
		$logogetir=mysqli_fetch_assoc($logo);
		$resimadi=$logogetir['ayar_logo'];

		$guncelle=mysqli_query($conn,"update ayarlar set ayar_logo='".$resimadi."',hakkimizda='".$_POST['hakkimizda']."', ayar_telefon='".$_POST['ayar_telefon']."',ayar_title='".$_POST['ayar_title']."',ayar_aciklama='".$_POST['ayar_aciklama']."',ayar_keyword='".$_POST['ayar_keyword']."',ayar_face='".$_POST['ayar_face']."',ayar_twitter='".$_POST['ayar_twitter']."',ayar_footer='".$_POST['ayar_footer']."',ayar_adres='".$_POST['ayar_adres']."',ayar_mail='".$_POST['ayar_mail']."' where ayar_id='1'");


		if(mysqli_affected_rows())
		{
			header('location:../admin/ayarlar.php?guncelle=no');
		}
		else
		{
			header('location:../admin/ayarlar.php?guncelle=ok');
		}	

	}
	else
	{
		$boyut=$_FILES['logo']['size'];
		if($boyut>1024*1024*2)
		{
			header("location: ../admin/ayarlar.php?boyut=yuksek");
		}
		else
		{
			$tur=$_FILES['logo']["type"];
			if($tur=="image/jpeg" || $tur=="image/png")
			{
				$uploads_dir="../uploads";
				$tmp_name=$_FILES['logo']["tmp_name"];
				$benzersizsayi1=rand(20000,32000);
				$benzersizsayi2=rand(20000,32000);
				$benzersizsayi3=rand(20000,32000);
				$benzersizsayi4=rand(20000,32000);

				$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;

				$resimyol=substr($uploads_dir,3)."/".$benzersizad.$resimadi;

				@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$resimadi");

				$guncelle=mysqli_query($conn,"update ayarlar set ayar_logo='".$resimyol."', ayar_telefon='".$_POST['ayar_telefon']."',ayar_title='".$_POST['ayar_title']."',ayar_aciklama='".$_POST['ayar_aciklama']."',ayar_keyword='".$_POST['ayar_keyword']."',ayar_face='".$_POST['ayar_face']."',ayar_twitter='".$_POST['ayar_twitter']."',ayar_footer='".$_POST['ayar_footer']."',ayar_adres='".$_POST['ayar_adres']."',ayar_mail='".$_POST['ayar_mail']."' where ayar_id='1'");


				if(mysqli_affected_rows())
				{
					header('location:../admin/ayarlar.php?guncelle=no');
				}
				else
				{
					header('location:../admin/ayarlar.php?guncelle=ok');
				}	

			}
			else
			{
				header("location: ../admin/ayarlar.php?dosya=no");

			}
		}

	}
}



if (isset($_POST['menuekle'])) 
{

	@$menuyolu=$_FILES['menuyol']["name"];
	$menuadi=$_POST['menuadi'];
	$menusira=$_POST['menusira'];


	if($menuyolu=="")
	{
		header("location:../admin/menu_ekle.php?yol=no");
	}
	else
	{
		$boyut=$_FILES['menuyol']['size'];
		if($boyut>1024*1024*2)
		{
			header("location: ../admin/menu_ekle.php?boyut=yuksek");
		}
		else
		{

			$ext = pathinfo($menuyolu);
			$uzanti=$ext['extension'];
			if($uzanti!="php")
			{
				header("location: ../admin/menu_ekle.php?uznatı=no");
				
			}
			else
			{
				$sorgu16=mysqli_query($conn,"select * from menuler where m_adi='$menuadi'");

				if(mysqli_num_rows($sorgu16)>0)
				{
					header("location: ../admin/menu_ekle.php?ad=no");
				}
				else
				{
					
					$uploads_dir="../";
					$tmp_name=$_FILES['menuyol']["tmp_name"];
					
					$menuadres=$menuadi.".php";
					@move_uploaded_file($tmp_name, "$uploads_dir/$menuadi.php");

					$menukaydet=mysqli_query($conn,"INSERT INTO menuler (m_adi, m_yol,m_sira) VALUES ('$menuadi', '$menuadres','$menusira')");


					if(mysqli_affected_rows())
					{
						header('location:../admin/menu_ekle.php?ekle=no');
					}
					else
					{
						header('location:../admin/menu_ekle.php?ekle=ok');
					}	

				}
			}
			
		}
	}
}






if(isset($_POST['menuguncelle']))
{


	$menuid=$_POST['m_id'];



	$guncelle=mysqli_query($conn,"update menuler set m_adi='".$_POST['menuadi']."',m_yol='".$_POST['menulink']."',m_sira='".$_POST['menusira']."' where m_id='$menuid'");


	if(mysqli_affected_rows())
	{
		header("location:../admin/menu_guncelle.php?m_id=$menuid&guncelle=no");
	}
	else
	{
		header("location:../admin/menu_guncelle.php?m_id=$menuid&guncelle=ok");
	}	
}


if(@$_GET['menuislem']=="sil")
{
	$id=$_GET['m_id'];

	$menubul=mysqli_query($conn,"select * from menuler where m_id=$id");

	$menugetir=mysqli_fetch_assoc($menubul);

	$sqlsil=mysqli_query($conn,"delete from menuler where m_id=$id");
	

	if(mysqli_affected_rows())
	{
		header('location:../admin/menuler.php?sil=no');
	}
	else
	{
		header('location:../admin/menuler.php?sil=ok');
		unlink("../".$menugetir['m_yol']);
	}	

}


if(isset($_POST['kullaniciguncelle']))
{

	$id=$_POST['k_id'];

	$kullanicigucenlle=mysqli_query($conn,"update kullanici set k_adi='".$_POST['kullaniciadi']."',k_parola='".$_POST['kullaniciparola']."',k_yonetici_tip='".$_POST['kullaniciyetki']."' where k_id='".$_POST['k_id']."'");


	if(mysqli_affected_rows())
	{
		header("location:../admin/kullanici_guncelle.php?guncelle=no&k_id=$id");
	}
	else
	{
		header("location:../admin/kullanici_guncelle.php?guncelle=ok&k_id=$id");
	}	


}

if (isset($_GET['islem'])=="ksil") {


	$ksil=mysqli_query($conn,"update kullanici set silindimi='1' where k_id='".$_GET['k_id']."'");


	if(mysqli_affected_rows())
	{
		header("location:../admin/kullanicilar.php?sil=no");
	}
	else
	{
		header("location:../admin/kullanicilar.php?sil=ok");
	}	
}


if (isset($_POST['kullaniciekle'])) {


	$kontrol=mysqli_query($conn,"select k_adi from kullanici where k_adi='$_POST[kullaniciadi]'");

	if(mysqli_num_rows($kontrol)>0)
	{
		header("location:../admin/kullanici_ekle.php?k=no");
	}
	else
	{
		$ekle=mysqli_query($conn,"insert into kullanici (k_adi,k_parola,k_yonetici_tip) values ('$_POST[kullaniciadi]','$_POST[kullaniciparola]','$_POST[kullaniciyetkili]') ");


		if(mysqli_affected_rows())
		{
			header("location:../admin/kullanici_ekle.php?ekle=no");
		}
		else
		{
			header("location:../admin/kullanici_ekle.php?ekle=ok");
		}
	}





}


if (isset($_POST['yetkiguncelle'])) {

	$id=$_POST['y_id'];
	$yetkiguncelle=mysqli_query($conn,"update yetki set y_ad='".$_POST['yetkiadi']."' where y_id='".$_POST['y_id']."'");



	if(mysqli_affected_rows())
	{
		header("location:../logout.php");
	}
	else
	{
		header("location:../logout.php?yetki=ok");
	}
}


if (isset($_POST['yetkiekle'])) {


	$yetkiekle=mysqli_query($conn,"insert into yetki (k_y_id,y_ad) values ('$_POST[yetkiid]','$_POST[yetkiadi]')");

	if(mysqli_affected_rows())
	{
		header("location:../admin/yetki_ekle.php?ekle=no");
	}
	else
	{
		header("location:../admin/yetki_ekle.php?ekle=ok");
	}
}






?>