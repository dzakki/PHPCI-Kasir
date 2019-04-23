<?php

class User_Model extends CI_Model
{
    var $table = 'tb_user';
    public function __construct()
    {
        parent::__construct();
    }

    public function get_users()
    {
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    public function get_user($key,$value)
    {
        $query = $this->db->get_where($this->table, array($key => $value));
        if (!empty($query->row_array())) {
            return $query->result_array();
        }
        return false;
    }
    public function get_user2($key,$value)
    {
        $query = $this->db->get_where('tb_user', array($key => $value));
        if (!empty($query->row_array())) {
            return $query->row_array();
        }
        return false;
    }

    public function update_level()
    {   
        $data = array('role' => $this->input->post('level'));
        $this->db->where('id_user', $this->input->post('id'));
        $this->db->update($this->table, $data);
    }
    public function update()
    {
        $data = [
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'gender'    => $this->input->post('gender')
        ];
        $this->db->where('id_user', $_SESSION['user_id']);
        $this->db->update('tb_user', $data);
    }
    public function update_password()
    {
        $data = array('password' => password_hash($this->input->post('password_new'), PASSWORD_DEFAULT));
        $this->db->where('id_user', $_SESSION['user_id']);
        $this->db->update($this->table, $data);
    }
}
