<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

      function __construct()
      {
            parent::__construct();
            $this->load->model('AuthModel');
            $this->load->model('UserModel');
            $this->load->model('CourseModel');
            $this->load->model('PlaylistModel');
            $this->load->model('CategoryModel');
            $this->load->library('pagination');

            if (empty($this->session->userdata('is_login'))) {
                  $this->session->set_flashdata('end_session', 'User Belum Login');
                  redirect('auth/login_page');
            } elseif ($this->session->userdata('id_role') == 1) {
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
      // Admin and User Dashboard Index
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
                  'pages/admin/user/dashboard'
                  // 'admin/user/script'
            ];

            $data['course_count_user'] = $this->CourseModel->getCourseCount($this->session->userdata('id'));
            $data['course_finish'] = $this->CourseModel->getCourseCompletionCount($this->session->userdata('id'));
            $data['courses'] = $this->CourseModel->get_course_by_user_id($this->session->userdata('id'));

            foreach ($views as $view) {
                  $this->load->view($view, $data);
            }
      }
      public function detail_course($id)
      {

            $data = [
                  'id_role' => $this->session->userdata('id_role'),
                  // 'course' => $this->CourseModel->get_course_by_id($id),
                  // 'categories' => $this->PlaylistModel->get_data_playlist(),
                  // 'detail' => $this->PlaylistModel->get_playlists_by_id($id),
                  // 'videos' => $this->PlaylistModel->get_all_video()
            ];
            $data['course'] = $this->CourseModel->get_course_by_id_detail($id);
            $data['playlists'] = $this->CourseModel->get_playlists_by_course_id($id);

            foreach ($data['playlists'] as $playlist) {
                  $playlist->videos = $this->CourseModel->get_videos_by_playlist_id($playlist->id);
                  foreach ($playlist->videos as $video) {
                        $video->detail = $this->CourseModel->get_video_by_id($video->id);
                  }
            }

            $this->load->view('admin/user/style');
            $this->load->view('admin/user/menubar', $data);
            $this->load->view('admin/user/detailedCourse');
            $this->load->view('admin/user/script');
      }

      public function savedClass($id)
      {

            $data = [
                  'id_role' => $this->session->userdata('id_role'),
                  'id_user' => $this->session->userdata('id'),
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_course($id)
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = '+ Ikuti Kelas';
                  }
            }

            $this->load->view('admin/user/style');
            $this->load->view('admin/user/menubar', $data);
            $this->load->view('admin/user/savedClass');
            $this->load->view('admin/user/script');
      }

      public function saved_course()
      {

            $data = [
                  'id_role' => $this->session->userdata('id_role'),
                  'id_user' => $this->session->userdata('id'),
                  'categories' => $this->CategoryModel->get_data_category(),
                  'course' => $this->CourseModel->get_course($this->session->userdata('id'))
            ];
            // Loop melalui data kelas
            foreach ($data['course'] as &$class) {
                  $userHasCourse = $this->UserModel->getUserHasCourse($data['id_user'], $class->id);

                  if ($userHasCourse && $userHasCourse->status == 1) {
                        $class->button_label = 'Lanjutkan';
                  } else {
                        $class->button_label = '+ Ikuti Kelas';
                  }
            }


            $this->load->view('pages/admin/user/saved_class', $data);
      }

      public function profile()
      {
            $data = [
                  'id_user' => $this->session->userdata('id'),
                  'name' => $this->session->userdata('name'),
                  'email' => $this->session->userdata('email'),
                  'id_role' => $this->session->userdata('id_role'),
                  'member' => $this->UserModel->getMemberBySessionId($this->session->userdata('id'))
            ];
            $this->load->view('admin/user/style');
            $this->load->view('admin/user/menubar', $data);
            $this->load->view('admin/user/profile');
            $this->load->view('admin/user/script');
      }

      function edit_user($id)
      {
            $where = array('id' => $id);
            $data = [
                  'id_role' => $this->session->userdata('id_role'),
                  'user' => $this->UserModel->get_role_by_id($id)
            ];
            $this->load->view('admin/user/style');
            $this->load->view('admin/user/menubar', $data);
            $this->load->view('admin/user/setting/form', $data);
            $this->load->view('admin/user/script');
      }

      public function delete_user($id)
      {
            $where = array('id' => $id);
            $this->db->where($where);
            $this->db->delete('users');
            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_delete_user', 'Data berhasil diupdate');
            redirect('userBranch/user/setting');
      }

      public function update_user($id)
      {
            // Validasi form di sini
            // ...

            $data = array(
                  'name' => $this->input->post('name'),
                  'email' => $this->input->post('email'),
                  'id_role' => $this->input->post('id_role'),
                  'id' => $id
            );
            $this->UserModel->updateUser($data);

            // Menampilkan pesan sukses dan redirect ke halaman lain
            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
            redirect('userBranch/user/setting');
      }

      public function delete_course()
      {
            $id_user = $this->input->post('id_user');
            $id_course = $this->input->post('id_course');
            $this->db->where('id_user', $id_user);
            $this->db->where('id_course', $id_course);
            $this->db->delete('user_has_course_saved');
            // $insert_id = $this->UserModel->insert_data_saved_course($data);

            $this->session->set_flashdata('success_add', 'email atau Password salah');
            redirect('userBranch/user/listClass');
      }

      public function calculateProgress($userId, $courseId)
      {
            $videoCount = $this->CourseModel->getVideoCount($courseId);
            $completedClasses = $this->UserModel->getCompletedClasses($userId);

            $progress = ($completedClasses / $videoCount) * 100;

            echo "Progress belajar: " . $progress . "%";
      }


      public function save_profile()
      {
            //load library upload
            $this->load->library('upload');

            //konfigurasi upload
            $config['upload_path'] = './assets/images/profile/cropped/';
            $config['allowed_types'] = '*';
            $config['max_size'] = 10000;

            //inisialisasi upload
            $this->upload->initialize($config);

            //jika gagal upload
            if (!$this->upload->do_upload('image')) {
                  $data = array(
                        'name' => $this->input->post('name', TRUE),
                        'summary' => $this->input->post('summary', TRUE),
                        'job' => $this->input->post('job', TRUE),
                        'id_user' => $this->input->post('id_user', TRUE),
                        'instagram' => $this->input->post('instagram', TRUE),
                        'linkedin' => $this->input->post('linkedin', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'address' => $this->input->post('address', TRUE),
                        'district' => $this->input->post('district', TRUE),
                        'region' => $this->input->post('region', TRUE),
                        'province' => $this->input->post('province', TRUE),
                        'posCode' => $this->input->post('posCode', TRUE)
                  );


                  if ($this->UserModel->insert_data_profile($data)) {
                        $this->session->set_flashdata(
                              'success_add',
                              'Success Add Profile'
                        );
                        redirect('userBranch/user/profile');
                  }
            }
            //jika berhasil upload
            else {
                  $data = array(
                        'name' => $this->input->post('name', TRUE),
                        'summary' => $this->input->post('summary', TRUE),
                        'job' => $this->input->post('job', TRUE),
                        'id_user' => $this->input->post('id_user', TRUE),
                        'instagram' => $this->input->post('instagram', TRUE),
                        'linkedin' => $this->input->post('linkedin', TRUE),
                        'email' => $this->input->post('email', TRUE),
                        'address' => $this->input->post('address', TRUE),
                        'district' => $this->input->post('district', TRUE),
                        'region' => $this->input->post('region', TRUE),
                        'province' => $this->input->post('province', TRUE),
                        'posCode' => $this->input->post('posCode', TRUE),
                        'image' => $this->upload->data('file_name')
                  );
                  // Mengubah ukuran gambar menggunakan GD atau Imagick
                  $this->resize_image($this->upload->data('file_name'));

                  // Tampilkan pesan sukses


                  if ($this->UserModel->insert_data_profile($data)) {
                        $this->session->set_flashdata(
                              'success_add',
                              'Success Add Profile'
                        );
                        redirect('userBranch/user/profile');
                  }
            }
      }


      private function resize_image($image_path)
      {
            // Load library GD atau Imagick
            $this->load->library('image_lib');

            // Konfigurasi resize
            $config['image_library'] = 'gd2'; // atau 'imagick' jika menggunakan Imagick
            $config['source_image'] = $image_path;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 200;
            $config['height'] = 200;

            $this->image_lib->initialize($config);

            if (!$this->image_lib->resize()) {
                  // Jika resize gagal, tampilkan pesan error
                  echo $this->image_lib->display_errors();
            }

            // Hapus file gambar asli
            unlink($image_path);
      }

      public function update_profile($id_user)
      {
            $x = $this->input->post('x');
            $y = $this->input->post('y');
            $width = $this->input->post('w');
            $height = $this->input->post('h');
            $data = array(
                  'name' => $this->input->post('name', TRUE),
                  'summary' => $this->input->post('summary', TRUE),
                  'job' => $this->input->post('job', TRUE),
                  'email' => $this->input->post('email', TRUE),
                  'id_user' => $this->input->post('id_user', TRUE),
                  'instagram' => $this->input->post('instagram', TRUE),
                  'linkedin' => $this->input->post('linkedin', TRUE),
                  'crop_x' => $x,
                  'crop_y' => $y,
                  'crop_width' => $width,
                  'crop_height' => $height

            );

            $this->UserModel->updateProfile($id_user, $data);

            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

            redirect('userBranch/user/profile');
      }


      public function update_address($id_user)
      {

            $data = array(
                  'email' => $this->input->post('email', TRUE),
                  'address' => $this->input->post('address', TRUE),
                  'district' => $this->input->post('district', TRUE),
                  'region' => $this->input->post('region', TRUE),
                  'province' => $this->input->post('province', TRUE),
                  'posCode' => $this->input->post('posCode', TRUE),
                  'id_user' => $this->input->post('id_user', TRUE)
            );
            $this->UserModel->updateAddress($id_user, $data);

            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

            redirect('userBranch/user/profile');
      }
}
