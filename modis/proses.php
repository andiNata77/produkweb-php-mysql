<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepencyException;
//UUID versi 4
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $kelas_modis = trim(mysqli_real_escape_string($con, $_POST['klsmodis']));
    $kode_modis = trim(mysqli_real_escape_string($con, $_POST['kdmodis']));
    $nama_modis = trim(mysqli_real_escape_string($con, $_POST['nmmodis']));
    mysqli_query($con, "INSERT INTO tb_modis (id_modis, kelas_modis, kode_modis, nama_modis) VALUES ('$uuid','$kelas_modis','$kode_modis','$nama_modis')") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kelas_modis = trim(mysqli_real_escape_string($con, $_POST['klsmodis']));
    $kode_modis = trim(mysqli_real_escape_string($con, $_POST['kdmodis']));
    $nama_modis = trim(mysqli_real_escape_string($con, $_POST['nmmodis']));
    mysqli_query($con, "UPDATE tb_modis SET kelas_modis = '$kelas_modis', kode_modis = '$kode_modis', nama_modis = '$nama_modis' WHERE id_modis = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['import'])) {
    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-" . round(microtime(true)) . "." . end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../_file/";
    $target_file = $target_dir . $file_name;
    move_uploaded_file($sumber, $target_file);

    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    $sql = "INSERT INTO tb_modis (id_modis, kelas_modis, kode_modis, nama_modis)
            VALUES";
    for ($i = 3; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $klsmodis = $all_data[$i]['A'];
        $kdmodis = $all_data[$i]['B'];
        $nmmodis = $all_data[$i]['C'];
        $sql .= "('$uuid','$klsmodis', '$kdmodis', '$nmmodis'),";
    }
    $sql = substr($sql, 0, -1);
    //echo $sql;
    mysqli_query($con, $sql) or die(mysqli_error($con));
    unlink($target_file);
    echo "<script>window.location='data.php';</script>";
}
