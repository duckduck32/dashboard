<?php
require('sidebar.php');
?>
<div class="content">
	<div class="row-xl-12">
		<div class="card">
			<div class="card-body">
				<h1 class="box-title">Summary</h1><br>
				<h4 class="box-title">Infrastructure Counts</h4>
			</div>
			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col">Severity</th>
      					<th scope="col">Count</th>
						<th scope="col">Over SLA Count</th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr>
      					<th scope="row">Critical</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Critical'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
						<td>asd</td>
    				</tr>
    				<tr>
      					<th scope="row">High</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'High'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
    				<tr>
      					<th scope="row">Medium</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Medium'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
					<tr>
      					<th scope="row">Low</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Low'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
  				</tbody>
			</table>

			<div class="card-body">
				<h4 class="box-title">Application</h4>
			</div>
			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col">Severity</th>
      					<th scope="col">Count</th>
						<th scope="col">Over SLA Count</th>
    				</tr>
  				</thead>
  				<tbody>
    				<tr>
      					<th scope="row">Critical</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Critical'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
    				<tr>
      					<th scope="row">High</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'High'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
    				<tr>
      					<th scope="row">Medium</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Medium'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
					<tr>
      					<th scope="row">Low</th>
      					<td><?php $sum=mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Low'"); while ($row = $sum->fetch_assoc()) {echo $row['SUM(count)']."<br>";} ?> </td>
    				</tr>
  				</tbody>
			</table>
	   </div>
	</div>
</div>
