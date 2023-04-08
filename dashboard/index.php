<?php include_once('../_header.php'); ?>
<link href="<?= base_url('/_assets/css/styless.css" rel="stylesheet'); ?>">
<style>
.warna {
    color: tomato;
    font-weight: bold;
}
</style>
</div>

<div class="row">
    <div class="col-lg-12">
        <a href="<?= base_url('dashboard') ?>"><img src="../_assets/iconxyz.png" alt="idm" width="100"></a>
        <h3>Selamat datang <span class="warna"><?= ($_SESSION['user']); ?> </span>di Website Aplikasi Pendaftaran Produk
        </h3>
        <a href="#menu-toggle" class="btn btn-primary" id="menu-toggle">Menu</a>
    </div>
</div>
<?php include_once('../_footer.php'); ?>