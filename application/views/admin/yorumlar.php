<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Yorumlar</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <?= $this->session->flashdata('result'); ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Profil</th>
                                            <th>Adı</th>
                                            <th>Mail</th>
                                            <th>Yorumu</th>
                                            <th>Makale</th>
                                            <th>Tarih</th>
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
                                                <img style="width: 35px;border-radius: 50%;" src="<?= base_url()?>assets/upload/pp/<?= $rows->profil;?>">
                                            </td>
                                            <td>
                                                <?= $rows->ad;?>
                                            </td>
                                            <td>
                                                <?= $rows->mail;?>
                                            </td>
                                            <td>
                                                <?= $rows->yorum;?>
                                            </td>
                                            <td>
                                                <a href="<?= base_url().$this->GetModel->getIdBlogLink($rows->blog_id);?>"><?= $this->GetModel->getIdBlogAdi($rows->blog_id);?></a>
                                            </td>
                                            <td>
                                                <?= $rows->tarih;?>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline">
                                                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Detaylar
                                                    </button>
                                                    <div class="dropdown-menu" x-placement="bottom-start">
                                                        <?php
                                                        if ($rows->durum == 0){ ?>
                                                        <a href="<?= base_url()."panel/yorum_onayla/".$rows->id;?>" class="btn">
                                                            <i class="far fa-eye"></i>  Görünürlüğü Aç
                                                        </a><br>
                                                        <?php }else{ ?>
                                                        <a href="<?= base_url()."panel/yorum_gizle/".$rows->id;?>" class="btn">
                                                            <i class="far fa-eye-slash"></i>   Görünürlüğü kapat
                                                        </a><br>
                                                        <?php }?>
                                                        <a href="<?= base_url();?>panel/yorum_sil/<?= $rows->id;?>" class="btn">
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