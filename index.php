<?php
require('sidebar.php');

$dataPoints = array(
	array("y" => 300878, "label" => "Venezuela"),
	array("y" => 266455, "label" => "Canada"),
	array("y" => 169709, "label" => "Iran"),
);

$link=mysqli_connect("localhost","root","","vulnerability_management");
mysqli_select_db($link,"vulnerability_management");

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

}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
</body>
</html>