<?php
require('connection.inc.php');
require('functions.inc.php');

$msg_error='';

if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($connection,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$row=mysqli_fetch_assoc($res);
			$_SESSION['ADMIN_LOGIN']='yes';
			$_SESSION['ADMIN_ID']=$row['id'];
			$_SESSION['ADMIN_USERNAME']=$username;
			$_SESSION['ADMIN_ROLE']=$row['role'];
			header('location:index.php');
			die();
	}
   else{
		$msg_error='MOHON MASUKKAN KREDENSIAL YANG BENAR';	
	}
}
?>

<!doctype html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Dashboard Login</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="assets/css/bootstrap.min.css">
      <link rel="stylesheet" href="assets/css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
   </head>

<style>
body{
	background-image: url(images/astra_cropped.png);
   background-repeat: no-repeat;
   background-size: cover;
</style>

<div class="d-flex flex-row-reverse">
   <div class="login-form h-100vh d-inline-block bg-white m-3">
      <form method="POST">
      <div class="loginTitle p-3">
         <label><h5><b>VM Dashboard</b></h5></label><br><br>
      </div>
         <div class="form-group p-3">
            <label><b>USERNAME</b></label>
            <input type="text" name="username" class="form-control" placeholder="" required>
         </div>
         <div class="form-group m-3">
            <label><b>PASSWORD</b></label>
            <input type="password" name="password" class="form-control" placeholder="" required>
         </div>
         <div class="submit-login m-3">
         <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">SIGN IN</button>
         </div>
		</form>
		<div class="field_error text-danger m-3"><?php echo $msg_error?></div>
   </div>
</div>
</html>