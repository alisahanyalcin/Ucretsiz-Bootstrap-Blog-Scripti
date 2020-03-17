<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function login(){
        if ($this->session->userdata('admin_user_name')) {
            redirect(base_url().'panel/home');
        }
        $this->form_validation->set_rules('admin_user_name', 'Your User Name', 'required|trim');
        $this->form_validation->set_rules('admin_password', 'Your Password', 'required|trim');
        if ($this->form_validation->run() == false) {

            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['title'] = 'Giriş Yap | '.$resultSite['site_adi'];
            $this->load->view('auth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('auth/footer');
        }else{
            $this->_login();
        }
    }

    private function _login(){
        $user_name = $this->input->post('admin_user_name', true);
        $password = $this->input->post('admin_password', true);

        $admin = $this->db->get_where('admin', ['user_name' => $user_name])->row_array();

        if ($admin) {
            if (password_verify($password, $admin['password'])) {
                $this->session->set_userdata('admin_user_name', $user_name);
                redirect(base_url().'panel/home');
            }else{
                $this->session->set_flashdata('result', '<div class="alert alert-danger">Hatalı Şifre.</div>');
                redirect(base_url().'auth/login');
            }
        }else{
            $this->session->set_flashdata('result', '<div class="alert alert-danger">Hatalı Kullanıcı Adı.</div>');
            redirect(base_url().'auth/login');
        }
    }

    public function logout(){
        $this->session->unset_userdata('admin_user_name');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarıyla çıkış yaptınız.</div>');
        redirect(base_url().'auth/login');
    }
}
