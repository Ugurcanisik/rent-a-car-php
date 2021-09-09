
<script>
    function myFunction() {
     alert("Hello! I am an alert box!");
 }
</script>



<?php 

include 'header.php' ;
include 'sidebar.php' ;




if(!isset($_GET['altay'])&&!isset($_GET['ustay']))
{
    header("location: rapor.php");
}
else
{
    $altay=$_GET['altay'];
    $ustay=$_GET['ustay'];

    $kiraarac=mysqli_query($conn,"select * from kiraarac where ay between $altay and $ustay and silindimi='1'");

    $hasılat=mysqli_query($conn,"select sum(toplamtutar) from kiraarac where ay between $altay and $ustay and silindimi='1' ");

    $hasılatyazdır=mysqli_fetch_array($hasılat);




}

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Rapolar</h1>
                <h1 class="page-subhead-line">

                </h1>
            </div>
        </div>
        <div class="col-md-3">
            Toplam Hasılat
            <input type="text" class="form-control" value="<?php echo $hasılatyazdır[0] ?>"  disabled>

            <hr>
        </div>
        <div class="col-md-12">

           <!--    Hover Rows  -->
           <div class="panel panel-default">
            <div class="panel-heading">
                Rapor Sonucu
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            while ($kiraaracyaz=mysqli_fetch_assoc($kiraarac)) { ?>
                                <tr>
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
                                </tr>

                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form action="../netting/islem.php" method="post">

            <input type="hidden" name="altay" value="<?php echo $altay ?>">
            <input type="hidden" name="ustay" value="<?php echo $ustay ?>">
            <?php


            if (mysqli_num_rows($kiraarac)==0) 
            {
                echo "<center>";
                echo "<input type='submit' class='btn btn-success'  name='raporexcel' value='Excel Aktar' disabled>";
                echo "</center>";

            }
            else
            {
                echo "<center>";
                echo "<input type='submit' class='btn btn-success'  name='raporexcel' value='Excel Aktar'>";
                echo "</center>";
            }






            ?>
        </div>
    </form>
</div>
<!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
</div>
<!-- /. WRAPPER  -->


<?php include 'footer.php' ?>