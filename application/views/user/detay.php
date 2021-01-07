<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h1 class="mt-4">
                <?= $name;?>
            </h1>
            <p class="lead">
                <?= $date;?>, <a href="<?= base_url()."kategori/".$this->UserGetModel->getIdKatLink($category);?>"><?= $this->UserGetModel->getIdKategori($category);?></a>
            </p>
            <hr>
            <img class="img-fluid rounded" src="<?= $highlighted;?>" alt="<?= $name;?>">
            <hr>
            
            <p><?= $content;?></p>
            <hr>

            <?php
                if($yorumsay==0):
                    echo '<div class="alert alert-success">Henüz hiç yorum yapılmamış, ilk yorum yapan sen ol!</div>';
                else:
                    foreach ($getBlogYorum as $yorum) : ?>
                    <div class="media mb-4">
                        <img class="d-flex mr-3 rounded-circle" style="width: 55px;" src="<?=base_url()."assets/upload/pp/".$yorum->profil;?>">
                        <div class="media-body">
                            <h5 class="mt-0"><?= $yorum->ad;?></h5>
                            <?= $yorum->yorum;?>
                        </div>
                    </div>
                <?php endforeach; endif; ?>

            <div class="card my-4">
                <h5 class="card-header">Yorum Yap</h5>
                <div class="card-body">
                    <form action="<?= base_url()."yorum_yap";?>" method="post">
                        <?= $this->session->flashdata('sonuc');?>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Adınız</label>
                                <input type="text" name="ad" placeholder="Adınız" class="form-control">
                                <input type="hidden" name="id" value="<?=$id;?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Mail Adresiniz</label>
                                <input type="email" name="mail" placeholder="Mail Adresiniz" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Yorumunuz</label>
                            <textarea name="yorum" placeholder="Yorumunuz" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <?= $widget;?>
                            <?= $script;?>
                        </div>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ara
                </div>
                <div class="card-body">
                    <form action="<?= base_url('ara');?>" method="get">
                        <div class="input-group">
                                <input type="text" class="form-control" name="s" placeholder="Ara...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="submit"><i class="las la-search"></i></button>
                                </span>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Kategoriler
                </div>
                <ul class="list-group list-group-flush">
                    <?php if(is_array($getKategoriler) && count($getKategoriler) > 0):
                        foreach ($getKategoriler as $rows) :
                            ?>
                            <li class="list-group-item">
                                <a href="<?= base_url()."kategori/".$rows->link;?>">
                                    <?= $rows->adi;?>
                                </a>
                            </li>
                        <?php endforeach; endif; ?>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    Rastgele Yazılar
                </div>
                <ul class="list-group list-group-flush">
                    <?php if(is_array($getRastgeleBlog) && count($getRastgeleBlog) > 0):
                        foreach ($getRastgeleBlog as $rows) : ?>
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
