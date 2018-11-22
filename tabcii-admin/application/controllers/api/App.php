<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

/**
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array
 *
 * @package         CodeIgniter
 * @subpackage      Rest Server
 * @category        Controller
 * @author          Phil Sturgeon, Chris Kacerguis
 * @license         MIT
 * @link            https://github.com/chriskacerguis/codeigniter-restserver
 */

class App extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

         $this->load->library('redbus.php');           
    }   

// sourceList
public function sourceList_get()
{  
    // blank array variable
    $response = array();            
    $source_data = array();        
 
    $query = $this->db->query("select * from source_city order by source_name ASC");
    $source_data = $query->result_array();        
                     
    $this->set_response($source_data, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
}

// Seat LayOut
public function userRegistration_post()
{    
    $mobile             = trim($this->post('mobile'));
    $created_platform   = trim($this->post('created_platform'));

    //print_r($this->post()); die();

    $os_platform = 'A';

    if(!empty($created_platform))
    {
        $os_platform = $created_platform;
    }

    $response = array();

    // Validate the input data allow only numeric 
    if(ctype_digit($mobile))
    {
        if($this->site_model->is_exist_c1('user','mobile',$mobile) == FALSE)
        {            
            $user_data = array(
                'user_role_id'=>2,
                'mobile'=>$mobile,
                'is_mobile_verified'=>'no',
                'created_platform'=>$os_platform,
                'is_active'=>'inactive',
                'user_ip'=>$this->input->ip_address(),
                'created_at'=>date('Y-m-d H:i:s')
            );

            $is_saved = $this->site_model->save_data('user',$user_data);
            $userid = $this->db->insert_id();

            // save otp into DB and send to user (by email, by sms)
            $otp = mt_rand(100000, 999999);

            if(strlen($mobile) == 8 )
            {
                $mobile = '973'.$mobile;
            }
            
            $this->send_otp_to_mobile_bh($otp,$mobile);
            $otp_data = array('mobile_otp'=>$otp,'send_otp_time'=>date('Y-m-d H:i:s'));
            $is_otp_sent = $this->site_model->update_row_c1('user','id',$userid,$otp_data);            

            if($is_otp_sent)
            {
                $response = array("status"=>TRUE,"userid"=>$userid,"otp"=>'',"message"=>"otp has been sent");    
            }            
        } 
        else
        {
            // if mobile number exist, 1- if user not verified mobile by OTP then send again otp, 2- if user verified but not completed profile (e.g. name, email,password) 

            $mobile_data_query = $this->db->query("
                                SELECT id,user_role_id,mobile,is_mobile_verified,created_platform,is_active
                                from user 
                                where user_role_id = 2 and is_mobile_verified = 'no' and  created_platform = 'A' 
                                and is_active = 'inactive' and mobile = $mobile
            ");

            $num_rows = $mobile_data_query->num_rows();

            if($num_rows > 0)
            {
                $user_data = $mobile_data_query->row();
                $userid = $user_data->id;

                 // save otp into database and send to user (by email, by sms)
                $otp = mt_rand(100000, 999999);
                if(strlen($mobile) == 8 )
                {
                    $mobile = '973'.$mobile;
                }
                
                $this->send_otp_to_mobile_bh($otp,$mobile);
                
                $otp_data = array('mobile_otp'=>$otp,'send_otp_time'=>date('Y-m-d H:i:s'));
                $is_otp_sent = $this->site_model->update_row_c1('user','id',$userid,$otp_data);
                if($is_otp_sent)
                {
                    $response = array("status"=>TRUE,"userid"=>$userid,"is_mobile_verified"=>"no","otp"=>$otp,"message"=>"otp has been sent");
                }                         
            }
            else
            {
                $response = array("status"=>FALSE,"message"=>"mobile number is already exist!");
            }            
        }       
    }
    else
    {
        $response = array("status"=>FALSE,"message"=>"Please enter valid number !");
    }     

    $this->set_response($response, REST_Controller::HTTP_CREATED);   
}


}
