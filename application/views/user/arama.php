<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php if(is_array($results) && count($results) > 0):
                foreach ($results as $rows) :?>
                    <div class="card">
                        <img class="card-img-top" src="<?= base_url()."assets/upload/".$rows->gorsel;?>" alt="<?= $rows->adi;?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= $rows->adi;?></h5>
                            <p class="card-text">
                                <?= $rows->ozet;?>
                            </p>
                            <a href="<?= base_url().$rows->link;?>" class="btn btn-primary">Devamını Oku</a>
                        </div>
                        <div class="card-footer text-muted">
                            <?= time_ago($rows->tarih);?>, <?= $this->UserGetModel->getIdKategori($rows->kategori);?>
                        </div>
                    </div>
                <?php
                endforeach;
            else: ?>
                <div class="alert alert-warning" role="alert">
                    <?=$kelime;?> kelimesi ile eşleşen hiç b,r sonuç bulunamadı. Farklı bir anahtar kelime ile arama yapabilir ya da <a href="<?= base_url();?>">Anasayfaya</a> dönebilirsiniz.
                </div>
            <?php endif;?>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ara
                </div>
                <div class="card-body">
                    <form action="<?= base_url('ara');?>" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control" name="s" placeholder="Ara..." value="<?=$kelime;?>">
                            <span class="input-group-btn">
                                    <button class="btn btn-secondary" type="submit"><i class="las la-search"></i></button>
                                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Rastgele Yazılar
                </div>
                <ul class="list-group list-group-flush">
                    <?php if(is_array($getRastgeleBlog) && count($getRastgeleBlog) > 0):
                        foreach ($getRastgeleBlog as $rows) :
                            ?>
                            <li class="list-group-item">
                                <a href="<?= base_url().$rows->link;?>">
                                    <?= $rows->adi;?>
                                </a>
                            </li>
                        <?php endforeach; endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>