<?PHP


class C_transaksi extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("transaksi/M_transaksi");
    $this->load->model("master/M_obat");
    $this->load->model("transaksi/M_transaksi");
  }

  public function index()
  {
      $session_data            = $this->session->userdata('logged_in');
      if ($this->session->userdata('logged_in')) {
          $session_data       = $this->session->userdata('logged_in');
          $data['username']   = $session_data['username'];
          $data['password']   = $session_data['password'];
          $data['Titel']      = 'Dashboard';
          $data['dtpersonil'] = $data['username'];
          $data['dtobat']     = $this->M_obat->get_obat();
          $data['dtid_transaksi'] = $this->M_transaksi->get_last_transaksi();
          $aksi               = $this->uri->segment(4);


          $nama               = $this->input->post('nama');
          $keluhan            = $this->input->post('keluhan');
          $obat               = $this->input->post('obat');
          $pcs                = $this->input->post('pcs');
          $harga_satuan       = $this->input->post('harga_satuan');
          $total_harga        = $this->input->post('total_harga');
          $updated_by         = $this->input->post('updated_by');
       

            if ($aksi == 'simpan') {

                $data_transaksi = array(
                  'nama'          => $nama,
                  'keluhan'       => $keluhan,
                  'obat'          => $obat,
                  'pcs'           => $pcs,
                  'harga_satuan'  => preg_replace('/[^0-9]/', '', $harga_satuan),
                  'total_harga'   => preg_replace('/[^0-9]/', '', $total_harga),
                  'updated_by'    => $updated_by
                  
                );

                $this->M_transaksi->insert_dttransaksi($data_transaksi);
                $id = $this->M_transaksi->get_last_transaksi();
                $result_id = $id[0];
                $result = $result_id->id;
                

                
                
               
                   
                    echo "<script>window.location.href = '".base_url()."index.php/transaksi/C_rekap_transaksi/generate_pdf_struk?id=".$result."'</script>";
                    
            }else{
              $this->load->view('transaksi/V_transaksi', array_merge($data));
            }
         
          
      }
  }
 

 

  
}