<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	function __construct()
		{
			parent::__construct();
		}	

public function index()
{
    if($this->session->userdata('is_admin_logged'))
	{			
		redirect('admin/dashboard','refresh');					
	}
	else
	{
		redirect('admin/login','refresh');		
	}
}

public function common_layout($content)
{
	$this->load->view('admin/header');
	$this->load->view('admin/sidebar');
	$this->load->view($content);
	$this->load->view('admin/footer');		
}

public function login()
{		
	if($this->input->post())
	{								
		$this->form_validation->set_rules('username','Email/Username','required');	
		$this->form_validation->set_rules('password','Password','required');	
		if($this->form_validation->run()==FALSE)
		{   		    		   					
			$this->load->view('admin/login');						
		}
		else
		{		
		$username 		= $this->db->escape_str($_POST["username"]);
		$password 	= md5($this->db->escape_str($_POST["password"]));	
		//print_r($password); die;	

		$is_admin_logged = $this->Ve_model->do_login('tbl_admin_login','username',$username,'password',$password); 		
			
			if($is_admin_logged)
			{										
				$admin_data = $this->Ve_model->get_row_c1('tbl_admin_login','username',$username);															
				$session_data = array(					
					'is_admin_logged'		=>TRUE,
					'username'				=>$admin_data->username,													
					'userid'				=>$admin_data->id,										
					);
				// storing session data 
				$this->session->set_userdata($session_data);
								
				redirect('admin/dashboard');
			}			
			else
			{	
				$this->session->set_flashdata('login_error','Email/username or password wrong! ');
				redirect('admin/login');
			}
		}	
	}
	else
	{		    					
		$this->load->view('admin/login');					
	}
}

public function dashboard()
{
	if($this->session->userdata('is_admin_logged'))
	{
		//$data["booking_data"] = $this->Ve_model->get_rows('tabcii_bus_booking'); //print_r($data["booking_data"]);

		$this->load->view('admin/header');		
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer'); 	
	}
    else
	{
		redirect('admin/login','refresh');						
	}   
}

// delete permanent

public function delete_row_data()
{	
	$response = array();
	    
	    $base_dir = 'uploads/user-profile/';	    
	    $file_name ='';

	    $data = $this->Ve_model->get_row_c1($_POST['table'],'id',$_POST['id']);					
		$file_name = $data->profile_image;		

		$is_deleted = $this->Ve_model->delete_row_c1($_POST['table'],'id',$_POST['id']);							

		if($is_deleted)
		{						
			if(file_exists($base_dir.$file_name))
			{
				unlink($base_dir.$file_name);
			}
			$response = array("status"=>1,"message"=>"data deleted");			
		}	
	echo json_encode($response);
}


public function manage_log()
	{
	    if($this->session->userdata('is_admin_logged'))
		{
			//pagination design
			$config['full_tag_open']  = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['prev_link']      = '< ';
			$config['prev_tag_open']  = '<li>';
			$config['prev_tag_close'] = '</li>';
			$config['next_link']      = ' >';
			$config['next_tag_open']  = '<li>';
			$config['next_tag_close'] = '</li>';
			$config['cur_tag_open']   = '<li class="active"><a href="#">';
			$config['cur_tag_close']  = '</a></li>';
			$config['num_tag_open']   = '<li>';
			$config['num_tag_close']  = '</li>';
			$config['first_tag_open'] = '<li>';
			$config['first_tag_close']= '</li>';
			$config['last_tag_open']  = '<li>';
			$config['last_tag_close'] = '</li>';
			$config['first_link']     = 'First';
			$config['last_link']      = 'Last';

			//pagination
			$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$config["base_url"] = base_url()."admin/manage_log";

			$query = $this->db->query(" select * from users"); 
	        $config['total_rows'] =  $query->num_rows();  		
			$config['per_page'] = 15;

			$this->pagination->initialize($config);

			$data["log_data"] = $this->Ve_model->get_rows_limit('users','id','desc',$config["per_page"], $page); //print_r($data["user_data"]); die();		
			$data["total_rows"] =  $query->num_rows(); 

			$this->load->view('admin/header');		
			$this->load->view('admin/user/manage-booking-log',$data);
			$this->load->view('admin/footer'); 			
		}
		else
		{
		   redirect('user/login','refresh');
		}
	}

	public function logout()
{				
	$this->session->unset_userdata('is_admin_logged');
	$this->session->unset_userdata('username');	
	$this->session->unset_userdata('userid');
	
	redirect('admin/login','refresh');
}

public function vendors(){

	$vendors = $this->Ve_model->getAllVendors();
	$this->load->view('admin/header');		
	$this->load->view('admin/vendor/vendor_lists',['vendor'=>$vendors]);
	$this->load->view('admin/footer'); 
}

public function vendor_vehicles(){

	$vehicles = $this->Ve_model->getAllVendorsVehicle();
	$this->load->view('admin/header');		
	$this->load->view('admin/vendor/vendor_vehicles',['vehicles'=>$vehicles]);
	$this->load->view('admin/footer'); 
}

}