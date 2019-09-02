<?php
include_once("../config/config.php");
    if(isset($_POST['hapus'])) {
        $id = $_POST['id'];

        // Hapus data
        $result = mysqli_query($mysqli, "DELETE FROM tb_asset WHERE id_asset = '$id'");
        header("location: ../pages/table-aset.php"); 
    }else{
    	echo "gagal";
    }
?>