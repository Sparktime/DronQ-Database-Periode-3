﻿
-- UTF8 WITH BOM

DROP TABLE IF EXISTS `ORDER`; 
DROP TABLE IF EXISTS `CUSTOMER`;
DROP TABLE IF EXISTS `PRODUCTINFO`;
DROP TABLE IF EXISTS `PRODUCT`;



    
CREATE TABLE `PRODUCT` (
    `Type` VARCHAR(40),
	`Serial_No` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Manufacturing_Date` DATE    
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


CREATE TABLE `PRODUCTINFO` (
  `Name` VARCHAR(40),
	`Type` VARCHAR(40) PRIMARY KEY,
	`Text` TEXT,
	`Specs` TEXT,
	`Price` INT,
	`IMG` VARCHAR(40)
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
    `PasswordHash` VARCHAR(255),
    `Telephone` VARCHAR(40),
    `Day_Of_Birth` DATE,
    `RegistrationDate` DATE
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;



CREATE TABLE `ORDER` (
	`Order_ID` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`Price` VARCHAR(40),
	`OrderDate` DATE,
    `ShippingDate` DATE,
    `OrderStatus` VARCHAR(40),
    `Employee` VARCHAR(40),
    `Serial_No` INT UNIQUE,
   `Customer_ID` INT,

    CONSTRAINT `FK_SerialNo`
    FOREIGN KEY(`Serial_No`) REFERENCES `PRODUCT` (`Serial_No`),

    CONSTRAINT `FK_CustID`
    FOREIGN KEY(`Customer_ID`) REFERENCES `CUSTOMER`(`Customer_ID`)
    ON UPDATE CASCADE
    ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=UTF8;


/*
===========================
PRODUCT
===========================
*/

INSERT INTO `PRODUCT` (`Type`,`Serial_No`,`Manufacturing_Date`) VALUES ("DronqDroneV1Red",83546000,"2018-09-25 08:49:24"),("DronqSetV1Blue",83546001,"2018-09-01 13:39:28"),("DronqSetV1Red",83546002,"2018-11-10 20:08:05"),("DronqFridgeV1Blue",83546003,"2018-10-27 01:55:30"),("DronqDroneV1Blue",83546004,"2018-09-06 23:19:18"),("DronqSetV1Red",83546005,"2018-09-03 15:38:56"),("DronqDroneV1Blue",83546006,"2018-11-15 05:33:10"),("DronqFridgeV1Red",83546007,"2018-09-30 02:54:41"),("DronqSetV1Red",83546008,"2018-10-22 05:08:19"),("DronqSetV1Red",83546009,"2018-09-30 10:02:04");




/*
===========================
PRODUCTINFO
===========================
*/

INSERT INTO `PRODUCTINFO` (`Name`,`Type`,`Text`,`Specs`,`Price`,`IMG`)
VALUES ("DronQ Drone","DronqDroneV1","Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ante felis, gravida feugiat tellus sit amet, aliquam pretium erat. Proin faucibus, odio convallis luctus porttitor, nunc ex ornare eros, in tristique odio ex vitae nisl. Ut mi nisi, commodo at neque vitae, vestibulum pretium mauris. Nulla quam sapien, iaculis in neque ac, euismod aliquet nisl. Praesent sit amet elit eget lorem ornare sagittis a et lorem. Mauris vulputate enim ut mauris aliquam, nec tempus purus scelerisque. Vivamus a lorem et dolor venenatis posuere. Vivamus pellentesque vel lacus non placerat. Maecenas pretium ex fermentum, condimentum orci vel, dictum neque. Quisque eget diam purus. Phasellus bibendum sapien vel diam tincidunt pharetra.","Aliquam erat volutpat. Curabitur facilisis ac augue et finibus. Mauris vel imperdiet justo. Nulla dolor magna, congue vel quam a, lobortis mattis odio. Morbi eu elit hendrerit libero efficitur congue sit amet sit amet dolor. Suspendisse potenti. Quisque sit amet placerat purus. Curabitur tempus porttitor nibh ac pharetra. Sed posuere, quam id lobortis mollis, nunc quam ultrices tortor, eget laoreet neque magna nec odio. Ut velit ante, posuere sagittis ante vitae, tincidunt sodales velit. Curabitur interdum odio ipsum, nec vestibulum arcu viverra condimentum. Vestibulum pellentesque justo et urna volutpat, nec vestibulum ipsum eleifend.","999","/img/productInfo/drone.jpg"),
  VALUES ("DronQ Fridge","DronqFridgeV1","Wat een mooie drone","Hallo dit is goeie specs drone","699","/img/productInfo/fridge.jpg"),
  VALUES ("DronQ Set","DronqSetV1","Wat een mooie drone","Hallo dit is goeie specs drone","1399","/img/productInfo/set.jpg");

/*
===========================
CUSTOMER
===========================
*/

INSERT INTO `CUSTOMER` (`Customer_ID`,`Customer_Surname`,`Customer_Firstname`,`Address`,`ZipCode`,`City`,`Country`,`Email`,`Telephone`,`Day_Of_Birth`,`RegistrationDate`) VALUES 
(1,"Glenn","Gage","P.O. Box 996, 2281 Lacus. Rd.","3315 KG","Tilburg","Netherlands","molestie@eleifendCrassed.net","045 6856052","1985-11-07 14:37:33","2019-03-01 09:10:58"),(2,"Morin","Francis","730-5527 Eleifend, Rd.","0260 BR","Alkmaar","Netherlands","amet@tincidunt.co.uk","089 5303231","1971-03-09 15:57:53","2019-05-23 00:28:56"),(3,"Marquez","Jamalia","Ap #795-9574 Praesent Rd.","6524 IS","Terneuzen","Netherlands","lectus.sit@acturpisegestas.edu","047 4571372","1994-02-10 00:21:35","2019-05-15 07:51:42"),(4,"Greer","Kenyon","6696 Sit Street","4898 MM","Wijshagen","Netherlands","id.sapien.Cras@Proin.net","069 4389762","2000-01-31 09:37:41","2018-03-13 07:52:20"),(5,"Perry","Hayes","801-7835 Nullam Street","3480 YS","Helmond","Netherlands","orci.sem.eget@nibhPhasellusnulla.edu","071 2905282","1973-01-29 11:29:59","2019-02-17 05:21:56"),(6,"Hanson","Kylie","P.O. Box 858, 9201 Dui St.","1814 RM","Hindeloopen","Netherlands","eu@nonenimMauris.net","054 3042094","1977-05-15 22:09:35","2019-04-19 09:43:25"),(7,"Briggs","Rooney","P.O. Box 935, 2184 Morbi St.","3754 JD","Zierikzee","Netherlands","aliquam@Cumsociisnatoque.edu","073 2573899","1983-06-27 04:44:11","2018-05-20 18:41:27"),(8,"Flowers","Aphrodite","988-1380 A St.","2672 QA","Deventer","Netherlands","mus.Proin@risus.co.uk","029 3947430","1962-12-25 13:59:29","2019-07-08 05:56:54"),(9,"Saunders","Calista","9472 Varius. Street","1396 DG","Haren","Netherlands","Vivamus.euismod.urna@Cum.org","089 1223756","1991-08-18 10:17:53","2019-11-05 06:09:04"),(10,"Parrish","Rylee","P.O. Box 814, 3491 Lectus Avenue","2882 ED","Ellikom","Netherlands","montes.nascetur.ridiculus@vitae.edu","027 9908820","2003-03-23 02:29:34","2017-12-27 16:06:36");




/*
===========================
ORDER
===========================
*/

INSERT INTO `ORDER` (`Order_ID`,`Price`,`OrderDate`,`ShippingDate`,`OrderStatus`,`Employee`,`Serial_No`,`Customer_ID`) VALUES (1,"1699","2016-05-02 17:34:36","2017-09-18 14:16:46","Paid","Johan",83546000,1),(2,"1399","2016-10-30 20:12:02","2018-10-20 03:24:24","Ordered","Wouter",83546001,2),(3,"1699","2011-03-10 15:16:19","2011-04-16 23:51:43","Delivered","Wouter",83546002,3),(4,"1399","2013-12-09 13:34:47","2013-05-17 03:34:33","Shipped","Kevin",83546003,4),(5,"1699","2011-09-30 12:24:26","2010-07-01 10:41:23","Ordered","Kevin",83546004,5),(6,"1699","2017-09-13 02:20:18","2011-03-14 21:04:24","Delivered","Jos",83546005,6),(7,"1399","2015-02-08 16:17:15","2013-10-04 22:52:11","Paid","Jos",83546006,7),(8,"1699","2013-07-26 19:19:49","2018-01-24 20:46:53","Paid","Kevin",83546007,8),(9,"1399","2015-07-29 00:31:55","2018-04-03 04:58:31","Delivered","Wouter",83546008,9),(10,"1699","2015-11-13 14:11:03","2017-08-13 19:57:51","Paid","Kevin",83546009,10);
