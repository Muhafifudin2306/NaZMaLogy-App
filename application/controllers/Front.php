<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
      function __construct()
      {
            parent::__construct();
            $this->load->model('FrontModel');
            $this->load->model('CourseModel');
            $this->load->model('CategoryModel');
      }
      public function index()
      {

            $data = [
                  'title_page' => 'Berinovasi Wujudkan Mimpi - NaZMaLogy',
                  'testimonials' => $this->FrontModel->get_data_testimony()
            ];
            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('homepage');
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }
      public function page()
      {
            $data = [
                  'testimonials' => $this->FrontModel->get_data_testimony()
            ];
            $this->load->view('pages/member/home', $data);
      }

      public function page_support()
      {
            $this->load->view('pages/member/support');
      }

      public function page_list()
      {
            $data = [
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_non_auth()
            ];
            $this->load->view('pages/member/course_list', $data);
      }
      public function listClass()
      {
            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_non_auth()
            ];
            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }

      public function listClassAsc()
      {
            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_asc_non_auth()
            ];

            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }


      public function listClassAZ()
      {
            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_az_non_auth()
            ];

            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }

      public function listClassZA()
      {
            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_data_course_za_non_auth()
            ];

            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }

      public function course_filter_by_category()
      {

            $categories = $this->input->post('category');

            $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
            $this->db->from('courses c');
            $this->db->join('course_has_category chc', 'c.id = chc.id_course');
            $this->db->join('categories', 'chc.id_category = categories.id');
            $this->db->group_by('c.id');
            $this->db->order_by('created_at', 'desc');

            if (!empty($categories)) {
                  $this->db->where_in('chc.id_category', $categories);
            }


            $query = $this->db->get();

            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $query->result(),
                  'selected_categories' => $categories
            ];

            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }

      public function courseSearch()
      {
            // Ambil keyword pencarian dari form
            $keyword = $this->input->get('searchTitle');

            // Cari data course yang sesuai dengan keyword pencarian

            $this->db->select('c.*, GROUP_CONCAT(categories.name) as category');
            $this->db->from('courses c');
            $this->db->join('course_has_category chc', 'c.id = chc.id_course');
            $this->db->join('categories', 'chc.id_category = categories.id');
            $this->db->group_by('c.id');
            $this->db->order_by('created_at', 'desc');


            // Filter berdasarkan keyword pencarian
            if (!empty($keyword)) {
                  $this->db->like('c.title', $keyword);
            }

            $this->db->group_by('c.id');
            $query = $this->db->get()->result();
            // $course = $this->db->get('courses')->result();
            $data = [
                  'title_page' => 'NaZMaLogy | Daftar Kursus',
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $query
            ];


            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('listClass', $data);
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }
      public function support()
      {
            $data = [
                  'title_page' => 'NaZMaLogy | Bantuan',
            ];
            $this->load->view('layout/front/style', $data);
            $this->load->view('layout/front/navbar');
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('support');
            $this->load->view('layout/front/footer');
            $this->load->view('layout/front/script');
      }

      public function save_subscribe()
      {
            $email = $this->input->post('email');
            $emaildata = array('email' => $email);
            $checkData = $this->FrontModel->get_simmilar_data('subscribes', $emaildata);

            if ($email == NULL) {
                  redirect('front');
            } else {
                  if ($checkData->num_rows() == 1) {
                        $this->session->set_flashdata('success', 'Email Terkirim');
                        redirect('front');
                  } else {
                        $this->session->set_flashdata('success', 'Email Terkirim');
                        $this->FrontModel->insert_data_subscribe($emaildata);
                        redirect('front');
                  }
            }
      }
}
