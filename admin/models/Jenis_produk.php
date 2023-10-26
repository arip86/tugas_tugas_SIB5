<?php

class Jenis_produk{
    private $koneksi;
    public function __construct(){
        global $dbh;
        $this->koneksi = $dbh;
    }

    //mengambil dan melihat tabel jenis_produk
    public function dataJenis(){
    $sql = "SELECT * FROM jenis_produk";
    //menggunakan mekanisme prepare statement PDO
    $ps = $this->koneksi->prepare($sql);
    $ps->execute();
    $rs = $ps->fetchAll();
    return $rs;
}
public function simpan($data){
    $sql = "INSERT INTO jenis_produk (nama) VALUES (?)";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function getJenis($id){
    $sql = "SELECT * FROM jenis_produk WHERE id = ?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute([$id]);
    $rs = $ps->fetch();
    return $rs;
}
public function ubah($data){
    $sql = "UPDATE jenis_produk SET nama=? WHERE id = ? ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
}

?>