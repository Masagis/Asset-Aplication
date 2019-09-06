<?php
include_once("../config/config.php");

    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = mysqli_query($mysqli,"SELECT * FROM tb_kategori WHERE id_kategori = '$id'");
        while ($result = mysqli_fetch_array($sql)){
        ?>

        <form action="edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

            <div class="form-group">
                <label>Id Kategori</label>
                <input type="text" readonly class="form-control" name="id_kategori" value="<?php echo $result['id_kategori']; ?>">
            </div>

            <div class="form-group">
                <label>Nomor Polisi / Plat Kendaraan</label>
                <input type="text" class="form-control" name="plat" value="<?php echo $result['nopol']; ?>">
            </div>

            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" class="form-control" name="keterangan" value="<?php echo $result['kete_kategori']; ?>">
            </div>

            <button class="btn btn-primary" type="submit">Edit</button>
        </form>     
        <?php 
        } 
    }
?>