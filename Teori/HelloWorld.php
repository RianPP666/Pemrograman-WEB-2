<!DOCTYPE html>
<html>
    <body>
        <form method="post">
            Masukan Nama : <input type="text" name="nama">
            <br>
            <button type="submit">Tampilkan</button>
            <input type="text" name="namaAnda" value="<?php echo isset($_POST['nama']) ? $_POST['nama'] : '' ?>" readonly>
        </form>
    </body>
</html>

<?php
if(isset($_POST['nama'])){
    echo "Nama Anda : " . $_POST['nama'];
}
?>
