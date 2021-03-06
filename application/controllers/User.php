<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

        $this->load->model('surat_model');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        // $this->$this->form_validation->set_rules('noSk', 'NomorSuratKeluar', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('surat_keluar', ['no_surat' => $this->input->post('no_surat')]);
            $this->session->$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keluar Berhasil Ditambahkan!</div>');
            redirect('suratKeluar');
        }
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $username = $this->input->post('username');

            //  Cek Jika Ada Gambar Yang Akan di Upload   
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {

                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispaly_errors();
                }
            }

            // $this->db->set('username', $username);
            $this->db->set('name', $name);

            $this->db->where('username', $username);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Edit profile berhasil!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changePassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');

            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    //password sudah oke
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                    Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    public function suratMasuk()
    {
        $data['title'] = 'Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        // $this->load->model('suratKeluar_model', 'suratKeluar');

        $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_suratKeluar', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'Disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/suratMasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_suratMasuk' => $this->input->post('tgl_suratMasuk'),
                'pengirim' => $this->input->post('pengirim'),
                'penerima' => $this->input->post('penerima'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'disposisi' => $this->input->post('disposisi')
            ];
            $this->db->insert('surat_masuk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Surat Baru Berhasil Ditambah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> </div>');
            redirect('user/suratMasuk');
        }
    }

    public function tambahSuratMasuk()
    {
        $data['title'] = 'Form Tambah Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_suratMasuk', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'Disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambahSuratMasuk', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_suratMasuk' => $this->input->post('tgl_suratMasuk'),
                'pengirim' => $this->input->post('pengirim'),
                'penerima' => $this->input->post('penerima'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'disposisi' => $this->input->post('disposisi')
            ];
            $this->db->insert('surat_masuk', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Baru Berhasil Ditambah!</div>');
            redirect('user/suratMasuk');
        }
    }

    public function updateSM($id)
    {
        $data['title'] = 'Form Update Surat Masuk';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['surat_masuk'] = $this->surat_model->getsuratByID($id);

        // $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $this->form_validation->set_rules('tgl_suratMasuk', 'tgl_suratMasuk', 'required');
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'penerima', 'required');
        $this->form_validation->set_rules('perihal', 'perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'disposisi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/updateSM', $data);
            $this->load->view('templates/footer');
        } else {

            $this->surat_model->ubahdatasrt();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Masuk Berhasil Diubah!</div>');
            redirect('user/suratMasuk', 'refresh');
        }
    }


    // public function updateSuratMasuk()
    // {
    //     $data['title'] = 'Form Update Surat Masuk';
    //     $data['user'] = $this->db->get_where('user', ['username' =>
    //     $this->session->userdata('username')])->row_array();

    //     $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('user/updateSuratMasuk', $data);
    //     $this->load->view('templates/footer');

    // }

    public function suratKeluar()
    {
        $data['title'] = 'Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        // $this->load->model('suratKeluar_model', 'suratKeluar');

        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_suratKeluar', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'Disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/suratKeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_suratKeluar' => $this->input->post('tgl_suratKeluar'),
                'pengirim' => $this->input->post('pengirim'),
                'penerima' => $this->input->post('penerima'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'disposisi' => $this->input->post('disposisi')
            ];
            $this->db->insert('surat_keluar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Surat Baru Berhasil Ditambah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> </div>');
            redirect('user/suratKeluar');
        }
    }

    public function tambahSuratKeluar()
    {
        $data['title'] = 'Form Tambah Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['surat_keluar'] = $this->db->get('surat_keluar')->result_array();
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('tgl_suratKeluar', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('pengirim', 'Pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'Penerima', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'Disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambahSuratKeluar', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'no_surat' => $this->input->post('no_surat'),
                'tgl_suratKeluar' => $this->input->post('tgl_suratKeluar'),
                'pengirim' => $this->input->post('pengirim'),
                'penerima' => $this->input->post('penerima'),
                'no_surat' => $this->input->post('no_surat'),
                'perihal' => $this->input->post('perihal'),
                'disposisi' => $this->input->post('disposisi')
            ];
            $this->db->insert('surat_keluar', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Baru Berhasil Ditambah!</div>');
            redirect('user/suratKeluar');
        }
    }

    public function deleteSK($id)
    {
        // $this->surat_model->hapusSuratKeluar($id);
        // $this->session->$this->session->set_flashdata('flash_data', 'dihapus');
        // redirect('suratKeluar', 'refresh');
        // $id = $this->input->post('id_suratKeluar');
        // $this->surat_model->hapus_suratKeluar($id);

        // $hapus = $this->surat_model->hapus_suratKeluar($id);
        // if ($hapus) {
        // $this->session->set_flashdata('id_suratKeluar', 'Dihapus');
        $this->surat_model->hapus_suratKeluar($id);
        // $this->session->set_flashdata('flash-data', 'Dihapus');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keluar Berhasil Dihapus!</div>');

        // return redirect()->to(site_url('suratKeluar'));
        // echo "<script>window.location='" . site_url('user/suratKeluar') . "';</script>";
        // redirect('user/suratKeluar', 'refresh');
        redirect('user/suratKeluar');
        // }
        // echo "<script>window.location='" . site_url('user/') . "';</script>";
    }


    public function updateSuratKeluar($id)
    {
        $data['title'] = 'Form Update Surat Keluar';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $data['surat_keluar'] = $this->surat_model->getsuratKeluarByID($id);

        // $data['surat_masuk'] = $this->db->get('surat_masuk')->result_array();

        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $this->form_validation->set_rules('tgl_suratKeluar', 'tgl_suratKeluar', 'required');
        $this->form_validation->set_rules('pengirim', 'pengirim', 'required');
        $this->form_validation->set_rules('penerima', 'penerima', 'required');
        $this->form_validation->set_rules('perihal', 'perihal', 'required');
        $this->form_validation->set_rules('disposisi', 'disposisi', 'required');

        if ($this->form_validation->run() == FALSE) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/updateSuratKeluar', $data);
            $this->load->view('templates/footer');
        } else {

            $this->surat_model->updateDataSuratKeluar();
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Surat Keluar Berhasil Update!</div>');
            redirect('user/suratKeluar', 'refresh');
        }
    }

    // $this->db->set('username', $username);
    //     $this->db->set('no_surat', $noSK);
    //     $this->db->set('tgl_suratKeluar', $tglSK);
    //     $this->db->set('pengirim', $pengirim);
    //     $this->db->set('penerima', $penerima);
    //     $this->db->set('perihal', $perihal);
    //     $this->db->set('disposisi', $disposisi);
    //     $this->db->update('surat_keluar');

    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //         Update Surat Keluar berhasil!</div>');
    //     redirect('user/updateSuratKeluar');
    // }

    public function Disposisi()
    {
        $data['title'] = 'Disposisi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        // $this->load->model('suratKeluar_model', 'suratKeluar');

        // public function disposisi()
        // {
        //     $data['title'] = 'Disposisi';
        //     $data['user'] = $this->db->get_where('user', ['username' =>
        //     $this->session->userdata('username')])->row_array();
        $data['disposisi'] = $this->db->get('disposisi')->result_array();
        $this->form_validation->set_rules('surat_dari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('diterima_tgl', 'Diterima Tanggal', 'required');
        $this->form_validation->set_rules('no_agenda', 'Nomor Agenda', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('diteruskan_kepada', 'Diteruskan Kepada', 'required');
        $this->form_validation->set_rules('isi_disposisi', 'Isi Disposisi', 'required');

        //     $this->load->view('templates/header', $data);
        //     $this->load->view('templates/sidebar', $data);
        //     $this->load->view('templates/topbar', $data);
        //     $this->load->view('user/disposisi', $data);
        //     $this->load->view('templates/footer');
        // }
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/disposisi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'surat_dari' => $this->input->post('surat_dari'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'no_surat' => $this->input->post('no_surat'),
                'diterima_tgl' => $this->input->post('diterima_tgl'),
                'no_agenda' => $this->input->post('no_agenda'),
                'perihal' => $this->input->post('perihal'),
                'diteruskan_kepada' => $this->input->post('diteruskan_kepada'),
                'isi_disposisi' => $this->input->post('isi_disposisi')

            ];
            $this->db->insert('disposisi', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">Surat Disposisi Berhasil Ditambah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> </div>');
            redirect('user/disposisi');
        }
    }

    public function tambahDisposisi()
    {
        $data['title'] = 'Form Tambah Data Disposisi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['disposisi'] = $this->db->get('disposisi')->result_array();
        $this->form_validation->set_rules('surat_dari', 'Surat Dari', 'required');
        $this->form_validation->set_rules('tgl_surat', 'Tanggal Surat', 'required');
        $this->form_validation->set_rules('no_surat', 'No Surat', 'required');
        $this->form_validation->set_rules('diterima_tgl', 'Diterima Tanggal', 'required');
        $this->form_validation->set_rules('no_agenda', 'Nomor Agenda', 'required');
        $this->form_validation->set_rules('perihal', 'Perihal', 'required');
        $this->form_validation->set_rules('diteruskan_kepada', 'Diteruskan Kepada', 'required');
        $this->form_validation->set_rules('isi_disposisi', 'Isi Disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/tambahDisposisi', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'surat_dari' => $this->input->post('surat_dari'),
                'tgl_surat' => $this->input->post('tgl_surat'),
                'no_surat' => $this->input->post('no_surat'),
                'diterima_tgl' => $this->input->post('diterima_tgl'),
                'no_agenda' => $this->input->post('no_agenda'),
                'perihal' => $this->input->post('perihal'),
                'diteruskan_kepada' => $this->input->post('diteruskan_kepada'),
                'isi_disposisi' => $this->input->post('isi_disposisi')

            ];
            $this->db->insert('disposisi', $data);
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Surat disposisi berhasil ditambah!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>'
            );
            redirect('user/disposisi');
        }
    }

    // public function tambahDisposisi()
    // public function updateDisposisi()
    // {
    //     $data['title'] = 'Form Tambah Data Disposisi';
    //     $data['title'] = 'Form Update Disposisi';
    //     $data['user'] = $this->db->get_where('user', ['username' =>
    //     $this->session->userdata('username')])->row_array();

    //     $data['disposisi'] = $this->db->get('disposisi')->result_array();

    //     $this->form_validation->set_rules('name', 'Nama Lengkap', 'required|trim');
    //     $this->form_validation->set_rules('username', 'Username', 'required|trim');

    //     if ($this->form_validation->run() == false) {
    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('user/tambahDisposisi', $data);
    //     $this->load->view('user/updateDisposisi', $data);
    //     $this->load->view('templates/footer');
    // }

    public function updateDisposisi($id_disposisi)
    {
        $data['title'] = 'Form Update Data Disposisi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['disposisi'] = $this->surat_model->getDisposisiByID($id_disposisi);

        // $this->form_validation->set_rules('id_disposisi', 'Id Disposisi', 'required');
        $this->form_validation->set_rules('surat_dari', 'surat_dari', 'required');
        $this->form_validation->set_rules('tgl_surat', 'tgl_surat', 'required');
        $this->form_validation->set_rules('no_surat', 'no_surat', 'required');
        $this->form_validation->set_rules('diterima_tgl', 'diterima_tgl', 'required');
        $this->form_validation->set_rules('no_agenda', 'no_agenda', 'required');
        $this->form_validation->set_rules('perihal', 'perihal', 'required');
        $this->form_validation->set_rules('diteruskan_kepada', 'diteruskan_kepada', 'required');
        $this->form_validation->set_rules('isi_disposisi', 'isi_disposisi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/updateDisposisi', $data);
            $this->load->view('templates/footer');
        } else {

            $this->surat_model->ubahDataDisposisi();
            $this->session->set_flashdata(
                'message',
                '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Surat disposisi berhasil dihapus!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
            );

            redirect('user/disposisi', 'refresh');
        }
    }

    public function deleteDisposisi($id)
    {
        $this->surat_model->hapus_disposisi($id);

        $this->session->set_flashdata(
            'message',
            '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Surat disposisi berhasil dihapus!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>'
        );

        redirect('user/disposisi');
    }

    public function detail($id_disposisi)
    {
        $data['title'] = 'Detail Surat Disposisi';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['disposisi'] = $this->db->get('disposisi')->result_array();
        $data['detail'] = $this->surat_model->ambil_id_disposisi($id_disposisi);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/detailDisposisi', $data);
        $this->load->view('templates/footer');
    }
}
