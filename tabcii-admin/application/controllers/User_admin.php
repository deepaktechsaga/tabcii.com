<?php defined('BASEPATH') OR exit('No direct script access allowed');
class User_admin extends CI_Controller {
	function __construct()
		{
			parent::__construct();
		}

	public function index()
    {		
		if($this->input->post())
		{								
			$this->form_validation->set_rules('passengerEmail','Enter Your Registered Email','required');	
			$this->form_validation->set_rules('passengerPassword','Password','required');	
			if($this->form_validation->run()==FALSE)
			{   		    		   					
				$this->load->view('User-admin/login');						
			}
			else
			{		
			$passengerEmail 		= $this->db->escape_str($_POST["passengerEmail"]);
			$passengerPassword 	= md5($this->db->escape_str($_POST["passengerPassword"]));		

			$is_admin_logged = $this->Ve_model->do_login('users','email',$passengerEmail,'password',$passengerPassword); 		
				
				if($is_admin_logged)
				{										
					$admin_data = $this->Ve_model->get_row_c1('users','email',$passengerEmail);															
					$session_data = array(					
						'is_admin_logged'		=>TRUE,
						'mobile'				=>$admin_data->mobile,													
						'userid'				=>$admin_data->id,										
						);
					// storing session data 
					$this->session->set_userdata($session_data);
									
					redirect('user_admin/dashboard');
				}			
				else
				{	
					$this->session->set_flashdata('login_error','Email or password wrong! ');
					redirect('user_admin/index');
				}
			}	
		}
		else
		{		    					
			$this->load->view('user-admin/login');					
		}
    }


      public function dashboard(){
      	if($this->session->userdata('is_admin_logged')){
      		$this->load->view('user-admin/header');
      		$this->load->view('user-admin/dashboard');
      		$this->load->view('user-admin/footer');
      	}else{
      		redirect('user_admin/index','refresh');
      	}
      }


		public function bus(){
			if($this->session->userdata('is_admin_logged')){
				$id=$this->session->userdata('userid');
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
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$config["base_url"] = base_url()."user_admin/bus";

		        $query = $this->db->query(" select * from tabcii_bus_booking"); 
        		$config['total_rows'] =  $query->num_rows();  		
				$config['per_page'] = 15;

				$this->pagination->initialize($config);
				$query = $this->db->query('SELECT t.*,u.* FROM tabcii_bus_booking AS t JOIN users AS u ON t.userId=u.id where u.id='. $id);
				$data["log_data"] = $query->result_array(); //print_r($data["log_data"]); die();		
				$data["total_rows"] =  $query->num_rows(); 

				$this->load->view('user-admin/header');		
				$this->load->view('user-admin/bus',$data);
				$this->load->view('user-admin/footer');
			}else{
				redirect('user_admin/index','refresh');
			}
		}

		public function logistic(){
			if($this->session->userdata('is_admin_logged')){
				$id=$this->session->userdata('userid');
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
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$config["base_url"] = base_url()."user_admin/logistic";

		        $query = $this->db->query(" select * from front_queries"); 
        		$config['total_rows'] =  $query->num_rows();  		
				$config['per_page'] = 15;

				$this->pagination->initialize($config);
				$query = $this->db->query('SELECT f.*,u.* FROM front_queries AS f JOIN users AS u ON f.user_id=u.id where u.id='. $id);
				$data["log_data"] = $query->result_array(); //print_r($data["log_data"]); die();		
				$data["total_rows"] =  $query->num_rows(); 

				$this->load->view('user-admin/header');		
				$this->load->view('user-admin/truck',$data);
				$this->load->view('user-admin/footer');
			}else{
				redirect('user_admin/index','refresh');
			}
		}

		public function car(){
			if($this->session->userdata('is_admin_logged')){
				$id=$this->session->userdata('userid');
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
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$config["base_url"] = base_url()."user_admin/car";

		        $query = $this->db->query(" select * from car_enquiry"); 
        		$config['total_rows'] =  $query->num_rows();  		
				$config['per_page'] = 15;

				$this->pagination->initialize($config);
				$query = $this->db->query('SELECT c.*,u.* FROM car_enquiry AS c JOIN users AS u ON c.user_id=u.id where u.id='. $id);
				$data["log_data"] = $query->result_array(); //print_r($data["log_data"]); die();		
				$data["total_rows"] =  $query->num_rows(); 

				$this->load->view('user-admin/header');		
				$this->load->view('user-admin/car',$data);
				$this->load->view('user-admin/footer');
			}else{
				redirect('user_admin/index','refresh');
			}
		}

		public function ambulance(){
			if($this->session->userdata('is_admin_logged')){
				$id=$this->session->userdata('userid');
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
				$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$config["base_url"] = base_url()."user_admin/ambulance";

		        $query = $this->db->query(" select * from ambulance_enquiry"); 
        		$config['total_rows'] =  $query->num_rows();  		
				$config['per_page'] = 15;

				$this->pagination->initialize($config);
				$query = $this->db->query('SELECT a.*,u.* FROM ambulance_enquiry AS a JOIN users AS u ON a.user_id=u.id where u.id='. $id);
				$data["log_data"] = $query->result_array(); //print_r($data["log_data"]); die();		
				$data["total_rows"] =  $query->num_rows(); 

				$this->load->view('user-admin/header');		
				$this->load->view('user-admin/ambulance',$data);
				$this->load->view('user-admin/footer');
			}else{
				redirect('user_admin/index','refresh');
			}
		}

		public function logout(){
			$this->session->unset_userdata('is_admin_logged');
			$this->session->unset_userdata('username');	
			$this->session->unset_userdata('userid');
			redirect('user_admin/index','refresh');
		}
	}