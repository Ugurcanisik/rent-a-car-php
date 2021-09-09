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
                <h1 class="page-head-line">Servisler</h1>
                <h1 class="page-subhead-line">
                    <?php 

                    if(isset($_GET['sil'])=="ok")
                    {
                        echo "Silme Başarılı";
                    }
                    else if(isset($_GET['sil'])=="no")
                    {
                        echo "HATA";
                    }
                    else if(isset($_GET['k'])=="no")
                    {
                     echo "kullanici adi sistemde kayıtlı";
                 }
                 else
                 {
                  echo "Açıklama Paneli";
              }
              ?>
          </h1>
      </div>
  </div>
  <div class="col-md-12">

     <a href="servis_ekle.php"> <button class="btn btn-success">Servis Ekle</button></a>
     <hr>
 </div>
 <div class="col-md-12">

   <!--    Hover Rows  -->
   <div class="panel panel-default">
    <div class="panel-heading">
        Servisler
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>İD</th>
                        <th>Başlık</th>
                        <th>İçerik</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $servisgetir=mysqli_query($conn,"select * from servisler where silindimi='0'");
                    while ($servisyaz=mysqli_fetch_assoc($servisgetir)) { ?>
                        <tr>
                            <td><?php echo $servisyaz['s_id']; ?></td>
                            <td><?php echo $servisyaz['s_baslik']; ?></td>
                            <td width="500px"><?php echo $servisyaz['s_icerik']; ?></td>
                            <td style="width: 40px;"><a href="servis_guncelle.php?s_id=<?php echo $servisyaz['s_id']; ?>"><button class="btn btn-success">Güncelle</button></td></a>
                            <td style="width: 40px;"><a href="../netting/islem.php?servis=sil&s_id=<?php echo $servisyaz['s_id']; ?>"><button class="btn btn-danger">Sil</button></td></a>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End  Hover Rows  -->
</div>

</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>