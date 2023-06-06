<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('UserModel');
        $this->load->model('CourseModel');
        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        } elseif ($this->session->userdata('id_role') != 1) {
            $this->session->set_flashdata('end_session', 'Akses Diblokir');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    // Admin and User Dashboard Index
    public function page()
    {
        $role_admin = 1;
        $role_instructor = 2;
        $role_member = 3;


        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'user_count' => $this->UserModel->count_all(),
            'admin_count' => $this->UserModel->get_users_role($role_admin),
            'instructor_count' => $this->UserModel->get_users_role($role_instructor),
            'member_count' => $this->UserModel->get_users_role($role_member),
            'course_count' => $this->CourseModel->count_all(),
            'video_counts' => $this->CourseModel->getVideoCountsByCategory()
        ];

        $views = [
            'admin/user/index',
            'admin/user/script'
        ];

        $data['course_count_user'] = $this->CourseModel->getCourseCount($this->session->userdata('id'));
        $data['course_finish'] = $this->CourseModel->getCourseCompletionCount($this->session->userdata('id'));
        $data['courses'] = $this->CourseModel->get_course_by_user_id($this->session->userdata('id'));

        foreach ($views as $view) {
            $this->load->view($view, $data);
        }
    }
    public function page_dash()
    {
        $role_admin = 1;
        $role_instructor = 2;
        $role_member = 3;


        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'user_count' => $this->UserModel->count_all(),
            'admin_count' => $this->UserModel->get_users_role($role_admin),
            'instructor_count' => $this->UserModel->get_users_role($role_instructor),
            'member_count' => $this->UserModel->get_users_role($role_member),
            'course_count' => $this->CourseModel->count_all(),
            'video_counts' => $this->CourseModel->getVideoCountsByCategory()
        ];

        $views = [
            'pages/admin/superadmin/dashboard'
            // 'admin/user/script'
        ];

        $data['course_count_user'] = $this->CourseModel->getCourseCount($this->session->userdata('id'));
        $data['course_finish'] = $this->CourseModel->getCourseCompletionCount($this->session->userdata('id'));
        $data['courses'] = $this->CourseModel->get_course_by_user_id($this->session->userdata('id'));

        foreach ($views as $view) {
            $this->load->view($view, $data);
        }
    }
}
