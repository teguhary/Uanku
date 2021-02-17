        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
                <h1 class="h3 mb-0 text-gray-800"><b>Menu utama</b></h1>
            </div>

            <!-- Content Row -->
            <?= $pesanbudget ?>
            <div class="row">

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a  href="<?= site_url('transaksi') ?>">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800">Pemasukan</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a  href="<?= site_url('transaksi/pengeluaran') ?>">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800">Pengeluaran</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a  href="<?= site_url('reminder') ?>">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800">Reminder</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <a  href="<?= site_url('tabungan') ?>">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800">Graph Tabungan</p>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chart-bar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </a>


                <!-- Content Row -->
                <div class="container">
                    <div class="row">

                        <!-- Pie Chart -->
                        <div class="col-md-6">
                            <a href="<?= site_url('details') ?>">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800" >Detail Pemasukan</p>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
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
                        </a>

                        <div class="col-md-6">
                            <a href="<?= site_url('details/pengeluaran') ?>">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header">
                                    <p class="h5 mb-0 font-weight-bold text-gray-800" >Detail Pengeluaran</p>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="pengeluaran"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <p>Total : Rp. <?= rupiah($pengeluaranbulanan['pengeluaranbulanan']) ?></p>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Makanan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Tagihan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Kebutuhan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-secondary"></i> Keinginan
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Transportasi
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>

                <!-- Content Row -->


            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container-sm">
                    <div class="copyright text-center">
                        <center>
                            <a href="https://livetrafficfeed.com/website-counter" data-time="Asia%2FBangkok" data-root="0" id="LTF_counter_href">Visitors Counter</a>
                            <script type="text/javascript" src="//cdn.livetrafficfeed.com/static/static-counter/live.v2.js"></script>
                            <noscript>
                                <a href="https://livetrafficfeed.com/website-counter">Visitors Counter</a>
                                </noscript>
                        </center>
                    </div>
                </div>
            </footer>


            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

        </div>