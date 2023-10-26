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
public function simpan($data){
    $sql = "INSERT INTO produk (kode, nama, harga_beli, harga_jual, stok, min_stok, jenis_produk_id)
    VALUES (?,?,?,?,?,?,?) ";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
}
public function ubah($data){
    $sql = "UPDATE produk SET kode=?, nama=?, harga_beli= ?, harga_jual=?,
     stok=?, min_stok=?, jenis_produk_id=? WHERE id=?";
     $ps = $this->koneksi->prepare($sql);
     $ps->execute($data);
 }
 public function hapus($data){
    $sql = "DELETE FROM produk WHERE id=?";
    $ps = $this->koneksi->prepare($sql);
    $ps->execute($data);
 }

}


?>