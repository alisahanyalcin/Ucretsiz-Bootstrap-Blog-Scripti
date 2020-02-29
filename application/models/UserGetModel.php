<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserGetModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
    }

    public function blog_count()
    {
        $this->db->where('aktiflik', 1);
        return $this->db->count_all("blog");
    }

    public function fetch_blog($limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("blog");
        if ($query->num_rows() > 0) :
            foreach ($query->result() as $row) :
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }

    public function blog_arama_count($kelime)
    {
        $this->db->like('icerik', $kelime);
        $this->db->or_like('adi', $kelime);
        $this->db->or_like('ozet', $kelime);
        $this->db->where('aktiflik', 1);
        return $this->db->count_all("blog");
    }

    public function fetch_arama_blog($kelime, $limit, $start)
    {
        $this->db->limit($limit, $start);
        $this->db->like('icerik', $kelime);
        $this->db->or_like('adi', $kelime);
        $this->db->or_like('ozet', $kelime);
        $this->db->where('aktiflik', 1);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("blog");
        if ($query->num_rows() > 0) :
            foreach ($query->result() as $row) :
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
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

    //ıdye göre içerik için
    public function getIdKategori($id){
        $this->db->where('id', $id);
        $query = $this->db->get('kategoriler');
        if ($query->num_rows() > 0) {
            return $query->row()->adi;
        }
        return false;
    }
}