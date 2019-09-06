<?php

    include_once("../config/config.php");

    $id = $_POST['id'];
    $nopol = $_POST['plat'];
    $keterangan= $_POST['keterangan'];
    $sql = mysqli_query($mysqli,"INSERT INTO tb_kategori(id_kategori,nopol,kete_kategori) VALUES ('$id','$nopol','$keterangan')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-kategori.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>