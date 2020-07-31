<script src="<?= base_url('assets/ckeditor/ckeditor.js')?> "></script>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sayfa Düzenle</h4>
                    </div>
                    <form action="" method="post">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <?php foreach ($getIdSayfa as $rows) {?>
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="hidden" value="<?= $rows->id;?>" name="id">
                                <input type="text" value="<?= $rows->adi;?>" name="name" class="form-control">
                            </div>
                                <div class="form-group">
                                    <label>İçerik</label>
                                    <textarea placeholder="İçerik" name="content" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"><?= $rows->icerik;?></textarea>
                                </div>
                            <div class="form-group">
                                <label>Anahtar kelimeler</label>
                                <input type="text" value="<?= $rows->anahtar_kelimeler;?>" name="keywords" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea type="text" name="description" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 121px;"><?= $rows->aciklama;?></textarea>
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
        </div>
    </section>
</div>

<script type="text/javascript">
    CKEDITOR.replace( 'content', {
        filebrowserImageUploadUrl: "<?=base_url();?>panel/image_upload?type=image&CKEditorFuncNum=1",
    } );
</script>
