-- phpMyAdmin SQL Dump
-- version 4.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2015 at 03:59 PM
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
-- Table structure for table `contract`
--

CREATE TABLE IF NOT EXISTS `contract` (
  `contract_id` int(11) unsigned NOT NULL,
  `unit_id` int(11) unsigned NOT NULL,
  `contract_monthly_unit_price` decimal(11,0) NOT NULL,
  `contract_start_date` date NOT NULL,
  `contract_end_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines a contract between a unit and one or many tenants';

-- --------------------------------------------------------

--
-- Table structure for table `contract_tenant`
--

CREATE TABLE IF NOT EXISTS `contract_tenant` (
  `contract_id` int(11) unsigned NOT NULL,
  `tenant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines one or more tenants that will be linked to a contract';

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
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `expense_id` int(11) unsigned NOT NULL,
  `expense_type_id` int(11) unsigned NOT NULL,
  `property_id` int(11) unsigned NOT NULL,
  `unit_id` int(11) unsigned DEFAULT NULL,
  `expense_amount` decimal(11,0) NOT NULL,
  `expense_reference` varchar(128) NOT NULL DEFAULT '',
  `expense_description` text NOT NULL,
  `expense_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Keep track of expenses linked with properties and their units';

-- --------------------------------------------------------

--
-- Table structure for table `expense_type`
--

CREATE TABLE IF NOT EXISTS `expense_type` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name_en` varchar(128) NOT NULL DEFAULT '' COMMENT '“caretaker, electricity, air conditioning, paint, plumbing”',
  `type_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Possible types of expenses that may be associated to properties';

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
-- Table structure for table `receipt`
--

CREATE TABLE IF NOT EXISTS `receipt` (
  `receipt_id` int(11) unsigned NOT NULL,
  `contract_id` int(11) unsigned NOT NULL,
  `receipt_amount_due` decimal(11,0) NOT NULL,
  `receipt_monthyear` date NOT NULL COMMENT 'month and year this contract belongs to',
  `receipt_datetime_created` datetime NOT NULL,
  `receipt_payment_status` enum('paid','unpaid') NOT NULL DEFAULT 'unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='You can only have one receipt for a given month for any contract\nAgent must first select the month/year and the property, and based the current active contracts on that property you will view all receipts that must be generated and ones that have been generated.\nAgent can then select which receipts he wishes to generate, status of them by default is unpaid\nFor receipt of the first month, will need to divide the number of days they rented by 30 to get the percentage of payment they need to pay';

-- --------------------------------------------------------

--
-- Table structure for table `receipt_payment`
--

CREATE TABLE IF NOT EXISTS `receipt_payment` (
  `payment_id` int(11) unsigned NOT NULL,
  `receipt_id` int(11) unsigned NOT NULL,
  `payment_amount` decimal(11,0) NOT NULL,
  `payment_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE IF NOT EXISTS `tenant` (
  `tenant_id` int(11) unsigned NOT NULL,
  `company_id` int(11) unsigned NOT NULL,
  `country_id` int(11) unsigned NOT NULL,
  `tenant_first_name` varchar(128) NOT NULL DEFAULT '',
  `tenant_second_name` varchar(128) DEFAULT '',
  `tenant_third_name` varchar(128) DEFAULT '',
  `tenant_fourth_name` varchar(128) DEFAULT '',
  `tenant_last_name` varchar(128) NOT NULL DEFAULT '',
  `tenant_work_address` text NOT NULL,
  `tenant_phone1` varchar(128) NOT NULL DEFAULT '',
  `tenant_phone2` varchar(128) NOT NULL DEFAULT '',
  `tenant_marital_status` enum('single','married','divorced') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Companies can keep track of all their tenants in this table';

-- --------------------------------------------------------

--
-- Table structure for table `tenant_identification`
--

CREATE TABLE IF NOT EXISTS `tenant_identification` (
  `identify_id` int(11) unsigned NOT NULL,
  `tenant_id` int(11) unsigned NOT NULL,
  `identifytype_id` int(11) unsigned NOT NULL,
  `identify_number` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Every tenant can have multiple identifications (civil id etc.)';

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
-- Table structure for table `unit_question_response`
--

CREATE TABLE IF NOT EXISTS `unit_question_response` (
  `response_id` int(11) unsigned NOT NULL,
  `question_id` int(11) unsigned NOT NULL,
  `unit_id` int(11) unsigned NOT NULL,
  `response_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '(2) living rooms OR FALSE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table stores all responses to questions defined for a unit';

-- --------------------------------------------------------

--
-- Table structure for table `unit_type`
--

CREATE TABLE IF NOT EXISTS `unit_type` (
  `type_id` int(11) unsigned NOT NULL,
  `type_name_en` varchar(128) NOT NULL DEFAULT '' COMMENT 'eg: Apartment, Basement, Floor, Office',
  `type_name_ar` varchar(128) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Shows available types of units.\nBased on the selected unit type, the user is required to answer additional questions about the unit';

-- --------------------------------------------------------

--
-- Table structure for table `unit_type_question`
--

CREATE TABLE IF NOT EXISTS `unit_type_question` (
  `question_id` int(11) unsigned NOT NULL,
  `unit_type_id` int(11) unsigned NOT NULL,
  `question_text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'eg: Number of Living Rooms?',
  `question_response_type` enum('number','true/false') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'number'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Defines questions that must be answered for creation and update of unit types\nYou have two options which must be validated: True False questions and Number based';

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE IF NOT EXISTS `vacancy` (
  `id` int(11) unsigned NOT NULL,
  `unit_id` int(11) unsigned NOT NULL,
  `vacancy_unit_price` decimal(11,0) NOT NULL COMMENT '300 KD monthly rent',
  `vacancy_monthyear` date NOT NULL COMMENT '12-2014'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Every end of month, a cron job will run and populate this table.\nScript will loop through all properties and look for units that don’t have contracts and store amount for each unit';

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
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`), ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `contract_tenant`
--
ALTER TABLE `contract_tenant`
  ADD PRIMARY KEY (`contract_id`,`tenant_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`), ADD KEY `expense_type_id` (`expense_type_id`), ADD KEY `property_id` (`property_id`), ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `expense_type`
--
ALTER TABLE `expense_type`
  ADD PRIMARY KEY (`type_id`);

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
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`receipt_id`), ADD KEY `contract_id` (`contract_id`);

--
-- Indexes for table `receipt_payment`
--
ALTER TABLE `receipt_payment`
  ADD PRIMARY KEY (`payment_id`), ADD KEY `receipt_id` (`receipt_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`tenant_id`), ADD KEY `company_id` (`company_id`), ADD KEY `country_id` (`country_id`);

--
-- Indexes for table `tenant_identification`
--
ALTER TABLE `tenant_identification`
  ADD PRIMARY KEY (`identify_id`), ADD KEY `tenant_id` (`tenant_id`), ADD KEY `identifytype_id` (`identifytype_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`), ADD KEY `property_id` (`property_id`), ADD KEY `unit_type_id` (`unit_type_id`);

--
-- Indexes for table `unit_question_response`
--
ALTER TABLE `unit_question_response`
  ADD PRIMARY KEY (`response_id`), ADD KEY `question_id` (`question_id`), ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `unit_type`
--
ALTER TABLE `unit_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `unit_type_question`
--
ALTER TABLE `unit_type_question`
  ADD PRIMARY KEY (`question_id`), ADD KEY `unit_type_id` (`unit_type_id`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `contract_tenant`
--
ALTER TABLE `contract_tenant`
  MODIFY `contract_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `expense_type`
--
ALTER TABLE `expense_type`
  MODIFY `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `receipt_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `receipt_payment`
--
ALTER TABLE `receipt_payment`
  MODIFY `payment_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenant`
--
ALTER TABLE `tenant`
  MODIFY `tenant_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tenant_identification`
--
ALTER TABLE `tenant_identification`
  MODIFY `identify_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_question_response`
--
ALTER TABLE `unit_question_response`
  MODIFY `response_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_type`
--
ALTER TABLE `unit_type`
  MODIFY `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `unit_type_question`
--
ALTER TABLE `unit_type_question`
  MODIFY `question_id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
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
-- Constraints for table `contract`
--
ALTER TABLE `contract`
ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `expense`
--
ALTER TABLE `expense`
ADD CONSTRAINT `expense_ibfk_1` FOREIGN KEY (`expense_type_id`) REFERENCES `expense_type` (`type_id`),
ADD CONSTRAINT `expense_ibfk_2` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
ADD CONSTRAINT `expense_ibfk_3` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

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
-- Constraints for table `receipt`
--
ALTER TABLE `receipt`
ADD CONSTRAINT `receipt_ibfk_1` FOREIGN KEY (`contract_id`) REFERENCES `contract` (`contract_id`);

--
-- Constraints for table `receipt_payment`
--
ALTER TABLE `receipt_payment`
ADD CONSTRAINT `receipt_payment_ibfk_1` FOREIGN KEY (`receipt_id`) REFERENCES `receipt` (`receipt_id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`),
ADD CONSTRAINT `tenant_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `country` (`country_id`);

--
-- Constraints for table `tenant_identification`
--
ALTER TABLE `tenant_identification`
ADD CONSTRAINT `tenant_identification_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`tenant_id`),
ADD CONSTRAINT `tenant_identification_ibfk_2` FOREIGN KEY (`identifytype_id`) REFERENCES `identification_type` (`identifytype_id`);

--
-- Constraints for table `unit`
--
ALTER TABLE `unit`
ADD CONSTRAINT `unit_ibfk_1` FOREIGN KEY (`property_id`) REFERENCES `property` (`property_id`),
ADD CONSTRAINT `unit_ibfk_2` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`type_id`);

--
-- Constraints for table `unit_question_response`
--
ALTER TABLE `unit_question_response`
ADD CONSTRAINT `unit_question_response_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `unit_type_question` (`question_id`),
ADD CONSTRAINT `unit_question_response_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);

--
-- Constraints for table `unit_type_question`
--
ALTER TABLE `unit_type_question`
ADD CONSTRAINT `unit_type_question_ibfk_1` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_type` (`type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
