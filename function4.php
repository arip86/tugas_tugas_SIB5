<?php
function hitung($a1,$a2,$tombol){
    if($tombol == '+') $hasil = $a1 + $a2;
    else if ($tombol == '-') $hasil = $a1 - $a2;
    else if ($tombol == '*') $hasil = $a1 * $a2;
    else if( $tombol == '/') $hasil = $a1 / $a2;
    else $hasil = 0;
    return $hasil;
}


?>
<h1>Kalkulatorku</h1>
<form method="POST">
    <div class = "inputan">
        <label for="">
            Angka 1
            <input type="text" name="a1" id="a1" require>
        </label><br>
        <label for="">
            Angka 2 
            <input type="text" name="a2" id="a2" require><br>
        </label>
        <input type="submit" name="tombol" value="+" id="">
        <input type="submit" name="tombol" value="-" id="">
        <input type="submit" name="tombol" value="*" id="">
        <input type="submit" name="tombol" value="/" id="">
    </div>
    <div class="hasil">
        <?php
    if(isset($_POST['tombol'])){
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $tombol = $_POST['tombol'];
        $hasil = hitung($a1,$a2,$tombol);
        echo "Hasilnya ada lah $hasil";
    }


?>

    </div>


</form>