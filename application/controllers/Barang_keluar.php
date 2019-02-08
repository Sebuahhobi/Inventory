<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_keluar extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_keluar_model');
         $this->load->model('Barang_masuk_model');
        cek_login();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->template->load('my-template-0010','barang_keluar/barang_keluar_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Barang_keluar_model->json();
    }

    public function read($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id	'                => $row->id,
				'nama_barang'        => $row->nama_barang,
				'banyak'             => $row->banyak,
				'harga'              => $row->harga,
				'jenis'              => $row->jenis,
				'nama_distributor'   => $row->nama_distributor,
				'nama_kasubag'       => $row->nama_kasubag,
				'waktu'              => $row->waktu,
	    );
            $this->template->load('my-template-0010','barang_keluar/barang_keluar_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_keluar/create_action'),
		    'id' => set_value('id'),
		    'nama_barang' => set_value('nama_barang'),
		    'banyak' => set_value('banyak'),
		    'harga' => set_value('harga'),
		    'jenis' => set_value('jenis'),
		    'nama_kasubag' => set_value('nama_kasubag'),
            'state' => 'readonly="readonly"'
	);
        $this->template->load('my-template-0010','barang_keluar/barang_keluar_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'banyak' => $this->input->post('banyak',TRUE),
				'harga' => $this->input->post('harga',TRUE),
				'jenis' => $this->input->post('jenis',TRUE),
				'nama_kasubag' => $this->session->userdata('name'),
	    );

            $this->Barang_keluar_model->insert($data);
            $barang_keluar=$this->Barang_masuk_model->get_all();
            foreach ($barang_keluar as $key) {
                
            }
            $stok=array(
                    'banyak' => $key->banyak - $this->input->post('banyak',TRUE)
                );
            $this->Barang_masuk_model->update($this->input->post('nama_barang',TRUE), $stok);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_keluar/update_action'),
				'id' => set_value('id', $row->id),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'banyak' => set_value('banyak', $row->banyak),
				'harga' => set_value('harga', $row->harga),
				'jenis' => set_value('jenis', $row->jenis),
				'nama_kasubag' => set_value('nama_kasubag', $row->nama_kasubag),
				'waktu' => set_value('waktu', $row->waktu),
                'state' => 'readonly="readonly"'
	    );
            $this->template->load('my-template-0010','barang_keluar/barang_keluar_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'banyak' => $this->input->post('banyak',TRUE),
				'harga' => $this->input->post('harga',TRUE),
				'jenis' => $this->input->post('jenis',TRUE),
				'nama_kasubag' => $this->session->userdata('name'),
	    );

            $this->Barang_keluar_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_keluar'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_keluar_model->get_by_id($id);

        if ($row) {
            $this->Barang_keluar_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_keluar'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_keluar'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required');
		$this->form_validation->set_rules('banyak', 'banyak', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang_keluar.xls";
        $judul = "barang_keluar";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
		xlsWriteLabel($tablehead, $kolomhead++, "Banyak");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Distributor");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Kasubag");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu");

	foreach ($this->Barang_keluar_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->banyak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_distributor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kasubag);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=barang_keluar.doc");

        $data = array(
            'barang_keluar_data' => $this->Barang_keluar_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barang_keluar/barang_keluar_doc',$data);
    }

}

/* End of file Barang_keluar.php */
/* Location: ./application/controllers/Barang_keluar.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-13 07:17:36 */