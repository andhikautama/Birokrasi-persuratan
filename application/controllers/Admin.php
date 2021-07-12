<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Beranda';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbarBeranda', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }

    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }

    // public function changeAccess()
    // {
    //     $menu_id = $this->input->post('menuId');
    //     $role_id = $this->input->post('roleId');

    //     $data = [
    //         'role_id' => $role_id,
    //         'menu_id' => $menu_id
    //     ];

    //     $result = $this->db->get_where('user_access_menu', $data);

    //     if($result->num_rows() < 1 ){
    //         $this->db->insert('user_access_menu', $data);
    //     }else{
    //         $this->db->delete('user_access_menu', $data);    
    //     }

    //     $this->session->set_flashdata('message', '<div class="alert 
    //     alert-success" role="alert">Akses berhasil diubah!</div>');
    // }

    // public function changePassword()
    // {
    //     $data['title'] = 'Change Password';
    //     $data['user'] = $this->db->get_where('user', ['username' =>
    //     $this->session->userdata('username')])->row_array();

    //     $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
    //     $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
    //     $this->form_validation->set_rules('new_password2', 'Repeat Password', 'required|trim|min_length[3]|matches[new_password1]');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('user/changePassword', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $current_password = $this->input->post('current_password');
    //         $new_password = $this->input->post('new_password1');

    //         if(!password_verify($current_password, $data['user']['password'])) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //             Wrong current password!</div>');
    //             redirect('user/changepassword');
    //         } else {
    //             if ($current_password == $new_password) {
    //                 $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
    //                 New password cannot be the same as current password!</div>');
    //                 redirect('user/changepassword');
    //             } else {
    //                 //password sudah oke
    //                 $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

    //                 $this->db->set('password', $password_hash);
    //                 $this->db->where('username', $this->session->userdata('username'));
    //                 $this->db->update('user');

    //                 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //                 Password changed!</div>');
    //                 redirect('user/changepassword');
    //             }
    //         }
    //     }
    // }

}