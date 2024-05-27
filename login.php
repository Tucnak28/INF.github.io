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
        <title>Chebunet - register</title>

        <link href='images/favicon.png' rel='shortcut icon' type='image/png'>
        <link type="text/css" href="style.css" rel="stylesheet">
        <meta charset="UTF-8">


    </head>

    <body>
        <h1 style="text-align: center">Login</h1>
        <form action="" method="post" >
            <fieldset class="formLogin">
                <label for="username" style="text-align: center">Username:
                    <input type="text" name="username" class="loginInput">
                </label>

                <br><br>

                <label for="password" style="text-align: center">Password:<br>
                    <input type="password" name="password" class="loginInput">
                </label>

                <input type="submit" name="prihlasit" value="Přihlásit" id="loginButton">

                <?php
                $hostname = "localhost";
                $username = "root";
                if (!$_POST) return;

                if(isset($_POST["prihlasit"])) {
                    $connection = mysqli_connect($hostname, $username, "", "dat_3b")
                    or die("Problém");
                    mysqli_set_charset($connection, "utf8mb4");



                    $username = $_POST["username"];
                    $password = $_POST["password"];

                    $vyber = mysqli_query($connection, "select * from accounts");


                    echo "<div class = 'notification'>";
                        while($row = mysqli_fetch_assoc($vyber)) {
                            if ($row["username"] == $username) {
                                if($row["password"] != $password) {
                                    echo "špatné heslo<br>";
                                    return;
                                }
                            }
                        }


                    echo "</div>";


                    $prikaz = "CREATE TABLE IF NOT EXISTS accounts (id INT PRIMARY KEY AUTO_INCREMENT,     
                                username VARCHAR(50) NOT NULL,   
                                password VARCHAR(50) NOT NULL);";

                    $vysl = mysqli_query($connection, $prikaz);

                    if ($vysl) console_log("Tabulka je funkční");
                    else console_log("Zajimavý, někde je problém, nechtěla se vytvořit stránka. (Víte co? Mě to nezajíma)");

                    $prikaz = "insert into accounts (username, password) values('$username', '$password');";

                    $vysl = mysqli_query($connection, $prikaz);

                    mysqli_close($connection);
                }


                ?>






            </fieldset>
        </form>


    </body>

</html>



