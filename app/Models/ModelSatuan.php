<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model

{
    public function AllData()
    {
        return $this->db->table('tbl_satuan')
        ->get()
        ->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_satuan')->insert($data);
    }
    public function UpdateData($data)
    {
        $this->db->table('tbl_satuan')
        ->where('id_satuan',$data['id_satuan'])
        ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_satuan')
        ->where('id_satuan',$data['id_satuan'])
        ->delete($data);
    }
}
