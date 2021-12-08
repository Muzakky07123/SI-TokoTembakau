<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        
    }
    public function index()
    {

        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('email','Email','trim|required|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');
        if($this->form_validation->run() == false) {
        $data['title'] = 'Login Page';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/login');
        $this->load->view('templates/auth_footer');
        }else {
            // Validasi Sukses
            $this->_login();
        }
    }

    private function _login(){
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->db->get_where('login', ['email' => $email ])->row_array();
        
        // jika user ada
        if($user){
            // jika user aktif
            if($user['is_active'] == 1){
                // cek password
                if(password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                }else {
                    $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                    Password Salah !</div>');
                    redirect('auth');
                }
            }else{
                $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
                Email Belum Aktif!</div>');
                redirect('auth');
            }
        }else {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
            Email Tidak Tedaftar!</div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('nohp', 'NoHP', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]',[
                                            'matches'=>'Password Tidak Sama!',
                                            'min_length'=>'Password Terlalu Pendek!']);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[6]|matches[password1]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[login.email]',[
                                            'is_unique' => 'Email Telah Terpakai'                            
            ]);

        if($this->form_validation->run() == false){
            $data['title'] = 'Daftar Akun';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        }else {
            $data = 
            [
                'nama' => htmlspecialchars($this->input->post('nama')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'nohp' => htmlspecialchars($this->input->post('nohp')),
                'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
                'email' => htmlspecialchars($this->input->post('email')),
                'image' => 'default.png',
                'role_id' => 2,
                'is_active' => 0, //nanti dirubah menjadi 0
                'date_created' => time()
            ];

            $this->db->insert('login',$data);

            $this->_sendEmail();

            $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
            Akun Telah dibuat! Login Sekarang</div>');
            redirect('auth');
        }
    }

    private function _sendEmail(){
         $config = [
             'protocol' => 'smtp',
             'smtp_host' => 'ssl://smtp.googlemail.com',
             'smtp_user' => 'codegeass439@gmail.com',
             'smtp_pass' => '12345678',
             'smtp_port' => 465,
             'mailtype' => 'html',
             'charset' => 'utf-8',
             'newline' => "\r\n"
         ];

         $this->load->library('email', $config);
         $this->email->initialize($config);
         $this->email->from('codegeass439@gmail.com', 'Code Geass');
         $this->email->to('matthewjordan439@gmail.com');
         $this->email->subject('Testing');
         $this->email->message('Hello World');

         if($this->email->send()){
             return true;
         } else {
             echo $this->email->print_debugger();
             die;
         }
    }

    public function logout(){
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
        Berhasil Logout!</div>');
        redirect('auth');
    }

    public function block()
    {
        $this->load->view('auth/block');
    }
}