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
        <h2>Barang_masuk List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Kd Barang</th>
		<th>Nama Barang</th>
		<th>Waktu Masuk</th>
		<th>Harga</th>
		<th>Banyak</th>
		<th>Jenis</th>
		<th>Nama Manager</th>
		<th>Nama Kasubag</th>
		<th>Id Barang</th>
		
            </tr><?php
            foreach ($barang_masuk_data as $barang_masuk)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $barang_masuk->kd_barang ?></td>
		      <td><?php echo $barang_masuk->nama_barang ?></td>
		      <td><?php echo $barang_masuk->waktu_masuk ?></td>
		      <td><?php echo $barang_masuk->harga ?></td>
		      <td><?php echo $barang_masuk->banyak ?></td>
		      <td><?php echo $barang_masuk->jenis ?></td>
		      <td><?php echo $barang_masuk->nama_manager ?></td>
		      <td><?php echo $barang_masuk->nama_kasubag ?></td>
		      <td><?php echo $barang_masuk->id_barang ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>