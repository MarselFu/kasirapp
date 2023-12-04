<?php

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1" width="100%">

    <thead>
        <tr>
            <td colspan='7'>
                <h2>
                    <center><?= $title ?><br>

                    </center>
                </h2>
            </td>
        </tr>
        <tr>


        <th>No</th>
                                                        <th>Tanggal Transaksi</th>
                                                        <th>Nama Barang</th>
                                                        <th>Harga Barang</th>
                                                        <th>Jumlah Barang</th>
                                                        <th>Total Barang</th>
                                                        <th>Nama Kasir</th>



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