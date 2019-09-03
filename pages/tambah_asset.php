<?php

    include_once("../config/config.php");

    
    $nama_asset = $_POST['nama_asset'];
    $qty = $_POST['qty'];
    $tgl_perolehan = $_POST['tgl_perolehan'];
    $hrg_perolehan = $_POST['hrg_perolehan'];
    $umur_ekonomis = $_POST['umur_ekonomis'];
    $nilai_sisa = $_POST['nilai_sisa'];
    $kategori = $_POST['kategori'];

    $cari_kode = mysqli_query($mysqli, "SELECT max(id_asset) as kode from tb_asset");
    $cari_kode = mysqli_fetch_array($cari_kode);
    $kode=substr($cari_kode['kode'],5 ,7);
    $tambah = $kode+1;

    if ($tambah<10) {
        $id_asset=$kategori."-00".$tambah;
    }elseif ($tambah<100) {
        $id_asset=$kategori."-0".$tambah;
    }else{
        $id_asset=$kategori."-".$tambah;
    }

    $sql = mysqli_query($mysqli,"INSERT INTO tb_asset(id_asset,nama_asset,qty,tgl_perolehan,hrg_perolehan,umur_ekonomis,nilai_sisa,id_kategori) VALUES 
    ('$id_asset','$nama_asset','$qty','$tgl_perolehan','$hrg_perolehan','$umur_ekonomis','$nilai_sisa','$kategori')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-aset.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>