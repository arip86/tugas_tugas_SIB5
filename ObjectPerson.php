<?php
require_once 'Dosen.php';
require_once 'Mahasiswa.php';
require_once 'Staff.php';


$d1 = new Dosen ('Budi', 'L', '011111','M.Kom');
$m1 = new Mahasiswa ('Andi', 'L',3,'TI');
$s1 = new Staff('Ari','L','Marketing','02020',1000000);

$data = [$d1,$m1,$s1];

echo '<h3> Data civitas Kampus </h3>';
echo '<p>';
foreach($data as $d){
    echo $d->cetak();
}
echo '</p>';

?>