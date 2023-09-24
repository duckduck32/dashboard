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
$pdf->SetFont('Arial','B',14);

$queryCritical = "SELECT SUM(count) AS total_count FROM infra_vulns WHERE severity = 'Critical'";
$resultCritical = $connection->query($queryCritical);
if ($resultCritical){
    $row = $resultCritical->fetch_assoc();
    $totalCritical= $row['total_count'];
}

$queryHigh = "SELECT SUM(count) AS total_count FROM infra_vulns WHERE severity = 'High'";
$resultHigh = $connection->query($queryHigh);
if ($resultCritical){
    $row = $resultHigh->fetch_assoc();
    $totalHigh= $row['total_count'];
}

$queryMedium = "SELECT SUM(count) AS total_count FROM infra_vulns WHERE severity = 'Medium'";
$resultMedium = $connection->query($queryMedium);
if ($resultMedium){
    $row = $resultMedium->fetch_assoc();
    $totalMedium= $row['total_count'];
}

$queryLow = "SELECT SUM(count) AS total_count FROM infra_vulns WHERE severity = 'Low'";
$resultLow = $connection->query($queryLow);
if ($resultLow){
    $row = $resultLow->fetch_assoc();
    $totalLow= $row['total_count'];
}


$pdf->setLeftMargin(75);
$pdf->Cell(35,5,'Severity',1,0,'C');
$pdf->Cell(30,5,'Count',1,1,'C');
$pdf->Cell(35,5,'Critical',1,0,'C');
$pdf->Cell(30,5,$totalCritical,1,1,'C');
$pdf->Cell(35,5,'High',1,0,'C');
$pdf->Cell(30,5,$totalHigh,1,1,'C');
$pdf->Cell(35,5,'Medium',1,0,'C');
$pdf->Cell(30,5,$totalMedium,1,1,'C');
$pdf->Cell(35,5,'Low',1,0,'C');
$pdf->Cell(30,5,$totalLow,1,1,'C');

/*
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
*/

$pdf->Output();
?>

