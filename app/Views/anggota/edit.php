<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-4">Ubah Data Anggota</h2>

<form action="/anggota/update/<?= $anggota['id_anggota'] ?>" method="post" class="card p-4 shadow-sm">
    <div class="row">
        <div class="col-md-6 mb-3">
            <label>Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" value="<?= esc($anggota['nama_depan']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" value="<?= esc($anggota['nama_belakang']) ?>" required>
        </div>
        <div class="col-md-6 mb-3">
            <label>Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control" value="<?= esc($anggota['gelar_depan']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control" value="<?= esc($anggota['gelar_belakang']) ?>">
        </div>
        <div class="col-md-6 mb-3">
            <label>Jabatan</label>
            <select name="jabatan" class="form-select" required>
                <option value="Ketua" <?= $anggota['jabatan'] === 'Ketua' ? 'selected' : '' ?>>Ketua</option>
                <option value="Wakil Ketua" <?= $anggota['jabatan'] === 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
                <option value="Anggota" <?= $anggota['jabatan'] === 'Anggota' ? 'selected' : '' ?>>Anggota</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label>Status Pernikahan</label>
            <select name="status_pernikahan" class="form-select" required>
                <option value="Kawin" <?= $anggota['status_pernikahan'] === 'Kawin' ? 'selected' : '' ?>>Kawin</option>
                <option value="Belum Kawin" <?= $anggota['status_pernikahan'] === 'Belum Kawin' ? 'selected' : '' ?>>Belum Kawin</option>
                <option value="Cerai Hidup" <?= $anggota['status_pernikahan'] === 'Cerai Hidup' ? 'selected' : '' ?>>Cerai Hidup</option>
                <option value="Cerai Mati" <?= $anggota['status_pernikahan'] === 'Cerai Mati' ? 'selected' : '' ?>>Cerai Mati</option>
            </select>
        </div>
        <div class="col-md-6 mb-3">
            <label>Jumlah Anak</label>
            <input type="number" name="jumlah_anak" class="form-control" value="<?= esc($anggota['jumlah_anak']) ?>" min="0">
        </div>
    </div>
    <div class="text-end">
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="/anggota" class="btn btn-secondary">Kembali</a>
    </div>
</form>

<?= $this->endSection() ?>