<?php

Class ajax extends CI_Controller

{
	function __construct(){
		parent::__construct();
		cek_login();
	}

	function ambil_data(){

	        $modul=$this->input->post('modul');
	        $id=$this->input->post('id');

	        if($modul=="nama_distributor"){
	            echo $this->Ajax_model->nama_distributor($id);
	        }
	        elseif($modul=="nama_barang"){
	            echo $this->Ajax_model->nama_barang($id);
	        }
	        elseif($modul=="jenis"){
	            echo $this->Ajax_model->jenis($id);
	        }
	        elseif($modul=="id_barang"){
	            echo $this->Ajax_model->id_barang($id);
	        }
	        elseif($modul=="nama_barang_masuk"){
	            echo $this->Ajax_model->nama_barang_masuk($id);
	        }
	        elseif($modul=="jenis_barang_masuk"){
	            echo $this->Ajax_model->jenis_barang_masuk($id);
	        }

	}

	function session()
    {
        $this->session->set_userdata('id_distributor99',$this->input->post('id_distributor'));
    }
    function session1()
    {
        $this->session->set_userdata('nama_barang',$this->input->post('nama_barang1'));
    }
    function session2()
    {
        $this->session->set_userdata('jenis',$this->input->post('jenis'));
    }
    function session3()
    {
        $this->session->set_userdata('id_barang',$this->input->post('id_barang'));
    }

}