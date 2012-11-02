-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 15, 2012 at 02:56 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `steelcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `glossary`
--

DROP TABLE IF EXISTS `glossary`;
CREATE TABLE IF NOT EXISTS `glossary` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `slug` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `user_id` int(12) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '2012-01-01 01:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------


--
-- Dumping data for table `users`
--

INSERT INTO `glossary` (`name`, `slug`, `description`, `status`, `user_id`) VALUES
('Bar','bar','A device used within a trailer as a means of load securement', 0, 0),     
('Blanket wrap','blanket-wrap','A term used to describe the condition of uncartoned furniture that has been wrapped in a furniture blanket or pad.', 0, 0),     
('Boat table','boat-table','A term used to categorize a large wood crated top or table.', 0, 0),      
('CST','cst','Consolidated Shuttle Trailer or a load of furniture that ships from a Factory Distribution Center (FDC) to a Regional Distribution Center (RDC).', 0, 0),     
('CTN','ctn','A term used to indicate a cartoned product.', 0, 0),      
('Cube','cube','A unit of measure used to calculate the space used within a trailer.', 0, 0),     
('Deck','deck','A loading surface created with bars and plywood within a trailer to increase cube utilization.', 0, 0),     
('Dry van','dry-van','A trailer style that has no means of climate control.', 0, 0),      
('FDC','fdc','Factory Distribution Center or the area adjacent to a manufacturing facility that is used to ship product to other locations.', 0, 0),      
('Flat pack','flat-pack','A pack that is long, thin, and deep such as a panel or top.', 0, 0),      
('Guiding Principles','guiding-principles','Basic handling and loading rules that apply to all typical situations.', 0, 0),     
('JBS','jbs','The finer detail of the categorical elements of standard work.', 0, 0),     
('Job Breakdown Sheet','job-breakdown-sheet','The finer detail of the categorical elements of standard work.', 0, 0),     
('Label','label','Paper attached to product that identified the product as well as customer and shipping information.', 0, 0),      
('Loading pattern','loading-pattern','Required loading method for a given product to guarantee optimum cube utilization as well as a damage free shipment.', 0, 0),     
('Logistic','logistic','Term used to describe load securement devices within a trailer.', 0, 0),      
('Material Handling Device','material-handling-device','A device used to convey furniture such as a dolly or rack.', 0, 0),     
('Mock-up','mock-up','Product that will be used in a presentation aimed at a potential customer or sale.', 0, 0),     
('NAPD','napd','North American Physical Distribution. A term used to describe the Steelcase distribution network as a whole entity.', 0, 0),      
('Nest','nest','A term used to describe the act of stacking two like products one upon the other where they are typically stacked top to top or in the case of chairs, seat to seat.', 0, 0),     
('Padded','padded','Term used to describe product that has been wrapped in a furniture blanket.', 0, 0),      
('Pallet','pallet','A material handling devise used to containerize product, often moved by hilo.', 0, 0),      
('Pig','pig','Term used to describe a trailer that will be moved cross country on the rail.', 0, 0),      
('Piggy back','piggy-back','Term used to describe a trailer that was been loaded on a rail "spline car" for the purpose of movement by rail.', 0, 0),     
('PIT','pit','Powered Industrial Truck (HILO)', 0, 0),      
('PRTT','prtt','General term used to describe a nonconforming product or a physical location in one of several NAPD facilities.', 0, 0),      
('QMN','qmn','A notification process within SAP that is used to communicate nonconformance as well as record corrective and preventive actions.', 0, 0),      
('Quality Alert','quality-alert','A process used in distribution to raise the level of awareness regarding a particular problem or concern. Issued by Logistics QA.', 0, 0),      
('RDC','rdc','Regional Distribution Center', 0, 0),     
('Reefer','reefer','Refrigerated road trailer', 0, 0),      
('Scanning','scanning','The act of scanning allows SAP to track the physical location of product within NAPD.', 0, 0),      
('Spline car','spline-car','Rail car used to move a road trailer by way of the railroad system.', 0, 0),      
('Standard work','standard-work','Used to describe the document that details the categorical elements of a given job.', 0, 0),      
('Stop','stop','Term used to describe a particular delivery of a load. Example: A load my be comprised of three stops. Each stop contains the product for one of the three customers for which the load was planned. The driver must make 3 deliveries in order to deliver all the stops.', 0, 0),      
('Strap','strap','A buckled device used to secure the load in a trailer.', 0, 0),     
('Suicide load','suicide-load','The act of loading a piece of furniture that creates a hazard to the operator if it should fall over. Typically loaded perpendicular to the length of the trailer.', 0, 0),     
('Tier','tier','A layer within a load.', 0, 0),     
('UNC ','unc','Term used to describe product that typically has no pack protecting its surfaces.', 0, 0),     
('Uncartoned','uncartoned','Term used to describe product that typically has no pack protecting its surfaces.', 0, 0),
('3PL','3pl','Third Party Logistics', 0, 0),
('401(k)','401k','tax-deferred retirement savings account', 0, 0),
('4CC','4cc','4 Columbus Circle, N.Y. (Steelcase WorkLife New York)', 0, 0),
('A&D','AD','Architect(s) and Designer(s)', 0, 0),
('AAC','aac','Attribute Application Code', 0, 0),
('ABC','abc','Activity Based Costing', 0, 0),
('ACD','acd','Automatic Call Distribution', 0, 0),
('ACK','ack','Acknowledgement', 0, 0),
('ACRONYM','acronym','"A Contrived Reduction of Nomenclature Yielding Mnemonics"', 0, 0),
('ACW','acw','After Call Work', 0, 0),
('ADA','ada','Americans with Disability Act', 0, 0),
('ADR','adr','Automated Delivery Request', 0, 0),
('ad.con','adcon','Advanced Concepts & Design', 0, 0),
('AEA','aea','Advanced Engineering Applications', 0, 0),
('AFT','aft','Architecture, Furniture, Technology', 0, 0),
('AI','ai','Aviation (mail code)', 0, 0),
('AIA','aia','The American Institute of Architects', 0, 0),
('ANSI','ansi','American National Standards Institute', 0, 0),
('AP','ap','Accounts Payable', 0, 0),
('APAC','apac','Asia Pacific', 0, 0),
('API','api','Application Programming Interface', 0, 0),
('APS','aps','Advanced Planning System', 0, 0),
('AR','ar','Accounts Receivable', 0, 0),
('ARA','ara','ARA vending (mail code)', 0, 0),
('ASM','asm','Area Sales Manager', 0, 0),
('ASQ','asq','American Society for Quality', 0, 0),
('ASID','asid','American Society of Interior Designers', 0, 0),
('ASR','asr','Account Support Representative', 0, 0),
('ASSE','asse','American Society of Safety Engineers', 0, 0),
('ATM','atm','Asynchronous Transfer Mode (new super fast network)', 0, 0),
('AVP','avp','Area Vice President', 0, 0),
('BCS','bcs','Business Consolidations (sub-set of SEM)', 0, 0),
('BIC','bic','Business Information Collection (sub-set of SEM)', 0, 0),
('BIFMA','bifma','Business & Institutional Furniture Manufacturer''s Association', 0, 0),
('BMS','bms','Business Management System', 0, 0),
('BOM','bom','Bill of Materials', 0, 0),
('BPIA','bpia','Business Products Industry Association (formerly NOPA)', 0, 0),
('BPM','bpm','Building Product Muscle BPS - Business Planning & Simulations (sub-set of SEM)', 0, 0),
('BSA','bsa','Business Software Alliance', 0, 0),
('BVQI','bvqi','Bureau Veritas Quality International', 0, 0),
('BW','bw','Business Information Warehouse (SAP''s data warehouse solution)', 0, 0),
('BYO','byo','Bring Your Own', 0, 0),
('C2C','c2c','Cradle to Cradle', 0, 0),
('CA','ca','Cost Accounting', 0, 0),
('CAC','cac','Corrective Action Coordinator', 0, 0),
('CAD','cad','Computer-Aided Design', 0, 0),
('CAM','cam','Computer-Aided Manufacturing', 0, 0),
('CAP','cap','Computer-Aided Planning', 0, 0),
('CAR','car','Corrective Action Request', 0, 0),
('Cat 5','cat-5','Category 5 cable (TIA designation for data-grade phone cable)', 0, 0),
('CBM','cbm','Center Butt Match', 0, 0),
('CBT','cbt','Computer Based Training', 0, 0),
('CCR','ccr','Customer Complaint Resolution', 0, 0),
('CDC','cdc','Corporate Development Center (mail code)', 0, 0),
('CDA','cda','Competitive Discount Authorization', 0, 0),
('CDIC','cdic','Corporate Development Information Center', 0, 0),
('CDPM','cdpm','Customer Delivery Performance Monitor', 0, 0),
('CEO','ceo','Chief Executive Officer', 0, 0),
('CFO','cfo','Chief Financial Officer', 0, 0),
('CICS','cics','Customer Information Control System', 0, 0),
('CIDB','cidb','Company Information Data Base', 0, 0),
('CIM','cim','Computer-Integrated Manufacturing', 0, 0),
('CIO','cio','Chief Information Officer', 0, 0),
('CMMS','cmms','Computerized Maintenance Management System', 0, 0),
('CNC','cnc','Computer Numerical Control', 0, 0),
('CODB','codb','Customer Order Database', 0, 0),
('COGS','cogs','Cost of goods sold', 0, 0),
('C.O.L.','col','Customers Own Leather', 0, 0),
('COLI','coli','Company Owned Life Insurance', 0, 0),
('C.O.M.','com','Customers Own Material', 0, 0),
('CoQ','coq','Cost of Quality', 0, 0),
('COS','cos','Cost of Sales (same as Cost of Goods Sold)', 0, 0),
('CP','cp','Control Plan', 0, 0),
('CPM','cpm','Corporate Performance Monitor (sub-set of SEM)', 0, 0),
('CPP','cpp','Customer Purchase Price', 0, 0),
('CPR','cpr','Computer Products and Resources', 0, 0),
('CPU','cpu','Central Processing Unit', 0, 0),
('CQ','cq','Commercial Quality (steel)', 0, 0),
('CQA','cqa','Certified Quality Auditor', 0, 0),
('CQE','cqe','Certified Quality Engineer', 0, 0),
('CQM','cqm','Certified Quality Manager', 0, 0),
('CQT','cqt','Certified Quality Technician or Cross-functional Quality Team', 0, 0),
('CRS','crs','Cold Rolled Steel', 0, 0),
('CRT','crt','Cathode-Ray Tube', 0, 0),
('CSR','csr','Customer Service Representative', 0, 0),
('CSWC','cswc','Cyclical Standard Work Chart', 0, 0),
('CTO','cto','Chief Technology Officer', 0, 0),
('DACEP','dacep','Dealer Alliance Career Entry Program', 0, 0),
('DB','db','Database', 0, 0),
('DBC','dbc','Dealer Business Consultant', 0, 0),
('DBPR','dbpr','Database Product Review', 0, 0),
('DCC','dcc','Disability Case Coordinator', 0, 0),
('DDL','ddl','Daily Dispatch List', 0, 0),
('DFC','dfc','Design for Competitiveness', 0, 0),
('DFMEA','dfmea','Design Failure Mode Effects Analysis', 0, 0),
('DFT','dft','Demand Flow Technology', 0, 0),
('DLRI','dlri','Dealer Inquiry', 0, 0),
('DLVY','dlvy','Delivery', 0, 0),
('DMS','dms','Disability Management Services', 0, 0),
('DOS','dos','Disk Operating System', 0, 0),
('DPMA','dpma','Data Processing Management Association', 0, 0),
('DPP','dpp','Dealer Purchase Price', 0, 0),
('DQAK','dqak','Draw Quality Acid Killed (steel)', 0, 0),
('DQSK','dqsk','Draw Quality Special Killed (steel)', 0, 0),
('DSR','dsr','Dealer Sales Representative', 0, 0),
('DVPR','dvpr','Design Verification Plan & Report', 0, 0),
('DWCI','dwci','Dealer World Class Installer', 0, 0),
('DWCP','dwcp','Dealer World Class Performance', 0, 0);    

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`) VALUES
(1, 'Safety'),
(2, 'Dos and Don''ts'),
(3, 'Materials'),
(4, 'Preloading'),
(5, 'Loading');

