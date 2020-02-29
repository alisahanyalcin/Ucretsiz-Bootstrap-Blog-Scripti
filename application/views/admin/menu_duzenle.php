<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Menü Düzenle</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <?php foreach ($getIdMenu as $row) :?>
                            <div class="form-group">
                                <label>Adı</label>
                                <input type="hidden" value="<?= $row->id;?>" name="id">
                                <input type="text" value="<?= $row->yazi;?>" name="adi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" value="<?= $row->link;?>" name="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sıra</label>
                                <input type="number" value="<?= $row->sira;?>" name="sira" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                        <?php endforeach; ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>