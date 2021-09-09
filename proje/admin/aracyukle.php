<?php 

include 'header.php' ;

include 'sidebar.php' ;

include 'adminyetki.php';

?>

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">Arak yükle</h1>
                <h1 class="page-subhead-line">
                    <?php 

                    if(@$_GET['boyut']=="no")
                    {
                        echo "Dosya Boyutu Cok Fazla";
                    }
                    elseif(@$_GET['dosya']=="no")
                    {
                        echo "Dosya Seçiniz!!";
                    }
                    elseif(@$_GET['uzantı']=="no")
                    {
                        echo "CSV uzantılı dosya seçiniz";
                    }
                    elseif(@$_GET['ykl']=="no")
                    {
                        echo "ekleme hatası";
                    }
                    elseif(@$_GET['ykl']=="ok")
                    {
                        echo "ekleme başarılı";
                    }

                    ?>
                </h1>
            </div>
        </div>

        <div class="col-md-12">

         <!--    Hover Rows  -->
         <div class="panel panel-default">
            <div class="panel-heading">
              <center> Araç Yükle</center>
          </div>
          <div class="panel-body">
            <div class="table-responsive">

                <form action="../netting/islem.php" method="post" enctype="multipart/form-data">
                    
                        <label class="control-label col-lg-4">Araç Yükle</label>
                        <div class="">
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <span class="btn btn-file btn-default">
                                    <span class="fileupload-new">CSV Dosya Seç</span>
                                    <span class="fileupload-exists">Değiştir</span>
                                    <input type="file" name="aracyukle">
                                </span>
                                <span class="fileupload-preview"></span>
                                <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none">x</a>
                            </div>
                        </div>
                    
                    <div class="col-md-12">
                      <center>  <input type="submit" name="yukle" class="btn btn-success" value="Yükle"></center>
                    </div>
                </form>


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