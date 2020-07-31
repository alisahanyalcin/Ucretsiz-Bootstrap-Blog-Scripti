<script src="<?= base_url('assets/ckeditor/ckeditor.js')?> "></script>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Blog Ekle</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <div class="form-group">
                                <label>Adı</label>
                                <input type="text" placeholder="Adı" name="adi" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>link</label>
                                <input type="text" placeholder="Boş bırakırsanız otomatik oluşur" name="link" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Önce Çıkartılmış Görsel</label>
                                <div class="custom-file">
                                    <input type="file" name="gorsel" class="custom-file-input" id="gorsel">
                                    <label class="custom-file-label">Choose File</label>
                                </div>
                                <small class="text-info" style="font-size: 100%">gif | jpg | png | jpeg | webp | svg</small>
                                <?= form_error('gorsel','<small class="text-danger">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select class="form-control" name="kategori">
                                    <?php
                                    $getKatlar = $this->GetModel->getKatlar();
                                    foreach ($getKatlar as $kat) : ?>
                                        <option value='<?= $kat->id;?>'><?= $kat->adi;?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Özet</label>
                                <textarea placeholder="Özet" name="ozet" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>İçerik</label>
                                <textarea placeholder="İçerik" name="icerik" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
                            </div>
                            <div class="section-title mt-0">
                                Seo Ayarları
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea placeholder="Açıklama" name="aciklama" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Anahtar Kelimeler</label>
                                <input type="text" placeholder="Anahtar Kelimeler" name="anahtar_kelimeler" class="form-control">
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke br">
                            <button type="submit" class="btn btn-primary">Ekle</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<script type="text/javascript">
    CKEDITOR.replace( 'icerik', {
        filebrowserImageUploadUrl: "<?=base_url();?>panel/image_upload?type=image&CKEditorFuncNum=1",
    } );
</script>
