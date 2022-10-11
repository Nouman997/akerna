create database akerna_db;

use akerna_db;

CREATE TABLE `beverages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `beverage` varchar(100) NOT NULL,
  `consumed_mg` varchar(100) NOT NULL,
  `consumed_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
)