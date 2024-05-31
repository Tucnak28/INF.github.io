<?php
$connection = null;
require_once "pripojit.php";

if (isset($_POST['username'])) {

    $username = $_POST['username'];


    $query = "DELETE FROM accounts WHERE username = '$username'";


    $result = mysqli_query($connection, $query);


    if ($result) {

        header("Location: controlPanel.php");
        exit;
    } else {
        echo "Failed to remove account.";
    }
} else {
    echo "Username not provided.";
}

mysqli_close($connection);
?>
