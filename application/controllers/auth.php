<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
    }

    public function index()
    {
        $data=array(
            'button' => 'Sign In',
            'action' => site_url('auth/login_action')
        );
        $this->load->view('auth/login',$data);
    } 
    function login_action(){
        $username=$this->db->get_where('akun',array('username' => $this->input->post('username',TRUE)));
        foreach ($username->result() as $key) {
            
        }
        $row = $this->db->get_where('akun',array('username' => $this->input->post('username',TRUE)))->num_rows();
        if($row==1){
            $password=password_verify($this->input->post('password',TRUE),$key->password);
            $newdata = array(
                    'name'          => $key->nama,
                    'logged_in'     => TRUE,
                    'pacaran_haram' => $key->ket
            );
            $this->session->set_userdata($newdata);
            redirect(site_url('akun'));
        }
        else
            $this->index();
    }

    function log_out(){
        $this->session->sess_destroy();
        redirect(site_url('auth'));
    }
}