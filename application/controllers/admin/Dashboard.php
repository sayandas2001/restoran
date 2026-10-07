<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    private $upload_path = '';
    private $image_medium_width = 398;
    private $image_medium_height = 210;

    function __construct() {
        parent::__construct();

        // Load helper BEFORE using its functions
        $this->load->helper('common_function'); 
        // init_admin_element();
        is_admin_logged_in();

        $this->load->helper(array('url','form'));
        $this->load->library("pagination");
        $this->load->model('admin_model');
        $this->load->library(array('upload','image_lib'));
    }

    public function index() {
        $this->load->view('admin/dashboard/index_view');
    }
}
?>
