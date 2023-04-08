<?php

if (!isset($_POST['checked'])) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location='data.php';</script>";
} else {
    include_once('../_header.php'); ?>
    <div class="box">
        <h1>Divisi Produk</h1>
        <h4>
            <small>Edit Divisi Produk</small>
            <div class="pull-right">
                <a href="data.php" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-chevron-left"></i> Kembali</a>
            </div>
        </h4>
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <form action="proses.php" method="post">
                    <input type="hidden" name="total" value="<?= $_POST['count_add'] ?>">
                    <table class="table">
                        <tr>
                            <th>No.</th>
                            <th>Kode Divisi</th>
                            <th>Nama Divisi</th>
                        </tr>
                        <?php
                        $chk = $_POST['checked'];
                        $no = 1;
                        foreach ($chk as $id) {
                            $sql_divisi = mysqli_query($con, "SELECT * FROM tb_divisi WHERE kode_divisi = '$id'") or die(mysqli_error($con));
                            while ($data = mysqli_fetch_array($sql_divisi)) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <input type="hidden" name="id[]" value="<?= $data['kode_divisi'] ?>">
                                        <input type="text" name="kode_divisi[]" value="<?= $data['kode_divisi'] ?>" class="form-control" required>
                                    </td>
                                    <td>
                                        <input type="text" name="nama_divisi[]" value="<?= $data['nama_divisi'] ?>" class="form-control" required>
                                    </td>
                                </tr>
                        <?php
                            }
                        }
                        ?>
                    </table>
                    <div class="form-group pull-right">
                        <input type="submit" name="edit" value="Simpan semua" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    <?php
    include_once('../_footer.php');
}
    ?>