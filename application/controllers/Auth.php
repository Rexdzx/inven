<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

    private $table      = 'user';

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('auth_model');
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index()
    {
        return $this->load->view('auth/login');
    }

    public function login()
    {

        $email          = $this->input->post('email');
        $password       = $this->input->post('password');

        $where = [
            'email'     => $email,
            'password'  => md5($password),
        ];

        $cek            = $this->auth_model->login($this->table, $where)->num_rows();
        $data           = $this->auth_model->login($this->table, $where)->row_array();

        if($cek > 0){
            $user_data  = [
                'id'    => $data['id'],
                'name'  => $data['name'],
                'email' => $data['email'],
                'role'  => $data['role'],
           'created_at' => $data['created_at']
            ];

            $this->session->set_userdata('login_session', $user_data);
            $this->session->set_flashdata('success', 'Anda Berhasil Login');


            return redirect('admin');
            // var_dump($this->session->userdata('login_session'));
        }else{
            $this->session->set_flashdata('failed', 'User Tidak Ada');
            return redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('login_session');
        return redirect('/');

    }

}