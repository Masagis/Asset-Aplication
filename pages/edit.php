<?php

    include_once("../config/config.php");



    $id = $_POST['id_kategori'];

    $kategori = $_POST['nama'];






    $sql = mysqli_query($mysqli,"UPDATE tb_kategori SET  nm_katagori = '$kategori' WHERE id_kategori=$id");



    if ($sql) {

        //jika  berhasil tampil ini

        echo "Data Berhasil Diubah"."</br>";

        echo "<a href='table-kategori.php'>Kembali Ke Halaman Depan</a>";

    } else {

        // jika gagal tampil ini

        echo "Gagal Melakukan Perubahan: ";

    }

?>