<!doctype html>
<html>
    <head>
        <title>Sebuahhobi</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Distributor <?php echo $button ?></h2>
<div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Distributor <?php echo form_error('nama_distributor') ?></label>
            <input type="text" class="form-control" name="nama_distributor" id="nama_distributor" placeholder="Nama Distributor" value="<?php echo $nama_distributor; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Perusahaan <?php echo form_error('nama_perusahaan') ?></label>
            <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat <?php echo form_error('alamat') ?></label>
            <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </div>
	    <div class="form-group">
            <label for="char">No Hp <?php echo form_error('no_hp') ?></label>
            <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    
	    <div class="form-group">
            <label for="varchar">Nama Manager <?php echo form_error('nama_manager') ?></label>
            <input type="text" class="form-control" name="nama_manager" id="nama_manager" placeholder="<?php echo $this->session->userdata('name') <> '' ? $this->session->userdata('name') : redirect(site_url('auth'));?>" value="<?php echo $nama_manager; ?>" <?php echo $state;?> />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('distributor') ?>" class="btn btn-default">Cancel</a>
	</form>
</div>
    </body>
</html>