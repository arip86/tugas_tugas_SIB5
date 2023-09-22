<?php
$nama = "Budi Santoso";
$nilai = 85;
if ($nilai >= 85 && $nilai <= 100) $grade = "A";
else if($nilai >= 75 && $nilai <= 84 ) $grade = "B";
else if ($nilai >= 60 && $nilai <= 74) $grade = "C";
else if ($nilai >= 30 && $nilai <= 59) $grade = "D";
else if ($nilai >= 0 && $nilai <= 29) $grade = "E";
else $grade = "";

switch($grade){
    case "A" : $predikat = "Memuaskan"; break;
    case "B" : $predikat = "Bagus"; break;
    case "C" : $predikat = "Cukup"; break;
    case "D" : $predikat = "kurang"; break;
    case "E" : $predikat = "Buruk"; break;
    default: $predikat = '';
}

?>
<h1>Nama Siswa : <?= $nama ?></h1>
<h2>Nilai : <?= $nilai ?></h2>
<h2>Grade : <?= $grade ?></h2>
<h2>Predikat : <?= $predikat ?></h2>