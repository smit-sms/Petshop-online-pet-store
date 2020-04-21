<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_cont extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->load->helper('url');
		$this->load->helper('form');
		// $this->load->library('cart');

		// load model also
		$this->load->model('admin_model');
		$this->load->model('home_model');
	}
	
	function index(){
		$session_data = $this->session->userdata('logged_in');
        $data['session_data'] = $session_data;
        $data['subcat'] = $this->admin_model->showsubcategories();
		$data['cat']    = $this->admin_model->showcategories();
		$data['prod']   = $this->admin_model->products();
		
		$this->load->view('include/header',$data);
		$this->load->view('viewcart',$data);
		$this->load->view('include/footer',$data);
	}

	function addtocart(){
		$prod_id = $this->input->post('prod_id');
		$proddata = $this->home_model->proddata($prod_id);

		$data = array(
		 	'id'      => $prod_id,
        	'qty'     => 1,
        	'price'   => $proddata[0]['prod_price'],
        	'name'    => $proddata[0]['prod_name']
		);

		foreach ($this->cart->contents() as $items) {
			if($items['id'] == $prod_id){
				$this->cart->remove($items['rowid']);
			}
		}
		$this->cart->insert($data);
	}

	function removefromcart(){
		$rowid = $this->input->post('rowid');
		$this->cart->remove($rowid);
	}

	function placeorder(){
		$email = $this->input->post('email');
		
		$items = $this->cart->contents();

		$session_data = $this->session->userdata('logged_in');
		$userid = $this->home_model->getuserid($session_data['email']);

		$data = array();
		$dat = array();
		foreach ($items as $item) {
			$data['user_id'] = $userid;
			$data['prod_id'] = $item['id'];
			$data['qty']	 = $item['qty'];	
			array_push($dat, $data);
		}
		$this->cart->destroy();
		$this->home_model->placeorder($dat);
	}
}
?>