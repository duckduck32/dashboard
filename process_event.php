<?php

require('connection.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $event_date = $_POST["event_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $event_name = $_POST["event_name"];

    // Insert the event into the database
    $sql = "INSERT INTO events (user_id, event_date, start_time, end_time, event_name)
            VALUES ($user_id, '$event_date', '$start_time', '$end_time', '$event_name')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>
        alert('Vincent jadi gg gaming');
        window.location.href='scheduler.php';
        </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
