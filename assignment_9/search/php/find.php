<?php
require_once('connect.php');

function get_city($connect, $term){
    $querySingle = "SELECT City FROM Apartment_single WHERE City LIKE '%".$term."%' ORDER BY City ASC";
    $resultSingle = mysqli_query($connect, $querySingle);
    $dataSingle = mysqli_fetch_all($resultSingle, MYSQLI_ASSOC);

    $queryCompany = "SELECT City FROM Apartment_company WHERE City LIKE '%".$term."%' ORDER BY City ASC";
    $resultCompany = mysqli_query($connect, $queryCompany);
    $dataCompany = mysqli_fetch_all($resultCompany, MYSQLI_ASSOC);

    // Merge results from both tables
    $mergedData = array_merge($dataSingle, $dataCompany);

    // Extract unique cities
    $uniqueCities = array_unique(array_column($mergedData, 'City'));

    return $uniqueCities;
}

if (isset($_GET['term'])) {
    $getCity = get_city($connect, $_GET['term']);
    echo json_encode($getCity);
}
?>
