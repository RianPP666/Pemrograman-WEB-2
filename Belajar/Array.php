<?php
$value = array(1,2,3,4,5);
var_dump($value); // informasi detail suatu variabel

$contoh = array(
    "Nama" => "Rian Putra Pratama",
    "Umur" => 20,
    "Jenis Kelamin" => "Laki-laki"
);
echo $contoh["Nama"];

echo "\n";

$contoh2 = array(
    "NIM" => 1234,
    "Alamat" => array(
        "Kota" => "Bandung",
        "Provinsi" => "Jawa Barat"
    )
);

echo $contoh2["Alamat"]["Kota"];
?>