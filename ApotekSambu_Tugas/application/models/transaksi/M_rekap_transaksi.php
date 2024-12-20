<?PHP 

class M_rekap_transaksi extends CI_Model{
  
    public function get_rekap_transaksi(){
     return $this->db->query("SELECT transaksi.id as transaksi_id ,transaksi.nama as pasien_nama,keluhan, obat.nama_obat as nama_obat ,create_at, pcs , total_harga, harga_satuan, transaksi.updated_by as transaksi_updated_by
                        FROM transaksi left join obat on obat.id = transaksi.obat 
                        ORDER BY obat.id DESC")->result();
    }
    public function get_struk_transaksi($id){
      return $this->db->query("SELECT transaksi.id as transaksi_id ,transaksi.nama as pasien_nama,keluhan, obat.nama_obat as nama_obat ,create_at, pcs , total_harga, harga_satuan, transaksi.updated_by as transaksi_updated_by
                         FROM transaksi left join obat on obat.id = transaksi.obat where transaksi.id =$id")->result();
     }

  
}