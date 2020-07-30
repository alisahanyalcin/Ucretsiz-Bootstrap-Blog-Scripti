<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="description" content="<?= $description;?>">
    <meta name="keywords" content="<?= $tags;?>">
    <link href="<?= base_url()?>assets/upload/<?= $fav;?>" rel="shortcut icon"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/style.css"">
    <title><?= $title;?></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= base_url()?>"><?= $site_adi;?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="las la-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="menu">
        <div class="navbar-nav">
            <?php foreach ($getMenu as $row) : ?>
                <a class="nav-item nav-link" href="<?=$row->link;?>"><?= $row->yazi;?></a>
            <?php endforeach;?>
        </div>
    </div>
</nav>
