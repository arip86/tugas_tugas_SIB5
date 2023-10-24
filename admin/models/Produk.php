<?php

class Produk{
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    //mengambil dan melihat tabel jenis_produk
    public function dataProduk(){
    $sql = "SELECT p.*, j.nama AS jenis FROM produk p INNER JOIN jenis_produk j ON p.jenis_produk_id = j.id";
    //menggunakan mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function getProduk($id){
    $sql = "SELECT p.*, j.nama AS jenis FROM produk p INNER JOIN jenis_produk j ON p.jenis_produk_id = j.id
    WHERE p.id = ?";
    //menggunakan mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
}

?>