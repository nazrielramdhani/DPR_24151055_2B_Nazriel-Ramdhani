<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Tambah Data Penggajian</h2>

<?php if (session()->getFlashdata('success')): ?>
  <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
<?php endif; ?>

<?php if (session()->getFlashdata('error')): ?>
  <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="/penggajian/store" method="post" class="mt-3">
  <?= csrf_field() ?>

  <div class="mb-3">
    <label for="id_anggota" class="form-label">Pilih Anggota</label>
    <select name="id_anggota" id="id_anggota" class="form-select" required>
      <option value="">-- Pilih Anggota --</option>
      <?php foreach ($anggota as $a): ?>
        <?php
          $full = trim( ($a['gelar_depan'] ?? '') . ' ' . $a['nama_depan'] . ' ' . $a['nama_belakang'] . ' ' . ($a['gelar_belakang'] ?? '') );
          $label = $a['id_anggota'] . ' - ' . $full . ' (' . $a['jabatan'] . ')';
        ?>
        <option value="<?= esc($a['id_anggota']) ?>"><?= esc($label) ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="mb-3">
    <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
    <select name="id_komponen_gaji" id="id_komponen_gaji" class="form-select" required>
      <option value="">-- Pilih Komponen --</option>
      <?php foreach ($komponen as $k): ?>
        <?php $label = $k['nama_komponen'] . ' — ' . $k['jabatan'] . ' — ' . number_format($k['nominal'], 2, ',', '.'); ?>
        <option value="<?= esc($k['id_komponen_gaji']) ?>"><?= esc($label) ?></option>
      <?php endforeach; ?>
    </select>
    <div class="form-text">Catatan: sistem akan menolak komponen yang tidak sesuai jabatan saat submit.</div>
  </div>

  <button type="submit" class="btn btn-primary">Simpan</button>
  <a href="/penggajian" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>
