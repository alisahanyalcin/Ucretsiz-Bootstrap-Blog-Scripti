<div class="container formpage">
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="fas fa-envelope"></i> İletişim</h4>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <?= $this->session->flashdata('sonuc');?>
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="name" placeholder="Adınız" value="">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="mail" placeholder="adınız@gmail.com" value="">
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="mesaage" rows="3" placeholder="İletişime Geçme Sebebiniz.."></textarea>
                        </div>
                        <div class="form-group">
                            <?= $widget;?>
                            <?= $script;?>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">
                                İletişime Geç
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
