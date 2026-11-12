<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h2 class="mb-3">📈 Laporan Penjualan per Produk</h2>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover table-bordered mb-0">
            <thead class="table-primary">
                <tr>
                    <th>Kode</th>
                    <th>Nama Produk</th>
                    <th class="text-end">Total Qty Terjual</th>
                    <th class="text-end">Total Nilai</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($rows)): ?>
                    <tr><td colspan="4" class="text-center text-muted py-3">Belum ada data.</td></tr>
                <?php else: ?>
                    <?php foreach ($rows as $r): ?>
                        <tr>
                            <td><code><?= esc($r['kode_produk']) ?></code></td>
                            <td><?= esc($r['nama_produk']) ?></td>
                            <td class="text-end"><?= esc($r['total_qty']) ?></td>
                            <td class="text-end">Rp <?= number_format((float)$r['total_nilai'], 0, ',', '.') ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>