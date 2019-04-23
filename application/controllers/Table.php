<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class table extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('table_model');
	}

    public function insert()
    {
        $this->form_validation->set_rules('chair', 'chair', 'required|min_length[1]|less_than_equal_to[10]|alpha_numeric');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('dashboard/data?status=failed');
        } else {

            $this->table_model->insert();
            redirect('dashboard/data?status=success', 'refresh');
        }
    }
    public function update()
    {
        $this->form_validation->set_rules('id', 'ID', 'required');
        $this->form_validation->set_rules('chair', 'chair', 'required|min_length[1]|less_than_equal_to[10]|alpha_numeric');
        $this->form_validation->set_rules('status', 'status', 'required');
        if ($this->form_validation->run() === FALSE) {
            redirect('dashboard/data?status=failed');
        } else {

            $this->table_model->update();
            redirect('dashboard/data?status=success', 'refresh');
        }
    }

}

