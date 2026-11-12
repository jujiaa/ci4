<?php

namespace App\Controllers;

use App\Models\LaporanModel;

class Laporan extends BaseController
{
    private LaporanModel $model;

    public function __construct()
    {
        $this->model = new LaporanModel();
    }

    // GET /laporan/pelanggan
    public function pelanggan(): string
    {
        return view('laporan/pelanggan', [
            'title' => 'Penjualan per Pelanggan',
            'rows'  => $this->model->agregasiPerPelanggan(),
        ]);
    }

    // GET /laporan/produk
    public function produk(): string
    {
        return view('laporan/produk', [
            'title' => 'Laporan Penjualan per Produk',
            'rows'  => $this->model->laporanPerProduk(),
        ]);
    }
}