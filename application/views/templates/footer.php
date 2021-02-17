<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin untuk keluar dari aplikasi?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <a class="btn btn-primary" href="<?= base_url('auth/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/jquery/jquery.mask.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/') ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/') ?>js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="<?= base_url('assets/') ?>vendor/chart.js/Chart.min.js"></script>
<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- jQuery Custom Scroller CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>



<script type="text/javascript">
    $(document).ready(function() {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#dismiss, .overlay').on('click', function() {
            $('#sidebar').removeClass('active');
            $('.overlay').removeClass('active');
        });

        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').addClass('active');
            $('.overlay').addClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
</script>

<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("pemasukan");
    var pemasukan = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Gaji", "Penjualan", "Pemberian"],
            datasets: [{
                data: ["<?= $gaji['gaji'] ?>", "<?= $penjualan['penjualan'] ?>", "<?= $pemberian['pemberian'] ?>"],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<script>
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("pengeluaran");
    var pengeluaran = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Makanan", "Tagihan", "Kebutuhan", 'Keinginan', 'Transportasi'],
            datasets: [{
                data: ["<?= $makanan['makanan'] ?>", "<?= $tagihan['tagihan'] ?>", "<?= $kebutuhan['kebutuhan'] ?>", "<?= $keinginan['keinginan'] ?>", "<?= $transportasi['transportasi'] ?>"],
                backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc', '#D6DCED', '#494B55'],
                hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },
        options: {
            maintainAspectRatio: false,
            tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
            },
            legend: {
                display: false
            },
            cutoutPercentage: 80,
        },
    });
</script>
<script>
    var ctx = document.getElementById('bulanan').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                    label: 'Pemasukan',
                    backgroundColor: 'rgb(74, 178, 101)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: ["<?= $ibulan1['bulan1'] ?>",
                        "<?= $ibulan2['bulan2'] ?>",
                        "<?= $ibulan3['bulan3'] ?>",
                        "<?= $ibulan4['bulan4'] ?>",
                        "<?= $ibulan5['bulan5'] ?>",
                        "<?= $ibulan6['bulan6'] ?>",
                        "<?= $ibulan7['bulan7'] ?>",
                        "<?= $ibulan8['bulan8'] ?>",
                        "<?= $ibulan9['bulan9'] ?>",
                        "<?= $ibulan10['bulan10'] ?>",
                        "<?= $ibulan11['bulan11'] ?>",
                        "<?= $ibulan12['bulan12'] ?>"
                    ]
                },
                {
                    label: 'Pengeluaran',
                    backgroundColor: 'rgb(17, 40, 53)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: ["<?= $obulan1['bulan1'] ?>",
                        "<?= $obulan2['bulan2'] ?>",
                        "<?= $obulan3['bulan3'] ?>",
                        "<?= $obulan4['bulan4'] ?>",
                        "<?= $obulan5['bulan5'] ?>",
                        "<?= $obulan6['bulan6'] ?>",
                        "<?= $obulan7['bulan7'] ?>",
                        "<?= $obulan8['bulan8'] ?>",
                        "<?= $obulan9['bulan9'] ?>",
                        "<?= $obulan10['bulan10'] ?>",
                        "<?= $obulan11['bulan11'] ?>",
                        "<?= $obulan12['bulan12'] ?>"
                    ]
                }

            ]
        },

        // Configuration options go here
        options: {}
    });
</script>
<script>
    var ctx = document.getElementById('harian').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'],
            datasets: [{
                    label: 'Pemasukan',
                    backgroundColor: 'rgb(74, 178, 101)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: ["<?= $isenin['senin'] ?>",
                        "<?= $iselasa['selasa'] ?>",
                        "<?= $irabu['rabu'] ?>",
                        "<?= $ikamis['kamis'] ?>",
                        "<?= $ijumat['jumat'] ?>",
                        "<?= $isabtu['sabtu'] ?>",
                        "<?= $iminggu['minggu'] ?>"
                    ]
                },
                {
                    label: 'Pengeluaran',
                    backgroundColor: 'rgb(17, 40, 53)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: ["<?= $osenin['senin'] ?>",
                        "<?= $oselasa['selasa'] ?>",
                        "<?= $orabu['rabu'] ?>",
                        "<?= $okamis['kamis'] ?>",
                        "<?= $ojumat['jumat'] ?>",
                        "<?= $osabtu['sabtu'] ?>",
                        "<?= $ominggu['minggu'] ?>"
                    ]
                }

            ]
        },

        // Configuration options go here
        options: {}
    });
</script>
<script>
    var ctx = document.getElementById('tahunan').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',

        // The data for our dataset
        data: {
            labels: [<?= $beforelastyear ?>, <?= $lastyear ?>, <?= $thisyear ?>],
            datasets: [{
                    label: 'Pemasukan',
                    backgroundColor: 'rgb(74, 178, 101)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?= $ibeforelastyear['beforelastyear'] ?>,
                        <?= $ilastyear['lastyear'] ?>,
                        <?= $ithisyear['thisyear'] ?>,
                    ]
                },
                {
                    label: 'Pengeluaran',
                    backgroundColor: 'rgb(17, 40, 53)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: [<?= $obeforelastyear['beforelastyear'] ?>,
                        <?= $olastyear['lastyear'] ?>,
                        <?= $othisyear['thisyear'] ?>,
                    ]
                }

            ]
        },

        // Configuration options go here
        options: {}
    });
</script>
</body>

</html>