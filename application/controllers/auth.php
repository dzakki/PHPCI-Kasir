<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
	}

	public function index()
	{
		redirect('auth/login','refresh');
	}
	public function login()
	{
		if (isset($_SESSION['logged_in'])) {
			redirect('dashboard','refresh');
		}
		$this->form_validation->set_rules('username','Username','required|min_length[5]|callback_checkUsername');
        $this->form_validation->set_rules('password','Password','required|callback_checkPass');
        if ($this->form_validation->run() == FALSE) {
        	$this->session->set_flashdata('errors', validation_errors());
			$this->load->view('auth/login.php');
        } else {
        	$user = $this->auth_model->get_user('username', $this->input->post('username'));
        	$session = array(
                'user_id'       => $user['id_user'],
                'first_name'      => $user['first_name'],
                'last_name'      => $user['last_name'],
                'username'      => $user['username'],
                'email'      	=> $user['email'],
                'gender'        => $user['gender'],
                'role'          => $user['role'],
                'logged_in'     => true
            );
            $this->session->set_userdata($session);
        	redirect('Dashboard');
        }
	}
	public function register()
	{
		if (isset($_SESSION['logged_in'])) {
			redirect('dashboard','refresh');
		}
		$this->form_validation->set_rules('firstname','Firstname','required');
        $this->form_validation->set_rules('lastname','Lastname','required');
        $this->form_validation->set_rules('username','Username','required|min_length[5]|max_length[50]|is_unique[tb_user.username]');
        $this->form_validation->set_rules('email','Email','required|valid_email|is_unique[tb_user.email]');
        $this->form_validation->set_rules('password','Password','required|min_length[5]');
        $this->form_validation->set_rules('gender','Gender','required');
        if ($this->form_validation->run() === FALSE) {
    		$this->session->set_flashdata('errors', validation_errors());
    		$this->load->view('auth/login.php');
        }else{
	        $this->auth_model->insert_user();
	        $this->session->set_flashdata('errors', validation_errors());
	        $this->load->view('auth/login.php');
        }


	}

	public function checkUsername($username)
	{
		$data = $this->auth_model->get_user('username',$username);
		if (!$data) {
			$this->form_validation->set_message('checkUsername', 'Username is incorrect');
			return false;
		}
		return true;
	}

	public function checkPass($password)
	{
		$data = $this->auth_model->get_user('username', $this->input->post('username'))['password'];
		if (password_verify($password, $data)) {
			return true;
		}
		$this->form_validation->set_message('checkPass', 'Password is incorrect');
		return false;
	}
	public function logout()
	{
		$this->auth_model->logout();
		redirect('auth');
	}
}
