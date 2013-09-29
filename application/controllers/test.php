<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH.'libraries/secure_controller.php'); 
class test extends secure_controller
{

    public function __construct()
    {
    	parent :: __construct();

    }

    public function index()
    {
    	echo 'Hi, welcome stranger. You have access';
    }

    public function second()
    {
    	echo 'Stranger, you also have access to this page';
    }    
}