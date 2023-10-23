<?php
$dsn = 'mysql:dbname=dbpos3;host=localhost';
$user = 'root';
$password = '';

try {
    $dbh = new PDO($dsn, $user, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  echo "Sukses Koneksi : ".$user;
} catch (PDOException $e){
    echo 'Koneksi Gagal ' .$e->getMessage();
}


?>