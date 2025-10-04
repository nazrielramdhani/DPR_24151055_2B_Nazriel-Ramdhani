<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Daftar Komponen Gaji & Tunjangan</h2>
    <?php if (session()->get('user')['role'] === 'Admin'): ?>
        <a href="/komponen/create" class="btn btn-primary">Tambah Komponen</a>
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
            <th>ID Komponen</th>
            <th>Nama Komponen</th>
            <th>Kategori</th>
            <th>Jabatan</th>
            <th>Nominal</th>
            <th>Satuan</th>
            <?php if (session()->get('user')['role'] === 'Admin'): ?>
                <th>Aksi</th>
            <?php endif; ?>
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
                <?php if (session()->get('user')['role'] === 'Admin'): ?>
                    <td>
                        <a href="/komponen/edit/<?= $k['id_komponen_gaji'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="/komponen/delete/<?= $k['id_komponen_gaji'] ?>" method="post" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
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