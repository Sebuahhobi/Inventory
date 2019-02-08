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
        <h2>Akun List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Nama</th>
		<th>No Hp</th>
		<th>Username</th>
		<th>Password</th>
		<th>Waktu</th>
		
            </tr><?php
            foreach ($akun_data as $akun)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $akun->nama ?></td>
		      <td><?php echo $akun->no_hp ?></td>
		      <td><?php echo $akun->username ?></td>
		      <td><?php echo $akun->password ?></td>
		      <td><?php echo $akun->waktu ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>