<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Ubah Data Penggajian</h2>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<form action="/penggajian/update" method="post">
    <?= csrf_field() ?>
    <input type="hidden" name="id_anggota_old" value="<?= esc($selected['id_anggota']) ?>">
    <input type="hidden" name="id_komponen_old" value="<?= esc($selected['id_komponen_gaji']) ?>">

    <div class="mb-3">
        <label for="id_anggota" class="form-label">Pilih Anggota</label>
        <select name="id_anggota" id="id_anggota" class="form-select" required>
            <option value="">-- Pilih Anggota --</option>
            <?php foreach ($anggota as $a): ?>
                <?php
                $full = trim(($a['gelar_depan'] ?? '') . ' ' . $a['nama_depan'] . ' ' . $a['nama_belakang'] . ' ' . ($a['gelar_belakang'] ?? ''));
                $label = $a['id_anggota'] . ' - ' . $full . ' (' . $a['jabatan'] . ')';
                ?>
                <option value="<?= esc($a['id_anggota']) ?>" <?= $selected['id_anggota'] == $a['id_anggota'] ? 'selected' : '' ?>>
                    <?= esc($label) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="id_komponen_gaji" class="form-label">Pilih Komponen Gaji</label>
        <select name="id_komponen_gaji" id="id_komponen_gaji" class="form-select" required>
            <option value="">-- Pilih Komponen --</option>
            <?php foreach ($komponen as $k): ?>
                <?php $label = $k['nama_komponen'] . ' — ' . $k['jabatan'] . ' — ' . number_format($k['nominal'], 2, ',', '.'); ?>
                <option value="<?= esc($k['id_komponen_gaji']) ?>" <?= $selected['id_komponen_gaji'] == $k['id_komponen_gaji'] ? 'selected' : '' ?>>
                    <?= esc($label) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="/penggajian" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>