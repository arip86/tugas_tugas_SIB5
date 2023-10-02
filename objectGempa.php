<?php
require 'Gempa.php';

$g1 = new Gempa ('Banten', 1);
$g2 = new Gempa ('Banten2', 3);
$g3 = new Gempa ('Banten3', 5);
$g4 = new Gempa ('Banten4', 6);

$g1->cetak();
$g2->cetak();

?>