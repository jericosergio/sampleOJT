<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_accessibility
{
    protected $CI;
    private $module;

    public function __construct()
    {
        // Do something with $params
        $this->CI = &get_instance();
        $this->CI->load->library('session');
        $this->CI->load->helper('url');
        // $this->CI->load->model('Account_Model/User_Accessibility_Model'); // make a model for user accessibility

        $this->module = array(
            'admin' => 1,
            'commonuser' => 2,

        );
    }
    
    public function module_admin_access($user_id)
    {
        $array_data = array(
            'user_id' => $user_id,
            'module_id' => $this->module['admin']
        );

        $output = $this->CI->User_Accessibility_Model->get_module_access($array_data);
        if ($output == 0) {
            // redirect('Advising');
            $this->CI->session->set_flashdata('login_message','You Have no Access to that module, You may contact ICT Office in concern of this issue.');
            redirect('Admin');
        }
    }

    public function module_commonuser_access($user_id)
    {
        $array_data = array(
            'user_id' => $user_id,
            'module_id' => $this->module['Registrar']
        );

        $output = $this->CI->User_Accessibility_Model->get_module_access($array_data);
        if ($output == 0) {
            // redirect('Advising');
            $this->CI->session->set_flashdata('login_message','You Have no Access to that module, You may contact ICT Office in concern of this issue.');

            redirect('Admin');
        }
    }

    public function get_module_list()
    {
        return $this->module;
    }

    public function get_user_module_access($user_id)
    {
        $output = $this->CI->User_Accessibility_Model->get_user_module_access($user_id);

        $array_output = array();

        if ($output) {
            # code...
            foreach ($output as $key => $module) {
                # code...
                $array_output[] = $module['parent_module_id'];
            }
        }



        return $array_output;
    }
}
