<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-3">📊 Penjualan per Pelanggan</h2>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Kode</th>
                    <th>Nama Pelanggan</th>
                    <th class="text-end">Jumlah Transaksi</th>
                    <th class="text-end">Total Penjualan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($rows)): ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada data.</td></tr>
                <?php else: ?>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><code><?= esc($r['kode_pelanggan']) ?></code></td>
                            <td><?= esc($r['nama_pelanggan']) ?></td>
                            <td class="text-end"><?= esc($r['jumlah_transaksi']) ?></td>
                            <td class="text-end">Rp <?= number_format((float)$r['total_penjualan'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>