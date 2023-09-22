<?php
// ini contoh komentar didalam PHP

// echo 'Hello Word';

//latihan membuat variable
$namaSiswa = "Budi Santoso"; ///tipedata string
$umur = 25; //tipe data integer
$beratBadan = 30.5; //tipe data float
$_pekerjaan = 'Mahasiswa';



///contoh variable constanta
$jari2 = 15;
define('PHI', 3.14);
$luas = PHI * $jari2 * $jari2;
echo '<br>Nama Mahasiswa : '.$namaSiswa;
echo '<br>Umur : '.$umur;
echo '<br>Berat Badan : '.$beratBadan;
echo '<br>Pekerjaan : '.$_pekerjaan;
echo '<br> Berat Badan 2: $beratBadan kg';
echo "<br>Berat Badan 3 $beratBadan ";
print '<br> Pekerjaan 2 : '.$_pekerjaan;
//contoh contoh pemanggilan variable didalam PHP
?>
<hr>
<br> Siswa : 1: <?= $namaSiswa ?>
<p>Umur : <?= $umur ?></p>
<p>Luas jari jari diatas adalah <?= $luas ?></p>




