<?php
$hostname = "localhost";
$db_username = "root";
$db_password = "";
$database = "dat_3b";

$connection = mysqli_connect($hostname, $db_username, $db_password, $database) or die("Problém");
mysqli_set_charset($connection, "utf8mb4");