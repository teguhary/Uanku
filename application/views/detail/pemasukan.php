        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 font-weight-bold text-gray-800">Detail Pemasukan <?= $bulan ?> <?= $tahun ?></h1>

                <a href="<?= base_url('utama') ?>" class=""><i class="fas fa-arrow-circle-left  fa-2x"></i></a>
            </div>

            <!-- Content Row -->
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->



                <!-- Content Row -->

                <div class="container">
                    <?= $this->session->flashdata('message'); ?>
                    <form class="user" method="POST">
                        <div class="form-group mb-3 col-12">
                            <label for="bulantahun">Masukan Bulan dan Tahun</label>
                            <input type="month" class="form-control" id="bulantahun" name="bulantahun">
                            <button type="submit" class="btn btn-primary mt-3">Go</button>
                    </form>
                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col">
                            <div class="card shadow mb-4 mt-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <p class="m-0 font-weight-bold text-gray-800" href="">Detail</p>
                                </div>
                                <!-- Card Body -->

                                <div class="card-body overflow-auto" style="max-height: 408px;">
                                    <table class="table">
                                        <p><?= $pesan ?></p>
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nominal</th>
                                                <th scope="col">Keterangan</th>
                                                <th scope="col">Kategori</th>
                                                <th scope="col">Tanggal</th>
                                                <th scope="col">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1 ?>
                                            <?php foreach ($dtlpemasukan as $p) : ?>
                                                <tr>
                                                    <th scope="row"><?= $i ?></th>
                                                    <td><?= rupiah($p['nominal']) ?></td>
                                                    <td><?= $p['keterangan'] ?></td>
                                                    <td><?= $p['kategori'] ?></td>
                                                    <td><?= $p['tanggal'] ?></td>
                                                    <td>
                                                        <a href="<?= base_url('crud/index/') ?><?= $p['id'] ?>" class="badge badge-pill badge-warning">Edit</a>
                                                        <a href="" class="badge badge-pill badge-danger" data-toggle="modal" onclick="confirm_modal('<?= base_url('crud/hapus/') ?><?= $p['id'] ?>','title');" data-target="modal_delete_m_n">Hapus</a>
                                                    </td>
                                                    <?php $i++ ?>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card shadow mb-4 mt-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <p class="m-0 font-weight-bold text-gray-800" href="">Pemasukan</p>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <p><?= $pesan ?></p>
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="pemasukan"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <p>Total : Rp. <?= rupiah($pemasukanbulanan['pemasukanbulanan'])  ?></p>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Gaji
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Penjualan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Pemberian
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Content Row -->


                    </div>

                </div>
                <!-- End of Content Wrapper -->

            </div>
            <div class="modal fade" id="modal_delete_m_n" data-backdrop="static" data-keyboard="false">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hapus data transaksi</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Apakah anda yakin untuk menghapus data transaksi?</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal" id="delete_cancel_link">Batal</button>
                            <a class="btn btn-primary" id="delete_link_m_n">Hapus</a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                function confirm_modal(delete_url, title) {
                    jQuery('#modal_delete_m_n').modal('show', {
                        backdrop: 'static',
                        keyboard: false
                    });
                    jQuery("#modal_delete_m_n .grt").text(title);
                    document.getElementById('delete_link_m_n').setAttribute("href", delete_url);
                    document.getElementById('delete_link_m_n').focus();
                }
            </script>