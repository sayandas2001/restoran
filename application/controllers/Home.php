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

        $this->load->view('front/home',$data);
    }
} 