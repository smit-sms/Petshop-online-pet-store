<?php
class admin_model extends CI_model{
	//display users
	function getusers(){
		$users = $this->db->where(['role' => 'user'])->get('users');
		return $users->result_array();
	}

	function CheckLogin($email,$password){
		$qry = "SELECT COUNT(*) AS cnt FROM users WHERE email = ? AND password = ? ";
		$res = $this->db->query($qry,array($email,$password))->result();
		if($res[0]->cnt > 0){
			echo '1';
		}
		else{
			echo '0';
		}
	}

	function get_data($email){
		$sql = $this->db->query("SELECT email, password, role FROM users WHERE email = '$email' ");
		return $sql->result_array();
	}

	//--------------------------------------------------------------------------------------------------------------

	//view all categories
	function showcategories(){
		$cat = $this->db->get('category');
		return $cat->result_array();
	}

	//count category
	function catcount(){
		$cat = $this->db->get('category');
		$cat = $cat->result_array();
		return count($cat);
	}

	//add category
	function addcat($catdata){
		$this->db->insert('category',$catdata);
	}

	//delete category
	function deletecat($cat_id){
		$this->db->delete('category', array('cat_id' => $cat_id));
	}
	
	//-------------------------------------------------------------------------------------------------------------
	
	//view all subcategories
	function showsubcategories(){
		$subcat = $this->db->get('sub_category');
		return $subcat->result_array();
	}
	//count subcategory
	function subcatcount(){
		$subcat = $this->db->get('sub_category');
		$subcat = $subcat->result_array();
		return count($subcat);
	}

	//add subcategory
	function addsubcat($subcatdata){
		$this->db->insert('sub_category',$subcatdata);
	}

	//delete subcategory
	function deletesubcat($sub_id){
		$this->db->delete('sub_category', array('sub_id' => $sub_id));
	}

	//-------------------------------------------------------------------------------------------------------------
	function orders(){
		$orders = $this->db->query("SELECT orders.order_id, users.first_name, users.last_name, products.prod_id, products.prod_name FROM orders JOIN users ON orders.user_id = users.id JOIN products ON orders.prod_id = products.prod_id");
		return $orders->result_array();
	}

	//-------------------------------------------------------------------------------------------------------------
	
	//count products
	function prodcount(){
		$prodcount = $this->db->get('products');
		$prodcount = $prodcount->result_array();
		return count($prodcount);
	}

	function addprod($proddata){
		$this->db->insert('products',$proddata);
	}

	function products(){
		$prod = $this->db->get('products');
		return $prod->result_array();
	}

	function deleteprod($prod_id){
		$this->db->delete('products', array('prod_id' => $prod_id) );
	}
}
?>