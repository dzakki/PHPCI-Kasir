<?php

class Store_Model extends CI_Model
{
	public function __construct()
    {
        parent::__construct();
    }

    public function order()
    {
    	$this->load->helper('string');
        $id_transaksi = random_string('alnum', 16);
        $id_transaksi = $id_transaksi.date('d');
        $pay = str_replace(".", "",$this->input->post('pay'));
        $data = array(
            'id_transaksi'  => $id_transaksi,
            'id_kasir'      => $_SESSION['user_id'],
            'id_customer'   => $this->role_customer(),
            'id_meja'       => $this->input->post('table'),
            'total'         => $pay,
            'bayar'         => 'success'
        );
        $this->db->insert('tb_transaksi', $data);
        $this->db->query("INSERT INTO tb_order_minuman (id_transaksi,id_minuman,jumlah_minuman,harga) SELECT '$id_transaksi',id_minuman, jumlah, harga FROM tb_keranjang WHERE id_user = '".$_SESSION['user_id']."' ");
    }
    public function role_customer()
    {
    	if (empty($this->input->post('id_customer'))) {
    		return $_SESSION['user_id'];
    	}else{
    		return $this->input->post('id_customer');
    	}
    }
    public function clean()
    {
    	$query = $this->db->get_where('tb_keranjang', array('id_user' => $_SESSION['user_id']));
        if (!empty($query->row_array())) {
            $this->db->delete('tb_keranjang', array('id_user' => $_SESSION['user_id']));
        }

    }

    public function del_cart($id)
    {
         $this->db->delete('tb_keranjang', array('id_keranjang' => $id));
    }

    public function subtotal()
    {
        $this->db->select_sum('total_harga');
        $query = $this->db->get('tb_keranjang');
        return $query->row_array();
    }

    public function get_transactions()
    {
        $this->db->select('tb_transaksi.id_transaksi, tb_transaksi.id_kasir, tb_user.username, id_meja, tb_transaksi.total, tb_transaksi.bayar, tb_transaksi.status_order, tb_transaksi.created_at');
        $this->db->join('tb_user', 'tb_transaksi.id_customer =  tb_user.id_user');
        if ($_SESSION['role'] == "1") {
            $this->db->where('tb_transaksi.id_customer', $_SESSION['user_id']);
        }elseif ($_SESSION['role'] == "3") {
             $this->db->where('tb_transaksi.id_kasir', $_SESSION['user_id']);
        }
        $query = $this->db->get('tb_transaksi');
        return $query->result_array();

    }
    public function update_status_pay($id)
    {
        $data = array('bayar' => 'success');
        $this->db->where('id_transaksi', $id);
        $this->db->update('tb_transaksi', $data);
    }
    public function update_status_order($id)
    {
        $data = array('status_order' => 'success');
        $this->db->where('id_transaksi', $id);
        $this->db->update('tb_transaksi', $data);
    }

    public function get_order()
    {
        $this->db->select('tb_minuman.nama_minuman, tb_order_minuman.jumlah_minuman, tb_order_minuman.harga');
        $this->db->from('tb_order_minuman');
        $this->db->join('tb_minuman', 'tb_order_minuman.id_minuman = tb_minuman.id_minuman');
        $this->db->where('tb_order_minuman.id_transaksi', $this->input->post('id'));
        $query = $this->db->get();
        return $query->result();
    }

}
