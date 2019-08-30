<?php
    session_start();
    include_once("../config/config.php");
    
    if(isset($_POST['submit'])) {
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        
        $result = mysqli_query($mysqli, "INSERT INTO tb_kategori(id_kategori,nm_katagori) VALUES ('$id','$nama')");
        header("location: ../pages/table-kategori.php"); 
    }else{
        echo "Inputan salah";
    }

?>
