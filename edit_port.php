
<?php
    require('sidebar.php');
    $sql = mysqli_query($connection, "select * from open_ports where id='$_GET[id]'");
    $data=mysqli_fetch_array($sql);
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>EDIT PORT VULNERABIILITY</strong> <small></small>
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
                                <label for="open_port" class="form-control-label">Open Port</label>
                                <td><input type="number" class="form-control" name="open_port" value="<?php echo $data['open_port']; ?>"></td>
                            </tr>
                        </div> 
                        <div class="form-group">
                            <tr>
                                <label for="priority" class="form-control-label">Priority</label>
                                <select id="priority" name="priority" class="form-control">
                                    <option value="Emergency">Emergency</option>
                                    <option value="Normal">Normal</option>
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
                                <td><input type="text" class="form-control" name="ip" value="<?php echo $data['ip']; ?>"></td>
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
                                <td><input type="submit" name="done" value="Close Case" class="form-control" id=""></td>
                            </tr>
                        </div>
                        <div class="form-group">
                            <tr>
                                <td></td>
                                <td><input type="button" name="back" value="Back" class="form-control" id="" onclick="window.location.href='port.php';"></td>
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
        alert('Data tidak berhasil diubah karena tanggal Date found melebihi tanggal hari ini');
        window.location.href='port.php';
        </script>";
    }
    else{
        mysqli_query($connection, "update open_ports set
        status = '$_POST[status]',
        open_port = '$_POST[open_port]',
        priority = '$_POST[priority]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        date_found = '$_POST[date_found]',
        date_remediated = '$_POST[date_remediated]',
        assigned_to = '$_POST[assigned_to]'
        where id = '$_GET[id]'");
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='port.php';
        </script>";
    }
    
}

else if (isset($_POST['done'])) {
    $current_date = date('Y-m-d');
    $date_found = $_POST['date_found'];
    if($date_found > $current_date){
        echo "<script>
        alert('Data tidak berhasil diubah karena tanggal Date found melebihi tanggal hari ini');
        window.location.href='port.php';
        </script>";
    }
    else{
        mysqli_query($connection, "update open_ports set
        status = 'Close',
        open_port = '$_POST[open_port]',
        priority = '$_POST[priority]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        date_found = '$_POST[date_found]',
        date_remediated = '$current_date',
        assigned_to = '$_POST[assigned_to]'

        where id = '$_GET[id]'");
    
    
        echo "<script>
        alert('Data berhasil diclose');
        window.location.href='port.php';
        </script>";
    }
    
}
?>