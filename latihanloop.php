<?php

//contoh looping increment bilangan 1 sampai dengan 10 
for ($x = 1; $x <= 10; $x++){
    echo '<br> Bilangan 1 sampai dengan 10 '.$x;
}

echo '<br>-----bilangan 10 sampai 1 ----';

for ($y=10; $y >= 1; $y--){
echo '<br> Bilangan : '.$y;
}

echo '<br> ---- perulangan menggunakan while-----';
$j=1;
while($j <= 5){
    echo '<br> Bilangan '.$j;
    $j++;
}
?>