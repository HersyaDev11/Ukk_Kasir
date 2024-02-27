<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPenjualan extends Model
{
    public function NoFaktur()
    {
        $tgl = date('Ymd');
        $query = $this->db->query("SELECT MAX(RIGHT(no_faktur,4)) as no_urut from tbl_jual where DATE(tgl_jual)='$tgl'");
        $hasil = $query->getRowArray();
        if ($hasil['no_urut'] > 0){
            $tmp = $hasil['no_urut'] + 1;
            $kd = sprintf("%04s", $tmp);
        }else{
            $kd= "0001";
        }
        $no_faktur = date('Ywd') . $kd;
        return $no_faktur;
    }
    public function CekProduk($kode_produk)
    {
        return $this->db->table('tbl_produk')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_produk.id_kategori')
        ->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan')
        ->where('kode_produk', $kode_produk)
        ->get()
        ->getRowArray();
    }
    public function AllProduk()
    {
        return $this->db->table('tbl_produk')
        ->join('tbl_kategori','tbl_kategori.id_kategori=tbl_produk.id_kategori')
        ->join('tbl_satuan','tbl_satuan.id_satuan=tbl_produk.id_satuan')
        ->where('stok > 0')
        ->get()
        ->getResultArray();
    }
    public function InsertJual($data)
    {
        $this->db->table('tbl_jual')->insert($data);
    }

    public function InsertRinciJual($data)
    {
        $this->db->table('tbl_rinci')->insert($data);
    }
}

