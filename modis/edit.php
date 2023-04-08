<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Modis</h1>
    <h4>
        <small>Edit Data Modis</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_modis = mysqli_query($con, "SELECT * FROM tb_modis WHERE id_modis = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql_modis);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="klsmodis">Kelas Modis</label>
                    <input type="hidden" name="id" value="<?= $data['id_modis'] ?>">
                    <input type="number" name="klsmodis" id="klsmodis" class="form-control" value="<?= $data['kelas_modis'] ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="kdmodis">Kode Modis</label>
                    <input type="text" name="kdmodis" id="kdmodis" class="form-control" value="<?= $data['kode_modis'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="nmmodis">Nama Modis</label>
                    <input type="text" name="nmmodis" id="nmmodis" class="form-control" value="<?= $data['nama_modis'] ?>" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>