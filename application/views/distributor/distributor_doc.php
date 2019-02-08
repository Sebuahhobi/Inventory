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
        <h2>Distributor List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama Distributor</th>
		<th>Nama Perusahaan</th>
		<th>Alamat</th>
		<th>No Hp</th>
		<th>Email</th>
		<th>Tgl Kerjasama</th>
		<th>Nama Manager</th>
		
            </tr><?php
            foreach ($distributor_data as $distributor)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $distributor->nama_distributor ?></td>
		      <td><?php echo $distributor->nama_perusahaan ?></td>
		      <td><?php echo $distributor->alamat ?></td>
		      <td><?php echo $distributor->no_hp ?></td>
		      <td><?php echo $distributor->email ?></td>
		      <td><?php echo $distributor->tgl_kerjasama ?></td>
		      <td><?php echo $distributor->nama_manager ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>