<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{

    function __construct(){
       parent::__construct();  
        $this->load->model(array('home_model'));
        $this->load->helper('url'); 
    }

    function index(){
        $data['about'] = $this->home_model->GetAboutDetails();
         $data['banner'] = $this->home_model->GetBannerDetails();
         $data['categories'] = $this->home_model->get_categories();
         $data['menu_items'] = $this->home_model->get_all_items();

        $this->load->view('front/home',$data);
    }
} 