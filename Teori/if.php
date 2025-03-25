<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method= "post">
    Masukan angka 1 : <input type="text" name="angka1">
    <br>
    Masukan angka 2 : <input type="text" name="angka2">
    <br>
    <button type="submit">Tampilkan</button>
    </form>
    
</body>
</html>

<?php
if (isset($_POST['angka1']) && isset($_POST['angka2'])) {
    $angka1 = $_POST['angka1'];
    $angka2 = $_POST['angka2'];

    if ($angka1 > $angka2) {
        echo $angka1 . " lebih besar dari " . $angka2;
    } else {
        echo $angka1 . " lebih kecil dari " . $angka2;
    }
}
?>
