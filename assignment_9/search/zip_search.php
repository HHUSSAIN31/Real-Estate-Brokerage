<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZIP Search Page</title>
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
        if (isset($_GET['Zip_code'])) {
            $zip = $_GET['Zip_code'];

            // Construct the SQL query to select S_id, Price, and City
            $sql = "SELECT Size, Price,Zip_code FROM Apartment_single WHERE Zip_code = '$zip'
            UNION
            SELECT Size, Price,Zip_code FROM Apartment_company WHERE Zip_code = '$zip'
            UNION
            SELECT Size, Price,Zip_code FROM House_company WHERE Zip_code = '$zip' 
            UNION
            SELECT Size, Price,Zip_code FROM House_company WHERE Zip_code = '$zip'";

            $result = $connect->query($sql);

            echo "<h2>RESULTS FOR APARTMENTS</h2>";
            echo "<table>";
            echo "<tr><th>Size</th><th>ZIP CODE</th><th>Apartment Price</th></tr>";

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["Size"] . "</td><td>" . $row["Zip_code"] . "</td><td>" . $row["Price"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found.</td></tr>";
            }

            echo "</table>";
        } else {
            echo "Zip data not provided.";
        }

        $connect->close();
        ?>
    </div>
</body>
</html>
