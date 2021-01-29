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

        $login = $_POST['login'];
        $password = $_POST['password'];

        @$connection = new mysqli("localhost", "root", "", "users") or die('<p>Sorry, database does not exist</p>');
        $connection->set_charset("utf8");

        $validate = $connection->query("SELECT login, password FROM `data`");

        if ($validate->num_rows > 0) {
            $flag = false;
            while ($row = $validate->fetch_assoc()) {
                if ($row["login"] == $login) {
                    $flag = true;
                    if ($row["password"] == $password) {
                        echo "<p>Welcome again $login!</p>";
                    } else {
                        echo "<p>Sorry, password incorrect</p>";
                    }
                }
           }
            if (!$flag) {
                echo "<p>User $login doesn't exist</p>";
            }
        }

    $connection->close();

    ?>
</body>

</html>