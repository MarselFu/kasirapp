<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<?php $this->load->view('v_css.php') ?>
</head>

<body class="vertical-layout vertical-menu 1-column  bg-full-screen-image blank-page" data-open="click"
    data-menu="vertical-menu" data-col="1-column">
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section class="row flexbox-container">
                    <div class="col-12 d-flex align-items-center justify-content-center">
                        <div class="col-lg-4 col-md-8 col-10 box-shadow-2 p-0">
                            <div class="card border-grey border-lighten-3 px-1 py-1 m-0">
                                <div class="card-header border-0">
                                    <div class="card-title text-center">
                                        <img src="<?= base_url() ?>app-assets/images/logo/icon.png"
                                            alt="branding logo">
                                    </div>
                                    <h6 class="card-subtitle line-on-side text-danger text-center font-small-8 pt-2">
                                        <span><B>SELAMAT DATANG DI KASIR KITA</B></span></h6>
                                </div>
                                <div class="card-content">

                                    <div class="card-body">
                                        <form  action="<?php echo base_url() . 'User/auth' ?>"
                                            method="post" role="form" style="display: block;">
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="text" name="username" class="form-control" id="user-name"
                                                    placeholder=" Username" required>
                                                <div class="form-control-position">
                                                    <i class="la la-user"></i>
                                                </div>
                                            </fieldset>
                                            <fieldset class="form-group position-relative has-icon-left">
                                                <input type="password" class="form-control" name="password"
                                                    id="user-password" placeholder="Enter Password" required>
                                                <div class="form-control-position">
                                                    <i class="la la-key"></i>
                                                </div>
                                            </fieldset>
                                            <div class="form-group row">
                                                <div class="col-sm-6 col-12 text-center text-sm-left pr-0">

                                                </div>

                                            </div>
                                            <button type="submit" class="btn btn-outline-info btn-block"><i
                                                    class="ft-unlock"></i> Masuk</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <script src="<?= base_url() ?>app-assets/vendors/js/vendors.min.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/validation/jqBootstrapValidation.js"></script>
    <script src="<?= base_url() ?>app-assets/vendors/js/forms/icheck/icheck.min.js"></script>

    <script src="<?= base_url() ?>app-assets/js/core/app-menu.js"></script>
    <script src="<?= base_url() ?>app-assets/js/core/app.js"></script>
    <script src="<?= base_url() ?>app-assets/js/scripts/forms/form-login-register.js"></script>
    <script src="<?= base_url() ?>app-assets/sweetalert/sweetalert2.all.min.js"></script>

    <?php if ($this->session->flashdata('message') == 'error') : ?>
    <script>
    Swal.fire({
        type: 'error',
        title: 'Opps!',
        text: 'Username Atau Password Salah',
        // text: 'Anda akan di arahkan dalam 2 Detik',
        // timer: 2000,
        showConfirmButton: true
    })
    </script>
    <?php endif; ?>

    <?php if ($this->session->flashdata('message') == 'warning') : ?>
    <script>
    Swal.fire({
        type: 'warning',
        title: 'Deleted!',
        icon: 'warning',
        text: 'Akun Anda Non-Aktif..!!',
        // text: 'Anda akan di arahkan dalam 2 Detik',
        // timer: 2000,
        showConfirmButton: true
    })
    </script>
    <?php endif; ?>

</body>

</html>