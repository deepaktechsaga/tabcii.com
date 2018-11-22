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

class Test extends REST_Controller {

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
public function seatLayOut_post()
{      
    $tripId   = trim($this->post('tripId'));
   
    // blank array variable
    $response = array();

    if(!empty($tripId))
    {
        $tripdetails = $this->redbus->getTripDetails($tripId);      
        $json_decoded =json_decode($tripdetails,true);
     	
     	print_r($json_decoded); die();
     	             
        foreach($json_decoded['seats'] as $key => $val)
        {       
            $sql = "insert into seat_layout (tripId,available,baseFare,seat_column,seat_row,fare,ladiesSeat,length,malesSeat,markupFareAbsolute,markupFarePercentage,name,operatorServiceChargeAbsolute,operatorServiceChargePercent,serviceTaxAbsolute,serviceTaxPercentage,width,zIndex) values('".$tripId."','".$val['available']."','".$val['baseFare']."','".$val['column']."','".$val['row']."','".$val['fare']."','".$val['ladiesSeat']."','".$val['length']."','".$val['malesSeat']."','".$val['markupFareAbsolute']."','".$val['markupFarePercentage']."','".$val['name']."','".$val['operatorServiceChargeAbsolute']."','".$val['operatorServiceChargePercent']."','".$val['serviceTaxAbsolute']."','".$val['serviceTaxPercentage']."','".$val['width']."','".$val['zIndex']."')";    
            $result =   mysqli_query($conn, $sql);    

        } 
                
        if($result)
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



}
