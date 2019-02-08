<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang_masuk extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_masuk_model');
        cek_login();
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $this->template->load('my-template-0010','barang_masuk/barang_masuk_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Barang_masuk_model->json();
    }

    public function read($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id				'=> $row->id,
				'kd_barang				'=> $row->kd_barang,
				'nama_barang				'=> $row->nama_barang,
				'waktu_masuk				'=> $row->waktu_masuk,
				'harga				'=> $row->harga,
				'banyak				'=> $row->banyak,
				'jenis				'=> $row->jenis,
				'nama_manager				'=> $row->nama_manager,
				'nama_kasubag				'=> $row->nama_kasubag,
				'id_barang				'=> $row->id_barang,
	    );
            $this->template->load('my-template-0010','barang_masuk/barang_masuk_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang_masuk/create_action'),
		    'id' => set_value('id'),
		    'kd_barang' => set_value('kd_barang'),
		    'nama_barang' => set_value('nama_barang'),
		    'waktu_masuk' => set_value('waktu_masuk'),
		    'harga' => set_value('harga'),
		    'banyak' => set_value('banyak'),
		    'jenis' => set_value('jenis'),
		    'nama_kasubag' => set_value($this->session->userdata('name')),
		    'id_barang' => set_value('id_barang'),
            'state'     => 'disabled="disabled"'
	);
        $this->template->load('my-template-0010','barang_masuk/barang_masuk_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kd_barang'      => $this->input->post('kd_barang',TRUE),
				'nama_barang'    => $this->session->userdata('nama_barang'),
				'harga'          => $this->input->post('harga',TRUE),
				'banyak'         => $this->input->post('banyak',TRUE),
				'jenis'          => $this->session->userdata('jenis'),
				'nama_kasubag'   => $this->session->userdata('name'),
				'id_barang'      => $this->session->userdata('id_barang'),
	    );

            $this->Barang_masuk_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang_masuk/update_action'),
				'id' => set_value('id', $row->id),
				'kd_barang' => set_value('kd_barang', $row->kd_barang),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'waktu_masuk' => set_value('waktu_masuk', $row->waktu_masuk),
				'harga' => set_value('harga', $row->harga),
				'banyak' => set_value('banyak', $row->banyak),
				'jenis' => set_value('jenis', $row->jenis),
				'nama_kasubag' => set_value('nama_kasubag', $row->nama_kasubag),
				'id_barang' => set_value('id_barang', $row->id_barang),
                'state'     => 'disabled="disabled"'
	    );
            $this->template->load('my-template-0010','barang_masuk/barang_masuk_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'kd_barang' => $this->input->post('kd_barang',TRUE),
				'nama_barang' => $this->session->userdata('nama_barang'),
				'harga' => $this->input->post('harga',TRUE),
				'banyak' => $this->input->post('banyak',TRUE),
				'jenis' => $this->session->userdata('jenis'),
				'nama_kasubag' => $this->session->userdata('name'),
				'id_barang' => $this->session->userdata('id_barang')
	    );

            $this->Barang_masuk_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang_masuk'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_masuk_model->get_by_id($id);

        if ($row) {
            $this->Barang_masuk_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang_masuk'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang_masuk'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('kd_barang', 'Kd. Barang', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		//$this->form_validation->set_rules('nama_barang', 'Nama Narang', 'trim|required');
		//$this->form_validation->set_rules('waktu_masuk', 'waktu masuk', 'trim|required');
		$this->form_validation->set_rules('harga', 'Harga', 'trim|required|is_natural',
            array(
                'required'   => '%s tidak boleh kosong!',
                'is_natural' => 'Hanya angka!'
            ));
		$this->form_validation->set_rules('banyak', 'Jumlah Barang', 'trim|required|is_natural',
            array(
                'required'   => '%s tidak boleh kosong!',
                'is_natural' => 'Hanya angka!'
            ));
		//$this->form_validation->set_rules('jenis', 'jenis', 'trim|required');
		//$this->form_validation->set_rules('nama_manager', 'nama manager', 'trim|required');
		//$this->form_validation->set_rules('nama_kasubag', 'nama kasubag', 'trim|required');
		//$this->form_validation->set_rules('id_barang', 'id barang', 'trim|required');

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang_masuk.xls";
        $judul = "barang_masuk";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Kd Barang");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu Masuk");
		xlsWriteLabel($tablehead, $kolomhead++, "Harga");
		xlsWriteLabel($tablehead, $kolomhead++, "Banyak");
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Manager");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Kasubag");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Barang");

	foreach ($this->Barang_masuk_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteNumber($tablebody, $kolombody++, $data->kd_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->waktu_masuk);
	    xlsWriteLabel($tablebody, $kolombody++, $data->harga);
	    xlsWriteNumber($tablebody, $kolombody++, $data->banyak);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_manager);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_kasubag);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_barang);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=barang_masuk.doc");

        $data = array(
            'barang_masuk_data' => $this->Barang_masuk_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barang_masuk/barang_masuk_doc',$data);
    }

}

/* End of file Barang_masuk.php */
/* Location: ./application/controllers/Barang_masuk.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-13 04:47:04 */