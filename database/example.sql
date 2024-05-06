-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for asset_management
CREATE DATABASE IF NOT EXISTS `asset_management` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `asset_management`;

-- Dumping structure for table asset_management.addresses
CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address_category` int DEFAULT NULL,
  `company_id` int DEFAULT NULL,
  `contact_id` int DEFAULT NULL,
  `nation` varchar(100) NOT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `detail` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_addresses_companies` (`company_id`),
  KEY `fk_addresses_contacts` (`contact_id`),
  CONSTRAINT `fk_addresses_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`),
  CONSTRAINT `fk_addresses_contacts` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.addresses: ~9 rows (approximately)
INSERT INTO `addresses` (`id`, `address_category`, `company_id`, `contact_id`, `nation`, `province`, `city`, `detail`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, NULL, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:51', '2024-04-23 11:02:51'),
	(2, 1, 3, NULL, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:51', '2024-04-23 11:02:51'),
	(3, 1, 4, NULL, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:51', '2024-04-23 11:02:51'),
	(4, 1, 2, NULL, 'Canada', 'Ontario', 'Toronto', '500 King St', '2024-04-23 11:02:51', '2024-04-23 11:02:51'),
	(5, NULL, NULL, 1, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:53', '2024-04-23 11:02:53'),
	(6, NULL, NULL, 3, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:53', '2024-04-23 11:02:53'),
	(7, NULL, NULL, 4, 'USA', 'California', 'San Francisco', '101 Market St', '2024-04-23 11:02:53', '2024-04-23 11:02:53'),
	(8, NULL, NULL, 2, 'Canada', 'Ontario', 'Toronto', '500 King St', '2024-04-23 11:02:53', '2024-04-23 11:02:53'),
	(10, 1, 7, NULL, 'Indonesia', 'Papua', 'Timika-Kuala Kencana', 'PT Trakindo Utama Tembagapura Division, TELP.(62-901) 438 238, 438 108, 438267, FAX. (62-901) 438 100, 302166, LPO: 99920, 0901438264, PIC: Merlin Pandema', '2024-04-24 04:54:25', '2024-04-24 04:54:25'),
	(11, 1, 8, NULL, 'Indonesia', 'Kalimantan Timur', 'Balikpapan', 'Jl. Sultan Hasanuddin No. 08 RT 01 Kariangau, Kode Pos 76134', '2024-04-24 06:14:13', '2024-04-24 06:14:13');

-- Dumping structure for table asset_management.address_category
CREATE TABLE IF NOT EXISTS `address_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `address_id` int DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_address_category_addresses` (`address_id`),
  CONSTRAINT `fk_address_category_addresses` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.address_category: ~2 rows (approximately)
INSERT INTO `address_category` (`id`, `address_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 1, 'HQ', 'Headquarter Address', '2024-04-23 11:02:54', '2024-04-23 11:02:54'),
	(2, 2, 'BR', 'Branch Address', '2024-04-23 11:02:54', '2024-04-23 11:02:54');

-- Dumping structure for table asset_management.backups
CREATE TABLE IF NOT EXISTS `backups` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int DEFAULT NULL,
  `vendor_id` int DEFAULT NULL,
  `unit_id` int NOT NULL,
  `given_date` date NOT NULL,
  `taken_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `backups_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `backups_ibfk_2` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`),
  CONSTRAINT `backups_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.backups: ~2 rows (approximately)
INSERT INTO `backups` (`id`, `customer_id`, `vendor_id`, `unit_id`, `given_date`, `taken_date`) VALUES
	(1, NULL, 4, 18, '2024-01-03', '2024-02-03'),
	(2, 4, NULL, 19, '2024-02-03', '2024-03-03');

-- Dumping structure for table asset_management.bast_records
CREATE TABLE IF NOT EXISTS `bast_records` (
  `id` int NOT NULL AUTO_INCREMENT,
  `delivery_id` int NOT NULL,
  `service_offer_id` int DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `transaction_id` int DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `received_by` varchar(255) DEFAULT NULL,
  `received_on` date DEFAULT NULL,
  `deployed_date` date DEFAULT NULL,
  `sn_device` varchar(255) DEFAULT NULL,
  `completeness` text,
  `contract_period` date DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_bast_records_units` (`unit_id`),
  KEY `fk_bast_records_transactions` (`transaction_id`),
  KEY `fk_bast_records_deliveries` (`delivery_id`),
  KEY `fk_bast_records_customers` (`customer_id`),
  KEY `fk_bast_records_service_offers` (`service_offer_id`),
  CONSTRAINT `fk_bast_records_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_bast_records_deliveries` FOREIGN KEY (`delivery_id`) REFERENCES `deliveries` (`id`),
  CONSTRAINT `fk_bast_records_service_offers` FOREIGN KEY (`service_offer_id`) REFERENCES `service_offers` (`id`),
  CONSTRAINT `fk_bast_records_transactions` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `fk_bast_records_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.bast_records: ~2 rows (approximately)
INSERT INTO `bast_records` (`id`, `delivery_id`, `service_offer_id`, `unit_id`, `customer_id`, `transaction_id`, `location`, `position`, `received_by`, `received_on`, `deployed_date`, `sn_device`, `completeness`, `contract_period`, `shipping_address`) VALUES
	(5, 10, 4, 28, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-10', NULL, NULL, NULL, NULL),
	(6, 11, 5, 29, NULL, NULL, NULL, NULL, NULL, NULL, '2024-03-10', NULL, NULL, NULL, NULL);

-- Dumping structure for table asset_management.branches
CREATE TABLE IF NOT EXISTS `branches` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_branches_code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.branches: ~0 rows (approximately)

-- Dumping structure for table asset_management.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `headquarter_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_headquarter_id` (`headquarter_id`),
  CONSTRAINT `fk_headquarter_id` FOREIGN KEY (`headquarter_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.companies: ~8 rows (approximately)
INSERT INTO `companies` (`id`, `headquarter_id`, `name`, `phone`, `email`, `website`, `created_at`, `updated_at`) VALUES
	(1, NULL, 'Tech Solutions', '123-456-7890', 'info@techsolutions.com', 'www.techsolutions.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(2, NULL, 'Tech DUA Solutions', '123-456-7890', 'info@techsolutions.com', 'www.techsolutions.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(3, NULL, 'Tech TIGA Solutions', '123-456-7890', 'info@techsolutions.com', 'www.techsolutions.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(4, NULL, 'Tech EMPAT Solutions', '123-456-7890', 'info@techsolutions.com', 'www.techsolutions.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(5, NULL, 'Tech LIMA Solutions', '123-456-7890', 'info@techsolutions.com', 'www.techsolutions.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(6, NULL, 'Innovatech', '987-654-3210', 'contact@innovatech.com', 'www.innovatech.com', '2024-04-23 10:58:37', '2024-04-23 10:58:37'),
	(7, 1, 'PT Trakindo Utama Tembagapura Division', '(62-901) 438 238', NULL, NULL, '2024-04-24 04:23:30', '2024-04-26 02:07:37'),
	(8, 6, 'PT. Sanggar Sarana Baja', '05427863000', NULL, NULL, '2024-04-24 06:13:27', '2024-04-26 02:08:16');

-- Dumping structure for table asset_management.computer_specifications
CREATE TABLE IF NOT EXISTS `computer_specifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cpu` varchar(100) DEFAULT NULL,
  `ram` int DEFAULT NULL,
  `hdd` int DEFAULT NULL,
  `sdd` int DEFAULT NULL,
  `vga` varchar(100) DEFAULT NULL,
  `display` varchar(100) DEFAULT NULL,
  `battery` varchar(100) DEFAULT NULL,
  `operating_system` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.computer_specifications: ~3 rows (approximately)
INSERT INTO `computer_specifications` (`id`, `cpu`, `ram`, `hdd`, `sdd`, `vga`, `display`, `battery`, `operating_system`, `created_at`, `updated_at`) VALUES
	(1, 'i5-1235U', 16, 512, NULL, 'Intel Iris Xe Graphics', '14.0"', '3 Cell, 42 Wh', 'Windows 11 Pro x64', '2024-04-23 11:02:43', '2024-04-23 11:02:43'),
	(2, 'i7-12800H', 32, 1000, NULL, 'NVIDIA T600 Laptop 4GB', '15.6"', '6 Cell, 83 Wh', 'Windows 11 Pro x64', '2024-04-23 11:02:43', '2024-04-23 11:02:43'),
	(3, 'i5-13600 ', 16, 256, NULL, 'Intel Integrated Graphics', 'Dell 20 Monitor - E2020H', '-', 'Windows 11 Pro x64', '2024-04-23 11:02:43', '2024-04-23 11:02:43');

-- Dumping structure for table asset_management.contacts
CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_contact_companies` (`company_id`),
  CONSTRAINT `fk_contact_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.contacts: ~4 rows (approximately)
INSERT INTO `contacts` (`id`, `company_id`, `name`, `phone`, `email`, `website`, `created_at`, `updated_at`) VALUES
	(1, 1, 'John Doe', '111-222-3333', 'jdoe@techsolutions.com', 'www.johndoe.com', '2024-04-23 10:58:39', '2024-04-23 10:58:39'),
	(2, 2, 'John DUA Doe', '111-222-3333', 'jdoe@techsolutions.com', 'www.johndoe.com', '2024-04-23 10:58:39', '2024-04-23 10:58:39'),
	(3, 3, 'John TIGA Doe', '111-222-3333', 'jdoe@techsolutions.com', 'www.johndoe.com', '2024-04-23 10:58:39', '2024-04-23 10:58:39'),
	(4, 4, 'Jane Smith', '444-555-6666', 'jsmith@innovatech.com', 'www.janesmith.com', '2024-04-23 10:58:39', '2024-04-23 10:58:39'),
	(5, 7, 'Merlin Pandema', '(62-901) 438 238', NULL, NULL, '2024-04-24 04:26:43', '2024-04-24 04:26:43'),
	(6, 8, 'Puspito Ady', '62 811-1464-534', NULL, NULL, '2024-04-24 06:13:55', '2024-04-24 06:13:55');

-- Dumping structure for table asset_management.contracts
CREATE TABLE IF NOT EXISTS `contracts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `customer_id` int NOT NULL,
  `unit_id` int NOT NULL,
  `payment_terms` text,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `unit_id` (`unit_id`),
  CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `contracts_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.contracts: ~7 rows (approximately)
INSERT INTO `contracts` (`id`, `start_date`, `end_date`, `customer_id`, `unit_id`, `payment_terms`) VALUES
	(1, '2022-01-01', '2023-01-01', 1, 11, 'Net 30 Days'),
	(2, '2022-01-02', '2023-01-02', 1, 12, 'Net 30 Days'),
	(3, '2023-01-03', '2024-01-03', 1, 12, 'Net 30 Days'),
	(4, '2022-06-02', '2024-06-02', 1, 16, 'Net 30 Days'),
	(5, '2023-07-03', '2024-07-03', 1, 17, 'Net 30 Days'),
	(6, '2022-12-02', '2024-12-02', 1, 13, 'Net 30 Days'),
	(7, '2023-12-03', '2024-12-03', 1, 14, 'Net 30 Days');

-- Dumping structure for table asset_management.customers
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_customers_companies` (`company_id`),
  CONSTRAINT `fk_customers_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.customers: ~4 rows (approximately)
INSERT INTO `customers` (`id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 1, '2024-04-23 10:58:41', '2024-04-23 10:58:41'),
	(2, 3, '2024-04-23 10:58:41', '2024-04-23 10:58:41'),
	(3, 7, '2024-04-24 04:27:01', '2024-04-24 04:27:01'),
	(4, 8, '2024-04-24 06:13:59', '2024-04-24 06:13:59');

-- Dumping structure for table asset_management.deliveries
CREATE TABLE IF NOT EXISTS `deliveries` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `delivery_date` date NOT NULL,
  `delivery_method` varchar(100) DEFAULT NULL,
  `delivery_status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `received_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_deliveries_units` (`unit_id`),
  KEY `fk_deliveries_customers` (`customer_id`),
  CONSTRAINT `fk_deliveries_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_deliveries_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.deliveries: ~9 rows (approximately)
INSERT INTO `deliveries` (`id`, `unit_id`, `customer_id`, `delivery_date`, `delivery_method`, `delivery_status`, `created_at`, `updated_at`, `received_date`) VALUES
	(3, 8, 4, '2023-03-03', 'FedEx', 'Delivered', '2024-04-23 16:01:05', '2024-04-24 06:15:32', '2023-03-13'),
	(4, 9, 3, '2023-03-03', 'FedEx', 'Delivered', '2024-04-23 16:01:05', '2024-04-24 06:15:32', '2023-03-13'),
	(5, 10, 4, '2022-03-03', 'UPS', 'Delivered', '2024-04-23 16:01:05', '2024-04-24 06:15:32', '2022-03-08'),
	(6, 11, 3, '2023-03-03', 'UPS', 'Delivered', '2024-04-23 16:01:05', '2024-04-24 06:15:32', '2023-03-13'),
	(7, 12, 4, '2021-03-04', 'UPS', 'Delivered', '2024-04-23 16:01:05', '2024-04-24 06:15:32', '2021-03-03'),
	(9, 13, 3, '2021-03-03', 'FedEx', 'Delivered', '2024-04-24 04:29:43', '2024-04-24 05:15:41', '2021-03-03'),
	(10, 28, 3, '2024-03-05', 'FedEx', 'Delivered', '2024-04-25 05:02:14', '2024-04-25 05:02:14', NULL),
	(11, 29, 4, '2024-03-05', 'UPS', 'Delivered', '2024-04-25 05:02:14', '2024-04-25 05:02:14', NULL);

-- Dumping structure for table asset_management.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.employees: ~2 rows (approximately)
INSERT INTO `employees` (`id`, `full_name`, `occupation`, `email`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'Alice Johnson', 'IT Manager', 'alice.johnson@techsolutions.com', '123-456-7891', '2024-04-23 13:42:50', '2024-04-23 13:42:50'),
	(2, 'Bob Smith', 'Support Specialist', 'bob.smith@techsolutions.com', '123-456-7892', '2024-04-23 13:42:50', '2024-04-23 13:42:50');

-- Dumping structure for table asset_management.guarantees
CREATE TABLE IF NOT EXISTS `guarantees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_guarantees_vendors` (`vendor_id`),
  CONSTRAINT `fk_guarantees_vendors` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.guarantees: ~4 rows (approximately)
INSERT INTO `guarantees` (`id`, `vendor_id`, `code`, `type`, `name`, `created_at`, `updated_at`) VALUES
	(5, 3, 'G123', 'Manufacturer', 'Standard One Year Warranty', '2024-04-23 11:06:30', '2024-04-23 11:06:30'),
	(6, 4, 'G456', 'Manufacturer', 'Two Year Extended Warranty', '2024-04-23 11:06:30', '2024-04-23 11:06:30'),
	(7, 3, 'G123', 'Manufacturer', 'Standard One Year Warranty', '2024-04-23 13:42:39', '2024-04-23 13:42:39'),
	(8, 4, 'G456', 'Manufacturer', 'Two Year Extended Warranty', '2024-04-23 13:42:39', '2024-04-23 13:42:39');

-- Dumping structure for table asset_management.insurances
CREATE TABLE IF NOT EXISTS `insurances` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_insurances_vendors` (`vendor_id`),
  CONSTRAINT `fk_insurances_vendors` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.insurances: ~4 rows (approximately)
INSERT INTO `insurances` (`id`, `vendor_id`, `code`, `type`, `name`, `created_at`, `updated_at`) VALUES
	(1, 3, 'I789', 'Damage', 'Accidental Damage Protection', '2024-04-23 11:06:33', '2024-04-23 11:06:33'),
	(2, 4, 'I101', 'Theft', 'Theft Protection', '2024-04-23 11:06:33', '2024-04-23 11:06:33'),
	(3, 3, 'I789', 'Damage', 'Accidental Damage Protection', '2024-04-23 13:42:45', '2024-04-23 13:42:45'),
	(4, 4, 'I101', 'Theft', 'Theft Protection', '2024-04-23 13:42:45', '2024-04-23 13:42:45');

-- Dumping structure for table asset_management.internals
CREATE TABLE IF NOT EXISTS `internals` (
  `id` int NOT NULL AUTO_INCREMENT,
  `given_date` date NOT NULL,
  `employee_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_internals_employees` (`employee_id`),
  CONSTRAINT `fk_internals_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.internals: ~0 rows (approximately)

-- Dumping structure for table asset_management.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `metode` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.payments: ~2 rows (approximately)
INSERT INTO `payments` (`id`, `code`, `metode`) VALUES
	(1, 'PMT001', 'Credit Card'),
	(2, 'PMT002', 'Bank Transfer');

-- Dumping structure for table asset_management.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `vendor_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `comp_spec` int DEFAULT NULL,
  `spare_spec` int DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_products_vendors` (`vendor_id`),
  KEY `fk_products_product_categories` (`category_id`),
  KEY `fk_products_computer_specifications` (`comp_spec`),
  KEY `fk_products_sparepart_specifications` (`spare_spec`),
  CONSTRAINT `fk_products_computer_specifications` FOREIGN KEY (`comp_spec`) REFERENCES `computer_specifications` (`id`),
  CONSTRAINT `fk_products_product_categories` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`),
  CONSTRAINT `fk_products_sparepart_specifications` FOREIGN KEY (`spare_spec`) REFERENCES `sparepart_specifications` (`id`),
  CONSTRAINT `fk_products_vendors` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.products: ~3 rows (approximately)
INSERT INTO `products` (`id`, `vendor_id`, `category_id`, `comp_spec`, `spare_spec`, `brand`, `model`, `price`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 1, NULL, 'HP', 'Probook 440 G9', 1500.00, '2024-04-23 11:02:49', '2024-04-23 11:02:49'),
	(2, 1, 3, 3, NULL, 'DELL', 'OptiPlex Plus 7010 SFF', 3000.00, '2024-04-23 11:02:49', '2024-04-23 11:02:49'),
	(3, 2, 1, 2, NULL, 'HP', 'Zbook Power G9', 2500.00, '2024-04-23 11:02:49', '2024-04-23 11:02:49');

-- Dumping structure for table asset_management.product_categories
CREATE TABLE IF NOT EXISTS `product_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.product_categories: ~3 rows (approximately)
INSERT INTO `product_categories` (`id`, `code`, `name`) VALUES
	(1, 'LAP', 'Laptops'),
	(2, 'SPR', 'Sparepart'),
	(3, 'DSK', 'Desktops');

-- Dumping structure for table asset_management.purchases
CREATE TABLE IF NOT EXISTS `purchases` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `vendor_id` int NOT NULL,
  `payment_id` int NOT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `delivery_cost` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `total_bill` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_purchases_vendors` (`vendor_id`),
  KEY `fk_purchases_payment` (`payment_id`),
  CONSTRAINT `fk_purchases_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`),
  CONSTRAINT `fk_purchases_vendors` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.purchases: ~0 rows (approximately)

-- Dumping structure for table asset_management.rents
CREATE TABLE IF NOT EXISTS `rents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `customer_id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `payment_id` int NOT NULL,
  `delivery_cost` decimal(10,2) DEFAULT NULL,
  `engineer_cost` decimal(10,2) DEFAULT NULL,
  `entrtain_cost` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `total_bill` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_rents_customers` (`customer_id`),
  KEY `fk_rents_employees` (`employee_id`),
  KEY `fk_rents_payment` (`payment_id`),
  CONSTRAINT `fk_rents_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_rents_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_rents_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.rents: ~2 rows (approximately)
INSERT INTO `rents` (`id`, `invoice_date`, `customer_id`, `employee_id`, `payment_id`, `delivery_cost`, `engineer_cost`, `entrtain_cost`, `total_price`, `total_cost`, `total_bill`, `created_at`, `updated_at`) VALUES
	(1, '2024-03-03', 1, 1, 1, 25.00, 50.00, 15.00, 3000.00, 90.00, 3165.00, '2024-04-23 14:18:04', '2024-04-23 14:18:04'),
	(2, '2024-03-04', 2, 2, 2, 30.00, 75.00, 20.00, 4500.00, 125.00, 4725.00, '2024-04-23 14:18:04', '2024-04-23 14:18:04');

-- Dumping structure for table asset_management.request_categories
CREATE TABLE IF NOT EXISTS `request_categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.request_categories: ~3 rows (approximately)
INSERT INTO `request_categories` (`id`, `code`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'REQ1', 'New Request', '2024-04-23 10:59:47', '2024-04-23 10:59:47'),
	(2, 'REQ2', 'Renewal', '2024-04-23 10:59:47', '2024-04-23 10:59:47'),
	(3, 'REQ3', 'Replacement', '2024-04-23 10:59:47', '2024-04-23 10:59:47');

-- Dumping structure for table asset_management.sales
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_date` date NOT NULL,
  `customer_id` int NOT NULL,
  `employee_id` int DEFAULT NULL,
  `payment_id` int NOT NULL,
  `delivery_cost` decimal(10,2) DEFAULT NULL,
  `engineer_cost` decimal(10,2) DEFAULT NULL,
  `entrtain_cost` decimal(10,2) DEFAULT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `total_cost` decimal(10,2) DEFAULT NULL,
  `total_bill` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_sales_customers` (`customer_id`),
  KEY `fk_sales_employees` (`employee_id`),
  KEY `fk_sales_payment` (`payment_id`),
  CONSTRAINT `fk_sales_customers` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  CONSTRAINT `fk_sales_employees` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  CONSTRAINT `fk_sales_payment` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.sales: ~1 rows (approximately)
INSERT INTO `sales` (`id`, `invoice_date`, `customer_id`, `employee_id`, `payment_id`, `delivery_cost`, `engineer_cost`, `entrtain_cost`, `total_price`, `total_cost`, `total_bill`, `created_at`, `updated_at`) VALUES
	(5, '2024-03-01', 1, 1, 1, 50.00, 100.00, 30.00, 1500.00, 180.00, 1710.00, '2024-04-23 14:18:01', '2024-04-23 14:18:01'),
	(6, '2024-03-02', 2, 2, 2, 75.00, 150.00, 45.00, 2500.00, 270.00, 2895.00, '2024-04-23 14:18:01', '2024-04-23 14:18:01');

-- Dumping structure for table asset_management.scraps
CREATE TABLE IF NOT EXISTS `scraps` (
  `id` int NOT NULL AUTO_INCREMENT,
  `demolish_date` date NOT NULL,
  `quatity` int NOT NULL,
  `reason` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.scraps: ~0 rows (approximately)

-- Dumping structure for table asset_management.service_offers
CREATE TABLE IF NOT EXISTS `service_offers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `class` varchar(255) NOT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_service_offers_products` (`product_id`),
  CONSTRAINT `fk_service_offers_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.service_offers: ~3 rows (approximately)
INSERT INTO `service_offers` (`id`, `code`, `class`, `product_id`, `created_at`, `updated_at`) VALUES
	(4, 'LG10', 'Laptop General V.10', 1, '2024-04-23 11:02:50', '2024-04-23 11:02:50'),
	(5, 'DG02', 'DESKTOP GENERAL TTD V.02', 2, '2024-04-23 11:02:50', '2024-04-23 11:02:50'),
	(6, 'LP10', 'Laptop Performance V.10', 3, '2024-04-23 11:02:50', '2024-04-23 11:02:50');

-- Dumping structure for table asset_management.sparepart_specifications
CREATE TABLE IF NOT EXISTS `sparepart_specifications` (
  `id` int NOT NULL AUTO_INCREMENT,
  `spec` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.sparepart_specifications: ~2 rows (approximately)
INSERT INTO `sparepart_specifications` (`id`, `spec`, `created_at`, `updated_at`) VALUES
	(1, '256GB SSD', '2024-04-23 11:02:47', '2024-04-23 11:02:47'),
	(2, '2TB Hard Drive', '2024-04-23 11:02:47', '2024-04-23 11:02:47');

-- Dumping structure for table asset_management.stagings
CREATE TABLE IF NOT EXISTS `stagings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `request_category` int DEFAULT NULL,
  `service_offer` int DEFAULT NULL,
  `po_number` varchar(100) DEFAULT NULL,
  `staging_date` date DEFAULT NULL,
  `finish_date` date DEFAULT NULL,
  `sla_staging` varchar(50) DEFAULT NULL,
  `end_po` date DEFAULT NULL,
  `qc_date` date DEFAULT NULL,
  `monitor` varchar(100) DEFAULT NULL,
  `sn_termination` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_satging_details_request_categories` (`request_category`),
  KEY `fk_satging_details_service_offers` (`service_offer`),
  CONSTRAINT `fk_satging_details_request_categories` FOREIGN KEY (`request_category`) REFERENCES `request_categories` (`id`),
  CONSTRAINT `fk_satging_details_service_offers` FOREIGN KEY (`service_offer`) REFERENCES `service_offers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.stagings: ~0 rows (approximately)

-- Dumping structure for table asset_management.status_units
CREATE TABLE IF NOT EXISTS `status_units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.status_units: ~5 rows (approximately)
INSERT INTO `status_units` (`id`, `code`, `name`) VALUES
	(1, 'AVL', 'Available'),
	(2, 'SLD', 'Sold'),
	(3, 'MST', 'MST'),
	(4, 'LOC', 'Internal Used'),
	(5, 'OOS', 'Out of Stock'),
	(11, 'BCU', 'Backup');

-- Dumping structure for table asset_management.terminations
CREATE TABLE IF NOT EXISTS `terminations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `decision_date` date NOT NULL,
  `actual_date` date DEFAULT NULL,
  `transaction_id` int NOT NULL,
  `reason` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int DEFAULT NULL,
  `unit_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_termintaions_transactions` (`transaction_id`),
  KEY `fk_termination_statuses_terminations` (`status`),
  KEY `fk_terminations_units` (`unit_id`),
  CONSTRAINT `fk_termination_statuses_terminations` FOREIGN KEY (`status`) REFERENCES `termination_statuses` (`id`),
  CONSTRAINT `fk_terminations_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  CONSTRAINT `fk_termintaions_transactions` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.terminations: ~2 rows (approximately)
INSERT INTO `terminations` (`id`, `decision_date`, `actual_date`, `transaction_id`, `reason`, `created_at`, `updated_at`, `status`, `unit_id`) VALUES
	(3, '2023-03-01', '2023-03-15', 20, 'Device no longer needed', '2024-04-25 03:53:32', '2024-04-25 03:53:32', NULL, 26),
	(4, '2023-03-05', NULL, 21, 'Device replaced', '2024-04-25 03:53:32', '2024-04-25 03:53:32', NULL, 27);

-- Dumping structure for table asset_management.termination_statuses
CREATE TABLE IF NOT EXISTS `termination_statuses` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.termination_statuses: ~0 rows (approximately)

-- Dumping structure for table asset_management.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_id` int NOT NULL,
  `transaction_date` date NOT NULL,
  `sale_id` int DEFAULT NULL,
  `rent_id` int DEFAULT NULL,
  `purchase_id` int DEFAULT NULL,
  `quantity` int NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_transactions_units` (`unit_id`),
  KEY `fk_transactions_sales` (`sale_id`),
  KEY `fk_transactions_rents` (`rent_id`),
  KEY `fk_transactions_purchases` (`purchase_id`),
  CONSTRAINT `fk_transactions_purchases` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`),
  CONSTRAINT `fk_transactions_rents` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`),
  CONSTRAINT `fk_transactions_sales` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`),
  CONSTRAINT `fk_transactions_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.transactions: ~5 rows (approximately)
INSERT INTO `transactions` (`id`, `unit_id`, `transaction_date`, `sale_id`, `rent_id`, `purchase_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
	(17, 8, '2024-03-01', 5, NULL, NULL, 1, 1500.00, '2024-04-23 14:19:21', '2024-04-23 14:19:21'),
	(18, 9, '2024-03-02', NULL, 1, NULL, 1, 2500.00, '2024-04-23 14:19:21', '2024-04-23 14:19:21'),
	(19, 10, '2024-03-02', 6, NULL, NULL, 1, 2500.00, '2024-04-23 14:19:21', '2024-04-23 14:19:21'),
	(20, 11, '2024-03-02', NULL, 2, NULL, 1, 2500.00, '2024-04-23 14:19:21', '2024-04-23 14:19:21'),
	(21, 12, '2024-03-02', NULL, 1, NULL, 1, 2500.00, '2024-04-23 14:19:21', '2024-04-23 14:19:21');

-- Dumping structure for table asset_management.units
CREATE TABLE IF NOT EXISTS `units` (
  `id` int NOT NULL AUTO_INCREMENT,
  `condition_id` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `status_unit_id` int DEFAULT NULL,
  `insurance_id` int DEFAULT NULL,
  `guarantee_id` int DEFAULT NULL,
  `serial_number` varchar(100) DEFAULT NULL,
  `guarantee` tinyint(1) DEFAULT NULL,
  `guarantee_date` date DEFAULT NULL,
  `guarantee_exp_date` date DEFAULT NULL,
  `insurance` tinyint(1) DEFAULT NULL,
  `insurance_date` date DEFAULT NULL,
  `insurance_exp_date` date DEFAULT NULL,
  `production_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_units_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_units_products` (`product_id`),
  KEY `fk_units_insurances` (`insurance_id`),
  KEY `fk_units_guarantees` (`guarantee_id`),
  KEY `fk_units_unit_conditions` (`condition_id`),
  KEY `fk_units_status_units` (`status_unit_id`),
  CONSTRAINT `fk_units_guarantees` FOREIGN KEY (`guarantee_id`) REFERENCES `guarantees` (`id`),
  CONSTRAINT `fk_units_insurances` FOREIGN KEY (`insurance_id`) REFERENCES `insurances` (`id`),
  CONSTRAINT `fk_units_products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  CONSTRAINT `fk_units_status_units` FOREIGN KEY (`status_unit_id`) REFERENCES `status_units` (`id`),
  CONSTRAINT `fk_units_unit_conditions` FOREIGN KEY (`condition_id`) REFERENCES `unit_conditions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.units: ~15 rows (approximately)
INSERT INTO `units` (`id`, `condition_id`, `product_id`, `status_unit_id`, `insurance_id`, `guarantee_id`, `serial_number`, `guarantee`, `guarantee_date`, `guarantee_exp_date`, `insurance`, `insurance_date`, `insurance_exp_date`, `production_date`, `created_at`, `updated_at`, `status_units_id`) VALUES
	(7, 1, 1, 4, 1, 5, 'SN001', 1, '2024-01-01', '2025-01-01', 1, '2024-01-01', '2025-01-01', '2023-01-01', '2024-04-23 13:50:00', '2024-04-24 02:37:26', NULL),
	(8, 2, 2, 2, 2, 6, 'SN002', 1, '2024-01-02', '2025-01-02', 1, '2024-01-02', '2025-01-02', '2023-01-02', '2024-04-23 13:50:00', '2024-04-24 02:36:36', NULL),
	(9, 3, 3, 3, 3, 7, 'SN003', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2023-01-03', '2024-04-23 13:50:00', '2024-04-24 02:34:40', NULL),
	(10, 1, 1, 2, 1, 5, 'SN004', 1, '2024-01-01', '2025-01-01', 1, '2024-01-01', '2025-01-01', '2023-01-01', '2024-04-23 13:57:10', '2024-04-24 02:36:36', NULL),
	(11, 2, 2, 3, 2, 6, 'SN005', 1, '2024-01-02', '2025-01-02', 1, '2024-01-02', '2025-01-02', '2023-01-02', '2024-04-23 13:57:10', '2024-04-24 02:34:40', NULL),
	(12, 3, 3, 3, 3, 7, 'SN006', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2023-01-03', '2024-04-23 13:57:10', '2024-04-24 02:34:40', NULL),
	(13, 1, 1, 1, 1, 5, 'SN007', 1, '2024-01-01', '2025-01-01', 1, '2024-01-01', '2025-01-01', '2023-01-01', '2024-04-24 02:16:44', '2024-04-24 02:33:09', NULL),
	(14, 2, 2, 1, 2, 6, 'SN008', 1, '2024-01-02', '2025-01-02', 1, '2024-01-02', '2025-01-02', '2023-01-02', '2024-04-24 02:16:44', '2024-04-24 02:33:09', NULL),
	(15, 3, 3, 1, 3, 7, 'SN009', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2023-01-03', '2024-04-24 02:16:44', '2024-04-24 02:33:09', NULL),
	(16, 3, 3, NULL, 3, 7, 'SN099', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2020-01-03', '2024-04-24 02:43:39', '2024-04-24 02:43:39', NULL),
	(17, 3, 3, NULL, 3, 7, 'SN099', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2021-08-03', '2024-04-24 02:44:57', '2024-04-24 02:44:57', NULL),
	(18, 3, 3, 11, 3, 7, 'SN020', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2021-08-03', '2024-04-24 06:30:27', '2024-04-24 06:30:27', NULL),
	(19, 3, 3, 11, 3, 7, 'SN021', 1, '2024-01-03', '2025-01-03', 1, '2024-01-03', '2025-01-03', '2021-08-03', '2024-04-24 06:30:27', '2024-04-24 06:30:27', NULL),
	(26, 1, 1, NULL, 1, 6, 'SN001', 1, '2022-01-01', '2023-01-01', 1, '2022-01-01', '2023-01-01', '2021-01-01', '2024-04-25 03:42:48', '2024-04-25 03:42:48', 3),
	(27, 2, 2, NULL, 2, 7, 'SN002', 1, '2022-01-02', '2023-01-02', 1, '2022-01-02', '2023-01-02', '2021-01-02', '2024-04-25 03:42:48', '2024-04-25 03:42:48', 3),
	(28, 1, 1, NULL, 1, 6, 'SN001', 1, '2022-01-01', '2023-01-01', 1, '2022-01-01', '2023-01-01', '2021-01-01', '2024-04-25 04:59:51', '2024-04-25 04:59:51', 3),
	(29, 2, 2, NULL, 2, 7, 'SN002', 1, '2022-01-02', '2023-01-02', 1, '2022-01-02', '2023-01-02', '2021-01-02', '2024-04-25 04:59:51', '2024-04-25 04:59:51', 3);

-- Dumping structure for table asset_management.unit_conditions
CREATE TABLE IF NOT EXISTS `unit_conditions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.unit_conditions: ~4 rows (approximately)
INSERT INTO `unit_conditions` (`id`, `code`, `name`) VALUES
	(1, 'NEW', 'New'),
	(2, 'RF', 'Refurbish'),
	(3, 'ST', 'Short Term'),
	(4, 'USED', 'Used');

-- Dumping structure for table asset_management.unit_logs
CREATE TABLE IF NOT EXISTS `unit_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `unit_id` int DEFAULT NULL,
  `scrap_id` int DEFAULT NULL,
  `internal_id` int DEFAULT NULL,
  `transaction_id` int DEFAULT NULL,
  `staging_id` int DEFAULT NULL,
  `termination_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_unit_logs_scraps` (`scrap_id`),
  KEY `fk_unit_logs_internals` (`internal_id`),
  KEY `fk_unit_logs_transactions` (`transaction_id`),
  KEY `fk_unit_logs_stagings` (`staging_id`),
  KEY `fk_unit_logs_terminations` (`termination_id`),
  KEY `fk_unit_logs_units` (`unit_id`),
  CONSTRAINT `fk_unit_logs_internals` FOREIGN KEY (`internal_id`) REFERENCES `internals` (`id`),
  CONSTRAINT `fk_unit_logs_scraps` FOREIGN KEY (`scrap_id`) REFERENCES `scraps` (`id`),
  CONSTRAINT `fk_unit_logs_stagings` FOREIGN KEY (`staging_id`) REFERENCES `stagings` (`id`),
  CONSTRAINT `fk_unit_logs_terminations` FOREIGN KEY (`termination_id`) REFERENCES `terminations` (`id`),
  CONSTRAINT `fk_unit_logs_transactions` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`),
  CONSTRAINT `fk_unit_logs_units` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.unit_logs: ~2 rows (approximately)
INSERT INTO `unit_logs` (`id`, `unit_id`, `scrap_id`, `internal_id`, `transaction_id`, `staging_id`, `termination_id`, `created_at`, `updated_at`) VALUES
	(4, 26, NULL, NULL, NULL, NULL, 3, '2023-02-28 17:00:00', '2023-03-14 17:00:00');

-- Dumping structure for table asset_management.vendors
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int NOT NULL AUTO_INCREMENT,
  `company_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_vendors_companies` (`company_id`),
  CONSTRAINT `fk_supliers_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table asset_management.vendors: ~4 rows (approximately)
INSERT INTO `vendors` (`id`, `company_id`, `created_at`, `updated_at`) VALUES
	(1, 2, '2024-04-23 10:58:42', '2024-04-23 10:58:42'),
	(2, 4, '2024-04-23 10:58:42', '2024-04-23 10:58:42'),
	(3, 5, '2024-04-23 11:04:59', '2024-04-23 11:04:59'),
	(4, 6, '2024-04-23 11:04:59', '2024-04-23 11:04:59');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
