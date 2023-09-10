
<?php
    require('sidebar.php');
    $sql = mysqli_query($connection, "select * from app_vulns where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>EDIT APPLICATION VULNERABIILITY</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="status" class="form-control-label">Open</label>
                                <select id="status" name="status" class="form-control">
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                </select>
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
                                <label for="count" class=" form-control-label">Date Found</label>
                                <td><input type="date" name="date_found" class="form-control" value="<?php echo $data['date_found']; ?>"></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <label for="count" class=" form-control-label">Date Remediated</label>
                                <td><input type="date" name="date_remediated" class="form-control" value="<?php echo $data['date_remediated']; ?>"></td>
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
                                <td><input type="button" name="back" value="Back" class="form-control" id="" onclick="window.location.href='application.php';"></td>
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
    mysqli_query($connection, "update app_vulns set
    status = '$_POST[status]',
    vulnerability = '$_POST[vulnerability]',
    severity = '$_POST[severity]',
    hostname = '$_POST[hostname]',
    date_found = '$_POST[date_found]',
    date_remediated = '$_POST[date_remediated]'
    where id = '$_GET[id]'");


    echo "Data telah berhasil terupdate";
    echo "<meta http-equiv=refresh content=1;URL='application.php'>";
}

else if (isset($_POST['done'])) {
    $current_date = date('Y-m-d');
    mysqli_query($connection, "update app_vulns set
    status = 'Close',
    vulnerability = '$_POST[vulnerability]',
    severity = '$_POST[severity]',
    hostname = '$_POST[hostname]',
    date_found = '$_POST[date_found]',
    date_remediated = '$current_date'
    where id = '$_GET[id]'");


    echo "Case berhasil diclose";
    echo "<meta http-equiv=refresh content=1;URL='application.php'>";
}
?>