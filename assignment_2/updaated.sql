CREATE TABLE Company (
    C_id INT PRIMARY KEY NOT NULL,
    Name VARCHAR(50),
    W_name VARCHAR(50) NOT NULL
);

CREATE TABLE Company_Buyer (
    C_id INT NOT NULL,
    P_bought INT DEFAULT 0,
    FOREIGN KEY (C_id) REFERENCES Company (C_id) ON DELETE CASCADE
);

CREATE TABLE Company_Seller (
    C_id INT NOT NULL,
    P_Sold INT DEFAULT 0,
    FOREIGN KEY (C_id) REFERENCES Company (C_id) ON DELETE CASCADE
);

CREATE TABLE Single_User (
    S_id INT PRIMARY KEY NOT NULL,
    First_name VARCHAR(50),
    Last_name VARCHAR(50),
    Age INT CHECK (Age >= 18),
    Email VARCHAR(50),
    City VARCHAR(50)
);

CREATE TABLE Single_Buyer (
    S_id INT NOT NULL,
    P_bought INT DEFAULT 0,
    FOREIGN KEY (S_id) REFERENCES Single_User (S_id) ON DELETE CASCADE
);

CREATE TABLE Single_Seller (
    S_id INT NOT NULL,
    P_sold INT DEFAULT 0,
    FOREIGN KEY (S_id) REFERENCES Single_User (S_id) ON DELETE CASCADE
);

CREATE TABLE Properties_single (
    S_id INT NOT NULL,
    FOREIGN KEY (S_id) REFERENCES Single_Seller (S_id)
);

CREATE TABLE Apartment_single (
    P_id INT PRIMARY KEY NOT NULL,
    S_id INT,
    post_data DATE,
    A_floor INT,
    City VARCHAR(50),
    Zip_code INT,
    Size INT,
    N_rooms INT,
    N_bath INT,
    Furnished VARCHAR(3) CHECK (Furnished IN ('YES', 'NO')),
    Type VARCHAR(50) CHECK (Type IN ('Buy', 'Sell')),
    Price INT,
    FOREIGN KEY (S_id) REFERENCES Properties_single (S_id) ON DELETE CASCADE
);

CREATE TABLE House_single (
    P_id INT PRIMARY KEY NOT NULL,
    S_id INT NOT NULL,
    post_data DATE,
    City VARCHAR(50),
    Zip_code INT,
    Size INT,
    N_rooms INT,
    N_bath INT,
    Furnished VARCHAR(3) CHECK (Furnished IN ('YES', 'NO')),
    Type VARCHAR(50) CHECK(TYPE IN ('Buy', 'Sell')),
    Price INT,
    FOREIGN KEY (S_id) REFERENCES Properties_single (S_id) ON DELETE CASCADE
);

CREATE TABLE Properties_company (
    C_id INT NOT NULL,
    FOREIGN KEY (C_id) REFERENCES Company (C_id) ON DELETE CASCADE
);

CREATE TABLE Apartment_company (
    P_id INT PRIMARY KEY NOT NULL,
    C_id INT,
    post_data DATE,
    A_floor INT,
    City VARCHAR(50),
    Zip_code INT,
    Size INT,
    N_rooms INT,
    N_bath INT,
    Furnished VARCHAR(3) CHECK (Furnished IN ('YES', 'NO')),
    Type VARCHAR(50) CHECK(TYPE IN ('Buy', 'Sell')),
    Price INT,
    FOREIGN KEY (C_id) REFERENCES Properties_company (C_id) ON DELETE CASCADE
);

CREATE TABLE House_company (
    P_id INT PRIMARY KEY NOT NULL,
    C_id INT NOT NULL,
    post_data DATE,
    City VARCHAR(50),
    Zip_code INT,
    Size INT,
    N_rooms INT,
    N_bath INT,
    Furnished VARCHAR(3) CHECK (Furnished IN ('YES', 'NO')),
    Price INT,
    Type VARCHAR(50) CHECK(TYPE IN ('Buy', 'Sell')),
    FOREIGN KEY (C_id) REFERENCES Properties_company (C_id) ON DELETE CASCADE
);
