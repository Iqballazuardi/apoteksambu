<?PHP 

class C_rekap_transaksi extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model("transaksi/M_rekap_transaksi");
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
          $data['dtrekap_transaksi'] = $this->M_rekap_transaksi->get_rekap_transaksi();

          // echo json_encode($data);

         
          
          $this->load->view('transaksi/V_rekap_transaksi', array_merge($data));
      }
  }
  public function generate_pdf_rekap_transaksi()
    {
        $this->load->library('dompdf_gen');
        $data['content'] = $this->M_rekap_transaksi->get_rekap_transaksi();

        // Load the view and pass the data
        $html = $this->load->view('transaksi/pdf_rekap_transaksi', $data, true);

        // Load Dompdf with options
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf\Dompdf($options);

        // Generate the PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Stream the PDF to the browser
        $dompdf->stream("dynamic_pdf.pdf", ["Attachment" => false]);
    }
  public function generate_pdf_struk()
    {
      $id = $this->input->get("id");
      echo $id;
        $this->load->library('dompdf_gen');
        $data['content'] = $this->M_rekap_transaksi->get_struk_transaksi($id);

        // Load the view and pass the data
        $html = $this->load->view('transaksi/pdf_struk_transaksi', $data, true);

        // Load Dompdf with options
        $options = new Dompdf\Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf\Dompdf($options);

        // Generate the PDF
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Stream the PDF to the browser
        $dompdf->stream("dynamic_pdf.pdf", ["Attachment" => false]);
    }
 

 

  
}