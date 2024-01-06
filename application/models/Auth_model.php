<?php

class Auth_model extends CI_Model
{

    public function login($table, $where)
    {

        return $this->db->get_where($table, $where);

    }

}

?>