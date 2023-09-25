<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3 Array</title>
</head>
<body>

<?php
$m1 = ['nim' => '0111111', 'nama'=>'Andi Setyo', 'nilai' =>95];
$m2 = ['nim' => '0111112', 'nama'=>'Rafael', 'nilai' =>80];
$m3 = ['nim' => '0111113', 'nama'=>'Ali Hakim', 'nilai' =>78];
$m4 = ['nim' => '0111114', 'nama'=>'Ari', 'nilai' =>76];
$m5 = ['nim' => '0111115', 'nama'=>'Ani', 'nilai' =>86];
$m6 = ['nim' => '0111116', 'nama'=>'Aji', 'nilai' =>50];
$m7 = ['nim' => '0111117', 'nama'=>'Budi Santoso', 'nilai' =>20];
$m8 = ['nim' => '0111118', 'nama'=>'Chandra', 'nilai' =>30];
$m9 = ['nim' => '0111119', 'nama'=>'Dewi', 'nilai' =>70];
$m10 = ['nim' => '0111110', 'nama'=>'Elisa', 'nilai' =>65];

$ar_judul = ['No', 'NIM','Nama Mahasiswa','Nilai','Keterangan','Grade','Predikat'];
$mahasiswa = [$m1,$m2,$m3,$m4,$m5,$m6,$m7,$m8,$m9,$m10];
?>
    <h3 align="center">Daftar Nilai Mahasiswa</h3>
    <table border = "1" cellpadding="10" cellspacing="2" width="100%">
        <thead>
            <tr>
                <?php 
                foreach($ar_judul as $judul){ ?>
                    <th><?= $judul ?></th>

                <?php } ?>
            </tr>
        </thead>
    </table>
</body>
</html>