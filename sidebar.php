<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
   header('location:login.php');
   die();
}
?>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title></title>
        <link href="assets/css/style.css" rel="stylesheet" />
    </head>
    <body>
    <aside id="left-panel" class="left-panel">
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">WELCOME [<?php echo $_SESSION['ADMIN_USERNAME']?>]</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="infrastructure.php">Infrastructure</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="application.php">Application</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="port.php">Port</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Sensitive File</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="#!">Other</a>
                    <?php if($_SESSION['ADMIN_ROLE']!=1){?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="users.php">Users</a>
				    <?php } ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="logout.php">Log Out</a>
                </div>
            </div>
    </aside>
    </body>
</html>