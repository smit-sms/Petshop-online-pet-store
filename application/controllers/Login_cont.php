<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_cont extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('file');
		$this->load->helper('url');
		$this->load->helper('form');
		// load model also
		$this->load->model('admin_model');
		$this->load->model('home_model');
	}

	function Login(){
		$data['subcat'] = $this->admin_model->showsubcategories();
		$data['cat']    = $this->admin_model->showcategories();
		$data['prod']   = $this->admin_model->products();

		$this->load->view('include/header',$data);
		$this->load->view('login');
		$this->load->view('include/footer',$data);
	}

	function Register(){
		$data['subcat'] = $this->admin_model->showsubcategories();
		$data['cat']    = $this->admin_model->showcategories();
		$data['prod']   = $this->admin_model->products();

		$this->load->view('include/header',$data);
		$this->load->view('register');
		$this->load->view('include/footer',$data);
	}

	function registernew(){
		$first_name = $this->input->post("first_name");
		$last_name  = $this->input->post("last_name");
		$email    	= $this->input->post("email");
		$address    = $this->input->post("address");
		$phone    	= $this->input->post("phone");
		$gender    	= $this->input->post("gender");
		$password 	= $this->input->post("password");

		$datas = array(
			'first_name' => $first_name,
			'last_name'  => $last_name,
			'email' 	 => $email,
			'password' 	 => $password,			
			'address' 	 => $address,
			'phone' 	 => $phone,
			'gender' 	 => $gender
		);
		$this->home_model->registernew($datas);

        $ses_array = array(
				'password' => $password,
				'email'    => $email
		);                            
        $this->session->set_userdata('logged_in', $ses_array);

        echo json_encode($datas);
	}

	function index()
	{
		$session_data = $this->session->userdata('logged_in');
        $data['session_data'] = $session_data;

		$data['users'] 		 = $this->admin_model->getusers();

		$data['catcount'] 	 = $this->admin_model->catcount();
		$data['subcatcount'] = $this->admin_model->subcatcount();
		$data['prodcount'] 	 = $this->admin_model->prodcount();

		$this->load->view('admin/include/header',$data);
		$this->load->view('admin/dashboard', $data);
	}

	function check_login(){
		$email    = $this->input->post("email");
		$password = $this->input->post("password");
		$this->admin_model->CheckLogin($email,$password);
	}

	function CreateSession(){
		$email 	 = $this->input->post("email");
		
	  	$get_chk = $this->admin_model->get_data($email);
        if($get_chk)
        {
            $ses_array = array();
            foreach ($get_chk as $row)
            {
                $ses_array = array(
                					'password' => $row['password'],
                					'email'    => $row['email']
                				);                            
            }
            $this->session->set_userdata('logged_in', $ses_array);
		}			
		$data = $get_chk[0]['role'];
		echo $data;
	}
	
	function logout()
    {
        $session_data = $this->session->userdata('logged_in');
        $this->session->unset_userdata('logged_in');    
        redirect('', 'refresh');
    }

}
?>