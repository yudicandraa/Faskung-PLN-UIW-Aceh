<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include("fpdf/fpdf.php");
include("koneksi.php");
define('FPDF_FONTPATH','fpdf/font/');


$pdf = new FPDF('L', 'mm', 'A4');

$pdf ->AddPage();

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"PT. PLN (Persero)",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"FP 2",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,".................................... (1)",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"No: .................................... (2)",0,1,'L');

$pdf->SetFont('Arial','B',14);
$pdf -> cell(0, 5,"DOKUMEN PENARIKAN BARANG",0,1,'C');
$pdf->SetFont('Arial','BI',14);
$pdf -> cell(0, 5,"( Fasilitas Pendukung )",0,1,'C');
$pdf -> Ln(15);
$pdf-> SetFont('Arial','',10);
$pdf -> cell(8, 20,"No",1,0,'C');
$pdf -> cell(45, 20,"Nama Barang",1,0,'C');
$pdf -> cell(45, 20,"Merk/Type",1,0,'C');
$pdf -> cell(35, 20,"Nomor Seri",1,0,'C');
$pdf -> cell(35, 20,"Nomor Barang",1,0,'C');
$pdf -> cell(30, 20,"Satuan",1,0,'C');
$pdf -> cell(30, 20,"Jumlah",1,0,'C');
$pdf -> cell(40, 20,"Keterangan",1,1,'C');

$pdf-> SetFont('Arial','',10);
$pdf -> cell(8, 5,"1",1,0,'C');
$pdf -> cell(45, 5,"2",1,0,'C');
$pdf -> cell(45, 5,"3",1,0,'C');
$pdf -> cell(35, 5,"4",1,0,'C');
$pdf -> cell(35, 5,"5",1,0,'C');
$pdf -> cell(30, 5,"6",1,0,'C');
$pdf -> cell(30, 5,"7",1,0,'C');
$pdf -> cell(40, 5,"8",1,1,'C');
//
$pdf-> SetFont('Arial','',10);
$no=1;
$tampil = mysqli_query($koneksi, "SELECT * FROM penarikan");
while($hasil = mysqli_fetch_array($tampil)){
    $pdf -> Cell(8, 12,$no++,'LR', 0, 'C');
    $pdf -> Cell(45, 12,$hasil['nama_barang'],'LR', 0, 'C');
    $pdf -> Cell(45, 12,$hasil['merk_barang'],'LR', 0, 'C');
    $pdf -> Cell(35, 12,$hasil['nomor_seri'],'LR', 0, 'C');
    $pdf -> Cell(35, 12,$hasil['nomor_barang'],'LR', 0, 'C');
    $pdf -> Cell(30, 12,$hasil['satuan_jumlah'],'LR', 0, 'C');
    $pdf -> Cell(30, 12,$hasil['jumlah'],'LR', 0, 'C');
    $pdf -> Cell(40, 12,$hasil['keterangan'],'LR', 1, 'C');
}



$pdf -> Cell(8, 1,"",'LRB', 0, 'C');
$pdf -> Cell(45, 1,"",'LRB', 0, 'C');
$pdf -> Cell(45, 1,"",'LRB', 0, 'C');
$pdf -> Cell(35, 1,"",'LRB', 0, 'C');
$pdf -> Cell(35, 1,"",'LRB', 0, 'C');
$pdf -> Cell(30, 1,"",'LRB', 0, 'C');
$pdf -> Cell(30, 1,"",'LRB', 0, 'C');
$pdf -> Cell(40, 1,"",'LRB', 1, 'C');

$pdf -> Ln(15);

$pdf->SetFont('Arial','i',10);
$pdf -> cell(220, 5,"      Yang Menerima,",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"................. , ...................... (4)",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5," ",0,0,'L');

$pdf->SetFont('Arial','i',10);
$pdf -> cell(220, 5,"      Yang Menyerahkan,",0,1,'L');

$pdf -> Ln(15);
$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,".................................... (5)",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"......................................... (6)",0,1,'L');
$pdf ->Output('D', 'Laporan Penarikan Barang.pdf');
}else{
    header("Location: index.php");
    exit();
}
?>
