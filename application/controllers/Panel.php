<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

    public function __construct(){
        parent::__construct();
        if (!$this->session->userdata("admin_user_name")) :
            redirect(base_url().'auth/login');
        endif;
    }

    public function home(){
        $this->index();
    }
    public function index(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
        $data['getLast30Iletisim'] = $this->GetModel->getLast30Iletisim();
        $data['getHepsi'] = $this->db->get_where('blog')->num_rows();
        $data['getAktifler'] = $this->db->get_where('blog', ['aktiflik' => 1])->num_rows();
        $data['getPasifler'] = $this->db->get_where('blog', ['aktiflik' => 0])->num_rows();
        $data['title'] = 'Dasboard | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/index');
        $this->load->view('admin/footer');
    }
    public function profil(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];

        $ResultAdmin = $this->db->get_where('admin', ['user_name' => $this->session->userdata("admin_user_name")])->row_array();
        $data['user_name'] = $ResultAdmin['user_name'];
        $password1 = $ResultAdmin['password'];

        $this->form_validation->set_rules('current_password', 'Current password', 'required|trim');
        $this->form_validation->set_rules('new_password', 'New password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Profil | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/profil');
            $this->load->view('admin/footer');
        }else{
            $current_password = $this->input->post('current_password', true);
            $new_password = $this->input->post('new_password', true);
            if (password_verify($current_password, $password1)){
                if ($current_password != $new_password){
                    $data = ['password' => password_hash($new_password, PASSWORD_DEFAULT)];
                    $this->db->where('user_name', $this->session->userdata("admin_user_name"));
                    $this->db->update('admin', $data);
                    $this->session->set_flashdata('result', '<div class="alert alert-success">Şifreniz başarıyla güncellendi.</div>');
                    redirect('panel/profil');
                }else{
                    $this->session->set_flashdata('result', '<div class="alert alert-danger">Yeni şifreniz mevcut şifrenizle aynı olamaz.</div>');
                    redirect('panel/profil');
                }
            }else{
                $this->session->set_flashdata('result', '<div class="alert alert-danger">Mevcut şifrenizi yanlış girdiniz.</div>');
                redirect('panel/profil');
            }
        }
    }
    public function sistem_ayarlari(){
        $this->load->helper("highlighted_up");
        $this->form_validation->set_rules('site_name', 'Site Name', 'required|trim');
        $this->form_validation->set_rules('site_name_mobil', 'Mobil Site Name', 'required|trim');
        if ($this->form_validation->run() == false) :
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['site_title'] = $resultSite['site_baslik'];
            $data['site_description'] = $resultSite['site_aciklama'];
            $data['site_tags'] = $resultSite['site_anahtar_kelimeler'];
            $data['yorum_oto_onay'] = $resultSite['yorum_oto_onay'];
            $data['sayfa_basi_blog'] = $resultSite['sayfa_basi_blog'];
            $data['random_sayfa_basi_blog'] = $resultSite['random_sayfa_basi_blog'];
            $data['site_logo'] = $resultSite['site_logo'];
            $data['site_fav'] = $resultSite['site_fav'];
            $data['logomu_site_adimi'] = $resultSite['logomu_site_adimi'];

            $data['title'] = 'Sistem Ayarları | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sistem_ayarlari');
            $this->load->view('admin/footer');
        else:
            $site_name = $this->input->post('site_name', true);
            $site_name_mobil = $this->input->post('site_name_mobil', true);
            $site_title = $this->input->post('site_title', true);
            $site_description = $this->input->post('site_description', true);
            $site_tags = $this->input->post('site_tags', true);
            $yorum_oto_onay = $this->input->post('yorum_oto_onay', true);
            $sayfa_basi_blog = $this->input->post('sayfa_basi_blog', true);
            $random_sayfa_basi_blog = $this->input->post('random_sayfa_basi_blog', true);
            $logomu_site_adimi = $this->input->post('logomu_site_adimi', true);

            $config["upload_path"] = "assets/upload/";
            $config['allowed_types'] = 'jpg|png|jpeg|webp';
            $config['max_size'] = '54000';
            $config['min_height'] = '10';
            $config['min_width'] = '10';
            $config['remove_space'] = true;
            $site_fav = highlighted_up($config,'site_fav');
            $site_logo = highlighted_up($config,'site_logo');
            if($site_fav == '<p>You did not select a file to upload.</p>' && $site_logo == '<p>You did not select a file to upload.</p>'):
                $datasss = array(
                    'site_adi' => htmlspecialchars($site_name),
                    'site_name_mobil' => htmlspecialchars($site_name_mobil),
                    'site_baslik' => htmlspecialchars($site_title),
                    'site_aciklama' => htmlspecialchars($site_description),
                    'site_anahtar_kelimeler' => htmlspecialchars($site_tags),
                    'yorum_oto_onay' => htmlspecialchars($yorum_oto_onay),
                    'sayfa_basi_blog' => htmlspecialchars($sayfa_basi_blog),
                    'random_sayfa_basi_blog' => htmlspecialchars($random_sayfa_basi_blog),
                    'logomu_site_adimi' => htmlspecialchars($logomu_site_adimi)
                );
            elseif($site_fav == '<p>You did not select a file to upload.</p>'):
                $datasss = array(
                    'site_adi' => htmlspecialchars($site_name),
                    'site_name_mobil' => htmlspecialchars($site_name_mobil),
                    'site_baslik' => htmlspecialchars($site_title),
                    'site_aciklama' => htmlspecialchars($site_description),
                    'site_anahtar_kelimeler' => htmlspecialchars($site_tags),
                    'yorum_oto_onay' => htmlspecialchars($yorum_oto_onay),
                    'sayfa_basi_blog' => htmlspecialchars($sayfa_basi_blog),
                    'random_sayfa_basi_blog' => htmlspecialchars($random_sayfa_basi_blog),
                    'logomu_site_adimi' => htmlspecialchars($logomu_site_adimi),
                    'site_logo' => htmlspecialchars($site_logo)
                );
            elseif($site_logo == '<p>You did not select a file to upload.</p>'):
                $datasss = array(
                    'site_adi' => htmlspecialchars($site_name),
                    'site_name_mobil' => htmlspecialchars($site_name_mobil),
                    'site_baslik' => htmlspecialchars($site_title),
                    'site_aciklama' => htmlspecialchars($site_description),
                    'site_anahtar_kelimeler' => htmlspecialchars($site_tags),
                    'yorum_oto_onay' => htmlspecialchars($yorum_oto_onay),
                    'sayfa_basi_blog' => htmlspecialchars($sayfa_basi_blog),
                    'random_sayfa_basi_blog' => htmlspecialchars($random_sayfa_basi_blog),
                    'logomu_site_adimi' => htmlspecialchars($logomu_site_adimi),
                    'site_fav' => htmlspecialchars($site_fav)
                );
            else:
                $datasss = array(
                    'site_adi' => htmlspecialchars($site_name),
                    'site_name_mobil' => htmlspecialchars($site_name_mobil),
                    'site_baslik' => htmlspecialchars($site_title),
                    'site_aciklama' => htmlspecialchars($site_description),
                    'site_anahtar_kelimeler' => htmlspecialchars($site_tags),
                    'yorum_oto_onay' => htmlspecialchars($yorum_oto_onay),
                    'sayfa_basi_blog' => htmlspecialchars($sayfa_basi_blog),
                    'random_sayfa_basi_blog' => htmlspecialchars($random_sayfa_basi_blog),
                    'logomu_site_adimi' => htmlspecialchars($logomu_site_adimi),
                    'site_logo' => htmlspecialchars($site_logo),
                    'site_fav' => htmlspecialchars($site_fav)
                );
            endif;
            $this->db->update('sistem_ayarlari', $datasss);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı.</div>');
            redirect('panel/sistem_ayarlari');
        endif;
    }


    public function sayfalar(){
        if ( $this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];

            //pagination
            $config = array();
            $config["base_url"] = base_url('panel/sayfalar/');
            $config["total_rows"] = $this->GetModel->sayfa_sayisi();
            $config["per_page"] = 10;
            $config["uri_segment"] = 3;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
            $data["results"] = $this->GetModel->get_Sayfalar($config["per_page"], $page);
            $data["links"] = $this->pagination->create_links();
            //pagination

            $data['title'] = 'Sayfalar | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sayfalar');
            $this->load->view('admin/footer');
        }
    }
    public function sayfa_duzenle($id){
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('content', 'content', 'required');
        $this->form_validation->set_rules('keywords', 'keywords', 'required|trim');
        $this->form_validation->set_rules('description', 'description', 'required|trim');
        if ( $this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['getIdSayfa'] = $this->GetModel->getIdSayfa($id);

            $data['title'] = 'Sayfa Düzenle | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sayfa_duzenle');
            $this->load->view('admin/footer');
        }else{
            $id = $this->input->post('id', true);
            $name = $this->input->post('name', true);
            $content = $this->input->post('content', true);
            $keywords = $this->input->post('keywords', true);
            $description = $this->input->post('description', true);

            $datasss = array(
                'adi' => htmlspecialchars($name),
                'icerik' => htmlspecialchars($content),
                'anahtar_kelimeler' => htmlspecialchars($keywords),
                'aciklama' => htmlspecialchars($description)
            );
            $this->db->where('id', $id);
            $this->db->update('sayfalar', $datasss);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı.</div>');
            redirect(base_url().'panel/sayfa_duzenle/'.$id);
        }
    }
    public function sayfa_sil($id){
        $this->db->where('id', $id);
        $this->db->delete('sayfalar');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/sayfalar');
    }
    public function sayfa_ekle(){
        $this->form_validation->set_rules('name', 'name', 'required|trim');
        $this->form_validation->set_rules('content', 'content', 'required');
        $this->form_validation->set_rules('description', 'description', 'required');
        $this->form_validation->set_rules('content', 'content', 'required');
        $this->form_validation->set_rules('tags', 'tags', 'required|trim');
        if ($this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['title'] = 'Sayfa Ekle';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sayfa_ekle');
            $this->load->view('admin/footer');
        } else {
            $this->load->helper("seouri");

            $title = $this->input->post('name', true);
            $slug = permalink($title);
            $content = $this->input->post('content', true);
            $description = $this->input->post('description', true);
            $tags = $this->input->post('tags', true);


            $datasss = array(
                'adi' => htmlspecialchars($title),
                'link' => htmlspecialchars($slug),
                'icerik' => htmlspecialchars($content),
                'aciklama' => htmlspecialchars($description),
                'anahtar_kelimeler' => htmlspecialchars($tags)
            );
            $this->db->insert('sayfalar', $datasss);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/sayfalar');
        }
    }


    public function bloglar(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];

        //pagination
        $config = array();
        $config["base_url"] = base_url('panel/bloglar/');
        $config["total_rows"] = $this->GetModel->blog_sayisi();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->GetModel->get_bloglar($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //pagination

        $data['title'] = 'Bloglar | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/bloglar');
        $this->load->view('admin/footer');
    }
    public function blog_ekle(){
        $this->form_validation->set_rules('adi', 'adi', 'required|trim');
        if ($this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['title'] = 'Blog Ekle';
            $this->load->view('admin/header', $data);
            $this->load->view('admin/blog_ekle');
            $this->load->view('admin/footer');
        } else {
            $this->load->helper("seouri");
            $this->load->helper("highlighted_up");

            $config["upload_path"] = "assets/upload/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|svg';
            $config['max_size'] = '64000';
            $config['min_height'] = '100';
            $config['min_width'] = '100';
            $config['remove_space'] = true;

            $gorsel = highlighted_up($config, 'gorsel');
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            if (empty($link)):
                $link = permalink($adi);
            endif;
            $icerik = $this->input->post('icerik', true);
            $aciklama = $this->input->post('aciklama', true);
            $ozet = $this->input->post('ozet', true);
            $anahtar_kelimeler = $this->input->post('anahtar_kelimeler', true);
            $kategori = $this->input->post('kategori', true);


            $data = array(
                'adi' => htmlspecialchars($adi),
                'link' => htmlspecialchars($link),
                'gorsel' => htmlspecialchars($gorsel),
                'kategori' => htmlspecialchars($kategori),
                'ozet' => htmlspecialchars($ozet),
                'icerik' => $icerik,
                'tarih' => date('d-m-Y H:i'),
                'aciklama' => htmlspecialchars($aciklama),
                'anahtar_kelimeler' => htmlspecialchars($anahtar_kelimeler),
                'aktiflik' => 1
            );
            $this->db->insert('blog', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/bloglar');
        }
    }
    public function blog_duzenle($id){
        $this->form_validation->set_rules('adi', 'Adı', 'required|trim');
        if ( $this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['getIdBlog'] = $this->GetModel->getIdBlog($id);

            $data['title'] = 'Blog Düzenle | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/blog_duzenle');
            $this->load->view('admin/footer');
        }else{
            $this->load->helper("seouri");
            $this->load->helper("highlighted_up");

            $config["upload_path"] = "assets/upload/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|webp|svg';
            $config['max_size'] = '64000';
            $config['min_height'] = '100';
            $config['min_width'] = '100';
            $config['remove_space'] = true;

            $gorsel = highlighted_up($config, 'gorsel');
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            if (empty($link)):
                $link = permalink($adi);
            endif;
            $icerik = $this->input->post('icerik', true);
            $aciklama = $this->input->post('aciklama', true);
            $ozet = $this->input->post('ozet', true);
            $anahtar_kelimeler = $this->input->post('anahtar_kelimeler', true);
            $kategori = $this->input->post('kategori', true);


            if($gorsel == '<p>You did not select a file to upload.</p>') :
                $data = array (
                    'adi' => htmlspecialchars($adi),
                    'link' => htmlspecialchars($link),
                    'kategori' => htmlspecialchars($kategori),
                    'ozet' => htmlspecialchars($ozet),
                    'icerik' => $icerik,
                    'tarih' => date('d-m-Y H:i'),
                    'aciklama' => htmlspecialchars($aciklama),
                    'anahtar_kelimeler' => htmlspecialchars($anahtar_kelimeler),
                    'aktiflik' => 1
                );
            else:
                $data = array (
                    'adi' => htmlspecialchars($adi),
                    'link' => htmlspecialchars($link),
                    'gorsel' => htmlspecialchars($gorsel),
                    'kategori' => htmlspecialchars($kategori),
                    'ozet' => htmlspecialchars($ozet),
                    'icerik' => htmlspecialchars($icerik),
                    'tarih' => date('d-m-Y H:i'),
                    'aciklama' => htmlspecialchars($aciklama),
                    'anahtar_kelimeler' => htmlspecialchars($anahtar_kelimeler),
                    'aktiflik' => 1
                );
            endif;
            $this->db->where('id', $id);
            $this->db->update('blog', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı.</div>');
            redirect(base_url().'panel/blog_duzenle/'.$id);
        }
    }
    public function blog_kapat($id){
        $data = array(
            'aktiflik' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/bloglar');
    }
    public function blog_ac($id){
        $data = array(
            'aktiflik' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('blog', $data);
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/bloglar');
    }
    public function blog_sil($id){
        $resim_url = "assets/upload/".$this->GetModel->getIdBlogResim($id);
        if(file_exists($resim_url)):
            unlink($resim_url);
        endif;
        $this->db->where('id', $id);
        $this->db->delete('blog');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/bloglar');
    }


    public function iletisim(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
        //pagination
        $config = array();
        $config["base_url"] = base_url('panel/ileitism/');
        $config["total_rows"] = $this->GetModel->count_iletisim();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->GetModel->fetch_iletisim($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //pagination

        $data['title'] = 'İletişim Mesajları | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/iletisim');
        $this->load->view('admin/footer');
    }
    public function iletisim_sil($id){
        $this->db->where('id', $id);
        $this->db->delete('iletisim');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/iletisim');
    }


    public function menuler(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
        //pagination
        $config = array();
        $config["base_url"] = base_url('panel/menuler/');
        $config["total_rows"] = $this->GetModel->count_menuler();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->GetModel->fetch_menuler($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //pagination

        $data['title'] = 'Menüler | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/menuler');
        $this->load->view('admin/footer');
    }
    public function menu_ekle(){
        $this->form_validation->set_rules('adi', 'Adı', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->load->helper("seouri");
            $sira = $this->input->post('sira', true);
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            $link_tipi = $this->input->post('link_tipi', true);
            if($link_tipi == 1):
                if (empty($link)):
                    $link = base_url().permalink($adi);
                endif;
            elseif($link_tipi == 2):
                if (empty($link)):
                    $link = base_url()."sayfa/".permalink($adi);
                endif;
            endif;
            $data = array(
                'sira' => htmlspecialchars($sira),
                'yazi' => htmlspecialchars($adi),
                'link' => htmlspecialchars($link),
                'aktiflik' => 1
            );
            $this->db->insert('menu', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/menuler');
        }
    }
    public function menu_sil($id){
        $this->db->where('id', $id);
        $this->db->delete('menu');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/menuler');
    }
    public function menu_duzenle($id){
        $this->form_validation->set_rules('adi', 'Adı', 'required|trim');
        if ( $this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['getIdMenu'] = $this->GetModel->getIdMenu($id);

            $data['title'] = 'Menü Düzenle | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/menu_duzenle');
            $this->load->view('admin/footer');
        }else{
            $this->load->helper("seouri");
            $sira = $this->input->post('sira', true);
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            if (empty($link)):
                $link = permalink($adi);
            endif;

            $data = array(
                'sira' => htmlspecialchars($sira),
                'yazi' => htmlspecialchars($adi),
                'link' => htmlspecialchars($link),
                'aktiflik' => 1
            );

            $this->db->where('id', $id);
            $this->db->update('menu', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/menu_duzenle/'.$id);
        }
    }


    public function kategoriler(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
        //pagination
        $config = array();
        $config["base_url"] = base_url('panel/kategoriler/');
        $config["total_rows"] = $this->GetModel->count_kategoriler();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->GetModel->fetch_kategoriler($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //pagination

        $data['title'] = 'Kategoriler | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/kategoriler');
        $this->load->view('admin/footer');
    }
    public function kategori_ekle(){
        $this->form_validation->set_rules('adi', 'Adı', 'required|trim');
        if ($this->form_validation->run() == true) {
            $this->load->helper("seouri");
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            $aciklama = $this->input->post('aciklama', true);
            $anahtar_kelimeler = $this->input->post('anahtar_kelimeler', true);
            if (empty($link)):
                $link = permalink($adi);
            endif;
            $data = array(
                'adi' => htmlspecialchars($adi),
                'link' => htmlspecialchars($link),
                'aciklama' => htmlspecialchars($aciklama),
                'anahtar_kelimeler' => htmlspecialchars($anahtar_kelimeler),
                'aktiflik' => 1
            );
            $this->db->insert('kategoriler', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/kategoriler');
        }
    }
    public function kategori_sil($id){
        $this->db->where('id', $id);
        $this->db->delete('kategoriler');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/kategoriler');
    }
    public function kategori_duzenle($id){
        $this->form_validation->set_rules('adi', 'Adı', 'required|trim');
        if ( $this->form_validation->run() == false) {
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['getSiteName'] = $resultSite['site_adi'];
            $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
            $data['getIdKategori'] = $this->GetModel->getIdKategori($id);

            $data['title'] = 'Kategori Düzenle | '.$data['getSiteName'];
            $this->load->view('admin/header', $data);
            $this->load->view('admin/kategori_duzenle');
            $this->load->view('admin/footer');
        }else{
            $this->load->helper("seouri");
            $adi = $this->input->post('adi', true);
            $link = $this->input->post('link', true);
            $aciklama = $this->input->post('aciklama', true);
            $anahtar_kelimeler = $this->input->post('anahtar_kelimeler', true);
            if (empty($link)):
                $link = permalink($adi);
            endif;
            $data = array(
                'adi' => htmlspecialchars($adi),
                'link' => htmlspecialchars($link),
                'aciklama' => htmlspecialchars($aciklama),
                'anahtar_kelimeler' => htmlspecialchars($anahtar_kelimeler),
                'aktiflik' => 1
            );

            $this->db->where('id', $id);
            $this->db->update('kategoriler', $data);
            $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
            redirect('panel/kategori_duzenle/'.$id);
        }
    }


    public function yorumlar(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['getSiteName'] = $resultSite['site_adi'];
        $data['getSiteNameMobil'] = $resultSite['site_name_mobil'];
        //pagination
        $config = array();
        $config["base_url"] = base_url('panel/yorumlar/');
        $config["total_rows"] = $this->GetModel->count_yorumlar();
        $config["per_page"] = 15;
        $config["uri_segment"] = 3;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->GetModel->fetch_yorumlar($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        //pagination

        $data['title'] = 'Yorumlar | '.$data['getSiteName'];
        $this->load->view('admin/header', $data);
        $this->load->view('admin/yorumlar');
        $this->load->view('admin/footer');
    }
    public function yorum_sil($id){
        $this->db->where('id', $id);
        $this->db->delete('yorumlar');
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/yorumlar');
    }
    public function yorum_onayla($id){
        $data = array(
            'durum' => 1
        );
        $this->db->where('id', $id);
        $this->db->update('yorumlar', $data);
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/yorumlar');
    }
    public function yorum_gizle($id){
        $data = array(
            'durum' => 0
        );
        $this->db->where('id', $id);
        $this->db->update('yorumlar', $data);
        $this->session->set_flashdata('result', '<div class="alert alert-success">Başarılı</div>');
        redirect(base_url().'panel/yorumlar');
    }
    
    public function image_upload(){
        $CKEditor = $_GET['CKEditor'];
        $funcNum = $_GET['CKEditorFuncNum'];

        if(move_uploaded_file($_FILES['upload']['tmp_name'], "assets/upload/".$_FILES['upload']['name'])){
            $url = base_url()."/assets/upload/".$_FILES['upload']['name'];
            echo "<script>window.parent.CKEDITOR.tools.callFunction('".$funcNum."', '".$url."', '');</script>";
        }
    }
}
