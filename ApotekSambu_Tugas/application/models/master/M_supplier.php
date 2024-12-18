<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class M_supplier extends CI_Model
{

  public function get_supplier()
  {
      return $this->db->query("SELECT * FROM supplier ORDER BY id DESC")->result();
  }
  function cek_supplier($nama)
    {
        $this->db->from('supplier');
        $this->db->where('nama', $nama);
        $this->db->where('nama', $nama);
        $query = $this->db->get();
        return $query;
    }

    function insert_dtsupplier($data_supplier)
    {
        $this->db->trans_begin();
        $this->db->insert('supplier', $data_supplier);
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
    function update_dtsupplier($id, $data_supplier)
    { 
        $this->db->trans_begin();
        $this->db->where('id', $id);
        $this->db->update('supplier', $data_supplier);
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

    function delete_supplier($id)
    {
        $query = $this->db->delete('supplier', "id = '$id'");
        return $query;
    }
}
