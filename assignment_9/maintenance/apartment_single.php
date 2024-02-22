<?php include './connect.php'; ?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/apartment.css" />
    <title>Apartment_single</title>
    <style>
        a:link {
            color: white;
            background-color: transparent;
            text-decoration: none;
        }

        a:visited {
            color: white;
            background-color: transparent;
            text-decoration: none;
        }

        a:hover {
            color: red;
            background-color: transparent;
            text-decoration: underline;
        }

        a:active {
            color: yellow;
            background-color: transparent;
            text-decoration: underline;
        }
    </style>
</head>

<?php
session_start();
$flag = 0;
if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
    if ($_SESSION['username'] = "admin" && $_SESSION['password'] = "admin") {
        $flag = 1;
    } else {
        header("location: http://clabsql.clamv.jacobs-university.de/~hhussain/assignment_9");
    }
} else {
    header("location: http://clabsql.clamv.jacobs-university.de/~hhussain/assignment_9");
}

?>

<?php if ($flag): ?>

    <body>
        <header>
            <div class="header-content">
                <a href="imprint.php" style="color: white;">Imprint</a>
                <h1>You're Selling as a Single-User</h1>
                <img src="img/logo.png" alt="Company Logo">
            </div>
        </header>

        <form action="apartment_single.php" method="post">
            <div class="content">
                <h1>Provide your Property Information:</h1>
                <div class="property-type">
                    <p>Type of Property: Apartment</p>
                </div>
                <div class="form-group">
                    <label for="S_id">Seller ID</label>
                    <input type="number" id="S_id" name="S_id" placeholder="Write your Seller ID" required>
                </div>
                <div class="form-group">
                    <label for="A_floor">Floor</label>
                    <input type="number" id="A_floor" name="A_floor" placeholder="Write the Floor of your Apartment here"
                        required>
                </div>
                <div class="form-group">
                    <label for="City">City</label>
                    <input type="text" id="City" name="City" placeholder="City in which the Apartment is Located" required>
                </div>
                <div class="form-group">
                    <label for="Zip_code">Zip Code</label>
                    <input type="number" id="Zip_code" name="Zip_code" placeholder="Write the Zip Code here" required>
                </div>
                <div class="form-group">
                    <label for="Size">Size</label>
                    <input type="number" id="Size" name="Size" placeholder="Write the Size (in Cubic Meters) here" required>
                </div>
                <div class="form-group">
                    <label for="N_rooms">Number of Rooms</label>
                    <input type="number" id="N_rooms" name="N_rooms" placeholder="Write the Number of Rooms here" required>
                </div>
                <div class="form-group">
                    <label for="N_bath">Number of Bathrooms</label>
                    <input type="number" id="N_bath" name="N_bath" placeholder="Write the Number of Bathrooms here"
                        required>
                </div>
                <div class="form-group">
                    <label for="Furnished">Furnished (YES/NO)</label>
                    <input type="text" id="Furnished" name="Furnished" placeholder="Enter YES or NO" required>
                </div>
                <div class="form-group">
                    <label for="Price">Price</label>
                    <input type="number" id="Price" name="Price" placeholder="Price of your Property">
                </div>
                <input type="submit" value="Submit" class="post-button">
            </div>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $S_id = $_POST['S_id'];
            $A_floor = $_POST['A_floor'];
            $City = $_POST['City'];
            $Zip_code = $_POST['Zip_code'];
            $Size = $_POST['Size'];
            $N_rooms = $_POST['N_rooms'];
            $N_bath = $_POST['N_bath'];
            $Furnished = $_POST['Furnished'];
            $Price = $_POST['Price'];

            // Check if the database connection is successful
            if ($connect->connect_error) {
                echo "<script>alert('Connection Failed');</script>";
            } else {
                // Use prepared statements to prevent SQL injection
                $stmt = $connect->prepare("INSERT INTO Apartment_single (S_id, A_floor, City, Zip_code, Size, N_rooms, N_bath, Furnished, Price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

                if ($stmt) {
                    $stmt->bind_param("iisididid", $S_id, $A_floor, $City, $Zip_code, $Size, $N_rooms, $N_bath, $Furnished, $Price);

                    if ($stmt->execute()) {
                        echo "<script>alert('Success!');</script>";
                    } else {
                        echo "<script>alert('Failed to insert data: " . $stmt->error . "');</script>";
                    }

                    $stmt->close();
                } else {
                    echo "<script>alert('Failed to prepare statement: " . $connect->error . "');</script>";
                }
            }
        }
        ?>

    </body>
<?php endif; ?>

</html>