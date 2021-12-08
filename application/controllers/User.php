<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
    public function __construct()
        {
            parent::__construct();
            is_logged_in();
            
        }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        
        
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('user/index',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function edit() {
        $data['title'] = 'Edit Profile';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if($this->form_validation->run() == false){
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('user/edit',$data);
        $this->load->view('templates/dashboard_footer');
        }else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            //cek gamber
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path']   = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['login']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                }else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $name);
            $this->db->where('email', $email);
            $this->db->update('login');

            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Profil Terupdate!</div>');
            redirect('user');
        }
    }

    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        
        $this->form_validation->set_rules('password_lama', 'Password Lama', 'required|trim');
        $this->form_validation->set_rules('password_baru1', 'Password Baru', 'required|trim|min_length[6]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Konfirmasi Password', 'required|trim|min_length[6]|matches[password_baru1]');

        if($this->form_validation->run() == false){
            $this->load->view('templates/dashboard_header',$data);
            $this->load->view('templates/dashboard_sidebar',$data);
            $this->load->view('templates/dashboard_topbar',$data);
            $this->load->view('user/changepassword',$data);
            $this->load->view('templates/dashboard_footer');
        } else {
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru1');
            if(!password_verify($password_lama, $data['login']['password'])){
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Salah</div>');
                redirect('user/changepassword');
            } else {
                if($password_lama == $password_baru){
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">Password Tidak Boleh Sama</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email',$this->session->userdata('email'));
                    $this->db->update('login');

                    $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Password Berhasil Diubah</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


}