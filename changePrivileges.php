<?php
require('connection.inc.php');
if (isset($_GET['id'])) {
    // Assuming you have a valid database connection in $connection
    $userId = intval($_GET['id']); // Cast to integer to prevent SQL injection

    // Fetch the current role from the database
    $fetchRoleQuery = "SELECT role FROM admin_users WHERE id = ?";
    $stmt = mysqli_prepare($connection, $fetchRoleQuery);

    if ($stmt) {
        // Bind the parameter to the placeholder
        mysqli_stmt_bind_param($stmt, "i", $userId);

        // Execute the statement
        if (mysqli_stmt_execute($stmt)) {
            // Bind the result variable
            mysqli_stmt_bind_result($stmt, $currentRole);

            // Fetch the result
            mysqli_stmt_fetch($stmt);

            // Close the statement
            mysqli_stmt_close($stmt);

            if ($currentRole === null) {
                echo "<script>
                alert('User not found');
                window.location.href='users.php';
                </script>";
                exit(); // Exit early if user not found
            }

            // Determine the new role based on the current role
            $newRole = ($currentRole == 'user') ? 'admin' : 'user';

            // Update the role in the database
            $updateRoleQuery = "UPDATE admin_users SET role = ? WHERE id = ?";
            $stmt = mysqli_prepare($connection, $updateRoleQuery);

            if ($stmt) {
                // Bind parameters for the update query
                mysqli_stmt_bind_param($stmt, "si", $newRole, $userId);

                // Execute the update statement
                if (mysqli_stmt_execute($stmt)) {
                    echo "<script>
                    alert('Data berhasil diubah');
                    window.location.href='users.php';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal diubah');
                    window.location.href='users.php';
                    </script>";
                }

                // Close the update statement
                mysqli_stmt_close($stmt);
            } else {
                echo "<script>
                alert('Preparation failed');
                window.location.href='users.php';
                </script>";
            }
        } else {
            echo "<script>
            alert('Error fetching current role');
            window.location.href='users.php';
            </script>";
        }
    } else {
        echo "<script>
        alert('Preparation failed');
        window.location.href='users.php';
        </script>";
    }

    // Close the database connection when done
    mysqli_close($connection);
}


?>