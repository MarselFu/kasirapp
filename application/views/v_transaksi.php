<?php $this->load->view('v_css.php') ?>

<body class="vertical-layout vertical-menu 2-columns   fixed-navbar" data-open="click" data-menu="vertical-menu"
    data-col="2-columns">

    <?php $this->load->view('v_header.php') ?>
    <?php $this->load->view('v_sidebar.php') ?>



    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <section id="add-payment">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h2 class='text-danger'>
                                       Transaksi Penjualan
                                    </h2>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <?php 
                                         error_reporting(0);
                     $tglnow = new DateTime();
                    $tglskrg = $tglnow->format('Y-m-d');
                                        ?>
<?php $nama = $this->session->userdata('nama'); ?>
                                
                                        <form action="<?php echo base_url() . 'Transaksi/save' ?>"
                                            method="post" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-5 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="trans-date">
                                                            Tanggal

                                                            <span class="danger">
                                                                
                                                            </span>
                                                        </label>
                                                        <input class="form-control" id="trans-date" type="date"
                                                            name="xtanggal" value="<?=$tglskrg?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-7 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="ac-no">
                                                           Kasir
                                                            <span class="danger">
                                                                
                                                            </span>
                                                        </label>
                                                        <input class="form-control" id="ac-no" name="xoperator"
                                                            type="text" value="<?=$nama?>" 
                                                            readonly="">
                                                    </div>
                                                </div>


                                            </div>
                                                 <div class="row">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="trans-date">
                                                           Pilih Nama Barang
                                                            <span class="danger">
                                                                *
                                                            </span>
                                                        </label>
                                                         <select class="form-control" name="xbarang" data-placeholder="Pilih jenis"
                                            required>
                                           
                                            <?php foreach ($barang->result() as $kat) { ?>
                                            <option value="<?php echo $kat->barang_id; ?>">
                                                <?php echo $kat->nama_barang; ?></option>

                                            <?php
                                            } ?>
                                        </select>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6 col-sm-6">
                                                    <div class="form-group">
                                                        <label for="ac-no">
                                                            Jumlah Barang
                                                            <span class="danger">
                                                                *
                                                            </span>
                                                        </label>
                                                        <input class="form-control" id="ac-no" name="xjumlah"
                                                            placeholder="Masukan jumlah" type="number"
                                                            required>
                                                    </div>
                                                </div>

                                                <?php
if (isset($_POST['xjumlah'])) {
    $jumlah = $_POST['xjumlah'];

    // Kode untuk mengurangi jumlah stok barang di sini
    // Misalnya, jika Anda memiliki data stok barang dalam database,
    // Anda dapat melakukan query untuk mengupdate jumlah stok barang.
    // Berikut adalah contoh menggunakan query UPDATE pada database.
    // Gantilah 'nama_table' dengan nama tabel yang sesuai pada database Anda.
    // Gantilah 'nama_field_stok' dengan nama field stok barang pada tabel Anda.

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "username", "password", "db_demo");

    // Periksa koneksi
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }

    // Query untuk mengurangi jumlah stok barang
    $sql = "UPDATE tbl_barang SET stock = stock - $jumlah WHERE id = 'id_barang'";

    // Jalankan query
    if (mysqli_query($conn, $sql)) {
        echo "Jumlah stok barang berhasil dikurangi.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
                                            </div>
                                       

                                            <div class="text-right">
                                                <button type="submit" class="btn btn-info">
                                                    Simpan
                                                </button>
                                               | <?php echo anchor('transaksi/selesai_belanja','Selesai',array('class'=>' btn btn-success'))?>

                                            </div>
                                            
                                    </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>
            </div>

            <div class="content-body">
                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
               
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                    
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered zero-configuration">
                                                <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Jumlah Barang</th>
                                                <th>Harga Barang</th>
                                                <th>Sub Total Harga</th>
                                                
                                            </tr>
                                        </thead>
                                               
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($detail->result() as $r) { ?>
                                                
                                                   
                                                    <tr>
                                                      <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang.' - '.anchor('transaksi/hapusitem/'.$r->t_detail_id,'Hapus',array('style'=>'color:red;')) ?></td>
                                                <td><?php echo $r->qty ?></td>
                                                <td>Rp. <?php echo number_format($r->harga,2) ?></td>
                                                <td>Rp. <?php echo number_format($r->qty*$r->harga,2) ?></td>

                                                  
                                                    </tr>
                                                    <?php $total=$total+($r->qty*$r->harga);?>
                                        <?php $no++; } ?>
                                            <tr class="gradeA">
                                                <td colspan="4"><b>T O T A L  H A R G A</b></td>
                                                <td>Rp. <?php echo number_format($total,2);?></td>
                                            </tr>
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

   
    <?php $this->load->view('v_footer.php') ?>




</body>


</html>