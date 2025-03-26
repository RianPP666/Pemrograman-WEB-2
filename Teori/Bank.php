<?php
session_start();

if (!isset($_SESSION['saldo'])) {
    $_SESSION['saldo'] = 1000000;
}

if(isset($_POST['submit'])){
    if(isset($_POST['kode']) && isset($_POST['jumlah'])) {
        $kodeTransaksi = $_POST['kode'];
        $jumlahUang = $_POST['jumlah'];

        if ($kodeTransaksi == 0) { // Setor Tunai
            $_SESSION['saldo'] += $jumlahUang;
            echo "<script>alert('Setor Tunai Berhasil! Saldo Anda Sekarang Rp. " . number_format($_SESSION['saldo'], 0, ',', '.') . "')</script>";
        } elseif ($kodeTransaksi == 1) { // Tarik Tunai
            if ($jumlahUang > $_SESSION['saldo']) {
                echo "<script>alert('Transaksi Gagal: Saldo Anda Tidak Cukup')</script>";
            } elseif ($_SESSION['saldo'] - $jumlahUang < 5000) {
                echo "<script>alert('Transaksi Gagal: Sisa Saldo Minimal Rp. 5000')</script>";
            } else {
                $_SESSION['saldo'] -= $jumlahUang;
                echo "<script>alert('Tarik Tunai Berhasil! Saldo Anda Sekarang Rp. " . number_format($_SESSION['saldo'], 0, ',', '.') . "')</script>";
            }
        } else {
            echo "<script>alert('Transaksi Gagal: Kode Transaksi Salah')</script>";
        }
    }
}

$Saldo = $_SESSION['saldo'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 1 Bank</title>
    <style>
        .card-container{
            width: 500px;
            height: 250px;
            background-color:rgb(253, 253, 253);
            padding: 20px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            box-shadow : 0 0 10px rgba(0,0,0,0.1);
        }
        body{
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        button{
            padding: 10px 20px;
            background-color:rgb(67, 41, 133);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover{
            background-color:rgb(67, 41, 133, 0.8);
        }
        input{
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }
        label{
            margin-bottom: 5px;
            margin-right: 15px;
        }
    </style>
</head>
<body>
    <div class="card-container">
        <h3>Transaksi Bank</h3>
        <form method="post">
            <label>Kode Bank :</label>
            <input type="number" name="kode" required min="0" max="1"> 0 = Setor, 1 = Tarik
            <br><br>

            <label>Jumlah Uang :</label>
            <input type="number" name="jumlah" required min="1">
            <br><br>

            <label>Saldo Anda :</label>
            <input type="text" name="saldo" value="Rp. <?= number_format($Saldo, 0, ',', '.') ?>" readonly>
            <br><br>

            <button type="submit" name="submit">Proses</button>
        </form>
    </div>
</body>
</html>
