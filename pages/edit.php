<?php
include_once("../config/config.php");

    $id = $_POST['id_kategori'];
    $nopol = $_POST['plat'];
    $keterangan = $_POST['keterangan'];
    $sql = mysqli_query($mysqli,"UPDATE tb_kategori SET nopol='$nopol', kete_kategori = '$keterangan' WHERE id_kategori='$id'");

    if ($sql) {
    //jika  berhasil tampil ini
        header("location: ../pages/table-kategori.php"); 
    } else {
    // jika gagal tampil ini
        echo "Gagal Melakukan Perubahan: ";
    }
?>