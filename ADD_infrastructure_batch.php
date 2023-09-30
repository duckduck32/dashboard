<!DOCTYPE html>
<html>
<head>
    <title>CSV Upload Form</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select CSV file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload CSV" name="submit">
    </form>
</body>
</html>
