-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 23, 2021 at 07:59 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `realestate`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(1) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `aid` int(2) NOT NULL AUTO_INCREMENT,
  `aname` varchar(20) NOT NULL,
  `did` int(2) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`aid`, `aname`, `did`) VALUES
(1, 'Chalakudy', 2),
(4, 'Angamaly', 1),
(5, 'Thodupuzha', 3);

-- --------------------------------------------------------

--
-- Table structure for table `a_replyenquiry`
--

DROP TABLE IF EXISTS `a_replyenquiry`;
CREATE TABLE IF NOT EXISTS `a_replyenquiry` (
  `a_reid` int(2) NOT NULL AUTO_INCREMENT,
  `s_seid` int(2) NOT NULL,
  `a_re` varchar(100) NOT NULL,
  `srid` int(2) NOT NULL,
  PRIMARY KEY (`a_reid`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_replyenquiry`
--

INSERT INTO `a_replyenquiry` (`a_reid`, `s_seid`, `a_re`, `srid`) VALUES
(27, 9, 'Because there wont be BEDROOM or BATHROOM in an OPEN PLOT', 9);

-- --------------------------------------------------------

--
-- Table structure for table `bfeedback`
--

DROP TABLE IF EXISTS `bfeedback`;
CREATE TABLE IF NOT EXISTS `bfeedback` (
  `bfid` int(2) NOT NULL AUTO_INCREMENT,
  `bf` varchar(50) NOT NULL,
  PRIMARY KEY (`bfid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `bkid` int(2) NOT NULL AUTO_INCREMENT,
  `bid` int(2) DEFAULT NULL,
  `pid` int(2) DEFAULT NULL,
  `bkdate` date NOT NULL,
  `bkstatus` varchar(2) NOT NULL,
  PRIMARY KEY (`bkid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bkid`, `bid`, `pid`, `bkdate`, `bkstatus`) VALUES
(14, 4, 10, '2021-08-24', 'B');

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

DROP TABLE IF EXISTS `buyer`;
CREATE TABLE IF NOT EXISTS `buyer` (
  `bid` int(2) NOT NULL AUTO_INCREMENT,
  `bname` varchar(45) NOT NULL,
  `busername` varchar(15) NOT NULL,
  `bpassword` varchar(16) NOT NULL,
  `bemail` varchar(30) NOT NULL,
  `bphno` varchar(10) NOT NULL,
  `bgender` varchar(6) NOT NULL,
  `bproof` varchar(250) NOT NULL,
  `bstatus` varchar(9) NOT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`bid`, `bname`, `busername`, `bpassword`, `bemail`, `bphno`, `bgender`, `bproof`, `bstatus`) VALUES
(3, 'Sija Bimal', 'sijabimal', 'sijabimal', 'sijabimal@gmail.com', '9048808970', 'female', 'e8e7a975615b35aa510fd19cb49ac144_87b93f6b4f2ad2.jpg', 'Approved'),
(4, 'Dominic', 'dominic', 'dominic', 'dominic@gmail.com', '9856562244', 'male', '9cf0d4053c4a8582fdbcbc224df632f5_812eaf75be266ca.jpg', 'Approved'),
(5, 'Jismon Sojan', 'jismon', 'jismon', 'jismon@gmail.com', '8789555088', 'male', 'bc1ef36a1b90cf1d54910f7b250b3a55_18353482ad5da287dfe.jpg', 'Approved'),
(6, 'Athul Paulachan', 'athul', 'athul', 'athul@gmail.com', '9946651277', 'male', '532c92532afc707fde1eee87d5e1ee9e_16681cabb75.jpg', 'Approved'),
(7, 'Hithesh K Bimal', 'hithesh', 'hithesh', 'hithesh@gmail.com', '9072233806', 'male', '59d0af90ff7608a41d96bfc6d4f50f95_2e501ce2da82c.jpg', 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

DROP TABLE IF EXISTS `district`;
CREATE TABLE IF NOT EXISTS `district` (
  `did` int(2) NOT NULL AUTO_INCREMENT,
  `dname` varchar(18) NOT NULL,
  PRIMARY KEY (`did`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`did`, `dname`) VALUES
(1, 'Ernakulam'),
(2, 'Thrissur'),
(3, 'Idukki');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `fid` int(2) NOT NULL AUTO_INCREMENT,
  `fb` varchar(100) NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `fb`) VALUES
(1, 'Nice Website');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

DROP TABLE IF EXISTS `property`;
CREATE TABLE IF NOT EXISTS `property` (
  `pid` int(2) NOT NULL AUTO_INCREMENT,
  `pname` varchar(30) NOT NULL,
  `propid` int(2) NOT NULL,
  `did` int(2) NOT NULL,
  `aid` int(2) NOT NULL,
  `ta` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `bedroom` varchar(2) NOT NULL,
  `bathroom` varchar(2) NOT NULL,
  `dimensions` varchar(50) NOT NULL,
  `pdesc` varchar(50) NOT NULL,
  `pimage` varchar(250) NOT NULL,
  `status` varchar(10) NOT NULL,
  `pdate` date NOT NULL,
  `pbstatus` varchar(10) NOT NULL,
  `srid` int(2) NOT NULL,
  `bid` int(2) DEFAULT NULL,
  `bkdate` date DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`pid`, `pname`, `propid`, `did`, `aid`, `ta`, `price`, `bedroom`, `bathroom`, `dimensions`, `pdesc`, `pimage`, `status`, `pdate`, `pbstatus`, `srid`, `bid`, `bkdate`) VALUES
(7, 'Sarath', 2, 2, 1, 3000, 500000, '2', '1', '1500 x 1500', '2 kitchen', '992eee1e17bddae74bee9622e886344a_727146705e.jpg', 'Approved', '2021-07-26', 'C', 6, NULL, NULL),
(8, 'Emil Jose', 5, 1, 4, 4500, 5050000, '0', '0', '2500 x 2000', 'Flat land', '7e976e248e36d26c9d9170042aeacdd8_12634476e8b46cedcd.jpg', 'Approved', '2021-07-27', 'N', 8, NULL, NULL),
(9, 'martin', 5, 3, 5, 5500, 760000, '0', '0', '2500 x 2000', 'open area', 'cabdf1e05d9ac2526d89c3c33165a90b_66330d5d6409d.jpg', 'Approved', '2021-07-28', 'N', 13, NULL, NULL),
(10, 'Nevin Martin', 2, 1, 4, 5500, 760000, '2', '2', '2500 x 2000', '2bedroom,2bathroom', '33f293e40a946beb8045bf3cb4ad474e_705de98dad8ee71e254e.jpg', 'Approved', '2021-07-28', 'B', 10, 4, '2021-08-24'),
(11, 'Rojin', 5, 3, 5, 7800, 8654000, '1', '5', '3500 x 4300', 'Open plot', 'e0fcf018d5195dac63409cdcf8514313_825a2206ed61994190.jpg', 'Rejected', '2021-08-01', 'N', 9, NULL, NULL),
(12, 'Rojin', 2, 3, 5, 6400, 1047000, '2', '1', '4000 x 2400', '1 Kitchen', '47865dae1fe60d26c645049cb99933c9_4ee7fe9b4d4d.jpg', 'Approved', '2021-08-01', 'N', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `proptype`
--

DROP TABLE IF EXISTS `proptype`;
CREATE TABLE IF NOT EXISTS `proptype` (
  `propid` int(2) NOT NULL AUTO_INCREMENT,
  `ptype` varchar(10) NOT NULL,
  PRIMARY KEY (`propid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proptype`
--

INSERT INTO `proptype` (`propid`, `ptype`) VALUES
(2, 'House'),
(5, 'Open Plot');

-- --------------------------------------------------------

--
-- Table structure for table `sellerreg`
--

DROP TABLE IF EXISTS `sellerreg`;
CREATE TABLE IF NOT EXISTS `sellerreg` (
  `srid` int(2) NOT NULL AUTO_INCREMENT,
  `sname` varchar(45) NOT NULL,
  `semail` varchar(30) NOT NULL,
  `susername` varchar(15) NOT NULL,
  `spassword` varchar(16) NOT NULL,
  `sphno` varchar(10) NOT NULL,
  `sgender` varchar(6) NOT NULL,
  `sproof` varchar(250) NOT NULL,
  `status` varchar(9) NOT NULL,
  PRIMARY KEY (`srid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sellerreg`
--

INSERT INTO `sellerreg` (`srid`, `sname`, `semail`, `susername`, `spassword`, `sphno`, `sgender`, `sproof`, `status`) VALUES
(6, 'Sarath K Bimal', 'sarathkbimal@gmail.com', 'sarathkbimal', 'sarathkbimal', '9072233806', 'male', 'f39fbc5d11dc66868925f190b9e315b7_6e77be220eb06f12c7e.jpg', 'Approved'),
(7, 'Hithesh K Bimal', 'hitheshkbimal@gmail.com', 'hitheshkbimal', 'hithesh', '9072567891', 'male', '45a8dee64f24fb5e2780840ed00160af_3cae63bbb47e19af8527.jpg', 'Rejected'),
(8, 'Emil Jose', 'emiljose@gmail.com', 'emiljose', 'emiljose', '8284697510', 'male', '32f0d57aeecf168e538487e027dfde67_63b1a7bab4.jpg', 'Approved'),
(9, 'Rojin Paulson', 'rojin@gmail.com', 'rojin', 'rojin', '9873510085', 'male', '0efc00698959ed504e0a14101527b1c3_c23531fad61af6eaf.jpg', 'Approved'),
(10, 'Nevin Martin', 'nevinmartin@gmail.com', 'nevinmartin', 'nevinmartin', '8081597304', 'male', '93b3628f471106d1d66b01204bf7d0a5_526d55f315.jpg', 'Approved'),
(14, 'Bimal K', 'bimal@gmail.com', 'bimal', 'bimal', '9961999544', 'male', '5941e61549ce635ce327531491341f95_0850e6c01ffab00.jpg', 'Rejected'),
(13, 'Martin Louis', 'martin@gmail.com', 'martin', 'martin', '9047600121', 'male', 'a5e4a283487d3d5b6a2784a32d05ef1c_660809e65659.jpg', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `sfeedback`
--

DROP TABLE IF EXISTS `sfeedback`;
CREATE TABLE IF NOT EXISTS `sfeedback` (
  `sfid` int(2) NOT NULL AUTO_INCREMENT,
  `sf` varchar(100) NOT NULL,
  PRIMARY KEY (`sfid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `s_sendenquiry`
--

DROP TABLE IF EXISTS `s_sendenquiry`;
CREATE TABLE IF NOT EXISTS `s_sendenquiry` (
  `s_seid` int(2) NOT NULL AUTO_INCREMENT,
  `s_se` varchar(100) NOT NULL,
  `srid` int(2) NOT NULL,
  `pid` int(2) NOT NULL,
  `estatus` varchar(1) NOT NULL,
  PRIMARY KEY (`s_seid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s_sendenquiry`
--

INSERT INTO `s_sendenquiry` (`s_seid`, `s_se`, `srid`, `pid`, `estatus`) VALUES
(9, 'Why is my property rejected?', 9, 11, '2');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
