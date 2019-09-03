<?php

include_once("../config/config.php");
require('../Cetakpdf/fpdf.php');
$id_penyusutan = $_POST['id'];
$tahun = $_POST['umur'];


$pdf = new FPDF('L','mm','A4');	//L = lanscape P= potrait		
$pdf->SetLeftMargin(20);
$pdf->SetTopMargin(0);
// membuat halaman baru
$pdf->AddPage();
 // mengambil gambar untuk header/kopsurat
$pdf->Image('../assets/img/header.jpg',20,null,255,45,'jpg');
 // setting jenis font yang akan digunakan		
$pdf->SetFont('Times','B',14);
// $data=$this->Menu_model->getUnduh($kodemk);
   // mencetak string 
$pdf->Cell(169,5,'',0,2);
$pdf->Cell(80,4,'',0,0);$pdf->Cell(109,5,'KERTAS KERJA PENYUSUTAN ASET TETAP','B',0,'C');
$pdf->Cell(169,4,'',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(100,8,'',0,2);
//
$pdf->SetFont('Times','B',12,'C');
$pdf->Cell(10,6,'No',1,0,'C');
$pdf->Cell(24,6,'ID Susut',1,0,'C');
$pdf->Cell(25,6,'Nama Aset',1,0,'C');
$pdf->Cell(37,6,'Tanggal Perolehan',1,0,'C');
$pdf->Cell(36,6,'Harga Perolehan',1,0,'C');
$pdf->Cell(36,6,'Umur Ekonomis',1,0,'C');
$pdf->Cell(25,6,'Nilai Sisa',1,0,'C');
$pdf->Cell(32,6,'Penyusutan',1,1,'C');
//
$pdf->SetFont('Times','',12,'C');
$no=1;

$nilai_susut = mysqli_query($mysqli,"SELECT tb_asset.*, tb_kategori.nm_katagori FROM tb_asset INNER JOIN tb_kategori ON tb_asset.id_kategori = tb_kategori.id_kategori WHERE id_asset = '$id_penyusutan'");
                                                
if($nilai_susut && isset($_POST['id'])){
while($row = mysqli_fetch_array($nilai_susut))
	{
	$nilai = ($row['hrg_perolehan'] - $row['nilai_sisa']) / $tahun;
	$susut = $row['hrg_perolehan'];
		for($i = 1; $i <= $tahun; $i++){
		$susut = $susut - $nilai;
		$pdf->Cell(10,6, $i , 1, 0, 'C');
		$pdf->Cell(24,6, $row['id_asset'],1, 0, 'C');
		$pdf->Cell(25,6, $row['nama_asset'],1, 0, 'C');
		$pdf->Cell(37,6, $row['tgl_perolehan'],1, 0, 'C');
		$pdf->Cell(36,6, $row['hrg_perolehan'], 1, 0,'C');
		$pdf->Cell(36,6, $i,1, 0, 'C');
		$pdf->Cell(25,6, $row['nilai_sisa'], 1, 0,'C');
		$pdf->Cell(32,6, $susut, 1, 1,'C');
		}
	}
}

	

// Memberikan space
$pdf->Cell(169,12,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(234,7,'Lampung Selatan,',0,0,'R');$pdf->Cell(60,7,date('d-m-Y'),0,1);
$pdf->Cell(237,7,'Dibuat Oleh Admin',0,1,'R');
$pdf->Cell(169,20,'',0,3);
$pdf->Cell(203,4,'',0,0);$pdf->Cell(45,5,'(......................................)','B',0,'L');
$pdf->Cell(50,5,'',0,1);
// $pdf->Cell(114,7,'',0,0);$pdf->Cell(70,7,'',0,0,'L');
	$pdf->Output();
	$pdf->Stream(array("Attachment" => FALSE));


?>
