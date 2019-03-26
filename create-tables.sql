
-- UTF8 WITH BOM

DROP TABLE IF EXISTS `ORDER`; 
DROP TABLE IF EXISTS `CUSTOMER`;
DROP TABLE IF EXISTS `USER`;
DROP TABLE IF EXISTS `RESELLER`;
DROP TABLE IF EXISTS `PRODUCT`;



    
CREATE TABLE `PRODUCT` (
    `Type` VARCHAR(40),
	`Serial_No` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Manufacturing_Date` DATE    
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


CREATE TABLE `RESELLER` (
    `Reseller_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Company_Name` VARCHAR(40),
	`Address` VARCHAR(40),
	`ZipCode` VARCHAR(40),
	`City` VARCHAR(40),
    `Country` VARCHAR(40),
	`Email` VARCHAR(40),
    `Telephone` VARCHAR(40),
    `Contact_Person` VARCHAR(40)
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

CREATE TABLE `USER` (
	`Email`  VARCHAR(40) PRIMARY KEY,
	`PasswordHash` VARCHAR(256),
    `Salt` VARCHAR(256),
    `Level` INT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


CREATE TABLE `CUSTOMER` (
	`Customer_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Customer_Surname` VARCHAR(40),
	`Customer_Firstname` VARCHAR(40),
	`Address` VARCHAR(40),
	`ZipCode` VARCHAR(40),
	`City` VARCHAR(40),
    `Country` VARCHAR(40),
    `Email` VARCHAR(40),
    `Telephone` VARCHAR(40),
    `Day_Of_Birth` DATE,
    `RegistrationDate` DATE
    
--    CONSTRAINT `FK_Email`
--    FOREIGN KEY(`Email`) REFERENCES `USER`(`Email`)
--    ON UPDATE CASCADE
--    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;



CREATE TABLE `ORDER` (
	`Order_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Price` VARCHAR(40),
	`OrderDate` DATE,
    `ShippingDate` DATE,
    `OrderStatus` VARCHAR(40),
    `Employee` VARCHAR(40),
    `Serial_No` INT UNIQUE,
   `Reseller_ID` INT,
   `Customer_ID` INT,
    CONSTRAINT `FK_SerialNo`
    FOREIGN KEY(`Serial_No`) REFERENCES `PRODUCT` (`Serial_No`),
    

    CONSTRAINT `FK_ReselID`
    FOREIGN KEY(`Reseller_ID`) REFERENCES `RESELLER` (`Reseller_ID`),
    
    CONSTRAINT `FK_CustID`
    FOREIGN KEY(`Customer_ID`) REFERENCES `CUSTOMER`(`Customer_ID`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;

/*
===========================
USER
===========================
*/

INSERT INTO `USER` (`Email`, `PasswordHash`, `Salt`, `Level`) VALUES
("molestie@eleifendCrassed.net","wachtwoord",123456,1),("amet@tincidunt.co.uk","9c4c4c4db14b6e60a0449a44b8f7dfa0",123456,1),("lectus.sit@acturpisegestas.edu","wachtwoord",123456,1),("id.sapien.Cras@Proin.net","9c4c4c4db14b6e60a0449a44b8f7dfa0",123456,1),("orci.sem.eget@nibhPhasellusnulla.edu","wachtwoord",123456,1),("eu@nonenimMauris.net","9c4c4c4db14b6e60a0449a44b8f7dfa0",123456,2),("aliquam@Cumsociisnatoque.edu","wachtwoord",123456,2),("mus.Proin@risus.co.uk","9c4c4c4db14b6e60a0449a44b8f7dfa0",123456,2),("Vivamus.euismod.urna@Cum.org","wachtwoord",123456,2),("montes.nascetur.ridiculus@vitae.edu","9c4c4c4db14b6e60a0449a44b8f7dfa0",123456,2);

/*
===========================
PRODUCT
===========================
*/

INSERT INTO `PRODUCT` (`Type`,`Serial_No`,`Manufacturing_Date`) VALUES ("DronqDroneV1Red",83546000,"2018-09-25 08:49:24"),("DronqSetV1Blue",83546001,"2018-09-01 13:39:28"),("DronqSetV1Red",83546002,"2018-11-10 20:08:05"),("DronqFridgeV1Blue",83546003,"2018-10-27 01:55:30"),("DronqDroneV1Blue",83546004,"2018-09-06 23:19:18"),("DronqSetV1Red",83546005,"2018-09-03 15:38:56"),("DronqDroneV1Blue",83546006,"2018-11-15 05:33:10"),("DronqFridgeV1Red",83546007,"2018-09-30 02:54:41"),("DronqSetV1Red",83546008,"2018-10-22 05:08:19"),("DronqSetV1Red",83546009,"2018-09-30 10:02:04");


/*
===========================
CUSTOMER
===========================
*/

INSERT INTO `CUSTOMER` (`Customer_ID`,`Customer_Surname`,`Customer_Firstname`,`Address`,`ZipCode`,`City`,`Country`,`Email`,`Telephone`,`Day_Of_Birth`,`RegistrationDate`) VALUES 
(1,"Glenn","Gage","P.O. Box 996, 2281 Lacus. Rd.","3315 KG","Tilburg","Netherlands","molestie@eleifendCrassed.net","045 6856052","1985-11-07 14:37:33","2019-03-01 09:10:58"),(2,"Morin","Francis","730-5527 Eleifend, Rd.","0260 BR","Alkmaar","Netherlands","amet@tincidunt.co.uk","089 5303231","1971-03-09 15:57:53","2019-05-23 00:28:56"),(3,"Marquez","Jamalia","Ap #795-9574 Praesent Rd.","6524 IS","Terneuzen","Netherlands","lectus.sit@acturpisegestas.edu","047 4571372","1994-02-10 00:21:35","2019-05-15 07:51:42"),(4,"Greer","Kenyon","6696 Sit Street","4898 MM","Wijshagen","Netherlands","id.sapien.Cras@Proin.net","069 4389762","2000-01-31 09:37:41","2018-03-13 07:52:20"),(5,"Perry","Hayes","801-7835 Nullam Street","3480 YS","Helmond","Netherlands","orci.sem.eget@nibhPhasellusnulla.edu","071 2905282","1973-01-29 11:29:59","2019-02-17 05:21:56"),(6,"Hanson","Kylie","P.O. Box 858, 9201 Dui St.","1814 RM","Hindeloopen","Netherlands","eu@nonenimMauris.net","054 3042094","1977-05-15 22:09:35","2019-04-19 09:43:25"),(7,"Briggs","Rooney","P.O. Box 935, 2184 Morbi St.","3754 JD","Zierikzee","Netherlands","aliquam@Cumsociisnatoque.edu","073 2573899","1983-06-27 04:44:11","2018-05-20 18:41:27"),(8,"Flowers","Aphrodite","988-1380 A St.","2672 QA","Deventer","Netherlands","mus.Proin@risus.co.uk","029 3947430","1962-12-25 13:59:29","2019-07-08 05:56:54"),(9,"Saunders","Calista","9472 Varius. Street","1396 DG","Haren","Netherlands","Vivamus.euismod.urna@Cum.org","089 1223756","1991-08-18 10:17:53","2019-11-05 06:09:04"),(10,"Parrish","Rylee","P.O. Box 814, 3491 Lectus Avenue","2882 ED","Ellikom","Netherlands","montes.nascetur.ridiculus@vitae.edu","027 9908820","2003-03-23 02:29:34","2017-12-27 16:06:36");



/*
===========================
RESELLER
===========================
*/

INSERT INTO `RESELLER` (`Reseller_ID`,`Company_Name`,`Address`,`ZipCode`,`City`,`Country`,`Email`,`Telephone`,`Contact_Person`) VALUES (1,"Events","734-5517 Lacinia St.","1842 ZA","Coevorden","Netherlands","magnis@vulputateduinec.org","094 7428729","Nayda W. Baxter"),(2,"Website","Ap #706-1181 Malesuada Av.","7453 FW","Doetinchem","Netherlands","enim.mi@eget.co.uk","032 9396443","Teegan Graham"),(3,"BCC","Ap #108-7170 In Road","4028 ZG","IJlst","Netherlands","facilisis@Phasellusnulla.com","055 0015204","Cody Yates"),(4,"Website","Ap #861-2668 Augue Street","3783 QD","Almere","Netherlands","augue@blandit.co.uk","072 2583634","Erin P. Welch"),(5,"Google","410-6341 Mi Avenue","8548 KW","Franeker","Netherlands","imperdiet.dictum.magna@dignissimlacusAliquam.ca","036 7584184","Kameko B. Le"),(6,"Expert","P.O. Box 849, 7545 Ultrices Ave","9386 BV","Almere","Netherlands","arcu.imperdiet.ullamcorper@egetmagnaSuspendisse.ca","034 9886059","Lucius Castaneda"),(7,"BCC","399-3339 Iaculis St.","5754 PF","Lelystad","Netherlands","amet.ante.Vivamus@miacmattis.edu","050 3932086","Ryan R. Terry"),(8,"Events","Ap #604-2619 Et St.","6063 IS","Sluis","Netherlands","consequat@auctor.edu","074 1023191","Caldwell P. Rogers"),(9,"Google","2757 Cras St.","7995 UI","Deventer","Netherlands","et@atpedeCras.co.uk","019 3657143","Vance G. Guerrero"),(10,"BCC","Ap #796-3350 Amet, Road","4430 NQ","Oosterhout","Netherlands","semper@utaliquam.edu","084 1764858","Orla Kirkland");


/*
===========================
ORDER
===========================
*/

INSERT INTO `ORDER` (`Order_ID`,`Price`,`OrderDate`,`ShippingDate`,`OrderStatus`,`Employee`,`Serial_No`,`Reseller_ID`,`Customer_ID`) VALUES (1,"1699","2016-05-02 17:34:36","2017-09-18 14:16:46","Paid","Johan",83546000,1,1),(2,"1399","2016-10-30 20:12:02","2018-10-20 03:24:24","Ordered","Wouter",83546001,2,2),(3,"1699","2011-03-10 15:16:19","2011-04-16 23:51:43","Delivered","Wouter",83546002,3,3),(4,"1399","2013-12-09 13:34:47","2013-05-17 03:34:33","Shipped","Kevin",83546003,4,4),(5,"1699","2011-09-30 12:24:26","2010-07-01 10:41:23","Ordered","Kevin",83546004,5,5),(6,"1699","2017-09-13 02:20:18","2011-03-14 21:04:24","Delivered","Jos",83546005,6,6),(7,"1399","2015-02-08 16:17:15","2013-10-04 22:52:11","Paid","Jos",83546006,7,7),(8,"1699","2013-07-26 19:19:49","2018-01-24 20:46:53","Paid","Kevin",83546007,8,8),(9,"1399","2015-07-29 00:31:55","2018-04-03 04:58:31","Delivered","Wouter",83546008,9,9),(10,"1699","2015-11-13 14:11:03","2017-08-13 19:57:51","Paid","Kevin",83546009,10,10);
