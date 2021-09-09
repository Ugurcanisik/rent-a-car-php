<?php 

include 'header.php' ;

include 'sidebar.php' ;


include 'adminyetki.php' ;


$fav=mysqli_query($conn,"select * from favoriler order by f_id asc");

$kid=array();
$arabaid=array();

while($favgetir=mysqli_fetch_assoc($fav))
{
    array_push($kid, $favgetir['f_k_id']);
    array_push($arabaid, $favgetir['f_a_id']);
}


?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Favori Arabalar</h1>
                <h1 class="page-subhead-line">
                    <?php 

                // get işlemleri
                    ?>
                </h1>
            </div>
        </div>


        <div class="col-md-12">

         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
                Favori arabalar
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Fav. Ekleyen</th>
                                <th>Plaka</th>
                                <th>Marka</th>
                                <th>Seri</th>
                                <th>Model</th>
                                <th>Vites Tipi</th>
                                <th>Yakit Tipi</th>
                                <th>KM</th>
                                <th>Renk</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php 

                            for($x=0; $x<count($kid); $x++)
                            {
                                $kullanici=mysqli_query($conn,"select * from kullanici where k_id='$kid[$x]'");
                                $kullanicicek=mysqli_fetch_assoc($kullanici);

                                $araba=mysqli_query($conn,"select * from arabalar where a_id='$arabaid[$x]'");
                                $arabacek=mysqli_fetch_assoc($araba);
                                ?>
                                <tr>
                                    <td><?php echo $kullanicicek['k_adi']; ?></td>
                                    <td><?php echo $arabacek['plaka']; ?></td>
                                    <td><?php echo $arabacek['marka']; ?></td>
                                    <td><?php echo $arabacek['seri']; ?></td>
                                    <td><?php echo $arabacek['model']; ?></td>
                                    <td><?php echo $arabacek['vitestipi']; ?></td>
                                    <td><?php echo $arabacek['yakittipi']; ?></td>
                                    <td><?php echo $arabacek['km']; ?></td>
                                    <td><?php echo $arabacek['renk']; ?></td>
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