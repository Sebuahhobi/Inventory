<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Barang_model');
        cek_login();
    }

    public function index()
    {
        $this->template->load('my-template-0010','barang/barang_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Barang_model->json();
    }

    public function read($id) 
    {
        $row = $this->Barang_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id				'=> $row->id,
				'kd_barang				'=> $row->kd_barang,
				'nama_barang				'=> $row->nama_barang,
				'jenis_barang				'=> $row->jenis_barang,
				'id_distributor				'=> $row->id_distributor,
	    );
            $this->template->load('my-template-0010','barang/barang_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('barang/create_action'),
		    'id' => set_value('id'),
		    'kd_barang' => set_value('kd_barang'),
		    'nama_barang' => set_value('nama_barang'),
		    'jenis_barang' => set_value('jenis_barang'),
		    'id_distributor' => set_value('id_distributor'),
            'nama_distributor' => set_value('nama_distributor'),
            'state'            => 'disabled="disabled"'
	);
        $this->template->load('my-template-0010','barang/barang_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'kd_barang' => $this->input->post('kd_barang',TRUE),
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'jenis_barang' => $this->input->post('jenis_barang',TRUE),
				'id_distributor' =>  $this->session->userdata('id_distributor99')
            );

            $this->Barang_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('barang/update_action'),
				'id' => set_value('id', $row->id),
				'kd_barang' => set_value('kd_barang', $row->kd_barang),
				'nama_barang' => set_value('nama_barang', $row->nama_barang),
				'jenis_barang' => set_value('jenis_barang', $row->jenis_barang),
				'id_distributor' => set_value('id_distributor', $row->id_distributor),
	    );
            $this->template->load('my-template-0010','barang/barang_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
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
				'nama_barang' => $this->input->post('nama_barang',TRUE),
				'jenis_barang' => $this->input->post('jenis_barang',TRUE),
				'id_distributor' => $this->session->userdata('id_distributor99') <> '' ? $this->session->userdata('id_distributor99') : site_url('barang/create_action')
	    );

            $this->Barang_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('barang'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Barang_model->get_by_id($id);

        if ($row) {
            $this->Barang_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('barang'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('barang'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('kd_barang', 'kd barang', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('nama_barang', 'nama barang', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('jenis_barang', 'jenis barang', 'trim|required',array('required' => '%s tidak boleh kosong!'));

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "barang.xls";
        $judul = "barang";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Jenis Barang");
		xlsWriteLabel($tablehead, $kolomhead++, "Id Distributor");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl");

	foreach ($this->Barang_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->kd_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_barang);
	    xlsWriteLabel($tablebody, $kolombody++, $data->jenis_barang);
	    xlsWriteNumber($tablebody, $kolombody++, $data->id_distributor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=barang.doc");

        $data = array(
            'barang_data' => $this->Barang_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('barang/barang_doc',$data);
    }

}

/* End of file Barang.php */
/* Location: ./application/controllers/Barang.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-06 03:29:35 */