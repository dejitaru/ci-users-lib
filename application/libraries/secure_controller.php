<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class secure_controller extends CI_Controller
{
	public $data;

    public function __construct()
    {
    	parent :: __construct();

        // we need this libraries in case you havent loaded in autoload.php
        $this->load->library('session');
        $this->load->helper('url');
    	define('LOGIN_CONTROLLER' , '/login');	
		define('DENIED_VIEW' , 'denied_view');	

        // here are the users id and the available uris
        $this->data['access'] = json_decode('{
                "users": [
                    {
                        "id": 1,
                        "urls": [
                            "test/index",
                            "test/second"
                        ]
                    },
                    {
                        "id": 2,
                        "urls": [
                            "test/index",
                            "test/second"
                        ]
                    }
                ]
            }');


		if(!$this->_has_active_session())
		{
			redirect(LOGIN_CONTROLLER);
    	}
    	if( !$this->_has_access() )
    	{
    		$this->load->view(DENIED_VIEW , $this->data);
			die($this->output->_display());
    	}
    }

    private function _has_active_session()
    {
    	if($this->session->userdata('user')):
            $this->data['user'] = $this->session->userdata('user');
			return TRUE;	
		endif;
        
		return FALSE;	
    }

    private function _has_access()     
    {         
        $user_id = $this->data['user']['id'];
        $current_url = $this->router->fetch_directory().$this->router->fetch_class().'/'.$this->router->fetch_method();     
        if(in_array($current_url, $this->data['access']->users[$user_id]->urls)):
            return TRUE;
        endif;
        return FALSE;
    }
}