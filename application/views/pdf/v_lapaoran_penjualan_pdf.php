<script>
window.print();
</script>

<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cetak</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="canonical" href="" itemprop="url">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/semantic/css/tables.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url() ?>app-assets/semantic/fontawesome-5.1.1/css/all.css"
        crossorigin="anonymous">
    <style type="text/css" media="print">
    @page {
        size: auto;
        margin: 0;
    }
    </style>
    <style>
    .garis {
        border: 3px black solid;

    }
    </style>
</head>


<body class="app sidebar-mini rtl pace-done sidenav-toggled">
    <font face="Times New Roman">
        <?php
        date_default_timezone_set('Asia/Jakarta');


        ?>
        <main class="app-content">
            <div class="bs-component">
                <div class="tab-content" id="myTabContent">
                    <div class="ui tab-pane fade active show" id="first">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="tile">

                                    <center>
                                        <table class="cust-print-table cust-table-bordered text-center" border="1"
                                            width="100%">


                                            <thead>
                                                <tr class="bsmall">
                                                    <td colspan='23'>
                                                        <h2>
                                                            <center><?= $title ?><br>

                                                            </center>
                                                        </h2>
                                                    </td>
                                                </tr>
                                                <tr class="bsmall">

                                                     <th>No</th>
                                                        <th>Tanggal</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga Barang</th>
                                                        <th>Jumlah Barang </th>
                                                        <th>Total Barang </th>
                                                        <th>Nama Kasir </th>
                                                </tr>

                                            </thead>
                                            <tbody>

                                                <?php
                                                $i = 1;
                                                foreach ($hasil as $row) {
                                                    
                                                ?>

                                                <tr>

                                                      <td><?= $i ?></td>
                                                        <td><?= $row->tanggal_transaksi ?></td>
                                                        <td><?= $row->nama_barang ?></td>
                                                        <td><?= $row->harga ?></td>
                                                        <td><?= $row->qty ?></td>
                                                             <td>Rp. <?php echo number_format($row->qty*$row->harga,2) ?></td>
                                                        <td><?= $row->nama_lengkap ?></td>
                                                </tr>

                                                <?php $i++;
                                                } ?>

                                            </tbody>



                                        </table>
                                    </center>

                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </main>

  
        <script type="text/javascript" src="<?= base_url() ?>app-assets/semantic/semantic.min.js"></script>


        <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
  

</body>

</html>