<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller 
{
    public function index(){
        $jenis = $this->uri->segment(3);
        $title = '';
        if($jenis == 'tembakau'){
            $title = 'Tembakau & Cengkeh';
        }else if($jenis == 'alatlinting'){
            $title = 'Alat Linting';
        }else if($jenis == 'paper'){
            $title = 'Paper';
        }else if($jenis == 'filter'){
            $title = 'Filter';
        }else if($jenis == 'alatlainnya'){
            $title = 'Alat Lainnya';
        }
        $data = [
            'title' => $jenis ,
            'login' => $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array(),
            'produk' => $this->db->get_where('produk',['jenis' => $jenis])->result_array()
        ];
        // var_dump($data['produk']);die;
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('produk/produk',$data);
        $this->load->view('templates/dashboard_footer');

    }
  
} 
