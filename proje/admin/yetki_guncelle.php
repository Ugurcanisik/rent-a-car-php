<?php 

include 'header.php' ;

include 'sidebar.php' ;

include 'adminyetki.php';

?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Yetki Güncelle</h1>
        <h1 class="page-subhead-line"><?php 

        if(@$_GET['guncelle']=="ok")
        {
          echo "Güncelleme Başarılı";
        }
        else if(@$_GET['guncelle']=="no")
        {
          echo "Günceleme HATALI";
        }
        else
        {
          echo "Açıklama Paneli";
        }
        ?></h1>
      </div>
    </div>
    <?php 

    if (!isset($_GET['y_id'])) {

      header('location:yetkiler.php');

    }
    else
    {
      $yetki=mysqli_query($conn,"select k_y_id,y_ad from yetki where y_id='$_GET[y_id]'");


      $yetkicek=mysqli_fetch_assoc($yetki);
    }

    
    ?>
    <form action="../netting/islem.php" method="post">
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Yetki İD</label>
         <input name="yetkiid" class="form-control" required="" type="text" value="<?php echo $yetkicek['k_y_id'] ?>" disabled>
       </div>  
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Yetki Adi</label>
       <input name="yetkiadi" class="form-control" required="" type="text" value="<?php echo $yetkicek['y_ad'] ?>">
     </div>  
   </div>

   <div class="col-md-12">
    <div class="form-group col-md-12">
      <input type="submit" class="btn btn-success"  name="yetkiguncelle" value="Güncelle">
    </div>
  </div>
  <input type="hidden" name="y_id" value="<?php echo $_GET['y_id']  ?>">

</form>







</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>