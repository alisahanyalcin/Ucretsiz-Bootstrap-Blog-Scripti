<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-check-double"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Tüm Yazılar</h4>
                        </div>
                        <div class="card-body"><?= $getHepsi;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Aktif Yazılar</h4>
                        </div>
                        <div class="card-body"><?= $getAktifler;?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pasif Yazılar</h4>
                        </div>
                        <div class="card-body"><?= $getPasifler;?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Son 30 İletişim Mesajları</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table-invoice">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>İsim</th>
                                        <th>Mail</th>
                                        <th>Mesaj</th>
                                        <th>Tarih</th>
                                        <th>IP</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    if(is_array($getLast30Iletisim) && count($getLast30Iletisim) > 0):
                                        foreach ($getLast30Iletisim as $rows) : ?>
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
                                            </tr>
                                        <?php endforeach;endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>