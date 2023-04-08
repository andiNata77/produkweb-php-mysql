<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Form Produk</h1>
    <h4>
        <small>Edit Data Produk</small>
        <div class="pull-right">
            <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i>Kembali</a>
        </div>
    </h4>
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <?php
            $id = @$_GET['id'];
            $sql_produk = mysqli_query($con, "SELECT * FROM tb_produk WHERE id_produk = '$id'") or die(mysqli_error($con));
            $data = mysqli_fetch_array($sql_produk);
            ?>
            <form action="proses.php" method="post">
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="hidden" name="id" value="<?= $data['id_produk'] ?>">
                    <input type="text" name="deskripsi" id="deskripsi" class="form-control" value="<?= $data['deskripsi']; ?>" required autofocus>
                </div>
                <div class="form-group">
                    <label for="modis1">Modis1</label>
                    <input type="text" name="modis1" id="modis1" class="form-control" value="<?= $data['modis1'] ?>">
                </div>
                <div class="form-group">
                    <abel for="modis2">Modis2</abel>
                    <input type="text" name="modis2" id="modis2" class="form-control" value="<?= $data['modis2'] ?>">
                </div>
                <div class="form-group">
                    <label for="modis3">Modis3</label>
                    <input type="text" name="modis3" id="modis3" class="form-control" value="<?= $data['modis3'] ?>">
                </div>
                <div class="form-group">
                    <label for="wilayah">Wilayah</label>
                    <div>
                        <label class="radio-inline">
                            <input type="radio" name="wilayah" id="wilayah" value="LKL" required <?= $data['wilayah'] == "LKL" ? "checked" : null ?>>LKL
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="wilayah" value="NAS" <?= $data['wilayah'] == "NAS" ? "checked" : null ?>>NAS
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fraction">Fraction</label>
                    <input type="number" name="fraction" id="fraction" class="form-control" value="<?= $data['fraction'] ?>">
                </div>
                <div class="form-group">
                    <label for="panjang">Panjang</label>
                    <input type="number" name="panjang" id="panjang" class="form-control" value="<?= $data['panjang'] ?>">
                </div>
                <div class="form-group">
                    <label for="lebar">Lebar</label>
                    <input type="number" name="lebar" id="lebar" class="form-control" value="<?= $data['lebar'] ?>">
                </div>
                <div class="form-group">
                    <label for="tinggi">Tinggi</label>
                    <input type="number" name="tinggi" id="tinggi" class="form-control" value="<?= $data['tinggi'] ?>">
                </div>
                <div class="form-group">
                    <label for="kapdisp">Kapdisp</label>
                    <input type="number" name="kapdisp" id="kapdisp" class="form-control" value="<?= $data['kapdisp'] ?>">
                </div>
                <div class="form-group">
                    <label for="mindisp">Mindisp</label>
                    <input type="number" name="mindisp" id="mindisp" class="form-control" value="<?= $data['mindisp'] ?>">
                </div>
                <div class="form-group">
                    <label for="minor">Minor</label>
                    <input type="number" name="minor" id="minor" class="form-control" value="<?= $data['minor'] ?>">
                </div>
                <div class="form-group">
                    <label for="spd">SPD</label>
                    <input type="number" name="spd" id="spd" class="form-control" value="<?= $data['spd'] ?>">
                </div>
                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $data['keterangan'] ?>">
                </div>
                <div class="form-group pull-right">
                    <input type="submit" name="edit" value="Simpan" class="btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include_once('../_footer.php'); ?>