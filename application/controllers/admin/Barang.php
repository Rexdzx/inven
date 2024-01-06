<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('barang_model');
        $this->load->helper('date');
    }

    public function index()
    {
        $filter = $this->input->get('kondisi');

        // $data['barang']         = $this->barang_model->data()->result();
        $data['barang']         = $this->barang_model->getFilteredBarang($filter);

        $this->load->view('admin/barang/index', $data);
    }

    public function printPDF()
    {
        $filter = $this->input->get('kondisi');

        $data['barang'] = $this->barang_model->getFilteredBarang($filter);

        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "barang.pdf";
        $this->pdf->load_view('admin/laporan/barang', $data);
    }

    public function store()
    {

        if ($this->input->method() == 'post') {

            $barang             = [
                'nama'          => $this->input->post('nama'),
                'merek'         => $this->input->post('merek'),
                'kondisi'       => $this->input->post('kondisi')
            ];

            $save_barang        = $this->barang_model->insert($barang);

            if ($save_barang) {
                $this->session->set_flashdata('success', 'Data Berhasil Ditambah');
                return redirect('admin/barang');
            }
        }

        $this->load->view('admin/barang/create');
    }

    public function update($id = null)
    {

        $data['barang']         = $this->barang_model->find($id);

        if (!$data['barang'] || !$id) return show_404();


        if ($this->input->method() == 'post') {

            $barang             = [
                'id'            => $id,
                'nama'          => $this->input->post('nama'),
                'merek'         => $this->input->post('merek'),
                'kondisi'       => $this->input->post('kondisi')
            ];

            $updated            = $this->barang_model->update($barang);

            if ($updated) {
                $this->session->set_flashdata('success', 'Data Berhasil Diupdate');
                return redirect('admin/barang');
            }
        }

        $this->load->view('admin/barang/edit', $data);
    }

    public function delete($id = null)
    {

        if (!$id) return show_404();

        $isBarangInUse = $this->barang_model->isBarangInUse($id);

        if ($isBarangInUse) {
            // Barang sedang dipinjam atau berelasi, tampilkan peringatan
            $this->session->set_flashdata('failed', 'Barang tidak dapat dihapus karena sedang dipinjam atau berelasi dengan peminjaman.');
            return redirect('admin/barang');
        }

        $delete                 = $this->barang_model->delete($id);

        if ($delete) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
            return redirect('admin/barang');
        }
    }
}