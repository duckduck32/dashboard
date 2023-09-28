<?php
require('fpdf186/fpdf.php');
require('connection.inc.php');


class PDF extends FPDF {
    // Page header
    function Header() {
        // Set font and font size for the header
        $this->SetFont('Arial', 'B', 12);

        // Title
        $this->Cell(0, 10, 'Infrastructure Reports', 0, 1, 'C');
    }

    // Page footer
    function Footer() {
        // Position at 1.5 cm from the bottom
        $this->SetY(-15);

        // Set font and font size for the footer
        $this->SetFont('Arial', '', 8);

        // Page number
        $this->Cell(0, 10, 'Page ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF('p', 'mm', 'A4');
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



$pdf->Cell(150,5,'Severity',1,0,'C');
$pdf->Cell(30,5,'Count',1,1,'C');
$pdf->SetFont('Arial','',10);
$pdf->Cell(150,5,'Critical',1,0,'C');
$pdf->Cell(30,5,$totalCritical,1,1,'C');
$pdf->Cell(150,5,'High',1,0,'C');
$pdf->Cell(30,5,$totalHigh,1,1,'C');
$pdf->Cell(150,5,'Medium',1,0,'C');
$pdf->Cell(30,5,$totalMedium,1,1,'C');
$pdf->Cell(150,5,'Low',1,0,'C');
$pdf->Cell(30,5,$totalLow,1,1,'C');

$chartX=10;
$chartY=50;

$chartWidth=150;
$chartHeight=100;

$chartTopPadding=20;
$chartLeftPadding=10;
$chartBottomPadding=20;
$chartRightPadding=5;

$chartBoxX=$chartX+$chartLeftPadding;
$chartBoxY=$chartY+$chartTopPadding;
$chartBoxWidth=$chartWidth-$chartLeftPadding-$chartRightPadding;
$chartBoxHeight=$chartHeight-$chartTopPadding-$chartBottomPadding;

$barWidth=20;

$data=Array(
    'Critical'=>[
        'color'=>[255,0,0],
        'value'=>$totalCritical
    ],
    'High'=>[
        'color'=>[255,100,0],
        'value'=>$totalHigh
    ],
    'Medium'=>[
        'color'=>[255,175,0],
        'value'=>$totalMedium
    ],
    'Low'=>[
        'color'=>[255,255,0],
        'value'=>$totalLow
    ]
    );

$dataMax=0;
foreach($data as $item){
    if($item['value']>$dataMax)$dataMax=$item['value'];
}
$dataStep=50;
$pdf->SetFont('Arial','',9);
$pdf->SetLineWidth(0,2);
$pdf->SetDrawColor(0);

$pdf->Rect($chartX,$chartY,$chartWidth,$chartHeight);

$pdf->Line(
    $chartBoxX,
    $chartBoxY,
    $chartBoxX,
    $chartBoxY+$chartBoxHeight
);

$pdf->Line(
    $chartBoxX-1,
    $chartBoxY+$chartBoxHeight,
    $chartBoxX+$chartBoxWidth,
    $chartBoxY+$chartBoxHeight
);

$yAxisUnits=$chartBoxHeight / $dataMax;

for ($i=0;$i<=$dataMax;$i+=$dataStep){
    $yAxisPos=$chartBoxY + ($yAxisUnits * $i);
    $pdf->Line(
        $chartBoxX-1,
        $yAxisPos,
        $chartBoxX,
        $yAxisPos
    );
    //posisi "-" di y
    $pdf->SetXy($chartBoxX - $chartLeftPadding, $yAxisPos-2);
    //tulisan sesuai "-"
    $pdf->Cell($chartLeftPadding-4,5,$dataMax-$i,0);
}

$pdf->SetXy($chartBoxX,$chartBoxY+$chartBoxHeight);

$xLabelWidth=$chartBoxWidth/count($data);

$barXPos=0;
foreach($data as $itemName=>$item){
    $pdf->Cell($xLabelWidth,4,$itemName,0,0,'C');

    $pdf->SetFillColor($item['color'][0],$item['color'][1],$item['color'][2]);
    $barHeight=$yAxisUnits * $item['value'];

    $barX=($xLabelWidth/2)+($xLabelWidth*$barXPos);
    $barX=$barX-($barWidth/2);
    $barX=$barX+$chartBoxX;

    $barY=$chartBoxHeight-$barHeight;
    $barY=$barY+$chartBoxY;

    $pdf->Rect($barX,$barY,$barWidth,$barHeight,'DF');

    $barXPos++;
}



$pdf->Output();
?>

