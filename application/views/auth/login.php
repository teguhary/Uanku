<div class="row justify-content-between">
    <div class="col-sm-7 align-self-center">
        <div class="container">
            <h1 class="my-5 pt-5" style="color: #fff; font-family: Century Gothic; text-shadow: 3px 3px 4px #000; font-weight:bold;">Catat, Atur, dan Rekap Perencanaan keuangan anda.</h1>
        </div>
    </div>
    <div class="col-sm-5">
        <div class="card-transparent o-hidden border-0 my-5">
            <div class="card-body rounded" style="background-color: rgba(245, 245, 245, 0.4);">
                <!-- Nested Row within Card Body -->
                <div class="text-center">
                    <i class="fas fa-user-circle fa-9x"></i>
                </div>
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="POST" action="<?= base_url('auth') ?>">
                    <div class="form-group m-3">
                        <label class="form-label font-weight-bold" style="color: #fff; font-family: Century Gothic ;">E-mail</label>
                        <input type="email" class="form-control form-control-user border-dark" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="" name="email" value="<?= set_value('email') ?>">
                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class=" form-group m-3">
                        <label class="form-label font-weight-bold" style="color: #fff; font-family: Century Gothic ;">Password</label>
                        <input type="password" class="form-control form-control-user border-dark" id="exampleInputPassword" placeholder="" name="password">
                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="text-center mt-5">
                        <a href="<?= base_url('auth/register') ?>" class="btn font-weight-bold pr-4 pl-4 m-3" style="background-color: #148363; color: #fff; font-family: Century Gothic ;">
                            Daftar
                        </a>
                        <button type="submit" class="btn font-weight-bold pr-4 pl-4 m-3" style="background-color: #56BA3E; color: #fff; font-family: Century Gothic ;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

</div>

</div>