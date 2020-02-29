<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Hesap Ayarları</h4>
                    </div>
                        <form action="" method="post">
                            <div class="card-body">
                                <?= $this->session->flashdata('result'); ?>
                                <div class="form-group">
                                    <label>Kullanıcı Adı</label>
                                    <input type="text" value="<?= $user_name;?>" class="form-control" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Şuanki Şifre</label>
                                    <input type="password" placeholder="Şuanki Şifre" name="current_password" class="form-control">
                                    <?= form_error('current_password','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <label>Yeni Şifre</label>
                                    <input type="password" placeholder="Yeni Şifre" name="new_password" class="form-control">
                                    <?= form_error('new_password','<small class="text-danger">','</small>');?>
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