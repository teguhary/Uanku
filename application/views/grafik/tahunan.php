<div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
    <h1 class="h3 mb-0 text-gray-800"></h1>
    <a href="<?= base_url('utama') ?>" class=""><i class="fas fa-arrow-circle-left  fa-2x"></i></a>
</div>
<ul class="nav justify-content-center">
    <li class="nav-item mr-2">
        <a type="button" class="btn btn-success" href="<?= base_url('tabungan') ?>">Hari</a>
    </li>
    <li class="nav-item mr-2">
        <a type="button" class="btn btn-success" href="<?= base_url('tabungan/bulanan') ?>">Bulan</a>
    </li>
    <li class="nav-item mr-2">
        <a type="button" class="btn btn-success" href="<?= base_url('tabungan/tahunan') ?>">Tahun</a>
    </li>
</ul>
<div class="container mt-3">
    <?= $pesan ?>
    <canvas id="tahunan"></canvas>

</div>