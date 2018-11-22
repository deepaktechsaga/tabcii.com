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

class Techsaga{
var $CI;

public function __construct($params = array())
{
    $this->CI =& get_instance();
    $this->CI->load->helper('url');       
    $this->CI->load->database();

}


function addNumers($numer1=0, $numer2=0)
{
	$result = 0;

	$result = $numer1+$numer2;	

	return $result;
}
	
	

}