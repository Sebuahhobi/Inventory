<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('ajax/ambil_data') ?>",
cache: false,
});

    $("#kd_barang").change(function(){

    var value=$(this).val();
    if(value>0){
        $.ajax({
            data:{modul:'nama_barang',id:value},
            success: function(respond){
                $("#nama_barang").val(respond);
                $.post("<?php echo site_url();?>/ajax/session1",{'nama_barang1':respond});
            }
        })
        $.ajax({
            data:{modul:'jenis',id:value},
            success: function(respond){
                $("#jenis").val(respond);
                $.post("<?php echo site_url();?>/ajax/session2",{'jenis':respond});
            }
        })
        $.ajax({
            data:{modul:'id_barang',id:value},
            success: function(respond){
                $("#id_barang").val(respond);
                $.post("<?php echo site_url();?>/ajax/session3",{'id_barang':respond});
            }
        })
    }

    });
})
</script>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Barang Masuk Form</h3>
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
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : '';?>
                </div>
            </div>
            <div class="col-md-4 text-right">
		    </div>
        </div>
        <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css") ?>"/>
        <div class="col-sm-5 offset-sm-2 col-md-6 offset-md-0">
            <form action="<?php echo $action; ?>" method="post">
        	    <div class="form-group">
                    <label for="int">Kd Barang <?php echo form_error('kd_barang') ?></label>
                    <?php echo id_barang('kd_barang', 'barang', 'kd_barang', 'id', $kd_barang);?>
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" 
                    placeholder="<?php echo $this->session->userdata('nama_barang') <> '' ? $this->session->userdata('nama_barang') : ''; ?>" value="<?php echo $nama_barang; ?>" <?php echo $state;?> />
                </div>
        	    <div class="form-group">
                    <label for="timestamp">Waktu Masuk <?php echo form_error('waktu_masuk') ?></label>
                    <input type="text" class="form-control" name="waktu_masuk" id="waktu_masuk" placeholder="<?php echo mdate("%d-%m-%Y %H:%i:%s");?>" value="<?php echo $waktu_masuk;  ?>" <?php echo $state;?> />
                </div>
        	    <div class="form-group">
                    <label for="float">Harga/Pcs <?php echo form_error('harga') ?></label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="int">Banyak <?php echo form_error('banyak') ?></label>
                    <input type="text" class="form-control" name="banyak" id="banyak" placeholder="Banyak" value="<?php echo $banyak; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
                    <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" <?php echo $state;?> />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Kasubag <?php echo form_error('nama_kasubag') ?></label>
                    <input type="text" class="form-control" name="nama_kasubag" id="nama_kasubag" placeholder="<?php echo $this->session->userdata('name') <> 'Nama Kasubag' ? $this->session->userdata('name') : redirect(site_url('auth'));?>" value="<?php echo $nama_kasubag; ?>" <?php echo $state;?> />
                </div>
        	    <div class="form-group">
                    <label for="int">Id Barang <?php echo form_error('id_barang') ?></label>
                    <input type="text" class="form-control" name="id_barang" id="id_barang" placeholder="Id Barang" value="<?php echo $id_barang; ?>" <?php echo $state;?> />
                </div>
        	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('barang_masuk') ?>" class="btn btn-default">Cancel</a>
        	</form>
        </div>
    </div>
    <!-- /.box-body -->
    <!--div class="box-footer">
        Footer
    </div-->
    <!-- /.box-footer-->
</div>
