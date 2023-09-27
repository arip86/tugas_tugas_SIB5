<?php
//contoh fungsi return value atau yang mengembalikan nilai dari proses 
function tambah($a, $b){
    $c = $a + $b;
    return $c;
}

//eksekusi 
$x = 10;
$y = 20;

echo 'Hasil dari 50 + 30 = '.tambah(50, 30);//eksekusi value dari parameter

echo '<br>Hasil dari X + Y = '.tambah($x,$y); 

?>