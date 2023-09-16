<?php
require('sidebar.php');
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>ADD PORT VULNERABIILITY</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="open_port" class="form-control-label">Open Port</label>
                                <td><input type="number" name="open_port" class="form-control" placeholder="Open Port" required></td>
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
                                <td><button class="form-control"><a href="port.php">Back</a></button></td>
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
        window.location.href='add_port.php';
        </script>";
    }
    else{
        mysqli_query($connection, "insert into open_ports set
        status = 'Open',
        open_port = '$_POST[open_port]',
        priority = '$_POST[priority]',
        hostname = '$_POST[hostname]',
        ip = '$_POST[ip]',
        date_found = '$_POST[date_found]',
        date_remediated = '0000-00-00'");
        echo "<script>
        alert('Data berhasil ditambahkan');
        window.location.href='port.php';
        </script>";
    }
    
}

?>