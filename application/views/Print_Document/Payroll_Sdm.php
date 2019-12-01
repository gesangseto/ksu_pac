<?php $pdf = new FPDF("L", "cm", "A4");

$pdf->SetMargins(2, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', 'B', 11);
$pdf->Image('../logo/logo.jpg', 1, 1, 2, 2);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'SAHABATECH', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Telpon : 082122222657', 0, 'L');
$pdf->SetFont('Arial', 'B', 10);
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'Perum Kunciran Indah', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'email : gesangseto@gmail.com', 0, 'L');
$pdf->Line(1, 3.1, 28.5, 3.1);
$pdf->SetLineWidth(0.1);
$pdf->Line(1, 3.2, 28.5, 3.2);
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(25.5, 0.7, "Surat Jalan", 0, 10, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);


$xquery = mysqli_query($koneksi, $query);
if ($lihat = mysqli_fetch_array($xquery)) {
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(5, 0.7, "Nama Teknisi : " . $lihat['fullname_teknisi'], 0, 0, 'C');
    $pdf->ln(1);
    $pdf->Cell(5, 0.7, "Di cetak pada : " . date("D-d/m/Y"), 0, 0, 'C');
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
    $pdf->Cell(4, 0.8, $lihat['fullname'], 1, 0, 'C');
    $pdf->Cell(6, 0.8, $lihat['alamat'], 1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['no_telp'], 1, 0, 'C');
    $pdf->Cell(4, 0.8, $lihat['category'] . ' ' . $lihat['type'], 1, 0, 'C');
    $pdf->Cell(4.5, 0.8, $lihat['info'] . ' ' . $lihat['sparepart'], 1, 0, 'C');
    $pdf->Cell(3, 0.8, $lihat['time_meet'], 1, 0, 'C');
    $no++;


    $pdf->ln(1);
    $pdf->MultiCell(19.5, 0.5, 'id faktur', 0, 'L');
    $pdf->Cell(4, 0.8, $lihat['order_id'], 1, 0, 'C');
    $pdf->SetX(4);
};
$pdf->ln(1);
$pdf->ln(1);
$pdf->MultiCell(19.5, 0.5, 'Kerusakan : ____________________________', 0, 'L');
$pdf->SetX(4);
$pdf->ln(1);
$pdf->MultiCell(19.5, 0.5, 'Keterangan : ____________________________', 0, 'L');
$pdf->SetX(4);
$pdf->ln(1);
$pdf->MultiCell(19.5, 0.5, 'Biaya Estimasi : Rp. ' . number_format($lihat['price'], 2, ',', '.') . '__________________', 0, 'L');
$pdf->SetX(4);

$pdf->ln(1);
$pdf->ln(1);
$pdf->MultiCell(19.5, 0.5, ' ____________________________ ____________________________ ____________________________', 0, 'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5, 0.5, 'ADMIN TEKNISI CUSTOMER', 0, 'L');
$pdf->SetX(4);

$pdf->Output("laporan_buku.pdf", "I");
