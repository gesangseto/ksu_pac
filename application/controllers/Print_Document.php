<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Print_Document extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('_Print_Document');
        $this->load->library('pdf');
    }


    public function Payroll_Sdm()
    {
        $this->load->view('Print_Document/Payroll_Sdm_New');
    }
    public function Payroll_Sdm_OLD()
    {
        $price = 200000;
        $pdf = new FPDF("L", "cm", "A5");

        $pdf->SetMargins(0.5, 0.5, 0.5);
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times', 'B', 10);

        $pdf->Cell(16, 0, '', 0, 0, 'C');
        $pdf->Cell(3, 0, 'Slip Gaji', 0, 0, 'C');

        $pdf->Image(base_url('dist/img/logo.png'), 0.5, 0.5, 2, 1.5);
        $pdf->SetX(3);
        $pdf->MultiCell(19.5, 0.5, 'PT.KSU Putra Anugrah Cemerlang', 0, 'L');
        $pdf->SetX(3);
        $pdf->MultiCell(19.5, 0.5, 'Telpon : 082122222657', 0, 'L');
        $pdf->SetX(3);
        $pdf->MultiCell(19.5, 0.5, 'Alamat : Perum Kunciran Indah', 0, 'L');
        $pdf->Line(0, 2.3, 28.5, 2.3);
        $pdf->ln(0.3);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(4.5, 0.7, "Nama SDM : Gesang Aji Seto | ID SDM : 1552433", 0, 0, 'L');
        $pdf->ln(0.5);
        $pdf->Cell(4.5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
        $pdf->ln(1);



        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
        $pdf->Cell(4, 0.8, 'Nama User', 1, 0, 'C');
        $pdf->Cell(6, 0.8, 'Alamat', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'No Telp', 1, 0, 'C');
        $pdf->Cell(4, 0.8, 'Type Unit', 1, 0, 'C');
        $pdf->Cell(4.5, 0.8, 'Keluhan', 1, 0, 'C');
        $pdf->Cell(3, 0.8, 'Tanggal Order', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);

        $no = 1;


        $pdf->Cell(1, 0.8, $no, 1, 0, 'C');
        $pdf->Cell(4, 0.8, "Gesang Aji Seto", 1, 0, 'C');
        $pdf->Cell(6, 0.8, "Semeru IV", 1, 0, 'C');
        $pdf->Cell(3, 0.8, "021992838", 1, 0, 'C');
        $pdf->Cell(4, 0.8, "Rumah susun", 1, 0, 'C');
        $pdf->Cell(4.5, 0.8, "Apa aja deh", 1, 0, 'C');
        $pdf->Cell(3, 0.8, "Sekarang", 1, 0, 'C');
        $no++;


        $pdf->ln(1);
        $pdf->MultiCell(19.5, 0.5, 'id faktur', 0, 'L');
        $pdf->Cell(4, 0.8, "211029377", 1, 0, 'C');
        $pdf->SetX(4);
        $pdf->ln(1);
        $pdf->ln(1);
        $pdf->MultiCell(19.5, 0.5, 'Kerusakan        : ____________________________', 0, 'L');
        $pdf->SetX(4);
        $pdf->ln(1);
        $pdf->MultiCell(19.5, 0.5, 'Keterangan       : ____________________________', 0, 'L');
        $pdf->SetX(4);
        $pdf->ln(1);
        $pdf->MultiCell(19.5, 0.5, 'Biaya Estimasi    : Rp. ' . number_format($price, 2, ',', '.') . '__________________', 0, 'L');
        $pdf->SetX(4);

        $pdf->Output("laporan_buku.pdf", "I");
    }
}

/* End of file Print.php */
