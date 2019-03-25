-- Create staments:

-- Deze staan bescheven in het document "Create-tables.sql"

-- Read Statements

Alle klanten die geen order hebben: 
SELECT `ORDER`.`Order_ID`, `CUSTOMER`.`Customer_ID` , `CUSTOMER`.`Customer_Firstname`, `CUSTOMER`.`Customer_Surname`
FROM `CUSTOMER` 
LEFT JOIN `ORDER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`Order_ID` IS NULL

-- PROCEDURES:


DELIMITER //
CREATE PROCEDURE CustomerZonderOrder
BEGIN
SELECT `ORDER`.`Order_ID`,`CUSTOMER`.`Customer_ID`,`CUSTOMER`.`Customer_Firstname`,`CUSTOMER`.`Customer_Surname`
FROM `CUSTOMER` 
LEFT JOIN `ORDER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`Order_ID` IS NULL;
END
//
DELIMITER ;

-- ===========================

-- Alle klanten uit Deventer:

SELECT `Customer_ID`, `Customer_Surname`, `Customer_Firstname`, `Address`, `ZipCode`, `City` 
FROM `CUSTOMER` 
WHERE `City` = 'Deventer'

-- PROCEDURES:


DELIMITER //
CREATE PROCEDURE CustomerUitPlaats
  (IN tmp VARCHAR(40))
BEGIN
SELECT *
FROM `CUSTOMER`
WHERE `City` = tmp;
END
//
DELIMITER ;

-- ==========================

-- Wie heeft er een product gekocht in 2017
SELECT `ORDER`.`OrderDate`, `CUSTOMER`.`Customer_ID` , `CUSTOMER`.`Customer_Firstname`, `CUSTOMER`.`Customer_Surname`
FROM `ORDER` 
INNER JOIN `CUSTOMER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`OrderDate` BETWEEN '2017-01-01' AND '2017-12-31'
ORDER BY `OrderDate`

-- PROCEDURES:

DELIMITER //
CREATE PROCEDURE Sales2017()
BEGIN
SELECT `ORDER`.`OrderDate`, `CUSTOMER`.`Customer_ID` , `CUSTOMER`.`Customer_Firstname`, `CUSTOMER`.`Customer_Surname`
FROM `ORDER` 
INNER JOIN `CUSTOMER`
ON  `CUSTOMER`.`Customer_ID` = `ORDER`.`Customer_ID`
WHERE `ORDER`.`OrderDate` BETWEEN '2017-01-01' AND '2017-12-31'
ORDER BY `OrderDate`;
END
//
DELIMITER ;

-- ============================

-- Welke serienummers zijn er vorig jaar verkocht
SELECT `ORDER`.`OrderDate`, `ORDER`.`Serial_No`,`PRODUCT`.`Type`
FROM `ORDER`
LEFT JOIN `PRODUCT`
ON `PRODUCT`.`Serial_No` = `ORDER`.`Serial_No`
WHERE `ORDER`.`OrderDate` 
BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()
ORDER BY `OrderDate`

-- PROCEDURES:

DELIMITER //
CREATE PROCEDURE SerienummerVorigjaar
BEGIN
SELECT `ORDER`.`OrderDate`, `ORDER`.`Serial_No`,`PRODUCT`.`Type`
FROM `ORDER`
LEFT JOIN `PRODUCT`
ON `PRODUCT`.`Serial_No` = `ORDER`.`Serial_No`
WHERE `ORDER`.`OrderDate` 
BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()
ORDER BY `OrderDate`;
END
//
DELIMITER ;

-- ===========================
 
-- Medewerker van het jaar:

SELECT COUNT(`Order_ID`),`Employee`
FROM `ORDER`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `Employee`
ORDER BY COUNT(`Order_ID`) DESC; 

-- PROCEDURES:

DELIMITER //
CREATE PROCEDURE Medewerkervanhetjaar
  (OUT tmp VARCHAR(40))
BEGIN
SELECT COUNT(`Order_ID`),`Employee`
FROM `ORDER`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE();
END
//
DELIMITER ;

-- ==========================

-- Reseller van het Jaar

SELECT COUNT(`ORDER`.`Order_ID`), `RESELLER`.`Company_Name`
FROM `ORDER`
LEFT JOIN `RESELLER`
ON `ORDER`.`Reseller_ID` = `RESELLER`.`Reseller_ID`
WHERE `OrderDate` BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `Company_Name`
ORDER BY COUNT(`ORDER`.`Order_ID`) DESC;

-- PROCEDURES:

DELIMITER //
CREATE PROCEDURE Resellervanplaatsnaam
  (IN tmp VARCHAR(40))
BEGIN
  SELECT *
  FROM `RESELLER`
  WHERE `City` = tmp;
END
//
DELIMITER ;

-- Slechtste reseller van het jaar

SELECT COUNT(`ORDER`.`Order_ID`) , `RESELLER`.`Company_Name`
FROM `ORDER`
LEFT JOIN `RESELLER`
ON `ORDER`.`Reseller_ID` = `RESELLER`.`Reseller_ID`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `RESELLER`.`Company_Name`
ORDER BY COUNT(`ORDER`.`Order_ID`);

-- PROCEDURES:

DELIMITER //
CREATE PROCEDURE SlechtsteResellervanhetjaar()
BEGIN
SELECT COUNT(`ORDER`.`Order_ID`) , `RESELLER`.`Company_Name`
FROM `ORDER`
LEFT JOIN `RESELLER`
ON `ORDER`.`Reseller_ID` = `RESELLER`.`Reseller_ID`
WHERE `OrderDate` BETWEEN DATE_SUB(curdate(), INTERVAL 1 YEAR) AND CURDATE()
GROUP BY `RESELLER`.`Company_Name`
ORDER BY COUNT(`ORDER`.`Order_ID`);
END
//
DELIMITER ;

-- ===========================


-- Update:

-- Update de bedrijfsnaam van BCC naar Saturn

UPDATE `RESELLER`
SET `Company_Name` = 'Saturn'
WHERE `Company_Name` = 'BCC'

-- PROCEDURES

DELIMITER //
CREATE PROCEDURE ChangeCompanyname (
   tmp1 varchar(40),
   tmp2 varchar(40)
) 
BEGIN
UPDATE `RESELLER`
SET `Company_Name` = tmp2
WHERE `Company_Name` = tmp1;
END
//
DELIMITER ;

-- =========================

-- Delete:

-- Delete alle order van 2015 en ouder

DELETE FROM `ORDER`
WHERE `OrderDate` <= '2015-12-31'
