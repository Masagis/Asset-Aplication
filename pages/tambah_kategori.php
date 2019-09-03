<?php

    include_once("../config/config.php");

    $id = $_POST['id'];
    $kategori = $_POST['nama'];
    $sql = mysqli_query($mysqli,"INSERT INTO tb_kategori(id_kategori, nm_katagori) VALUES ('$id','$kategori')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-kategori.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>