--
-- Table structure for table `performances`
--

DROP TABLE IF EXISTS `performances`;
CREATE TABLE IF NOT EXISTS `performances` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `score` decimal(10,3) NOT NULL,
  `duration` float NOT NULL,
  `module_id` int(12) NOT NULL,
  `trainee_id` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

--
-- Table structure for table `performance-objects`
--

DROP TABLE IF EXISTS `performance_objects`;
CREATE TABLE IF NOT EXISTS `performance_objects` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `key` varchar(20) COLLATE utf8_bin NOT NULL,
  `value` text COLLATE utf8_bin NOT NULL,
  `performance_id` int(12) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trainees`
--

DROP TABLE IF EXISTS `trainees`;
CREATE TABLE IF NOT EXISTS `trainees` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(20) COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visited_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `type` int(3) NOT NULL DEFAULT '0',
  `status` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `type`, `status`) VALUES
(1, 'jay', '$2a$15$y7yKsS68GmcKJMazmh2RJ.8kvSIqrm0BAO3Wznd5Ydb3WGNUks.Se', 'jayzawrotny@gmail.com', 0, 0),
(2, 'wes', '$2a$15$ciaNB1Us4HM5cbAX4awmcuUDZJfqMhL.NzvsbwWnFUQTBJw5ypbka', 'wes.kempa@gmail.com', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
