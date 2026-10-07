
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model
{
    public function GetAboutDetails()
    {
        return $this->db->get('about')->row();
    }

     public function GetBannerDetails()
    {
        return $this->db->get('banner')->row();
    }
}

