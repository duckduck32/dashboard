<?php
require('sidebar.php');

$dataPoints = array(
	array("y" => 300878, "label" => "Venezuela"),
	array("y" => 266455, "label" => "Canada"),
	array("y" => 169709, "label" => "Iran"),
);

$link=mysqli_connect("localhost","root","","vmdash_users");
mysqli_select_db($link,"vmdash_users");

$test=array ();

$count=0;
$res=mysqli_query($link, "select * from infra_vulns");
$sum=mysqli_query($link, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Critical'");
while($row=mysqli_fetch_array($res)){

	$test[$count]["label"]=$row["severity"];
	$test[$count]["y"]=$row["count"];
	$count=$count+1;
}

?>


<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "Top Oil Reserves"
	},
	axisY: {
		title: "Reserves(MMbbl)"
	},
	data: [{        
		type: "column",  
		showInLegend: true, 
		legendMarkerColor: "grey",
		// legendText: "MMbbl = one million barrels",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

<<<<<<< Updated upstream
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>
=======
$sumPostgresql_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 5432");
$row = $sumPostgresql_result->fetch_assoc();
$sumPostgreSQL = (string)$row['SUM(count)'];
     
$sumVNC_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 5800");
$row = $sumVNC_result->fetch_assoc();
$sumVNC = (string)$row['SUM(count)'];

$dataPoints3 = array(
    array("label"=> "FTP Data", "y"=> $sumFTP_data),
    array("label"=> "FTP", "y"=> $sumFTP),
    array("label"=> "SSH", "y"=> $sumSSH),
    array("label"=> "Telnet", "y"=> $sumTelnet),
    array("label"=> "SMTP", "y"=> $sumSMTP),
    array("label"=> "HTTP", "y"=> $sumHTTP),
    array("label"=> "NTP", "y"=> $sumNTP),
    array("label"=> "Netbios-ns", "y"=> $sumNetbios_ns),
    array("label"=> "Netbios-dgm", "y"=> $sumNetbios_dgm),
    array("label"=> "Netbios-ssn", "y"=> $sumNetbios_ssn),
    array("label"=> "SNMP", "y"=> $sumSNMP),
    array("label"=> "SMB", "y"=> $sumSMB),
    array("label"=> "HTTP-alt", "y"=> $sumHttp_alt),
    array("label"=> "NTP-client", "y"=> $sumNTP_client),
    array("label"=> "MS-SQL-S", "y"=> $sumMSsqls),
    array("label"=> "Oracle", "y"=> $sumOracle),
    array("label"=> "MySQL", "y"=> $sumMysql),
    array("label"=> "RDP", "y"=> $sumRDP),
    array("label"=> "PostgreSQL", "y"=> $sumPostgreSQL),
    array("label"=> "VNC", "y"=> $sumVNC)
);

$sumAsetFailed_result = mysqli_query($connection, "SELECT SUM(count) FROM failed_scans WHERE status_chart = 'Failed'");
$row = $sumAsetFailed_result->fetch_assoc();
$sumAsetFailed = (string)$row['SUM(count)'];

$sumAsetCompleted_result = mysqli_query($connection, "SELECT SUM(count) FROM failed_scans WHERE status_chart = 'Completed'");
$row = $sumAsetCompleted_result->fetch_assoc();
$sumAsetCompleted = (string)$row['SUM(count)'];

    $dataPoints4 = array(
        array("label"=> "Failed", "y"=> $sumAsetFailed),
        array("label"=> "Completed", "y"=> $sumAsetCompleted)
    );
         
     ?>
     <!DOCTYPE HTML>
     <html>
     <head>  
     <script>
     window.onload = function () {
      
     var chart = new CanvasJS.Chart("chartContainer", {
         animationEnabled: true,
         exportEnabled: true,
         theme: "light1", // "light1", "light2", "dark1", "dark2"
         title:{
             text: "Infrastructure Vulnerability Counts"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             indexLabel: "{y}", //Shows y value on all Data Points
             indexLabelFontColor: "#5A5757",
             indexLabelPlacement: "outside",   
             dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();

     var chart = new CanvasJS.Chart("chartContainer2", {
         animationEnabled: true,
         exportEnabled: true,
         theme: "light1", // "light1", "light2", "dark1", "dark2"
         title:{
             text: "Application Vulnerability Counts"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             indexLabel: "{y}", //Shows y value on all Data Points
             indexLabelFontColor: "#5A5757",
             indexLabelPlacement: "outside",   
             dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();

     var chart = new CanvasJS.Chart("chartContainer3", {
         animationEnabled: true,
         exportEnabled: true,
         theme: "light1", // "light1", "light2", "dark1", "dark2"
         title:{
             text: "Open Ports Summary"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             indexLabel: "{y}", //Shows y value on all Data Points
             indexLabelFontColor: "#5A5757",
             indexLabelPlacement: "outside",   
             dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
      
     var chart = new CanvasJS.Chart("chartContainer4", {
         animationEnabled: true,
         exportEnabled: true,
         theme: "light1", // "light1", "light2", "dark1", "dark2"
         title:{
             text: "Asset Scanning Summary"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             indexLabel: "{y}", //Shows y value on all Data Points
             indexLabelFontColor: "#5A5757",
             indexLabelPlacement: "outside",   
             dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
         }]
     });
     chart.render();
     }
     </script>
     </head>
     <body>
        <div class="content">
            <div class="row" id="container">
            <div id="chartContainer" style="height: 370px; width: 90%; margin: 50pt;"></div>
            <div id="chartContainer2" style="height: 370px; width: 90%; margin: 50pt"></div>
            <div id="chartContainer3" style="height: 370px; width: 90%; margin: 50pt"></div>
            <div id="chartContainer4" style="height: 370px; width: 90%; margin: 50pt"></div>
            </div>
        </div>
     <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
     </body>
     </html>                              
>>>>>>> Stashed changes
