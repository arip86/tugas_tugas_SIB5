<?php
include_once 'koneksi.php';
include_once 'models/Produk.php';

$kode = $_POST ['kode'];
$nama = $_POST ['nama'];
$harga_beli = $_POST ['harga_beli'];
$harga_jual = $_POST ['harga_jual'];
$stok = $_POST['stok'];
$min_stok = $_POST ['min_stok'];
$jenis_produk = $_POST ['jenis_produk'];
$data = [
    $kode, $nama, $harga_beli, 
    $harga_jual, $stok, $min_stok, $jenis_produk
];

$model = new Produk();
$tombol = $_REQUEST['proses'];
switch($tombol){
    case 'simpan': $model->simpan($data); break;
    case 'ubah' : $data[] = $_POST['idx']; $model->ubah($data); break;
    case 'hapus': unset($data);
    $data[] = $_POST['idx'];
    $model->hapus($data);break;
    default:
    header('Location:index.php?url=produk');
    break;
}
header('Location:index.php?url=produk');



?>