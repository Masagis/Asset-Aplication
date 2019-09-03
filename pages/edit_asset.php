<?php

    include_once("../config/config.php");



    $id = $_POST['id_asset'];
    $nama_asset = $_POST['nama_asset'];
    $qty = $_POST['qty'];
    $tgl_perolehan = $_POST['tgl_perolehan'];
    $hrg_perolehan = $_POST['hrg_perolehan'];
    $umur_ekonomis = $_POST['umur_ekonomis'];
    $nilai_sisa = $_POST['nilai_sisa'];



    $sql = mysqli_query($mysqli,"UPDATE tb_asset SET  
        nama_asset = '$nama_asset',
        qty = '$qty',
        tgl_perolehan = '$tgl_perolehan',
        hrg_perolehan = '$hrg_perolehan',
        umur_ekonomis = '$umur_ekonomis',
        nilai_sisa = '$nilai_sisa'
        WHERE id_asset='$id'");



    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-aset.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>