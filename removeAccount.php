<?php
$connection = null;
require_once "pripojit.php";

// Check if username is provided in POST data
if (isset($_POST['username'])) {
    // Retrieve the username from POST data
    $username = $_POST['username'];

    // Construct SQL query to delete the account
    $query = "DELETE FROM accounts WHERE username = '$username'";

    // Execute the query
    $result = mysqli_query($connection, $query);

    // Check if the deletion was successful
    if ($result) {
        // Redirect back to the control panel page
        header("Location: controlPanel.php");
        exit;
    } else {
        echo "Failed to remove account.";
    }
} else {
    echo "Username not provided.";
}

// Close database connection
mysqli_close($connection);
?>
