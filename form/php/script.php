<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My form</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap&subset=latin-ext"
        rel="stylesheet" />
    <link rel="stylesheet" href="../css/main.css" />
</head>

<body>
    <div class="wrapper">
        <div class="card">
            <?php
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $gender = $_POST['gender'] == "man" ? "man" : "woman";
            $cat = isset($_POST['cat']) ? $_POST['cat'] : null;
            $dog = isset($_POST['dog']) ? $_POST['dog'] : null;
            $inhabitancy = isset($_POST['inhabitancy']) ? $_POST['inhabitancy'] : null;


            $connection = mysqli_connect("localhost", "root", "") or die('Cannot connect to our database');
            mysqli_set_charset($connection, "utf8");
            mysqli_query($connection, "CREATE DATABASE form");
            mysqli_select_db($connection, "form");

            $createTable = "CREATE TABLE users(
                id INT PRIMARY KEY AUTO_INCREMENT,
                first_name VARCHAR(30) NOT NULL,
                surname VARCHAR(30) NOT NULL,
                gender VARCHAR(30) NOT NULL,
                cat BOOLEAN NOT NULL,
                dog BOOLEAN NOT NULL,
                inhabitancy VARCHAR(30))";
                mysqli_query($connection, $createTable);

            $insert = "INSERT INTO users VALUES(
                '',
                '$name',
                '$surname',
                '$gender',
                '$cat',
                '$dog',
                '$inhabitancy'
                )";

            if(mysqli_query($connection, $insert)){
                $insert = "Your info has been successfully placed in our database";
            }else{
                $insert = "Something went wrong. We couldn't place your data in our database";
            };
            mysqli_close($connection);

            print("<h2>Welcome $name $surname! </h2> <p>You're a $gender </p> <p>You".($cat?" have ":" don't have ")."a cat and".($dog?" have ":" don't have ")."a dog </p> <p>".($inhabitancy?"You live in the $inhabitancy":"You have not chosen your place of residence")."</p> <p>$insert</p><div class='innerWrapper reset'><a href='../index.html'>go back</a></div>");
        ?>

        </div>
        <canvas id="bubbleAnim"></canvas>
    </div>
    <script src="js/main.js" type="module"></script>
</body>

</html>