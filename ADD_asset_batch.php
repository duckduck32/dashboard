<?php
require('sidebar.php');
?>

<div class="content pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"> <strong>ADD ASSETS</strong> <small></small>
                    <form action="UPLOAD_assets.php" method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <tr>
                                    Select CSV file to upload:
                                    <input type="file" name="fileToUpload" id="fileToUpload">
                                    <input type="submit" value="Upload CSV" name="submit">
                                </tr>
                            </div>
                        </div>
                    </form>
                        <div class="form-group">
                            <a href="failed_scans.php" style="display: block; width: 100%; text-align: center;">
                            <button class="form-control" style="margin-top: 10vh;">Back</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
