<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_categories()
    {
        return $this->db
            ->order_by('id', 'ASC')
            ->get('menu_categories')
            ->result();
    }

    public function menu_add($data)
    {
        return $this->db->insert('menu_items', $data);
    }

    public function get_all_items()
    {
        $this->db->select('menu_items.*, menu_categories.category_name, menu_categories.subtitle');
        $this->db->from('menu_items');
        $this->db->join(
            'menu_categories',
            'menu_categories.id = menu_items.category_id',
            'left'
        );
        $this->db->order_by('menu_items.id', 'DESC');

        return $this->db->get()->result();
    }
}