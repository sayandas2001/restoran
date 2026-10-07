<?php
class Banner_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetBannerDetails() {
        return $this->db->get('banner')->row();
    }

    public function update_banner($id, $data) {
        return $this->db->where('id', $id)->update('banner', $data);
    }
}
?>
