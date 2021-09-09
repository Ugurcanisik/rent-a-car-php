<?php 

include 'header.php' ;
include 'sidebar.php' ;

$kullanicigetir=mysqli_query($conn,"select * from kullanici where silindimi='0'");



include 'adminyetki.php';

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Kullanıcılar</h1>
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

           <a href="kullanici_ekle.php"> <button class="btn btn-success">Kullanici Ekle</button></a>
           <hr>
       </div>
       <div class="col-md-12">

         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Yetkili Kullanıcılar
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>İD</th>
                                <th>Kullanıcı Adı</th>
                                <th>Kullanıcı Şifre</th>
                                <th>Yetki</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            while ($kullaniciyaz=mysqli_fetch_assoc($kullanicigetir)) { ?>
                                <tr>
                                    <td><?php echo $kullaniciyaz['k_id']; ?></td>
                                    <td><?php echo $kullaniciyaz['k_adi']; ?></td>
                                    <td><?php echo $kullaniciyaz['k_parola']; ?></td>
                                    <td>
                                        <?php 

                                        $yetkiadi=mysqli_query($conn,"select y_ad from yetki where k_y_id='".$kullaniciyaz['k_yonetici_tip']."'");
                                        $yetkiyaz=mysqli_fetch_assoc($yetkiadi);


                                        echo $yetkiyaz['y_ad'];

                                        ?>
                                    </td>
                                    <td style="width: 40px;"><a href="kullanici_guncelle.php?k_id=<?php echo $kullaniciyaz['k_id']; ?>"><button class="btn btn-success">Güncelle</button></td></a>
                                    <td style="width: 40px;"><a href="../netting/islem.php?islem=ksil&k_id=<?php echo $kullaniciyaz['k_id']; ?>"><button class="btn btn-danger">Sil</button></td></a>
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