<?php

    include_once("../config/config.php");

    $kategori = $_POST['nama'];
    $sql = mysqli_query($mysqli,"INSERT INTO tb_kategori(nm_katagori) VALUES ('$kategori')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-kategori.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>