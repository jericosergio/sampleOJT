<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_custom_session 
{
	// this is for setting the session of the user
	protected $CI;

	public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');

    }

	public function admin_session()
	{
		
		if ( $this->CI->session->has_userdata('logged_in' ) )
		{
			# code...
		
			$data = array( 
				'userid' => $this->CI->session->userdata('logged_in')['userid'],
				'fullname' => $this->CI->session->userdata('logged_in')['fullname'],
				'position' => $this->CI->session->userdata('logged_in')['position'],
				'username' => $this->CI->session->userdata('logged_in')['username']
			);

			
			return $data;
		}
		else
		{
			$this->CI->session->set_flashdata('login_message','You Must Login First');
			redirect('Welcome');
		}
	}

}