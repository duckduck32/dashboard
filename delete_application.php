<?php
require('connection.inc.php');
if(isset($_GET['id'])){
	mysqli_query($connection, "delete from app_vulns where id='$_GET[id]'");
	echo "Data telah terhapus";
	echo "<meta http-equiv=refresh content=1;URL='application.php'>";
}
?>