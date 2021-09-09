<?php 

include 'header.php' ;
include 'sidebar.php' ;

include 'adminyetki.php' ;



?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Kirada Olan Araçlar</h1>
                <h1 class="page-subhead-line">
                    <?php 

                    if(@$_GET['teslm']=="ok")
                    {
                        echo "<p>Araç Teslim Alındı</p>";
                    }
                    else if(@$_GET['teslm']=="no")
                    {
                        echo "<p>Araç Teslim Alınamadı HATA!!!!</p>";
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
            Kirada Olan Arabalar
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>İD</th>
                            <th>Kiralayan</th>
                            <th>Plaka</th>
                            <th>Marka</th>
                            <th>Seri</th>
                            <th>Model</th>
                            <th>Kiralama Şekli</th>
                            <th>Tutar</th>
                            <th>Alış Tarihi</th>
                            <th>Teslim Tarihi</th>
                            <th>Toplam Gün</th>
                            <th>Toplam Tutar</th>
                            <th>Alınacak Ücret</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $kiraarac=mysqli_query($conn,"select * from kiraarac where silindimi='0'");
                        while ($kiraaracyaz=mysqli_fetch_assoc($kiraarac)) { ?>
                            <tr>

                                <td><?php echo $kiraaracyaz['kira_id']; ?></td>
                                <td><?php echo $kiraaracyaz['k_adi']; ?></td>
                                <td><?php echo $kiraaracyaz['plaka']; ?></td>
                                <td><?php echo $kiraaracyaz['marka']; ?></td>
                                <td><?php echo $kiraaracyaz['seri']; ?></td>
                                <td><?php echo $kiraaracyaz['model']; ?></td>
                                <td><?php echo $kiraaracyaz['kirasekli']; ?></td>
                                <td><?php echo $kiraaracyaz['tutar']; ?></td>
                                <td><?php echo $kiraaracyaz['alistarihi']; ?></td>
                                <td><?php echo $kiraaracyaz['teslimtarihi']; ?></td>
                                <td><?php echo $kiraaracyaz['toplamgun']; ?></td>
                                <td><?php echo $kiraaracyaz['toplamtutar']; ?></td>
                                <?php 
                                $alstarih=substr($kiraaracyaz['alistarihi'],0,2);
                                $bugun=date('d');


                                if($bugun>$alstarih)
                                {
                                $testarih=substr($kiraaracyaz['teslimtarihi'],0,2);
                                $ucret=$kiraaracyaz['tutar'];
                                $gunfarkı=$bugun-$testarih;
                                $ucretfarki=$gunfarkı*$ucret;
                                }
                                else
                                {
                                    $ucretfarki=$kiraaracyaz['toplamtutar']*-1;    
                                }

                                ?>
                                <td><input type="text" class="form-control" name="" value="<?php echo $ucretfarki; ?>" disabled></td>

                                <td style="width: 40px;"><a href="../netting/islem.php?teslimal=<?php echo $kiraaracyaz['kira_id']; ?>"><button class="btn btn-success">Teslim Al</button></td></a>

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