<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
    public function __construct()
        {
            parent::__construct();
            is_logged_in();
            $this->load->model('Menu_model');
        }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu','Menu','required');

        if($this->form_validation->run() == false)
        {
        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('menu/index',$data);
        $this->load->view('templates/dashboard_footer');
        }else{
            $this->db->insert('user_menu',['menu'=>$this->input->post('menu')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    New Menu Added!</div>');
                    redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model','menu');


        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title','Title','required');
        $this->form_validation->set_rules('menu_id','Menu','required');
        $this->form_validation->set_rules('url','URL','required');
        $this->form_validation->set_rules('icon','icon','required');

        if($this->form_validation->run() == false)
        {
        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('menu/submenu',$data);
        $this->load->view('templates/dashboard_footer');
        }else{
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'), 
                'url' => $this->input->post('url'), 
                'icon' => $this->input->post('icon'), 
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu',$data);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                    New Submenu Added!</div>');
                    redirect('menu/submenu');
        }
    }

    public function delete($id){
        $this->Menu_model->delete($id);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('menu');
    }

    public function DeleteSubMenu($id){
        $this->Menu_model->DeleteSubMenu($id);
        $this->session->set_flashdata('flash','Dihapus');
        redirect('menu/submenu');
    }
}