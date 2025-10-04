<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow p-4 position-relative">
    <?php if ($user['role'] === 'Admin'): ?>
        <a href="/anggota/create"
            class="btn btn-success btn-sm position-absolute top-0 end-0 m-3">
            <i class="bi bi-person-plus"></i> Tambah Anggota
        </a>
    <?php endif; ?>

    <h2 class="mb-3">
        Selamat datang, <?= esc($user['nama_depan']) ?> <?= esc($user['nama_belakang']) ?>
    </h2>
    <p class="mb-0">Role: <span class="badge bg-primary"><?= esc($user['role']) ?></span></p>
</div>
<?= $this->endSection() ?>