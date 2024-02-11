<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller { // find the MY_Contoller to know how i make the templating

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session'); // to get the library of session
        $this->load->library('set_custom_session'); // custom library
      
        // $this->load->model('Account_Model/User_verification'); // add model here
        
        
    }	
	public function index()
	{
		$this->Dashboard();
	}
	public function Dashboard()
	{
        // find the MY_Contoller to know how i make the templating
		// $this->render('MainModule/sampleMainDashboard.php'); // the filename of page
        $data['title'] = 'Dashboard';
        $this->render('MainModule/sampleMainDashboard.php',$data); // the The Method to pass an aray data

	}
    public function Table_View()
	{
        // find the MY_Contoller to know how i make the templating
        $data['title'] = 'Tables';

		// $this->render('MainModule/sampleTableView.php'); // the filename of page
        $this->render('MainModule/sampleTableView.php',$data); // the The Method to pass an aray data
	}
    public function Icons()
	{
        // find the MY_Contoller to know how i make the templating
        $data['title'] = 'Icon Dashboard';

		// $this->render('MainModule/sampleIcons.php'); // the filename of page
        $this->render('MainModule/sampleIcons.php',$data); // the The Method to pass an aray data
	}
	// sample below on our 
	// public function index()
	// {   
    //     $current_uri = base_url(uri_string());
    //     $admin_uri = base_url('Admin');
    //     if($current_uri!=$admin_uri){
    //         redirect(base_url('index.php/Admin'));
    //     }
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_rules('username', 'Username', 'required');
    //     $this->form_validation->set_rules('password', 'Password', 'trim|required');
    //     if($this->form_validation->run() == FALSE) 
    //     {
    //         $this->login();
    //     }
    //     else{
    //         $credentials = array(
    //             'username' => $this->input->post('username'),
    //             'password' => $this->input->post('password')
    //         );
    //         $check = $this->User_verification->login($credentials);
    //         $check_instructor = $this->User_verification->login_instructor($credentials);

    //         if($check->num_rows() != 0){
    //             // echo'user';exit;
    //             foreach($check->result_array() as $row){
    //                 $array = array(
    //                     'userid' => $row['User_ID'],
    //                     'fullname' => $row['User_FullName'],
    //                     'position' => $row['User_Position'],
    //                     'username' => $row['UserName'],
    //                     'user_type' => 'user',
    //                     // 'AccessType' => $row['AccessType'],
    //                     'department' => $row['User_Department']
    //                 );
    //             }
    //             $this->session->set_userdata('logged_in',$array);

    //             $check_assignment = $this->User_verification->check_module_assignment($array['userid']);
    //             $only_des = 0;
    //             $sess =  $this->session->userdata('logged_in');
    //             redirect($check_assignment['parent_alias'],'refresh');

    //         }else if($check_instructor->num_rows() > 0){
    //             // echo'instructor';exit;
    //             foreach($check_instructor->result_array() as $row){
    //                 $array = array(
    //                     'userid' => $row['ID'],
    //                     'fullname' => $row['Instructor_Name'],
    //                     // 'position' => "",
    //                     'department' => $row['Instructor_Department'],
    //                     'username' => $row['Instructor_ID'],
    //                     'user_type' => 'instructor',
    //                     'department' => 'instructor',
    //                 );
    //             }
    //             $this->session->set_userdata('logged_in',$array);

    //             redirect('Grading','refresh');
    //             // die();
    //         }
    //         else{
    //             $this->session->set_flashdata('login_message','Invalid Username or Password');
                
    //             $this->login();
    //         }
    //     }
    // }
	// public function logout(){
    //     $this->session->unset_userdata('logged_in');
    //     redirect('Admin');
    // }

	
    // public function Dashboard()
	// {
    //     $this->render($this->set_views->admin_dashboard());
    // }
    
    // public function Manage_Account()
	// {
    //     $this->data['AccountList'] = $this->User_verification->login($credentials);
    //     $this->render($this->set_views->admind_create_Account());
    // }

    // public function checkSession(){
    //     print_r($this->session->userdata('logged_in'));
    // }
}

