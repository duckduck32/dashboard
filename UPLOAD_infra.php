<?php
// Check if the form was submitted
if (isset($_POST["submit"])) {
    $target_dir = "assets/uploads/"; // Directory where the uploaded file will be stored
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $currentDate = date('Y-m-d');
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is a CSV file
    if ($fileType != "csv") {
        echo "Sorry, only CSV files are allowed.";
        $uploadOk = 0;
    }

    // If the file is valid, move it to the target directory
    if ($uploadOk) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Process the CSV file and insert data into MySQL
    if ($uploadOk) {
        $file = fopen($target_file, "r");
        if ($file) {
            $conn = new mysqli("localhost", "root", "", "vulnerability_management");

            // Check database connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Read and process CSV data
            while (($data = fgetcsv($file)) !== false) {
                $sql = "INSERT INTO infra_vulns (status, plugin_id, vulnerability, severity, hostname, ip, count, date_found) VALUES ('Open', '$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$currentDate')";

                if ($conn->query($sql) === true) {
                    echo "Record inserted successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }

            // Close the database connection and the CSV file
            $conn->close();
            fclose($file);
        }
        echo "<script>
        window.location.href='infrastructure.php';
        </script>";
    }
}
?>