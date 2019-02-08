<script type="text/javascript" src="<?php echo base_url('assets/bootstrap/jquery.min.js') ?>"></script>
<script type="text/javascript">

$(function(){

$.ajaxSetup({
type:"POST",
url: "<?php echo base_url('ajax/ambil_data') ?>",
cache: false,
});

    $("#nama_barang").change(function(){

    var value=$(this).val();
    if(value>0){
        $.ajax({
            data:{modul:'nama_barang_masuk',id:value},
            success: function(respond){
                $("#harga").val(respond);
            }
        })
        $.ajax({
            data:{modul:'jenis_barang_masuk',id:value},
            success: function(respond){
                $("#jenis").val(respond);
            }
        })
    }

    });
})
</script>
<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Barang Keluar Form</h3>
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
        <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.min.css") ?>"/>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Barang <?php echo form_error('nama_barang') ?></label>
            <?php echo barang_keluar('nama_barang', 'barang_masuk', 'nama_barang', 'id', $nama_barang);?>
        </div>
	    <div class="form-group">
            <label for="int">Banyak Barang Keluar<?php echo form_error('banyak') ?></label>
            <input type="number" class="form-control" name="banyak" id="banyak" placeholder="Banyak" value="<?php echo $banyak; ?>" />
        </div>
	    <div class="form-group">
            <label for="float">Harga/Pcs <?php echo form_error('harga') ?></label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Harga" value="<?php echo $harga; ?>" <?php echo $state;?> />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis <?php echo form_error('jenis') ?></label>
            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" value="<?php echo $jenis; ?>" <?php echo $state;?> />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kasubag <?php echo form_error('nama_kasubag') ?></label>
            <input type="text" class="form-control" name="nama_kasubag" id="nama_kasubag" placeholder="Nama Kasubag" value="<?php echo $this->session->userdata('name'); ?>" <?php echo $state;?> />
        </div>
	    <div class="form-group">
            <label for="timestamp">Waktu <?php echo form_error('waktu') ?></label>
            <input type="text" class="form-control" name="waktu" id="waktu" placeholder="Waktu" value="<?php echo mdate("%d-%m-%Y %H:%i:%s"); ?>" <?php echo $state;?> />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('barang_keluar') ?>" class="btn btn-default">Cancel</a>
	</form>
    </div>
    <!-- /.box-body -->
    <!--div class="box-footer">
        Footer
    </div-->
    <!-- /.box-footer-->
</div>
