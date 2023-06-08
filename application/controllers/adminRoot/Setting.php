<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends CI_Controller
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

    public function index()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'users' => $this->UserModel->get_all_user(),
            'subscribes' => $this->UserModel->get_all_subscribe(),
            'testimonies' => $this->UserModel->get_all_testimony()
        ];
        $this->load->view('pages/admin/superadmin/setting/index', $data);
    }

    // Testimony
    public function add_testimony()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role')
        ];
        $this->load->view('pages/admin/superadmin/testimony/add', $data);
    }

    public function delete_testimony($id)
    {
        $where = array('id' => $id);

        // Mengambil nama file gambar berdasarkan id
        $this->db->select('image');
        $this->db->where($where);
        $query = $this->db->get('testimonies');
        $row = $query->row();
        $imageFileName = $row->image;

        // Menghapus data dari tabel
        $this->db->where($where);
        $this->db->delete('testimonies');

        // Menghapus file gambar
        $imagePath = './assets/images/admin/testimony/' . $imageFileName;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('adminRoot/setting');
    }


    public function save_testimony()
    {
        //load library upload
        $this->load->library('upload');

        //konfigurasi upload
        $config['upload_path'] = './assets/images/admin/testimony/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 10000;

        //inisialisasi upload
        $this->upload->initialize($config);

        //load library form validation
        $this->load->library('form_validation');

        //set rules validation
        $this->form_validation->set_rules('author', 'Author', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('message', 'Message', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('job', 'Job', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');

        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data = [
                'id_user' => $this->session->userdata('id'),
                'id_role' => $this->session->userdata('id_role')
            ];
            $this->load->view('pages/admin/superadmin/testimony/add', $data);
        }
        //jika validasi berhasil
        else {
            //jika gagal upload
            if (!$this->upload->do_upload('image')) {
                $data['error'] = $this->upload->display_errors();
                $data = [
                    'id_user' => $this->session->userdata('id'),
                    'id_role' => $this->session->userdata('id_role')
                ];
                $this->load->view('pages/admin/superadmin/testimony/add', $data);
            }
            //jika berhasil upload
            else {
                $data = array(
                    'author' => $this->input->post('author', TRUE),
                    'message' => $this->input->post('message', TRUE),
                    'status' => $this->input->post('status', TRUE),
                    'job' => $this->input->post('job', TRUE),
                    'rating' => $this->input->post('rating', TRUE),
                    'image' => $this->upload->data('file_name')
                );

                if ($this->UserModel->insert_data_testimony($data)) {
                    $this->session->set_flashdata('success_add', 'Success Add Testimony');
                    redirect('adminRoot/setting');
                }
            }
        }
    }

    function edit_testimony($id)
    {
        $where = array('id' => $id);
        $data = [
            'id_role' => $this->session->userdata('id_role'),
            'id_user' => $this->session->userdata('id'),
            'testimony' => $this->UserModel->get_testimony_by_id($id)
        ];
        $this->load->view('pages/admin/superadmin/testimony/edit', $data);
    }

    public function update_testimony($id)
    {
        // Validasi input
        $this->form_validation->set_rules('author', 'Nama Pengguna', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('status', 'Status', 'trim|required');
        $this->form_validation->set_rules('message', 'Pesan Testimoni', 'trim|required|min_length[5]');
        $this->form_validation->set_rules('job', 'Pekerjaan', 'trim|required');
        $this->form_validation->set_rules('rating', 'Rating', 'trim|required');

        // Cek validasi
        //jika validasi gagal
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
            $data = [
                'id_role' => $this->session->userdata('id_role'),
                'id_user' => $this->session->userdata('id'),
                'testimony' => $this->UserModel->get_testimony_by_id($id)
            ];
            $this->load->view('pages/admin/superadmin/testimony/edit', $data);
        } else {
            // Validasi berhasil, lakukan pembaruan data

            $data = array(
                'author' => $this->input->post('author', TRUE),
                'status' => $this->input->post('status', TRUE),
                'message' => $this->input->post('message', TRUE),
                'job' => $this->input->post('job', TRUE),
                'rating' => $this->input->post('rating', TRUE),
                'id' => $id
            );

            $this->UserModel->updateTestimony($id, $data);

            $this->session->set_flashdata('success_update', 'Data berhasil diupdate');

            redirect('adminRoot/setting');
        }
    }
}
