<?php $this->load->view('v_css.php') ?>


<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

 

<?php $this->load->view('v_header');?>
<?php $this->load->view('v_sidebar');?>


    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
                  <?php $akses = $this->session->userdata('level'); ?>
             <?php if ($akses == '1') { ?>
            <div class="content-body">

                <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="la la-newspaper-o font-large-2 success"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h5 class="text-muted text-bold-500">Barang</h5>
                                            <h3 class="text-bold-600"><?= $barang->barang ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="la la-shopping-cart font-large-2 warning"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h5 class="text-muted text-bold-500">Transaksi</h5>
                                            <h3 class="text-bold-600"><?= $penjualan->penjualan ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="la la-tags font-large-2 info"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h5 class="text-muted text-bold-500">Kategori</h5>
                                            <h3 class="text-bold-600"><?= $kategori->kategori ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                        <div class="card pull-up">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="media d-flex">
                                        <div class="align-self-center">
                                            <i class="la la-users font-large-2 danger"></i>
                                        </div>
                                        <div class="media-body text-right">
                                            <h5 class="text-muted text-bold-500">User</h5>
                                            <h3 class="text-bold-600"><?= $user->user ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Hospital Info cards Ends -->

         
                </div>
     <?php 
            } ?>


            </div>
              <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <?php $nama = $this->session->userdata('nama'); ?>
                                    <div class="media-body text-left">
                                        <h5 class="text-muted text-bold-500">Selamat Datang di Aplikasi Kasir Kita, <b class='text-danger'><?php echo $nama; ?></b> </h5>
                                        <h3 class="text-bold-600"></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <?php $this->load->view('v_footer.php') ?>

   
</body>


</html>