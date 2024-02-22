<?php include './connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head >
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Maintainance Page</title>
	<link rel="stylesheet" href="style.css">
	
</head>
<body>
	<img class="bg" src="img/bg.jpeg" alt="Back">
	<nav>
	<ul>
		<li><img src="img/logo.png" alt="Logo"></li>
		<li><a href="https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_8/imprint.php">Imprint</a></li>
		<li><a href="https://clabsql.clamv.jacobs-university.de/~hhussain/assignment_8/login/logout.php">Log Out</a></li>
    <li>
        <form>
            <label for="apartment-type" style="font-size:22px;">Apartment Type</label>
            <select id="apartmentSelect" onchange="navigateToPage(this)">
                <option value="apartment_company.php">Company Apartments</option>
                <option value="apartment_single.php">Single Apartments</option>
            </select>
        </form>
    </li>
    <li>
        <form>
            <label for="house-type" style="margin-left:40px; font-size:22px;">House Type</label>
            <select id="houseSelect" onchange="navigateToPage(this)">
                <option value="house_company.php">Company Houses</option>
                <option value="house_single.php">Single Houses</option>
            </select>
        </form>
    </li>
</ul>

<script>
    function navigateToPage(selectElement) {
        var selectedValue = selectElement.value;
        window.location.href = selectedValue;
    }
</script>

	<h1>REAL ESTATE BROKERAGE</h1>
</nav>

<div>
	<p></p>
</div>
</body>
</html>
