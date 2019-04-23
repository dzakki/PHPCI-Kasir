<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function update()
	{
		$this->form_validation->set_rules('firstname','Firstname','required');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[50]');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('gender','Gender','required');
        if ($this->form_validation->run() === FALSE) {
    		redirect('dashboard/setting?status=failed','refresh');
        }else{
	        $this->user_model->update();
	        redirect('auth/logout?success','refresh');
        }
	}
	public function change_password()
	{
		$this->form_validation->set_rules('password','Password','required|callback_checkPassword');
        $this->form_validation->set_rules('password_new','New Password','required|min_length[5]');
        $this->form_validation->set_rules('password_verify','New Password Confirm','required|min_length[5]|matches[password_new]');
        if ($this->form_validation->run() == FALSE) {
        	redirect('dashboard/setting?status=failed','refresh');
        } else {
        	$this->user_model->update_password();
        	redirect('auth/logout?success','refresh');
        }
	}

	public function checkPassword($password)
	{
		$data = $this->user_model->get_user2('id_user', $_SESSION['user_id'])['password'];
		if (password_verify($password, $data)) {
			return true;
		}
		$this->form_validation->set_message('checkPass', 'Password is incorrect');
		return false;
	}

    public function update_level()
    {
        $this->user_model->update_level();
        redirect('dashboard/data');
    }

}

