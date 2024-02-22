<?php

$connect = mysqli_connect("localhost", "hhussain", "BR1h74", "Group-4");

if (mysqli_connect_errno()){
    die("<script>alert('Connection_Failed');</script>");
}

$select_db = mysqli_select_db($connect, 'Group-4');

if (!$select_db) {
    die('Database Selection Failed' . mysqli_error($connect));
}

$querySingle = 'SELECT City FROM Apartment_single';
$resultSingle = mysqli_query($connect, $querySingle);

$queryCompany = 'SELECT City FROM Apartment_company';
$resultCompany = mysqli_query($connect, $queryCompany);

$term = $_GET["term"];
$cityList = array();
$result = array();

while ($rowSingle = mysqli_fetch_array($resultSingle, MYSQLI_ASSOC)) {
    array_push($cityList, $rowSingle["City"]);
}

while ($rowCompany = mysqli_fetch_array($resultCompany, MYSQLI_ASSOC)) {
    array_push($cityList, $rowCompany["City"]);
}

foreach ($cityList as $city) {
    if (strpos(strtoupper($city), strtoupper($term)) !== false) {
        array_push($result, $city);
    }
}

echo json_encode($result);
?>
