<?php 

include 'header.php' ;

include 'sidebar.php' ;


if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[2] ) 
{
  header("location: index.php?yetki=yetkisiz erişim");
}


if (!isset($_GET['s_id'])) {
  
  header('location:servis.php');

}
else
{
  $servisler=mysqli_query($conn,"select * from servisler where s_id='$_GET[s_id]'");


  $serviscek=mysqli_fetch_assoc($servisler);
}

?>
<div id="page-wrapper">
  <div id="page-inner">
    <div class="row">
      <div class="col-md-12">
        <h1 class="page-head-line">Servis Güncelle</h1>
        <h1 class="page-subhead-line"><?php 

        if(@$_GET['guncelle']=="ok")
        {
          echo "Güncellendi";
        }
        else if(@$_GET['guncelle']=="no")
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
         <input name="s_baslik" class="form-control" required="" type="text" value="<?php echo $serviscek['s_baslik'] ?>">
       </div>  
     </div>
     <div class="col-md-12">

       <div class="form-group col-md-6">
         <label>Sira</label>
         <input class="form-control" type="number" name="s_sira" required="" value="<?php echo $serviscek['s_sira'] ?>"  >            
       </div>
     </div>

     <div class="col-md-12">

      <div class="form-group col-md-12">
        <label>İçerik</label>
        <textarea name="s_icerik" class="ckeditor"><?php echo $serviscek['s_icerik']; ?></textarea>
      </div>

    </div>

    <div class="col-md-12">
      <div class="form-group col-md-12">
        <input type="submit" class="btn btn-success"  name="servisguncelle" value="Güncelle">
        <input type="hidden" name="s_id" value="<?php echo $serviscek['s_id'] ?>">
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