<?php 

require_once '../netting/baglan.php';

include 'header.php' ;
include 'sidebar.php' ;
include 'adminyetki.php';

$yetki=mysqli_query($conn,"select k_y_id,y_ad from yetki");

?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Kullanici Ekle</h1>
        <h1 class="page-subhead-line"><?php 

        if(@$_GET['ekle']=="ok")
        {
          echo "Kaydedildi";
        }
        else if(@$_GET['ekle']=="no")
        {
          echo "Hata";
        }
        else if(@$_GET['k']=="no")
        {
          echo "kulanici adi kullanımda başka bir kullanici adı seçiniz";
        }
        else if(@$_GET['dosya']=="no")
        {
          echo "resmin tipi jpg veya png olmalıdır";
        }
        else
        {
          echo "Açıklama Paneli";
        }

        ?></h1>
      </div>
    </div>
    <form action="../netting/islem.php" method="post">
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Kullanici Adi</label>
         <input name="kullaniciadi" class="form-control" required="" type="text" placeholder="Kullanici giriniz">
       </div>  
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Kullanici Parola</label>
       <input name="kullaniciparola" class="form-control"  required="" type="text" placeholder="Kullanici Parolasını giriniz">
     </div>  
   </div>
   <div class="col-md-12">
     <div class="form-group col-md-6">
       <label>Yönetici Konumu</label>
       <select class="form-control" name="kullaniciyetkili">
      <?php  

      while ($yetkial=mysqli_fetch_assoc($yetki)) {
      echo "<option value='$yetkial[k_y_id]'>$yetkial[y_ad]</option>";    
      }

      ?>
    </select>
     </div>
        <div class="form-group col-md-12">
    <input type="submit" class="btn btn-success"  name="kullaniciekle" value="Kaydet">
  </div>
   </div>

</form>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>