<!DOCTYPE html>
<html lang="en">
<head >
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Real Estate Website</title>
	<link rel="stylesheet" href="css/login.css">
	
</head>
<body>
	<img class="bg" src="img/bg.jpeg" alt="Back">
	<nav>
	<ul>
		<li><img src="img/logo.png" alt="Logo"></li>
		<li><a href="imprint.php">Imprint</a></li>
		<li><a href="login.php">Log In</a></li>
	</ul>
    <h1>WELCOME TO REAL ESTATE BROKERAGE</h1>
</nav>

<div>
    <h2>Sign Up</h2>
	<form action="login.php" method="post">
            <input type="radio" name="type" value="single"> Single-User
            <input type="radio" name="type" value="business"> Business
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="city" id="city" placeholder="Enter your city">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="password" name="password" id="password" placeholder="Enter your password">
            <button class="btn">Submit</button> 
        </form>
</div>
</body>
</html>



