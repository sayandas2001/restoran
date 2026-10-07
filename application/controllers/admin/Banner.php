<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('banner_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('pagination',  'upload','form_validation'));
        $this->upload_path = FCPATH . 'uploads/banner/';

        // Create upload directory if it does not exist
        if (!is_dir($this->upload_path)) {
            mkdir($this->upload_path, 0777, true);
        }
    }

    public function index()
    {
        $data['banner'] = $this->banner_model->GetBannerDetails();
        $this->load->view('admin/banner/fixed_banner', $data
        );
    }

    public function do_edit_bannercontent()
    {
        if ($this->input->method() !== 'post') {
            redirect(admin_url() . 'banner');
            return;
        }

        $id = $this->input->post('id');

        // Validation
        $this->form_validation->set_rules(  'title',  'Title', 'trim|required' );

        $this->form_validation->set_rules(  'description',  'Description', 'trim|required' );

        if ($this->form_validation->run() == FALSE) {

            $this->session->set_flashdata(
                'error_msg',
                validation_errors()
            );

            redirect(admin_url() . 'banner');
            return;
        }

        $bannerInfo = $this->banner_model->GetBannerDetails();

        if (empty($bannerInfo)) {

            $this->session->set_flashdata(
                'error_msg',
                'Banner information not found.'
            );

            redirect(admin_url() . 'banner');
            return;
        }

        // Keep old images by default
        $banner_image = $bannerInfo->banner_image;
    

        if (!empty($_FILES['banner_image']['name'])) {

            $config = array(
                'upload_path'   => $this->upload_path,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 51200,
                'encrypt_name'  => TRUE
            );

            $this->upload->initialize($config);

            if ($this->upload->do_upload('banner_image')) {

                $image_data = $this->upload->data();

                $banner_image = $image_data['file_name'];

                // Delete old image
                if (
                    !empty($bannerInfo->banner_image) &&
                    file_exists(
                        $this->upload_path . $bannerInfo->banner_image
                    )
                ) {

                    @unlink(
                        $this->upload_path . $bannerInfo->banner_image
                    );
                }

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    $this->upload->display_errors()
                );

                redirect(admin_url() . 'banner');
                return;
            }
        }

        $post_data = array(

            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'banner_image'  => $banner_image,
            'updated_at'  => date('Y-m-d H:i:s')
        );

        $result = $this->banner_model->update_banner( $id, $post_data );

        if ($result) {

            $this->session->set_flashdata(
                'success_msg',
                'Banner section updated successfully.'
            );

        } else {

            $this->session->set_flashdata(
                'error_msg',
                'Update failed.'
            );
        }

        redirect(
            admin_url() . 'banner',
            'refresh'
        );
    }
}