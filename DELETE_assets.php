<?php
require('connection.inc.php');
if(isset($_GET['id'])){
	mysqli_query($connection, "delete from failed_scans where id='$_GET[id]'");
	echo "<script>
    alert('Data berhasil dihapus');
    window.location.href='failed_scans.php';
    </script>";
}
?>