<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Playlist extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->model('UserModel');
        $this->load->model('PlaylistModel');
        $this->load->model('CourseModel');

        if (empty($this->session->userdata('is_login'))) {
            $this->session->set_flashdata('end_session', 'User Belum Login');
            redirect('auth/login_page');
        }
    }
    public function video_admin()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
            'videos' => $this->PlaylistModel->get_all_video()
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/playlist/index');
        $this->load->view('admin/user/script');
    }

    public function add_playlist()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role')
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/playlist/add');
        $this->load->view('admin/user/script');
    }

    public function save_playlist()
    {
        $name = $this->input->post('name');
        $data = array(
            'name' => $name,
            // dan seterusnya
        );
        $insert_id = $this->PlaylistModel->insert_data_playlist($data);
        if ($insert_id) {
            $this->session->set_flashdata('success_add', 'email atau Password salah');
            redirect('userBranch/playlist/video_admin');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('userBranch/playlist/add_playlist');
        }
    }

    public function delete_playlist($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('playlists');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('userBranch/playlist/video_admin');
    }

    public function edit_playlist($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlist' => $this->PlaylistModel->get_playlist_by_id($id)
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/playlist/edit');
        $this->load->view('admin/user/script');
    }

    public function update_playlist($id)
    {
        // Validasi form di sini
        // ...
        $name = $this->input->post('name');
        $data = array(
            'name' => $name,
            'id' => $id
        );
        $this->PlaylistModel->updatePlaylist($data);
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        redirect('userBranch/playlist/video_admin');
    }

    // CRUD Video
    public function add_video()
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'playlists' => $this->PlaylistModel->get_data_playlist(),
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/video/add');
        $this->load->view('admin/user/script');
    }
    public function save_video()
    {
        $link = $this->input->post('link');
        $duration = $this->input->post('duration');
        $id_playlist = $this->input->post('id_playlist');
        $title = $this->input->post('title');
        $data = array(
            'link' => $link,
            'duration' => $duration,
            'id_playlist' => $id_playlist,
            'title' => $title
            // dan seterusnya
        );
        $insert_id = $this->PlaylistModel->insert_data_video($data);
        if ($insert_id) {
            $this->session->set_flashdata('success_add', 'email atau Password salah');
            redirect('userBranch/playlist/video_admin');
        } else {
            $this->session->set_flashdata('error', 'input salah');
            redirect('userBranch/playlist/add_playlist');
        }
    }

    public function delete_video($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('videos');
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_delete', 'Data berhasil dihapus');
        redirect('userBranch/playlist/video_admin');
    }

    public function edit_video($id)
    {
        $data = [
            'id_user' => $this->session->userdata('id'),
            'id_role' => $this->session->userdata('id_role'),
            'video' => $this->PlaylistModel->get_video_by_id($id),
            'playlists' => $this->PlaylistModel->get_data_playlist()
        ];
        $this->load->view('admin/user/style');
        $this->load->view('admin/user/menubar', $data);
        $this->load->view('admin/user/video/edit');
        $this->load->view('admin/user/script');
    }

    public function update_video($id)
    {
        // Validasi form di sini
        // ...
        $link = $this->input->post('link');
        $duration = $this->input->post('duration');
        $title = $this->input->post('title');
        $id_playlist = $this->input->post('id_playlist');
        $data = array(
            'link' => $link,
            'duration' => $duration,
            'title' => $title,
            'id_playlist' => $id_playlist,
            'id' => $id
        );
        $this->PlaylistModel->updateVideo($data);
        // Menampilkan pesan sukses dan redirect ke halaman lain
        $this->session->set_flashdata('success_update', 'Data berhasil diupdate');
        redirect('userBranch/playlist/video_admin');
    }
}
