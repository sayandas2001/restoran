<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('home_model'); 
        // is_admin_logged_in();
        // $this->load->helper(['url','form']);
    }
    public function index(){
        // $data['aboutInfo'] = $this->home_model->GetAboutDetails();
        // $data['allteam'] = $this->home_model->team_listing(); 
        // $data['allvendor'] = $this->home_model->vendor_listing(); 

        $this->load->view('front/booking');
    }

}    