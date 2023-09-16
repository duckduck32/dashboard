<?php
require('connection.inc.php');
if(isset($_GET['id'])){
	mysqli_query($connection, "delete from infra_vulns where id='$_GET[id]'");
	echo "<script>
    alert('Data berhasil dihapus');
    window.location.href='infrastructure.php';
    </script>";
}
?>