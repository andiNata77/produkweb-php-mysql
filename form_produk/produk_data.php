<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'tb_produk';

// Table's primary key
$primaryKey = 'id_produk';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'deskripsi', 'dt' => 0),
    array('db' => 'modis1',  'dt' => 1),
    array('db' => 'modis2',     'dt' => 2),
    array('db' => 'modis3',     'dt' => 3),
    array('db' => 'wilayah',     'dt' => 4),
    array('db' => 'fraction',     'dt' => 5),
    array('db' => 'panjang',     'dt' => 6),
    array('db' => 'lebar',     'dt' => 7),
    array('db' => 'tinggi',     'dt' => 8),
    array('db' => 'kapdisp',     'dt' => 9),
    array('db' => 'mindisp',     'dt' => 10),
    array('db' => 'minor', 'dt' => 11),
    array('db' => 'spd',     'dt' => 12),
    array('db' => 'keterangan',     'dt' => 13),
    array('db' => 'id_produk', 'dt' => 14),
);

// SQL server connection information
include_once "../_config/conn.php";


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../_assets/libs/DataTables/ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
