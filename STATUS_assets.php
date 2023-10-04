
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
                <div class="card-header"> <strong>ASSET [<?php echo $data['id'];?>]</strong> <small></small>
                <form action="" method="post">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                <label for="status_table" class="form-control-label">Current Status</label>
                                <td><input type="text" name="status_table" class="form-control" value="<?php echo $data['status_table']; ?>"></td>
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
        status_table = '$_POST[status_table]'
        WHERE id = '$_GET[id]'");
        echo "<script>
        alert('Data berhasil diubah');
        window.location.href='failed_scans.php';
        </script>";
    }
?>