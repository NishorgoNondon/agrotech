SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `Area` (
    `Postal Code` CHAR(4) NOT NULL UNIQUE CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    `Area Name` VARCHAR(100) NOT NULL,
    PRIMARY KEY(`Postal Code`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `Area` (`Postal Code`, `Area Name`) VALUES
('1400', 'Narayanganj'),
('1500', 'Munshiganj'),
('1600', 'Narsingdi'),
('1700', 'Gazipur'),
('1800', 'Manikganj'),
('2000', 'Jamalpur'),
('2100', 'Sherpur'),
('2200', 'Mymensingh'),
('2210', 'Ishwarganj'),
('2220', 'Muktagacha'),
('2230', 'Fulbaria'),
('2240', 'Bhaluka'),
('2241', 'Gouripur'),
('2260', 'Trishal'),
('2300', 'Kishoreganj'),
('2400', 'Netrokona'),
('3000', 'Sunamganj'),
('3100', 'Sylhet'),
('3200', 'Maulvibazar'),
('3210', 'Sreemangal'),
('3220', 'Golapganj'),
('3240', 'Barlekha'),
('3250', 'Beanibazar'),
('3260', 'Zakiganj'),
('3300', 'Habiganj'),
('3500', 'Comilla'),
('3600', 'Chandpur'),
('3700', 'Lakshmipur'),
('3800', 'Noakhali'),
('3900', 'Feni'),
('4000', 'Chattogram'),
('4400', 'Khagrachari'),
('4500', 'Rangamati'),
('4600', 'Bandarban'),
('4700', "Coxs's Bazar"),
('5100', 'Thakurgaon'),
('5200', 'Dinajpur'),
('5300', 'Nilphamari'),
('5400', 'Rangpur'),
('5450', 'Badarganj'),
('5500', 'Lalmonirhat'),
('5600', 'Kurigram'),
('5700', 'Gaibandha'),
('5800', 'Bogura'),
('5900', 'Joypurhat'),
('6000', 'Rajshahi'),
('6100', 'Naogaon'),
('6200', 'Natore'),
('6220', 'Puthia'),
('6300', 'Chapainawabganj'),
('6400', 'Natore'),
('6500', 'Naogaon'),
('6600', 'Pabna'),
('6700', 'Sirajganj'),
('7000', 'Kushtia'),
('7100', 'Meherpur'),
('7200', 'Chuadanga'),
('7300', 'Jhenaidah'),
('7400', 'Jessore'),
('7500', 'Narail'),
('7600', 'Magura'),
('8200', 'Barisal'),
('8300', 'Bhola'),
('8400', 'Jhalokati'),
('8410', 'Uzirpur'),
('8420', 'Muladi'),
('8440', 'Gournadi'),
('8500', 'Pirojpur'),
('8600', 'Patuakhali'),
('8700', 'Barguna'),
('9000', 'Khulna'),
('9100', 'Satkhira'),
('9200', 'Bagerhat'),
('9300', 'Bagerhat'),
('9400', 'Satkhira');



CREATE TABLE `Participant` (
    `User ID` CHAR(8) NOT NULL UNIQUE CHECK (`User ID` REGEXP '^[0-9]+$'),
    `First Name` VARCHAR(50) NOT NULL CHECK (`First Name` REGEXP '^[a-zA-Z]+$'),
    `Last Name` VARCHAR(50) NOT NULL CHECK (`Last Name` REGEXP '^[a-zA-Z]+$'),
    `Gender` ENUM('Male', 'Female', 'Other') NOT NULL,
    `Area`VARCHAR(500) DEFAULT NULL,
    `Contact` CHAR(11) DEFAULT NULL CHECK (`Contact` LIKE '01%' AND `Contact` REGEXP '^[0-9]+$'),
    `Password`VARCHAR(16) NOT NULL CHECK (LENGTH(`Password`) BETWEEN 6 AND 16),
    `Type` ENUM('Employee', 'Dealer', 'Farmer') NOT NULL,
    PRIMARY KEY(`User ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Employee` (
    `Employee ID` CHAR(8) NOT NULL UNIQUE CHECK (`Employee ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Employee ID`),
    CONSTRAINT `emp_fk01` FOREIGN KEY (`Employee ID`) REFERENCES `Participant` (`User ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Technician` (
    `Technician ID` CHAR(8) NOT NULL UNIQUE CHECK (`Technician ID` REGEXP '^[0-9]+$'),
    `Postal Code` CHAR(4) NOT NULL CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Technician ID`),
    CONSTRAINT `tc_fk01` FOREIGN KEY (`Technician ID`) REFERENCES `Employee` (`Employee ID`),
    CONSTRAINT `tc_fk02` FOREIGN KEY (`Postal Code`) REFERENCES `Area` (`Postal Code`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Agronomist` (
    `Agronomist ID` CHAR(8) NOT NULL UNIQUE CHECK (`Agronomist ID` REGEXP '^[0-9]+$'),
    `Postal Code` CHAR(4) NOT NULL CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Agronomist ID`),
    CONSTRAINT `ag_fk01` FOREIGN KEY (`Agronomist ID`) REFERENCES `Employee` (`Employee ID`),
    CONSTRAINT `ag_fk02` FOREIGN KEY (`Postal Code`) REFERENCES `Area` (`Postal Code`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `District Officer` (
    `District Officer ID` CHAR(8) NOT NULL UNIQUE CHECK (`District Officer ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`District Officer ID`),
    CONSTRAINT `dso_fk01` FOREIGN KEY (`District Officer ID`) REFERENCES `Employee` (`Employee ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Field Officer` (
    `Field Officer ID` CHAR(8) NOT NULL UNIQUE CHECK (`Field Officer ID` REGEXP '^[0-9]+$'),
    `District Officer ID` CHAR(8) NOT NULL UNIQUE CHECK (`District Officer ID` REGEXP '^[0-9]+$'),
    `Postal Code` CHAR(4) NOT NULL CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Field Officer ID`),
    CONSTRAINT `fldo_fk01` FOREIGN KEY (`Field Officer ID`) REFERENCES `Employee` (`Employee ID`),
    CONSTRAINT `fldo_fk02` FOREIGN KEY (`District Officer ID`) REFERENCES `District Officer` (`District Officer ID`),
    CONSTRAINT `fldo_fk03` FOREIGN KEY (`Postal Code`) REFERENCES `Area` (`Postal Code`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Dealer` (
    `Dealer ID` CHAR(8) NOT NULL UNIQUE CHECK (`Dealer ID` REGEXP '^[0-9]+$'),
    `Address` VARCHAR(500) DEFAULT NULL,
    PRIMARY KEY (`Dealer ID`),
    CONSTRAINT `dlr_fk01` FOREIGN KEY (`Dealer ID`) REFERENCES `Participant` (`User ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Field Officer Dealer` (
    `Field Officer ID` CHAR(8) NOT NULL CHECK (`Field Officer ID` REGEXP '^[0-9]+$'),
    `Dealer ID` CHAR(8) NOT NULL CHECK (`Dealer ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Field Officer ID`, `Dealer ID`),
    CONSTRAINT `fldo_d_fk01` FOREIGN KEY (`Field Officer ID`) REFERENCES `Field Officer` (`Field Officer ID`),
    CONSTRAINT `fldo_d_fk02` FOREIGN KEY (`Dealer ID`) REFERENCES `Dealer` (`Dealer ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Farmer` (
    `Farmer ID` CHAR(8) NOT NULL UNIQUE CHECK (`Farmer ID` REGEXP '^[0-9]+$'),
    `Address` VARCHAR(500) NOT NULL,
    PRIMARY KEY (`Farmer ID`),
    CONSTRAINT `frmr_fk01` FOREIGN KEY (`Farmer ID`) REFERENCES `Participant` (`User ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Farm` (
    `Farm ID` CHAR(8) NOT NULL UNIQUE CHECK (`Farm ID` REGEXP '^[0-9]+$'),
    `Owner Name` VARCHAR(100) NOT NULL CHECK (`Owner Name` REGEXP '^[a-zA-Z ]+$'),
    `Farm Address` VARCHAR(500) NOT NULL,
    `Postal Code` CHAR(4) NOT NULL CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    `Farmer ID` CHAR(8) NOT NULL CHECK (`Farmer ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Farm ID`),
    CONSTRAINT `frm_fk01` FOREIGN KEY (`Postal Code`) REFERENCES `Area` (`Postal Code`),
    CONSTRAINT `frm_fk02` FOREIGN KEY (`Farmer ID`) REFERENCES `Farmer` (`Farmer ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Sensor` (
    `Sensor ID` CHAR(8) NOT NULL UNIQUE CHECK (`Sensor ID` REGEXP '^[0-9]+$'),
    `Position` VARCHAR(500) NOT NULL,
    `Farm ID` CHAR(8) NOT NULL CHECK (`Farm ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Sensor ID`),
    CONSTRAINT `snsr_fk01` FOREIGN KEY (`Farm ID`) REFERENCES `Farm` (`Farm ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Product` (
    `Product ID` CHAR(8) NOT NULL UNIQUE CHECK (`Product ID` REGEXP '^[0-9]+$'),
    `Product Type` VARCHAR(50) NOT NULL,
    `Product Name` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`Product ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Dealer Product` (
    `Dealer ID` CHAR(8) NOT NULL CHECK (`Dealer ID` REGEXP '^[0-9]+$'),
    `Product ID` CHAR(8) NOT NULL CHECK (`Product ID` REGEXP '^[0-9]+$'),
    `Unit Price` INT NOT NULL CHECK (`Unit Price` > 0),
    PRIMARY KEY (`Dealer ID`, `Product ID`),
    CONSTRAINT `dlr_pr_fk01` FOREIGN KEY (`Dealer ID`) REFERENCES `Dealer` (`Dealer ID`),
    CONSTRAINT `dlr_pr_fk02` FOREIGN KEY (`Product ID`) REFERENCES `Product` (`Product ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Order` (
    `Order ID` CHAR(8) NOT NULL UNIQUE CHECK (`Order ID` REGEXP '^[0-9]+$'),
    `Order Date`DATE NOT NULL,
    `Shipping Mode` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`Order ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Order Line` (
    `Order ID` CHAR(8) NOT NULL CHECK (`Order ID` REGEXP '^[0-9]+$'),
    `Product ID` CHAR(8) NOT NULL CHECK (`Product ID` REGEXP '^[0-9]+$'),
    `Farm ID` CHAR(8) NOT NULL CHECK (`Farm ID` REGEXP '^[0-9]+$'),
    `Quantity` INT NOT NULL CHECK(`Quantity` > 0),
    PRIMARY KEY (`Order ID`, `Product ID`, `Farm ID`),
    CONSTRAINT `ordln_fk01` FOREIGN KEY (`Order ID`) REFERENCES `Order` (`Order ID`),
    CONSTRAINT `ordln_fk02` FOREIGN KEY (`Product ID`) REFERENCES `Product` (`Product ID`),
    CONSTRAINT `ordln_fk03` FOREIGN KEY (`Farm ID`) REFERENCES `Farm` (`Farm ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Field Officer Order` (
    `Field Officer ID` CHAR(8) NOT NULL CHECK (`Field Officer ID` REGEXP '^[0-9]+$'),
    `Order ID` CHAR(8) NOT NULL CHECK (`Order ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Field Officer ID`, `Order ID`),
    CONSTRAINT `fldo_ord_fk01` FOREIGN KEY (`Field Officer ID`) REFERENCES `Field Officer` (`Field Officer ID`),
    CONSTRAINT `fldo_ord_fk02` FOREIGN KEY (`Order ID`) REFERENCES `Order` (`Order ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Weather Data` (
    `Weather Data Date` DATE NOT NULL,
    `Temperature` DECIMAL(5, 2) NOT NULL CHECK (`Temperature` >= -10 AND `Temperature` <= 46),
    `Wind Speed` DECIMAL(5, 2) NOT NULL CHECK (`Wind Speed` >= 0),
    `Atmospheric Pressure` DECIMAL(6, 2) NOT NULL CHECK (`Atmospheric Pressure` >= 950 AND `Atmospheric Pressure` <= 1050),
    `Humidity` DECIMAL(5, 2) NOT NULL CHECK (`Humidity` >= 0 AND `Humidity` <= 100),
    `Predicted Temperature` DECIMAL(5, 2) NOT NULL CHECK (`Predicted Temperature` >= -10 AND `Predicted Temperature` <= 46),
    `Predicted Wind Speed` DECIMAL(5, 2) NOT NULL CHECK (`Predicted Wind Speed` >= 0),
    `Predicted Atmospheric Pressure` DECIMAL(6, 2) NOT NULL CHECK (`Predicted Atmospheric Pressure` >= 950 AND `Predicted Atmospheric Pressure` <= 1050),
    `Predicted Humidity` DECIMAL(5, 2) NOT NULL CHECK (`Predicted Humidity` >= 0 AND `Predicted Humidity` <= 100),
    `Postal Code` CHAR(4) NOT NULL CHECK (`Postal Code` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Weather Data Date`),
    CONSTRAINT `w_fk01` FOREIGN KEY (`Postal Code`) REFERENCES `Area` (`Postal Code`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


CREATE TABLE `Crop` (
    `Farm ID` CHAR(8) NOT NULL CHECK (`Farm ID` REGEXP '^[0-9]+$'),
    `Crop Name` VARCHAR(50) NOT NULL,
    `Planting Date` DATE NOT NULL,
    `Harvesting Date` DATE NOT NULL CHECK (`Harvesting Date` >= `Planting Date`),
    `Fertilizer` VARCHAR(50) DEFAULT NULL,
    `Crop Weight` DECIMAL(10, 2) NOT NULL CHECK (`Crop Weight` > 0),
    `Harvested Area` DECIMAL(10, 2) NOT NULL CHECK (`Harvested Area` > 0),
    `Damaged Crop Weight` DECIMAL(10, 2) NOT NULL CHECK (`Damaged Crop Weight` > 0),
    PRIMARY KEY (`Farm ID`, `Crop Name`),
    CONSTRAINT `crp_fk01` FOREIGN KEY (`Farm ID`) REFERENCES `Farm` (`Farm ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Soil` (
    `Soil ID` CHAR(8) NOT NULL UNIQUE CHECK (`Soil ID` REGEXP '^[0-9]+$'),
    `Soil Type` VARCHAR(50),
    `Soil Moisture` DECIMAL(5, 2) CHECK (`Soil Moisture` >= 0),
    `pH Level` DECIMAL(5, 2) CHECK (`pH Level` >= 0 AND `pH Level` <= 14),
    `Nutrition Level` VARCHAR(50),
    `Soil Color` VARCHAR(50),
    `Soil Texture` VARCHAR(50),
    `Fertility Status` VARCHAR(50),
    `Sensor ID` CHAR(8) CHECK (`Sensor ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Soil ID`),
    CONSTRAINT `sl_fk01` FOREIGN KEY (`Sensor ID`) REFERENCES `Sensor` (`Sensor ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `Problem` ( 
    `Problem ID` CHAR(8) NOT NULL UNIQUE CHECK (`Problem ID` REGEXP '^[0-9]+$'),
    `Occur Date` DATE NOT NULL,
    `Description` TEXT,
    `Suggestion` TEXT,
    `Farm ID` CHAR(8) NOT NULL CHECK (`Farm ID` REGEXP '^[0-9]+$'),
    `Farmer ID` CHAR(8) CHECK (`Farmer ID` REGEXP '^[0-9]+$'),
    `Field Officer ID` CHAR(8) CHECK (`Field Officer ID` REGEXP '^[0-9]+$'),
    `Technician ID` CHAR(8) CHECK (`Technician ID` REGEXP '^[0-9]+$'),
    `Agronomist ID` CHAR(8) CHECK (`Agronomist ID` REGEXP '^[0-9]+$'),
    PRIMARY KEY (`Problem ID`),
    CONSTRAINT `prb_fk01` FOREIGN KEY (`Farm ID`) REFERENCES `Farm` (`Farm ID`),
    CONSTRAINT `prb_fk02` FOREIGN KEY (`Farmer ID`) REFERENCES `Farmer` (`Farmer ID`),
    CONSTRAINT `prb_fk03` FOREIGN KEY (`Field Officer ID`) REFERENCES `Field Officer` (`Field Officer ID`),
    CONSTRAINT `prb_fk04` FOREIGN KEY (`Technician ID`) REFERENCES `Technician` (`Technician ID`),
    CONSTRAINT `prb_fk05` FOREIGN KEY (`Agronomist ID`) REFERENCES `Agronomist` (`Agronomist ID`)
)   ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;