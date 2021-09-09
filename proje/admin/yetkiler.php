<?php 

include 'header.php' ;
include 'sidebar.php' ;

include 'adminyetki.php';

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Yetkiler</h1>
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

         <a href="yetki_ekle.php"> <button class="btn btn-success">Yetki Ekle</button></a>
         <hr>
     </div>
     <div class="col-md-12">

       <!--    Hover Rows  -->
       <div class="panel panel-default">
        <div class="panel-heading">
            Yetkiler
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Yetki İD</th>
                            <th>Yetki Adı</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $yetk=mysqli_query($conn,"select y_id,k_y_id,y_ad from yetki");
                        while ($tyaz=mysqli_fetch_assoc($yetk)) { ?>
                            <tr>
                                <td><?php echo $tyaz['k_y_id']; ?></td>
                                <td><?php echo $tyaz['y_ad']; ?></td>
                                
                                <td><a href="yetki_guncelle.php?y_id=<?php echo $tyaz['y_id']; ?>"><button class="btn btn-success">Güncelle</button></a></td>
                                
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