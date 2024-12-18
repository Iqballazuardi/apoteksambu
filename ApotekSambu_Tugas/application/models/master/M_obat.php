<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_obat extends CI_Model
{
    public function get_obat()
    {
        return  $this->db->query("SELECT supplier.nama as supplier_name,obat.id as obat_id,supplier.id as supplier_id, nama_obat , harga,stock,obat.updated_by as obat_updated_by 
                                    FROM obat left join supplier on obat.supplier = supplier.id 
                                    ORDER BY obat_id DESC")->result(); 
        
    }

    function cek_obat($nama_obat, $supplier)
    {
        $this->db->from('obat');
        $this->db->where('nama_obat', $nama_obat);
        $this->db->where('supplier', $supplier);
        $query = $this->db->get();
        return $query;
    }

    function insert_dtobat($data_obat)
    {
        $this->db->trans_begin();
        $this->db->insert('obat', $data_obat);
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $result = 0;
        } else {
            $this->db->trans_commit();
            $result = 1;
        }
        return $result;
        return TRUE;
    }

    function update_dtobat($id, $data_obat)
    {
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('obat', $data_obat);
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            $result = 0;
        } else {
            $this->db->trans_commit();
            $result = 1;
        }
        return $result;
        return TRUE;
    }

    function delete_obat($obat_id)
    {
        $query = $this->db->delete('obat', "id = '$obat_id'");
        return $query;
    }
}
