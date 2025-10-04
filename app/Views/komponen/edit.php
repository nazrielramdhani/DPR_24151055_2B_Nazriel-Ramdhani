<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2>Edit Komponen Gaji & Tunjangan</h2>

<form action="/komponen/update/<?= $komponen['id_komponen_gaji'] ?>" method="post" class="mt-4">

    <div class="mb-3">
        <label for="nama_komponen" class="form-label">Nama Komponen</label>
        <input type="text" name="nama_komponen" id="nama_komponen" class="form-control"
               value="<?= esc($komponen['nama_komponen']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
            <option value="Gaji Pokok" <?= $komponen['kategori'] === 'Gaji Pokok' ? 'selected' : '' ?>>Gaji Pokok</option>
            <option value="Tunjangan Melekat" <?= $komponen['kategori'] === 'Tunjangan Melekat' ? 'selected' : '' ?>>Tunjangan Melekat</option>
            <option value="Tunjangan Lain" <?= $komponen['kategori'] === 'Tunjangan Lain' ? 'selected' : '' ?>>Tunjangan Lain</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="jabatan" class="form-label">Jabatan</label>
        <select name="jabatan" id="jabatan" class="form-select" required>
            <option value="Ketua" <?= $komponen['jabatan'] === 'Ketua' ? 'selected' : '' ?>>Ketua</option>
            <option value="Wakil Ketua" <?= $komponen['jabatan'] === 'Wakil Ketua' ? 'selected' : '' ?>>Wakil Ketua</option>
            <option value="Anggota" <?= $komponen['jabatan'] === 'Anggota' ? 'selected' : '' ?>>Anggota</option>
            <option value="Semua" <?= $komponen['jabatan'] === 'Semua' ? 'selected' : '' ?>>Semua</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="nominal" class="form-label">Nominal</label>
        <input type="number" name="nominal" id="nominal" step="0.01" class="form-control"
               value="<?= esc($komponen['nominal']) ?>" required>
    </div>

    <div class="mb-3">
        <label for="satuan" class="form-label">Satuan</label>
        <select name="satuan" id="satuan" class="form-select" required>
            <option value="Bulan" <?= $komponen['satuan'] === 'Bulan' ? 'selected' : '' ?>>Bulan</option>
            <option value="Hari" <?= $komponen['satuan'] === 'Hari' ? 'selected' : '' ?>>Hari</option>
            <option value="Periode" <?= $komponen['satuan'] === 'Periode' ? 'selected' : '' ?>>Periode</option>
        </select>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="/komponen" class="btn btn-secondary">Batal</a>
</form>

<?= $this->endSection() ?>
