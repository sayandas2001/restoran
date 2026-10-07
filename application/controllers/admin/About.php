<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin_logged_in();
        $this->load->model('about_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('pagination',  'upload','form_validation'));

        $this->upload_path = FCPATH . 'uploads/about/';

        // Create upload directory if it does not exist
        if (!is_dir($this->upload_path)) {
            mkdir($this->upload_path, 0777, true);
        }
    }

    public function index()
    {
        $data['about'] = $this->about_model->GetAboutDetails();
        $this->load->view('admin/about/fixed_about', $data
        );
    }

    public function do_edit_aboutcontent()
    {
        if ($this->input->method() !== 'post') {
            redirect(admin_url() . 'about');
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

            redirect(admin_url() . 'about');
            return;
        }

        // Get existing About data
        $aboutInfo = $this->about_model->GetAboutDetails();

        if (empty($aboutInfo)) {

            $this->session->set_flashdata(
                'error_msg',
                'About information not found.'
            );

            redirect(admin_url() . 'about');
            return;
        }

        // Keep old images by default
        $about_img1 = $aboutInfo->about_img1;
        $about_img2 = $aboutInfo->about_img2;
        $about_img3 = $aboutInfo->about_img3;
        $about_img4 = $aboutInfo->about_img4;


        /*
        |--------------------------------------------------------------------------
        | ABOUT IMAGE 1
        |--------------------------------------------------------------------------
        */

        if (!empty($_FILES['about_img1']['name'])) {

            $config = array(
                'upload_path'   => $this->upload_path,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 51200,
                'encrypt_name'  => TRUE
            );

            $this->upload->initialize($config);

            if ($this->upload->do_upload('about_img1')) {

                $image_data = $this->upload->data();

                $about_img1 = $image_data['file_name'];

                // Delete old image
                if (
                    !empty($aboutInfo->about_img1) &&
                    file_exists(
                        $this->upload_path . $aboutInfo->about_img1
                    )
                ) {

                    @unlink(
                        $this->upload_path . $aboutInfo->about_img1
                    );
                }

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    $this->upload->display_errors()
                );

                redirect(admin_url() . 'about');
                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | ABOUT IMAGE 2
        |--------------------------------------------------------------------------
        */

        if (!empty($_FILES['about_img2']['name'])) {

            $config = array(
                'upload_path'   => $this->upload_path,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 51200,
                'encrypt_name'  => TRUE
            );

            $this->upload->initialize($config);

            if ($this->upload->do_upload('about_img2')) {

                $image_data = $this->upload->data();

                $about_img2 = $image_data['file_name'];

                // Delete old image
                if (
                    !empty($aboutInfo->about_img2) &&
                    file_exists(
                        $this->upload_path . $aboutInfo->about_img2
                    )
                ) {

                    @unlink(
                        $this->upload_path . $aboutInfo->about_img2
                    );
                }

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    $this->upload->display_errors()
                );

                redirect(admin_url() . 'about');
                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | ABOUT IMAGE 3
        |--------------------------------------------------------------------------
        */

        if (!empty($_FILES['about_img3']['name'])) {

            $config = array(
                'upload_path'   => $this->upload_path,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 51200,
                'encrypt_name'  => TRUE
            );

            $this->upload->initialize($config);

            if ($this->upload->do_upload('about_img3')) {

                $image_data = $this->upload->data();

                $about_img3 = $image_data['file_name'];

                // Delete old image
                if (
                    !empty($aboutInfo->about_img3) &&
                    file_exists(
                        $this->upload_path . $aboutInfo->about_img3
                    )
                ) {

                    @unlink(
                        $this->upload_path . $aboutInfo->about_img3
                    );
                }

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    $this->upload->display_errors()
                );

                redirect(admin_url() . 'about');
                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | ABOUT IMAGE 4
        |--------------------------------------------------------------------------
        */

        if (!empty($_FILES['about_img4']['name'])) {

            $config = array(
                'upload_path'   => $this->upload_path,
                'allowed_types' => 'jpg|jpeg|png|gif',
                'max_size'      => 51200,
                'encrypt_name'  => TRUE
            );

            $this->upload->initialize($config);

            if ($this->upload->do_upload('about_img4')) {

                $image_data = $this->upload->data();

                $about_img4 = $image_data['file_name'];

                // Delete old image
                if (
                    !empty($aboutInfo->about_img4) &&
                    file_exists(
                        $this->upload_path . $aboutInfo->about_img4
                    )
                ) {

                    @unlink(
                        $this->upload_path . $aboutInfo->about_img4
                    );
                }

            } else {

                $this->session->set_flashdata(
                    'error_msg',
                    $this->upload->display_errors()
                );

                redirect(admin_url() . 'about');
                return;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | UPDATE DATA
        |--------------------------------------------------------------------------
        */

        $post_data = array(

            'title' => $this->input->post('title'),
            'description' => $this->input->post('description'),
            'experince' => $this->input->post('experince'),
            'chefs' => $this->input->post('chefs'),
            'about_img1'  => $about_img1,
            'about_img2'  => $about_img2,
            'about_img3'  => $about_img3,
            'about_img4'  => $about_img4,
            'updated_at'  => date('Y-m-d H:i:s')
        );

        $result = $this->about_model->update_about( $id, $post_data );

        if ($result) {

            $this->session->set_flashdata(
                'success_msg',
                'About section updated successfully.'
            );

        } else {

            $this->session->set_flashdata(
                'error_msg',
                'Update failed.'
            );
        }

        redirect(
            admin_url() . 'about',
            'refresh'
        );
    }
}