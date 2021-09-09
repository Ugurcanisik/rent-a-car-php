<?php 

require_once '../netting/baglan.php';

include 'header.php' ;
include 'sidebar.php' ;

if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[3]) 
{
    header("location: index.php?yetki=yetkisiz erişim");
}

?>

<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Araba Ekleme Sayfası</h1>
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
          echo "resmin boyutu yüksek";
        }
        elseif(@$_GET['plaka']=="no")
        {
          echo "Plaka 7 veya 9 hane olmalıdır";
        }
        else
        {
          echo "Açıklama Paneli";
        }

        ?>
          
        </h1>
      </div>
    </div>
    <form action="../netting/islem.php" method="post" enctype="multipart/form-data">
                
            <div class="form-group col-md-12">
              <label class="control-label col-lg-4">Resim</label>
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
        
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Araç Açıklaması</label>
         <input name="aciklama" class="form-control" required="" type="text" placeholder="Araç Açıklaması Giriniz">
       </div>  
       <div class="form-group col-md-6">
         <label>Plaka</label>
         <input name="plaka" class="form-control" style="text-transform: uppercase;" maxlength="8" required="" type="text" placeholder="Aracın Plakasını Giriniz">
       </div> 
     </div>
           <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Marka</label>
         <input name="marka" class="form-control" required="" type="text" style="text-transform: uppercase;" placeholder="Aracın Markasını Giriniz">
       </div>  
       <div class="form-group col-md-6">
         <label>Seri</label>
         <input name="seri" class="form-control" required="" type="text" style="text-transform: uppercase;" placeholder="Aracın Seri sini Giriniz">
       </div> 
     </div>
           <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Model</label>
         <input name="model" class="form-control" maxlength="4" required="" type="number" placeholder="Aracın Modelini Giriniz">
       </div>  
       <div class="form-group col-md-6">
         <label>Renk</label>
         <input name="renk" class="form-control" required="" style="text-transform: uppercase;" type="text" placeholder="Aracın Rengini Giriniz">
       </div> 
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Vites Tipi</label>
       <select class="form-control" name="vitestipi">
         <option value="Otomatik">Otomatik</option>
         <option value="Manuel">Manuel</option>
       </select>
     </div>  
          <div class="form-group col-md-6">
       <label>Yakıt Tipi</label>
       <select class="form-control" name="yakittipi">
         <option value="Dizel">Dizel</option>
         <option value="Benzin">Benzin</option>
       </select>
     </div>
   </div>
              <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>KM</label>
         <input name="km"  class="form-control" required="" type="number" placeholder="Aracın KM Giriniz">
       </div>  
       <div class="form-group col-md-6">
         <label>Günlük</label>
         <input name="gunluk" class="form-control" required="" type="number" placeholder="Günlük Tutarı Giriniz">
       </div> 
     </div>
                <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Haftalık</label>
         <input name="haftalik" class="form-control" required="" type="number" placeholder="Haftalık Tutarı Giriniz">
       </div>  
       <div class="form-group col-md-6">
         <label>Aylık</label>
         <input name="aylik" class="form-control" required="" type="number" placeholder="Aylık Tutarı Giriniz">
       </div> 
     </div>
     <div class="col-md-12">
            <div class="form-group col-md-6">
         <label>Sıra</label>
         <input name="sira" class="form-control" required="" type="number" placeholder="Sıra Numarasını Giriniz">
       </div> 
       </div>
<center>
   <div class="col-md-12">
    <div class="form-group col-md-12">
      <input type="submit" class="btn btn-success"  name="aracekle" value="Kaydet">
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