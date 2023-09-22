<form method="GET">
    <label for="">Nama</label><br>
    <input type="text" name="nama" > <br>
    <label for="">Alamat</label><br>
    <input type="text" name="alamat"><br>
    <input type="submit" name="proses" value="simpan" id="">


</form>

<?php
// error_reporting(0);
$nama = $_GET ['nama']; 
$alamat = $_GET ['alamat'];
//tampilkan setelah form diproses 
$proses = $_GET['proses'];
if (isset($proses)){
    echo 'Nama : '.$nama.'<br> Alamat : '.$alamat;
}

?>