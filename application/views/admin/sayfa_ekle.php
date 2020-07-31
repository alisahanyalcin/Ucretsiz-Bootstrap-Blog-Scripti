<script src="<?= base_url('assets/ckeditor/ckeditor.js')?> "></script>
<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Yazı Ekle</h4>
                    </div>
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <?= $this->session->flashdata('result'); ?>
                            <div class="form-group">
                                <label>Başlık</label>
                                <input type="text" placeholder="Başlık" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>İçerik</label>
                                <textarea placeholder="İçerik" name="content" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Anahtar Kelimeler</label>
                                <input type="text" placeholder="Anahtar Kelimeler" name="tags" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Açıklama</label>
                                <textarea placeholder="Açıklama" name="description" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
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
    CKEDITOR.replace( 'content', {
        filebrowserImageUploadUrl: "<?=base_url();?>panel/image_upload?type=image&CKEditorFuncNum=1",
    } );
</script>
