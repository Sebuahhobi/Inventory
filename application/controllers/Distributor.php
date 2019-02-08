<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Distributor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Distributor_model');
        cek_login();
    }

    public function index()
    {
        $this->template->load('my-template-0010','distributor/distributor_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Distributor_model->json();
    }

    public function read($id) 
    {
        $row = $this->Distributor_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id				'=> $row->id,
				'nama_distributor				'=> $row->nama_distributor,
				'nama_perusahaan				'=> $row->nama_perusahaan,
				'alamat				'=> $row->alamat,
				'no_hp				'=> $row->no_hp,
				'email				'=> $row->email,
				'tgl_kerjasama				'=> $row->tgl_kerjasama,
				'nama_manager				'=> $row->nama_manager,
	    );
            $this->template->load('my-template-0010','distributor/distributor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('distributor'));
        }
    }

    public function create() 
    {
        $data = array(
            'button' => 'Create',
            'action' => site_url('distributor/create_action'),
		    'id' => set_value('id'),
		    'nama_distributor' => set_value('nama_distributor'),
		    'nama_perusahaan' => set_value('nama_perusahaan'),
		    'alamat' => set_value('alamat'),
		    'no_hp' => set_value('no_hp'),
		    'email' => set_value('email'),
		    'tgl_kerjasama' => set_value('tgl_kerjasama'),
		    'nama_manager' => set_value('nama_manager'),
            'state'         => 'disabled="disabled"',
           
	);
        $this->template->load('my-template-0010','distributor/distributor_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
				'nama_distributor' => $this->input->post('nama_distributor',TRUE),
				'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'no_hp' => $this->input->post('no_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'tgl_kerjasama' => $this->input->post('tgl_kerjasama',TRUE),
				'nama_manager' => $this->session->userdata('name'),
                
	    );

            $this->Distributor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('distributor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Distributor_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('distributor/update_action'),
				'id' => set_value('id', $row->id),
				'nama_distributor' => set_value('nama_distributor', $row->nama_distributor),
				'nama_perusahaan' => set_value('nama_perusahaan', $row->nama_perusahaan),
				'alamat' => set_value('alamat', $row->alamat),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'email' => set_value('email', $row->email),
				'tgl_kerjasama' => set_value('tgl_kerjasama', $row->tgl_kerjasama),
				'nama_manager' => set_value('nama_manager', $row->nama_manager)
	    );
            $this->template->load('my-template-0010','distributor/distributor_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('distributor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $data = array(
				'nama_distributor' => $this->input->post('nama_distributor',TRUE),
				'nama_perusahaan' => $this->input->post('nama_perusahaan',TRUE),
				'alamat' => $this->input->post('alamat',TRUE),
				'no_hp' => $this->input->post('no_hp',TRUE),
				'email' => $this->input->post('email',TRUE),
				'tgl_kerjasama' => $this->input->post('tgl_kerjasama',TRUE),
				'nama_manager' => $this->session->userdata('name'),
	    );

            $this->Distributor_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('distributor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Distributor_model->get_by_id($id);

        if ($row) {
            $this->Distributor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('distributor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('distributor'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama_distributor', 'Nama Distributor', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('nama_perusahaan', 'Nama Perusahaan', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('no_hp', 'No. HP', 'trim|required|is_natural|min_length[12]|max_length[12]',
            array('is_natural'  => 'Hanya Angka',
                  'min_length'  => 'Min. length 12',
                  'max_length'  => 'Max. lenth 12',
                  'required'    => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email',
            array('required'    => '%s tidak boleh kosong!',
                  'valid_email' => 'Email tidak valid!'));
	

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "distributor.xls";
        $judul = "distributor";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Distributor");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Perusahaan");
		xlsWriteLabel($tablehead, $kolomhead++, "Alamat");
		xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
		xlsWriteLabel($tablehead, $kolomhead++, "Email");
		xlsWriteLabel($tablehead, $kolomhead++, "Tgl Kerjasama");
		xlsWriteLabel($tablehead, $kolomhead++, "Nama Manager");

	foreach ($this->Distributor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_distributor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_perusahaan);
	    xlsWriteLabel($tablebody, $kolombody++, $data->alamat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->email);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tgl_kerjasama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama_manager);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=distributor.doc");

        $data = array(
            'distributor_data' => $this->Distributor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('distributor/distributor_doc',$data);
    }

}

/* End of file Distributor.php */
/* Location: ./application/controllers/Distributor.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-06 02:57:40 */