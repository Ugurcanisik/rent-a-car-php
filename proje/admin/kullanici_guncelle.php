<?php 

include 'header.php' ;

include 'sidebar.php' ;
include 'adminyetki.php';
?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Kullanici Güncelle</h1>
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

    if (!isset($_GET['k_id'])) {

      header('location:kullanicilar.php');

    }
    else
    {
      $kullanici=mysqli_query($conn,"select * from kullanici where k_id='$_GET[k_id]'");


      $kullanicicek=mysqli_fetch_assoc($kullanici);
    }

  
    ?>
    <form action="../netting/islem.php" method="post">
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Kullanici Adı</label>
         <input name="kullaniciadi" class="form-control" required="" type="text" value="<?php echo $kullanicicek['k_adi'] ?>">
       </div>  
     </div>
     <div class="col-md-12">                 
      <div class="form-group col-md-6">
       <label>Kullanici Parola</label>
       <input name="kullaniciparola" class="form-control" required="" type="text" value="<?php echo $kullanicicek['k_parola'] ?>">
     </div>  
   </div>

<div class="col-md-12">
 <div class="form-group col-md-6">
  <label>Kullanici Yetki</label>

  <select class="form-control" name="kullaniciyetki">
    <?php 
    $yetkiadi=mysqli_query($conn,"select y_ad,k_y_id from yetki where k_y_id='".$kullanicicek['k_yonetici_tip']."'");
    $yetkiyaz=mysqli_fetch_assoc($yetkiadi);
    $yetkidurumu=$yetkiyaz['y_ad'];
    $yet=mysqli_query($conn,"select y_ad,k_y_id from yetki");
    
    while ($yetyz=mysqli_fetch_assoc($yet)) {

      if($yetkidurumu==$yetyz['y_ad'])
      {
        ?>
        <option selected="" value="<?php echo $yetyz['k_y_id'] ?>"><?php echo $yetyz['y_ad']; ?></option>
        <?php
      }
      else
      {
        ?>
        <option value="<?php echo $yetyz['k_y_id'] ?>"><?php echo $yetyz['y_ad']; ?></option>
        <?php
      }
    }
    ?>
  </select> 
</div>
<div class="form-group col-md-12">
  <input type="submit" class="btn btn-success"  name="kullaniciguncelle" value="Güncelle">
</div>
</div>

<input type="hidden" name="k_id" value="<?php echo $kullanicicek['k_id']  ?>">

</form>







</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>