<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GetModel extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function sayfa_sayisi() {
        return $this->db->count_all("sayfalar");
    }

    public function get_Sayfalar($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("sayfalar");
        if ($query->num_rows() > 0) :
            foreach ($query->result() as $row) :
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }

    public function blog_sayisi() {
        return $this->db->count_all("blog");
    }

    public function get_bloglar($limit, $start) {
        $this->db->limit($limit, $start);
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

    public function count_iletisim() {
        return $this->db->count_all("iletisim");
    }
    public function fetch_iletisim($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "DESC");
        $query = $this->db->get("iletisim");
        if ($query->num_rows() > 0):
            foreach ($query->result() as $row):
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }

    public function count_menuler() {
        return $this->db->count_all("menu");
    }
    public function fetch_menuler($limit, $start) {
        $this->db->limit($limit, $start);
        $this->db->order_by("sira", "DESC");
        $query = $this->db->get("menu");
        if ($query->num_rows() > 0):
            foreach ($query->result() as $row):
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }

    public function count_kategoriler() {
        return $this->db->count_all("kategoriler");
    }
    public function fetch_kategoriler($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("kategoriler");
        if ($query->num_rows() > 0):
            foreach ($query->result() as $row):
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }

    public function count_yorumlar() {
        return $this->db->count_all("yorumlar");
    }
    public function fetch_yorumlar($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get("yorumlar");
        if ($query->num_rows() > 0):
            foreach ($query->result() as $row):
                $data[] = $row;
            endforeach;
            return $data;
        endif;
        return false;
    }
    //pagination bitiş


    public function getKatlar(){
        $query = $this->db->get('kategoriler');
        return $query->result();
    }
    public function getLast30Iletisim(){
        $this->db->order_by("id", "DESC")->limit(30);
        $query = $this->db->get('iletisim');
        return $query->result();
    }


    public function getIdSayfa($id){
        $this->db->where('id', $id);
        $query = $this->db->get('sayfalar');
        return $query->result();
    }
    public function getIdBlog($id){
        $this->db->where('id', $id);
        $query = $this->db->get('blog');
        return $query->result();
    }
    public function getIdMenu($id){
        $this->db->where('id', $id);
        $query = $this->db->get('menu');
        return $query->result();
    }
    public function getIdKategori($id){
        $this->db->where('id', $id);
        $query = $this->db->get('kategoriler');
        return $query->result();
    }


    public function getIdKatAdi($id){
        $this->db->where('id', $id);
        $query = $this->db->get('kategoriler');
        if ($query->num_rows() > 0) {
            return $query->row()->adi;
        }
        return false;
    }
    public function getIdBlogAdi($id){
        $this->db->where('id', $id);
        $query = $this->db->get('blog');
        if ($query->num_rows() > 0) {
            return $query->row()->adi;
        }
        return false;
    }
    public function getIdBlogLink($id){
        $this->db->where('id', $id);
        $query = $this->db->get('blog');
        if ($query->num_rows() > 0) {
            return $query->row()->link;
        }
        return false;
    }
    public function getIdBlogResim($id){
        $this->db->where('id', $id);
        $query = $this->db->get('blog');
        if ($query->num_rows() > 0) {
            return $query->row()->gorsel;
        }
        return false;
    }
}