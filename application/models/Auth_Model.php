<?php

class Auth_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    public function insert_user()
    {
        $data = [
            'first_name' => $this->input->post('firstname'),
            'last_name' => $this->input->post('lastname'),
            'username' => $this->input->post('username'),
            'email'     => $this->input->post('email'),
            'password'  => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'gender'    => $this->input->post('gender')
        ];
        $this->db->insert('tb_user', $data);
    }


    public function get_user($key,$value)
    {
        $query = $this->db->get_where('tb_user', array($key => $value));
        if (!empty($query->row_array())) {
            return $query->row_array();
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

    public function logout()
    {
        session_destroy();
        $this->db->close();
    }
}
