<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Komponen Gaji & Tunjangan</h2>
    <a href="/komponen/create" class="btn btn-primary">Tambah Komponen</a>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Nama Komponen</th>
            <th>Kategori</th>
            <th>Jabatan</th>
            <th>Nominal</th>
            <th>Satuan</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($komponen as $k): ?>
            <tr>
                <td><?= esc($k['id_komponen_gaji']) ?></td>
                <td><?= esc($k['nama_komponen']) ?></td>
                <td><?= esc($k['kategori']) ?></td>
                <td><?= esc($k['jabatan']) ?></td>
                <td><?= number_format($k['nominal'], 2, ',', '.') ?></td>
                <td><?= esc($k['satuan']) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>