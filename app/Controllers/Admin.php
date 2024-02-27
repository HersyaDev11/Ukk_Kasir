<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelAdmin;

class Admin extends BaseController
{
    public function __construct()
    {
        $this->ModelAdmin = new ModelAdmin();
    }
    
    public function index()
    {
        $data = [
            'judul' =>'Dashboard',
            'subjudul'=>'',
            'menu' =>'dashboard',
            'submenu' =>'',
            'page' => 'v_admin',
            'grafik' => $this->ModelAdmin->Grafik(),
            'p_hari_ini' => $this->ModelAdmin->PendapatanHariIni(),
            'p_bulan_ini' => $this->ModelAdmin->PendapatanBulanIni(),
            'p_tahun_ini' => $this->ModelAdmin->PendapatanTahunIni(),
            'jml_produk'=>$this->ModelAdmin->JumlahProduk(),
            'jml_kategori'=>$this->ModelAdmin->JumlahKategori(),
            'jml_satuan'=>$this->ModelAdmin->JumlahSatuan(),
            'jml_user'=>$this->ModelAdmin->JumlahUser(),
        ];
        return view('v_template', $data);
    }
    public function Setting()
    {
        $data = [
            'judul' =>'Setting',
            'subjudul'=>'Setting',
            'menu' =>'setting',
            'submenu' =>'',
            'page' => 'v_setting',
            'setting' => $this->ModelAdmin->DetailData(),
        ];
        return view('v_template', $data);
    }
    public function UpdateSetting()
    {
        $data = [
            'id' => '1',
            'nama_toko' => $this->request->getpost('nama_toko'),
            'slogan' => $this->request->getpost('slogan'),
            'alamat' => $this->request->getpost('alamat'),
            'no_telpon' => $this->request->getpost('no_telpon'),
            'deskripsi' => $this->request->getpost('deskripsi'),
        ];
        $this->ModelAdmin->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate !!');
        return redirect()->to('Admin/Setting');
    }

    public function Cek()
    {
        echo dd($this->ModelAdmin->PendapatanBulanIni());
    }
}
