<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<div class="mb-4">
  <h2>Detail Penggajian Anggota DPR</h2>
  <a href="/penggajian" class="btn btn-secondary mt-2">← Kembali</a>
</div>

<div class="card mb-4">
  <div class="card-body">
    <h4><?= esc(trim(($anggota['gelar_depan'] ?? '') . ' ' . $anggota['nama_depan'] . ' ' . $anggota['nama_belakang'] . ' ' . ($anggota['gelar_belakang'] ?? ''))) ?></h4>
    <p><strong>Jabatan:</strong> <?= esc($anggota['jabatan']) ?></p>
    <p><strong>Status Pernikahan:</strong> <?= esc($anggota['status_pernikahan']) ?></p>
    <p><strong>Jumlah Anak:</strong> <?= esc($anggota['jumlah_anak']) ?></p>
  </div>
</div>

<h5>Komponen Gaji</h5>
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>No</th>
      <th>Nama Komponen</th>
      <th>Kategori</th>
      <th>Jabatan</th>
      <th>Nominal</th>
      <th>Satuan</th>
    </tr>
  </thead>
  <tbody>
    <?php if (empty($detailKomponen)): ?>
      <tr><td colspan="6" class="text-center">Belum ada data komponen gaji.</td></tr>
    <?php else: ?>
      <?php foreach ($detailKomponen as $i => $k): ?>
        <tr>
          <td><?= $i + 1 ?></td>
          <td><?= esc($k['nama_komponen']) ?></td>
          <td><?= esc($k['kategori']) ?></td>
          <td><?= esc($k['jabatan']) ?></td>
          <td><?= number_format($k['nominal'], 0, ',', '.') ?></td>
          <td><?= esc($k['satuan']) ?></td>
        </tr>
      <?php endforeach; ?>
    <?php endif; ?>
  </tbody>
  <tfoot class="table-secondary">
    <tr>
      <th colspan="4" class="text-end">Total</th>
      <th colspan="2"><?= number_format($total, 0, ',', '.') ?></th>
    </tr>
  </tfoot>
</table>

<?= $this->endSection() ?>
