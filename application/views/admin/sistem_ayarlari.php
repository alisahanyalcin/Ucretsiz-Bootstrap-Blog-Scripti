<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sistem Ayarları</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <div class="form-group">
                                <label>Site Adı</label>
                                <input type="text" value="<?= $getSiteName;?>" name="site_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Site Adı Mobil (sadece yönetim panelinde görünür)</label>
                                <input type="text" value="<?= $getSiteNameMobil;?>" name="site_name_mobil" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" value="<?= $site_title;?>" name="site_title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sayfa Başı Blog</label>
                                <input type="text" value="<?= $sayfa_basi_blog;?>" name="sayfa_basi_blog" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Random Sayfa Başı Blog</label>
                                <input type="text" value="<?= $random_sayfa_basi_blog;?>" name="random_sayfa_basi_blog" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Yorum Oto Onay</label>
                                <select class="form-control" name="yorum_oto_onay">
                                    <?php if($yorum_oto_onay==1):?>
                                        <option value='1'>-- Evet --</option>
                                    <?php else: ?>
                                        <option value='0'>-- Hayır --</option>
                                     <?php endif; ?>
                                    <option value='1'>Evet</option>
                                    <option value='0'>Hayır</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Logo mu Site Adı mı</label>
                                <select class="form-control" name="logomu_site_adimi">
                                    <?php if($logomu_site_adimi==1):?>
                                        <option value='1'>-- Logo --</option>
                                    <?php else: ?>
                                        <option value='0'>-- Site Adı --</option>
                                    <?php endif; ?>
                                    <option value='1'>Logo</option>
                                    <option value='0'>Site Adı</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea type="text" name="site_description" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 121px;"><?= $site_description;?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Anahtar Kelimeler</label>
                                <input type="text" value="<?= $site_tags;?>" name="site_tags" class="form-control">
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <label class="imagecheck mb-12">
                                        <figure class="imagecheck-figure">
                                            <img class="imagecheck-image hoverZoomLink" src="<?= base_url('assets/upload/').$site_logo;?>" style="width: 65px;">
                                        </figure>
                                    </label>
                                </div>
                                <div class="form-group col-md-11">
                                    <label>Logo</label>
                                    <div class="custom-file">
                                        <input type="file" name="site_logo" class="custom-file-input" id="site_logo">
                                        <label class="custom-file-label">Resim Seç</label>
                                    </div>
                                    <?= form_error('site_logo','<small class="text-danger">','</small>');?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-1">
                                    <label class="imagecheck mb-12">
                                        <figure class="imagecheck-figure">
                                            <img class="imagecheck-image hoverZoomLink" src="<?= base_url('assets/upload/').$site_fav;?>" style="width: 65px;">
                                        </figure>
                                    </label>
                                </div>
                                <div class="form-group col-md-11">
                                    <label>Fav Icon</label>
                                    <div class="custom-file">
                                        <input type="file" name="site_fav" class="custom-file-input" id="site_fav">
                                        <label class="custom-file-label">Resim Seç</label>
                                    </div>
                                    <?= form_error('site_fav','<small class="text-danger">','</small>');?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
