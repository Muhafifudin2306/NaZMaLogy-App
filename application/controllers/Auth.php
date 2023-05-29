<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PasswordCompat\Bcrypt\PasswordCompat;

class Auth extends CI_Controller
{
      

      function __construct()
      {
            parent::__construct();
            $this->load->model('AuthModel');
      }
      private $auth;
      
      public function login_page()
      {
           $data = [
                  'title_page' => 'NaZMaLogy | Login Akun'
            ];
            $this->load->view('auth/style', $data);
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('auth/login');
            $this->load->view('auth/script');
      }
      public function register_page()
      {
          $data = [
                  'title_page' => 'NaZMaLogy | Daftar Akun'
            ];
            $this->load->view('auth/style', $data);
            $this->load->view('layout/front/mobile_bar');
            $this->load->view('auth/register');
            $this->load->view('auth/script');
      }
      public function register($email, $password, $name)
      {
            // Lakukan validasi atau logika registrasi di sini

            // Contoh: Memasukkan data pengguna ke dalam tabel 'users'
            $data = array(
                  'email' => $email,
                  'password' => $password,
                  'name' => $name
            );
            $this->db->insert('users', $data);

            // Cek apakah registrasi berhasil
            if ($this->db->affected_rows() > 0) {
                  return true;
            } else {
                  return false;
            }
      }

      public function register_proccess()
      {
            $this->form_validation->set_rules('email', 'email', 'trim|required|min_length[1]|max_length[255]|is_unique[users.email]');
            $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[1]|max_length[255]');
            $this->form_validation->set_rules('name', 'name', 'trim|required|min_length[1]|max_length[255]');
            $this->form_validation->set_rules('id_role', 'id_role', 'trim|required|min_length[1]|max_length[255]');
            if ($this->form_validation->run() == true) {
                  $email = $this->input->post('email');
                  $password = $this->input->post('password');
                  $name = $this->input->post('name');
                  $id_role = $this->input->post('id_role');
                  // $bcrypt = new PasswordCompat();
                  $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                  $data = array(
                        'email' => $email,
                        'password' => $hashedPassword,
                        'name' => $name,
                        'id_role' => $id_role
                  );
                  $this->db->insert('users', $data);
                  $this->session->set_flashdata('success_register', 'Proses Pendaftaran User Berhasil');
                  redirect('auth/login_page');
            } else {
                  $this->session->set_flashdata('error', validation_errors());
                  redirect('auth/register_page');
            }
      }


      public function proses()
      {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $query = $this->db->get_where('users', array('email' => $email));
            if ($query->num_rows() > 0) {
                  $data_user = $query->row();
                  if (password_verify($password, $data_user->password)) {
                        $this->session->set_userdata('email', $email);
                        $this->session->set_userdata('name', $data_user->name);
                        $this->session->set_userdata('id', $data_user->id);
                        $this->session->set_userdata('id_role', $data_user->id_role);
                        $this->session->set_userdata('is_login', TRUE);
                        $this->session->set_flashdata('success_login', 'Login Berhasil');
                        redirect('userBranch/user/page');
                  } else {
                        $this->session->set_flashdata('error_login', 'email atau Password salah');
                        redirect('auth/login_page');
                  }
            } else {
                  $this->session->set_flashdata('error_login', 'email atau Password salah');
                  redirect('auth/login_page');
            }
            // if ($this->auth->login_user($email, $password)) {
            //       redirect('home');
            // } else {
            //       $this->session->set_flashdata('error', 'email & Password salah');
            //       redirect('login');
            // }
      }

      public function logout()
      {
            // code full version

            // $this->session->unset_userdata('username');
            // $this->session->unset_userdata('nama');
            // $this->session->unset_userdata('is_login');

            // clean code
            
            $this->session->sess_destroy();
            redirect('auth/login_page');
      }
}
