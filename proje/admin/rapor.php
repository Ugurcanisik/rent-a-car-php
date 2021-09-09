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
                <h1 class="page-head-line">Rapolar</h1>
                <h1 class="page-subhead-line">
                    <?php 

                    if(isset($_GET['tarih'])=="no")
                    {
                        echo "Lütfen Tarih Seçiniz";
                    }
                    elseif(isset($_GET['altay'])=="no")
                    {
                        echo "Başlangıç Ayı Bitir Ayından Büyük olamaz";
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

         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Raporlar
            </div>
            <form method="post" action="../netting/islem.php">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div >                 
                            <div class="form-group col-md-6">

                                <select class="form-control" name="altay">
                                    <option value="0">Ay Seçiniz</option>
                                    <option value="1">Ocak</option>
                                    <option value="2">Şubat</option>
                                    <option value="3">Mart</option>
                                    <option value="4">Nisan</option>
                                    <option value="5">Mayıs</option>
                                    <option value="6">Haziran</option>
                                    <option value="7">Temmuz</option>
                                    <option value="8">Ağustos</option>
                                    <option value="9">Eylül</option>
                                    <option value="10">Ekim</option>
                                    <option value="11">Kasım</option>
                                    <option value="12">Aralık</option>
                                </select>
                                
                            </div> 

                            <div class="col-md-6">
                                <select class="form-control" name="ustay">
                                    <option value="0">Ay Seçiniz</option>
                                    <option value="1">Ocak</option>
                                    <option value="2">Şubat</option>
                                    <option value="3">Mart</option>
                                    <option value="4">Nisan</option>
                                    <option value="5">Mayıs</option>
                                    <option value="6">Haziran</option>
                                    <option value="7">Temmuz</option>
                                    <option value="8">Ağustos</option>
                                    <option value="9">Eylül</option>
                                    <option value="10">Ekim</option>
                                    <option value="11">Kasım</option>
                                    <option value="12">Aralık</option>
                                </select>
                            </div>
                        </div>
                        <div >
                            <center>
                           <div class="form-group col-md-12">
                            <input type="submit" class="btn btn-success"  name="rapor" value="Listele">
                        </div>
                        </center>
                    </div>
                </div>
            </div>
        </form>

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