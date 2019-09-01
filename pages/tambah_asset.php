<?php

    include_once("../config/config.php");

    
    $nama_asset = $_POST['nama_asset'];
    $qty = $_POST['qty'];
    $tgl_perolehan = $_POST['tgl_perolehan'];
    $hrg_perolehan = $_POST['hrg_perolehan'];
    $umur_ekonomis = $_POST['umur_ekonomis'];
    $nilai_sisa = $_POST['nilai_sisa'];
    $kategori = $_POST['kategori'];
    $sql = mysqli_query($mysqli,"INSERT INTO tb_asset(nama_asset,qty,tgl_perolehan,hrg_perolehan,umur_ekonomis,nilai_sisa,id_kategori) VALUES 
        ('$nama_asset','$qty','$tgl_perolehan','$hrg_perolehan','$umur_ekonomis','$nilai_sisa','$kategori')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-aset.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>