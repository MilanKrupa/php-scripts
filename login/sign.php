<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./style/style.css" />
    <title>Login layout</title>
</head>

<body>
    <?php

        $login = $_POST['rlogin'];
        $password = $_POST['rpassword'];
        $passwordCheck = $_POST['passwordCheck'];

        if (strlen($password) < 8) {
            echo "<p>Your password is too short. Minimum 8 characters.<p/>";
        }else if($password !== $passwordCheck){
            echo "<p>Passwords differ.<p/>";
        }
        else {

            $connection = new mysqli("localhost", "root", "") or die('Sorry, we could not connect to our database');
            $connection -> set_charset("utf8");
            $createdb = "CREATE DATABASE users";
            $connection -> query($createdb);
            $connection -> select_db("users");
            $createTable = "CREATE TABLE data(
                id INT PRIMARY KEY AUTO_INCREMENT,
                login VARCHAR(30) NOT NULL,
                password VARCHAR(30) NOT NULL)";
            $connection->query($createTable);

            $validate = $connection->query("SELECT `login` FROM `data`");

            if ($validate->num_rows > 0) {
                $flag  = false;
                while ($row = $validate->fetch_assoc()) {
                    $row['login']==$login?$flag=true:null;
                }
                if ($flag) {
                    echo "<p>This user already exist. Choose different login.</p>";
                    return 0;
                } else {
                    $insert = "INSERT INTO data VALUES(
                        '',
                        '$login',
                        '$password'
                        )";

                    if ($connection->query($insert)) {
                        echo "<p>Successfully registered!</p>";
                    } else {
                        echo "<p>Something went wrong. Try again later.</p>";
                    }
                }
            } else {
                $insert = "INSERT INTO data VALUES(
                    '',
                    '$login',
                    '$password'
                    )";

                if ($connection -> query($insert)) {
                    echo "<p>Successfully registered!</p>";
                } else {
                    echo "<p>Something went wrong. Try again later.</p>";
                }
            }
            $connection->close();
        }

    ?>
</body>

</html>