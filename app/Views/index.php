<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card-header">
    <?= $title; ?>
</div>
<div class="card-body">
    <?= $data; ?>
</div>
<?= $this->endSection() ?>