<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
        {
            parent::__construct();
            is_logged_in();
        }


    public function index(){
        $data['title'] = 'Dashboard';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function role(){
        $data['title'] = 'Role';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array(); 

        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/role',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function roleAkses($role_id){
        $data['title'] = 'Role Akses';
        $data['login'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array(); 
        
        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/role_akses',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function changeAkses()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_akses_menu', $data);

        if($result->num_rows() < 1) {
            $this->db->insert('user_akses_menu', $data);
        } else {
            $this->db->delete('user_akses_menu', $data);
        }

        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Akses Berubah!</div>');

    }

}