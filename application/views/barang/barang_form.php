<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('ajax/ambil_data') ?>",
cache: false,
});

    $("#nama_distributor").change(function(){

    var value=$(this).val();
    if(value>0){
        $.ajax({
        data:{modul:'nama_distributor',id:value},
        success: function(respond){
        $("#id_distributor").val(respond);
        $.post("<?php echo site_url();?>/ajax/session",{'id_distributor':respond});
    }
    })
    }

    });
})

</script>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Barang Form</h3>
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
                    <label for="char">Kd Barang <?php echo form_error('kd_barang') ?></label>
                    <input type="text" class="form-control" name="kd_barang" id="kd_barang" placeholder="Kode Barang" value="<?php echo $kd_barang; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang" value="<?php echo $nama_barang; ?>" />
                </div>
        	    <div class="form-group">
                    <label for="enum">Jenis Barang <?php echo form_error('jenis_barang') ?></label>
                    <input type="text" class="form-control" name="jenis_barang" id="jenis_barang" placeholder="Jenis Barang" value="<?php echo $jenis_barang; ?>" />
                </div>
                <div class="form-group">
                    <label for="int">Nama Distributor <?php echo form_error('Nama Distributor') ?></label>
                    <?php echo nama_distributor('nama_distributor', 'distributor', 'nama_distributor', 'id', $nama_distributor);?>
                </div>
        	    <div class="form-group">
                    <label for="int">Id Distributor <?php echo form_error('id_distributor') ?></label>
                    <input type="text" class="form-control" name="id_distributor" id="id_distributor" placeholder="Id Distributor" value="<?php echo $id_distributor; ?>" <?php echo $state;?> />
                </div>
        	   
        	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
        	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        	    <a href="<?php echo site_url('barang') ?>" class="btn btn-default">Cancel</a>
        	</form>
        </div>
    </div>
    <!-- /.box-body -->
    <!--div class="box-footer">
        Footer
    </div-->
    <!-- /.box-footer-->
</div>
