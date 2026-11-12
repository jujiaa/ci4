<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table      = 'pelanggan';
    protected $primaryKey = 'kode_pelanggan';

    public function agregasiPerPelanggan(): array
    {
        return $this->db->table('pelanggan c')
            ->select('c.kode_pelanggan, c.nama_pelanggan, COUNT(p.no_penjualan) AS jumlah_transaksi, COALESCE(SUM(p.total), 0) AS total_penjualan')
            ->join('penjualan p', 'c.kode_pelanggan = p.kode_pelanggan', 'left')
            ->groupBy('c.kode_pelanggan, c.nama_pelanggan')
            ->orderBy('c.kode_pelanggan')
            ->get()
            ->getResultArray();
    }

    public function laporanPerProduk(): array
    {
        return $this->db->table('produk pr')
            ->select('pr.kode_produk, pr.nama_produk, COALESCE(SUM(d.jumlah), 0) AS total_qty, COALESCE(SUM(d.subtotal), 0) AS total_nilai')
            ->join('detil_penjualan d', 'pr.kode_produk = d.kode_produk', 'left')
            ->groupBy('pr.kode_produk, pr.nama_produk')
            ->orderBy('pr.kode_produk')
            ->get()
            ->getResultArray();
    }
}