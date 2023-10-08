<?php
require('sidebar.php');
// require('connection.inc.php');

$sumCritInfra_result = mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Critical'");
$row = $sumCritInfra_result->fetch_assoc();
$sumCritInfra_value = (string)$row['SUM(count)'];

$sumHighInfra_result = mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'High'");
$row = $sumHighInfra_result->fetch_assoc();
$sumHighInfra_value = (string)$row['SUM(count)'];

$sumMediInfra_result = mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Medium'");
$row = $sumMediInfra_result->fetch_assoc();
$sumMediInfra_value = (string)$row['SUM(count)'];

$sumLowInfra_result = mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Low'");
$row = $sumLowInfra_result->fetch_assoc();
$sumLowInfra_value = (string)$row['SUM(count)'];

$dataPoints1 = array(
    array("label"=> "Critical", "y"=> $sumCritInfra_value),
    array("label"=> "High", "y"=> $sumHighInfra_value),
    array("label"=> "Medium", "y"=> $sumMediInfra_value),
    array("label"=> "Low", "y"=> $sumLowInfra_value)
);

$sumHighApp_result = mysqli_query($connection, "SELECT SUM(count) FROM app_vulns WHERE severity = 'High'");
$row = $sumHighApp_result->fetch_assoc();
$sumHighApp_value = (string)$row['SUM(count)'];
     
$sumMediApp_result = mysqli_query($connection, "SELECT SUM(count) FROM app_vulns WHERE severity = 'Medium'");
$row = $sumMediApp_result->fetch_assoc();
$sumMediApp_value = (string)$row['SUM(count)'];
     
$sumLowApp_result = mysqli_query($connection, "SELECT SUM(count) FROM app_vulns WHERE severity = 'Low'");
$row = $sumLowApp_result->fetch_assoc();
$sumLowApp_value = (string)$row['SUM(count)'];

$dataPoints2 = array(
    array("label"=> "High", "y"=> $sumHighApp_value),
    array("label"=> "Medium", "y"=> $sumMediApp_value),
    array("label"=> "Low", "y"=> $sumLowApp_value)
);

$sumFTPdata_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 20");
$row = $sumFTPdata_result->fetch_assoc();
$sumFTP_data = (string)$row['SUM(count)'];
     
$sumFTP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 21");
$row = $sumFTP_result->fetch_assoc();
$sumFTP = (string)$row['SUM(count)'];
     
$sumSSH_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 22");
$row = $sumSSH_result->fetch_assoc();
$sumSSH = (string)$row['SUM(count)'];

$sumTelnet_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 23");
$row = $sumTelnet_result->fetch_assoc();
$sumTelnet = (string)$row['SUM(count)'];
     
$sumSMTP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port IN (25, 426)");
$row = $sumSMTP_result->fetch_assoc();
$sumSMTP = (string)$row['SUM(count)'];
     
$sumHTTP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 80");
$row = $sumHTTP_result->fetch_assoc();
$sumHTTP = (string)$row['SUM(count)'];

$sumNTP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 123");
$row = $sumNTP_result->fetch_assoc();
$sumNTP = (string)$row['SUM(count)'];
     
$sumNetbiosns_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 137");
$row = $sumNetbiosns_result->fetch_assoc();
$sumNetbios_ns = (string)$row['SUM(count)'];
     
$sumNetbiosdgm_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 138");
$row = $sumNetbiosdgm_result->fetch_assoc();
$sumNetbios_dgm = (string)$row['SUM(count)'];

$sumNetbiosssn_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 139");
$row = $sumNetbiosssn_result->fetch_assoc();
$sumNetbios_ssn = (string)$row['SUM(count)'];
     
$sumSNMP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port IN (161, 162)");
$row = $sumSNMP_result->fetch_assoc();
$sumSNMP = (string)$row['SUM(count)'];
     
$sumSMB_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 445");
$row = $sumSMB_result->fetch_assoc();
$sumSMB = (string)$row['SUM(count)'];

$sumhttpalt_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port IN (591, 8008, 8080)");
$row = $sumhttpalt_result->fetch_assoc();
$sumHttp_alt = (string)$row['SUM(count)'];
     
$sumNTPclient_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 1023");
$row = $sumNTPclient_result->fetch_assoc();
$sumNTP_client = (string)$row['SUM(count)'];
     
$sumMSsqls_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port IN (1433, 1434)");
$row = $sumMSsqls_result->fetch_assoc();
$sumMSsqls = (string)$row['SUM(count)'];

$sumOracle_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port IN (1521, 1832)");
$row = $sumOracle_result->fetch_assoc();
$sumOracle = (string)$row['SUM(count)'];
     
$sumMysql_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 3306");
$row = $sumMysql_result->fetch_assoc();
$sumMysql = (string)$row['SUM(count)'];
     
$sumRDP_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE open_port = 3389");
$row = $sumRDP_result->fetch_assoc();
$sumRDP = (string)$row['SUM(count)'];

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
        <button><a href="reporting.php">Export Data</a></button>
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
