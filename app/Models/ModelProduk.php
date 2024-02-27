<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelProduk extends Model

{
    public function AllData()
    {
        return $this->db->table('tbl_produk')
        ->join('tbl_kategori', 'tbl_kategori.id_kategori=tbl_produk.id_kategori')
        ->join('tbl_satuan', 'tbl_satuan.id_satuan=tbl_produk.id_satuan')
        ->orderBy('id_produk', 'DESC')
        ->get()
        ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_produk')->insert($data);
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_produk')
        ->where('id_produk',$data['id_produk'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_produk')
        ->where('id_produk',$data['id_produk'])
        ->delete($data);
    }
}
