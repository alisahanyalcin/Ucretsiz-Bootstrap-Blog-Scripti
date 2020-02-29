<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-light" role="alert">
                        <b>1-</b> Dış linkte link seçeneğinde <b>dış linki</b> tam yazmanız gerekmektedir.<br>
                        <b>2-</b> Site içi link seçeneğinde link başına otomatik <b>site linki</b> eklenmektedir.<br>
                        <b>3-</b> Site içi sayfa seçeneğinde link başına otomatik <b>site linki</b> ve <b>sayfa/</b> ön eki eklenmektedir.
                    </div>
                </div>
                <div class="col-12 col-md-4 col-lg-4">
                    <div class="card">
                        <div class="card-header">
                            <h4>Menü Ekle</h4>
                        </div>
                        <form action="<?= base_url();?>panel/menu_ekle" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Adı</label>
                                    <input type="text" placeholder="Adı" name="adi" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Link Tipi</label>
                                    <select class="form-control" name="link_tipi">
                                        <option value='0'>Dış Link</option>
                                        <option value='1'>Site İçi Link</option>
                                        <option value='2'>Site İçi Sayfa</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Link</label>
                                    <input type="text" placeholder="link - Boş bırakırsanız otomatik oluşur" name="link" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Sıra</label>
                                    <input type="number" placeholder="Sıra" name="sira" class="form-control">
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
                            <h4>Menüler</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <?= $this->session->flashdata('result'); ?>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sıra</th>
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
                                                <?= $rows->sira;?>
                                            </td>
                                            <td>
                                                <?= $rows->yazi;?>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Detaylar
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <a href="<?= base_url()."panel/menu_duzenle/".$rows->id;?>" class="btn">
                                                            <i class="far fa-edit"></i>  Düzenle
                                                        </a>
                                                        <br>
                                                        <a href="<?= base_url();?>panel/menu_sil/<?= $rows->id;?>" class="btn">
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