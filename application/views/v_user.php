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

                                    <h3><b class='text-danger'>Data User & Akses</b></h3>
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
                                        <a href="#" data-toggle="modal" data-backdrop="false" data-target="#adduser"
                                            class="btn btn-success btn-min-width box-shadow-3 mr-1 mb-1"
                                            data-backdrop="false"><span class="la la-plus-circle"></span> Tambah
                                            Data User</a><br>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Reset Password</th>
                                                        <th>Nama</th>
                                               
                                                        <th>username</th>
                                                        <th>Status</th>
                                                        <th>Created</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                    <tfoot>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Reset Password</th>
                                                        <th>Nama</th>
                                                        <th>username</th>
                                                        <th>Status</th>
                                                        <th>Created</th>

                                                        <th>Aksi</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php
                                                    $no = 0;
                                                    foreach ($data->result() as $row) :
                                                        $no++;
                                                    ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td> <a href="#" data-toggle="modal" data-backdrop="false"
                                                                data-target="#reset<?= $row->operator_id ?>"
                                                                class="btn mr-1 mb-1 btn-outline-danger btn-sm"><i
                                                                    class="la la-link"></i> Reset Password</a>
                                                        </td>
                                                        <td><?= $row->nama_lengkap ?></td>
                                                      
                                                        <td><?= $row->username ?></td>
                                                        <td style="text-align:center;">
                                                            <?php
                                                                if ($row->akses == '1') {
                                                                ?>
                                                            <h4>
                                                                <center><a href="#"
                                                                        class="mr-1 mb-1 btn btn-outline-success btn-min-width"><i
                                                                            class="la la-check-square-o"></i>
                                                                        Administrator</a>
                                                                </center>
                                                            </h4>

                                                            <?php

                                                                } else {
                                                                ?>
                                                            <h4>
                                                                <center> <a href="#" 
                                                                        class="mr-1 mb-1 btn btn-outline-warning btn-min-width"><i
                                                                            class="la la-times-circle-o"></i>
                                                                        Kasir</a></center>
                                                            </h4>
                                                            <?php

                                                                }
                                                                ?>

                                                        </td>
                                                        <td><?= $row->last_login ?></td>



                                                        <td>
                                                            <div class="btn-group mr-1 mb-1">
                                                                <button type="button"
                                                                    class="btn btn-info btn-min-width dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">Aksi</button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item" href="#"
                                                                        data-toggle="modal" data-backdrop="false"
                                                                        data-target="#edituser<?= $row->operator_id ?>">Edit</a>
                                                                    <a class="dropdown-item" href="#"
                                                                        data-toggle="modal" data-backdrop="false"
                                                                        data-target="#delete<?= $row->operator_id ?>">Delete</a>

                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            
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

            <div class="modal fade text-left" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel11"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success white">
                            <h4 class="modal-title white" id="myModalLabel11">Tambah Data User </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'user/save' ?>" method="post">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">


                                    <div class="form-group">
                                        <label for="accountTextarea">Nama</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Nama" name="xnama" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="accountTextarea">Username</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Username" name="xusername" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="accountTextarea">Password</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Password" name="xpassword" required>

                                    </div>

                                   

                              

                                 
                                    <div class="form-group">
                                        <label for="accountTextarea">Akses</label>
                                        <select class="form-control" name="xstatus" required>
                                            <option value="1" selected>Administrator</option>
                                            <option value="2">Kasir</option>

                                        </select>

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

            <div class="modal fade text-left" id="edituser<?= $row->operator_id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-success white">
                            <h4 class="modal-title white" id="myModalLabel11">Edit Data User </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'user/update' ?>" method="post">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">
                                    <input type="hidden" name="kode" value="<?= $row->operator_id ?>">

                                    <div class="form-group">
                                        <label for="accountTextarea">Nama</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Nama" value="<?= $row->nama_lengkap ?>" name="xnama" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="accountTextarea">Username</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Username" name="xusername"
                                            value="<?= $row->username ?>" required>

                                    </div>
                                    <div class="form-group">
                                        <label for="accountTextarea">Password</label>
                                        <input type="text" id="projectinput1" class="form-control"
                                            placeholder="Masukan Password"
                                            name="xpassword" required>

                                    </div>

                                

                                 `
                                    
   <div class="form-group">
                                        <label for="accountTextarea">Akses</label>
                                        <select class="form-control" name="xstatus" required>
                                            <option value="1" selected>Administrator</option>
                                            <option value="2">Kasir</option>

                                        </select>

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
    <?php endforeach; ?>
    <?php

    foreach ($data->result() as $row) :

    ?>

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">

            <div class="modal fade text-left" id="delete<?= $row->operator_id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger white">
                            <h4 class="modal-title white" id="myModalLabel11">Hapus Data User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'user/deleteuser' ?>" method="post">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">


                                    <div class="form-group">
                                        <input type="hidden" name="xkode" value="<?php echo $row->operator_id; ?>" />
                                        <p>Apakah Anda yakin mau menghapus Data <b><?php echo $row->nama_lengkap; ?>
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

    <div class="col-lg-4 col-md-6 col-sm-12">
        <div class="form-group">

            <div class="modal fade text-left" id="reset<?= $row->operator_id ?>" tabindex="-1" role="dialog"
                aria-labelledby="myModalLabel11" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-warning white">
                            <h4 class="modal-title white" id="myModalLabel11">Reset Password</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="<?php echo base_url() . 'user/resetpass' ?>" method="post">
                            <div class="modal-body">
                                <div class="col-md-12 m-b-20">


                                    <div class="form-group">
                                        <input type="hidden" name="xkode" value="<?php echo $row->operator_id; ?>" />
                                        <p>Apakah Anda yakin mau reset password <b><?php echo $row->nama_lengkap; ?>
                                            </b> ini ?</p>
                                    </div>



                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-warning">Reset</button>

                                <button type="button" class="btn grey btn-outline-danger"
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