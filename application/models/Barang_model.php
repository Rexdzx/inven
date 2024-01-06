<?php

class Barang_model extends CI_Model
{

    private $table          = 'barang';

    public function data()
    {

        $this->db->order_by('id', 'ASC');
        return $query       = $this->db->get($this->table);
    }

    public function isBarangInUse($barangId)
    {
        // Query untuk memeriksa apakah barang dengan ID tertentu sedang dipinjam atau berelasi dengan peminjaman
        $this->db->where('id_barang', $barangId);
        $this->db->from('peminjaman');
        $count = $this->db->count_all_results();

        return ($count > 0);
    }

    public function getFilteredBarang($filter)
    {
        if (!empty($filter)) {
            $this->db->where('barang.kondisi', $filter);
        }

        return $this->db->get('barang')->result();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        if (!$id) return;

        $query              = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row();
    }

    public function update($data)
    {
        if (!isset($data['id'])) return;

        return $this->db->update($this->table, $data, ['id' => $data['id']]);
    }

    public function delete($id)
    {
        if (!$id) return;

        return $this->db->delete($this->table, ['id' => $id]);
    }
}