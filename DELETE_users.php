<?php
require('connection.inc.php');
if(isset($_GET['id'])){
	mysqli_query($connection, "delete from admin_users where id='$_GET[id]'");
	echo "<script>
    alert('Data berhasil dihapus');
    window.location.href='users.php';
    </script>";
}
?>