
<?php
    require('sidebar.php');
    $sql = mysqli_query($connection, "select * from failed_scans where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>EDIT ASSETS</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="hostname" class="form-control-label">Hostname</label>
                                <td><input type="text" name="hostname" class="form-control" value="<?php echo $data['hostname']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="ip" class="form-control-label">IP</label>
                                <td><input type="text" name="ip" class="form-control" value="<?php echo $data['ip']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="domain" class="form-control-label">Domain</label>
                                <td><input type="text" name="domain" class="form-control" value="<?php echo $data['domain']; ?>"></td>
                            </tr>
                        </div>  
                        <div class="form-group">
                            <tr>
                                <label for="status_chart" class="form-control-label">Status</label>
                                <select id="status_chart" name="status_chart" class="form-control">
                                    <option value="Failed">Failed</option>
                                    <option value="Completed">Completed</option>
                                </select>
                            </tr>
                        </div>  
                        <div class="form-group">
                            <tr>
                                <label for="status_table" class=" form-control-label">Detail</label>
                                <td><input type="text" name="status_table" class="form-control" value="<?php echo $data['status_table']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="assigned_to" class=" form-control-label">Assigned To</label>
                                <td><input type="text" name="assigned_to" class="form-control" value="<?php echo $data['assigned_to']; ?>"></td>
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
                                <td><input type="button" name="back" value="Back" class="form-control" id="" onclick="window.location.href='failed_scans.php';"></td>
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
        mysqli_query($connection, "UPDATE failed_scans SET
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        domain = '$_POST[domain]',
        status_chart = '$_POST[status_chart]',
        status_table = '$_POST[status_table]',
        assigned_to = '$_POST[assigned_to]'
        WHERE id = '$_GET[id]'");
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='failed_scans.php';
        </script>";
    
}
?>