<?php
session_start();
include_once 'koneksi.php';
include_once 'models/Jenis_produk.php';
include_once 'models/Kartu.php';
include_once 'models/Produk.php';


$sesi = $_SESSION['MEMBER'];
if(isset($sesi)){


include_once 'top.php';
include_once 'menu.php';


?>

<div>
<div class="container-fluid px-4">
    <!-- <h1>Selamat Datang di Halaman Admin</h1> -->

    <?php
    // error_reporting(0);
    //membuat logik sederhana untuk mengarahkan url ke file 
    //yang mempunyai extension .php
    //routing => file yang mengarahkan url 

    $url = !isset($_GET['url']) ? 'dashboard' : $_GET['url'];
    if($url == 'dashboard'){
        include_once 'dashboard.php';
    } else if(!empty($url)){
        include_once ''.$url.'.php';
    } else {
       include_once 'dashboard.php';
    }
    ?>
</div>
</div>

<?php

include_once 'bottom.php';
} else {
    echo "<script> alert('anda tidak boleh masuk');history.back();</script>";
}
?>