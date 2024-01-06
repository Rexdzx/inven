<?php

class Dashboard extends CI_Controller
{

    public function index()
    {

        $this->load->database();
        $data['jumlahUser']         = $this->db->count_all('user');
        $data['jumlahBarang']       = $this->db->count_all('barang');
        $data['jumlahPeminjaman']   = $this->db->count_all('peminjaman');
        $this->db->where('role', 'operator');
        $data['jumlahOperator']     = $this->db->count_all_results('user');

        if(!$this->session->userdata('login_session')){
            return redirect('/', 'refresh');
        }else{

            $this->load->view('admin/dashboard/index', [
                'user'    => $data['jumlahUser'],
                'barang'  => $data['jumlahBarang'],
                'peminjaman'  => $data['jumlahPeminjaman'],
                'operator'  => $data['jumlahOperator'],
            ]);
        }

    }

}

?>