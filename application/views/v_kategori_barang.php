<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<?php $this->load->view('v_css.php') ?>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    <?php $this->load->view('v_header.php') ?>
    <?php $this->load->view('v_sidebar.php') ?>



    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">

            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">

                                    <h3><b class='text-danger'> Kategori Barang </b></h3>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <a href="#" data-toggle="modal" data-backdrop="false" data-target="#addprogram"
                                            class="btn btn-success btn-min-width box-shadow-3 mr-1 mb-1"
                                            data-backdrop="false"><span class="la la-plus-circle"></span> Tambah
                                            Kategori</a><br>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Kategori</th>
                                                        <th style="text-align:center;">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($data->result() as $row) :
                                                        $no++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $row->nama_kategori ?></td>
                                                        <td style="text-align:center;">
                                                            <div class="btn-group mr-1 mb-1">
                                                                <button type="button"
                                                                    class="btn btn-info btn-min-width dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-toggle="modal" data-backdrop="false"
                                                                        data-target="#editprogram<?= $row->kategori_id ?>">Edit</a>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-toggle="modal" data-backdrop="false"
                                                                        data-target="#delete<?= $row->kategori_id ?>">Delete</a>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                            <th>No</th>
                                                        <th>Nama Kategori</th>
                                                        <th style="text-align:center;">Aksi</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">

            <div class="modal fade text-left" id="addprogram" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success white">
                            <h4 class="modal-title white" id="myModalLabel11">Tambah Data Kategori </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'Kategori/save' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">


                                    <div class="form-group">
                                        <label for="accountTextarea">Nama Kategori</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Nama" name="xjudul" required>
                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-info">Simpan</button>
                                <button type="button" class="btn grey btn-outline-danger"
                                    data-dismiss="modal">Batal</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php

    foreach ($data->result() as $row) :

    ?>
    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">

            <div class="modal fade text-left" id="editprogram<?= $row->kategori_id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success white">
                            <h4 class="modal-title white" id="myModalLabel11">Edit Kategori </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'Kategori/update' ?>" method="post"
                            enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">
                                    <input type="hidden" name="kode" value="<?= $row->kategori_id ?>">

                                    <div class="form-group">
                                        <label for="accountTextarea">Nama Kategori</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Nama" value="<?= $row->nama_kategori ?>" name="xjudul"
                                            required>

                                    </div>


                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-info">Update</button>
                                <button type="button" class="btn grey btn-outline-danger"
                                    data-dismiss="modal">Batal</button>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">

            <div class="modal fade text-left" id="delete<?= $row->kategori_id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger white">
                            <h4 class="modal-title white" id="myModalLabel11">Hapus Data Kategori</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'Kategori/hapus' ?>" method="post">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">


                                    <div class="form-group">
                                        <input type="hidden" name="xkode" value="<?php echo $row->kategori_id; ?>" />
                                        <p>Apakah Anda yakin mau menghapus Data <b><?php echo $row->nama_kategori; ?>
                                            </b> ini ?</p>
                                    </div>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-danger">Hapus</button>

                                <button type="button" class="btn grey btn-outline-info"
                                    data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <?php $this->load->view('v_footer.php') ?>



</body>


</html>