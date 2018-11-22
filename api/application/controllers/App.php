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
        $this->load->model('site_model');
                
    } 
   

// vehicleType
public function vehicleType_get()
{                       
        $data = $this->site_model->get_rows_c1('vehicles','is_active',1);

        if (count($data) > 0 )
        {               
            $this->set_response([
                'status'  => TRUE,            
                'data'    =>$data
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status'  => FALSE,
                'message' => 'data not available'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
} 


// get material type list
public function materialType_get()
{                       
        $data = $this->site_model->get_rows_c1('load_categories','is_active',1);

        if (count($data) > 0 )
        {               
            $this->set_response([
                'status'  => TRUE,            
                'data'    =>$data
            ], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        }
        else
        {
            $this->set_response([
                'status'  => FALSE,
                'message' => 'data not available'
            ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
} 


// logistick query

public function createLogisticQuery_post()
{      
    $pickupLocation                 = trim($this->post('pickupLocation'));
    $pickupLocation_latitude        = trim($this->post('pickupLocation_latitude'));
    $pickupLocation_longitude       = trim($this->post('pickupLocation_longitude'));
    $dropLocation                   = trim($this->post('dropLocation'));
    $dropLocation_latitude          = trim($this->post('dropLocation_latitude'));
    $dropLocation_longitude         = trim($this->post('dropLocation_longitude'));
    $phoneNumber                    = trim($this->post('phoneNumber'));
    $vehicleType                    = trim($this->post('vehicleType'));
    $numOfTruck                     = trim($this->post('numOfTruck'));        
    $pickupDate                     = $this->post('pickupDate');    
    $materialType                   = trim($this->post('materialType'));
    $userName                       = trim($this->post('userName'));
    $userEmail                      = trim($this->post('userEmail'));
    $userMessage                    = trim($this->post('userMessage')); 
    $deviceType                     = trim($this->post('deviceType'));  // A = android , I = IOS
   
    // blank array variable
    $response = array();

if(!empty($pickupLocation) && !empty($phoneNumber) && !empty($dropLocation))
{
// store data into array variable
                  
    $queries_data = array(        
        'prepickuplocation'             =>  $pickupLocation, 
        'prepickuplocation_Lat'         =>  $pickupLocation_latitude,
        'prepickuplocation_Lng'         =>  $pickupLocation_longitude,
        'predroplocation'               =>  $dropLocation,
        'predroplocation_Lat'           =>  $dropLocation_latitude,
        'predroplocation_Lng'           =>  $dropLocation_longitude,
        'num_of_truck'                  =>  $numOfTruck,                          
        'prevehicletype'                =>  $vehicleType,
        'premobile'                    =>  $phoneNumber, 
        'preemail'                     =>  $userEmail,        
        'predateofpickup'              =>  $pickupDate,
        'message'                      =>  $userMessage,                
        'created_platform'             =>  $deviceType ,        
        'create_date'                  => date('Y-m-d H:i:s')
    );

        // save data into database
        $is_saved = $this->site_model->save_data('front_queries',$queries_data);
        $id   = $this->db->insert_id();
                
        if($is_saved)
        {
            $response = array("status"=>TRUE,"message"=>"Query has been Submitted");    
        }
        else
        {
            $response = array("status"=>FALSE,"message"=>"Query has been not created");   
        }            
    }
    else
    {
        $response = array("status"=>FALSE,"message"=>"Please provide manadatory fileds! "); 
    }   

    $this->set_response($response, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
    
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
 

}
