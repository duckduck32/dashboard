<?php
require('fpdf186/fpdf.php');
require('connection.inc.php');

class PDF extends FPDF{
    function Header(){
        $this->SetFont('Arial','B',15);
        $this->Cell(100,10,'this is header');
    }
    function Footer(){
        $this->SetFont('Arial','B',15);
        $this->Cell(100,10,'this is footer');
    }
}

$pdf = new FPDF('p', 'mm', 'A4');
$pdf->addPage();
$pdf->SetFont('Arial','B',6);

$pdf->Cell(5,5,'ID',1,0);
$pdf->Cell(10,5,'Status',1,0);
$pdf->Cell(15,5,'Plugin ID',1,0,'C');
$pdf->Cell(32,5,'Vulnerability',1,0);
$pdf->Cell(12,5,'Severity',1,0);
$pdf->Cell(22,5,'Hostname',1,0);
$pdf->Cell(22,5,'IP',1,0);
$pdf->Cell(10,5,'Count',1,0);
$pdf->Cell(22,5,'Date Found',1,0);
$pdf->Cell(22,5,'Date Remediated',1,0);
$pdf->Cell(15,5,'Assigned To',1,0);
$pdf->Cell(10,5,'Status',1,1);

$query=mysqli_query($connection,"select * from infra_vulns");
while($data=mysqli_fetch_array($query)){
    $pdf->SetFont('Arial','',6);
    $pdf->Cell(5,5,$data['id'],1,0,'LR');
    $pdf->Cell(10,5,$data['status'],1,0);
    $pdf->Cell(15,5,$data['plugin_id'],1,0);
    if($pdf->GetStringWidth($data['vulnerability'])>65){
        $pdf->SetFont('Arial','',3);
        $pdf->Cell(32,5,$data['vulnerability'],1,0);
        $pdf->SetFont('Arial','',6);
    }
    else{
        $pdf->Cell(32,5,$data['vulnerability'],1,0);
    }
    $pdf->Cell(12,5,$data['severity'],1,0);
    $pdf->Cell(22,5,$data['hostname'],1,0);
    $pdf->Cell(22,5,$data['ip'],1,0);
    $pdf->Cell(10,5,$data['count'],1,0);
    $pdf->Cell(22,5,$data['date_found'],1,0);
    $pdf->Cell(22,5,$data['date_remediated'],1,0);
    $pdf->Cell(15,5,$data['assigned_to'],1,0);
    $pdf->Cell(10,5,$data['status'],1,1);
}

$pdf->Output();
?>

