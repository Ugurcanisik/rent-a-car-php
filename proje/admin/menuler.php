<?php 

include 'header.php' ;

include 'sidebar.php' ;


if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[2] ) 
{
    header("location: index.php?yetki=yetkisiz erişim");
}


$menugetir=mysqli_query($conn,"select * from menuler");


?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Menüler</h1>
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
                    else
                    {
                      echo "Açıklama Paneli";
                    }
                  ?>
              </h1>
          </div>
      </div>
      <div class="col-md-12">

         <a href="menu_ekle.php"> <button class="btn btn-success">Menü Ekle</button></a>
         <hr>
     </div>

     <div class="col-md-12">

       <!--    Hover Rows  -->
       <div class="panel panel-default">
        <div class="panel-heading">
            Menüler
        </div>

        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>İD</th>
                            <th>Menü Adı</th>
                            <th>Menü Yol</th>
                            <th>Menü Sıra</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php 
                        while ($menuyaz=mysqli_fetch_assoc($menugetir)) { ?>
                            <tr>
                                <td><?php echo $menuyaz['m_id']; ?></td>
                                <td><?php echo $menuyaz['m_adi']; ?></td>
                                <td><?php echo $menuyaz['m_yol']; ?></td>
                                <td><?php echo $menuyaz['m_sira']; ?></td>
                                <td style="width: 40px;"><a href="menu_guncelle.php?m_id=<?php echo $menuyaz['m_id']; ?>"><button class="btn btn-success">Güncelle</button></td></a>
                                <td style="width: 40px;"><a href="../netting/islem.php?menuislem=sil&m_id=<?php echo $menuyaz['m_id']; ?>"><button class="btn btn-danger">Sil</button></td></a>
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