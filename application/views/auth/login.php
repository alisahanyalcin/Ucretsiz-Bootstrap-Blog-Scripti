<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="card card-primary">
                        <div class="card-header"><h4>Giriş Yap</h4></div>

                        <div class="card-body">
                            <form method="POST" action="" class="needs-validation" novalidate="">
                                <?= $this->session->flashdata('result'); ?>
                                <div class="form-group">
                                    <label for="admin_user_name">Kullanıcı Adınız</label>
                                    <input id="admin_user_name" placeholder="Kullanıcı Adınız" type="text" class="form-control" name="admin_user_name" value="<?= set_value('admin_user_name');?>" tabindex="1" autofocus>
                                    <?= form_error('admin_user_name','<small class="text-danger">','</small>');?>
                                </div>

                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="admin_password" class="control-label">Şifreniz</label>
                                    </div>
                                    <input id="admin_sifre" placeholder="Şifreniz" type="password" class="form-control" name="admin_password" value="<?= set_value('admin_password');?>" tabindex="2">
                                    <?= form_error('admin_password','<small class="text-danger">','</small>');?>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                        Giriş Yap
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>