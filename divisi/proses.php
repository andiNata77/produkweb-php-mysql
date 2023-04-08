<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";


if (isset($_POST['add'])) {
    $total = $_POST['total'];
    for ($i = 1; $i <= $total; $i++) {
        $kode_divisi = trim(mysqli_real_escape_string($con, $_POST['kode_divisi-' . $i]));
        $nama_divisi = trim(mysqli_real_escape_string($con, $_POST['nama_divisi-' . $i]));
        $sql = mysqli_query($con, "INSERT INTO tb_divisi (kode_divisi, nama_divisi) VALUES ('$kode_divisi', '$nama_divisi')") or die(mysqli_error($con));
    }
    if ($sql) {
        echo "<script>alert('" . $total . " data berhasil ditambahkan'); window.location='data.php'</script>";
    } else {
        echo "<script>alert('Gagal tambah data, coba lagi'); window.location='generate.php'</script>";
    }
} else if (isset($_POST['edit'])) {
    for ($i = 0; $i < count($_POST['id']); $i++) {
        $id = $_POST['id'][$i];
        $kode_divisi = $_POST['kode_divisi'][$i];
        $nama_divisi = $_POST['nama_divisi'][$i];
        mysqli_query($con, "UPDATE tb_divisi SET kode_divisi='$kode_divisi', nama_divisi='$nama_divisi ' WHERE kode_divisi='$id'") or die(mysqli_error($con));
    }
    echo "<script>alert('Data berhasil di update'); window.location='data.php'</script>";
}
