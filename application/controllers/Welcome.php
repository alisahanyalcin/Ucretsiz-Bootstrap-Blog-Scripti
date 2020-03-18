<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->helper("ago");
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['title'] = $resultSite['site_adi']." - ".$resultSite['site_baslik'];
        $data['fav'] = $resultSite['site_fav'];
        if($resultSite['logomu_site_adimi']==1):
            $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
        else:
            $data['site_adi'] = $resultSite['site_adi'];
        endif;
        $data['site'] = $resultSite['site_adi'];
        $data['description'] = $resultSite['site_aciklama'];
        $data['tags'] = $resultSite['site_anahtar_kelimeler'];
        $limit = $resultSite['random_sayfa_basi_blog'];

        $config = array();
        $config["base_url"] = base_url();
        $config["total_rows"] = $this->UserGetModel->blog_count();
        $config["per_page"] = $resultSite['sayfa_basi_blog'];
        $config["uri_segment"] = 1;
        $config['use_page_numbers'] = TRUE;
        $this->pagination->initialize($config);
        $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
        $data["results"] = $this->UserGetModel->fetch_blog($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
        $data['getMenu'] = $this->UserGetModel->getMenu();

        $this->load->view('user/header', $data);
        $this->load->view('user/index');
        $this->load->view('user/footer');
    }

    public function detay($slug){
        $this->load->helper("ago");
        $detail = $this->db->get_where('blog', ['link' => htmlspecialchars($slug), 'aktiflik' => 1])->row_array();
        if ($detail):
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $limit = $resultSite['random_sayfa_basi_blog'];
            $data['fav'] = $resultSite['site_fav'];
            $data['site'] = $resultSite['site_adi'];
            if($resultSite['logomu_site_adimi']==1):
                $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
            else:
                $data['site_adi'] = $resultSite['site_adi'];
            endif;
            $data['title'] = $detail['adi']." - ".$resultSite['site_adi'];
            $data['description'] = $detail['aciklama'];
            $data['tags'] = $detail['anahtar_kelimeler'];
            $data['highlighted'] = base_url()."assets/upload/".$detail['gorsel'];
            $data['name'] = $detail['adi'];
            $data['content'] = $detail['icerik'];
            $data['id'] = $detail['id'];
            $data['date'] = time_ago($detail['tarih']);
            $data['category'] = $detail['kategori'];
            $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
            $data['getMenu'] = $this->UserGetModel->getMenu();

            $data['yorumsay'] = $this->db->get_where('yorumlar', ['blog_id' => $detail['id'], 'durum' => 1])->num_rows();
            $data['getBlogYorum'] = $this->UserGetModel->getBlogYorum($detail['id']);

            $this->load->view('user/header', $data);
            $this->load->view('user/detay');
            $this->load->view('user/footer');
        endif;
    }

    public function yorum_yap(){
        $this->form_validation->set_rules('ad', 'Adınız', 'required|trim');
        $this->form_validation->set_rules('mail', 'Mail Adresiniz', 'required|trim');
        $this->form_validation->set_rules('yorum', 'Yorumunuz', 'required|trim');
        if ($this->form_validation->run() == true):
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $id = $this->input->post('id', true);
            $detail = $this->db->get_where('blog', ['id' => $id])->row_array();
            $ad = $this->input->post('ad', true);
            $mail = $this->input->post('mail', true);
            $yorum = $this->input->post('yorum', true);
            $tarih   = date('d.m.Y H:i');
            $pp = rand(1,10);
            $ip = $_SERVER['REMOTE_ADDR'];
            $data = array('blog_id' => $id,  'profil' => $pp.".png", 'ad' => htmlspecialchars($ad), 'mail' => htmlspecialchars($mail), 'yorum' => htmlspecialchars($yorum), 'durum' => $resultSite['yorum_oto_onay'], 'tarih' => $tarih, 'ip' => $ip);
            $this->db->insert('yorumlar', $data);
            if($resultSite['yorum_oto_onay'] == 0):
                $this->session->set_flashdata('sonuc', '<div class="alert alert-success">Yorum Başarıyla Eklendi. En yakın zamanda yayınlanacaktır.</div>');
            else:
                $this->session->set_flashdata('sonuc', '<div class="alert alert-success">Yorum Başarıyla Eklendi.</div>');
            endif;
            redirect($detail["link"]);
        endif;
    }

    public function iletisim(){
        $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
        $data['fav'] = $resultSite['site_fav'];
        if($resultSite['logomu_site_adimi']==1):
            $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
        else:
            $data['site_adi'] = $resultSite['site_adi'];
        endif;
        $data['site'] = $resultSite['site_adi'];
        $resultSiteDetail = $this->db->get_where('sayfalar', ['link' => 'iletisim'])->row_array();
        $data['title'] = $resultSiteDetail['adi']." - ".$resultSite['site_adi'];
        $data['description'] = $resultSiteDetail['aciklama'];
        $data['tags'] = $resultSiteDetail['anahtar_kelimeler'];

        $this->form_validation->set_rules('mesaage', 'Message', 'required|trim');
        $this->form_validation->set_rules('mail', 'Mail', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false):
            $data['getMenu'] = $this->UserGetModel->getMenu();
            $this->load->view('user/header', $data);
            $this->load->view('user/iletisim');
            $this->load->view('user/footer');
        else:
            $mesaage = $this->input->post('mesaage', true);
            $mail = $this->input->post('mail', true);
            $name = $this->input->post('name', true);
            $data = array(
                'isim_soyisim' => htmlspecialchars($name),
                'mail' => htmlspecialchars($mail),
                'mesaj' => htmlspecialchars($mesaage),
                'tarih' => date('d.m.Y H:i'),
                'ip' => $_SERVER['REMOTE_ADDR']
            );
            $this->db->insert('iletisim', $data);
            $this->session->set_flashdata('sonuc', '<div class="alert alert-success">Mesajınız bize ulaştı en kısa sürede size geri döneceğiz.</div>');
            redirect('iletisim');
        endif;
    }

    public function sayfa($url){
        $resultPageDetail = $this->db->get_where('sayfalar', ['link' => htmlspecialchars($url)])->row_array();
        if ($resultPageDetail):
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['fav'] = $resultSite['site_fav'];
            if($resultSite['logomu_site_adimi']==1):
                $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
            else:
                $data['site_adi'] = $resultSite['site_adi'];
            endif;
            $data['site'] = $resultSite['site_adi'];
            $data['title'] = $resultPageDetail['adi']." - ".$resultSite['site_adi'];
            $data['description'] = $resultPageDetail['aciklama'];
            $data['tags'] = $resultPageDetail['anahtar_kelimeler'];
            $data['baslik'] = $resultPageDetail['adi'];
            $data['icerik'] = $resultPageDetail['icerik'];
            $data['getMenu'] = $this->UserGetModel->getMenu();
            $this->load->view('user/header', $data);
            $this->load->view('user/sayfa');
            $this->load->view('user/footer');
        endif;
    }

    public function arama(){
        $kelime = $this->input->get('s', true);
        $kelime = htmlspecialchars($kelime);
        if ($kelime):
            $this->load->helper("ago");
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['fav'] = $resultSite['site_fav'];
            if($resultSite['logomu_site_adimi']==1):
                $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
            else:
                $data['site_adi'] = $resultSite['site_adi'];
            endif;
            $data['site'] = $resultSite['site_adi'];
            $limit = $resultSite['random_sayfa_basi_blog'];
            $data['title'] = $kelime." için Arama Sonuçları - ".$resultSite['site_adi'];
            $data['description'] = $kelime." için Arama Sonuçları";
            $data['tags'] = $kelime;
            $data['kelime'] = $kelime;
            $data['baslik'] = $kelime." için Arama Sonuçları";

            $config = array();
            $config["base_url"] = base_url('arama/'.$kelime);
            $config["total_rows"] = $this->UserGetModel->blog_arama_count($kelime);
            $config["per_page"] = 40;
            $config["uri_segment"] = 1;
            $config['use_page_numbers'] = TRUE;
            $this->pagination->initialize($config);
            $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;
            $data["results"] = $this->UserGetModel->fetch_arama_blog($kelime,$config["per_page"], $page);
            //$data["links"] = $this->pagination->create_links();

            $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
            $data['getMenu'] = $this->UserGetModel->getMenu();
            $this->load->view('user/header', $data);
            $this->load->view('user/arama');
            $this->load->view('user/footer');
        endif;
    }
}
