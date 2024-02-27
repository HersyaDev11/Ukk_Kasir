<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelAdmin;
use App\Models\ModelLaporan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->ModelProduk = new ModelProduk();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelLaporan = new ModelLaporan();
    }
  
    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->ModelProduk->AllData(),
            'web' => $this->ModelAdmin->DetailData(),
            'page' =>'laporan/v_print_lap_produk'
        ];
        return view('laporan/v_template_print_laporan', $data);
    }
    public function LaporanHarian()
    {
        $data = [
            'judul' =>'Laporan',
            'subjudul'=>'Laporan Harian',
            'menu' =>'laporan',
            'submenu' =>'laporan-harian',
            'page' => 'laporan/v_laporan_harian',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }
    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'judul' => 'Laporan Harian Penjualan',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'web' => $this->ModelAdmin->DetailData(),
            'tgl' => $tgl,
        ]; 

        $response = [
            'data'=> view('laporan/v_tabel_laporan_harian', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataHarian($tgl));
    }

    public function PrintLaporanHarian($tgl)
    {
        $data = [
            'judul' => 'Laporan Harian Penjualan',
            'web' => $this->ModelAdmin->DetailData(),
            'page' =>'laporan/v_print_lap_harian',
            'dataharian' => $this->ModelLaporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }
    public function LaporanBulanan()
    {
        $data = [
            'judul' =>'Laporan',
            'subjudul'=>'Laporan Bulanan',
            'menu' =>'laporan',
            'submenu' =>'laporan-bulanan',
            'page' => 'laporan/v_laporan_bulanan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }
    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
           'judul' => 'Laporan Bulanan Penjualan',
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ]; 

        $response = [
           'data'=> view('laporan/v_tabel_laporan_bulanan', $data)
        ];

        echo json_encode($response);
        //echo dd($this->ModelLaporan->DataTahunan($bulan, $tahun));
    }
    public function PrintLaporanBulanan($bulan, $tahun)
    {
        $data = [
            'judul' => 'Laporan Bulanan Penjualan',
            'web' => $this->ModelAdmin->DetailData(),
            'page' =>'laporan/v_print_lap_bulanan',
            'databulanan' => $this->ModelLaporan->DataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }
    public function LaporanTahunan()
    {
        $data = [
            'judul' =>'Laporan',
            'subjudul'=>'Laporan Tahunan',
            'menu' =>'laporan',
            'submenu' =>'laporan-tahunan',
            'page' => 'laporan/v_laporan_tahunan',
            'web' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }
    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        $data = [
           'judul' => 'Laporan Tahunan Penjualan',
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
            'web' => $this->ModelAdmin->DetailData(),
            'tahun' => $tahun,
        ]; 

        $response = [
           'data'=> view('laporan/v_tabel_laporan_tahunan', $data)
        ];

        echo json_encode($response);
       // echo dd($this->ModelLaporan->DataTahunan(2024));
    }
    public function PrintLaporanTahunan($tahun)
    {
        $data = [
            'judul' => 'Laporan Tahunan Penjualan',
            'web' => $this->ModelAdmin->DetailData(),
            'page' =>'laporan/v_print_lap_tahunan',
            'datatahunan' => $this->ModelLaporan->DataTahunan($tahun),
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_print_laporan', $data);
    }
}