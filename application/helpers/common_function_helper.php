<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| BASE URL HELPERS
|--------------------------------------------------------------------------
*/

if (!function_exists('assets_url')) {
    function assets_url($uri = "")
    {
        $ci = & get_instance();
        $base = rtrim($ci->config->item('assets_url'), '/') . '/';
        return $base . ltrim($uri, '/');
    }
}

if (!function_exists('admin_url')) {
    function admin_url($uri = "")
    {
        $ci = & get_instance();
        $base = rtrim($ci->config->item('admin_url'), '/') . '/';
        return ($uri != "") ? $base . ltrim($uri, '/') : $base;
    }
}

if (!function_exists('user_url')) {
    function user_url($uri = "")
    {
        $ci = & get_instance();
        $base = rtrim($ci->config->item('user_url'), '/') . '/';
        return ($uri != "") ? $base . ltrim($uri, '/') : $base;
    }
}


/*
|--------------------------------------------------------------------------
| LOGIN CHECK (ADMIN)
|--------------------------------------------------------------------------
*/

if (!function_exists('is_admin_logged_in')) {
    function is_admin_logged_in()
    {
        $ci = & get_instance();
        $admin = $ci->session->userdata('admin_session_data');

        if (!isset($admin['is_admin_logged_in']) || $admin['is_admin_logged_in'] != TRUE) {
            redirect(admin_url());
            exit;
        }
    }
}


/*
|--------------------------------------------------------------------------
| LOGIN CHECK (USER)
|--------------------------------------------------------------------------
*/

if (!function_exists('is_user_logged_in')) {
    function is_user_logged_in()
    {
        $ci = & get_instance();
        $user = $ci->session->userdata('user_session_data');

        if (!isset($user['is_user_logged_in']) || $user['is_user_logged_in'] != TRUE) {
            redirect(user_url());
            exit;
        }
    }
}


/*
|--------------------------------------------------------------------------
| INIT ADMIN HEAD
|--------------------------------------------------------------------------
*/

if (!function_exists('init_admin_head')) {
    function init_admin_head()
    {
        $ci = & get_instance();
        
        $data['controller'] = $ci->router->fetch_class();
        $data['method']     = $ci->router->fetch_method();
        
        $data['page_title']       = "Admin Panel";
        $data['page_keyword']     = "Admin Panel";
        $data['page_description'] = "Admin Panel";

        $data['a_session_data'] = $ci->session->userdata('admin_session_data');

        $ci->load->view('admin/include/head', $data);
    }
}


/*
|--------------------------------------------------------------------------
| INIT USER HEAD
|--------------------------------------------------------------------------
*/

if (!function_exists('init_user_head')) {
    function init_user_head()
    {
        $ci = & get_instance();
        
        $data['controller'] = $ci->router->fetch_class();
        $data['method']     = $ci->router->fetch_method();
        
        $data['page_title']       = "User Panel";
        $data['page_keyword']     = "User Panel";
        $data['page_description'] = "User Panel";

        $data['b_session_data'] = $ci->session->userdata('user_session_data');

        $ci->load->view('user/include/head', $data);
    }
}


/*
|--------------------------------------------------------------------------
| OLD FORM DATA
|--------------------------------------------------------------------------
*/

if (!function_exists('old')) {
    function old($field, $default = '')
    {
        $ci = & get_instance();
        $flash = $ci->session->flashdata('form_data');

        return isset($flash[$field]) ? html_escape($flash[$field]) : $default;
    }
}


/*
|--------------------------------------------------------------------------
| PROFILE IMAGE HELPER
|--------------------------------------------------------------------------
*/

function profileimage($photoname)
{
    if ($photoname != NULL && file_exists(FCPATH . 'uploads/profile/original/' . $photoname)) {
        return base_url('uploads/profile/original/' . $photoname);
    }

    return base_url('uploads/profile/default.png');
}

?>
