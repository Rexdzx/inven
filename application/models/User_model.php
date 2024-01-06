<?php

class User_model extends CI_Model
{

    private $table          = 'user';

    public function data()
    {

        $this->db->order_by('id', 'ASC');
        return $query       = $this->db->get($this->table);

    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        if(!$id) return;

        $query              = $this->db->get_where($this->table, ['id' => $id]);
        return $query->row();
    }

    public function update($data)
    {
        if(!isset($data['id'])) return;

        return $this->db->update($this->table, $data, ['id' => $data['id']]);
    }

    public function delete($id)
    {
        if(!$id) return;

        return $this->db->delete($this->table, ['id' => $id]);
    }
}

?>