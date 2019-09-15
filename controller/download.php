<?php
ob_start();
include_once("../config/config.php");
require('../Cetakpdf/fpdf.php');

$id_penyusutan = $_POST['id'];
$tahun = $_POST['umur_ekonomis'];
$cc = $_POST['thn_perolehan'];
$bulan = date('n', strtotime($cc));


$pdf = new FPDF('L','mm','A4');	//L = lanscape P= potrait		
$pdf->SetLeftMargin(30);

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
$pdf->Cell(80,4,'',0,0);$pdf->Cell(90,5,'LAPORAN TRANSAKSI PENYUSUTAN','B',0,'C');
$pdf->Cell(169,4,'',0,1,'C');
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(100,8,'',0,2);
//

$aql = mysqli_query($mysqli,"SELECT * FROM tb_asset  WHERE id_asset = '$id_penyusutan'");
if($ap = mysqli_fetch_array($aql)){
$pdf->SetFont('Times','B',12,'C');
$pdf->Cell(34,8,'ID Aset',0,0);			$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['id_asset'],0,1);
$pdf->Cell(34,8,'Nomor Polisi',0,0);	$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['nopol'],0,1);
$pdf->Cell(34,8,'Keterangan',0,0);		$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['kete_aset'],0,1);
$pdf->Cell(34,8,'Tahun Perolehan',0,0);	$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['tgl_perolehan'],0,1);
$pdf->Cell(34,8,'Harga Perolehan',0,0);	$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['hrg_baku'],0,1);
$pdf->Cell(34,8,'Nilai Baku',0,0);		$pdf->Cell(10,8,':',0,0);	$pdf->Cell(10,8,$ap['nilai_sisa'],0,1);
$pdf->Cell(169,10,'',0,3);
}

$pdf->SetFont('Times','B',12,'C');
$pdf->Cell(10,8,'No',1,0,'C');
$pdf->Cell(35,8,'Umur Ekonomis',1,0,'C');
$pdf->Cell(40,8,'Tahun Penyusutan',1,0,'C');
$pdf->Cell(40,8,'Beban Penyusutan',1,0,'C');
$pdf->Cell(45,8,'Akumulasi Penyusutan',1,0,'C');
$pdf->Cell(40,8,'Nilai Baku',1,1,'C');
//
$pdf->SetFont('Times','',12,'C');

$nilai_susut = mysqli_query($mysqli,"SELECT * FROM tb_asset  WHERE id_asset = '$id_penyusutan'");
$no=1;
$month = 12;
$bagi = $month + 1 - $bulan;
$akumulasi = 0;
if($nilai_susut && isset($_POST['id'])){
while($row = mysqli_fetch_array($nilai_susut))
	{
	$nilai = ($row['hrg_baku'] - $row['nilai_sisa']) / $tahun;
	$susut = $row['hrg_baku'];
		for($i = 0; $i <= $tahun; $i++){
			if($i=="0"){
			$pertama = (($row['hrg_baku'] - $row['nilai_sisa']) / $tahun) * $bagi / 12;
            $susut = $susut - $pertama;
            $akumulasi = $akumulasi + $pertama;
            $y = strtotime("$i year");
			$pdf->Cell(10,8, $no++ , 1, 0,'C');
			$pdf->Cell(35,8, $row['umur_ekonomis'],1, 0, 'C');
			$pdf->Cell(40,8, $year = date('Y', "+$y"),1, 0, 'C');
			$pdf->Cell(40,8, $nilai, 1,0, 'C');
			$pdf->Cell(45,8, $akumulasi,1,0,'C');
			$pdf->Cell(40,8, $susut, 1,1,'C');
			}else{
				$susut = $susut - $nilai;
				$akumulasi = $akumulasi + $nilai;
				$y = strtotime("$i year");
				$pdf->Cell(10,8, $no++ , 1, 0, 'C');
				$pdf->Cell(35,8, $row['umur_ekonomis'],1, 0, 'C');
				$pdf->Cell(40,8, $year = date('Y', "+$y"),1, 0, 'C');
				$pdf->Cell(40,8, $nilai, 1,0, 'C');
				$pdf->Cell(45,8, $akumulasi, 1,0,'C');
				$pdf->Cell(40,8, $susut, 1,1,'C');
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
ob_clean();
	$pdf->Output();
	$pdf->Stream(array("Attachment" => FALSE));
?>

