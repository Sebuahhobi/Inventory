<!doctype html>
<html>
    <head>
        <title>Sebuahhobi</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Barang_keluar List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Barang</th>
		<th>Banyak</th>
		<th>Harga</th>
		<th>Jenis</th>
		<th>Nama Distributor</th>
		<th>Nama Kasubag</th>
		<th>Waktu</th>
		
            </tr><?php
            foreach ($barang_keluar_data as $barang_keluar)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $barang_keluar->nama_barang ?></td>
		      <td><?php echo $barang_keluar->banyak ?></td>
		      <td><?php echo $barang_keluar->harga ?></td>
		      <td><?php echo $barang_keluar->jenis ?></td>
		      <td><?php echo $barang_keluar->nama_distributor ?></td>
		      <td><?php echo $barang_keluar->nama_kasubag ?></td>
		      <td><?php echo $barang_keluar->waktu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>