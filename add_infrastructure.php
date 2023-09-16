<?php
require('sidebar.php');
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>ADD INFRASTRUCTURE VULNERABIILITY</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="plugin_id" class="form-control-label">Plugin ID</label>
                                <td><input type="number" name="plugin_id" class="form-control" placeholder="Plugin ID" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="vulnerability" class="form-control-label">Vulnerability</label>
                                <td><input type="text" name="vulnerability" class="form-control" placeholder="Vulnerability" required></td>
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
                                <td><input type="text" class="form-control" name="hostname" id="" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="ip" class="form-control-label">IP</label>
                                <td><input type="text" name="ip" class="form-control" id="" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="count" class=" form-control-label">Count</label>
                                <td><input type="number" name="count" class="form-control" id="" required></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="count" class=" form-control-label">Date Found</label>
                                <td><input type="date" name="date_found" class="form-control" id="" required></td>
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
                                <td><button class="form-control"><a href="infrastructure.php">Back</a></button></td>
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
    if($date_found > $current_date){
        echo "<script>
        alert('Data tidak berhasil ditambahkan karena tanggal Date found melebihi tanggal hari ini');
        window.location.href='add_infrastructure.php';
        </script>";
    }
    else{
        mysqli_query($connection, "insert into infra_vulns set
        status = 'Open',
        plugin_id = '$_POST[plugin_id]',
        vulnerability = '$_POST[vulnerability]',
        severity = '$_POST[severity]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        count = '$_POST[count]',
        date_found = '$_POST[date_found]',
        date_remediated = '0000-00-00'");
        echo "<script>
        alert('Data berhasil ditambahkan');
        window.location.href='infrastructure.php';
        </script>";
    }
    
}

?>