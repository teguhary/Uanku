<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>

    <div class="sidebar-header">
        <h3><?= $user['nama'] ?></h3>
    </div>

    <ul class="list-unstyled components">
        <li>
            <p align="center">Jumlah Tabungan</p>
        </li>
        <li>

            <p align="center">Rp. <?= rupiah($pemasukan['total'] - $pengeluaran['total'])  ?></p>
        </li>
        <li>
        <li>
            <p align="center">Tanggal :</p>
        </li>
        <li>
            <p align="center"><?= date('d-F-Y') ?> </p>
        </li>
    </ul>

    <ul class="list-unstyled CTAs">
        <li><a href="<?= base_url('auth/logout') ?>" class="article" data-toggle="modal" data-target="#logoutModal">Logout</a></li>
    </ul>

</nav>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content" style="background-color: #c7ffd8">

        <div class="container-fluid">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                <i class="fas fa-bars"></i>
                <!-- <i class="fas fa-align-left"></i> -->
            </button>

        </div>