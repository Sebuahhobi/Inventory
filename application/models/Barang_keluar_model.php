<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_keluar_model extends CI_Model
{

    public $table = 'barang_keluar';
    public $id = 'id';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('barang_keluar.id,barang.nama_barang,banyak,harga,jenis,nama_distributor,nama_kasubag,waktu');
        $this->datatables->from('barang_keluar');
        $this->datatables->join('barang', 'barang_keluar.nama_barang = barang.id');
        $this->datatables->add_column('action', anchor(site_url('barang_keluar/update/$1'),'<i class="fa fa-fw fa-edit"></i>','title="Update Data" class="btn btn-sm btn-danger"')." | ".anchor(site_url('barang_keluar/delete/$1'),'<i class="fa fa-fw fa-trash"></i>','title="Delete Data" class="btn btn-sm btn-danger"','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('banyak', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('nama_distributor', $q);
	$this->db->or_like('nama_kasubag', $q);
	$this->db->or_like('waktu', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id', $q);
	$this->db->or_like('nama_barang', $q);
	$this->db->or_like('banyak', $q);
	$this->db->or_like('harga', $q);
	$this->db->or_like('jenis', $q);
	$this->db->or_like('nama_distributor', $q);
	$this->db->or_like('nama_kasubag', $q);
	$this->db->or_like('waktu', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Barang_keluar_model.php */
/* Location: ./application/models/Barang_keluar_model.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-13 07:17:36 */