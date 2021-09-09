<?php 

require_once '../netting/baglan.php';

include 'header.php' ;
include 'sidebar.php' ;

if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[3]) 
{
    header("location: index.php?yetki=yetkisiz erişim");
}

if (!isset($_GET['plaka'])) {

  header('location:araba.php');

}
else
{
  $araba=mysqli_query($conn,"select * from arabalar where plaka='$_GET[plaka]'");


  $arabacek=mysqli_fetch_assoc($araba);
}


?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Araba Güncelleme Sayfası</h1>
        <h1 class="page-subhead-line">
          <?php 

          if(@$_GET['var']=="ok")
          {
            echo "Plaka Zaten Kayıtlı";
          }
          else if(@$_GET['resim']=="no")
          {
            echo "Aracın Resmini Ekleyiniz";
          }
          else if(@$_GET['ekle']=="ok")
          {
            echo "Araç Eklendi";
          }
          else if(@$_GET['ekle']=="no")
          {
            echo "Hata";
          }
          else if(@$_GET['boyut']=="yuksek")
          {
            echo "Resmin Boyutu yüksek";
          }
          else if(@$_GET['dosya']=="no")
          {
            echo "resmin boyutu jpg veya png olmalıdır";
          }
          else if(@$_GET['guncelle']=="ok")
          {
            echo "güncelleme başarılı";
          }
          else if(@$_GET['guncelle']=="no")
          {
            echo "hata güncelleme";
          }
          else{
            echo "Açıklaması Paneli";
          }

          ?>
          
        </h1>
      </div>
    </div>
    <form action="../netting/islem.php" method="post" enctype="multipart/form-data">
      <div class="col-md-12">
        <div class="form-group col-md-12">
          <label class="control-label col-lg-4">Resim</label>
          <img witdh=250px; height=90px; src="<?php echo "../".$arabacek['resim'] ?>">
          <div class="">
            <div class="fileupload fileupload-new" data-provides="fileupload">
              <span class="btn btn-file btn-default">
                <span class="fileupload-new">Resim Seç</span>
                <span class="fileupload-exists">Değiştir</span>
                <input type="file" name="aracresim">
              </span>
              <span class="fileupload-preview"></span>
              <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Araç Açıklaması</label>
         <input name="aciklama" class="form-control" required="" type="text" value="<?php echo $arabacek['aciklama'] ?>">
       </div>  
       <div class="form-group col-md-6">
         <label>Plaka</label>
         <input name="plaka" class="form-control" style="text-transform: uppercase;" required="" type="text" value="<?php echo $arabacek['plaka'] ?>" disabled>
         <input type="hidden" name="plaka2" style="text-transform: uppercase;" value="<?php echo $arabacek['plaka'] ?>">
       </div> 
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Marka</label>
       <input name="marka" class="form-control" style="text-transform: uppercase;" required="" type="text" value="<?php echo $arabacek['marka'] ?>">
     </div>  
     <div class="form-group col-md-6">
       <label>Seri</label>
       <input name="seri" class="form-control" style="text-transform: uppercase;" required="" type="text" value="<?php echo $arabacek['seri'] ?>">
     </div> 
   </div>
   <div class="col-md-12">                 
    <div class="form-group col-md-6">
     <label>Model</label>
     <input name="model" class="form-control"  required="" type="number" value="<?php echo $arabacek['model'] ?>">
   </div>  
   <div class="form-group col-md-6">
     <label>Renk</label>
     <input name="renk" class="form-control" required="" style="text-transform: uppercase;" type="text" value="<?php echo $arabacek['renk'] ?>">
   </div> 
 </div>

 <div class="col-md-12">                 
  <div class="form-group col-md-6">
   <label>Vites Tipi</label>
   <select class="form-control" name="vitestipi">
    <?php 

    if($arabacek['vitestipi']=="Otomatik")
    {
      echo "<option value='Otomatik'>Otomatik</option>";
      echo "<option value='Manuel'>Manuel</option>";
    }
    else
    {
      echo "<option value='Manuel'>Manuel</option>";
      echo "<option value='Otomatik'>Otomatik</option>";
    }

    ?>
  </select>
</div>  

<div class="form-group col-md-6">
 <label>Yakıt Tipi</label>
 <select class="form-control" name="yakittipi">
  <?php 
  if($arabacek['yakittipi']=="Dizel")
  {
    echo "<option value='Dizel'>Dizel</option>";
    echo "<option value='Benzin'>Benzin</option>";
  }
  else
  {
    echo "<option value='Benzin'>Benzin</option>";
    echo "<option value='Dizel'>Dizel</option>";
  }

  ?>
</select>
</div>
</div>

<div class="col-md-12">                 
  <div class="form-group col-md-6">
   <label>KM</label>
   <input name="km" class="form-control" required="" type="number" value="<?php echo $arabacek['km'] ?>">
 </div>  
 <div class="form-group col-md-6">
   <label>Günlük</label>
   <input name="gunluk" class="form-control" required="" type="number" value="<?php echo $arabacek['gunluk'] ?>">
 </div> 
</div>
<div class="col-md-12">                 
  <div class="form-group col-md-6">
   <label>Haftalık</label>
   <input name="haftalik" class="form-control" required="" type="number" value="<?php echo $arabacek['haftalik'] ?>">
 </div>  
 <div class="form-group col-md-6">
   <label>Aylık</label>
   <input name="aylik" class="form-control" required="" type="number" value="<?php echo $arabacek['aylik'] ?>">
 </div> 
</div>
<div class="col-md-12">
   <div class="form-group col-md-6">
   <label>Sira</label>
   <input name="sira" class="form-control" required="" type="number" value="<?php echo $arabacek['a_sira'] ?>">
 </div> 
</div>

<div class="col-md-12">
  <div class="form-group col-md-12">
<center>
    <input type="submit" class="btn btn-success"  name="aracguncelle" value="Güncelle">
  </div>
</div>
</center>
</form>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>