<?php
require('sidebar.php');
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
            <div class="card">
                <div class="card-header"> <strong>ADD INFRA VULNERABIILITY</strong> <small></small>
                <form action="UPLOAD_infra.php" method="post" enctype="multipart/form-data">
                    <div class="card-body card-block">
                        <div class="form-group">
                            <tr>
                                Select CSV file to upload:
                                <input type="file" name="fileToUpload" id="fileToUpload">
                                <input type="submit" value="Upload CSV" name="submit">
                            </tr>
                            <tr>
                                <td><button class="form-control" style="margin-top:10vh;"><a href="infrastructure.php">Back</a></button></td>
                            </tr>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>