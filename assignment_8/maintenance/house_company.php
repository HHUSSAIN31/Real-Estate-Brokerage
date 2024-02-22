<?php include './connect.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home_company</title>
    <link rel="stylesheet" href="css/house.css">
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
        //echo '<a href="logout.php?logout">Logout</a>';
    } else {
        header("location: http://clabsql.clamv.jacobs-university.de/~hhussain/assignment_8");
    }
} else {
    header("location: http://clabsql.clamv.jacobs-university.de/~arathi/assignment_8");
}

?>

<?php if ($flag): ?>


    <body>
        <header>
            <div class="header-content">
                <a href="imprint.php" style="color:white;  ">Imprint</a>
                <h1>You're Selling as a Company</h1>
                <img src="img/logo.png" alt="Company Logo">
            </div>
        </header>

        <form action="house_company.php" method="post" class="content">
            <h1>Provide your Property Information:</h1>
            <div class="property-type">
                <p>Type of Property: House</p>
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" id="City" name="City" placeholder="City in which the Apartment is Located" required>
            </div>
            <div class="form-group">
                <label for="zip-code">Zip Code</label>
                <input type="number" id="Zip_code" name="Zip_code" placeholder="Write the Zip Code here" required>
            </div>
            <div class="form-group">
                <label for="size">Size</label>
                <input type="number" id="Size" name="Size" placeholder="Write the Size (in Cubic Meters) here" required>
            </div>
            <div class="form-group">
                <label for="rooms">Number of Rooms</label>
                <input type="number" id="N_rooms" name="N_rooms" placeholder="Write the Number of Rooms here" required>
            </div>
            <div class="form-group">
                <label for="bathrooms">Number of Bathrooms</label>
                <input type="number" id="N_bath" name="N_bath" placeholder="Write the Number of Bathrooms here" required>
            </div>
            <div class="form-group">
                <label for="furnished">Furnished</label>
                <div class="checkbox">
                    <input type="radio" id="furnished-yes" name="furnished" value="Yes" required>
                    <label for="Furnished-yes">Yes</label>
                    <input type="radio" id="furnished-no" name="furnished" value="No" required>
                    <label for="furnished-no">No</label>
                </div>
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="Price" name="Price" placeholder="Price of your Property" required>
            </div>
            <input type="submit" value="Submit" class="post-button">
        </form>

        <?php
        $post_data = date('Y-m-d');
        ;
        $City = $_POST['City'];
        $Zip_code = $_POST['Zip_code'];
        $Size = $_POST['Size'];
        $N_rooms = $_POST['N_rooms'];
        $N_bath = $_POST['N_bath'];
        $Furnished = $_POST['Furnished'];
        $Price = $_POST['Price'];

        //Sending form data to sql db.
        if ($connect->connect_error) {
            echo "<script>alert('Connection_Failed');</script>";
        } else {
            mysqli_query($connect, "INSERT INTO House_company (post_data,City,Zip_code,Size,N_rooms,N_bath,Furnished,Type,Price) VALUES ('$post_data','$City','$Zip_code','$Size','$N_rooms','$N_bath','$Furnished','$Type','$Price');");
            echo "<script>alert('Success!');</script>";
        }

        ?>

    </body>
<?php endif; ?>

</html>