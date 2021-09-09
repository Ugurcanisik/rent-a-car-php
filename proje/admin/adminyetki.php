<?php 

if ($_SESSION["yetki"]!=$yetkiadi[1]) 
{
    header("location: index.php?yetki=yetkisiz erişim");
}

 ?>