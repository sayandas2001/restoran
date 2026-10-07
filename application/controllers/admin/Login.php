<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {    
        parent::__construct();    

        $this->load->model('admin_model');

        // Check admin session
        $session = $this->session->userdata('admin_session_data');

        // If user is already logged in → go to dashboard
        if (!empty($session)) {
            redirect(admin_url().'dashboard');
            exit;
        }
    }

    public function index()
    {
        $this->load->view('admin/login/login_view');
    }

    public function do_login()
    {
        if($_SERVER['REQUEST_METHOD'] =='POST') 
        {
            if ($this->validate_form_data() == TRUE) {

                $login_email = $this->input->post('email');
                $login_password = md5($this->input->post('password'));

                $return = $this->admin_model->check_valid_login($login_email,$login_password);

                if ($return) {

                    $result = $this->admin_model->getadmindetails($return);

                    $sessdata = array(
                        'admin_id' => $result->id,
                        'username' => $result->username,
                        'email' => $result->email,
                        'is_admin_logged_in' => TRUE,
                    );

                    $this->session->set_userdata('admin_session_data', $sessdata);

                    redirect(admin_url().'dashboard');
                }
                else {
                    $this->session->set_flashdata('error_msg', 'Invalid email or password!');
                    redirect(admin_url());
                }
            } 
            else {
                $this->session->set_flashdata('error_msg', validation_errors());
                redirect(admin_url());
            }
        }
    }

    function validate_form_data()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('password','Password','required');

        return $this->form_validation->run();
    }
}
?>
