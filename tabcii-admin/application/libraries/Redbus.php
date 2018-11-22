<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package     CodeIgniter
 * @author      Mithilesh SAh
 * @copyright   Copyright (c) 2018 Mithilesh Sah.
 * @license     
 * @link        http://www.techsaga.co.in
 * @since       Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * Mithilesh Sah core CodeIgniter class
 *
 * @package     CodeIgniter
 * @subpackage  Libraries
 * @category    API Lib 
 * @author      Mithilesh Sah
 * @link        http://www.anillabs.com
 */

class Redbus{
var $CI;
var $key = "MCycaVxF6XVV0ImKgqFPBAncx0prPp"; 
var $secret = "5f0lpy9heMvXNQ069lQPNMomysX6rt";
var $base_url = "http://api.seatseller.travel/";

public function __construct($params = array())
{
    $this->CI =& get_instance();
    $this->CI->load->helper('url');       
    $this->CI->load->database();

//  Include lib
include_once APPPATH . 'third_party/redbus/library/OAuthStore.php';
include_once APPPATH . 'third_party/redbus/library/OAuthRequester.php';
}

function invokeGetRequest($requestUrl)
	{

		global $key, $secret, $base_url,$source,$destination,$doj,$tripId,$boarding;
		$url = "http://api.seatseller.travel/".$requestUrl;

		$curl_options = array(CURLOPT_HTTPHEADER => array('Content-Type: application/json'), CURLOPT_TIMEOUT => 0, 				CURLOPT_CONNECTTIMEOUT => 0);
		$options = array('consumer_key' => "MCycaVxF6XVV0ImKgqFPBAncx0prPp", 'consumer_secret' => "5f0lpy9heMvXNQ069lQPNMomysX6rt");
		OAuthStore::instance("2Leg", $options);
		$method = "GET";
		$params = null;
		try
		{
			$this->OAuthRequester = new OAuthRequester($url, $method, $params);
			$result = $this->OAuthRequester->doRequest();
			$response = $result['body'];
			return $response;
		}
		catch(OAuthException2 $e)
		{
			echo "Exception happened".$e."<hr></br>";
		}
		catch(Exception $e1)
		{
			echo "generic exception".$e1."<hr></br>";
		}
	}

	function invokePostRequest($requestUrl, $blockRequest)
	{		
		global $key, $secret, $base_url;
		$url = $base_url.$requestUrl;
		$curl_options = array(CURLOPT_HTTPHEADER => array('Content-Type: application/json'), CURLOPT_TIMEOUT => 0, 				CURLOPT_CONNECTTIMEOUT => 0);
		$options = array('consumer_key' => $key, 'consumer_secret' => $secret);
		OAuthStore::instance("2Leg", $options);
		$method = "POST";
		$params = null;
		try
		{
			$request = new OAuthRequester($url, $method, $params, $blockRequest);
			echo "Timeout is: ".$curl_options[CURLOPT_TIMEOUT]."<hr></br>";
			echo "Connection timeout is: ".$curl_options[CURLOPT_CONNECTTIMEOUT ]."<hr></br>";
			$result = $request->doRequest(0,$curl_options);
			$response = $result['body'];
			return $response;
		}
		catch(OAuthException2 $e)
		{
			echo "Exception happened".$e."<hr></br>";
		}
		catch(Exception $e1)
		{
			echo "generic exception".$e1."<hr></br>";
		}
	}

	function getAllSources()
	{
		return $this->invokeGetRequest("sources");
	}
	
	function getAllDestinations($sourceId)
	{
		return $this->invokeGetRequest("destinations?source=".$sourceId);
	}

	function getAvailableTrips($sourceId,$destinationId,$date)
	{
		return $this->invokeGetRequest("availabletrips?source=".$sourceId. "&destination=" . $destinationId . "&doj=" . $date); 		
	}
	 

	function getBoardingPoint($boarding,$tripId)
	{
		return $this->invokeGetRequest("boardingPoint?id=".$boarding. "&tripId=" .$tripId);
	}

	function getTripDetails($tripId)
	{
		return $this->invokeGetRequest("tripdetails?id=".$tripId); 	
	}
	
	function blockTicket($blockRequest)
	{	
		/*foreach($blockRequest->inventoryItems as $inventory)
		{
			echo "</hr></br>Seat Name:".$inventory->name;
			echo "</hr></br>Fare:".$inventory->fare;
			echo "</hr></br>Gender:".$inventory->ladiesSeat."</hr></br>";
		}
		*/	return $this->invokePostRequest("blockTicket",$blockRequest); 
	}

	function confirmTicket($blockKey)
	{
			return $this->invokePostRequest("bookticket?blockKey=".$blockKey,"");
	} 
	function getTicket($ticketId)
	{
		
		return $this->invokeGetRequest("ticket?tin=".$ticketId);
	}

	function getCancellationData($cancellationId)
	{
		return $this->invokeGetRequest("cancellationdata?tin=".$cancellationId);
		echo " <hr>The ticket details are:".$cancellationId."<hr/>";
	}

	function cancelTicket($cancelRequest)
	{
		return $this->invokePostRequest("cancelticket",$cancelRequest);
	}


}