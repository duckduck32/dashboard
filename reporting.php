<?php
require('fpdf186/fpdf.php');
require('connection.inc.php');


class PDF extends FPDF {
    // Page header
    function Header() {
        // Set font and font size for the header
        $this->SetFont('Arial', 'I', 8);

        // Title
        $this->Cell(0, 10, 'Confidential - This documents is limited and only for Asuransi Astra', 0, 1, 'R');
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
//halaman 1
$pdf->addPage();
$pdf->SetFont('Arial','B',20);

$current_date_up = date('M Y');
$current_date_down = date('d M, Y');
$pdf->SetLeftMargin(90);
$pdf->Cell(40,20,"Monthly Report Vulnerability Assessment",0,1,'C');
$pdf->Cell(40,20,"Infrastructure",0,1,'C');
$pdf->Cell(40,20,$current_date_up,0,1,'C');

$pdf->Image('images/astra.png',65,110,100);
$pdf->Cell(40,120,"",0,1,'C');

$pdf->Cell(40,20,"IT Security",0,1,'C');
$pdf->Cell(40,30,"Date Issued:",0,1,'C');
$pdf->Cell(40,0,$current_date_down,0,0,'C');
$pdf->SetLeftMargin(10);
//halaman 2
$pdf->addPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,20,"Confidentiality Notice",0,1,'L');

$pdf->SetFont('Arial','',12);
$pdf->Cell(40,5,"Laporan ini berisikan informasi sensitif dan rahasia. Tindakan pencegahan harus diambil untuk",0,1,'L');
$pdf->Cell(40,5,"melindungi kerahasiaan informasi dalam dokumen ini. Publikasi laporan ini dapat meningkatkan",0,1,'L');
$pdf->Cell(40,5,"efisiensi dan management dari Vulnerability Assessment dalam lingkungan Asuransi Astra. IT",0,1,'L');
$pdf->Cell(40,5,"Security hanya bertanggung jawab dalam melakukan analisa dan pemberian rekomendasi.",0,1,'L');
$pdf->Cell(40,5,"terhadap tindakan lanjut terkait proses remediasi",0,1,'L');

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,20,"Disclaimer",0,1,'L');

$pdf->SetFont('Arial','',12);
$pdf->Cell(40,5,"Perhatian, bahwa hasil dalam laporan ini merupakan temuan berdasarkan scanning langsung",0,1,'L');
$pdf->Cell(40,5,"dari Vulnerability Assessment yang dilakukan oleh Tim Security. Scanning Infrastruktur",0,1,'L');
$pdf->Cell(40,5,"dijalankan sebanyak 1 kali dalam sebulan dan Open Port Scanning dilakukan sebanyak 2 kali",0,1,'L');
$pdf->Cell(40,5,"dalam sebulan dan laporan ini hanya berisikan bukti-bukti temuan terkait Vulnerability",0,1,'L');
$pdf->Cell(40,5,"Assessment yang belum sesuai dengan best practice dari analisis tim IT Security.",0,1,'L');

$pdf->SetFont('Arial','B',16);
$pdf->Cell(40,20,"Executive Summary",0,1,'L');

$pdf->SetFont('Arial','',12);
$pdf->Cell(40,5,"IT Security melakukan scanning terhadap semua aset-aset Infrastruktur yang dimiliki oleh",0,1,'L');
$pdf->Cell(40,5,"Asuransi Astra. Dalam dokumen ini terdapat beberapa temuan yang menyatakan aset-aset",0,1,'L');
$pdf->Cell(40,5,"Asuransi Astra masih belum efisien dan belum sesuai dengan best practice dimana bisa",0,1,'L');
$pdf->Cell(40,5,"menimbulkan celah keamanan dari sisi user access. Untuk setiap temuan juga sudah diberikan",0,1,'L');
$pdf->Cell(40,5,"rekomendasi yang bisa dilakukan untuk meremediasi rules-rules tersebut.",0,1,'L');

$pdf->Cell(140,50,"Pelaksana",0,0,'L');
$pdf->Cell(40,50,"Pemeriksa",0,1,'R');

$pdf->Cell(140,50,"IT Security",0,0,'L');
$pdf->Cell(40,50,"Manager",0,1,'R');

//halaman 3
$pdf->addPage();
$pdf->SetFont('Arial','B',18);

$pdf->Cell(40,10,"Infrastructure Reports",0,1);

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


$chartX=30;
$chartY=70;

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

//halaman 4
$pdf->addPage();
$pdf->SetFont('Arial','B',18);

$pdf->Cell(40,10,"Infrastructure Reports",0,1);

$pdf->SetFont('Arial','B',14);

$queryCritical = "SELECT count(*) AS total_count FROM app_vulns WHERE severity = 'Critical'";
$resultCritical = $connection->query($queryCritical);
if ($resultCritical){
    $row = $resultCritical->fetch_assoc();
    $totalCritical= $row['total_count'];
}

$queryHigh = "SELECT count(*) AS total_count FROM app_vulns WHERE severity = 'High'";
$resultHigh = $connection->query($queryHigh);
if ($resultCritical){
    $row = $resultHigh->fetch_assoc();
    $totalHigh= $row['total_count'];
}

$queryMedium = "SELECT count(*) AS total_count FROM app_vulns WHERE severity = 'Medium'";
$resultMedium = $connection->query($queryMedium);
if ($resultMedium){
    $row = $resultMedium->fetch_assoc();
    $totalMedium= $row['total_count'];
}

$queryLow = "SELECT count(*) AS total_count FROM app_vulns WHERE severity = 'Low'";
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


$chartX=30;
$chartY=70;

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

