<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{


      function __construct()
      {
            parent::__construct();
            $this->load->model('AuthModel');
      }

      public function login_page()
      {
            $this->load->view('pages/auth/login');
      }

      public function register_page()
      {

            $this->load->view('pages/auth/register');
      }

      // Register 
      public function register_proccess()
      {
            $rules = [
                  [
                        'field' => 'email',
                        'label' => 'email',
                        'rules' => 'trim|required|min_length[1]|max_length[255]|is_unique[users.email]'
                  ],
                  [
                        'field' => 'password',
                        'label' => 'password',
                        'rules' => 'trim|required|min_length[8]|max_length[255]'
                  ],
                  [
                        'field' => 'name',
                        'label' => 'name',
                        'rules' => 'trim|required|min_length[3]|max_length[255]'
                  ],
                  [
                        'field' => 'id_role',
                        'label' => 'id_role',
                        'rules' => 'trim|required|min_length[1]|max_length[255]'
                  ]
            ];

            $this->form_validation->set_rules($rules);

            if ($this->form_validation->run() == true) {
                  $data = [
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                        'name' => $this->input->post('name'),
                        'id_role' => $this->input->post('id_role')
                  ];

                  $this->db->insert('users', $data);
                  $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
                  redirect('auth/login_page');
            } else {
                  $this->session->set_flashdata('error', 'Email Sudah Terdaftar!');
                  redirect('auth/register_page');
            }
      }
      // Register 

      // Login
      public function login_proccess()
      {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $query = $this->db->get_where('users', array('email' => $email));

            if ($query->num_rows() > 0) {
                  $data_user = $query->row();
                  if (password_verify($password, $data_user->password)) {
                        $session_data = array(
                              'email' => $email,
                              'name' => $data_user->name,
                              'id' => $data_user->id,
                              'id_role' => $data_user->id_role,
                              'is_login' => TRUE
                        );
                        $this->session->set_userdata($session_data);
                        $this->session->set_flashdata('success_login', 'Login Berhasil');
                        redirect('userBranch/user/page');
                  }
            }

            $this->session->set_flashdata('error_login', 'Email atau Password Salah');
            redirect('auth/login_page');
      }
      // Login

      public function logout()
      {
            $this->session->sess_destroy();
            redirect('auth/login_page');
      }
}
