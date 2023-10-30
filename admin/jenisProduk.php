<?php
$model = new Jenis_produk();
$data_jenisProduk = $model->dataJenis();
if ($sesi['role'] != 'staff'){


?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Jenis Produk</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                        <!-- <div class="card mb-4">
                            <div class="card-body">
                                DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                                <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                                .
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                            <a href="index.php?url=jenis_form">
                               <button class="btn btn-sm btn-primary">Tambah</button></a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                           
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach ($data_jenisProduk as $row){

                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['nama'] ?></td>
                                            <td>
                                                <form action="jenis_controller.php" method="POST">
                            <a href="index.php?url=jenis_form&idedit=<?= $row ['id']; ?> " class="btn btn-warning btn-sm">

                                                        Ubah
                                                    </a>
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
                <?php }  else { ?>

                    <h1 align="center">Halaman Kosong</h1>
                    
                    
                    
              <?php  } ?>