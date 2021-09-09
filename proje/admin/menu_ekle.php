<?php 

include 'header.php' ;

include 'sidebar.php' ;


if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[2] ) 
{
  header("location: index.php?yetki=yetkisiz erişim");
}

?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Menü Ekle</h1>
        <h1 class="page-subhead-line"><?php 

        if(@$_GET['ekle']=="ok")
        {
          echo "Kaydedildi";
        }
        else if(@$_GET['ekle']=="no")
        {
          echo "Hata";
        }
        elseif(@$_GET['yol']=="no") 
        {
         echo "Menu Yolunu Seçiniz";
       }
       elseif(@$_GET['boyut']=="yuksek") 
       {
        echo "Dosyanın Boyutu Yüksek";
       }
       elseif (@$_GET['uzantı']=="no") 
       {
         echo "PHP uzantılı bir dosya ekleyiniz!!!";
       }
       elseif(@$_GET['ad']=="no")
       {
        echo "Menu Adı Kayıtlı Farklı Bir isim Deneyiniz";
       }
       else
       {
        echo "Açıklama Paneli";
      }

      ?></h1>
    </div>
  </div>
  <form action="../netting/islem.php" method="post" enctype="multipart/form-data">
    <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Menü Adı</label>
       <input name="menuadi" class="form-control" required="" type="text" placeholder="Menü Adını Giriniz">
     </div> 
      <div class="form-group col-md-6">
       <label>Menü Sırası Giriniz</label>
       <input name="menusira" class="form-control" required="" type="text" placeholder="Menü Sırası Giriniz">
     </div> 
   </div>
   <div class="col-md-12">

     <div class="form-group col-md-6">
       <label>Menü Seçiniz</label>

       <div class="">
        <div class="fileupload fileupload-new" data-provides="fileupload">
          <span class="btn btn-file btn-default">
            <span class="fileupload-new">Menü Seç</span>
            <span class="fileupload-exists">Değiştir</span>
            <input type="file" name="menuyol">
          </span>
          <span class="fileupload-preview"></span>
          <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a>
        </div>
      </div>  

    </div>
    <div class="form-group col-md-12">
      <input type="submit" class="btn btn-success"  name="menuekle" value="Kaydet">
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