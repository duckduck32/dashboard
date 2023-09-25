<?php
function isAdmin(){
	if(!isset($_SESSION['ADMIN_LOGIN'])){
	?>
		<script>
		window.location.href='login.php';
		</script>
		<?php
	}
	if($_SESSION['ADMIN_ROLE']=="user"){
		?>
		<script>
		window.location.href='logout.php';
		</script>
		<?php
	}
}

function isSecurity(){
	if(!isset($_SESSION['ADMIN_LOGIN'])){
		?>
			<script>
			window.location.href='login.php';
			</script>
			<?php
		}
		if($_SESSION['ADMIN_TEAM']!="sec"){
			?>
			<script>
			window.location.href='logout.php';
			</script>
			<?php
		}
}

$criticalInfra = mysqli_query($connection, "SELECT SUM(count) FROM infra_vulns WHERE severity = 'Critical'");

?>