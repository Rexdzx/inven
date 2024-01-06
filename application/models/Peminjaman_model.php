<?php

class Peminjaman_model extends CI_Model
{
    private $table          = 'peminjaman';
    public function joinData()
    {
        // 'SELECT * FROM `peminjaman` AS p JOIN `barang` AS b ON p.id_barang = b.id JOIN `user` AS u ON b.id_penjamin = u.id; ';

        $this->db->select('*');
        $this->db->from('peminjaman as p');
        $this->db->join('barang as b', 'p.id_barang = b.id');
        $this->db->join('user as u', 'p.id_penjamin = u.id');
        
        $this->db->order_by('p.tanggal_pinjam', 'DESC');
        return $query       = $this->db->get();
    }

    public function getFilteredPeminjaman($filter)
    {
        $this->db->select('p.*, b.*, u.*');
        $this->db->from('peminjaman as p');
        $this->db->join('barang as b', 'p.id_barang = b.id');
        $this->db->join('user as u', 'p.id_penjamin = u.id');

        if ($filter == 'minggu') {
            $this->db->where('WEEK(p.tanggal_pinjam) = WEEK(NOW())');

            $this->db->order_by('p.tanggal_pinjam', 'DESC');
            return $this->db->get()->result();
        }

        if ($filter == 'bulan') {
            $this->db->where('MONTH(p.tanggal_pinjam)', date('m'));

            $this->db->order_by('p.tanggal_pinjam', 'DESC');
            return $this->db->get()->result();
        }

        if ($filter == 'tahun') {
           $this->db->where('YEAR(p.tanggal_pinjam)', date('Y'));

            $this->db->order_by('p.tanggal_pinjam', 'DESC');
            return $this->db->get()->result();
        }
        
        $this->db->order_by('p.tanggal_pinjam', 'DESC');
        $this->db->distinct();
        return $this->db->get($this->table)->result();

    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        if(!$id) return;

        $query              = $this->db->get_where($this->table, ['id_peminjam' => $id]);
        return $query->row();
    }

    public function update($data)
    {
        if(!isset($data['id_peminjam'])) return;

        return $this->db->update($this->table, $data, ['id_peminjam' => $data['id_peminjam']]);
    }

    public function delete($id)
    {
        if(!$id) return;

        return $this->db->delete($this->table, ['id_peminjam' => $id]);
    }

}

?>