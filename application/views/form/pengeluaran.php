<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800">Catatan pengeluaran</h1>
        <a href="<?= base_url('utama') ?>" class=""><i class="fas fa-arrow-circle-left  fa-2x"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="POST" action="<?= base_url('transaksi/pengeluaran') ?>">
                    <div class="form-group">
                        <label for="inputAddress">Nominal</label>
                        <input type="text" class="form-control" id="inputAddress" name="nominal">
                        <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Keterangan</label>
                        <input type="text" class="form-control" id="inputAddress" name="keterangan">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select id="kategori" class="form-control" name="kategori">
                            <option value="Makanan">Makanan</option>
                            <option value="Tagihan">Tagihan</option>
                            <option value="Kebutuhan">Kebutuhan</option>
                            <option value="Keinginan">Keinginan</option>
                            <option value="Transportasi">Transportasi</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Tanggal</label>
                        <input type="date" class="form-control" id="inputAddress" name="tanggal">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary float-right mb-3">Simpan</button>

                </form>
            </div>
            <div class="col-md-3 float-md-end mb-3 ms-md-3">
                <img src="<?= base_url('assets/') ?>img/nomey.png" class="position-relative mt-4" style="width: 300px; height: 300px;">
            </div>
        </div>
    </div>
</div>