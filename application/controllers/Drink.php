<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drink extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('drink_model');
	}

    public function insert()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('discount', 'discount', 'required|less_than_equal_to[100]|alpha_numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|min_length[1]|alpha_numeric');
        if ($this->form_validation->run() === FALSE) {
            redirect('dashboard/data?status=failed');
        } else {
            $this->drink_model->insert();
            redirect('dashboard/data?status=success');
        }
    }
    public function update()
    {
    	$this->form_validation->set_rules('id', 'id', 'required');
    	$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
        $this->form_validation->set_rules('price', 'Price', 'required|min_length[4]|alpha_numeric');
        $this->form_validation->set_rules('discount', 'discount', 'required|less_than_equal_to[100]|alpha_numeric');
        $this->form_validation->set_rules('stok', 'Stok', 'required|min_length[1]|alpha_numeric');
        if ($this->form_validation->run() === FALSE) {
            redirect('dashboard/data?status=failed');
        } else {
            $this->drink_model->update();
            redirect('dashboard/data?status=success');
        }
    }

}

