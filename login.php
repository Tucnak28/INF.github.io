<?php
//Já mám rád vypisování do konzole :(
function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}
?>

<html lang='cs'>
<head>
    <title>Chebunet - Login</title>
    <link href='images/favicon.png' rel='shortcut icon' type='image/png'>
    <link type="text/css" href="style.css" rel="stylesheet">
    <meta charset="UTF-8">
</head>
<body>
<h1 style="text-align: center">Login</h1>
<form action="" method="post">
    <fieldset class="formLogin">
        <label for="username" style="text-align: center">Username:
            <input type="text" name="username" class="loginInput">
        </label>
        <br><br>
        <label for="password" style="text-align: center">Password:<br>
            <input type="password" name="password" class="loginInput">
        </label>
        <input type="submit" name="login" value="Login" id="loginButton">

        <?php
        $hostname = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "dat_3b";

        if (!$_POST) return;

        if(isset($_POST["login"])) {
            $connection = mysqli_connect($hostname, $db_username, $db_password, $database)
            or die("Problém");
            mysqli_set_charset($connection, "utf8mb4");

            $username = $_POST["username"];
            $password = $_POST["password"];

            $query = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($connection, $query);

            echo "<div class = 'notification'>";
            if (mysqli_num_rows($result) > 0) {
                echo "Login je správný! Vítej, $username.<br>";
            } else {
                echo "Špatné heslo nebo jméno.<br>";
            }
            echo "</div>";

            mysqli_close($connection);
        }
        ?>
    </fieldset>
</form>
</body>
</html>
