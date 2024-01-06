<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peminjaman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('peminjaman_model');
        $this->load->model('barang_model');
        $this->load->helper('date');
    }

    public function index()
    {
        $filter                 = $this->input->get('filter');

        $data['barang']         = $this->peminjaman_model->getFilteredPeminjaman($filter);

        $this->load->view('admin/peminjaman/index', $data);

    }

    public function printPDF() {
        $filter = $this->input->get('filter');

        $judul  = 'Semua Data';

        if($filter == 'minggu') $judul = 'Data Minggu Ini';
        if($filter == 'bulan') $judul = 'Data Bulan Ini';
        if($filter == 'tahun') $judul = 'Data Tahun Ini';
        
        $data['barang'] = $this->peminjaman_model->getFilteredPeminjaman($filter);

        $this->load->library('pdf');
        
        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "peminjaman.pdf";
        $this->pdf->load_view('admin/laporan/peminjaman_barang', [
            'judul' => $judul,
            'data'  => $data,
        ]);
        
    }

    public function store()
    {
        $barang                 = $this->barang_model->data()->result();

        if($this->input->method() == 'post'){
            if($this->input->post('barang') == ''){
                $this->session->set_flashdata('failed', 'Masukkan Barang Terlebih Dahulu');
                return redirect($_SERVER['HTTP_REFERER']);
            }else{
                $barang         = [
                    'nama_peminjam'     => $this->input->post('nama_peminjam'),
                    'id_penjamin'       => $this->input->post('id_penjamin'),
                    'id_barang'         => $this->input->post('barang'),
                ];

                $save_barang    = $this->peminjaman_model->insert($barang);

                if($save_barang){
                    $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                    redirect('admin/peminjaman');
                }
            }

        }

        $this->load->view('admin/peminjaman/create', ['barang' => $barang]);

    }

    public function edit($id = null)
    {
        $barang                 = $this->barang_model->data()->result();
        $data['peminjaman']     = $this->peminjaman_model->find($id);

        if(!$data['peminjaman'] || !$id) return show_404();

        if($this->input->method() == 'post'){
            if($this->input->post('barang') == ''){
                $this->session->set_flashdata('failed', 'Masukkan Barang Terlebih Dahulu');
                return redirect($_SERVER['HTTP_REFERER']);
            }else{

            $barang             = [
                'id_peminjam'   => $id,
                'nama_peminjam' => $this->input->post('nama_peminjam'),
                'id_penjamin'   => $this->input->post('id_penjamin'),
                'id_barang'     => $this->input->post('barang')
            ];

            $updated            = $this->peminjaman_model->update($barang);

            // var_dump($updated);

            if($updated){
                $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                return redirect('admin/peminjaman');
            }
        }
        }

        $this->load->view('admin/peminjaman/edit', [
            'peminjaman'    => $data['peminjaman'],
            'barang'        => $barang,
        ]);
    }

    public function delete($id = null)
    {

        if(!$id) return show_404();

        $delete                 = $this->peminjaman_model->delete($id);

        if($delete){
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            return redirect('admin/peminjaman');
        }

    }

}