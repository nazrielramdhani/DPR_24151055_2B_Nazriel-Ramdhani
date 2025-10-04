<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Data Anggota DPR</h2>
    <a href="/anggota/create" class="btn btn-primary">Tambah Anggota</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="thead-dark">
        <tr>
            <th>Id_anggota</th>
            <th>Nama Lengkap</th>
            <th>Jabatan</th>
            <th>Status</th>
            <th>Jumlah Anak</th>
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
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>