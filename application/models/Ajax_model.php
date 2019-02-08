<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax_model extends CI_Model
{
	function nama_distributor($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('distributor',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->id;
        }
    }
    function nama_barang($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('barang',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->nama_barang;
        }
    }
    function jenis($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('barang',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->jenis_barang;
        }
    }
    function id_barang($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('barang',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->id;
        }
    }

    function nama_barang_masuk($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('barang_masuk',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->harga;
        }
    }
    function jenis_barang_masuk($Id){
        //$nama_barang="Tes";
        $this->db->order_by('id','ASC');
        $nama= $this->db->get_where('barang_masuk',array('id'=>$Id));

        foreach ($nama->result() as $data ){
            return $data->jenis;
        }
    }

}