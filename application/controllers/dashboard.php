<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		if (empty($_SESSION['logged_in'])) {
			redirect('auth/login','refresh');
		}

		$this->load->model('user_model');
		$this->load->model('drink_model');
		$this->load->model('table_model');
		$this->load->model('cart_model');
		$this->load->model('store_model');
		$data['role'] = $_SESSION['role'];

		switch ($_SESSION['role']) {
			case "1":
				$data['status'] = "Customer";
				break;
			case "2":
				$data['status'] = "Owner";
				break;
			case "3":
				$data['status'] = "Cashier";
				break;	
			case "4":
				$data['status'] = "Waiter";
				break;
			case "5":
				$data['status'] = "Admin";
				break;		
			default:
				// code...
				break;
		}

		$this->load->view('templates/header.php', $data);
	}

	public function index()
	{
		if ($_SESSION['role'] == "1") {
			redirect('Dashboard/report');
		}

		$this->load->view('data/index.php');
		$this->load->view('templates/footer.php');
	}
	public function setting()
	{
		$this->load->view('data/setting.php');
		$this->load->view('templates/footer.php');
	}
	public function data()
	{
		if ($_SESSION['role'] == "1" || $_SESSION['role'] == "2" || $_SESSION['role'] == "3") {
			redirect('Dashboard');
		}
		$data['users'] = $this->user_model->get_users();
		$data['drinks'] = $this->drink_model->get_drinks();
		$data['tables'] = $this->table_model->get_tables();
		$data['customers'] = $this->user_model->get_user('role', '1');
		$this->load->view('data/data.php', $data);
		$this->load->view('templates/footer.php');
		
	}
	public function store()
	{
		$data['drinks'] = $this->drink_model->get_drinks();
		$data['subtotal'] = $this->cart_model->subtotal();
		$data['carts'] = $this->cart_model->get_carts();
		$data['tables'] = $this->table_model->get_tables();
		$data['customers'] = $this->user_model->get_user('role', '1');
		$this->load->view('store/index.php', $data);
		$this->load->view('templates/footer.php');
	}
	public function report()
	{
		$data['transactions'] = $this->store_model->get_transactions();
		$this->load->view('report/index.php', $data);
		$this->load->view('templates/footer.php');
	}

}

