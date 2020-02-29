<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title><?= $title;?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url();?>/assets/front/css/style.css">
    <link rel="stylesheet" href="<?= base_url();?>/assets/front/css/components.css">
</head>

<body>
<div id="app">
    <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                            <i class="fas fa-bars"></i>
                        </a>
                    </li>
                </ul>
                <div></div>
            </form>
            <ul class="navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                        <img alt="image" src="<?= base_url();?>assets/front/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block"><?= $this->session->userdata("admin_user_name");?></div></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="<?= base_url();?>panel/profil" class="dropdown-item has-icon">
                            <i class="far fa-user"></i> Profilniz
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="<?= base_url();?>auth/logout" class="dropdown-item has-icon text-danger">
                            <i class="fas fa-sign-out-alt"></i> Çıkış Yap
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="main-sidebar">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="<?= base_url();?>panel/home"><?= $getSiteName;?></a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="<?= base_url();?>panel/home"><?= $getSiteNameMobil;?></a>
                </div>
                <ul class="sidebar-menu">
                    <li class="<?=($this->uri->segment(2)==='home')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/home">
                            <i class="fas fa-fire"></i> <span>Dashboard</span>
                        </a>
                    </li><li class="<?=($this->uri->segment(2)==='bloglar' || $this->uri->segment(2)==='blog_ekle' || $this->uri->segment(2)==='blog_duzenle')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/bloglar">
                            <i class="fas fa-newspaper"></i> <span>Blog Yazıları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='iletisim')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/iletisim">
                            <i class="fas fa-inbox"></i> <span>İletişim Mesajları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='menuler' || $this->uri->segment(2)==='menu_ekle' || $this->uri->segment(2)==='menu_duzenle')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/menuler">
                            <i class="fas fa-bars"></i> <span>Menü Ayarları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='kategoriler' || $this->uri->segment(2)==='kategori_ekle' || $this->uri->segment(2)==='kategori_duzenle')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/kategoriler">
                            <i class="fas fa-align-center"></i> <span>Kategori Ayarları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='yorumlar')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/yorumlar">
                            <i class="fas fa-comments"></i> <span>Yorum Ayarları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='sayfalar' || $this->uri->segment(2)==='sayfa_ekle' || $this->uri->segment(2)==='sayfa_duzenle')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/sayfalar">
                            <i class="fas fa-file"></i> <span>Sayfa Ayarları</span>
                        </a>
                    </li>
                    <li class="<?=($this->uri->segment(2)==='sistem_ayarlari')?'active':''?>">
                        <a class="nav-link" href="<?= base_url();?>panel/sistem_ayarlari">
                            <i class="fas fa-cogs"></i> <span>Sistem Ayarları</span>
                        </a>
                    </li>
                </ul>
            </aside>
        </div>