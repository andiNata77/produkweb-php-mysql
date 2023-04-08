<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Departemen</h1>
    <h4>
        <small>Data Departemen</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Departemen</a>
        </div>
    </h4>
    <form name="proses" method="post">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="departemen">
                <thead>
                    <tr>
                        <th>
                            <center>
                                <input type="checkbox" id="select_all" value="">
                            </center>
                        </th>
                        <th>No.</th>
                        <th>Kode Departemen</th>
                        <th>Nama Departemen</th>
                        <th><i class="glyphicon glyphicon-cog"><i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql_dept = mysqli_query($con, "SELECT * FROM tb_departemen") or die(mysqli_error($con));
                    while ($data = mysqli_fetch_array($sql_dept)) { ?>
                        <tr>
                            <td align="center">
                                <input type="checkbox" name="checked[]" class="check" value="<?= $data['kode_departemen'] ?>">
                            </td>
                            <td><?= $no++ ?>.</td>
                            <td><?= $data['kode_departemen'] ?></td>
                            <td><?= $data['nama_departemen'] ?></td>
                            <td align="center">
                                <a href="edit.php?id=<?= $data['kode_departemen'] ?>" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-edit"></i></a>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </form>

    <div class="box pull-right">
        <button class="btn btn-danger btn-sm" onclick="hapus()"><i class="glyphicon glyphicon-trash"></i>Hapus</button>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#departemen').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [0, 4]
            }],
            "order": [1, "asc"]
        });
        $('#select_all').on('click', function() {
            if (this.checked) {
                $('.check').each(function() {
                    this.checked = true;
                })
            } else {
                $('.check').each(function() {
                    this.checked = false;
                });
            }
        });
        $('.check').on('click', function() {
            if ($('.check:checked').length == $('.check').length) {
                $('#select_all').prop('checked', true)
            } else {
                $('#select_all').prop('checked', false)
            }
        });
    });

    function hapus() {
        var conf = confirm('Yakin akan menghapus data?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }

    }
</script>

<?php include_once('../_footer.php'); ?>