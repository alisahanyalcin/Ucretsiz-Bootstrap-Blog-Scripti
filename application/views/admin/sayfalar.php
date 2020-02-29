<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Sayfalar</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url();?>panel/sayfa_ekle" class="btn btn-primary">Yeni Ekle <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <?= $this->session->flashdata('result'); ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adı</th>
                                    <th>Anahtar Kelimeler</th>
                                    <th>Açıklama</th>
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
                                            <?= $rows->anahtar_kelimeler;?>
                                        </td>
                                        <td>
                                            <?= $rows->aciklama;?>
                                        </td>
                                        <td>
                                            <div class="dropdown d-inline">
                                                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Detaylar
                                                </button>
                                                <div class="dropdown-menu" x-placement="bottom-start">
                                                    <a href="<?= base_url()."panel/sayfa_duzenle/".$rows->id;?>" class="btn">
                                                        <i class="far fa-edit"></i>  Düzenle
                                                    </a>
                                                    <br>
                                                    <a href="<?= base_url();?>panel/sayfa_sil/<?= $rows->id;?>" class="btn">
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
    </section>
</div>