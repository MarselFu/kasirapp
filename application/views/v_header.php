<?php $nama = $this->session->userdata('nama'); ?>

<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a class="navbar-brand" href="#"><img class="brand-logo" alt="modern admin logo"
                            src="<?= base_url() ?>app-assets/images/logo/icon.png">
                        <h3 class="brand-text">KASIR KITA</h3>
                    </a></li>
                <li class="nav-item d-md-none"><a class="nav-link open-navbar-container" data-toggle="collapse"
                        data-target="#navbar-mobile"><i class="la la-ellipsis-v"></i></a></li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                            href="#"><i class="ft-menu"></i></a></li>
                    <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand" href="#"><i
                                class="ficon ft-maximize"></i> </a></li>

                    <li class="dropdown nav-item mega-dropdown d-none d-lg-block">
                        <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Selamat Datang Aplikasi Kasir Kita, <?php echo $nama; ?><b class='text-white'></b></a>

                    </li>
                </ul>

                <ul class="nav navbar-nav float-right">



                    <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link"
                            href="#" data-toggle="dropdown"><span
                                class="mr-1 user-name text-bold-700"><?php echo $nama; ?>
                            </span><span class="avatar avatar-online"><img
                                    src="<?= base_url() ?>app-assets/images/profile.png" alt="avatar"><i></i></span></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#" data-toggle="modal" data-backdrop="false"
                                data-target="#info"><i class="ft-link"></i> Ganti Password</a>
                            <div class="dropdown-divider"></div><a class="dropdown-item"
                                href="<?= base_url('logout.js') ?>"><i class="ft-log-out"></i> Keluar</a>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</nav>
<div class="col-lg-4 col-md-6 col-sm-12">
    <div class="form-group">

        <div class="modal fade text-left" id="info" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger white">
                        <h4 class="modal-title white" id="myModalLabel11">Reset Password</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="<?php echo base_url() . 'user/reset_password' ?>" method="post">
                        <div class="modal-body">
                            <div class="col-md-12 m-b-20">


                                <div class="form-group">
                                    <label for="example-email-input" class="col-9 col-form-label">Password Baru
                                        :</label>
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="xpassword" id="example-text-input"
                                            placeholder="Masukan Password Baru"
                                            data-validation-required-message="The Confirm password field is required"
                                            minlength="5" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="example-email-input" class="col-9 col-form-label">Ulangi Password Baru
                                        :</label>
                                    <div class="col-12">
                                        <input class="form-control" type="text" name="xpassword1"
                                            id="example-text-input" placeholder="Masukan Ulang Password Baru"
                                            data-validation-required-message="The Confirm password field is required"
                                            minlength="5" required>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn grey btn-outline-secondary"
                                data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-outline-info">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>