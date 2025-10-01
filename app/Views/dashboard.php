<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow p-4">
    <h2 class="mb-3">
        Selamat datang, <?= esc($user['nama_depan']) ?> <?= esc($user['nama_belakang']) ?>
    </h2>
    <p class="mb-0">Role: <span class="badge bg-primary"><?= esc($user['role']) ?></span></p>
</div>
<?= $this->endSection() ?>