<?php
include_once("../config/config.php");
    if(isset($_POST['hapus'])) {
        $id = $_POST['id'];

        // Hapus data
        $result = mysqli_query($mysqli, "DELETE FROM tb_kategori WHERE id_kategori = '$id'");
        header("location: ../pages/table-kategori.php"); 
    }else{
    	echo "gagal";
    }
?>