-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2022 at 05:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tedx`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_password`) VALUES
(1, 'admin@tedx.com', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `board_id` int(11) NOT NULL,
  `board_name` varchar(255) NOT NULL,
  `board_section` int(11) NOT NULL,
  `board_committee` int(11) NOT NULL,
  `board_position` varchar(255) NOT NULL,
  `board_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`board_id`, `board_name`, `board_section`, `board_committee`, `board_position`, `board_image`) VALUES
(1, 'Adham Ayman', 10, 33, 'Executive', 'Adham Ayman Project Manager.jpg'),
(2, 'Mohamed Rafaat', 10, 32, 'Executive', 'Mohamed-Raafat. event manager.jpg'),
(3, 'Abdallah Domery', 4, 27, 'Executive', 'Abdallah Domery Multimedia Executive.JPG'),
(4, 'Abdelrahman Mansour', 4, 20, 'Executive', 'Abdelrahman Mansour IT Head .JPG'),
(5, 'Abdelrahman Elalfee', 4, 27, 'Vice Executive', 'Abdelrahman Elalfee - vice executive multimedia .jpg'),
(6, 'Abdelrahman Ezz', 4, 20, 'Vice Executive', 'Abdelrahman Ezz IT Vice Executive.jpg'),
(8, 'Eslam Tamer', 7, 26, 'Executive', 'logo.png'),
(9, 'Hoda Ahmed', 7, 26, 'Vice Executive', 'logo.png'),
(10, 'Aya Salem', 9, 24, 'Executive', 'Aya Salem HR Executive.jpg'),
(11, 'Fatma Ayman', 9, 24, 'Vice Executive', 'Fatma Ayman HR Vice Executive_.png'),
(12, 'Safa Hamdy', 6, 28, 'Executive', 'Safa Hamdy - Logistics Executive.jpg'),
(13, 'Radwa Sayed', 6, 28, 'Vice Executive', 'Radwa Sayed Vice Executive Logistics.jpg'),
(14, 'Toka Mohamed', 7, 31, 'Executive', 'logo.png'),
(15, 'Toka Magdy', 5, 29, 'Executive', 'Toka Magdy - Public Relations Executive.jpg'),
(16, 'Salah Ayman', 5, 30, 'Executive', 'Salah Ayman Osman- FR Exceutive_.jpg'),
(18, 'Ahmed Ashraf', 5, 29, 'Vice Executive', 'Ahmed Ashraf ( NOGA ) vice executive PR.jpg'),
(19, 'Reem Hegazi', 5, 30, 'Vice Executive', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `committees`
--

CREATE TABLE `committees` (
  `committee_id` int(11) NOT NULL,
  `committee_name` varchar(255) NOT NULL,
  `committee_section` int(11) NOT NULL,
  `committee_description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `committees`
--

INSERT INTO `committees` (`committee_id`, `committee_name`, `committee_section`, `committee_description`) VALUES
(20, 'IT', 4, 'Understanding technology and having a passion for it is great. Nowadays, digital technology is a massive requirement in the market as no organization could be integral without the technical part. In TEDxHelwanUniversity it will be hard-pressed to don’t depend on computers and networks. So maintaining a standard level of service, security, and connectivity is a huge task. As an IT member, you should be a troubleshooter, have analytical abilities, and have conflict management skills.'),
(23, 'Coaching', 8, 'Coaching is all about motivation, passion, energy, and support.  In TEDxHelwanUniversity you will have the ability to unlock the person’s potential and improve their performance. As a coaching member you should be confident, positive, have self-motivation, and have persistence.'),
(24, 'HR', 9, 'Human resource plays a significant role in developing, increasing, and evolving the culture of an organization,  that incorporates a range of systems, and processes to assure smooth management. In TEDxHelwanUniversity, we desire our members’ satisfaction and great performance. HR members should be organized, flexible, patient, and be able to negotiate'),
(26, 'Design', 7, 'Being different isn’t Bad! it means you’re a creative person and have your own vision, you just need the right place to unleash your creativity. In TEDx Helwan University we believe in your vision that will reflect our success. You should have imagination and creativity to make our designs dazzling for everyone'),
(27, 'Multimedia', 4, 'Photography is art and photos are stoppable moments that contain our feelings. In TEDxHelwanUniversity our happy and successful moments must be unforgettable. The Multimedia committee is the eye that reflects our special memories with our audience and making us remember every single moment during our journey. As a multimedia member, you should have a unique vision, imagination, creativity, and editing skills'),
(28, 'Logistics', 6, 'Every idea has to be tangible and that’s what coordination does in TEDxHelwanUniversity it turns our vision during the season into the final event. Coordination is to organize, decorate and make great events that people will talk about so, as a coordination member you should be able to manage time, communicate, be creative and have a high level of leadership'),
(29, 'Public Relations', 5, 'Technical skills aren’t enough to execute tasks now, what\'s more important is having excellent communication skills and that’s what we need in TEDxHelwanUniversity. Public relations is any attempt to portray oneself to others, it keeps a positive image and reputation of the organization and ensures effective communication with media and the public so you should be confident, be able to handle problems, and know how to communicate professionally with our partners and sponsors.'),
(30, 'Fundraising', 5, 'Fundraising Committee:  Not everyone has the magic of making connections, negotiate and solve problems while maintaining a professional relationship. Fundraiser member should be flexible, strategic thinker, has the ability to influence, persuade, make a decision and increase the awareness of TEDxHelwanUniversity’s work, goals, and financial needs to external potential sponsors.'),
(31, 'SMM', 7, 'Social Media Marketing Committee: Social media is the platform where you connect to your audience to build a name for yourself and interact with your audience.  Nowadays, social media is like a virus that took over the world and manage to have a voice for making changes. Being a part of a marketing team means being active, innovative, effective, and creative to deliver content that inspires and awe people, to grab their attention as well as their will to know more.'),
(32, 'Event Manager', 10, 'none'),
(33, 'Project Manager', 10, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `deleted`
--

CREATE TABLE `deleted` (
  `deleteId` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userPhone` varchar(100) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `userFac` varchar(100) NOT NULL,
  `userArea` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `approved` int(11) NOT NULL,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deleted`
--

INSERT INTO `deleted` (`deleteId`, `userName`, `userPhone`, `userMail`, `userFac`, `userArea`, `time`, `approved`, `adminId`) VALUES
(2, 'ali Mohamed', '111111111', 'asd@asd.com', 'bis', 'loc1', 'Thu,15-Jul 05:04 AM', 1, 1),
(3, 'ali Mohamed', '111111111', 'asd@asd.com', 'bis', 'loc1', 'Thu,15-Jul 05:04 AM', 1, 1),
(4, 'hossam Mohamed', '111111111', 'asd@asd.com', 'bis', 'loc1', 'Thu,15-Jul 05:04 AM', 1, 1),
(5, 'omar Mohamed', '111111111', 'asd@asd.com', 'bis', 'loc1', 'Thu,15-Jul 03:04 AM', 1, 1),
(10, 'Mohamed  Nasser', '01147542249', 'mohammedabdelnasser5@gmail.com', 'BIS', 'Vodafone Cash', 'Thu,21-Jul 02:52 PM', 0, NULL),
(11, 'abdeldayem mohamed', '01147542249', 'abdeldayem.ebrahimm@gmail.com', 'bis ', 'Vodafone Cash', 'Thu,21-Jul 02:53 PM', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_desc` longtext NOT NULL,
  `event_date` date NOT NULL,
  `event_location` longtext NOT NULL,
  `event_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_name`, `event_desc`, `event_date`, `event_location`, `event_image`) VALUES
(1, 'ETERNITY', 'Eternity was restricted to royal blood only. But as time passes, do you still agree with this saying?\r\nThe ancient Egyptian restricted eternity to themselves, they lived their life believing in the afterlife immortality.\r\nBeing unique will give you the chance to leave an impact on other people\'s life and be remarkable.\r\nSo, it depends on you and what you are going to learn from our event that will show you the required steps to regenerate your thoughts, discover your potential and join the Eternity.\r\nAre you willing to follow our grandparents\' legacy?', '2022-07-23', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.9323141872283!2d31.30814304041346!3d29.866225800000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458368b1ccf8495%3A0x3f00f21dd1d90fe5!2sHassan%20Hosni%20Hall%2C%20Helwan%20University!5e0!3m2!1sen!2seg!4v1655874892935!5m2!1sen!2seg', 'ETERNITY.png'),
(4, 'TANGRAM', 'Would you like to be a piece of the puzzle too?\r\n\r\nWe are all made of small pieces of puzzles, if you focus on choosing each and every one carefully, you will end up with the perfect version of yourself.\r\n\r\nTangram is about collecting your own piece of minds and ideas, shape and arrange them as you feel it\'s the best fit.\r\n\r\nInteresting ha?\r\nHence add us to your calendar as we put the final touches on Tangram!', '2021-04-10', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.31813609309!2d31.229792915425193!3d30.02772958188845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x145847311324514b%3A0xa3537595f7e8729f!2sEl%20Nahar%20Theater!5e0!3m2!1sen!2seg!4v1655865737555!5m2!1sen!2seg', 'tangram.png'),
(5, 'Teleportation', 'Is teleportation possible?\r\nWill we ever be able to teleport?\r\nBut what does teleportation even mean?\r\nTeleportation is the ability to move instantaneously from one location to another without physically occupying the space in between.\r\nSo If teleportation is possible, could a baseball transform into something like a radio wave, travel through buildings, bounce around corners, and then change back into a baseball? Oddly enough, thanks to quantum mechanics, the answer might actually be yes!\r\nMany of us wonder whether teleportation is science fiction, thankfully the answer to this question resides in TED theory!\r\nIn TEDx HelwanUniversity theory we focus on meanings and the philosophy of ideas that TED adopted.\r\n\r\nWe strongly believe in the saying: \"Ideas worth spreading\'\', and any idea presented on our stage should be spread and teleported everywhere.\r\n\r\nLuckily, the physical medium who will teleport the idea will be you!\r\nyou are the chest of ideas, you have to spread the ideas and are responsible for keeping them safe for the rest of the world to hear and learn about them.\r\nNow you can join us on this unique journey!', '2018-04-20', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.9323141872283!2d31.30814304041346!3d29.866225800000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458368b1ccf8495%3A0x3f00f21dd1d90fe5!2sHassan%20Hosni%20Hall%2C%20Helwan%20University!5e0!3m2!1sen!2seg!4v1655874892935!5m2!1sen!2seg', 'Teleportation.jpg'),
(6, 'Conductor', 'In the spirit of ideas worth spreading, TEDx is a program of local, self-organized events that bring people together to share a TED-like experience. At a TEDx event, TEDTalks video and live speakers combine to spark deep discussion and connection in a small group. These local, self-organized events are branded TEDx, where x = independently organized TED event. The TED Conference provides general guidance for the TEDx program, but individual TEDx events are self-organized (subject to certain rules and regulations).', '2019-07-06', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3459.9323141872283!2d31.30814304041346!3d29.866225800000016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1458368b1ccf8495%3A0x3f00f21dd1d90fe5!2sHassan%20Hosni%20Hall%2C%20Helwan%20University!5e0!3m2!1sen!2seg!4v1655874892935!5m2!1sen!2seg', '64482361_2525168957507519_8048000527738339328_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `highboard`
--

CREATE TABLE `highboard` (
  `highboard_id` int(11) NOT NULL,
  `highboard_name` varchar(255) NOT NULL,
  `highboard_section` int(11) NOT NULL,
  `highboard_position` varchar(255) NOT NULL,
  `highboard_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `highboard`
--

INSERT INTO `highboard` (`highboard_id`, `highboard_name`, `highboard_section`, `highboard_position`, `highboard_image`) VALUES
(4, 'Adham Ahmed', 4, 'Curator', 'adhamayman.jpg'),
(5, 'Marwa Hamdi', 6, 'Curator', 'marwa.jpg'),
(6, 'Basant Mohamed', 7, 'Curator', 'passant.jpg'),
(7, 'Nouran Mohamed', 8, 'Curator', 'nouran.jpg'),
(8, 'Hossam El Din Mahmoud', 9, 'Curator', 'hossam.jpg'),
(10, 'Rawan Wael', 5, 'Curator', 'rowanwael.jpg'),
(11, 'Ahmed Hesham', 7, 'Advisor', 'h.jpg'),
(12, 'Omar Tamer', 11, 'President', 'Omar-Chairman.jpg'),
(13, 'Mostafa Sayed', 5, 'Advisor', 'mostafasayed.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `member_id` int(11) NOT NULL,
  `member_name` varchar(255) NOT NULL,
  `member_section` int(11) NOT NULL,
  `member_committee` int(11) NOT NULL,
  `member_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`member_id`, `member_name`, `member_section`, `member_committee`, `member_image`) VALUES
(3, 'Abdelrahman Omar', 4, 27, '25789913-FAEB-4ABA-A7F0-3177AA6D9B74 - Abdelehman Omar mohamed.jpeg'),
(4, 'Mohamed Amin', 4, 27, 'logo.png'),
(5, 'Omar Mohamed', 4, 27, 'inbound2913358561932225313 - Omar Mansour.jpg'),
(6, 'MennatAllah Ahmed ', 4, 27, 'logo.png'),
(7, 'Rana Ashraf', 4, 27, 'E67D60D1-6EEC-41A1-9F32-8A9AD56F2C0B - rana ashraf.jpeg'),
(8, 'Farah Bashir ', 4, 27, 'logo.png'),
(9, 'Alaa Nasser', 4, 27, 'logo.png'),
(10, 'Yousef Esmat', 4, 27, 'logo.png'),
(11, 'Tasnem Khaled', 4, 27, 'logo.png'),
(12, 'Passant Hesham', 4, 27, 'logo.png'),
(13, 'Mariam Mohamed', 4, 27, 'logo.png'),
(14, 'Aya Reda', 4, 27, 'logo.png'),
(15, 'Mohamed Nasr ', 4, 27, 'logo.png'),
(16, 'Ibrahim Abdou', 4, 27, 'logo.png'),
(17, 'Arwa Mahmoud', 4, 27, 'logo.png'),
(18, 'Mostafa Talal ', 4, 27, 'logo.png'),
(19, 'Youssef Mohtady', 4, 27, 'logo.png'),
(20, 'Rana Magdy', 4, 27, 'B6640113-500D-41A6-A022-7300230B5E2F - Rana Magdi.jpeg'),
(21, 'Mona Khaled', 6, 28, 'logo.png'),
(22, 'Maryam Abdel-raouf ', 6, 28, 'inbound1160897743076185937 - Marem Raoof.jpg'),
(23, 'Ahmed Tarek', 6, 28, 'IMG-20210824-WA0021 - Ahmed Tarek.jpg'),
(24, 'Habiba Ali', 6, 28, '46F9444B-091E-445E-80CA-7C991CCC380D - Habiba Ali.jpeg'),
(25, 'Mostafa Atef ', 6, 28, 'EB333E0D-66DE-4735-8EDA-C4C20D1CA90A - Mostafa Atef.jpeg'),
(26, 'El Sayed Hossam ', 6, 28, 'logo.png'),
(27, 'Rana Medhat', 6, 28, 'IMG_20210903_022421_532 - Rana Medhat.jpg'),
(28, 'Shaimaa Mahmoud ', 6, 28, 'logo.png'),
(29, 'Noha Ashraf ', 6, 28, 'AA80A2F9-9A4C-476A-A367-2369D7B8B106 - Noha Ashraf.jpeg'),
(30, 'Mohammed Medhat', 6, 28, 'logo.png'),
(31, 'Ramy Khalil ', 6, 28, 'logo.png'),
(32, 'Hazem Ahmed', 6, 28, 'logo.png'),
(33, 'Amr Mohamed', 6, 28, 'logo.png'),
(34, 'Youssef Mohamed', 6, 28, 'logo.png'),
(35, 'Mustafa Sayed', 6, 28, 'logo.png'),
(36, 'Islam Abdelrahman ', 6, 28, 'logo.png'),
(37, 'Mariam Emad', 6, 28, 'logo.png'),
(38, 'Lena  Alaa', 6, 28, 'logo.png'),
(39, 'Marwa Abdelhady', 6, 28, 'logo.png'),
(40, 'Nada Saed', 6, 28, 'IMG-20211127-WA0004 - Nada Saeed.jpg'),
(41, 'Amira Ahmed', 6, 28, 'logo.png'),
(43, 'Sondos Mohamed', 6, 28, 'logo.png'),
(44, 'Omnia Mohamed', 6, 28, 'logo.png'),
(45, 'Salma Muhammed', 6, 28, 'logo.png'),
(46, 'Nayera Ashraf', 6, 28, 'logo.png'),
(47, 'Nada Ashraf Ahmed', 5, 29, 'logo.png'),
(48, 'Yasmeen Yahia', 5, 29, 'logo.png'),
(49, 'Mohamed Abdelsatar', 5, 29, 'logo.png'),
(50, 'Rawan Samir', 5, 29, 'logo.png'),
(51, 'Mariam Mohamed Mohamed abdelham', 5, 29, 'logo.png'),
(52, 'Ziad Hassan Hussien', 5, 30, 'logo.png'),
(53, 'Osama saeed kassem', 5, 30, 'inbound265425324207666229 - Osama Saeed.jpg'),
(54, 'Hana hossam', 5, 30, 'logo.png'),
(56, 'Martina Magdy Fathy', 5, 30, 'inbound5584751161202768629 - Martina Magdy.jpg'),
(57, 'Mostafa Ahmed', 5, 30, 'logo.png'),
(58, 'Basant Yaser Yousef', 5, 30, 'inbound404399514688913953 - Basant Yaser.jpg'),
(59, 'Salma Ahmed Naguib Mohamed ', 5, 30, 'IMG-20210907-WA0070 - Salma Ahmed.jpg'),
(60, 'fatma El zhraa ahmed', 5, 30, 'logo.png'),
(61, 'raneen abd elnaser', 5, 30, 'logo.png'),
(62, 'nour hassan', 5, 30, 'logo.png'),
(63, 'mohamed badr', 5, 30, 'logo.png'),
(64, 'sondos ali', 5, 30, 'logo.png'),
(65, 'nadeen mohamed', 5, 30, 'logo.png'),
(66, 'ali abd elaal', 5, 30, 'logo.png'),
(67, 'moatasm gamal', 5, 30, 'logo.png'),
(68, 'omr shabaan', 5, 30, 'logo.png'),
(69, 'haidy el sayed', 5, 30, 'logo.png'),
(70, 'nadeen diaa', 5, 30, 'logo.png'),
(71, 'ahmed eissa', 5, 30, 'logo.png'),
(72, 'amr ibrahim', 5, 30, 'logo.png'),
(73, 'yasmen osman', 5, 30, 'logo.png'),
(74, 'yasmen magdy', 5, 30, 'FB_IMG_1638304176689 - Yasmin Magdi17.jpg'),
(75, 'abdallah hassan', 5, 30, 'logo.png'),
(76, 'martina george', 5, 30, 'logo.png'),
(77, 'Basant Mohsen ', 8, 23, 'IMG_20210925_161842_329 - Bassant Mohsen.webp'),
(78, 'Muhanned Helall', 8, 23, 'inbound8085351764487108289 - Muhanned Helall.jpg'),
(79, 'Youmna ihab radwan', 8, 23, 'logo.png'),
(80, 'Ahmed Salah Ismail', 8, 23, 'inbound2050880404449243238 - Ahmed Salah.jpg'),
(81, 'Ahmed Muhammed Abdelrahman', 8, 23, 'received_311413497438212 - Ahmed Muhammed Abdelrahman.jpeg'),
(82, 'Mostafa Magdy Mohamed ', 8, 23, 'inbound7744507975807223048 - Mostafa Magdy.jpg'),
(83, 'Mennatallah mahmoud emam', 8, 23, 'logo.png'),
(84, 'Basmala abdelsalam', 8, 23, 'logo.png'),
(85, 'Habiba hamdy hassan', 8, 23, 'logo.png'),
(86, 'Yasser Mohamed Gomaa Sayed', 8, 23, 'logo.png'),
(87, 'Shorouk Muhammad', 8, 23, 'logo.png'),
(88, 'Mariam Ahmed', 8, 23, 'logo.png'),
(90, 'Menna ali', 8, 23, 'logo.png'),
(91, 'Menna hegazy', 8, 23, 'logo.png'),
(92, 'mona gamil', 8, 23, 'logo.png'),
(93, 'Ahmed adel', 8, 23, 'logo.png'),
(94, 'Abdlrahman Sherif Mohamed', 9, 24, '7AAAA187-B7DA-45EC-8953-3DEC911C6E82 - Abdulrahman Sherif.jpeg'),
(95, 'Areej ashraf', 9, 24, 'inbound3716977810646004173 - Areej Ashraf.jpg'),
(96, 'Aya Ali Badawy', 9, 24, 'inbound1369087038454032162 - Aya Ali.jpg'),
(97, 'Doaa Nabeel Mohamed', 9, 24, 'inbound5616759374229332230 - Doaa Nabeel.jpg'),
(98, 'Feby Rezk Youssef Rezk', 9, 24, 'IMG-20201018-WA0037 - Feby Rizk.jpg'),
(99, 'Mohannad emad', 9, 24, 'inbound1471262284307822339 - Mohanad Emad.jpg'),
(100, 'Huda Khaled', 9, 24, '85EA6623-24FF-4E1C-8742-D1DB441F7E71 - Huda Khaled.jpeg'),
(101, 'Mariam Mahmoud Mohamed', 9, 24, 'inbound1530465803086327662 - Mariam Mahmoud.jpg'),
(102, 'Mohamed Ahmed Mohamed', 9, 24, 'inbound6726930407342867032 - Mohamed Ahmed.jpg'),
(103, 'Nour Atef', 9, 24, '62ADE9EA-EAD3-453C-9FB3-55E70E6C03F1 - Nour Atef.jpeg'),
(104, 'Basant Adel Ibrahim', 9, 24, 'inbound2828676309401794774 - Bassant Adel.jpg'),
(105, 'Ziyad osama fathy ', 9, 24, 'IMG_20210118_224929-removebg-preview - Ziad elshahawy.png'),
(106, 'Salma Waleed El-said ', 9, 24, 'inbound6136246283130262809 - Salma Walid.jpg'),
(107, 'Khloud Khaled Abd Elkader', 9, 24, 'logo.png'),
(108, 'Nourhan Rageb Ali', 9, 24, 'logo.png'),
(109, 'Revan karam soliman ', 9, 24, 'logo.png'),
(110, 'Mostafa Fathi Mostafa ', 9, 24, 'logo.png'),
(111, 'Enas Ali Mohamed ', 9, 24, 'logo.png'),
(112, 'Shrouk Muhamed Abdelsalam', 9, 24, 'logo.png'),
(113, 'Rawan Mohamed Desoki', 9, 24, 'logo.png'),
(114, 'Mohammad Abd El-Nasser', 9, 24, 'logo.png'),
(115, 'Engy sherif', 5, 29, 'inbound1190230510193042995 - Engy Sherif.jpg'),
(116, 'rawan ayman mohamed', 5, 29, 'inbound1408409144102724707 - Rawan Ayman.jpg'),
(117, 'Hagar Mohamed Ali Ibrahim', 5, 29, 'logo.png'),
(118, 'Mariam Mohsen Ebrahim', 5, 29, 'IMG-20201109-WA0020 - Mariam Mohsen.jpg'),
(119, 'Shrouk khalid ', 5, 29, 'logo.png'),
(120, 'Ghada Ashraf Mahmoud Bakry ', 5, 29, 'inbound3922349409964670767 - Ghada Ashraf.jpg'),
(121, 'Loaa yousry', 5, 29, '36E045C9-DC14-41A6-AEAF-B46699C6ED6D - Loaa Yousry.jpeg'),
(122, 'George Medhat Habib Bolis', 5, 29, 'inbound8322059361896289158 - George Medhat.jpg'),
(123, 'Mayar Abdalmoneim Alaidy', 4, 20, 'logo.png'),
(124, 'Abdeldayem Ebrahim', 4, 20, 'ana - Abdeldayem Ebrahim.jpg'),
(125, 'Ahmed Magdy', 4, 20, '20210611_143932 - Ahmed Magdy.jpg'),
(126, 'Shahd Mohamed', 4, 20, '186178EB-EC58-4C58-9706-B9EA241BC89F - shahd mohamed.jpeg'),
(127, 'Ayman Abdu', 4, 20, '1611358364551 - Ayman Abdu.jpg'),
(128, 'Nada Hakim', 4, 20, 'inbound2202111935324990369 - Nada Hakim.jpg'),
(129, ' Donia Tarek', 4, 20, 'inbound6526194714338692963 - Donia Tarek.jpg'),
(130, 'Ibtissam Elsayed', 4, 20, 'IMG_20211017_231452 - Ibtissam Elsayed.png'),
(131, 'Merna Magdy', 4, 20, 'inbound7906679326218611281 - Merna Magdy.jpg'),
(132, 'Eman Fars', 4, 20, 'inbound7731298728240303018 - Eman Fars.jpg'),
(133, 'Nagi Shokry', 4, 20, 'logo.png'),
(134, 'Mariam Emad', 4, 20, 'logo.png'),
(135, 'Hayat Nasser', 4, 20, 'logo.png'),
(136, 'Maram Nabil', 4, 20, 'logo.png'),
(137, 'Rehab Hamed', 4, 20, 'WhatsApp Image 2022-05-26 at 5.36.27 PM.jpeg'),
(138, 'Nourhan Ibrahim ', 7, 26, 'inbound1128582622047704759 - nour ibrahim.jpg'),
(139, 'Youssef Khaleed', 7, 26, 'logo.png'),
(140, 'Yasmeen Ibraheem ', 7, 26, 'inbound3018876538172268866 - Yasmin Ibraheem.jpg'),
(141, 'Ahmed Mohamed Fathi ', 7, 26, 'logo.png'),
(142, 'Abdulrahman wally', 7, 26, 'logo.png'),
(143, 'Mahmoud Amr', 7, 26, 'logo.png'),
(144, 'Ahmed Tolba ', 7, 26, 'logo.png'),
(145, 'Radwa Abdallah', 7, 26, 'inbound7054251379853273036 - Radwa Mohammad.jpg'),
(146, 'Hadeer Yossry', 7, 26, 'IMG20191104185334 - Hadeer Yasser.jpg'),
(147, 'Habiba Yasser', 7, 26, '1637179844293 - Habiba Yasser.jpg'),
(148, 'Salma Hani', 7, 26, 'logo.png'),
(149, 'Ahmed Hossam', 7, 31, 'logo.png'),
(150, 'Ali Ashraf Sayed Eraqy', 7, 31, 'inbound7670230391862212857 - Ali Ashrf.jpg'),
(151, 'Salma walid abdelnaby khalil', 7, 31, 'inbound6136246283130262809 - Salma Walid.jpg'),
(152, 'Khairy mohamed', 7, 31, 'logo.png'),
(153, 'Raghad Abdelghfour', 7, 31, 'inbound1012407564718851802 - Raghda Mostafa.jpg'),
(154, 'Makka Hisham Elshorbagy', 7, 31, 'inbound1371434844819883462 - Makka Elshorbagy.jpg'),
(155, 'Samaa Gamal Ahmed Sorour', 7, 31, 'inbound5055525654919151778 - Samaa Sorour19.jpg'),
(156, 'rudina fathi', 7, 31, 'IMG-20210602-WA0184_mh1622682115960 - Rudina Fathi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `userId` int(11) NOT NULL,
  `userName` varchar(300) NOT NULL,
  `userPhone` varchar(11) NOT NULL,
  `userMail` varchar(100) NOT NULL,
  `userFac` varchar(100) NOT NULL,
  `method` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `approved` int(11) NOT NULL DEFAULT 0,
  `adminId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`userId`, `userName`, `userPhone`, `userMail`, `userFac`, `method`, `time`, `approved`, `adminId`) VALUES
(9, 'abdelrahman mansour', '01068809428', 'abmansour707@gmail.com', 'BIS', 'Vodafone Cash', 'Wed,20-Jul 07:48 PM', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL,
  `section_name` varchar(255) NOT NULL,
  `section_year` int(11) NOT NULL,
  `section_desc` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`section_id`, `section_name`, `section_year`, `section_desc`) VALUES
(4, 'Multimedia', 2022, '“With multimedia, everything blurs. Software takes the concept of the imagination and makes it something you can edit, tweak and transform with digital techniques. Everything becomes an edited file.”'),
(5, 'Operation', 2022, '“An organization with integrity is healthy when it is whole, consistent, and complete, that is, when its management, operations, strategy and culture fit together and make sense'),
(6, 'logistics', 2022, '“The amateurs discuss tactics: the professionals discuss logistics.'),
(7, 'Marketing', 2022, '“Marketing without design is lifeless and design without marketing is mute, they are two sides of the same coin'),
(8, 'coaching', 2022, '“Coaching is unlocking a person’s potential to maximize their own performance. It helps them to learn rather than teaching them.'),
(9, 'Human recourses', 2022, '“it is well known there is no I in a team, and HR is the bond that connect us all togethe'),
(10, 'Project managment', 2022, '“Operations keeps the lights on, strategy provides a light at the end of the tunnel, but project management is the train engine that moves the organization forward'),
(11, '', 2022, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `speakers`
--

CREATE TABLE `speakers` (
  `speaker_id` int(11) NOT NULL,
  `speaker_name` varchar(255) NOT NULL,
  `speaker_title` varchar(255) NOT NULL,
  `speaker_talk` longtext DEFAULT NULL,
  `speaker_event` int(11) NOT NULL,
  `speaker_desc` longtext NOT NULL,
  `speaker_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `speakers`
--

INSERT INTO `speakers` (`speaker_id`, `speaker_name`, `speaker_title`, `speaker_talk`, `speaker_event`, `speaker_desc`, `speaker_image`) VALUES
(6, 'Andrew Ashraf', 'Student', 'https://www.youtube.com/embed/YfRk3QGcizE', 6, 'Andrew has graduated from computer science, ,he holds the PMP from Harvard School of Business and development of work areas certification from Oxford. Andrew helps youth in getting a job from all the categories in the market in addition to preparing many workshops, trainings and online courses to be ready for any job. In 2015 he trained more than 15 thousand candidate from Egyptian students. And in 2017 this number reached 100 thousand He helped more than 11 thousand graduate to find a suitable job. He created an initiative called\" El Forsa Fein\" which helps graduates in building & managing their own projects, this initiative started in 2019 and 4 projects were launched.', 'andrew ashraf.jpg'),
(7, 'Eslam ElTony', 'Musician', 'https://www.youtube.com/embed/d8HeOLZhshw', 6, 'Was born in 1993 and began playing music at the age of 4 years. He played piano in school Then he looked for himself in another musical instrument Which was guitar at the age of 16 years. And when he joined the Faculty of Music Education he began his real musical career. where he started focusing on learning how to play the violin which was the one musical instrument close to his heart. Playing the violin became his passion. He is known for Replaying old songs in a very creative modern way like \"رمضان جانا\"', 'eslam eltony.jpg'),
(8, 'Hanan ElSokary\r\n', 'Doctor', 'https://www.youtube.com/embed/0N7Rf2QChpw', 6, 'Dr Hanan is 48 years old also she is Obstetrics and Gynecology Consultant, but her medical career didn\'t stop her for what she loves as she is a certified trainer, Finished several courses like TOT course, Preparing broadcasters and producer from The Arab Broadcasters Union and interested in writing, human awareness and media and mass communication\r\n', 'Hanan ElSokary.jpg'),
(9, 'kholood khaled', 'Project Manager', 'https://www.youtube.com/embed/KonlL-SvFnA', 6, 'The smallest R&D project manager at BBI CONSULTANCY, one of the largest software companies. has contributed more than 28 event including international events. She is one of the most influential figures in administrative intelligence and classified as one of top 20 ambassadors from LinkedIn in The Middle East, also she has Certified international Scrum master and advanced technology, Agile methodologies in R&D Software development. She wrote more than 12 articles on how to lead the team by intelligence management. She trained over 1000 people at several administrative levels. And one of the youngest persons studying PMP in Egypt.', 'kholood khaled.png'),
(10, 'Mahmoud AbdELMageed', 'Co-Founder of Schema Advertising', 'https://www.youtube.com/embed/g9sHfsLbsxA', 6, 'Mahmoud studied Commerce and business administration at Helwan university ,also he is the founder of Have A Dream ,and the Co-Founder of Schema Advertising', 'Mahmoud AbdELMageed.jpg'),
(11, 'Maryam Ahmed Ali', 'video Blogger', 'https://www.youtube.com/embed/LjqGCElWv98', 6, 'Maryam is a video Blogger , Motivational speaker, Director, But best know as a Comedian, graduated from Mass communication - Cairo University this year and worked in Fundraising at “Baheya“ Make sure to book your ticket from Tedx Helwan university today you will laugh a lot we promise', 'Maryam Ahmed Ali.jpg'),
(12, 'Mayar Moawad', 'founder of Mayar Moawad’s photography', 'dash', 6, 'Mayar, a young lady with a passion towards Self-Consciousness. she is a 20 year old Engineering Student at the German University in Cairo, she is a freelance photographer, founder of Mayar Moawad’s photography, a traveling video maker, a former script writer and stage director. She was a former Tennis, Basketball player and Swimmer at AL-Ahly sports club. She was always top of her class during her school years. However, when Mayar stepped out of her comfort zone, things started to change. It was time that she had to understand herself better. Currently, Mayar is a minding-fullness science of human behavior and a self-life coach. Mayar’s goal is to make every sound audible and remove the stigma that created in the topics about well-being and breaking stereotypes about the image and the process of being the best version of one’s-self', 'Mayar Moawad.png'),
(13, 'Mohamed Alaa-Eldien', 'The founder & CEO of Cairo Photography club', 'https://www.youtube.com/embed/2Q_aixLsBC8', 6, 'We are happy to announce that Mohamed Alaaeldien will be a speaker at our conference. Mohamed graduated from faculty of engineering and he is The founder & CEO of Cairo Photography club & school, photography instructor with more than 8 years experience & canon certified trainer. Also, he is marketing partner with canon central and northern Africa.', 'Mohamed Alaa-Eldien.jpg'),
(14, 'Rawan hussein', 'ballet dancer', 'https://www.youtube.com/embed/e-M3qkARzrI', 6, 'Rawan at the age of 16 began ballet from 3 years ago. The first obstacle for her was the old age and after practicing, she became the assistant of the trainer until she became a trainer at a young age. The second obstacle was because of the hijab, but it\'s also didn\'t stop her to achieve her goal beside training, she has begun a photography-sessions at many places in Egypt to promote tourism and most important things that encourage people holding on their dreams & certainly Rawan influence on many people.', 'rawan.jpg'),
(15, 'Shaimaa Ashry', 'Scuba Diver', 'https://www.youtube.com/embed/X_UbWkrL6vQ', 6, 'Scuba Diver', 'Shaimaa Ashry.png'),
(17, 'youssef emad', 'Public relations (PR)', 'https://www.youtube.com/embed/zDVW2Q-W9ks', 6, 'Youssef Emad started his career at the age of 14, trained more than 1500 young people to achieve their dream as well, He has published 2 books, he was a marketer at international company ,he also worked as a PR in international organizations and holds a master\\\'s degree in international trade', 'youssef emad.jpg'),
(18, 'Youssef Hassan', 'Student', 'https://www.youtube.com/embed/0O64l5f_cls', 6, 'Youssef started his Career as an international call center agent to gain experience while he was still at college. Little did he know that after only 3 years, he will be acting as Performance Manager, Licensed to coach front line agents, and Vodafone Brand Ambassador at the age of 21, as a Youngest Leader in the company, he studies in Arab Academy for science and Technology business marketing 4th Year senior GPA of 3.2 as well had to participate in multiple projects in University locally or internationally He was chosen as Perfect student in a university AAST campus Doing Motivation Talks and public speaking in many universities “AAST, MSA, Nile, Cairo, Ainshams”. As well he Managed 370 people in the company.', 'Youssef Hassan.png'),
(19, 'Abdulrahman Alaa', 'Sales Trainer, Digital Marketing Specialist and Business Development Specialist', 'https://www.youtube.com/embed/Qc3SSgGjKjc', 5, 'Sales Trainer, Digital Marketing Specialist and Business Development Specialist', 'Abdulrahman Alaa.jpg'),
(21, 'Mazen Moataz', 'Painter and Photographer', 'https://www.youtube.com/embed/Cb5ItMFTPEI', 5, 'Painter and Photographer', '30171319_1908526089171812_83797539075254463_o.jpg'),
(22, 'Kirollos Rizk', 'Film Director & Novel Writer', 'https://www.youtube.com/embed/-H_3rkcAo2Y', 5, 'Kirollos Rizk is a 21-year-old 3D Film Director & Novel Writer from Egypt who believes that Talent can always do. To prove his point of view he started an online campaign with the same title “Talent Can Always Do “and started recruiting talented people from all over the world to work together on a 3D Movie for free! The Movie is called “The Legend of The Winged Guardian “as it covers 1 chapter from its original novel that is written by Kirollos. Throughout a year “2015 “the team reached 120 People from 12+ nationalities all working together for free to prove that nothing is impossible and Talent can always do! He is here to show what was achieved by this unbelievable team and what will be achieved in the future.', 'kirollos.jpg'),
(23, 'Mina Henein', 'life coach and motivational speaker', 'https://www.youtube.com/embed/G2_fL3oHdxs', 5, 'Mina Henein believes that life is too short to keep hitting the snooze button. As a certified life coach and motivational speaker, Mina\'s mission is to help people awaken to the possibilities in their personal and professional lives. Through humorous stories, provocative questions and a fresh perspective, Mina inspires clients to see that just about anything is possible. All we have to do is pay attention, do what works and get out of our own way. Warm, genuine and engaging, Mina\'s keynotes and workshops combine thought-provoking content, down to earth stories and practical strategies leaving participants feeling uplifted and inspired to transform their lives. Mina assists individual in optimizing their talents, skills and values to enable their own and others’ success. He helps clients pinpoint the challenges or obstacles that prevented them from successfully maneuvering through a season in their life. Providing insight, new ideas and action steps for clients that aided them to more clearly make decisions and facilitate change. Mina has Conducted live audience seminars and workshops for inspiration and motivation. He also delivered training and facilitated consultations for individuals and groups', 'mina.jpg'),
(24, 'Mohamed Al Sheraie', 'marketer', 'https://www.youtube.com/embed/4AwY4jvFQOw', 5, 'Graduated from Faculty of Pharmacy Cairo University by his third year at University, He decided to shift his career to Marketing', 'mohamed.jpg'),
(25, 'Nada Khalil', 'Nada is a marketer ', 'https://www.youtube.com/embed/zWjz5a_wrNw', 5, 'Nada Khalil, raised in a family house in a small village, originated with some specific intellectual beliefs. When she grew up, she left her small village and began to connect with people outside her family and with the community. At that point, it was very normal that she had come into contact with many beliefs compared to the beliefs she grew up with. That is why Nada faced a lot of problems, such as the inability to speak and express her feelings to other people, which has negatively affected her mental health.', 'nada.jpg'),
(26, 'Naureen Youssef', 'Naureen is a marketer, fashion model, and a great writer', 'https://www.youtube.com/embed/jY80nrjMRBs', 5, 'Naureen is a marketer, fashion model, and a great writer', 'naureen.jpg'),
(27, 'Reem Nabil', 'Standup comedy', '', 5, 'Standup comedy', 'reem.jpg'),
(28, 'Ahmed El Helaly', 'Financial consultant and a Life Coach', 'https://www.youtube.com/embed/ZjA-UQI7Qc4', 4, 'Ahmed EL Helaly is a financial consultant and a Life Coach, specialized mainly in Happiness, Self-Love, and Self-confidence. With more than 5 workshops around self love and happiness, with more than 200 attendees overall, He developed his own pathway to happiness. He believes that self-love is the most important thing in the world, and without it, nothing can ever be done. Owning his financial consulting firm for 13 years, and his daycare nursery for 18 years, he learned how to mix between professional consultancy and simplifying the tone to its simplest form.', 'ahmed.jpg'),
(29, 'Ahmed Radi', 'Co-Founder at Fleurelle for food industries, Co-Founder & CMO at RoadRunner', 'https://www.youtube.com/embed/Ap27ZeeMimI', 4, 'Ahmed Radi is a Co-Founder at Fleurelle for food industries, Co-Founder & CMO at RoadRunner, Former Country Marketing Manager at Delivery Hero (Otlob - Talabat - Carriage), and Former Group Marketing Manager at Andalusia Group for Medical Services. He is certified in Strategic Management from the University of Copenhagen, Denmark, and has more than 13 years of real experience, more than 7 years of building marketing teams and departments leading them to achieve extraordinary targets, planning and creating creative marketing campaigns and strategies for over 23 companies in 10 different industries.', 'radi.jpg'),
(30, 'Amr Abdulwahab', 'the President of Dr. Mustafa Mahmoud Astronomical Society', NULL, 4, 'Amr is the President of Dr. Mustafa Mahmoud Astronomical Society, Founder of the Astronomical Observatory in Bahariya Oasis, and former Advisor to the Head of the National Institute for Astronomical and Geophysical Research. He is also a member of the Arab Union for Astronomy and Space Sciences personality of the Year 2020 for Arab Creators\".', 'amr.jpg'),
(31, 'Anwar Elkamony', 'Athlete ,writer and content creator', 'https://www.youtube.com/embed/Aj0jdmkt7ik', 4, 'Anwar is the first athlete in the world to return to the international tennis ranking after the bone marrow transplant operation, an international lecturer who has been honored in many countries of the world. He is also a writer at Molhem Platform, and sports ambassador at Baheya Foundation. He also believes that “Live to inspire people and people will say someday because of you, we did not give up”.', 'anwar.jpg'),
(32, 'Atef Ezzat', 'Engineer and writer', '', 4, 'Expert in automatic control systems and magnetic applications, owner of the Nefertari Biomagnetic Company for saline agriculture. He has a Bachelor of Science in Communication and Automated Control Engineering, Faculty of Engineering and Technology, Helwan University, Postgraduate and MA studies, Institute of Environmental Studies and Research, Ain Shams University, in the effect of magnets on living organisms. He has more than 19 books in various sciences, including the Encyclopedia of the Energies of the Human Mind, The Secret of the Energy of the Pyramid, the Great Reference in the Secrets of the Pendulum Energy, the Secrets of Precious Stones, the Book of Transformations, the Journal of Transformations, a scientific journal on the influence of the planets on man, 15 issues of which were issued, the Book of Pharaoh Musa from the people of Moses, of which 18 editions were issued.', 'atef.jpg'),
(33, 'Eman Sobhy', 'Content creator', 'https://www.youtube.com/embed/6g0z46x2QQU', 4, 'Eman, a graduate of the Faculty of Mass Media , Department of Journalism, Cairo University, won a scholarship in Germany to study the electronic content and video industry, and it was the reason for changing her career from journalism to digital marketing. Her goal is to present various useful stories that reach the whole world. With the encouragement of her sister and husband, she participated in a competition looking for young Arab talents interested in creating content; To help them be among the best creative content makers in the Middle East.', 'eman.jpg'),
(34, 'khaled Mohammed', 'Founder of Tawseq Media', 'https://www.youtube.com/embed/amzLloi4ois', 4, 'Khaled is a graduate of Commerce, Accounting major. He worked for 8 years for Kodek, 2 years for Fujifilm company. He was the lab manager for a year and half. He worked as a freelance photographer and graphic designer, and worked for Design Guide magazine. He is the founder of Tawseq Media. Some of the important events which he covered were Payoneer Egypt and the Arab Affiliate Summit~', 'khaled.jpg'),
(35, 'Mohamed Aboulnaga Nagaty', 'Entrepreneur', 'https://www.youtube.com/embed/0rTAgbSFDL8', 4, 'Mohamed is an experienced entrepreneur and executive with more than 15 years of experience. He started his career at Fawry in account management and business development, and in sales with Haymarket Media Group; moreover, he completed the CXO Academy program at INSEAD, France, and a B.Sc., in Electronics Engineering from the American University in Cairo, Egypt. Currently, Mohamed the Co-founder/CEO of a fintech startup in Egypt and a Co-founder/advisor of Halan, Africa\'s super app and Egypt\'s most funded app in 2020 according to Forbes middle east. Prior to co-founding Halan, he served as Regional Director at Careem, the Middle East\'s number one ride-hailing application recently acquired by Uber for more than $3 billion; in addition, he was the Head of Business Development and advisor to Fawry. He also sits on the board of several Tech companies including Koinz, Robusta, Touchless, Cashcows, Waffarha, and an advisor to Disruptech ventures and an investor in Breadfast.', 'mohamed2.jpg'),
(36, 'Nour EL Orashy', 'director and assistant director in lots of projects and campaigns', 'https://www.youtube.com/embed/rD7FGk8SsVk', 4, 'Nour Studied broadcasting at Faculty of Mass Media in Misr University for Science and Technology English department. She Worked as director and assistant director in lots of projects and campaigns Co founder of ccsd مشروع التنمية الإبداعية لمهارات الطفل And now preparing masters in المعهد العالي لفنون الطفل في أكاديمية الفنون in the cinema and tv directing field. She aims to raise the awareness about different and creative ways to deal with future children from day one, and teaching people how to cope with the future generations to improve the quality of human life.', 'nour.jpg'),
(37, 'Summer Galal', 'Theatre maker', 'https://www.youtube.com/embed/CcsH4X-8x_Q', 4, 'Singer and theatre-maker based in Cairo. She’s a singer in the Bahgaga band; a band of 5 lead female vocalist that creates contemporary monologues. In 2017, Summer created Charlie and the Chocolate Factory which is a colorful Egyptian musical that played for 3 years on stages and it was quite hyped. Although she studied set and costume designs but her passion went towards performing arts when she joined Atelier El Masrah at college, after graduation Summer joined Sitara Theatre where she fell in love with the children\'s theatre. She directed various performances for stage and a web series for children “Be the change you want to see in the world” - Gandhi is her motto.', 'summer.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`board_id`),
  ADD KEY `board_committee` (`board_committee`),
  ADD KEY `board_section` (`board_section`);

--
-- Indexes for table `committees`
--
ALTER TABLE `committees`
  ADD PRIMARY KEY (`committee_id`),
  ADD KEY `committee_section` (`committee_section`);

--
-- Indexes for table `deleted`
--
ALTER TABLE `deleted`
  ADD PRIMARY KEY (`deleteId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `highboard`
--
ALTER TABLE `highboard`
  ADD PRIMARY KEY (`highboard_id`),
  ADD KEY `highboard_section` (`highboard_section`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`member_id`),
  ADD KEY `member_committee` (`member_committee`),
  ADD KEY `member_section` (`member_section`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`userId`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `speakers`
--
ALTER TABLE `speakers`
  ADD PRIMARY KEY (`speaker_id`),
  ADD KEY `speaker_event` (`speaker_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `board_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `committees`
--
ALTER TABLE `committees`
  MODIFY `committee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `deleted`
--
ALTER TABLE `deleted`
  MODIFY `deleteId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `highboard`
--
ALTER TABLE `highboard`
  MODIFY `highboard_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `speakers`
--
ALTER TABLE `speakers`
  MODIFY `speaker_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `board`
--
ALTER TABLE `board`
  ADD CONSTRAINT `board_ibfk_1` FOREIGN KEY (`board_committee`) REFERENCES `committees` (`committee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `board_ibfk_2` FOREIGN KEY (`board_section`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `committees`
--
ALTER TABLE `committees`
  ADD CONSTRAINT `committees_ibfk_1` FOREIGN KEY (`committee_section`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deleted`
--
ALTER TABLE `deleted`
  ADD CONSTRAINT `deleted_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `highboard`
--
ALTER TABLE `highboard`
  ADD CONSTRAINT `highboard_ibfk_1` FOREIGN KEY (`highboard_section`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`member_committee`) REFERENCES `committees` (`committee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`member_section`) REFERENCES `sections` (`section_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`admin_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `speakers`
--
ALTER TABLE `speakers`
  ADD CONSTRAINT `speakers_ibfk_1` FOREIGN KEY (`speaker_event`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
