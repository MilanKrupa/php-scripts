<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bookstore</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700&display=swap&subset=latin-ext"
        rel="stylesheet" />
    <link rel="stylesheet" href="./css/main.css" />
</head>

<body>
    <div class="wrapper">
        <canvas id="bubbleAnim"></canvas>
        <aside class="card">
            <h1>Bookstore</h1>
            <ul>
                <li><a href="index.php">Customers</a></li>
                <li><a href="books.php">Books</a></li>
                <li><a href="orders.php" class="active">Orders</a></li>
            </ul>
        </aside>
        <main>
            <table class="card">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer ID</th>
                        <th>Book ID</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        @$connection = new mysqli("localhost", "root", "", "ksiegarnia");
                        if (@$connection->connect_error) {
                            die("Connection error: " . $connection->connect_error);
                        }
                        $query = "SELECT * FROM zamowienia";
                        $response = $connection->query($query);

                        if ($response && $response->num_rows > 0) {
                            while ($row = $response->fetch_assoc()) {
                                echo "<tr><td>"
                                    . $row["idzamowienia"] . "</td><td>"
                                    . $row["idklienta"] . "</td><td>"
                                    . $row["idksiazki"] . "</td><td>"
                                    . $row["data"] . "</td><td>"
                                    . $row["status"] . "</td><td>";
                            }
                        } else {
                            echo "Database error";
                        }
                        $connection->close();
                    ?>
                </tbody>
            </table>
        </main>
    </div>
</body>

</html>