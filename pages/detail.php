<?php

    include_once("../config/config.php");

    if($_POST['idx']) {

        $id = $_POST['idx'];      

        $sql = mysqli_query($mysqli,"SELECT * FROM tb_kategori WHERE id_kategori = $id");

        while ($result = mysqli_fetch_array($sql)){

        ?>

        <form action="edit.php" method="post">

            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

            <div class="form-group">

                <label>Id Kategori</label>

                <input type="text" readonly class="form-control" name="id_kategori" value="<?php echo $result['id_kategori']; ?>">

            </div>

            <div class="form-group">

                <label>Nama Kategori</label>

                <input type="text" class="form-control" name="nama" value="<?php echo $result['nm_katagori']; ?>">

            </div>

            <button class="btn btn-primary" type="submit">Edit</button>

        </form>     

        <?php } }

?>