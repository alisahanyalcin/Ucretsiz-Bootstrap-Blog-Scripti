<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct(){
        parent::__construct();
    }

    public function index($rowno=0){
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
        $rowperpage = $resultSite['sayfa_basi_blog'];

        if($rowno != 0){
            $rowno = ($rowno-1) * $rowperpage;
        }

        $allcount = $this->UserGetModel->blog_count();
        $users_record = $this->UserGetModel->fetch_blog($rowno, $rowperpage);

        $config['base_url'] = base_url();
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $users_record;
        $data['row'] = $rowno;

        $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
        $data['getMenu'] = $this->UserGetModel->getMenu();
        $data['getKategoriler'] = $this->UserGetModel->getKategoriler();

        $this->load->view('user/header', $data);
        $this->load->view('user/index');
        $this->load->view('user/footer');
    }

    public function detay($slug){
        $this->load->helper("ago");
        $this->load->library('recaptcha');
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
            $data['getKategoriler'] = $this->UserGetModel->getKategoriler();

            $data['yorumsay'] = $this->db->get_where('yorumlar', ['blog_id' => $detail['id'], 'durum' => 1])->num_rows();
            $data['getBlogYorum'] = $this->UserGetModel->getBlogYorum($detail['id']);

            $data['widget'] = $this->recaptcha->getWidget();
            $data['script'] = $this->recaptcha->getScriptTag();

            $this->load->view('user/header', $data);
            $this->load->view('user/detay');
            $this->load->view('user/footer');
        else:
            show_404();
        endif;
    }
    
    public function kategoriler(){
        $resultPageDetail = $this->db->get_where('sayfalar', ['link' => 'kategoriler'])->row_array();
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

            $data['getMenu'] = $this->UserGetModel->getMenu();
            $data['getKategoriler'] = $this->UserGetModel->getKategoriler();
            $this->load->view('user/header', $data);
            $this->load->view('user/kategoriler');
            $this->load->view('user/footer');
        else:
            show_404();
        endif;
    }

    public function kategori($url, $rowno=0){
        $this->load->helper("ago");
        $resultDetail = $this->db->get_where('kategoriler', ['link' => htmlspecialchars($url)])->row_array();
        if ($resultDetail):
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $data['fav'] = $resultSite['site_fav'];
            if($resultSite['logomu_site_adimi']==1):
                $data['site_adi'] = "<img style='height:35px;' src='".base_url()."assets/upload/".$resultSite['site_logo']."'>";
            else:
                $data['site_adi'] = $resultSite['site_adi'];
            endif;
            $limit = $resultSite['random_sayfa_basi_blog'];

            $data['site'] = $resultSite['site_adi'];
            $data['title'] = $resultDetail['adi']." - ".$resultSite['site_adi'];
            $data['description'] = $resultDetail['aciklama'];
            $data['tags'] = $resultDetail['anahtar_kelimeler'];
            $data['baslik'] = $resultDetail['adi'];


            $rowperpage = $resultSite['sayfa_basi_blog'];

            if($rowno != 0){
                $rowno = ($rowno-1) * $rowperpage;
            }

            $allcount = $this->UserGetModel->KategoriBlogCount($resultDetail['id']);
            $users_record = $this->UserGetModel->fetchKategoriBlog($rowno, $rowperpage, $resultDetail['id']);

            $config['base_url'] = base_url("kategori/".$url."/");
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['result'] = $users_record;
            $data['row'] = $rowno;
            
            $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
            $data['getKategoriler'] = $this->UserGetModel->getKategoriler();

            $data['getMenu'] = $this->UserGetModel->getMenu();
            $this->load->view('user/header', $data);
            $this->load->view('user/kategori');
            $this->load->view('user/footer');
        else:
            show_404();
        endif;
    }

    public function yorum_yap(){
        $this->load->library('recaptcha');
        $this->form_validation->set_rules('ad', 'Adınız', 'required|trim');
        $this->form_validation->set_rules('mail', 'Mail Adresiniz', 'required|trim');
        $this->form_validation->set_rules('yorum', 'Yorumunuz', 'required|trim');
        if ($this->form_validation->run() == true):
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            $resultSite = $this->db->get_where('sistem_ayarlari', ['id' => 1])->row_array();
            $id = $this->input->post('id', true);
            $detail = $this->db->get_where('blog', ['id' => $id])->row_array();
            if (isset($response['success']) and $response['success'] === true):
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
            else:
                $this->session->set_flashdata('sonuc', '<div class="alert alert-danger">Recaptcha alanı zorunludur.</div>');
            endif;
            redirect($detail["link"]);
        endif;
    }

    public function iletisim(){
        $this->load->library('recaptcha');
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

        $data['widget'] = $this->recaptcha->getWidget();
        $data['script'] = $this->recaptcha->getScriptTag();

        $this->form_validation->set_rules('mesaage', 'Message', 'required|trim');
        $this->form_validation->set_rules('mail', 'Mail', 'required|trim');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() == false):
            $data['getMenu'] = $this->UserGetModel->getMenu();
            $this->load->view('user/header', $data);
            $this->load->view('user/iletisim');
            $this->load->view('user/footer');
        else:
            $recaptcha = $this->input->post('g-recaptcha-response');
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true):
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
            else:
                $this->session->set_flashdata('sonuc', '<div class="alert alert-danger">Recaptcha alanı zorunludur.</div>');
            endif;
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
        else:
            show_404();
        endif;
    }

    public function arama($rowno=0){
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

            $rowperpage = $resultSite['sayfa_basi_blog'];

            if($rowno != 0){
                $rowno = ($rowno-1) * $rowperpage;
            }

            $allcount = $this->UserGetModel->blog_arama_count($kelime);
            $users_record = $this->UserGetModel->fetch_arama_blog($kelime, $rowno, $rowperpage);

            $config['base_url'] = base_url('arama/'.$kelime);
            $config['use_page_numbers'] = TRUE;
            $config['total_rows'] = $allcount;
            $config['per_page'] = $rowperpage;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
            $data['result'] = $users_record;
            $data['row'] = $rowno;

            $data['getRastgeleBlog'] = $this->UserGetModel->getRastgeleBlog($limit);
            $data['getMenu'] = $this->UserGetModel->getMenu();
            $data['getKategoriler'] = $this->UserGetModel->getKategoriler();
            $this->load->view('user/header', $data);
            $this->load->view('user/arama');
            $this->load->view('user/footer');
        else:
            show_404();
        endif;
    }
}
