<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{

    public function __construct()
        {
            parent::__construct();
            is_logged_in();
            $this->load->model('Role_model');
        }


    public function index(){
        $data['title'] = 'Dashboard';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        // menghitung pendapatan total
        $queryPendapatan = "SELECT SUM(keranjang.total) as total FROM keranjang WHERE status=0";
        $data['pendapatan'] = $this->db->query($queryPendapatan)->row_array();
        // menghitung produk yang ada
        $data['total_produk'] = $this->db->count_all('produk');
        // menghitung keranjang dengan status 2, artinya masih di proses penjual
        $queryPendingproses = "SELECT count(keranjang.status) pending FROM keranjang WHERE status=2";
        $data['pesanan_pending'] = $this->db->query($queryPendingproses)->row_array();

        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('templates/dashboard_footer');
    }
    public function grafik(){
        // mencari id tiap-tiap produk yang ada
        $queryIdproduk = "SELECT produk.id FROM produk";
        $p = $this->db->query($queryIdproduk)->result_array();
        // menjumlahkan jumlah tiap produk dengan id produk yang ada
        foreach($p as $row) :
            $query = "SELECT SUM(k.jumlah) as jumlah,produk.id as id_produk , produk.nama
                      FROM keranjang k
                      JOIN produk ON produk.id = k.id_produk
                      WHERE k.status = 0 AND k.id_produk=$row[id]";
            $data[] = $this->db->query($query)->result_array();
        endforeach;
      echo json_encode($data);
    }

    public function role(){
        $data['title'] = 'Role';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array(); 

        $this->form_validation->set_rules('role','Role','required');

        if($this->form_validation->run() == false){
        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/role',$data);
        $this->load->view('templates/dashboard_footer');
        }else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            New Role Added!</div>');
            redirect('admin/role');
        }
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

    public function deleterole($id){
        $this->Role_model->deleterole($id);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Role Telah Dihapus</div>');
        redirect('admin/role');
    }

    public function UpdateRole(){
        $data['title'] = 'Update Role';
        
        $this->form_validation->set_rules('role','Role','required');

        if($this->form_validation->run() == false){
        $this->load->view('templates/dashboard_header',$data);
        $this->load ->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/role',$data);
        $this->load->view('templates/dashboard_footer');
        }else {
            $this->Role_menu->UpdateRole('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Role Telah Berubah!</div>');
            redirect('role');
        }
    }


    public function keranjang()
    {
        $data['title'] = 'Keranjang';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        $query = "SELECT k.id as id_keranjang, k.jumlah,k.total, login.nama as nama_user, produk.*
                  FROM keranjang k
                  INNER JOIN login ON login.id=k.id_user
                  JOIN produk ON produk.id = k.id_produk
                  WHERE k.status = 2";
        $data['pesanan'] = $this->db->query($query)->result_array();
        
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/keranjang',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function verifikasi(){
        $idkeranjang = $this->input->post('idkeranjang');
        $idproduk = $this->input->post('idproduk');
        $jumlah = $this->input->post('jumlah');
        
        // merubah status pesanan
        $this->db->where('id',$idkeranjang);
        $this->db->set('status',0);
        $this->db->update('keranjang');
        // update stok produk
        $this->db->where('id',$idproduk);
        $this->db->set('stok',$jumlah);
        $this->db->update('produk');
        redirect(base_url('Admin/keranjang'),'refresh');
    }

    public function history(){
        $data['title'] = 'History';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        $query = "SELECT k.id as id_keranjang, k.jumlah,k.total, login.nama as nama_user, produk.*
                  FROM keranjang k
                  INNER JOIN login ON login.id=k.id_user
                  JOIN produk ON produk.id = k.id_produk
                  WHERE k.status = 0";    
        $data['history'] = $this->db->query($query)->result_array();
        
        $this->load->view('templates/dashboard_header',$data);
        $this->load->view('templates/dashboard_sidebar',$data);
        $this->load->view('templates/dashboard_topbar',$data);
        $this->load->view('admin/history',$data);
        $this->load->view('templates/dashboard_footer');
    }

    public function manageProduct(){
        $data['title'] = 'Manage Product';
        $data['login'] = $this->db->get_where('login', ['email' => 
        $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->get('produk')->result_array();

        // ijka submit ditekan berarti melakukan update produk
        if(isset($_POST['submit'])){
            $idProduk = $this->input->post('id');    
            $proses = $this->input->post('proses');    
            $config['upload_path'] = './assets/img/produk';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config); 
                // pengujian upload gambar berhasil atau gagal
                 if(!$this->upload->do_upload('image')){
                    $data = $this->db->get_where('produk',['id' =>$idProduk])->row_array();
                    $imageName = $data['image'];
                 }else{
                    $imageName = $this->upload->data('file_name');
                 }
                //  set data
             $produk = [
                'nama'      => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi'),
                'stok'      => $this->input->post('stok'),
                'harga'     => $this->input->post('harga'),
                'jenis'     => $this->input->post('jenis'),
                'image'     => $imageName
               ];
             //   pengujian untuk fungsi update atau tambah data
             if($_POST['proses'] == 'tambah'){
                    $this->db->insert('produk',$produk);
                    
             }else if($_POST['proses'] == 'edit'){
                    $this->db->where('id',$idProduk);
                    $this->db->update('produk',$produk);
                }
            // dikembalikan ke halaman mange product
            redirect(base_url('Admin/manageProduct'));   
        }else{
            $this->load->view('templates/dashboard_header',$data);
            $this->load->view('templates/dashboard_sidebar',$data);
            $this->load->view('templates/dashboard_topbar',$data);
            $this->load->view('admin/manage-product',$data);
            $this->load->view('templates/dashboard_footer');
        }
    }
    public function hapusProduk(){
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('produk');
        redirect(base_url('Admin/manageProduct'),'refresh');
    }
}