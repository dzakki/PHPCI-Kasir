<?php

class Table_Model extends CI_Model
{
    var $table = 'tb_meja';
    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        $data = array(
            "status"    => $this->input->post('status'),
            "kursi"     => $this->input->post('chair')
        );
        $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $data = array(
            "status"    => $this->input->post('status'),
            "kursi"     => $this->input->post('chair')
        );
        $this->db->where('id_meja', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }


    public function get_tables()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_table($key,$value)
    {
        $query = $this->db->get_where($this->table, array($key => $value));
        if (!empty($query->row_array())) {
            return $query->row_array();
        }
        return false;
    }

    public function logout()
    {
        session_destroy();
        $this->db->close();
    }
}
