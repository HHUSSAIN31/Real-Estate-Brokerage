<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartment Search Page</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <img class="bg" src="img/bg.jpeg" alt="Back">
    <nav>
    </nav>

    <div class="container">
        <h1>REAL ESTATE BROKERAGE</h1>
    </div>

    <div class="container">
        <?php
        include './connect.php';

        // Check if the "City" value is sent via POST
        if (isset($_GET['City'])) {
            $city = $_GET['City'];

            // Construct the SQL query to select S_id, Price, and City
            $sql = "SELECT Size, Price, City FROM Apartment_single WHERE City = '$city'
            UNION
            SELECT Size, Price, City FROM Apartment_company WHERE City = '$city'";

            $result = $connect->query($sql);

            echo "<h2>RESULTS FOR APARTMENTS</h2>";
            echo "<table>";
            echo "<tr><th>Size</th><th>City</th><th>Apartment Price</th></tr>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Size"] . "</td><td>" . $row["City"] . "</td><td>" . $row["Price"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found.</td></tr>";
            }

            echo "</table>";
        } else {
            echo "City data not provided.";
        }

        $connect->close();
        ?>
    </div>
</body>
</html>
