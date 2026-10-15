
<?php
/**
 * @var array $transactions
 * @var int $totalData
 * @var int $totalPages
 * @var int $page
 * @var int $limit
 * @var string $search
 * @var string $type
 */

?>
<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php
$nomorAwal = (($page - 1) * $limit) + 1;

$queryParams = [
    'search' => $search,
    'type' => $type,
    'limit' => $limit
];
?>
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Data Transaksi</h3>
    
</div>
<form method="GET" action="<?= base_url('transaction') ?>" class="mb-3">
    <div class="row g-2">
        <div class="col-md-5">
            <input type="text" name="search" class="form-control" placeholder="Cari kode, nama barang, pengguna, atau catatan..." value="<?= e($search) ?>">
        </div>

        <div class="col-md-3">
            <select name="type" class="form-select">
                <option value="" <?= $type === '' ? 'selected' : '' ?>>
                    Semua Jenis
                </option>
                <option value="IN" <?= $type === 'IN' ? 'selected' : '' ?>>
                    Barang Masuk
                </option>
                <option value="OUT" <?= $type === 'OUT' ? 'selected' : '' ?>>
                    Barang Keluar
                </option>
            </select>
        </div>
        <div class="col-md-2">
            <select name="limit" class="form-select">
                <option value="5" <?= $limit == 5 ? 'selected' : '' ?>>
                    5 Data
                </option>
                <option value="10" <?= $limit == 10 ? 'selected' : '' ?>>
                    10 Data
                </option>
                <option value="25" <?= $limit == 25 ? 'selected' : '' ?>>
                    25 Data
                </option>
            </select>
        </div>

        <div class="col-md-2 d-grid">
            <button type="submit" class="btn btn-primary">
                Cari
            </button>
        </div>
    </div>
</form>
<a href="<?= base_url('transaction/create') ?>" class="btn btn-primary mb-2">
        + Tambah Transaksi
    </a>
<p class="text-muted">
    Total transaksi ditemukan:
    <strong><?= $totalData ?></strong>
</p>
<div class="table-responsive">
    <table class="table table-bordered table-striped align-middle">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Pengguna</th>
                <th>Jenis Transaksi</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (empty($transactions)): ?>
            <tr>
                <td colspan="8" class="text-center">
                    Data transaksi tidak ditemukan.
                </td>
            </tr>
        <?php else: ?>
            <?php foreach ($transactions as $i => $transaction): ?>
                <tr>
                    <td><?= $nomorAwal + $i ?></td>
                    <td>
                        <?= e($transaction['item_code'] ?? '-') ?>
                    </td>
                    <td>
                        <?= e($transaction['item_name'] ?? '-') ?>
                    </td>
                    <td>
                        <?= e($transaction['username'] ?? '-') ?>
                    </td>
                    <td>
                        <?php if ($transaction['type'] === 'IN'): ?>
                            <span class="badge bg-success">
                                Barang Masuk
                            </span>
                        <?php else: ?>
                            <span class="badge bg-danger">
                                Barang Keluar
                            </span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?= e($transaction['quantity']) ?>
                    </td>
                    <td>
                        <?= e($transaction['notes'] ?? '-') ?>
                    </td>
                    <td>
                        <div class="d-flex gap-2">
                            <a href="<?= base_url('transaction/edit/' . $transaction['id']) ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>
                            <a href="<?= base_url('transaction/delete/' . $transaction['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus transaksi ini?')">
                                Hapus
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<?php if ($totalData > 0 && $totalPages > 1): ?>
    <nav aria-label="Navigasi halaman transaksi">
        <ul class="pagination">
            <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                <?php
                $previousParams = $queryParams;
                $previousParams['page'] = max(1, $page - 1);
                ?>
                <!-- <a class="page-link" href="<?= e(base_url('transaction?' . http_build_query($previousParams))) ?>">
                    Sebelumnya
                </a> -->
            </li>
            <!-- Nomor halaman -->
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php
                $pageParams = $queryParams;
                $pageParams['page'] = $i;
                ?>
                <li class="page-item <?= $page == $i ? 'active' : '' ?>">
                    <a class="page-link"
                       href="<?= e(base_url('transaction?' . http_build_query($pageParams))) ?>">
                        <?= $i ?>
                    </a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?= $page >= $totalPages ? 'disabled' : '' ?>">
                <?php
                $nextParams = $queryParams;
                $nextParams['page'] = min($totalPages, $page + 1);
                ?>
                <!-- <a class="page-link"
                   href="<?= e(base_url('transaction?' . http_build_query($nextParams))) ?>">
                    Berikutnya
                </a> -->
            </li>
        </ul>
    </nav>
<?php endif; ?>
<?php require __DIR__ . '/../layouts/footer.php'; ?>
