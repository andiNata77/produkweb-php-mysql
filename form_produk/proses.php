<?php
require_once "../_config/config.php";
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDepencyException;
//UUID versi 4
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $deskripsi = trim(mysqli_real_escape_string($con, $_POST['deskripsi']));
    $modis1 = trim(mysqli_real_escape_string($con, $_POST['modis1']));
    $modis2 = trim(mysqli_real_escape_string($con, $_POST['modis2']));
    $modis3 = trim(mysqli_real_escape_string($con, $_POST['modis3']));
    $wilayah = trim(mysqli_real_escape_string($con, $_POST['wilayah']));
    $fraction = trim(mysqli_real_escape_string($con, $_POST['fraction']));
    $panjang = trim(mysqli_real_escape_string($con, $_POST['panjang']));
    $lebar = trim(mysqli_real_escape_string($con, $_POST['lebar']));
    $tinggi = trim(mysqli_real_escape_string($con, $_POST['tinggi']));
    $kapdisp = trim(mysqli_real_escape_string($con, $_POST['kapdisp']));
    $mindisp = trim(mysqli_real_escape_string($con, $_POST['mindisp']));
    $minor = trim(mysqli_real_escape_string($con, $_POST['minor']));
    $spd = trim(mysqli_real_escape_string($con, $_POST['spd']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    mysqli_query($con, "INSERT INTO tb_produk (id_produk, deskripsi, modis1, modis2, modis3, wilayah, fraction, panjang, lebar, tinggi, kapdisp, mindisp,minor, spd, keterangan) VALUES ('$uuid','$deskripsi','$modis1','$modis2','$modis3','$wilayah','$fraction','$panjang','$lebar','$tinggi','$kapdisp','$mindisp','$minor','$spd','$keterangan')") or die(mysqli_error($con));
    echo "<script>window.location='data.php';</script>";
} else if (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $deskripsi = trim(mysqli_real_escape_string($con, $_POST['deskripsi']));
    $modis1 = trim(mysqli_real_escape_string($con, $_POST['modis1']));
    $modis2 = trim(mysqli_real_escape_string($con, $_POST['modis2']));
    $modis3 = trim(mysqli_real_escape_string($con, $_POST['modis3']));
    $wilayah = trim(mysqli_real_escape_string($con, $_POST['wilayah']));
    $fraction = trim(mysqli_real_escape_string($con, $_POST['fraction']));
    $panjang = trim(mysqli_real_escape_string($con, $_POST['panjang']));
    $lebar = trim(mysqli_real_escape_string($con, $_POST['lebar']));
    $tinggi = trim(mysqli_real_escape_string($con, $_POST['tinggi']));
    $kapdisp = trim(mysqli_real_escape_string($con, $_POST['kapdsip']));
    $mindisp = trim(mysqli_real_escape_string($con, $_POST['mindisp']));
    $minor = trim(mysqli_real_escape_string($con, $_POST['minor']));
    $spd = trim(mysqli_real_escape_string($con, $_POST['spd']));
    $keterangan = trim(mysqli_real_escape_string($con, $_POST['keterangan']));
    mysqli_query($con, "UPDATE tb_produk SET deskripsi = '$deskripsi',  modis1= '$modis1', modis2= '$modis2',modis3= '$modis3',wilayah= '$wilayah',fraction='$fraction', panjang='$panjang', lebar='$lebar', tinggi='$tinggi', kapdisp='$kapdisp', mindisp='$mindisp',minor='$minor', spd='$spd', keterangan= '$keterangan' WHERE id_produk = '$id'") or die(mysqli_error($con));
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

    $sql = "INSERT INTO tb_produk (id_produk,deskripsi,modis1,modis2,modis3,wilayah,fraction,panjang,lebar,tinggi,kapdisp,mindisp,minor,spd,keterangan)
            VALUES";
    for ($i = 14; $i <= count($all_data); $i++) {
        $uuid = Uuid::uuid4()->toString();
        $deskripsi = $all_data[$i]['A'];
        $modis1 = $all_data[$i]['B'];
        $modis2 = $all_data[$i]['C'];
        $modis3 = $all_data[$i]['D'];
        $wilayah = $all_data[$i]['E'];
        $fraction = $all_data[$i]['F'];
        $panjang = $all_data[$i]['G'];
        $lebar = $all_data[$i]['H'];
        $tinggi = $all_data[$i]['I'];
        $kapdisp = $all_data[$i]['J'];
        $mindisp = $all_data[$i]['K'];
        $minor = $all_data[$i]['L'];
        $spd = $all_data[$i]['M'];
        $keterangan = $all_data[$i]['N'];
        $sql .= "('$uuid','$deskripsi','$modis1','$modis2','$modis3','$wilayah','$fraction','$panjang','$lebar','$tinggi','$kapdisp','$mindisp','$minor','$spd','$keterangan'),";
    }
    $sql = substr($sql, 0, -1);
    //echo $sql;
    mysqli_query($con, $sql) or die(mysqli_error($con));
    unlink($target_file);
    echo "<script>window.location='data.php';</script>";
}
