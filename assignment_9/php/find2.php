<?php
require_once('connect.php');

function get_zip($connect, $term) {
    $queryApartmentSingle = "SELECT Zip_code FROM Apartment_single WHERE Zip_code LIKE '%" . $term . "%' ORDER BY Zip_code ASC";
    $resultApartmentSingle = mysqli_query($connect, $queryApartmentSingle);
    $dataApartmentSingle = mysqli_fetch_all($resultApartmentSingle, MYSQLI_ASSOC);

    $queryApartmentCompany = "SELECT Zip_code FROM Apartment_company WHERE Zip_code LIKE '%" . $term . "%' ORDER BY Zip_code ASC";
    $resultApartmentCompany = mysqli_query($connect, $queryApartmentCompany);
    $dataApartmentCompany = mysqli_fetch_all($resultApartmentCompany, MYSQLI_ASSOC);

    $queryHouseSingle = "SELECT Zip_code FROM House_single WHERE Zip_code LIKE '%" . $term . "%' ORDER BY Zip_code ASC";
    $resultHouseSingle = mysqli_query($connect, $queryHouseSingle);
    $dataHouseSingle = mysqli_fetch_all($resultHouseSingle, MYSQLI_ASSOC);

    $queryHouseCompany = "SELECT Zip_code FROM House_company WHERE Zip_code LIKE '%" . $term . "%' ORDER BY Zip_code ASC";
    $resultHouseCompany = mysqli_query($connect, $queryHouseCompany);
    $dataHouseCompany = mysqli_fetch_all($resultHouseCompany, MYSQLI_ASSOC);

    // Merge results from all tables
    $mergedData = array_merge($dataApartmentSingle, $dataApartmentCompany, $dataHouseSingle, $dataHouseCompany);

    // Extract unique zip codes
    $uniqueZips = array_unique(array_column($mergedData, 'Zip_code'));

    return $uniqueZips;
}

if (isset($_GET['term'])) {
    $getZip = get_zip($connect, $_GET['term']);
    echo json_encode($getZip);
}
?>
