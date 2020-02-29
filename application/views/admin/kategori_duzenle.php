<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Kategori Düzenle</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <?php foreach ($getIdKategori as $row) {?>
                            <div class="form-group">
                                <label>Adı</label>
                                <input type="hidden" value="<?= $row->id;?>" name="id">
                                <input type="text" value="<?= $row->adi;?>" name="adi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" value="<?= $row->link;?>" name="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Anahtar Kelimeler</label>
                                <input type="text" value="<?= $row->anahtar_kelimeler;?>" name="anahtar_kelimeler" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea placeholder="Açıklama" name="aciklama" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"><?= $row->aciklama;?></textarea>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke">
                            <button type="submit" class="btn btn-primary">Güncelle</button>
                        </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>