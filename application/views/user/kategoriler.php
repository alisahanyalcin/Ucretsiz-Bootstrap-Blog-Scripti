<div class="container">
    <h1 class="mt-4">
        <?= $baslik;?>
    </h1>
    <div class="row">
        <div class="col-md-12">
            <?php if(is_array($getKategoriler) && count($getKategoriler) > 0):
                foreach ($getKategoriler as $rows) :?>
                    <div class="card">
                        <div class="card-body">
                            <a href="<?= base_url()."kategori/".$rows->link;?>" class="btn btn-primary" style="width:100%;text-align:center;"> <?= $rows->adi;?> Kategorisi</a>
                        </div>
                    </div>
            <?php
                endforeach;
            else: ?>
                <div class="alert alert-warning" role="alert">
                    Henüz hiç Kategori eklenmemiş.
                </div>
            <?php endif;?>
        </div>
    </div>
</div>