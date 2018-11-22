<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Logistics extends CI_Controller {
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
			$config["base_url"] = base_url()."logistics/manage_log";

			$query = $this->db->query(" select * from front_queries"); 
	        $config['total_rows'] =  $query->num_rows();  		
			$config['per_page'] = 15;

			$this->pagination->initialize($config);

			$data["log_data"] = $this->Ve_model->get_rows_limit('front_queries','id','desc',$config["per_page"], $page); //print_r($data["user_data"]); die();		
			$data["total_rows"] =  $query->num_rows(); 

			$this->load->view('admin/header');		
			$this->load->view('admin/logistics/manage-booking-log',$data);
			$this->load->view('admin/footer'); 			
		}
		else
		{
		   redirect('user/login','refresh');
		}
	}

	public function view_log()
	{
	    if($this->session->userdata('is_admin_logged'))
		{
			$id = base64_decode($this->uri->segment(3));
			$data["log_data"] = $this->Ve_model->get_rows('tabcii_bus_booking'); 
			$data["passenger_data"] = $this->Ve_model->get_rows_c1('bus_passenger_detail','booking_id',$id); //print_r($data["passenger_data"]); die();

			$this->load->view('admin/header');		
			$this->load->view('admin/logistics/view-booking-log',$data);
			$this->load->view('admin/footer'); 			
		}
		else
		{
		   redirect('user/login','refresh');
		}
	}

}