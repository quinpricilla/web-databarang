<?= $this->extend('tema/tema'); ?>
<?= $this->section('konten'); ?>
    <div class="row mt-3 justify-content-center">

<?php foreach ($posting as $c) : ?>
    <div class="col-sm-3 mx-2 my-2">
    <div class="card" style="width: 18rem;">
        <img src="assets/img/<?= $c['gambar'] ?>" class="card-img-top" height="150px">
<div class="card-body">
    <h5 class="card-title"><?= $c['judul'] ?></h5>
        <p class="card-text"><?php $teks = $c['deskripsi'];
        echo substr($teks, 0, 50) . 
            '...'; ?></p>
            
<a href="<?= $c['link'] ?>" target="_blank"
    class="btn btn-primary">Read More</a>
</div>
</div>
</div>
    <?php endforeach ?>
</div>
    <?= $this->endSection(); ?>
