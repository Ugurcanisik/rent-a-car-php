<?php 

include 'header.php' ;
include 'sidebar.php' ;

$aracgetir=mysqli_query($conn,"select * from arabalar where silindimi='0'");



if ($_SESSION["yetki"]!=$yetkiadi[1] and $_SESSION["yetki"]!=$yetkiadi[3]) 
{
    header("location: index.php?yetki=yetkisiz erişim");
}


?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Buradan Arabaları Yönetebilirsiniz!</h1>
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

           <a href="araba_ekle.php"> <button class="btn btn-success">Araba Ekle</button></a>
           <hr>
       </div>
       <div class="col-md-12">

         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Arabalar
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Resim</th>
                                <th>Açıklama</th>
                                <th>Plaka</th>
                                <th>Marka</th>
                                <th>Seri</th>
                                <th>Model</th>
                                <th>Vites Tipi</th>
                                <th>Yakıt Tipi</th>
                                <th>KM</th>
                                <th>Renk</th>
                                <th>Günlük</th>
                                <th>Haftalık</th>
                                <th>Aylık</th>
                                <th>Durumu</th>
                                <th>Sıra</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                            while ($aracyaz=mysqli_fetch_assoc($aracgetir)) { ?>
                                <tr>
                                    <td><img src="<?php echo "../".$aracyaz['resim']; ?>" width=80px height=80px></td>
                                    <td><?php echo $aracyaz['aciklama']; ?></td>
                                    <td><?php echo $aracyaz['plaka']; ?></td>
                                    <td><?php echo $aracyaz['marka']; ?></td>
                                    <td><?php echo $aracyaz['seri']; ?></td>
                                    <td><?php echo $aracyaz['model']; ?></td>
                                    <td><?php echo $aracyaz['vitestipi']; ?></td>
                                    <td><?php echo $aracyaz['yakittipi']; ?></td>
                                    <td><?php echo $aracyaz['km']; ?></td>
                                    <td><?php echo $aracyaz['renk']; ?></td>
                                    <td><?php echo $aracyaz['gunluk']; ?></td>
                                    <td><?php echo $aracyaz['haftalik']; ?></td>
                                    <td><?php echo $aracyaz['aylik']; ?></td>
                                    <td><?php echo $aracyaz['durum']; ?></td>
                                    <td><?php echo $aracyaz['a_sira']; ?></td>

                                    <td style="width: 40px;"><a href="araba_guncelle.php?plaka=<?php echo $aracyaz['plaka']; ?>"><button class="btn btn-success">Güncelle</button></td></a>
                                    <td style="width: 40px;"><a href="../netting/islem.php?arabasil=asil&plaka=<?php echo $aracyaz['plaka']; ?>"><button class="btn btn-danger">Sil</button></td></a>
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