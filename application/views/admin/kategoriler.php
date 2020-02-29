<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategori Ekle</h4>
                        </div>
                        <form action="<?= base_url();?>panel/kategori_ekle" method="post">
                            <div class="card-body">
                                    <div class="form-group">
                                        <label>Adı</label>
                                        <input type="text" placeholder="Menü Adı" name="adi" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" placeholder="link - Boş bırakırsanız otomatik oluşur" name="link" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Anahtar Kelimeler</label>
                                        <input type="text" placeholder="Anahtar Kelimeler" name="anahtar_kelimeler" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Açıklama</label>
                                        <textarea placeholder="Açıklama" name="aciklama" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 171px;"></textarea>
                                    </div>
                            </div>
                            <div class="card-footer bg-whitesmoke br">
                                <button type="submit" class="btn btn-primary">Ekle</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Kategoriler</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <?= $this->session->flashdata('result'); ?>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Adı</th>
                                        <th>Düzenleme</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(is_array($results) && count($results) > 0): foreach ($results as $rows) :?>
                                        <tr>
                                            <td>
                                                <?= $rows->id;?>
                                            </td>
                                            <td>
                                                <?= $rows->adi;?>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Detaylar
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <a href="<?= base_url()."panel/kategori_duzenle/".$rows->id;?>" class="btn">
                                                            <i class="far fa-edit"></i>  Düzenle
                                                        </a>
                                                        <br>
                                                        <a href="<?= base_url();?>panel/kategori_sil/<?= $rows->id;?>" class="btn">
                                                            <i class="fas fa-trash"></i> Sil
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="buttons">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <?= $links; ?>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>