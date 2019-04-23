<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('drink_model');
        $this->load->model('store_model');
	}
	public function add_cart()
	{
        $this->form_validation->set_rules('jumlah', 'Stock', 'required|callback_checkStok');
        if ($this->form_validation->run() === FALSE) {
             redirect('dashboard/store?failed');
        } else {
            $this->drink_model->add_cart();
            redirect('Dashboard/store?success');
        }
	}
    public function del_cart($id)
    {
        $this->store_model->del_cart($id);
        redirect('Dashboard/store?dele=success');
    }

	public function checkStok($jumlah)
    {
        $id = $this->drink_model->get_drink('id_minuman', $this->input->post('id'))['stok'];
        if ($jumlah >  $id) {
            $this->form_validation->set_message('checkStok','Stock not enough');
            return false;
        }
        return true;
    }
    public function order()
    {
        $this->form_validation->set_rules('pay', 'Pay', 'required|callback_CheckPay');
        if ($this->form_validation->run() === FALSE) {
            redirect('dashboard/store?status=failed');
        } else {
            $this->store_model->order();
            redirect('dashboard/store?status=success');
        }
    }

    public function clean()
    {
        $this->store_model->clean();
        redirect('dashboard/store');
    }

    public function update_status_pay($id)
    {
        $this->store_model->update_status_pay($id);
        redirect('dashboard/report');
    }

    public function update_status_order($id)
    {
        $this->store_model->update_status_order($id);
        redirect('dashboard/report');
    }

    public function get_order()
    {
        $data = $this->store_model->get_order();
        echo json_encode($data);
    }

    public function CheckPay($CheckPay)
    {
        $data = $this->store_model->subtotal();
        if ($data['total_harga'] > $CheckPay) {
            $this->form_validation->set_message('CheckPay','Pay is wrong');
            return false;
        }
        return true;   
    }


}

