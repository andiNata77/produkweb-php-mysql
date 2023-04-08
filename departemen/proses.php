<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

if (isset($_POST['add'])) {
    $kode_departemen = trim(mysqli_real_escape_string($con, $_POST['kode_departemen']));
    $nama_departemen = trim(mysqli_real_escape_string($con, $_POST['nama_departemen']));
    mysqli_query($con, "INSERT INTO tb_departemen (kode_departemen, nama_departemen) VALUES ('$kode_departemen','$nama_departemen')") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $kode_departemen = trim(mysqli_real_escape_string($con, $_POST['kode_departemen']));
    $nama_departemen = trim(mysqli_real_escape_string($con, $_POST['nama_departemen']));
    mysqli_query($con, "UPDATE tb_departemen SET kode_departemen = '$kode_departemen',nama_departemen ='$nama_departemen'    WHERE kode_departemen = '$id'") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
}
