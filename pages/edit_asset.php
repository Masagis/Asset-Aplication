<?php
    include_once("../config/config.php");

    $id = $_POST['id_asset'];
    $nopol = $_POST['plat'];
    $kete_aset = $_POST['keterangan'];
    $tgl_perolehan = $_POST['tgl_perolehan'];
    $hrg_baku = $_POST['hrg_baku'];
    $umur_ekonomis = $_POST['umur_ekonomis'];
    $nilai_sisa = $_POST['nilai_sisa'];

    $sql = mysqli_query($mysqli,"UPDATE tb_asset SET  
        nopol = '$nopol',
        kete_aset = '$kete_aset',
        tgl_perolehan = '$tgl_perolehan',
        hrg_baku = '$hrg_baku',
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