<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
        cek_login();
    }

    public function index()
    {
        $this->template->load('my-template-0010','akun/akun_list');
    } 
    
    public function json() {
        header('Content-Type: application/json');
        echo $this->Akun_model->json();
    }

    public function read($id) 
    {
        $row = $this->Akun_model->get_by_id($id);
        if ($row) {
            $data = array(
				'id				'=> $row->id,
				'nama				'=> $row->nama,
				'no_hp				'=> $row->no_hp,
				'username				'=> $row->username,
				'password				'=> $row->password,
				'waktu				'=> $row->waktu,
	    );
            $this->template->load('my-template-0010','akun/akun_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function create() 
    {
        $data = array(

            'button' => 'Create',
            'action' => site_url('akun/create_action'),
		    'id' => set_value('id'),
		    'nama' => set_value('nama'),
		    'no_hp' => set_value('no_hp'),
		    'username' => set_value('username'),
		    'password' => set_value('password'),
            'ket'          => set_value('ket')
	);
        $this->template->load('my-template-0010','akun/akun_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $password=mysqli_real_escape_string($this->input->post('password',TRUE));
            $data = array(
				'nama' => $this->input->post('nama',TRUE),
				'no_hp' => $this->input->post('no_hp',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $password = password_hash($password, PASSWORD_DEFAULT),
                'ket'          =>  $this->input->post('ket',TRUE)
	    );

            $this->Akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('akun'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('akun/update_action'),
				'id' => set_value('id', $row->id),
				'nama' => set_value('nama', $row->nama),
				'no_hp' => set_value('no_hp', $row->no_hp),
				'username' => set_value('username', $row->username),
				'password' => set_value('password', $row->password),
                'ket'          => set_value('ket',$row->ket)
	    );
            $this->template->load('my-template-0010','akun/akun_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }
    
    public function update_action() 
    {
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('required' => '%s tidak boleh kosong!'));
        $this->form_validation->set_rules('no_hp', 'No. HP', 'trim|required|is_natural|min_length[12]|max_length[12]',
            array('is_natural'  => 'Hanya Angka',
                  'min_length'  => 'Min. length 12',
                  'max_length'  => 'Max. lenth 12',
                  'required'    => '%s tidak boleh kosong!'));
        $this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[30]',
            array(
                  'min_length'  => 'Min. length 6',
                  'max_length'  => 'Max. lenth 30',
                  'required'    => '%s tidak boleh kosong!'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]',
            array(
                  'min_length'  => 'Min. length 6',
                  'max_length'  => 'Max. lenth 30',
                  'required'    => '%s tidak boleh kosong!'));

        $this->form_validation->set_rules('id', 'id', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id', TRUE));
        } else {
            $password=mysqli_real_escape_string($this->input->post('password',TRUE));
            $data = array(
				'nama'    => $this->input->post('nama',TRUE),
				'no_hp'    => $this->input->post('no_hp',TRUE),
				'username' => $this->input->post('username',TRUE),
				'password' => $password = password_hash($password, PASSWORD_DEFAULT),
                'ket'          =>  $this->input->post('ket',TRUE)
	    );

            $this->Akun_model->update($this->input->post('id', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('akun'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $this->Akun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('akun'));
        }
    }

    public function _rules() 
    {
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required',array('required' => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('no_hp', 'No. HP', 'trim|required|is_natural|min_length[12]|max_length[12]',
            array('is_natural'  => 'Hanya Angka',
                  'min_length'  => 'Min. length 12',
                  'max_length'  => 'Max. lenth 12',
                  'required'    => '%s tidak boleh kosong!'));
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[6]|max_length[30]|is_unique[akun.username]',
            array(
                  'min_length'  => 'Min. length 6',
                  'max_length'  => 'Max. lenth 30',
                  'required'    => '%s tidak boleh kosong!',
                  'is_unique'   => 'Username sudah ada!'));
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[30]',
            array(
                  'min_length'  => 'Min. length 6',
                  'max_length'  => 'Max. lenth 30',
                  'required'    => '%s tidak boleh kosong!'));

		$this->form_validation->set_rules('id', 'id', 'trim');
		$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "akun.xls";
        $judul = "akun";
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
		xlsWriteLabel($tablehead, $kolomhead++, "Nama");
		xlsWriteLabel($tablehead, $kolomhead++, "No Hp");
		xlsWriteLabel($tablehead, $kolomhead++, "Username");
		xlsWriteLabel($tablehead, $kolomhead++, "Password");
		xlsWriteLabel($tablehead, $kolomhead++, "Waktu");

	foreach ($this->Akun_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nama);
	    xlsWriteLabel($tablebody, $kolombody++, $data->no_hp);
	    xlsWriteLabel($tablebody, $kolombody++, $data->username);
	    xlsWriteLabel($tablebody, $kolombody++, $data->password);
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
        header("Content-Disposition: attachment;Filename=akun.doc");

        $data = array(
            'akun_data' => $this->Akun_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('akun/akun_doc',$data);
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
/* Please DO NOT modify this information : */
/* Generated by Sebuahhobi 2018-12-06 03:21:14 */