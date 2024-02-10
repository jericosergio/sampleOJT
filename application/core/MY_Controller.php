
    <?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	public $template = array();
    public $data = array();
    public $middle = '';
    public $render_data = '';
    private $admin_data;

	function __construct() {

        parent::__construct();
        
        $this->data['message'] = '';

        $this->load->helper(array('form', 'language', 'url', 'date'));

        $this->load->library('set_custom_session');
        $this->load->library('User_accessibility'); 

        $this->data['admin_data'] = NULL;

        
    }

	public function render($middleParam = '')  // this is for templating
    {

        //   $this->data['admin_data'] = $this->set_custom_session->admin_session(); // this is for database

            // if($this->session->userdata('logged_id')['user_type']=="admin"){
            //     $this->data['module_list'] = $this->user_accessibility->get_module_list();
            //     $this->data['user_module_access'] = $this->user_accessibility->get_user_module_access($this->data['admin_data']['userid']);
            // }
           $this->template['header'] = $this->load->view('layout/header.php', $this->data, true);
           $this->template['side'] = $this->load->view('layout/side.php', $this->data, true);
           $this->template['middle'] = $this->load->view($middleParam, $this->data, true);
           $this->template['footer'] = $this->load->view('layout/footer.php', $this->data, true);
           $this->load->view('layout/front.php', $this->template);
    }
    public function login()
    {
     
           $this->template['header'] = $this->load->view('login/Login_header.php');
           $this->template['body'] = $this->load->view('login/Admin_login.php');
           $this->template['sidebar'] = $this->load->view('login/Login_footer.php');

    }
}
?>