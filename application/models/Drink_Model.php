<?php

class Drink_Model extends CI_Model
{
    var $table = 'tb_minuman';
    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        $ppn = intval($this->input->post('price')) * 0.1;
        $diskon = intval($this->input->post('price')) * intval($this->input->post('discount')) / 100;
        $harga_jual = intval($this->input->post('price')) + $ppn - $diskon;
        $data = [
            'nama_minuman'  => $this->input->post('name'),
            'harga_minuman' => $this->input->post('price'),
            'harga_jual'    => $harga_jual,
            'ppn'           => $ppn,
            'diskon'        => $this->input->post('discount'),
            'stok'          => $this->input->post('stok'),
        ];
        $this->db->insert($this->table, $data);
    }

    public function update()
    {
        $ppn = intval($this->input->post('price')) * 0.1;
        $diskon = intval($this->input->post('price')) * intval($this->input->post('discount')) / 100;
        $harga_jual = intval($this->input->post('price')) + $ppn - $diskon;
        $data = [
            'nama_minuman'  => $this->input->post('name'),
            'harga_minuman' => $this->input->post('price'),
            'harga_jual'    => $harga_jual,
            'ppn'           => $ppn,
            'diskon'        => $this->input->post('discount'),
            'stok'          => $this->input->post('stok'),
        ];
        $this->db->where('id_minuman', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }

    public function get_drinks()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_drink($key,$value)
    {
        $query = $this->db->get_where($this->table, array($key => $value));
        if (!empty($query->row_array())) {
            return $query->row_array();
        }
        return false;
    }
    public function add_cart()
    {
        $harga = $this->get_drink('id_minuman', $this->input->post('id'))['harga_jual'];
        $total_harga = $harga * intval($this->input->post('jumlah'));
        $data = array(
            'id_user' => $_SESSION['user_id'],
            'id_minuman' => $this->input->post('id'),
            'jumlah' => $this->input->post('jumlah'),
            'harga' => $harga,
            'total_harga' => $total_harga
        );
        $this->db->insert('tb_keranjang', $data);
    }


}
