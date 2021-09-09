<?php 



$yet=mysqli_query($conn,"select y_ad,k_y_id from yetki ORDER BY k_y_id ASC ");

$yetkiadi=array();
while ($yetyaz=mysqli_fetch_assoc($yet)) {

  array_push($yetkiadi, $yetyaz['y_ad']);
}


?>


<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <br>

                    
                    <p style="margin-left: 50px; color: white;">Hoşgeldin:  <?php echo $_SESSION['kullanici']; ?> </p>
                    <p style="margin-left: 50px; color: white;">Yetki Düzeyi: <?php echo $_SESSION['yetki']; ?></p>

                </div>
            </li>

            <li>
                <a class="active-menu" href="index.php"><i class="fa fa-home "></i>Anasayfa</a>
            </li>
            <?php 
            if ($_SESSION["yetki"]==$yetkiadi[1]) 
            {
                echo "<li>";
                echo "<a href='kullanicilar.php'><i class='fa fa-users '></i>Kullanıcılar </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='yetkiler.php'><i class='fa fa-lock '></i>Yetkiler </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='kiralananaraclar.php'><i class='fa fa-car '></i>Kirada Olan Araçlar </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='aracteslim.php'><i class='fa fa-bookmark'></i>Arac Teslim Talepleri </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='rapor.php'><i class='fa fa-inbox '></i>Rapolar </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='favo.php'><i class='fa fa-star '></i>Favori Araçlar </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='aracyukle.php'><i class='fa fa-star '></i>Excel Araç Ekle </a>";
                echo "</li>";
            }

            if($_SESSION["yetki"]==$yetkiadi[1] || $_SESSION["yetki"]==$yetkiadi[2])
            {
                echo "<li>";
                echo "<a href='ayarlar.php'><i class='fa fa-cloud '></i>Site Ayarları </a>";
                echo "</li>";
                echo "<li>";
                echo "<a href='menuler.php'><i class='fa fa-windows ''></i>Menuler </a> ";
                echo "</li>";
                echo "<li>";
                echo "<a href='servis.php'><i class='fa fa-phone ''></i>Servisler </a>";
                echo "</li>";
            }

            if($_SESSION["yetki"]==$yetkiadi[1] || $_SESSION["yetki"]==$yetkiadi[3])
            {
                echo "<li>";
                echo "<a href='araba.php'><i class='fa fa-flash '></i>Arabalar </a>";
                echo "</li>";
            }
            ?>
        </ul>
    </div>
</nav>