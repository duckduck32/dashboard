
<?php
    require('sidebar.php');
    $sql = mysqli_query($connection, "select * from infra_vulns where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>EDIT INFRASTRUCTURE VULNERABIILITY</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="status" class="form-control-label">Open</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="Open">Open</option>
                                    <option value="Close">Close</option>
                                </select>
                            </tr>
                        </div> 
                        <div class="form-group">
                            <tr>
                                <label for="plugin_id" class="form-control-label">Plugin ID</label>
                                <td><input type="number" name="plugin_id" class="form-control" value="<?php echo $data['plugin_id']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="vulnerability" class="form-control-label">Vulnerability</label>
                                <td><input type="text" name="vulnerability" class="form-control" value="<?php echo $data['vulnerability']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="severity" class="form-control-label">Severity</label>
                                <select id="severity" name="severity" class="form-control">
                                    <option value="Critical">Critical</option>
                                    <option value="High">High</option>
                                    <option value="Medium">Medium</option>
                                    <option value="Low">Low</option>
                                </select>
                            </tr>
                        </div>    
                        <div class="form-group">
                            <tr>
                                <label for="hostname" class="form-control-label">Hostname</label>
                                <td><input type="text" class="form-control" name="hostname" value="<?php echo $data['hostname']; ?>"></td>
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
                                <label for="count" class=" form-control-label">Count</label>
                                <td><input type="number" name="count" class="form-control" value="<?php echo $data['count']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="date_found" class=" form-control-label">Date Found</label>
                                <td><input type="date" name="date_found" class="form-control" value="<?php echo $data['date_found']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="date_remediated" class=" form-control-label">Date Remediated</label>
                                <td><input type="date" name="date_remediated" class="form-control" value="<?php echo $data['date_remediated']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="assign_to" class=" form-control-label">Assigned To</label>
                                <td><input type="text" name="assign_to" class="form-control" value="<?php echo $data['assigned_to']; ?>"></td>
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
                                <td><input type="submit" name="done" value="Close Case" class="form-control" id=""></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td></td>
                                <td><input type="button" name="back" value="Back" class="form-control" id="" onclick="window.location.href='infrastructure.php';"></td>
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
    $current_date = date('Y-m-d');
    $date_found = $_POST['date_found'];
    $date_remediated = $_POST['date_remediated'];
    if($date_found > $current_date){
        echo "<script>
        alert('Data tidak berhasil diubah karena tanggal Date found melebihi tanggal hari ini');
        window.location.href='infrastructure.php';
        </script>";
    }
    if($date_remediated > $current_date){
        echo "<script>
        alert('Data tidak berhasil diubah karena tanggal Date Remediated melebihi tanggal hari ini');
        window.location.href='infrastructure.php';
        </script>";
    }
    else{
        mysqli_query($connection, "update infra_vulns set
        status = '$_POST[status]',
        plugin_id = '$_POST[plugin_id]',
        vulnerability = '$_POST[vulnerability]',
        severity = '$_POST[severity]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        count = '$_POST[count]',
        date_found = '$_POST[date_found]',
        date_remediated = '$_POST[date_remediated]',
        assign_to = '$_POST[assign_to]',
        where id = '$_GET[id]'");
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='infrastructure.php';
        </script>";
    }
    
}

else if (isset($_POST['done'])) {
    $current_date = date('Y-m-d');
    $date_found = $_POST['date_found'];
    if($date_found > $current_date){
        echo "<script>
        alert('Data tidak berhasil diubah karena tanggal Date found melebihi tanggal hari ini');
        window.location.href='infrastructure.php';
        </script>";
    }
    else{
        mysqli_query($connection, "update infra_vulns set
        status = 'Close',
        plugin_id = '$_POST[plugin_id]',
        vulnerability = '$_POST[vulnerability]',
        severity = '$_POST[severity]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        count = '0',
        date_found = '$_POST[date_found]',
        date_remediated = '$current_date',
        assign_to = '$_POST[assign_to]'
        where id = '$_GET[id]'");
        echo "<script>
        alert('Data berhasil diclose');
        window.location.href='infrastructure.php';
        </script>";
    }
   
}
?>