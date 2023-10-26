<?php
$obj_produk = new Produk();
$obj_jenisProduk = new Jenis_produk();

$data_produk = $obj_produk->dataProduk();
$data_jenis = $obj_jenisProduk->dataJenis();
$idedit = $_REQUEST ['idedit'];
$obj_produk = new Produk();
if (!empty($idedit)){
  $produk = $obj_produk->getProduk($idedit);

} else {
  $produk = array();
}

?>



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<h2 align="center">Form Produk</h2>
<form action="produk_controller.php" method="POST">
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" type="text" class="form-control" value="<?= $produk ['kode'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label" >Nama</label> 
    <div class="col-8">
      <input id="text1" name="nama" type="text" class="form-control" value="<?= $produk ['nama'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Harga Beli</label> 
    <div class="col-8">
      <input id="text2" name="harga_beli" type="text" class="form-control" value="<?= $produk ['harga_beli'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Harga Jual</label> 
    <div class="col-8">
      <input id="text3" name="harga_jual" type="text" class="form-control" value="<?= $produk ['harga_jual'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label" >Stok</label> 
    <div class="col-8">
      <input id="text4" name="stok" type="text" class="form-control" value="<?= $produk ['stok'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="text5" class="col-4 col-form-label" >Minimal Stok</label> 
    <div class="col-8">
      <input id="text5" name="min_stok" type="text" class="form-control" value="<?= $produk ['min_stok'] ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Jenis Produk</label> 
    <div class="col-8">
      <select id="select" name="jenis_produk" class="custom-select">
        <option value="rabbit">---Pilih Jenis Produk---</option>
        <?php
        foreach ($data_jenis as $jenis){
          $sel = ($jenis['id'] == $produk['jenis_produk_id']) ? 'selected' : '';
            ?>
            <option value="<?= $jenis['id']; ?>"<?= $sel; ?>><?= $jenis ['nama']?></option>
        <?php } ?>

      </select>
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
    <?php

if(empty($idedit)){ ?>
      <button name="proses" value="simpan" type="submit" class="btn btn-primary">Submit</button>
      <?php } else {
        ?>
        <button type="submit" name="proses" value="ubah" class="btn btn-warning">ubah</button>
     <?php } ?>
      <input type="hidden" name="idx" value="<?= $idedit; ?>">
    </div>
  </div>
</form>