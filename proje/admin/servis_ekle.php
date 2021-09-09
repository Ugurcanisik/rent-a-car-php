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
        <h1 class="page-head-line">Servis Ekle</h1>
        <h1 class="page-subhead-line"><?php 

        if(@$_GET['ekle']=="ok")
        {
          echo "Kaydedildi";
        }
        else if(@$_GET['ekle']=="no")
        {
          echo "Hata";
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
         <label>Başlik</label>
         <input name="s_baslik" class="form-control" required="" type="text" placeholder="Başlık giriniz">
       </div>  
     </div>
     <div class="col-md-12">

       <div class="form-group col-md-6">
         <label>Sira</label>
         <input class="form-control" type="number" name="s_sira" required="" value="0"  >            
       </div>
     </div>

     <div class="col-md-12">

      <div class="form-group col-md-12">
        <label>İçerik</label>
        <textarea name="s_icerik" class="ckeditor"></textarea>
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group col-md-12">
        <input type="submit" class="btn btn-success"  name="servisekle" value="Kaydet">
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