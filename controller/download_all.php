<?php

include_once("../config/config.php");
require('../Cetakpdf/fpdf.php');


$pdf = new FPDF('L','mm','A4');	//L = lanscape P= potrait		
$pdf->SetLeftMargin(20);
// membuat halaman baru
$pdf->AddPage();
 // mengambil gambar untuk header/kopsurat
$pdf->Image('../assets/img/header.jpg',20,null,255,45,'jpg');
 // setting tinggi dari kertas yang akan digunakan
$pdf->SetTopMargin(20);
 // setting jenis font yang akan digunakan		
$pdf->SetFont('Times','B',14);
// $data=$this->Menu_model->getUnduh($kodemk);
   // mencetak string 
$pdf->Cell(169,5,'',0,2);
$pdf->Cell(93,4,'',0,0);$pdf->Cell(80,5,'LAPORAN PENYUSUTAN AKHIR','B',0,'C');
$pdf->Cell(169,4,'',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(100,8,'',0,2);
//
$pdf->SetFont('Times','B',12,'C');
$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(25,8,'ID Susut',1,0,'C');
$pdf->Cell(28,8,'Nomor Polisi',1,0,'C');
$pdf->Cell(31,8,'Keterangan',1,0,'C');
$pdf->Cell(31,8,'Tgl Perolehan',1,0,'C');
$pdf->Cell(31,8,'Hrg Perolehan',1,0,'C');
$pdf->Cell(34,8,'Thn Penyusutan',1,0,'C');
$pdf->Cell(28,8,'Nilai Sisa',1,0,'C');
$pdf->Cell(35,8,'Nilai Baku',1,1,'C');
//
$pdf->SetFont('Times','',12,'C');
$no=1;
$sql = mysqli_query($mysqli,"SELECT * FROM tb_asset");
while ($data = mysqli_fetch_array($sql)) {
	$id_penyusutan = $data['id_asset'];
	$nilai_susut = mysqli_query($mysqli,"SELECT * FROM tb_asset  WHERE id_asset = '$id_penyusutan'");
	$tahun = $data['umur_ekonomis'];
	$cc = $data['tgl_perolehan'];
	$month = 12;
	$bulan = date('n', strtotime($cc));
	$bagi = $month + 1 - $bulan;
	if($nilai_susut && isset($data['id_asset'])){
		while($row = mysqli_fetch_array($nilai_susut)){
			$nilai = ($row['hrg_baku'] - $row['nilai_sisa']) / $tahun;
			$susut = $row['hrg_baku'];
				for($i = 0; $i <= $tahun; $i++){
					if ($i == "0") {
		                $pertama = ($nilai * $bagi) / 12;
		                $susut = $susut - $pertama;
		                $y = strtotime("$i year");
						$pdf->Cell(10,8, $no++,1, 0, 'C');
						$pdf->Cell(25,8, $row['id_asset'],1, 0, 'C');
						$pdf->Cell(28,8, $row['nopol'],1, 0, 'C');
						$pdf->Cell(31,8, $row['kete_aset'], 1, 0,'C');
						$pdf->Cell(31,8, $row['tgl_perolehan'],1, 0, 'C');
						$pdf->Cell(31,8, $row['hrg_baku'], 1, 0,'C');
						$pdf->Cell(34,8, $year = date('Y', "+$y"),1, 0, 'C');
						$pdf->Cell(28,8, $row['nilai_sisa'], 1, 0,'C');
						$pdf->Cell(35,8, $susut, 1, 1,'C');
					}else{
						$susut = $susut - $nilai;
						$y = strtotime("$i year");
						$pdf->Cell(10,8, $no++,1, 0, 'C');
						$pdf->Cell(25,8, $row['id_asset'],1, 0, 'C');
						$pdf->Cell(28,8, $row['nopol'],1, 0, 'C');
						$pdf->Cell(31,8, $row['kete_aset'], 1, 0,'C');
						$pdf->Cell(31,8, $row['tgl_perolehan'],1, 0, 'C');
						$pdf->Cell(31,8, $row['hrg_baku'], 1, 0,'C');
						$pdf->Cell(34,8, $year = date('Y', "+$y"),1, 0, 'C');
						$pdf->Cell(28,8, $row['nilai_sisa'], 1, 0,'C');
						$pdf->Cell(35,8, $susut, 1, 1,'C');
					}
				}
		}
	}
}



// Memberikan Footer
$pdf->Cell(169,12,'',0,1);
$pdf->SetFont('Times','',12);
$pdf->Cell(25,7,'Mengetahui,',0,0,'L'); $pdf->Cell(205,7,'Lampung Selatan,',0,0,'R');$pdf->Cell(60,7,date('d-m-Y'),0,1);
$pdf->Cell(25,7,'Pimpinan',0,0,'L'); $pdf->Cell(215,7,'Dibuat Oleh Admin',0,1,'R');
$pdf->Cell(169,20,'',0,3);
$pdf->Cell(45,5,'(......................................)','B',0,'L');$pdf->Cell(155,5,'',0,0);$pdf->Cell(45,5,'(......................................)','B',0,'L');
$pdf->Cell(50,5,'',0,1);
// $pdf->Cell(114,7,'',0,0);$pdf->Cell(70,7,'',0,0,'L');
	$pdf->Output();
	$pdf->Stream(array("Attachment" => FALSE));
?>