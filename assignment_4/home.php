<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Website</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="bg">
        <img src="img/bg.jpeg" alt="Background">
    </div>
    <nav>
        <ul>
            <li><a href="buy.php">Buy</a></li>
            <li><a href="sell.php">Sell</a></li>
            <li class="logo"><img src="img/logo.png" alt="Logo"></li>
            <li><a href="imprint.php">Imprint</a></li>
            <li class="dropdown">
                <a href="profile.php">Profile</a>
                <div class="dropdown-content">
                    <a href="index.php">Sign out</a>
                </div>
            </li>
        </ul>
        <h1>REAL ESTATE BROKERAGE</h1>
    </nav>

    <div class="search-container">
        <h2 class="search-header">Find your new home:</h2>
        <div class="search-bar">
            <input type="text" placeholder="Search for an address, neighborhood, or ZIP">
        </div>
    </div>
</body>
</html>
