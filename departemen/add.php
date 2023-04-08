<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Departemen</h1>
    <h4>
        <small>Tambah Data Departemen</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="kode_departemen">Kode Departemen</label>
                    <input type="text" name="kode_departemen" id="kode_departemen" class="form-control" required autofocus>
                </div>
                <div class="form-group">
                    <label for="nama_departemen">Nama Departemen</label>
                    <input type="text" name="nama_departemen" id="nama_departemen" class="form-control" required>
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="add" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>