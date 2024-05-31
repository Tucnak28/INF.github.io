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
<a href="index.php" class="back-button">Zpět</a>

<div class="note">
    <h1>Control panel</h1>
    <h3>Username: admin</h3>
    <h3>Password: admin</h3>
</div>

<h1 style="text-align: center">Login</h1>
<form action="" method="post">
    <fieldset class="formLogin">
        <label for="username" style="text-align: center">Username:
            <input type="text" name="username" class="loginInput">
        </label>

        <label for="password" style="text-align: center">Password:<br>
            <input type="password" name="password" class="loginInput">
        </label>
        <input type="submit" name="login" value="Login" id="loginButton">
        <h4>Nemáš účet? Vytvořte si ho!</h4><a href="register.php" style="color: #003366;">Registrovat se</a>

        <?php
        $hostname = "localhost";
        $db_username = "root";
        $db_password = "";
        $database = "dat_3b";

        if (!$_POST) return;

        if(isset($_POST["login"])) {
            $connection = null;
            require_once "pripojit.php";

            $username = $_POST["username"];
            $password = $_POST["password"];

            if($username == "admin" && $password == "admin") {
                // pošl to na kontrlní panel
                header("Location: controlPanel.php");
                exit;
            }

            $query = "SELECT * FROM accounts WHERE username = '$username' AND password = '$password'";
            $result = mysqli_query($connection, $query);

            if(empty($username) || empty($password)) {
                echo "<div class='notification error-notification'>Musíte zadat i username i heslo.</div>";
                return;
            }

            echo "<div class='notification ";
            if (mysqli_num_rows($result) > 0) {
                echo "success-notification'>";
                echo "Login je správný! Vítej, $username.<br>";
            } else {
                echo "error-notification'>";
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
