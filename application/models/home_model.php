<?php
class home_model extends CI_model{

	function registernew($datas){
		$this->db->insert('users',$datas);
	}

	function prod_cat($cat_id){
		$prod_cat = $this->db->where(['cat_id' => $cat_id])->get('products');
		$prod_cat = $prod_cat->result_array();
		return $prod_cat;
	}

	function category($cat_id){
		$cat_id = $this->db->where(['cat_id' => $cat_id])->get('category');
		$cat_id = $cat_id->result_array();
		return $cat_id;
	}

	function myaccount($session_data){
		$account = $this->db->where(['email' => $session_data['email']])->get('users');
		$account = $account->result_array();
		return $account;
	}

	function orders($session_data){
		$email  = $session_data['email'];
		$userid = $this->db->where(['email' => $email])->get('users')->result_array();
		$userid = $userid[0]['id'];
		
		$orders = $this->db->query("SELECT orders.order_id, users.id, products.prod_id, products.prod_name, products.prod_price, orders.qty FROM orders JOIN users ON orders.user_id = users.id JOIN products ON orders.prod_id = products.prod_id")->result_array();
		$order = $orders;

		for ($i=0; $i < count($orders); $i++) { 
			if($orders[$i]['id'] != $userid){			
				unset($order[$i]);
			}			
		}
		sort($order);
		return $order;
	}

	function proddata($prod_id){
		$proddata = $this->db->where(['prod_id' => $prod_id])->get('products')->result_array();
		return $proddata;
	}

	function getuserid($email){
		$userid = $this->db->where(['email' => $email])->get('users')->result_array();
		$userid = $userid[0]['id'];
		return $userid;
	}

	function placeorder($dat){
		$this->db->insert_batch('orders', $dat);
	}

}