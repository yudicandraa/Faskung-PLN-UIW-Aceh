<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
include("fpdf/fpdf.php");
include("koneksi.php");
define('FPDF_FONTPATH','fpdf/font/');


$pdf = new FPDF('L', 'mm', 'A4');

$pdf ->AddPage();

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"PERUM LISTRIK NEGARA",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"FP 3",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,".................................... (1)",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"No: .................................... (2)",0,1,'L');

$pdf->SetFont('Arial','B',14);
$pdf -> cell(0, 5,"DOKUMEN PENGELUARAN SEMENTARA BARANG",0,1,'C');
$pdf->SetFont('Arial','BI',14);
$pdf -> cell(0, 5,"( Fasilitas Pendukung )",0,1,'C');
$pdf -> Ln(15);
$pdf-> SetFont('Arial','',10);
$pdf -> cell(8, 20,"No",1,0,'C');
$pdf -> cell(45, 20,"Nama Barang",1,0,'C');
$pdf -> cell(45, 20,"Merk/Type",1,0,'C');
$pdf -> cell(30, 20,"Nomor Seri",1,0,'C');
$pdf -> cell(30, 20,"Nomor Barang",1,0,'C');
$pdf -> cell(20, 20,"Satuan",1,0,'C');
$pdf -> cell(20, 20,"Jumlah",1,0,'C');
$pdf -> cell(30, 20,"Tujuan",1,0,'C');
$pdf -> cell(40, 20,"Keterangan",1,1,'C');

$pdf-> SetFont('Arial','',10);
$pdf -> cell(8, 5,"1",1,0,'C');
$pdf -> cell(45, 5,"2",1,0,'C');
$pdf -> cell(45, 5,"3",1,0,'C');
$pdf -> cell(30, 5,"4",1,0,'C');
$pdf -> cell(30, 5,"5",1,0,'C');
$pdf -> cell(20, 5,"6",1,0,'C');
$pdf -> cell(20, 5,"7",1,0,'C');
$pdf -> cell(30, 5,"8",1,0,'C');
$pdf -> cell(40, 5,"9",1,1,'C');

$pdf-> SetFont('Arial','',10);
$no=1;
$tampil = mysqli_query($koneksi, "SELECT * FROM pengeluaran");
while($hasil = mysqli_fetch_array($tampil)){
    $pdf -> Cell(8, 12,$no++,'LR', 0, 'C');
    $pdf -> Cell(45, 12,$hasil['nama_barang'],'LR', 0, 'C');
    $pdf -> Cell(45, 12,$hasil['merk_barang'],'LR', 0, 'C');
    $pdf -> Cell(30, 12,$hasil['nomor_seri'],'LR', 0, 'C');
    $pdf -> Cell(30, 12,$hasil['nomor_barang'],'LR', 0, 'C');
    $pdf -> Cell(20, 12,$hasil['satuan_jumlah'],'LR', 0, 'C');
    $pdf -> Cell(20, 12,$hasil['jumlah'],'LR', 0, 'C');
    $pdf -> Cell(30, 12,$hasil['tujuan'],'LR', 0, 'C');
    $pdf -> Cell(40, 12,$hasil['keterangan'],'LR', 1, 'C');
}

$pdf -> Cell(268, 8,"Diterima Kembali Tanggal : ........................ (4)",'LRT', 1, 'L');
$pdf -> Cell(268, 8,"Oleh                                   : ........................ (..........................) (5)",'LRB', 1, 'L');


$pdf -> Ln(15);

$pdf->SetFont('Arial','i',10);
$pdf -> cell(220, 5,"      Yang Menerima,",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"................. , ...................... (6)",0,1,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5," ",0,0,'L');

$pdf->SetFont('Arial','i',10);
$pdf -> cell(220, 5,"      Yang Menyerahkan,",0,1,'L');

$pdf -> Ln(15);
$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,".................................... (7)",0,0,'L');

$pdf->SetFont('Arial','',10);
$pdf -> cell(220, 5,"......................................... (8)",0,1,'L');
$pdf ->Output('D', 'Laporan Pengeluaran Sementara Barang.pdf');
}else{
    header("Location: index.php");
    exit();
}
?>
