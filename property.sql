-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 09, 2015 at 03:15 PM
-- Server version: 5.6.22
-- PHP Version: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `property`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) unsigned NOT NULL,
  `admin_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(128) CHARACTER SET latin1 NOT NULL,
  `admin_password` varchar(128) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Admin can add company accounts';

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `agent_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `agent_email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `agent_password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Company can create multiple agents which will manage its account';

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `city_name_en` varchar(128) NOT NULL DEFAULT '',
  `city_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of cities accepted by the system, defined by admin';

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(10) unsigned NOT NULL,
  `company_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company_logo` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company_license` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company_contact_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `company_contact_phone` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Company is the main part of the system, it can operate lands/agents/owners/tenants/etc.';

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) unsigned NOT NULL,
  `country_name_en` varchar(128) NOT NULL DEFAULT '',
  `country_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of countries accepted by the system, defined by admin';

-- --------------------------------------------------------

--
-- Table structure for table `identification_type`
--

CREATE TABLE IF NOT EXISTS `identification_type` (
  `identifytype_id` int(11) unsigned NOT NULL,
  `identifytype_name_en` varchar(128) NOT NULL DEFAULT '',
  `identifytype_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Identification types that will be accepted by the system, defined by admin';

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `land_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `land_type_id` int(11) unsigned NOT NULL,
  `city_id` int(11) unsigned NOT NULL,
  `land_code` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'eg: Z1',
  `land_license` varchar(128) NOT NULL DEFAULT '',
  `land_area` decimal(11,0) NOT NULL COMMENT 'Square Meters',
  `land_address_block` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `land_address_street` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `land_address_avenue` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `land_plot_number` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `land_number` varchar(64) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Each company can define land that it manages';

-- --------------------------------------------------------

--
-- Table structure for table `land_type`
--

CREATE TABLE IF NOT EXISTS `land_type` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name_en` int(11) NOT NULL COMMENT 'eg: commercial, residential, housing, warehousing',
  `type_name_ar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of land types accepted by the system, defined by admin';

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `log_id` bigint(20) unsigned NOT NULL,
  `log_user_id` int(11) unsigned NOT NULL,
  `log_user_type` enum('admin','agent','owner') CHARACTER SET latin1 NOT NULL,
  `log_text` text CHARACTER SET latin1 NOT NULL,
  `log_affected_entity` varchar(48) CHARACTER SET latin1 NOT NULL,
  `log_affected_id` int(11) unsigned NOT NULL,
  `log_datetime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='Keeps track of all changes made in the system by every user';

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE IF NOT EXISTS `owner` (
  `owner_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `owner_first_name` varchar(128) NOT NULL DEFAULT '',
  `owner_second_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `owner_third_name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `owner_last_name` varchar(128) NOT NULL DEFAULT '',
  `owner_work_address` text NOT NULL,
  `owner_phone1` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `owner_phone2` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT '',
  `owner_email` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `owner_password` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='List of owners defined by the company';

-- --------------------------------------------------------

--
-- Table structure for table `ownership`
--

CREATE TABLE IF NOT EXISTS `ownership` (
  `ownership_id` int(11) unsigned NOT NULL,
  `owner_id` int(11) unsigned NOT NULL,
  `land_id` int(11) unsigned NOT NULL,
  `ownership_percentage` decimal(11,0) NOT NULL,
  `ownership_start_date` date NOT NULL,
  `ownership_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table links owner with land and the properties on it, after end date the owner doesn’t get any share of the payments. Owner can have multiple entries on this table with different dates and percentages. This is helpful to keep track of previous owners of a building and how much we need to pay them.';

-- --------------------------------------------------------

--
-- Table structure for table `owner_identification`
--

CREATE TABLE IF NOT EXISTS `owner_identification` (
  `identify_id` int(11) unsigned NOT NULL,
  `owner_id` int(11) unsigned NOT NULL,
  `identifytype_id` int(11) unsigned NOT NULL,
  `identify_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table contains the identification of each owner';

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE IF NOT EXISTS `property` (
  `property_id` int(11) unsigned NOT NULL,
  `property_type_id` int(11) unsigned NOT NULL,
  `land_id` int(11) unsigned NOT NULL,
  `property_number` varchar(128) NOT NULL DEFAULT '',
  `property_name` varchar(128) NOT NULL DEFAULT '',
  `property_number_of_floors` int(11) NOT NULL,
  `property_identification_number` varchar(128) NOT NULL DEFAULT '',
  `property_maximum_units` int(11) NOT NULL,
  `property_management_fee_percent` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Company can add a property onto a land';

-- --------------------------------------------------------

--
-- Table structure for table `property_type`
--

CREATE TABLE IF NOT EXISTS `property_type` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name_en` varchar(128) NOT NULL DEFAULT '' COMMENT 'eg: apartment building, office building, warehouse',
  `type_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Lists the different types of properties - defined by admin';

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE IF NOT EXISTS `unit` (
  `unit_id` int(11) unsigned NOT NULL,
  `property_id` int(11) unsigned NOT NULL,
  `unit_type_id` int(11) unsigned NOT NULL COMMENT 'Based on the selected unit type, the user is required to answer additional questions about the unit',
  `unit_number` varchar(80) NOT NULL DEFAULT '',
  `unit_rent_amount` decimal(11,0) NOT NULL COMMENT '100 KD',
  `unit_rent_amount_in_words_en` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'One hundred KD only',
  `unit_rent_amount_in_words_ar` varchar(256) NOT NULL DEFAULT '',
  `unit_datetime_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines a unit within a property, additional data is supplied based on type';

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE IF NOT EXISTS `unit_type` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name_en` varchar(128) NOT NULL DEFAULT '' COMMENT 'eg: Apartment, Basement, Floor, Office',
  `type_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows available types of units.\nBased on the selected unit type, the user is required to answer additional questions about the unit';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`), ADD KEY `company` (`company_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `identification_type`
--
ALTER TABLE `identification_type`
  ADD PRIMARY KEY (`identifytype_id`);

--
-- Indexes for table `land`
--
ALTER TABLE `land`
  ADD PRIMARY KEY (`land_id`), ADD KEY `company_id` (`company_id`), ADD KEY `land_type_id` (`land_type_id`), ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `land_type`
--
ALTER TABLE `land_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`), ADD KEY `log_user_id` (`log_user_id`), ADD KEY `log_affected_id` (`log_affected_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_id`), ADD KEY `company_id` (`company_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `ownership`
--
ALTER TABLE `ownership`
  ADD PRIMARY KEY (`ownership_id`), ADD KEY `owner_id` (`owner_id`), ADD KEY `land_id` (`land_id`);

--
-- Indexes for table `owner_identification`
--
ALTER TABLE `owner_identification`
  ADD PRIMARY KEY (`identify_id`), ADD KEY `owner_id` (`owner_id`), ADD KEY `identifytype_id` (`identifytype_id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`property_id`), ADD KEY `property_type_id` (`property_type_id`), ADD KEY `land_id` (`land_id`);

--
-- Indexes for table `property_type`
--
ALTER TABLE `property_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`), ADD KEY `property_id` (`property_id`), ADD KEY `unit_type_id` (`unit_type_id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `identification_type`
--
ALTER TABLE `identification_type`
  MODIFY `identifytype_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `land`
--
ALTER TABLE `land`
  MODIFY `land_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `land_type`
--
ALTER TABLE `land_type`
  MODIFY `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `owner_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ownership`
--
ALTER TABLE `ownership`
  MODIFY `ownership_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `owner_identification`
--
ALTER TABLE `owner_identification`
  MODIFY `identify_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `property_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `property_type`
--
ALTER TABLE `property_type`
  MODIFY `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `agent`
--
ALTER TABLE `agent`
ADD CONSTRAINT `agent_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `land`
--
ALTER TABLE `land`
ADD CONSTRAINT `land_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
ADD CONSTRAINT `land_ibfk_2` FOREIGN KEY (`land_type_id`) REFERENCES `land_type` (`type_id`),
ADD CONSTRAINT `land_ibfk_3` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
ADD CONSTRAINT `owner_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `ownership`
--
ALTER TABLE `ownership`
ADD CONSTRAINT `ownership_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`),
ADD CONSTRAINT `ownership_ibfk_2` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`);

--
-- Constraints for table `owner_identification`
--
ALTER TABLE `owner_identification`
ADD CONSTRAINT `owner_identification_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `owner` (`owner_id`),
ADD CONSTRAINT `owner_identification_ibfk_2` FOREIGN KEY (`identifytype_id`) REFERENCES `identification_type` (`identifytype_id`);

--
-- Constraints for table `property`
--
ALTER TABLE `property`
ADD CONSTRAINT `property_ibfk_1` FOREIGN KEY (`property_type_id`) REFERENCES `property_type` (`type_id`),
ADD CONSTRAINT `property_ibfk_2` FOREIGN KEY (`land_id`) REFERENCES `land` (`land_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
