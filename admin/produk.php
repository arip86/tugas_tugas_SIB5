<?php
$model = new Produk();
$data_produk = $model->dataProduk();

// $member = $_SESSION['MEMBER'];
// if(isset($member)){


?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <a href="index.php?url=produk_form">
                                    <button class="btn btn-sm btn-primary">Tambah</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Minimal Stok</th>
                                            <th>Jenis Produk</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Harga Beli</th>
                                            <th>Harga Jual</th>
                                            <th>Stok</th>
                                            <th>Minimal Stok</th>
                                            <th>Jenis Produk</th>
                                            <th>Aksi</th>    
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($data_produk as $produk){

                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $produk['kode'] ?></td>
                                            <td><?= $produk['nama'] ?></td>
                                            <td><?= $produk['harga_beli'] ?></td>
                                            <td><?= $produk['harga_jual'] ?></td>
                                            <td><?= $produk['stok'] ?></td>
                                            <td><?= $produk['min_stok'] ?></td>
                                            <td><?= $produk['jenis'] ?></td>
                                            <td>
                                                <form action="produk_controller.php" method="POST">
                                                    <a href="index.php?url=produk_detail&id=<?= $produk['id'] ?>">
                                                        <button type="button" class="btn btn-info btn-sm">Detail</button>
                                                    </a>
                                                    <?php
                                                    if ($sesi['role'] != 'staff'){
                                                        ?>
                                                    
                                                    <a href="index.php?url=produk_form&idedit=<?= $produk['id']?>">
                                                        <button type="button" class="btn btn-warning btn-sm">Ubah</button>
                                                    </a>

                                                    <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" 
                                                    onclick="return confirm('anda Yakin akan menghapus')" >Hapus</button>
                                                    <input type="hidden" name="idx" value="<?= $produk ['id']?> ">
                                                    <?php  }
                                                    ?>
                                                </form>
                                            </td>
                                    </tr>
                                    <?php
                                    
                                }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
            <?php 
            // } 
            // else {
            //     echo "<script> alert('anda tidak boleh masuk');history.back();</script>";
            // }
            ?>