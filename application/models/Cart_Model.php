<?php

class Cart_Model extends CI_Model
{
    var $table = 'tb_keranjang';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_carts()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_cart($key,$value)
    {
        $query = $this->db->get_where($this->table, array($key => $value));
        if (!empty($query->row_array())) {
            return $query->row_array();
        }
        return false;
    }

    public function subtotal()
    {
        $this->db->select_sum('total_harga');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }


}
