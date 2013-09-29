<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_controller
{

    public function __construct()
    {
    	parent :: __construct();

        // the libraries we need
        $this->load->library('session');
        $this->load->helper('url');

    }

    public function index()
    {
        if($this->input->post('btn_login')):

            // here you check the user credentials to your database o whatever

            // we need at least this structure for the user:
            $user['name']   = 'Test user'; 
            $user['id']     = 1;
            // and we save it to the session var user
            $this->session->set_userdata('user',$user);
            //sucessfull Login go to Main page of your site
            redirect('/test');
        endif;
    	$this->load->view('login_view');
    }

    public function logout()
    {
        $user = NULL;
        $this->session->set_userdata('user', $user); // do not use NULL direct here. It doesn't work
        redirect('/');
    }

}