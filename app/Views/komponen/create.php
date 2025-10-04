<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Tambah Komponen Gaji & Tunjangan</h2>

<form action="/komponen/store" method="post" class="mt-3">
    <?= csrf_field() ?>

    <div class="mb-3">
        <label class="form-label">Nama Komponen</label>
        <input type="text" name="nama_komponen" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori" class="form-select" required>
            <option value="Gaji Pokok">Gaji Pokok</option>
            <option value="Tunjangan Melekat">Tunjangan Melekat</option>
            <option value="Tunjangan Lain">Tunjangan Lain</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Jabatan</label>
        <select name="jabatan" class="form-select" required>
            <option value="Semua">Semua</option>
            <option value="Ketua">Ketua</option>
            <option value="Wakil Ketua">Wakil Ketua</option>
            <option value="Anggota">Anggota</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Nominal</label>
        <input type="number" step="0.01" name="nominal" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Satuan</label>
        <select name="satuan" class="form-select" required>
            <option value="Bulan">Bulan</option>
            <option value="Hari">Hari</option>
            <option value="Periode">Periode</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="/komponen" class="btn btn-secondary">Kembali</a>
</form>

<?= $this->endSection() ?>