<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Menu_model');
        $this->load->helper(['url', 'form']);
        $this->load->library(array('pagination','upload','form_validation'));
        $this->upload_path = FCPATH . 'uploads/menu/';
    }

    public function index()
    {
        $data['categories'] = $this->Menu_model->get_categories();
        $data['allitem'] = $this->Menu_model->get_all_items();
        $this->load->view('admin/menu/menu_list',$data);
    }

    public function add()
    {
        if (strtolower($_SERVER["REQUEST_METHOD"]) == 'post') {

            $this->load->library('form_validation');

            $this->form_validation->set_rules(   'category_id',  'Category','required|trim');
            $this->form_validation->set_rules( 'item_name','Food Name','required|trim');
            $this->form_validation->set_rules( 'price','Price','required|trim|numeric');

            if ($this->form_validation->run() == TRUE) {
                $image = '';

                if (!empty($_FILES['image']['name'])) {

                    $config['upload_path']   = $this->upload_path;
                    $config['allowed_types'] = "jpg|jpeg|png|gif|webp";
                    $config['max_size']      = '51200';

                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('image')) {

                        $msg = $this->upload->display_errors();

                        $this->session->set_flashdata(
                            'error_msg',$msg);

                        redirect(admin_url() . 'menu', 'refresh');

                    } else {

                        $image_data = $this->upload->data();

                        $image = $image_data['file_name'];
                    }
                }

                $post_data = array(

                    'category_id' => $this->input->post('category_id'),
                    'item_name' => $this->input->post('item_name'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'image' => $image,
                    'created_at' => date('Y-m-d H:i:s')
                );

                // print_r($post_data); die;

                $this->Menu_model->menu_add($post_data);

                $this->session->set_flashdata(
                    'success_msg', 'Menu has been successfully added.'
                );

                redirect(
                    admin_url() . 'menu','refresh');

            } else {

                $msg = validation_errors();

                $this->session->set_flashdata('error_msg',$msg );
                redirect( $_SERVER['HTTP_REFERER']);
            }

        } else {

            $data['categories'] = $this->Menu_model->get_categories();

            $this->load->view( 'admin/menu/menu_add',  $data );
        }  
    }
    

    public function update($menu_id){

        $data['menuInfo'] = $this->Menu_model->getMenuInfoById($menu_id);
        $data['categories'] = $this->Menu_model->get_categories();

        $this->load->view('admin/menu/edit_menu', $data);
    }

    public function editmenu(){

        $this->load->library('form_validation');
        $menu_id = $this->input->post('id');

        $this->form_validation->set_rules('category_id','Category', 'required|trim');
        $this->form_validation->set_rules( 'item_name','Food Name', 'required|trim');
        $this->form_validation->set_rules( 'price','Price','required|trim|numeric');

        if ($this->form_validation->run() == FALSE) {

            $msg = validation_errors();

            $this->session->set_flashdata(
                'error_msg',
                $msg
            );

            redirect($_SERVER['HTTP_REFERER']);

        } else {

            // Get existing menu information
            $menuInfo = $this->Menu_model->getMenuInfo($menu_id);

            // Keep old image if no new image is uploaded
            $image = $menuInfo->image;

            // Check new image
            if (!empty($_FILES['image']['name'])) {

                $config['upload_path']   = $this->upload_path;
                $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
                $config['max_size']      = '51200';

                $this->upload->initialize($config);

                if (!$this->upload->do_upload('image')) {

                    $msg = $this->upload->display_errors();

                    $this->session->set_flashdata(
                        'error_msg',
                        $msg
                    );

                    redirect($_SERVER['HTTP_REFERER']);

                } else {

                    $image_data = $this->upload->data();

                    $image = $image_data['file_name'];
                }
            }

            $post_data = array(
                'category_id' => $this->input->post('category_id'),
                'item_name'   => $this->input->post('item_name'),
                'description' => $this->input->post('description'),
                'price'       => $this->input->post('price'),
                'image'       => $image,
                'updated_at'  => date('Y-m-d H:i:s')
            );

            $result = $this->Menu_model->editmenuinfo($post_data, $menu_id );

            if ($result == TRUE) {
                $this->session->set_flashdata(
                    'success_msg',
                    'Menu has been successfully updated.'
                );

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    'Menu update failed.'
                );
            }

            redirect(
                admin_url() . 'menu',
                'refresh'
            );
        }
    }

    
    function delete($menu_id){
        $result = $this->Menu_model->delete($menu_id);
        if ($result == true) {  
            $this->session->set_flashdata('success_msg', 'Data has been deleted successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Something wrong');
        }
        redirect(admin_url() . 'menu', 'refresh');
    } 
}