<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bangun datar persegi</title>
</head>
<body>
    <h1>Rumus Bangun Datar</h1>
    <form method="POST">
        <table>
            <tr>
                <td>Sisi 1</td>
                <td>
                    <input type="text" name="sisi1" require>
                </td>
            </tr>
            <tr>
                <td>Sisi 2</td>
                <td>
                    <input type="text" name="sisi2" require>
                </td>
            </tr>
            <tr>
                <td><input type="submit" name="submit" value="Hitung"></td>
            </tr>
        </table>
    </form>
    <?php
    if(isset($_POST['submit'])){
        $sisi1 = $_POST ['sisi1'];
        $sisi2 = $_POST ['sisi2'];

        $luaspersegi = $sisi1 * $sisi2;
        echo 'Hasil Perhitungan Luas persegi';
        echo '<br> Diketahui :';
        echo '<br> Sisi pertama :'.$sisi1;
        echo '<br> Sisi Kedua :'.$sisi2;

        echo '<br> Hasil Perhitungan '.$luaspersegi;
    }
    ?>
</body>
</html>