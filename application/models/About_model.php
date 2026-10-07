<?php
class About_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetAboutDetails() {
        return $this->db->get('about')->row();
    }

    public function update_about($id, $data) {
        return $this->db->where('id', $id)->update('about', $data);
    }
}
?>
