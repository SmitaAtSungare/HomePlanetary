-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 26, 2016 at 04:26 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `homeplanetary_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_advertise`
--

CREATE TABLE `add_advertise` (
  `p_id` int(10) NOT NULL,
  `photo` varchar(5000) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_advertise`
--

INSERT INTO `add_advertise` (`p_id`, `photo`, `date`) VALUES
(91912, 'images/561cc7ddf29c5.gif', '2016-09-22 04:22:06'),
(22229, 'images/e1.jpg', '2016-09-14 22:48:02'),
(27197, 'images/14322301_1533278756689146_1920452768984581607_n.jpg', '2016-09-20 22:14:52'),
(86491, 'images/14361283_1530116290338726_1493982470341996863_o.jpg', '2016-09-20 22:06:46');

-- --------------------------------------------------------

--
-- Table structure for table `add_posting`
--

CREATE TABLE `add_posting` (
  `property_id` int(10) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `bedroom` varchar(50) NOT NULL,
  `possession` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `area_sqft` varchar(20) NOT NULL,
  `rate_sqft` varchar(20) NOT NULL,
  `floor_no` varchar(20) NOT NULL,
  `amenities` varchar(2000) NOT NULL,
  `airport` varchar(100) NOT NULL,
  `train` varchar(100) NOT NULL,
  `bustop` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `resto` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `property_details` varchar(5000) NOT NULL,
  `photos` varchar(5000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner_type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `about_builder` varchar(2000) NOT NULL,
  `logo` varchar(5000) NOT NULL,
  `date` varchar(100) NOT NULL,
  `add_status` varchar(50) NOT NULL DEFAULT 'N',
  `user_id` varchar(45) DEFAULT NULL,
  `total_visits` int(45) NOT NULL DEFAULT '0',
  `property_status` varchar(45) NOT NULL DEFAULT 'False'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `add_posting`
--

INSERT INTO `add_posting` (`property_id`, `property_name`, `city`, `locality`, `address`, `landmark`, `property_type`, `transaction_type`, `bedroom`, `possession`, `price`, `area_sqft`, `rate_sqft`, `floor_no`, `amenities`, `airport`, `train`, `bustop`, `school`, `hospital`, `resto`, `bank`, `property_details`, `photos`, `name`, `owner_type`, `email`, `mob`, `landline`, `about_builder`, `logo`, `date`, `add_status`, `user_id`, `total_visits`, `property_status`) VALUES
(28, 'koltepatil  Appartment', 'Pune', 'pimple gurav', 'katepuram chowk', 'datt mandir', 'Residential', 'Sell', '5BHK', '12 Dec 2017', '51 to 55 Lakh', '550 to 1560', '4500', '1 to 10', 'Fire Alarm,Power backup,Lift,Reserved parking,Security Personal', '1', '1', '1', '1', '1', '1', '1', 'Usually I never comment on blogs but your article is so convincing that I never stop myself to say something about it. Youâ€™re doing a great job Man,Keep it up.', 'image/aaa.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '345435', 'This Terms and Conditions of Service between Maulikrupa and users of the website describes the terms on which Maulikrupa offers you the Services (as defined below) through the website. The use of this website is governed by the terms and conditions under this Agreement. Before using this website, you must carefully read, understand, accept and agree to abide by all the terms and conditions under this Agreement.', '', '2016-08-24', 'Featured', '11', 4, 'False'),
(29, 'Kalpataru Estate Phase-III', 'Pune', 'Hinjewadi', 'wakad road hinjewadi, pune', 'Infosys Phase-II', 'Residential', 'Sell', '3BHK', '20 Dec 2016', '61 to 65 Lakh', '780 to 1800', '6500', '1 to 12', 'Fire Alarm,Power backup,Lift,Service Lift,Reserved parking,Conference Room,Security Personal', '10', '8', '1', '2', '5', '1', '1', 'A building or edifice is a structure with a roof and walls standing more or less permanently in one place, such as a house or factory.', 'image/bb.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '435345', 'This Terms and Conditions of Service between Maulikrupa and users of the website describes the terms on which Maulikrupa offers you the Services (as defined below) through the website. The use of this website is governed by the terms and conditions under this Agreement. Before using this website, you must carefully read, understand, accept and agree to abide by all the terms and conditions under this Agreement.', '', '2016-08-24', 'Y', '14', 6, 'False'),
(31, 'Rose Land Residency', 'Pune', 'Pimple Soudagar', 'pimple soudagar pune', 'Kunal icon', 'Commercial', 'Sell', 'Commercial Land', '15 Supt 2016', '71 to 75 Lakh', '960 - 1600', '6500', '1 - 7', 'Fire Alarm,Power backup,Intercom Facility,Reserved parking,Conference Room', '10', '8', '1', '2', '1', '1', '1', 'This Terms and Conditions of Service between Maulikrupa and users of the website describes the terms on which Maulikrupa offers you the Services (as defined below) through the website.', 'image/Tuskegee-Institute-20.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '02045345', 'his Terms and Conditions of Service between Maulikrupa and users of the website describes the terms on which Maulikrupa offers you the Services (as defined below) through the website. The use of this website is governed by the terms and conditions under this Agreement. Before using this website, you must carefully read, understand, accept and agree to abide by all the terms and conditions under this Agreement.', 'image/sungare1.png', '2016-08-26', 'Y', '14', 4, 'True'),
(74, 'Bhoomi Blessings', 'Pune', 'wakad', 'Pimple gurav', 'ICICI bank', 'Residential', 'Rent', '2BHK', '12-4-2017', '41 to 45 Lakh', '650', '4500', '11', 'Fire Alarm,Power backup,Service Lift,Reserved parking,Intercom Facility,High Speed Internet', '11', '1', '1', '1', '1', '1', '1', 'Bhoomi Blessings is a lifestyle project comprising of fusion homes located in a superbly connected locale. This thoughtful development is conceptualized after thoroughly understanding the lifestyle needs of the modern hectic life. It offers great connectivity to office areas and weekend getaways. ', 'image/_m.jpg', 'amol patil', 'Owner', 'amolpatil91088@gmail.com', '8600454959', '07588521204', 'Bhoomi Blessings is a lifestyle project comprising Bhoomi Blessings is a Bhoomi Blessings is a lifestyle project comprising of fusion homes located in a superbly connected locale. This thoughtful development is conceptualized after thoroughly understanding the lifestyle needs of the modern hectic life. It offers great connectivity to office areas and weekend getaways. lifestyle project comprising of fusion homes located in a superbly connected locale. This thoughtful development is conceptualized after thoroughly understanding the lifestyle needs of the modern hectic life. It offers great connectivity to office areas and weekend getaways. ', 'image/usericon.jpg', '2016-09-06 12:38:56', 'Featured', '17', 1, 'False'),
(73, 'Bluewoods ', 'Pune', 'Pimple soudagar', 'rainbow plaza', 'Shiwar chowk', 'Commercial', 'Rent', 'Warehouse/Godown', '12-4-2017', '55 to 60 Lakh', '650', '4500', '11', 'Fire Alarm,Service Lift,Intercom Facility', '11', '1', '1', '1', '1', '1', '1', 'Bluewoods is a residential complex located in the heart of a bustling neighborhood. At Bluewoods, you will get the best of both worlds. The close proximity to city is what makes the beauty of of nature stand out. Here, the exteriors are filled with lush greenery and grand architecture that simply exudes opulence.The interiors are thoughtfully planned in order to fill the homes with natural light and fresh air.', 'image/bangalore real3--621x414.jpg', 'amol patil', 'Owner', 'amolpatil91088@gmail.com', '8600454959', '07588521204', 'Bluewoods is a residential complex located in the heart of a bustling neighborhood. At Bluewoods, you will get the best of both worlds', 'image/download (2).png', '2016-09-06 12:26:51', 'Featured', '17', 1, 'False'),
(75, 'The Leaf', 'Pune', 'Katraj Kondhwa Road', 'Off Katraj Kondhwa Road, Behind Isckon Temple, Yewalewadi', 'Isckon Temple', 'Residential', 'Rent', '3BHK', '12-4-2017', '45 to 50 Lakh', '650', '4500', '11', 'Fire Alarm,Lift,Reserved parking,Conference Room,Security Personal', '11', '1', '1', '1', '1', '1', '1', 'The Leaf offers a luxurious living amidst natural surrounding with all the life simplifying amenities and technologies. It is a perfect confluence of technology and nature. The apartments are strategically located so that you have all facilities within reach. The interiors are designed keeping in mind the utmost comfort of the customers and are facilitated with the best of modern technologies. The open green grounds and water bodies gives a break from the polluted environment. The natural beauty', 'image/mMuT_iqZ.jpeg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'The Leaf offers a luxurious living amidst natural surrounding with all the life simplifying amenities and technologies. It is a perfect confluence of technology and nature. The apartments are strategically located so that you have all facilities within reach. The interiors are designed keeping in mind the utmost comfort of the customers and are facilitated with the best of modern technologies. The open green grounds and water bodies gives a break from the polluted environment. The natural beauty of the campus make this project an urban and commercial heaven to dwell peacefully with your dear ones.', 'image/Blad1.png', '2016-09-06 12:52:27', 'Y', '11', 1, 'False'),
(76, 'Sylven Heights', 'Banglore', 'Indira Nagar', 'Saikrupa, Chatrapati Nagar', 'near relience mart', 'Residential', 'Rent', '3BHK', '15 Supt 2016', '95 to 99 lakh', '950 - 1700', '6500', '5', 'Fire Alarm, Service Lift, Reserved parking, Intercom Facility, High Speed Internet', '10', '1', '1', '2', '1', '1', '1', 'If your are experiencing technical or registration problems, we would advise you to delete your temporary Internet files / Cache. For more information on how to do this, please consult your web browser help.', 'image/building-wallpaper-13.jpg', 'Jasitha Uk', 'Owner', 'jasithauk@gmail.com', '9567730370', '09403112916', 'If your are experiencing technical or registration problems.', 'image/img332.jpg', '2016-09-07 10:00:44', 'Y', '18', 1, 'False'),
(77, 'Laburnum Park', 'Pune', 'Hadapsar', 'Magarpatta', 'Seasons mall', 'Residential', 'Rent', '3BHK', '12-4-2017', '1 to 2 Cr', '1250', '4500', '11', 'Power backup, Reserved parking', '11', '1', '1', '1', '1', '1', '1', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'image/kt525l.gif', 'Komal Shinde', 'Owner', 'maulikrupadas12@gmail.com', '9403112923', '07588521204', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'image/download (4).png', '2016-09-14 23:49:58', 'Y', '20', 1, 'False'),
(78, 'Sai World City', 'Mumbai', 'Panvel', 'National Highway 4B, NH4B-JNPT Expressway, Palaspe Phata Junction', 'Panvel', 'Residential', 'Sell', '4BHK', 'December 2019', '91 to 95 Lakh', '1265 - 2785', '6750', '1 - 15', 'Power backup, Intercom Facility, Fire Alarm, Lift, Service Lift, Reserved parking, Security Personal', '10', '5', '1', '2', '1', '1', '1', 'Embark upon a journey to a new world emerging of the megacity Panvel that invites the whole world home at Sai World City. Where quality of life is at its peak, where serene green environs compliment the natureâ€™s beauty, where leisure time becomes the best family time and lifestyle incarnates the cosmopolitan lifestyle.', 'image/saiworldcity.jpg', 'Paradise Group', 'Builder', 'avinash.sungare@gmail.com', '9960651112', '9960651112', 'An ISO 9001:2008 Certified Organization, Paradise Group began two decades ago with a clear aim of providing a decent and appealing space for all to dwell. Today, after successful projects across Navi Mumbai.', 'image/logo.png', '2016-09-16 23:30:26', 'Featured', '21', 0, 'False'),
(79, 'I-Land', 'Pune', ' Moshi', ' Moshi-Alandi Road', 'Off. Pune Nashik Highway', 'Residential', 'Sell', '2BHK', 'Ready to move', '35 to 40 Lakh', '888', '3900', '12', 'Power backup, Intercom Facility, Reserved parking, Conference Room', '11', '10', '5', '1', '1', '1', '1', 'Nakshatra I-Land provides an affordable shelter and offers every aspect of a healthy and comfortable lifestyle that most people aspire for. It is located away from the hustle-bustle of city life in a serene location and offers a world of peaceful environment. This project gives its residents a peaceful and convenient living making there life worth every moment. Apartments here are designed into stunning open-concept spaces keeping in mind your privacy and allowing you to appreciate all its impeccable and thoughtful details. Equipped with modern conveniences and amenities, these apartments are designed to make your lifestyle easier.', 'image/J691119059.bird-eyes-view.1049863l.jpg', 'NAKSHATRA', 'Builder', 'homeplanetary@gmail.com', '9545777067', '07588521204', 'Nakshatra Group is one of the leading groups in the field of real estate and since its inception, it has been engaged into providing a wide range of world class real estate projects to a diverse clientele.', 'image/usericon.jpg', '2016-09-20 05:17:02', 'Y', '22', 0, 'False'),
(80, 'The Almonds', 'Pune', 'Hinjewadi', 'Bhumkar Nagar, Nr. Bhumkar Chowk', 'Annex Hinjewadi Flyover', 'Residential', 'Sell', '3BHK', 'Ready to move', '41 to 45 Lakh', '837 - 853', '5100', '1-10', 'Power backup, Intercom Facility, Reserved parking, Conference Room', '11', '10', '5', '1', '1', '1', '1', 'The Almonds rests in the arms of nature with a beautiful landscape of 75% open green area. It provides harmonized homes where wellness, aesthetic and space will be well synchronized. Well planned composition of flats justifies the area and presents beautiful living space. Each flat is made with different walls keeping your privacy in mind. The Almonds is surrounded with expediencies, making life easy and full of comfort. The Almonds braces the comforts in the form of luxurious amenities and facilities that would definitely make this place first choice of aspiring families. ', 'image/21737567_4_thealmonds2_600_900.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Chintamani Developers in Pune is among the leading Builders & Developers in the region. They offer building construction services for Residential & Commercial property. They are proficient in constructing both modest houses & luxurious apartments, deluxe builder floors & ultra-modern offices & shopping complexes, etc. ', 'image/usericon.jpg', '2016-09-20 22:34:55', 'Y', '14', 4, 'False'),
(81, 'Erica Homes', 'Pune', 'Wakad', 'Survey No. 64/16, Wakadkar Wasti', 'Wakad Flyover', 'Commercial', 'Sell', 'Shop/Showroom', 'Ready to move', '31 to 35 Lakh', '673 - 1026', '5100 ', '1-11', 'Power backup, Intercom Facility, Reserved parking, Conference Room', '11', '10', '5', '1', '1', '1', '1', 'Erica Homes is an abode meant for those looking for that extra touch of luxury, serenity and lavishness. An investment in this apartment will not make a huge difference to your savings as it is cost effective along with being beautiful. Enjoy a jog with your family in the pristine surroundings here. ', 'image/sai-erica-homes_2015-03-17_02-25-00.492_erica_photo1.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Sai Sagar Ventures is a Real Estate company that is in existence since over a decade. They plan aesthetically and provide a happy living to the customers. They keep all the minute details in mind for increasing the customers comfort. They feel thankful for all those who have trusted them and invested in their plan. Their plan is simply authentic to catch the eyes of the customers.', 'image/medium.jpg', '2016-09-21 02:12:55', 'Y', '14', 2, 'False'),
(82, 'Nisarg Vishwa', 'Pune', 'Hinjewadi ', 'Sr. No. 144, Wakadkar Wasti Road', 'Bhumkar Chowk', 'Residential', 'Sell', '2BHK', 'Jun, 2017', '31 to 35 Lakh', '673 - 924 ', '4900', '1-10', 'Power backup, Fire Alarm, Lift, Service Lift, Reserved parking, Security Personal', '11', '10', '5', '1', '1', '1', '1', 'Nisarg Vishwa is the perfect amalgamation of affordability and contemporary luxury. Situated away from the chaos and crowd of the city, residents here can enjoy peaceful living away from pollution and congestion. Planned thoughtfully, each home promises a lifestyle that surpasses the ordinary in each aspect.', 'image/EL_1.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Known for providing most loyal and dedicated services, Nisarg Group believes in dedication towards building a long term client relationship. Satisfaction of the clients has been their prime and foremost concern.', 'image/medium (1).jpg', '2016-09-21 02:38:24', 'Y', '14', 1, 'False'),
(83, 'Kohinoor Tinsel Town', 'Pune', 'Hinjewadi', 'S.No-288, Hinjewadi Phase 2,  Maan Village, ', 'Near Quadron IT Park,', 'Other', 'Sell', 'Agriculture Land', 'Dec, 2018', '61 to 65 Lakh', '1011 - 1388', '4905 ', '1-10', 'Power backup, Fire Alarm, Lift, Service Lift, Reserved parking, Security Personal', '11', '10', '1', '1', '1', '1', '1', 'Kohinoor Group launches Tinsel Town, an exquisite residential development at Hinjewadi, one of the most promising destinations in Pune. Away from the congestion and traffic chaos, this prestigious landmark is designed to scale up your lifestyle and comfort within the circle. Inviting you to live a new-age lifestyle, it is a treat to your eyes. Crafted with contemporary standards, it will surely boost your status and pride in your peer group.', 'image/556ec99a661d6.gif', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Kohinoor Group is a well-known name in the real estate industry. Every of their project is constructed with proper planning by professionals. Since its inception, the Company has been successfully building projects keeping the need of residents and changing real estate scenario. As a group, it provides most professional, informative, loyal and dedicated service to its customers.', 'image/medium (2).jpg', '2016-09-21 03:13:33', 'Y', '14', 0, 'False'),
(84, 'Elite Residences', 'Pune', 'Baner', 'Survey No. 25', 'Off Pan Latt Club', 'Residential', 'Sell', '4BHK', 'Ready to move', '4 to 5 Cr', '3836', '12500', '1-11', 'Intercom Facility, Lift, Service Lift, Conference Room', '11', '10', '5', '1', '1', '1', '1', 'Elite Residences presents itself as the perfect city home with an amazing view. At Elite Residences, life blossoms in diverse ways making every day a pleasure to stride through. The undulating lush green fields that welcome you are awe-striking at first glance. Simply soak in the comforts of your home as it also connects you to the city. Make life a breezy experience as you juggle work, personal life, leisure and entertainment. The project provides a blend of comfortable lifestyle and healthy environment.', 'image/IMG2.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Elite Landmark is a popular Real Estate company that offers individuals a pristine and extravagant life in prime location. The projects are unique in every aspect like designs, natural scenery and the concept that tempts the buyers to choose one of the apartments provided by this front line builder. They operate their projects on the outskirts of Pune where the demand is quite high. ', 'image/medium (3).jpg', '2016-09-21 04:08:47', 'Y', '14', 0, 'False'),
(85, 'Skylark Residences', 'Pune', 'Baner', 'S. No. 32/1A/1/30, Near Pan Card Club, Sky Fitness & Wellness', 'Off Sutarwadi Baner Gaon Road', 'Commercial', 'Sell', 'Office Space', 'Dec, 2017', '81 to 85 Lakh', '1046  - 2699 ', '7648', '1-10', 'Intercom Facility, Fire Alarm, Lift, Service Lift, High Speed Internet', '11', '10', '1', '1', '1', '1', '1', 'Skylark Residences is finely designed project that comprises of its residential and commercial spaces using skilled workmanship to exceed expectations. Here at Skylark Residences, all the spaces are customized just for you and your lifestyle â€“ be it at home or at work. Your new abode at Skylark Residences, offers the best of all comfort, right at your doorstep. Residents are benefited with skilled specifications that feature value and convenience.', 'image/2-skylark-residences.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'Valay Realty has been creating space that induces positive and calmness. They have constantly & relentlessly focused on creating a more fulfilling experience for their customers. Today their efforts bear fruit & their name rhymes with commitment to quality, reliability, integrity & excellence in architecture. ', 'image/medium (4).jpg', '2016-09-21 04:49:26', 'Y', '14', 0, 'False'),
(86, 'Pride Purple Township', 'Pune', 'Bavdhan', 'Near Hypro Engineers', 'Off Mumbai Pune Bypass Road', 'Residential', 'Sell', '4BHK', 'Dec, 2018', '61 to 65 Lakh', '1040- 1635 ', '5300', '1-10', 'Intercom Facility, Fire Alarm, Lift, Security Personal, High Speed Internet', '11', '10', '5', '1', '1', '1', '1', 'Pride Purple Township is an opulent residential development by Pride Purple Group at Bavdhan, Pune. Offering spacious and skillfully designed 2BHK and 3BHK apartments, it is well equipped with all the modern day amenities as well as basic facilities. Enriching and refreshing your mind, heart and soul; every living abode amplifies natural light and ventilation yet giving enough privacy. ', 'image/pride_purple_township_bavdhan_gallery2.jpg', 'Komal Shinde', 'Owner', 'maulikrupadas12@gmail.com', '9403112923', '07588521204', 'Pride Purple Group was established for the sheer pleasure at witnessing the standards of living uplift via better architecture and buildings. Certain base values run through the veins of everyone associated with the group. Not only respecting commitments but rather is taking a step further to go beyond what they do.', 'image/medium (5).jpg', '2016-09-21 05:09:18', 'Featured', '20', 0, 'False'),
(87, 'Park Ivory', 'Pune', 'Wakad', 'Park Street, Kalewadi Chowk', 'Jagtap Dairy', 'Residential', 'Sell', 'Plot/Land', 'Jul, 2017', '65 to 70 Lakh', '790 - 1465', '6400 - 6650', '1-10', 'Power backup, Fire Alarm, Lift, Service Lift, Conference Room', '11', '10', '1', '1', '1', '1', '1', 'Park Ivory-The 3-sides open two and three apartments designed for celebrations. Large living spaces, windows aligned to receive maximum sunlight and fresh breeze, energizing and rejuvenating all within. You can unwind, rejuvenate, introspect or meditate at the refreshing, lush green spread. The vehicle free podium facilitates free movement. All these finer details have translated Park Ivory into a niche creation. ', 'image/pride-purple-group-park-ivory-elevation-679110.jpeg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Pride Purple Group was established for the sheer pleasure at witnessing the standards of living uplift via better architecture and buildings. Certain base values run through the veins of everyone associated with the group. Not only respecting commitments but rather is taking a step further to go beyond what they do. ', 'image/medium (5).jpg', '2016-09-22 00:11:42', 'Y', '11', 0, 'False'),
(89, 'Sai Paradise', 'Pune', 'Mumbai - Bengaluru  Bypass ', 'Survey No. 12, Plot C, Opposite Sai Petrol Pump', '', 'Residential', 'Sell', 'House/Villa', 'Dec, 2019', '35 to 40 Lakh', '426 - 733', '4950', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift, High Speed Internet', '11', '10', '1', '1', '1', '1', '1', 'At the pulsating Punawale, Wadhwani Constructions brings you Sai Paradise- 19 Storied Architectural Marvel with lavish homes. The creators have ensured that the features of the living spaces compliment the new age lifestyle. Being a part of Sai Paradise means enjoying the benefits of living in a supremely designed homes and also enjoying the advantages of a supreme location. Be at Sai Paradise, be with the changed called Punewale and feel the pulse of new Pune!', 'image/23239_SaiParadise_12389.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'adhwani Construction is a promising Real Estate developer. Their mission is to provide clients with their dream homes which are affordable with all the modern day amenities and features. They strive to provide their customers a great environment where they can learn, grow and succeed together. ', 'image/medium (6).jpg', '2016-09-22 00:29:24', 'Y', '11', 0, 'False'),
(90, 'Gagan Cascades', 'Pune', 'Katraj-Hadapsar Bypass', 'S. No. 13,', 'Dharmawat Petrol Pump', 'Commercial', 'Sell', 'Industrial Shed', 'Mar, 2018', '15 to 20 Lakh', '575 - 986', '3300 ', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift, Service Lift', '11', '10', '5', '1', '1', '1', '1', 'Gagan Cascades is a residential project which has everything you want all in one place. As the dreams move towards reality, the future ushers in holistic living to let you enjoy a life of bliss. The project offers supreme luxury and convenience to its residents. With everything they need and want around them, the project provides it all to make your life easier and majestic.', 'image/gagan-properties-cascades-elevation-679120.jpeg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Gagan Properties was founded to establish themselves as a prosperous and innovative brand in the field of Property Development. They intend in making each of their project a testimony of plush living. They stand apart due to their supreme efforts, honesty, discipline and transparency. ', 'image/medium (7).jpg', '2016-09-22 00:40:57', 'Y', '11', 0, 'False'),
(91, 'Gagan Cefiro', 'Pune', 'Undri	', 'S. No. 57 Lane Behind to Ambekar Hotel', '', 'Commercial', 'Sell', 'Industrial Building', 'Dec, 2017', '21 to 25 Lakh', '656  - 995', '3800 ', '11', 'Power backup, Intercom Facility, Fire Alarm, Lift, Reserved parking', '11', '10', '5', '1', '1', '1', '1', 'Gagan Cefiro is an upcoming project with an impressive layout of homes. The well laid abodes allow adequate flow of air and energy, offering you a pleasant and comfortable lifestyle. The rooms here are spacious to provide you the much needed privacy. Contemporary technology and modern features are the highlights of this tower. Its alluring address makes up for all the more reasons why one must reside here.', 'image/e3.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Gagan Properties was founded to establish themselves as a prosperous and innovative brand in the field of Property Development. They intend in making each of their project a testimony of plush living. They stand apart due to their supreme efforts, honesty, discipline and transparency. The Group has earned respect and success through lots of hard work and passion towards work. ', 'image/medium (7).jpg', '2016-09-22 00:47:19', 'Y', '11', 1, 'False'),
(92, 'Micasaa', 'Pune', 'Wagholi', 'Gat No.878 & 879, Kesnand Road', 'Ayurvedic College', 'Residential', 'Sell', '4BHK', 'Nov, 2016', '25 to 30 Lakh', '650 - 1185 ', '4050', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift', '11', '10', '1', '1', '1', '1', '1', 'Micasaa is a place that offers you the freedom to walk with glory along with the satisfaction of your desires all under one roof. The avenue is a compilation of lavish living with simplicity that greets you with a warm welcome. The project is built with all the modern day amenities with luxurious features to make life a new living experience. These homes define a new class of structure and designs to make you feel special in the best manner. ', 'image/Micasaa.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Gagan Properties was founded to establish themselves as a prosperous and innovative brand in the field of Property Development. They intend in making each of their project a testimony of plush living. They stand apart due to their supreme efforts, honesty, discipline and transparency. The Group has earned respect and success through lots of hard work and passion towards work. ', 'image/medium (7).jpg', '2016-09-22 01:02:37', 'Y', '11', 0, 'False'),
(93, 'Gagan Emerald', 'Pune', 'Kondhwa', 'Survey No.62/4, Sai Baba Nagar', 'Sheetal Petrol Pump', 'Residential', 'Sell', '3BHK', 'Ready to move', '55 to 60 Lakh', '1301 - 1397', '4300', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift, Service Lift', '11', '10', '1', '1', '1', '1', '1', 'Gagan Emerald is an opulent residential project surrounded with lush natural greenery. These luxuriant apartments are outfitted with state-of-the-art amenities that makes each of the element elegant and stupendous. The architectural excellence give these apartments a classic and contemporary flavor at the same time. Crafted to allow maximum space utilization these tailor-made apartments of Ganga Emerald set the perfect ambiance and aesthetics for a delightful and pleasant living.', 'image/20377405_2_NightView_600_900.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Gagan Properties was founded to establish themselves as a prosperous and innovative brand in the field of Property Development. They intend in making each of their project a testimony of plush living. They stand apart due to their supreme efforts, honesty, discipline and transparency. The Group has earned respect and success through lots of hard work and passion towards work. ', 'image/medium (7).jpg', '2016-09-22 01:38:08', 'Y', '11', 1, 'False'),
(94, 'Kanvas', 'Pune', 'Wagholi', 'Gat No-663, B.H. Hargude Nagar', 'Lexicon Institute', 'Residential', 'Sell', '2BHK', 'Ready to move', '21 to 25 Lakh', '624 - 983', '3700', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift, Service Lift', '11', '10', '5', '1', '1', '1', '1', 'Kanvas is nestled amidst the beautiful scenic beauty of nature and the picturesque landscape spreads over several acres of land. This locality is ideal for the city dwellers who are looking for stress free living conditions away from the crowded city life. The peaceful environ that envelops this property will calm and relax your senses. Located away from the busy city life, these luxurious abodes still provide varieties of options required in order to spend the rest of your life in opulence and comfort.', 'image/21879085_5_anshul_kanvas_600_900.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Anshul Realties Pvt Ltd., is a name synonymous with quality, integrity and creativity. The group constantly works towards providing world class residential complexes and shopping complexes that offer a higher level of living at affordable rates to its customers. With an eye on the real estate updates, this group has a fine sense of the trends and work toward fulfilling the diverse needs and aspirations of its customers. ', 'image/medium (8).jpg', '2016-09-22 02:44:18', 'Y', '11', 0, 'False'),
(95, 'Ela', 'Pune', 'Moshi', 'Gate No.50/', 'Toll Plaza', 'Residential', 'Sell', '1BHK', 'Ready to move', '31 to 35 Lakh', '826 - 953', '4000', '1-10', 'Power backup, Reserved parking', '11', '10', '5', '1', '1', '1', '1', 'Ela is located away from the hustle bustle of the crowded streets and is spread across several acres of lush greenery. A peaceful and serene environment along with lavish arrangements for the residents, this property is an ideal abode for the modern day and age people', 'image/ela-elevation-876241.jpeg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Anshul Realties Pvt Ltd., is a name synonymous with quality, integrity and creativity. The group constantly works towards providing world class residential complexes and shopping complexes that offer a higher level of living at affordable rates to its customers. ', 'image/medium (8).jpg', '2016-09-22 03:19:53', 'Y', '11', 0, 'False'),
(96, 'Eva', 'Pune', 'Bavdhan', 'Survey No- 7/8/9', '', 'Residential', 'Sell', '1RK', 'Ready to move', '61 to 65 Lakh', '1021 - 1139 ', '6300', '1-10', 'Power backup, Intercom Facility, Fire Alarm', '11', '10', '1', '1', '1', '1', '1', 'Eva is surrounded by lavish greenery and it offers you a new life practically unparalleled to anything. The meaning of healthy living becomes distinguished here in the lap of nature. The beautiful apartment complexes are so designed that they allow you to have something extra every time. It offers you excellent cross ventilation and gentle sunlight throughout the day. ', 'image/image_11230_6.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Anshul Realties Pvt Ltd., is a name synonymous with quality, integrity and creativity. The group constantly works towards providing world class residential complexes and shopping complexes that offer a higher level of living at affordable rates to its customers. ', 'image/medium (8).jpg', '2016-09-22 03:27:33', 'Y', '11', 0, 'False'),
(97, 'Sobha Orion', 'Pune', 'Kondhwa', 'Near Sobha Carnation', '', 'Residential', 'Sell', '2BHK', 'May, 2017', '65 to 70 Lakh', '1103  - 1284 ', '5709', '1-10', 'Power backup, Intercom Facility, Lift', '11', '10', '1', '1', '1', '1', '1', 'Sobha Orion welcomes you to its elegantly designed multi-storeyed tower with luxurious residences. With a one-of-its-kind backward integrated model, Sobha Orion gives you a sophisticated living experience beyond all. Sobha Orion puts in your hands the widest range of amenities making life a whole lot more comfortable.', 'image/gallery-big1.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Largest and only backward integrated real estate player in the country, Sobha Limited is a big name in the construction industry.The company has always striven for benchmark quality, customer centric approach, robust engineering, in-house research, timeless values and transparency in all spheres of business conduct which have contributed in making it a preferred real estate brand in India.', 'image/b1.jpg', '2016-09-22 03:49:54', 'Y', '11', 0, 'False'),
(98, 'Shankeshwar Icon', 'Pune', 'Moshi', 'Plot No. 5/6/7, Sanjay Gandhi Nagar Road', 'Market Yard', 'Other', 'Sell', 'Farm House', 'Ready to move', '25 to 30 Lakh', '685 - 930', '4000', '1-10', 'Power backup, Intercom Facility, Reserved parking, Conference Room', '11', '10', '1', '1', '1', '1', '1', 'Moshi is a fast developing suburb located in the heart of Pimpri-Chinchwad region of Pune, Maharashtra. Rapid development and availability of residential projects at affordable prices has made Moshi one of the most sought-after residential localities in the city. Because of its strategic location on the Pune-Nashik Highway, Moshi is the perfect choice for Real Estate and Commercial development. ', 'image/561cc7ddf29c5.gif', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Shankeshwar Properties is a famous Realty firm. Its success has been due to its focused approach towards quality and innovation. This is due to the immense care that goes into planning, choosing the right resources and execution, be it the drawings and construction material â€“ the customers have always got the best - a fact they vouch for. ', 'image/medium (9).jpg', '2016-09-22 03:56:33', 'Y', '11', 0, 'False'),
(99, 'Golden Leaf', 'Pune', 'Kondhwa', 'Off Unity Park Road, Near Shreeji Banquet & Lawns', '', 'Commercial', 'Sell', 'Warehouse/Godown', 'Ready to move', '81 to 85 Lakh', '1196 - 1271', '6750', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift', '11', '10', '1', '1', '1', '1', '1', 'Golden Leaf is a superior residential project built with unique designs and planning for convenient existence. The apartments are placed in the backdrop of natural green ambiance for peaceful and extravagant lifestyle. The residencies are designed and planned in an extraordinary way where every customerâ€™s dream of owning a home is being fulfilled. Luxury and lavish lifestyle is the major outline of this project.', 'image/portfolio-item-1.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Golden Erectors are a renowned Company set by a team of dynamic individuals. They have a rich experience in the realty sector and are known for providing high value properties and consultancy. The firm leaves no stone unturned to meet the expectations of its customers. With a result - oriented approach, Golden Erectors focuses on creating landmark projects with an edge over others. ', 'image/medium (10).jpg', '2016-09-22 04:13:52', 'Y', '11', 0, 'False'),
(100, 'Pride Panorama ', 'Pune', 'Shivaji nagar', 'Senapati Bapat Road, Behind ICC Towers', 'JW Marriet', 'Residential', 'Sell', '4BHK', 'Ready to move', '2 to 3 Cr', '1337 - 3323', '15000', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Lift, Reserved parking, Conference Room, Security Personal, High Speed Internet', '11', '10', '1', '1', '1', '1', '1', 'Pride Panorama is a residential project that is spread across several acres of beautiful portrait landscape. The majestic and grand accommodation facilities allow residents to enjoy a comfortable and luxurious life. The project is designed keeping the need of common people in mind. Being nestled in the midst of mother nature, it calls for the attention of those residential property buyers who prefer to stay in a calm and serene ambiance, away from the hustle-bustle of the city life. The availability of all the ultra-modern amenities and facilities make this accommodation a perfect choice for everyone.', 'image/pride-panorama-290398.jpg', 'Avinash Rathod', 'Owner', 'avinashrathod89@gmail.com', '7588521204', '07588521204', 'Pride Purple Group was established for the sheer pleasure at witnessing the standards of living uplift via better architecture and buildings. Certain base values run through the veins of everyone associated with the group. Not only respecting commitments but rather is taking a step further to go beyond what they do. Merit-based opportunity is provided to everyone at the Pride Purple Group. ', 'image/medium (5).jpg', '2016-09-25 23:23:08', 'Y', '11', 0, 'False'),
(101, 'Vedanta', 'Pune', 'Wakad', 'Sr No. 166/1 & 166/5, Off Wakad Road', 'Near Post Office', 'Residential', 'Sell', '2BHK', 'Ready to move', '61 to 65 Lakh', '1009 - 1392', '6200', '1-10', 'Power backup, Intercom Facility, Fire Alarm, Reserved parking, Conference Room, Security Personal', '11', '10', '5', '1', '1', '1', '1', 'Vedanta is a luxurious abode situated in a well known locality. The elegant specifications and world-class features makes it the most sought after residence. Every apartment gives you an optimum space for a larger than life experience with your loved ones. With the holiness of peace and warmth, it cares for the safety and security of the dwellers. Vedanta takes special care of your families thus reducing your worries to zero. The apartments are built without compromising on style and are fairly priced. Make your perfect choice with this abode where tranquility is at its best.', 'image/elevation.jpg', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '07588521204', 'G K Associates began its journey in Real Estate Industry with an aim to offer quality construction and transparent dealings. The owners of the company have been engaged in the field of construction and land development. The company has focused on creating homes that foster a comfortable and wonderful living environment.', 'image/medium (11).jpg', '2016-09-28 21:40:57', 'Y', '14', 0, 'False');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `advertise_req`
--

CREATE TABLE `advertise_req` (
  `a_id` int(8) NOT NULL,
  `nm` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `msg` varchar(500) NOT NULL,
  `photo` varchar(10000) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advertise_req`
--

INSERT INTO `advertise_req` (`a_id`, `nm`, `email`, `mob`, `msg`, `photo`, `date`) VALUES
(5, 'Priyanka Shinde', 'maulikrupadas12@gmail.com', '7588521204', 'hiii', 'ad_images/back.jpg ', '2016-09-23 02:52:47'),
(6, 'smita', 'smita@gmail.com', '9876342345', 'ghdfgdsghfgsdgh dsjfjdsjfsdhhj jsadjsajkdjkasjkd sjdsjdasjkdjkasjkdkjaskdjasjkdkjsadjkasjkdjksadjka', 'ad_images/a2.jpg ', '2016-11-10 17:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(11) NOT NULL,
  `cname` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cid`, `cname`) VALUES
(1, 'Kolkata'),
(2, 'Pune'),
(4, 'Mumbai'),
(5, 'Aurangabad'),
(6, 'Pune'),
(7, 'Nashik'),
(8, 'Delhi'),
(9, 'Nagpur'),
(10, 'Thane'),
(11, 'Raigad'),
(12, 'Pimpri'),
(13, 'Solapur'),
(14, 'Kolhapur'),
(15, 'Satara'),
(16, 'Sangli'),
(17, 'Latur'),
(18, 'Amravati'),
(19, 'Akola'),
(20, 'Jalna'),
(21, 'Beed'),
(22, 'Nanded'),
(23, 'Parbhani'),
(24, 'Navi Mumbai'),
(25, 'Ratnagiri'),
(26, 'Raigad'),
(27, 'Sindhudurga'),
(28, 'Chennai'),
(29, 'Ludhiana'),
(30, 'Chandigadh'),
(31, 'Buldhana'),
(32, 'pune'),
(33, 'Barrackpore'),
(34, 'Palta'),
(35, 'Haldia'),
(36, 'dhule'),
(37, 'roha'),
(38, 'barrack'),
(39, 'naihati'),
(40, 'siliguri'),
(41, 'Nagar'),
(42, 'sonkhed'),
(43, 'kannur'),
(44, 'roha');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `c_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(500) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `name`, `email`, `mobile`, `address`, `date`) VALUES
(1, 'Avinash Rathod', 'avinashrathod89@gmail.com', '7588521204', 'Poorva Residency, Pimple Soudagar', '2016-09-01 12:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `enq_id` int(10) NOT NULL,
  `property_name` varchar(1000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `comments` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `property_id` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `verification_code` int(6) NOT NULL DEFAULT '0',
  `verification_status` varchar(20) NOT NULL DEFAULT 'False'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`enq_id`, `property_name`, `name`, `email`, `mob`, `comments`, `date`, `username`, `property_id`, `user_id`, `verification_code`, `verification_status`) VALUES
(31, 'koltepatil  Appartment - pimple gurav, Pune', 'Demo', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 00:37:48', '7588521204', '28', '25', 0, 'True'),
(30, 'Kalpataru Estate Phase-III - Hinjewadi, Pune', 'sungareadmin', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 00:34:02', '9403112916', '29', '26', 0, 'True'),
(29, 'koltepatil  Appartment - pimple gurav, Pune', 'Sungare testing', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 00:32:03', '7588521204', '28', '26', 0, 'True'),
(28, 'Bluewoods  - Pimple soudagar, Pune', 'shubham', 'homeplanetary@gmail.com', '7588521204', 'hiiii', '2016-09-20 00:11:18', '8600454959', '73', '27', 0, 'True'),
(27, 'Bhoomi Blessings - wakad, Pune', 'Demo', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 00:03:29', '8600454959', '74', '26', 0, 'True'),
(26, 'The Leaf - Katraj Kondhwa Road, Pune', 'Priyanka Shinde', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 00:01:39', '7588521204', '75', '27', 0, 'True'),
(24, 'Laburnum Park - Hadapsar, Pune', 'Avinash Rathod', 'maulikrupadas12@gmail.com', '9168077581', 'test', '2016-09-19 23:57:20', '9403112923', '77', '25', 0, 'True'),
(25, 'Laburnum Park - Hadapsar, Pune', 'Komal Shinde', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-19 23:58:39', '9403112923', '77', '26', 0, 'True'),
(23, 'Laburnum Park - Hadapsar, Pune', 'Avinash', 'maulikrupadas12@gmail.com', '9168077581', 'test', '2016-09-19 23:57:02', '9403112923', '77', '27', 0, 'True'),
(32, 'koltepatil  Appartment - pimple gurav, Pune', 'Pooja', 'homeplanetary@gmail.com', '7588521204', 'Testinggggg', '2016-09-20 00:41:57', '7588521204', '28', '27', 0, 'True'),
(33, 'Rose Land Residency - Pimple Soudagar, Pune', 'Payal', 'homeplanetary@gmail.com', '7588521204', 'testinggg', '2016-09-20 00:46:33', '9403112916', '31', '25', 0, 'True'),
(40, 'Rose Land Residency - Pimple Soudagar, Pune', 'Priyanka', 'homeplanetary@gmail.com', '7588521204', 'test', '2016-09-20 15:01:48', '9403112916', '31', '26', 0, 'True'),
(41, 'Sai Paradise - Mumbai - Bengaluru  Bypass , Pune', 'shahrukh khan', 'shahrukh@gmail.com', '8600454959', 'interested', '2016-09-22 03:48:07', '7588521204', '89', '27', 0, 'True');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `uploaded`) VALUES
(27, '1472707094.jpg', '2016-09-01 05:18:15'),
(28, '1472707095.jpg', '2016-09-01 05:18:15'),
(29, '1472707095.jpg', '2016-09-01 05:18:15'),
(30, '1472707095.jpg', '2016-09-01 05:18:15'),
(31, '1472707096.jpg', '2016-09-01 05:18:16'),
(32, '1472707096.jpg', '2016-09-01 05:18:16'),
(33, '1472707096.jpg', '2016-09-01 05:18:16'),
(34, '1472707096.jpg', '2016-09-01 05:18:16'),
(35, '1472707096.jpg', '2016-09-01 05:18:16'),
(36, '1472707096.jpg', '2016-09-01 05:18:17'),
(37, '1472707097.jpg', '2016-09-01 05:18:17'),
(38, '1472707122.jpg', '2016-09-01 05:18:42'),
(39, '1472707122.jpg', '2016-09-01 05:18:42'),
(40, '1472707122.jpg', '2016-09-01 05:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `img_id` int(10) NOT NULL,
  `img_path` varchar(10000) NOT NULL,
  `property_id` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`img_id`, `img_path`, `property_id`) VALUES
(74, 'staff2.jpg', 31),
(73, 'staff1.jpg', 31),
(72, '5.png', 31),
(71, '4.png', 31),
(70, '3.png', 31),
(69, 'grid-img3.png', 28),
(68, 'grid-img2.png', 28),
(67, 'grid-img1.png', 28),
(75, 'day.jpg', 73),
(76, 'f1.jpg', 73),
(77, 'fam.jpg', 73),
(78, 'f2.jpg', 73),
(79, 'bangalore real3--621x414.jpg', 74),
(80, '_m.jpg', 74),
(81, 'bangalore real3--621x414.jpg', 75),
(82, '_m.jpg', 75),
(83, 'Panchgani-weekend-getaways-near-pune.jpg', 75),
(84, 'mMuT_iqZ.jpeg', 75),
(85, 'kotharibrothers.jpg', 75),
(86, 'maxresdefault.jpg', 75),
(87, 'banner.jpg', 76),
(88, 'building-wallpaper-13.jpg', 76),
(89, 'construction3-web.jpg', 76),
(90, 'Tuskegee-Institute-20.jpg', 76),
(91, 'kt525l.gif', 77),
(92, '2.jpg', 78),
(93, '07_11_2015_306_005_006.jpg', 78),
(94, '1455622744Sai World City Pardise1.jpg', 78),
(95, 'e6.jpg', 78),
(96, 'e9.jpg', 78),
(97, 'ele-11 (1).jpg', 78),
(98, 'ele-11.jpg', 78),
(99, 'elevation2.jpg', 78),
(100, 'Floor-Plan-36-Sai-World-City-Navi-Mumbai-5073606_560_962_310_462.jpg', 78),
(101, 'Floor-Plan-37-Sai-World-City-Navi-Mumbai-5073606_473_870_310_462.jpg', 78),
(102, 'Floor-Plan-59-Sai-Mannat-Navi-Mumbai-5019780_470_1024_310_462.jpeg', 78),
(103, 'fhg902.jpg', 78),
(104, 'garnet-construction-brillante-elevation-398672.jpeg', 78),
(105, 'Image-of-sai.jpg', 78),
(106, 'panvel.jpg', 78),
(107, 'property-test.jpg', 78),
(108, 'slider3.jpg', 78),
(109, 'slider2.jpg', 78),
(110, 'Floor-Plan-35-Ravikiran-Pune-5088205_699_1001.JPG', 79),
(111, 'J691119059.front-view.1049900l.jpg', 79),
(112, '21737567_4_thealmonds2_600_900.jpg', 80),
(113, 'opp2_Even_Floor_Plan.jpg', 80),
(114, '18229524_2_Floor-Plan-35-The-Almonds-Pune-5026609_389_863_600_900.jpg', 80),
(115, 'sai-erica-homes_2015-03-17_02-25-00.492_erica_photo1.jpg', 81),
(116, 'sai-erica-homes_2015-03-17_02-25-31.583_5-7_big.jpg', 81),
(117, 'sai-erica-homes_2015-03-17_02-25-23.721_5-6_big.jpg', 81),
(118, 'zinnia-elegans-in-wakad-pune-projectpicture_20160616081352044300.jpg', 81),
(119, '1bhk.jpg', 82),
(120, '1217489.jpeg', 82),
(121, 'EL_1.jpg', 82),
(122, 'e1.jpg', 82),
(123, 'kohinoor-tinsel-town-2-BHK-682-Sft1.jpg', 83),
(124, 'Floor-Plan-41-Tinsel-Town-Pune-5073493_768_1015_310_462.jpg', 83),
(125, 'elite_residences_5920042444072809606.jpg', 84),
(126, '4kgff.jpg', 84),
(127, 'ekk44.jpg', 84),
(128, '3-skylark-residences.jpg', 85),
(129, '2-skylark-residences.jpg', 85),
(130, 'pride_purple_township_bavdhan_gallery2.jpg', 86),
(131, 'Pride-Purple-Township-Bavdhan.jpg', 86),
(132, '70427823.jpg', 87),
(133, 'Park-Ivory-Wakad.jpg', 87),
(134, '3.jpg', 87),
(135, '990-Wadhwani_Punawale_(010)2bhk-Small.jpg', 89),
(136, '4658572.jpeg', 89),
(137, 'ak_1000_1621967216-1461740116_700x700.jpeg', 90),
(138, '5666801433392973.jpg', 90),
(139, 'e8.jpg', 91),
(140, 'e6.jpg', 91),
(141, '2bhk-1153_1049_935.jpg', 91),
(142, '55669dd9ce86d.gif', 91),
(143, '2014-04-22_03-27-46.368_4-22-2014 12-45-26 pm.jpg', 93),
(144, '20469008_6_SideLayout_600_900.jpg', 93),
(145, '21879085_5_anshul_kanvas_600_900.jpg', 94),
(146, 'pg5.jpg', 94),
(147, 'image_11230_6.jpg', 95),
(148, 'ela-elevation-876241.jpeg', 95),
(149, 'ShankeshwarIconSlide.jpg', 98),
(150, '1bhk (1).jpg', 98),
(151, '1.jpg', 98),
(152, 'portfolio-11.jpg', 99),
(153, 'portfolio-12.jpg', 99),
(154, 'banner13.jpg', 31),
(155, 'banner12.jpg', 31);

-- --------------------------------------------------------

--
-- Table structure for table `post_requirement`
--

CREATE TABLE `post_requirement` (
  `req_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `want_to` varchar(20) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `property_subtype` varchar(50) NOT NULL,
  `bedrooms` varchar(20) NOT NULL,
  `bathrooms` varchar(20) NOT NULL,
  `budget` varchar(20) NOT NULL,
  `min_area` int(20) NOT NULL,
  `max_area` int(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `locality` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `property_views`
--

CREATE TABLE `property_views` (
  `id` int(45) NOT NULL,
  `user_id` int(45) NOT NULL DEFAULT '0',
  `property_id` int(45) NOT NULL DEFAULT '0',
  `date` varchar(60) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_views`
--

INSERT INTO `property_views` (`id`, `user_id`, `property_id`, `date`) VALUES
(1, 25, 28, '2016-11-18 11:09:19'),
(2, 25, 77, '2016-11-18 14:17:30'),
(3, 25, 31, '2016-11-18 14:17:38'),
(4, 25, 74, '2016-11-18 14:17:56'),
(5, 14, 29, '2016-11-18 14:18:29'),
(6, 14, 80, '2016-11-18 14:18:41'),
(7, 14, 81, '2016-11-18 14:18:58'),
(8, 14, 82, '2016-11-18 14:19:26'),
(9, 14, 73, '2016-11-18 14:19:37'),
(10, 14, 75, '2016-11-18 14:19:56'),
(11, 14, 76, '2016-11-18 14:20:07'),
(12, 14, 93, '2016-11-18 14:20:21'),
(13, 14, 91, '2016-11-18 14:20:30'),
(14, 14, 28, '2016-11-18 15:05:53'),
(15, 14, 31, '2016-12-03 12:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `areu` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `mob` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cnfpsd` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `verification_code` int(6) NOT NULL DEFAULT '0',
  `verification_status` varchar(20) NOT NULL DEFAULT 'False'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `name`, `email`, `gender`, `areu`, `city`, `mob`, `pass`, `cnfpsd`, `date`, `verification_code`, `verification_status`) VALUES
(14, 'Priyanka', 'priyanka@hotmail.com', 'Female', 'Builder', 'Pune', '9403112916', '123', '', '2016-08-29 15:47:06', 0, 'True'),
(11, 'Avinash Rathod', 'avinashrathod89@gmail.com', 'male', 'Owner', 'Pune', '7588521204', '123', '', '2016-08-29 15:31:06', 0, 'True'),
(17, 'amol patil', 'amolpatil91088@gmail.com', 'male', 'Owner', 'Pune', '8600454959', '111', '111', '2016-09-02 10:26:28', 0, 'True'),
(18, 'Jasitha Uk', 'jasithauk@gmail.com', 'female', 'Owner', 'Banglore', '9567730370', '123', '123', '2016-09-06 17:47:56', 0, 'True'),
(19, 'swapnali nimbalkar', 'swapnali@sungare.com', 'female', 'Builder', 'Pune', '9730816139', 'swapnali', 'swapnasli', '2016-09-14 22:26:43', 0, 'True'),
(20, 'Komal Shinde', 'maulikrupadas12@gmail.com', 'female', 'Owner', 'Pune', '9403112923', '123', '123', '2016-09-14 22:55:31', 0, 'True'),
(21, 'Paradise Group', 'avinash.sungare@gmail.com', 'male', 'Builder', 'Mumbai', '9960651112', 'sungare', 'sungare', '2016-09-16 23:16:58', 0, 'True'),
(22, 'NAKSHATRA', 'homeplanetary@gmail.com', 'male', 'Builder', 'Pune', '9545777067', '123', '123', '2016-09-20 04:57:22', 0, 'True'),
(23, 'shyam', 'magarsham@hotmail.com', 'male', 'Builder', 'Pune', '9168077581', 'Omganesha', 'Omganesha', '2016-09-29 10:22:44', 0, 'True'),
(24, 'smita parlikar', 'smita.sungare@gmail.com', 'female', 'Owner', 'Pune', '9876789876', 'smita123', 'smita123', '2016-11-10 15:33:42', 0, 'True'),
(25, 'customer', 'customer@gmail.com', 'female', 'Customer', 'Pune', '7777777777', 'cust123', 'cust123', '2016-11-17 09:48:25', 0, 'True'),
(26, 'customer2', 'customer2@gmail.com', 'male', 'Customer', 'Mumbai', '8888888888', 'cust123', 'cust123', '2016-11-17 10:06:20', 0, 'True'),
(27, 'customer3', 'customer3@gmail.com', 'male', 'Customer', 'Banglore', '2222222222', 'cust123', 'cust123', '2016-11-17 10:11:55', 0, 'True');

-- --------------------------------------------------------

--
-- Table structure for table `temp_members_db`
--

CREATE TABLE `temp_members_db` (
  `confirm_code` varchar(100) NOT NULL,
  `property_name` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `landmark` varchar(100) NOT NULL,
  `property_type` varchar(50) NOT NULL,
  `transaction_type` varchar(50) NOT NULL,
  `bedroom` varchar(50) NOT NULL,
  `possession` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `area_sqft` varchar(20) NOT NULL,
  `rate_sqft` varchar(20) NOT NULL,
  `floor_no` varchar(20) NOT NULL,
  `amenities` varchar(1000) NOT NULL,
  `airport` varchar(100) NOT NULL,
  `train` varchar(100) NOT NULL,
  `bustop` varchar(100) NOT NULL,
  `school` varchar(100) NOT NULL,
  `hospital` varchar(100) NOT NULL,
  `resto` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `property_details` varchar(3000) NOT NULL,
  `photos` varchar(5000) NOT NULL,
  `name` varchar(50) NOT NULL,
  `owner_type` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mob` varchar(20) NOT NULL,
  `landline` varchar(50) NOT NULL,
  `about_builder` varchar(3000) NOT NULL,
  `logo` varchar(5000) NOT NULL,
  `date` date NOT NULL,
  `user_id` varchar(45) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `temp_members_db`
--

INSERT INTO `temp_members_db` (`confirm_code`, `property_name`, `city`, `locality`, `address`, `landmark`, `property_type`, `transaction_type`, `bedroom`, `possession`, `price`, `area_sqft`, `rate_sqft`, `floor_no`, `amenities`, `airport`, `train`, `bustop`, `school`, `hospital`, `resto`, `bank`, `property_details`, `photos`, `name`, `owner_type`, `email`, `mob`, `landline`, `about_builder`, `logo`, `date`, `user_id`) VALUES
('798015743be4dc789c4b244ef8569aae', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'image/', '', 'Select', '', '7588521204', '', '', 'image/', '2016-09-25', NULL),
('f092d3f1d23b3cc47fe8c76e214821d4', 'qqqq', 'qqqq', 'qqqqq', '', '', 'Residential', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'image/', '', 'Select', '', '7588521204', '', '', 'image/', '2016-09-25', NULL),
('4f073a5e4a50c33a5c86038895c9b34a', 'xyz', 'Pune', 'Baner', 'pune', '', 'Commercial', 'Buy', '1BHK', '10-11-2016', '100000', '450', '230', '2', 'Power backup, Intercom Facility, Fire Alarm, Lift, Service Lift, Reserved parking, Conference Room, Security Personal, High Speed Internet', '10', '2', '3', '5', '2', '6', '1', 'sdfdsfsdfsd dfsdfsdfsdfsdfsfdsfs', 'image/3_nice_bikes-1920x1080.jpg', 'saadsad', 'Owner', 'ass@fff.com', '9403112916', '6767657567567567', 'erewrewrewrwe', 'image/download.jpg', '2016-11-10', NULL),
('d336202979e403a450e025bc5b07e193', 'sddsadasd', 'Pune', 'dfdsfsdfsd', 'dsfdsf', '', 'Commercial', 'Buy', '', 'dsfsdfs', '4543', '43', '4554', '', 'Power backup', '', '', '', '', '', '', '', '', 'image/a1.jpg', '', 'Owner', 'dfsd@dfd.com', '9403112916', '', '', 'image/941209_242966375845639_612492701_n.jpg', '2016-11-10', NULL),
('1607ee9f638cea956742df1a6ca0fab8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'image/', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '', '', 'image/', '2016-11-24', '14'),
('e468d6f87e8bf2136c40702c2bcc4fa4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'image/', 'Priyanka', 'Builder', 'priyanka@hotmail.com', '9403112916', '', '', 'image/', '2016-11-24', '14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_posting`
--
ALTER TABLE `add_posting`
  ADD PRIMARY KEY (`property_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `advertise_req`
--
ALTER TABLE `advertise_req`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`enq_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `property_id` (`property_id`);

--
-- Indexes for table `post_requirement`
--
ALTER TABLE `post_requirement`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `property_views`
--
ALTER TABLE `property_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_posting`
--
ALTER TABLE `add_posting`
  MODIFY `property_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `advertise_req`
--
ALTER TABLE `advertise_req`
  MODIFY `a_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `c_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `enq_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `img_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;
--
-- AUTO_INCREMENT for table `post_requirement`
--
ALTER TABLE `post_requirement`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `property_views`
--
ALTER TABLE `property_views`
  MODIFY `id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
