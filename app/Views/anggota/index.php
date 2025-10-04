<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Anggota DPR</h2>
    <?php if (session()->get('user')['role'] === 'Admin'): ?>
        <a href="/anggota/create" class="btn btn-primary">Tambah Anggota</a>
    <?php endif; ?>
</div>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID Anggota</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Jumlah Anak</th>
            <?php if (session()->get('user')['role'] === 'Admin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($anggota as $a): ?>
            <tr>
                <td><?= esc($a['id_anggota']) ?></td>
                <td>
                    <?= esc($a['gelar_depan']) . ' ' . esc($a['nama_depan']) . ' ' . esc($a['nama_belakang']) . ' ' . esc($a['gelar_belakang']) ?>
                </td>
                <td><?= esc($a['jabatan']) ?></td>
                <td><?= esc($a['status_pernikahan']) ?></td>
                <td><?= esc($a['jumlah_anak']) ?></td>
                <?php if (session()->get('user')['role'] === 'Admin'): ?>
                    <td>
                        <a href="/anggota/edit/<?= $a['id_anggota'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/anggota/delete/<?= $a['id_anggota'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>