<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller{
    function __construct(){
		parent :: __construct();		
	}

    public function index(){
        $session_array=array(
                    'email'=>'',
                     'is_admin_logged_in'=>FALSE
        );
        $this->session->unset_userdata('admin_session_data',$session_array);
        redirect(admin_url());
        exit;
    }
}
?>