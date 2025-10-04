<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Penggajian</h2>
    <?php if (session()->get('user')['role'] === 'Admin'): ?>
        <a href="/penggajian/create" class="btn btn-primary">Tambah Data Penggajian</a>
    <?php endif; ?>
</div>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<table class="table table-bordered table-striped mt-3">
  <thead class="table-dark">
    <tr>
      <th>ID Penggajian</th>
      <th>Nama Anggota</th>
      <th>Jabatan</th>
      <th>Komponen Gaji</th>
      <th>Kategori</th>
      <th>Nominal</th>
      <th>Satuan</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($penggajian)): ?>
      <tr><td colspan="7" class="text-center">Belum ada data penggajian</td></tr>
    <?php else: ?>
      <?php foreach ($penggajian as $i => $row): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= esc($row['nama_anggota']) ?></td>
          <td><?= esc($row['jabatan']) ?></td>
          <td><?= esc($row['nama_komponen']) ?></td>
          <td><?= esc($row['kategori']) ?></td>
          <td><?= number_format($row['nominal'], 0, ',', '.') ?></td>
          <td><?= esc($row['satuan']) ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
</table>

<?= $this->endSection() ?>
