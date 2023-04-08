<?php include_once('../_header.php'); ?>

<div class="box">
    <h1>Form Produk</h1>
    <h4>
        <small>Data Form Produk</small>
        <div class="pull-right">
            <a href="" class="btn btn-default btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
            <a href="add.php" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i>Tambah Produk</a>
            <a href="import.php" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-import"></i>Import Produk</a>
        </div>
    </h4>
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" id="produk">
            <thead>
                <tr>
                    <th>Deskripsi Produk</th>
                    <th>Modis1</th>
                    <th>Modis2</th>
                    <th>Modis3</th>
                    <th>Wilayah</th>
                    <th>Fraction</th>
                    <th>Panjang</th>
                    <th>Lebar</th>
                    <th>Tinggi</th>
                    <th>Kapdisp</th>
                    <th>Mindisp</th>
                    <th>Minor</th>
                    <th>SPD</th>
                    <th>Keterangan</th>
                    <th><i class="glyphicon glyphicon-cog"></i></th>
                </tr>
            </thead>
        </table>
    </div>
    <script>
        $(document).ready(function() {
            $('#produk').DataTable({
                processing: true,
                serverSide: true,
                ajax: 'produk_data.php',
                //scrollY: '250px',
                dom: 'Bfrtip',
                buttons: [{
                        extend: 'pdf',
                        orientation: 'landscape',
                        pageSize: 'Legal',
                        title: 'Form Produk Baru',
                        download: 'open'
                    },
                    'excel', 'csv', 'print', 'copy'
                ],
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": 14,
                    "render": function(data, type, row) {
                        var btn = "<center><a href=\"edit.php?id=" + data + "\" class=\"btn btn-warning btn-xs\"><i class=\"glyphicon glyphicon-edit\"></i></a> <a href=\"del.php?id=" + data + "\" onclick=\"return confirm('Yakin menghapus data?')\" class=\"btn btn-danger btn-xs\"><i class=\"glyphicon glyphicon-trash\"</i></a></center>";
                        return btn;
                    }
                }]
            });
        });
    </script>
</div>

<?php include_once('../_footer.php'); ?>