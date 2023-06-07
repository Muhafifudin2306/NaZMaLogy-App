<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Course extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('CategoryModel');
        $this->load->model('CourseModel');
        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') != 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    public function class_admin()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'categories' => $this->CategoryModel->get_data_category(),
            'course' => $this->CourseModel->get_data_course_admin()
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/class_admin');
        $this->load->view('admin/user/script');
    }

     // Testimony
     public function add_testimony()
     {
           $data = [
                 'id_user' => $this->session->userdata('id'),
                 'id_role' => $this->session->userdata('id_role')
           ];
           $this->load->view('admin/user/style');
           $this->load->view('admin/user/menubar', $data);
           $this->load->view('admin/user/testimony/add');
           $this->load->view('admin/user/script');
     }
}
