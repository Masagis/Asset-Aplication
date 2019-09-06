<?php

    include_once("../config/config.php");

    
    $kategori = $_POST['kategori'];
    $nopol = $_POST['plat'];
    $kete_aset = $_POST['keterangan'];
    $tgl_perolehan = $_POST['tgl_perolehan'];
    $hrg_baku = $_POST['hrg_baku'];
    $umur_ekonomis = $_POST['umur_ekonomis'];
    $nilai_sisa = $_POST['nilai_sisa'];
    

    $cari_kode = mysqli_query($mysqli, "SELECT max(id_asset) as kode from tb_asset");
    $cari_kode = mysqli_fetch_array($cari_kode);
    $kode=substr($cari_kode['kode'],5 ,7);
    $tambah = $kode+1;

    if ($tambah=='R2'){
        if ($tambah<10) {
            $id_asset=$kategori."-00".$tambah;
        }elseif ($tambah<100) {
            $id_asset=$kategori."-0".$tambah;
        }else{
            $id_asset=$kategori."-".$tambah;
        }
    }else{
        if ($tambah<10) {
            $id_asset=$kategori."-00".$tambah;
        }elseif ($tambah<100) {
            $id_asset=$kategori."-0".$tambah;
        }else{
            $id_asset=$kategori."-".$tambah;
        }
    }

    $sql = mysqli_query($mysqli,"INSERT INTO tb_asset(id_asset,nopol,kete_aset,tgl_perolehan,hrg_baku,umur_ekonomis,nilai_sisa) VALUES 
    ('$id_asset','$nopol','$kete_aset','$tgl_perolehan','$hrg_baku','$umur_ekonomis','$nilai_sisa')");

    if ($sql) {

        //jika  berhasil tampil ini

        header("location: ../pages/table-aset.php"); 

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>