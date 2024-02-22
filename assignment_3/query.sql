/*1. Zip code 28759 in city Bremen*/
SELECT P_id AS Property_id, City AS Property_City, Zip_code AS Property_ZipCode
FROM (
    SELECT P_id, City, Zip_code
    FROM Apartment_single
    WHERE City = 'Bremen' AND Zip_code = 28759
    UNION ALL
    SELECT P_id, City, Zip_code
    FROM House_single
    WHERE City = 'Bremen' AND Zip_code = 28759
    UNION ALL
    SELECT P_id, City, Zip_code
    FROM Apartment_company
    WHERE City = 'Bremen' AND Zip_code = 28759
    UNION ALL
    SELECT P_id, City, Zip_code
    FROM House_company
    WHERE City = 'Bremen' AND Zip_code = 28759
) AS AllProperties;

/* 2. All properties posted by Qasim*/
SELECT P.P_id, P.City, P.Zip_code
FROM (
    SELECT AS1.P_id, AS1.City, AS1.Zip_code
    FROM Single_User SU
    JOIN Properties_single PS ON SU.S_id = PS.S_id
    JOIN Apartment_single AS1 ON PS.S_id = AS1.S_id
    WHERE SU.First_name = 'Qasim'
    UNION
    SELECT HS1.P_id, HS1.City, HS1.Zip_code
    FROM Single_User SU
    JOIN Properties_single PS ON SU.S_id = PS.S_id
    JOIN House_single HS1 ON PS.S_id = HS1.S_id
    WHERE SU.First_name = 'Qasim'
) AS P;


/*3. Houses posted by Qasim with price < $250000 */
SELECT H.P_id, H.City, H.Zip_code, H.Price
FROM Single_User SU
INNER JOIN Properties_single PS ON SU.S_id = PS.S_id
INNER JOIN House_single H ON PS.S_id = H.S_id
WHERE SU.First_name = 'Qasim' AND H.Price < 250000;

/* 4. Select furnished properties from both Apartment_single and Apartment_company tables*/
SELECT P_id, post_data, Furnished
FROM Apartment_single 
WHERE Furnished = 'YES' 
UNION ALL 
SELECT P_id, post_data, Furnished 
FROM Apartment_company 
WHERE Furnished = 'YES';

/*5. Select properties from both Apartment_single and Apartment_company tables, ordered by post_data in descending order*/
SELECT P_id, post_data 
FROM Apartment_single
UNION ALL
SELECT P_id, post_data
FROM Apartment_company
ORDER BY post_data DESC;

/*6. Find sellers with more than 100 properties sold*/
SELECT Seller.Seller_id AS S_id, SUM(Seller.P_sold) AS TotalPropertiesSold
FROM (
    SELECT S_id AS Seller_id, P_sold
    FROM Single_Seller
    UNION ALL
    SELECT C_id AS Seller_id, P_sold
    FROM Company_Seller
) AS Seller
GROUP BY Seller.Seller_id
HAVING SUM(Seller.P_sold) > 100;

/*7. Select properties of any type with a price less than $100,000*/
SELECT P_id, Size, N_rooms, N_bath, Price
FROM Apartment_single
WHERE Price < 100000 UNION ALL 
SELECT P_id, Size, N_rooms, N_bath, Price
FROM House_single
WHERE Price < 100000 UNION ALL
SELECT P_id, Size, N_rooms, N_bath, Price
FROM Apartment_company
WHERE Price < 100000 UNION ALL
SELECT P_id, Size, N_rooms, N_bath, Price
FROM House_company
WHERE Price < 100000;

/*8. Select properties where the number of rooms is greater than 2 and the number of bathrooms is greater than or equal to 1*/
SELECT P_id, Size, N_rooms, N_bath
FROM Apartment_single
WHERE N_rooms > 2 AND N_bath >= 1 UNION ALL
SELECT P_id, Size, N_rooms, N_bath
FROM House_single
WHERE N_rooms > 2 AND N_bath >= 1 UNION ALL
SELECT P_id, Size, N_rooms, N_bath
FROM Apartment_company WHERE N_rooms > 2 AND N_bath >= 1 UNION ALL
SELECT P_id, Size, N_rooms, N_bath
FROM House_company
WHERE N_rooms > 2 AND N_bath >= 1;

/*9. Select all properties posted by a company in Bremen*/
SELECT C.Name AS CompanyName, P.P_id, P.post_data
FROM Company AS C
JOIN Apartment_company AS P ON C.C_id = P.C_id
WHERE P.City = 'Bremen'
UNION ALL
SELECT C.Name AS CompanyName, P.P_id, P.post_data
FROM Company AS C
JOIN House_company AS P ON C.C_id = P.C_id
WHERE P.City = 'Bremen';
