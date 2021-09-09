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
        <h1 class="page-head-line">Menü Güncelle</h1>
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

    if (!isset($_GET['m_id'])) {
      
      header('location:menuler.php');

    }
    else
    {
      $menu=mysqli_query($conn,"select * from menuler where m_id='$_GET[m_id]'");


      $menucek=mysqli_fetch_assoc($menu);
    }

    


    ?>
    <form action="../netting/islem.php" method="post">
      <div class="col-md-12">                 
        <div class="form-group col-md-6">
         <label>Menü Adı</label>
         <input name="menuadi" class="form-control" required="" type="text" value="<?php echo $menucek['m_adi'] ?>">
       </div> 
              <div class="form-group col-md-6">
        <label>Menü Sıra</label>
        <input class="form-control" type="text" name="menusira" required="" value="<?php echo $menucek['m_sira'] ?>" >            
      </div> 
     </div>

     <div class="col-md-12">

       <div class="form-group col-md-6">
        <label>Menü yol</label>
        <input class="form-control" type="text" name="menulink" required="" value="<?php echo $menucek['m_yol'] ?>" >            
      </div>

      <div class="form-group col-md-12">
        <input type="submit" class="btn btn-success"  name="menuguncelle" value="Güncelle">
      </div>
    </div>

    <input type="hidden" name="m_id" value="<?php echo $menucek['m_id']  ?>">


  </form>







</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>