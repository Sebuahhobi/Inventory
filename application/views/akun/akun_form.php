
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Akun Form</h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
    <!--isi-->

        <div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
		    </div>
        </div>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
            <form action="<?php echo $action; ?>" method="post">
                <div class="form-group">
                    <label for="varchar">Nama <?php echo form_error('nama') ?></label>
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="<?php echo $nama; ?>" />
                </div>
                <div class="form-group">
                    <label for="char">No Hp <?php echo form_error('no_hp') ?></label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="No Hp" value="<?php echo $no_hp; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Username <?php echo form_error('username') ?></label>
                    <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
                </div>
                <div class="form-group">
                    <label for="varchar">Password <?php echo form_error('password') ?></label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" />
                </div>
                <div class="form-group">
                <label for="varchar">Ket <?php echo form_error('ket') ?></label>
                <?php
                    $options = array(
                        'Admin'          => 'Admin',
                        'Manager'        => 'Manager',
                        'Kasubag Gudang' => 'Kasubag Gudang'
                    );
                    echo form_dropdown('ket', $options,$ket, 'class="form-control"');
                ?>
        </div>

                <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
                <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
                <a href="<?php echo site_url('akun') ?>" class="btn btn-default">Cancel</a>
            </form>
        </div>
    </div>
    <!-- /.box-body -->
    <!--div class="box-footer">
        Footer
    </div-->
    <!-- /.box-footer-->
</div>
