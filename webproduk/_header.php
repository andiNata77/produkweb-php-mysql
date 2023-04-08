<?php
require_once "_config/config.php";
require "_assets/libs/vendor/autoload.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url('auth/login.php') . "';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Aplikasi Pendaftaran Produk</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('_assets/css/bootstrap.min.css" rel="stylesheet'); ?>">
    <link href="<?= base_url('_assets/css/simple-sidebar.css" rel="stylesheet'); ?>">
    <link href="<?= base_url('_assets/libs/DataTables/datatables.min.css" rel="stylesheet'); ?>">
    <link rel="icon" href="<?= base_url('/_assets/iconxyz.png'); ?>">


</head>

<body>
    <script src="<?= base_url('_assets/js/jquery.js') ?>"></script>
    <script src="<?= base_url('_assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('_assets/libs/DataTables/datatables.min.js') ?>"></script>
    <div id="wrapper">
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="text-primary"><?= date("l, d-M-Y"); ?></li>
                <li class="sidebar-brand">
                    <a href=""><span class="text-primary">
                            <marquee><b>Aplikasi Produk</b></marquee>
                        </span></a>
                </li>
                <li>
                    <a href="<?= base_url('dashboard') ?>">Dashboard</a>
                </li>
                <li>
                    <a href="<?= base_url('departemen/data.php') ?>">Departemen Produk</a>
                </li>
                <li>
                    <a href="<?= base_url('divisi/data.php') ?>">Divisi Produk</a>
                </li>
                <li>
                    <a href="<?= base_url('modis/data.php') ?>">Modis Produk</a>
                </li>
                <li>
                    <a href="<?= base_url('form_produk/data.php') ?>">Form Produk</a>
                </li>
                <li>
                    <a href="<?= base_url('auth/logout.php') ?>"><span class="text-danger">Logout</span></a>
                </li>
            </ul>
        </div>
        <div id="page-content-wrapper">
            <div class="container-fluid">