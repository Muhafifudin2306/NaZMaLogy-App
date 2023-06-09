<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('CategoryModel');
        $this->load->model('CourseModel');
        $this->load->model('PlaylistModel');
        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        }
    }
}
