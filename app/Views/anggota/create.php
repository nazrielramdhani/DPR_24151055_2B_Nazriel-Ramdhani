<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Tambah Anggota DPR<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card shadow p-4">
    <h3 class="mb-4">Tambah Anggota DPR</h3>
    <form method="post" action="/anggota/store">
        <div class="mb-3">
            <label class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Gelar Depan</label>
            <input type="text" name="gelar_depan" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Gelar Belakang</label>
            <input type="text" name="gelar_belakang" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <select name="jabatan" class="form-select" required>
                <option value="">-- Pilih Jabatan --</option>
                <option value="Ketua">Ketua</option>
                <option value="Wakil Ketua">Wakil Ketua</option>
                <option value="Anggota">Anggota</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Status Pernikahan</label>
            <select name="status_pernikahan" class="form-select" required>
                <option value="">-- Pilih Status --</option>
                <option value="Kawin">Kawin</option>
                <option value="Belum Kawin">Belum Kawin</option>
                <option value="Cerai Hidup">Cerai Hidup</option>
                <option value="Cerai Mati">Cerai Mati</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah Anak</label>
            <input type="number" name="jumlah_anak" class="form-control" value="0" min="0">
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/dashboard" class="btn btn-secondary">Kembali</a>
    </form>
</div>
<?= $this->endSection() ?>