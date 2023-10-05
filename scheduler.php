<?php
require('sidebar.php');
// require('connection.inc.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Event Scheduler</title>
    <style>
        .schedulerALL {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            text-align: center;
            width: 80%;
            padding-left: 100px;
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 100%;
        }
        table th, table td {
            padding: 2vh 7vh;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #007bff;
            color: #fff;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        form input[type="date"],
        form input[type="time"],
        form input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            font-size: 18px;
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            cursor: pointer;
        }
        form input[type="submit"]:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .success-message {
            color: #008000;
            font-weight: bold;
            margin-top: 10px;
        }
        ::-webkit-input-placeholder {
            font-size: 14px;
            color: #999;
        }
        ::-moz-placeholder {
            font-size: 14px;
            color: #999;
        }
        :-ms-input-placeholder {
            font-size: 14px;
            color: #999;
        }
        :-moz-placeholder {
            font-size: 14px;
            color: #999;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            table {
                font-size: 14px; /* Reduce font size for smaller screens */
            }
            table th, table td {
                padding: 1vh 2vh; /* Adjust cell padding for smaller screens */
            }
        }
    </style>
</head>
<body>
<div class="container">
        <h2>Event Scheduler</h2>
        <form method="post" action="process_event.php"> <!-- Update form action -->
            Date: <input type="date" name="event_date" placeholder="Select Date"><br>
            Start Time: <input type="time" name="start_time" placeholder="Select Start Time"><br>
            End Time: <input type="time" name="end_time" placeholder="Select End Time"><br>
            Event Name: <input type="text" name="event_name" placeholder="Enter Event Name"><br>
            <input type="submit" value="Schedule Event">
        </form>
        <?php

        // Query to fetch all scheduled events for the logged-in user
        $sql = "SELECT id, event_date, start_time, end_time, event_name FROM events";
        $result = $connection->query($sql);
        ?>
        <div class="schedulerALL">
        <!-- <h2>Scheduled Events</h2> -->
        <div> <!-- Wrap both the form and table in a div -->
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>Event Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Event Name</th>
                </tr>
                <?php
                // Loop through the query result and display events in a table
                $event_id = 1; // Initialize the event ID
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$event_id}</td>";
                    // Format the event_date using date() and strtotime()
                    $event_date_formatted = date('d F Y', strtotime($row['event_date']));
                    echo "<td>{$event_date_formatted}</td>";
                    echo "<td>{$row['start_time']}</td>";
                    echo "<td>{$row['end_time']}</td>";
                    echo "<td>{$row['event_name']}</td>";
                    echo "</tr>";
                    $event_id++; // Increment the event ID
                }
                ?>
            </table>
        </div>
        </div>
        <br>
    </div>
</body>
</html>