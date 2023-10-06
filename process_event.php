<?php

require('connection.inc.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION["user_id"];
    $event_date = $_POST["event_date"];
    $start_time = $_POST["start_time"];
    $end_time = $_POST["end_time"];
    $event_name = $_POST["event_name"];

    // Convert start and end times to Unix timestamps for comparison
    $start_timestamp = strtotime($start_time);
    $end_timestamp = strtotime($end_time);

    // Check if end time is before start time
    if ($end_timestamp <= $start_timestamp) {
        echo "<script>
        alert('End time cannot be before or equal to start time.');
        window.location.href='scheduler.php';
        </script>";
        exit;
    }

    // Insert the event into the database
    $sql = "INSERT INTO events (user_id, event_date, start_time, end_time, event_name)
            VALUES ($user_id, '$event_date', '$start_time', '$end_time', '$event_name')";

    if ($connection->query($sql) === TRUE) {
        echo "<script>
        alert('Event scheduled successfully.');
        window.location.href='scheduler.php';
        </script>";
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}

$connection->close();
?>
