<?php

include_once("../config/config.php");
require('../Cetakpdf/fpdf.php');
$id_penyusutan = $_POST['id'];
$tahun = $_POST['umur_ekonomis'];


$pdf = new FPDF('P','mm','A4');	//L = lanscape P= potrait		
$pdf->SetLeftMargin(20);
$pdf->SetTopMargin(0);
// membuat halaman baru
$pdf->AddPage();
 // mengambil gambar untuk header/kopsurat
$pdf->Image('../assets/img/header.jpg',20,null,169,36,'jpg');
 // setting jenis font yang akan digunakan		
$pdf->SetFont('Times','B',14);
// $data=$this->Menu_model->getUnduh($kodemk);
   // mencetak string 
$pdf->Cell(169,5,'',0,2);
$pdf->Cell(35,4,'',0,0);$pdf->Cell(107,5,'KERTAS KERJA PENYUSUTAN ASET TETAP','B',0,'C');
$pdf->Cell(169,4,'',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(80,8,'',0,2);
//
$pdf->SetFont('Times','B',10,'C');
$pdf->Cell(7,6,'No',1,0,'C');
$pdf->Cell(15,6,'ID Susut',1,0,'C');
$pdf->Cell(25,6,'Nama Aset',1,0,'C');
$pdf->Cell(35,6,'Tanggal Perolehan',1,0,'C');
$pdf->Cell(32,6,'Harga Perolehan',1,0,'C');
$pdf->Cell(30,6,'Umur Ekonomis',1,0,'C');
$pdf->Cell(25,6,'Nilai Sisa',1,0,'C');
$pdf->Cell(35,6,'Penyusutan',1,1,'C');
//
$no=1;
$query = mysqli_query($mysqli,"SELECT tb_penyusutan.id_penyusutan,tb_asset.nama_asset,tb_asset.tgl_perolehan,tb_asset.hrg_perolehan,tb_asset.umur_ekonomis,tb_asset.nilai_sisa,tb_penyusutan.total_penyusutan FROM tb_penyusutan INNER JOIN tb_asset ON tb_penyusutan.id_penyusutan = tb_asset.id_asset");
while($row=mysqli_fetch_array($query)){
    $nilai = ($row['hrg_perolehan'] - $row['nilai_sisa']) / $tahun;
    $susut = $row['hrg_perolehan'];
    for($i = 1; $i <= $tahun; $i++){
        $susut = $susut - $nilai;
	$pdf->Cell(7,6, $no , 1, 0, 'C');
	$pdf->Cell(15,6, $row['id_penyusutan'],1, 0, 'C');
	$pdf->Cell(25,6, $row['nama_asset'],1, 0, 'C');
	$pdf->Cell(35,6, $row['tgl_perolehan'],1, 0, 'C');
	$pdf->Cell(32,6, $row['hrg_perolehan'], 1, 0,'C');
	$pdf->Cell(30,6, $row['umur_ekonomis'],1, 0, 'C');
	$pdf->Cell(25,6, $row['nilai_sisa'], 1, 0,'C');
	$pdf->Cell(35,6, $row['total_penyusutan'], 1, 0,'C');

	$no++;
	}

// Memberikan space
$pdf->Cell(169,7,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(145,7,'Lampung Selatan,',0,0,'R');$pdf->Cell(60,7,date('d-m-Y'),0,1);
$pdf->Cell(148,7,'Dibuat Oleh Admin',0,1,'R');
$pdf->Cell(169,20,'',0,3);
$pdf->Cell(114,4,'',0,0);$pdf->Cell(45,5,'(......................................)','B',0,'L');
$pdf->Cell(50,5,'',0,1);
// $pdf->Cell(114,7,'',0,0);$pdf->Cell(70,7,'',0,0,'L');
	$pdf->Output();
	$pdf->Stream(array("Attachment" => FALSE));

}
?>
