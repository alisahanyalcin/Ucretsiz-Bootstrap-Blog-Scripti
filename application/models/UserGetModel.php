<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserGetModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function blog_count()
    {
        $this->db->select('count(*) as allcount');
        $this->db->where('aktiflik', 1);
        $this->db->from('blog');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function fetch_blog($rowno, $rowperpage)
    {
        $this->db->select('*');
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $this->db->from('blog');
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function blog_arama_count($kelime)
    {
        $this->db->select('count(*) as allcount');
        $this->db->like('icerik', $kelime);
        $this->db->or_like('adi', $kelime);
        $this->db->or_like('ozet', $kelime);
        $this->db->where('aktiflik', 1);
        $this->db->from('blog');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function fetch_arama_blog($kelime, $rowno, $rowperpage)
    {
        $this->db->select('*');
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $this->db->from('blog');
        $this->db->like('icerik', $kelime);
        $this->db->or_like('adi', $kelime);
        $this->db->or_like('ozet', $kelime);
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function KategoriBlogCount($kategoriID)
    {
        $this->db->select('count(*) as allcount');
        $this->db->where('kategori', $kategoriID);
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $this->db->from('blog');
        $query = $this->db->get();
        $result = $query->result_array();

        return $result[0]['allcount'];
    }

    public function fetchKategoriBlog($rowno, $rowperpage, $kategoriID)
    {
        $this->db->select('*');
        $this->db->where('kategori', $kategoriID);
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $this->db->from('blog');
        $this->db->limit($rowperpage, $rowno);
        $query = $this->db->get();

        return $query->result_array();
    }

    public function getRastgeleBlog($limit){
        $this->db->where('aktiflik', 1);
        $this->db->order_by("", "random")->limit($limit);
        $query = $this->db->get('blog');
        return $query->result();
    }

    public function getMenu(){
        $this->db->where('aktiflik', 1);
        $this->db->order_by("sira", "ASC");
        $query = $this->db->get('menu');
        return $query->result();
    }

    public function getBlogYorum($blog_id){
        $this->db->where('durum', 1);
        $this->db->where('blog_id', $blog_id);
        $this->db->order_by("", "ASC");
        $query = $this->db->get('yorumlar');
        return $query->result();
    }

    public function getKategoriler(){
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get('kategoriler');
        return $query->result();
    }


    //ıdye göre içerik için
    public function getIdKategori($id){
        $this->db->where('id', $id);
        $query = $this->db->get('kategoriler');
        if ($query->num_rows() > 0) {
            return $query->row()->adi;
        }
        return false;
    }
    public function getIdKatLink($id){
        $this->db->where('id', $id);
        $query = $this->db->get('kategoriler');
        if ($query->num_rows() > 0) {
            return $query->row()->link;
        }
        return false;
    }
}
