<?PHP
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends CI_Model
{
    function insert_dttransaksi($data_transaksi)
    {
        $this->db->trans_begin();
        $this->db->insert('transaksi', $data_transaksi);
        if ($this->db->trans_status() == FALSE) {
            $this->db->trans_rollback();
            // echo json_encode($this->db->error());
            $result = 0;
        } else {
            $this->db->trans_commit();
            // $result = $this->db->insert_id();
            $result = 1;
        }
        return $result;
    }

    function get_last_transaksi (){
       return $this->db->query("SELECT id FROM transaksi ORDER BY id DESC LIMIT 1")->result();
    }
 
}
