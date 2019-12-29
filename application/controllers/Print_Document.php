
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Print_Document extends CI_Controller
{

    public function Payroll_Sdm()
    {
        $mpdf = new \Mpdf\Mpdf();
        $data = $this->load->view('Print_Document/Payroll_Sdm', [], TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function printPDF()
    {
    }
}
