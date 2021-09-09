<?php 

require_once '../netting/baglan.php';

include 'header.php' ;

include 'sidebar.php' ;

include 'adminyetki.php';

$yetki=mysqli_query($conn,"select k_y_id from yetki");
$satirsayisi=mysqli_num_rows($yetki);
$arttır=$satirsayisi+1;

?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Yetki Ekle</h1>
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
         <label>Yetki İD</label>
         <input name="" class="form-control" required="" type="text" value="<?php echo $arttır ?>" disabled>,
         <input type="hidden" name="yetkiid" value="<?php echo $arttır ?>">
       </div>  
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Yetki Adı</label>
       <input name="yetkiadi" class="form-control"  required="" type="text" placeholder="yetki adi giriniz">
     </div>  
   </div>
   <div class="col-md-12">
    <div class="form-group col-md-12">
      <input type="submit" class="btn btn-success"  name="yetkiekle" value="Kaydet">
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