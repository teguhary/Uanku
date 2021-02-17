<div class="container-fluid">


    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-4">
        <h1 class="h3 mb-0 font-weight-bold text-gray-800">Setting reminder</h1>
        <a href="<?= base_url('utama') ?>" class=""><i class="fas fa-arrow-circle-left  fa-2x"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="POST" action="<?= base_url('reminder') ?>">
                    <div class="form-group">
                        <label for="inputAddress">Nominal</label>
                        <input type="text" class="form-control" id="inputAddress" name="nominal" value="<?= $reminder['nominal'] ?>">
                        <?= form_error('nominal', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Dari Tanggal</label>
                        <input type="date" class="form-control" id="inputAddress" name="tanggal" value="<?= $reminder['tgl_awal'] ?>">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Hingga Tanggal</label>
                        <input type="date" class="form-control" id="inputAddress" name="tanggal1" value="<?= $reminder['tgl_akhir'] ?>">
                        <?= form_error('keterangan', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>

                    <button type="submit" class="btn btn-primary float-right mb-3">Simpan</button>

                </form>
                <?php if ($reminder) : ?>
                    <a href="<?= base_url('reminder/hapus') ?>" class="btn btn-danger float-left mb-3" data-toggle="modal" data-target="#hapus3">Hapus</a>
                <?php endif ?>
            </div>
            <div class="col-md-3 float-md-end mb-3 ms-md-3 mt-3">
                <img src="<?= base_url('assets/') ?>img/nomey.png" class="position-relative " style="width: 300px; height: 300px;">
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="hapus3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus reminder</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Apakah anda yakin untuk menghapus reminder?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="<?= base_url('reminder/hapus') ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>