<?php
require('sidebar.php');
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>ADD USERS</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="username" class="form-control-label">Username</label>
                                <td><input type="text" name="username" class="form-control" id="" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="password" class=" form-control-label">Password</label>
                                <td><input type="text" name="password" class="form-control" id="" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="role" class="form-control-label">Privilege</label>
                                <select id="role" name="role" class="form-control">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </tr>
                        </div> 
                        <div class="form-group">
                            <tr>
                                <label for="team" class="form-control-label">Team</label>
                                <select id="team" name="team" class="form-control">
                                    <option value="sec">Security</option>
                                    <option value="sa">System Administrator</option>
                                    <option value="dev">Developer</option>
                                </select>
                            </tr>
                        </div> 
                        <div class="form-group">
                            <tr>
                                <td></td>
                                <td><input type="submit" name="proses" class="form-control" id=""></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td></td>
                                <td><button class="form-control"><a href="users.php">Back</a></button></td>
                            </tr>
                        </div>
                            
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php

if (isset($_POST['proses'])) {
        mysqli_query($connection, "insert into admin_users set
        username = '$_POST[username]',
        password = '$_POST[password]',
        role = '$_POST[role]',
        team = '$_POST[team]'");  
        echo "<script>
        alert('Data berhasil ditambahkan');
        window.location.href='users.php';
        </script>";
}

?>