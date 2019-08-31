<?php

    include_once("../config/config.php");

    if($_POST['idx']) {

        $id = $_POST['idx'];      

        $sql = mysqli_query($mysqli,"SELECT * FROM tb_asset WHERE id_asset = $id");

        while ($result = mysqli_fetch_array($sql)){

        ?>

        <form action="edit_asset.php" method="post">

            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">

            <div class="form-group">

                <label>Id Asset</label>

                <input type="text" readonly class="form-control" name="id_asset" value="<?php echo $result['id_asset']; ?>">

            </div>

            <div class="form-group">

                <label>Nama Asset</label>

                <input type="text" class="form-control" name="nama_asset" value="<?php echo $result['nama_asset']; ?>">

            </div>

            <div class="form-group">

                <label>Quantity</label>

                <input type="text" class="form-control" name="qty" value="<?php echo $result['qty']; ?>">

            </div>

            <div class="form-group">

                <label>Tanggal Perolehan</label>

                <input type="text" class="form-control" name="tgl_perolehan" value="<?php echo $result['tgl_perolehan']; ?>">

            </div>

            <div class="form-group">

                <label>Harga Perolehan</label>

                <input type="text" class="form-control" name="hrg_perolehan" value="<?php echo $result['hrg_perolehan']; ?>">

            </div>

            <div class="form-group">

                <label>Umur Ekonomis</label>

                <input type="text" class="form-control" name="umur_ekonomis" value="<?php echo $result['umur_ekonomis']; ?>">

            </div>

            <div class="form-group">

                <label>Nilai Sisa</label>

                <input type="text" class="form-control" name="nilai_sisa" value="<?php echo $result['nilai_sisa']; ?>">

            </div>

              <button class="btn btn-primary" type="submit">Edit</button>

        </form>     

        <?php } }

?>