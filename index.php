<?php
require('sidebar.php');

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

$sumHighApp_result = mysqli_query($connection, "SELECT SUM(count) FROM open_ports WHERE severity = 'High'");
$row = $sumHighApp_result->fetch_assoc();
$sumHighApp_value = (string)$row['SUM(count)'];
     
$sumMediApp_result = mysqli_query($connection, "SELECT SUM(count) FROM app_vulns WHERE severity = 'Medium'");
$row = $sumMediApp_result->fetch_assoc();
$sumMediApp_value = (string)$row['SUM(count)'];
     
$sumLowApp_result = mysqli_query($connection, "SELECT SUM(count) FROM app_vulns WHERE severity = 'Low'");
$row = $sumLowApp_result->fetch_assoc();
$sumLowApp_value = (string)$row['SUM(count)'];

$dataPoints3 = array(
    array("label"=> "High", "y"=> $sumHighApp_value),
    array("label"=> "Medium", "y"=> $sumMediApp_value),
    array("label"=> "Low", "y"=> $sumLowApp_value)
);

    $dataPoints4 = array(
        array("x"=> 10, "y"=> 41),
        array("x"=> 30, "y"=> 50),
        array("x"=> 50, "y"=> 41)
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
             text: "Simple Column Chart with Index Labels"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             //indexLabel: "{y}", //Shows y value on all Data Points
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
             text: "Simple Column Chart with Index Labels"
         },
         axisY:{
             includeZero: true
         },
         data: [{
             type: "column", //change type to bar, line, area, pie, etc
             //indexLabel: "{y}", //Shows y value on all Data Points
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