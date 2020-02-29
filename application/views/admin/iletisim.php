<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>İletişim Mesajları</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-invoice">
                            <?= $this->session->flashdata('result'); ?>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Adı</th>
                                    <th>Mail</th>
                                    <th>Mesaj</th>
                                    <th>Tarih</th>
                                    <th>IP</th>
                                    <th>Düzenle</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if(is_array($results) && count($results) > 0): foreach ($results as $rows) :?>
                                    <tr>
                                        <td>
                                            <?= $rows->id;?>
                                        </td>
                                        <td>
                                            <?= $rows->isim_soyisim;?>
                                        </td>
                                        <td>
                                            <a href="mailto:<?= $rows->mail;?>"> <?= $rows->mail;?></a>
                                        </td>
                                        <td>
                                            <?= $rows->mesaj;?>
                                        </td>
                                        <td>
                                            <?= $rows->tarih;?>
                                        </td>
                                        <td>
                                            <?= $rows->ip;?>
                                        </td>
                                        <td>
                                            <a href="<?= base_url();?>panel/iletisim_sil/<?= $rows->id;?>" class="btn btn-danger">
                                                Sil
                                            </a>
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