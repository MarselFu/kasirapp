<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="<?= base_url() . 'dashboard.js' ?>"><i class="la la-home"></i><span
                        class="menu-title" data-i18n="eCommerce">Beranda</span></a>
            </li>
              <?php $akses = $this->session->userdata('level'); ?>
             <?php if ($akses == '1') { ?>

            <li class=" nav-item"><a href="#"><i class="la la-tags"></i><span class="menu-title"
                        data-i18n="Invoice">Kategori Barang</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="kategori-barang.js"><i></i><span
                                data-i18n="Invoice Summary"><i class="la la-angle-double-right"></i> Kategori</span></a>
                    </li>
                  

                </ul>
            </li>

            <li class=" nav-item"><a href="#"><i class="la la-pencil-square"></i><span class="menu-title"
                        data-i18n="Payments">Data Barang</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="barang.js"><i
                                class="la la-angle-double-right"></i><span>
                                Barang</span></a>
                    </li>


                </ul>
            </li>
               <?php 
            } ?>

             <?php $akses = $this->session->userdata('level'); ?>
<?php if ($akses == '1' || $akses == '2' ) { ?>

            <li class=" nav-item"><a href="#"><i class="la la-cart-plus"></i><span class="menu-title"
                        data-i18n="Payments">Transaksi</span></a>
                <ul class="menu-content">
                

                    <li><a class="menu-item" href="transaksi.js"><i class="la la-angle-double-right"></i><span>
                                Transaksi</span></a>
                    </li>

                </ul>
            </li>
            
               <?php 
            } ?>


     

<?php if ($akses == '1' ) { ?>
        <li class=" nav-item"><a href="#"><i class="la la-file"></i><span class="menu-title"
                    data-i18n="Payments">Laporan</span></a>
            <ul class="menu-content">
          
                <li><a class="menu-item" href="laporan.js"><i class="la la-angle-double-right"></i><span>
                            Laporan Penjualan</span></a>
                </li>
            


            </ul>
        </li>
       <li class=" nav-item"><a href="#"><i class="la la-users"></i><span class="menu-title" data-i18n="Patients">
                        Data User & Akses</span></a>
                <ul class="menu-content">
                    <li><a class="menu-item" href="data-user.js"><i class="la la-angle-double-right"></i><span>Data
                                User </span></a>
                    </li>

            </li>
        </ul>
        </li>
           <?php 
            } ?>

        <li class=" nav-item"><a href="<?= base_url() . 'logout.js' ?>"> <i class="ft-log-out"></i><span
                    class="menu-title" data-i18n="eCommerce">Keluar</span></a>
        </li>
    </div>
</div>