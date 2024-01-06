<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->helper('date');
    }

    public function index()
    {

        $data['users']         = $this->user_model->data()->result();

        $this->load->view('admin/user/index', $data);

    }

    public function store()
    {

        if($this->input->method() == 'post'){

            $password           = md5($this->input->post('password'));

            $user               = [
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'password'      => $password,
                'role'          => $this->input->post('role')
            ];
            
            $save_user          = $this->user_model->insert($user);

            if($save_user){
                $this->session->set_flashdata('success', 'User Berhasil Ditambah');
                return redirect('admin/user');
            }
        }

        $this->load->view('admin/user/create');

    }

    public function update($id = null)
    {

        $data['user']         = $this->user_model->find($id);

        if(!$data['user'] || !$id) return show_404();

        
        if($this->input->method() == 'post')
        {

            $password         = md5($this->input->post('password'));

            $user             = [
                'id'            => $id,
                'name'          => $this->input->post('name'),
                'email'         => $this->input->post('email'),
                'password'      => $password,
                'role'          => $this->input->post('role')
            ];

            $updated            = $this->user_model->update($user);

            if($updated){
                $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                return redirect('admin/user');
            }
        }

        $this->load->view('admin/user/edit', $data);

    }

    public function delete($id = null)
    {

        if(!$id) return show_404();

        $delete                 = $this->user_model->delete($id);

        if($delete){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            return redirect('admin/user');
        }

    }

}