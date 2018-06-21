-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2015 at 10:14 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `starhirecar`
--

-- --------------------------------------------------------

--
-- Table structure for table `shc_article`
--

CREATE TABLE IF NOT EXISTS `shc_article` (
  `id_article` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `text` text NOT NULL,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_article`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `shc_article`
--

INSERT INTO `shc_article` (`id_article`, `title`, `text`, `date_add`) VALUES
(5, 'a3', 't3', '2015-01-14 20:25:19'),
(3, 'a1', 't1', '2015-01-14 20:24:51'),
(4, 'a2', 't2', '2015-01-14 20:24:58'),
(6, 'a4', 't4', '2015-01-14 20:25:21');

-- --------------------------------------------------------

--
-- Table structure for table `shc_car`
--

CREATE TABLE IF NOT EXISTS `shc_car` (
  `id_car` int(11) NOT NULL AUTO_INCREMENT,
  `car_title` varchar(250) NOT NULL,
  `car_link` varchar(50) NOT NULL,
  `car_category` int(11) NOT NULL,
  `car_price` int(11) NOT NULL,
  `car_text` text,
  `car_params` text,
  `car_extra` text,
  `date_add` datetime NOT NULL,
  PRIMARY KEY (`id_car`),
  KEY `car_category` (`car_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `shc_car`
--

INSERT INTO `shc_car` (`id_car`, `car_title`, `car_link`, `car_category`, `car_price`, `car_text`, `car_params`, `car_extra`, `date_add`) VALUES
(1, 'Lexus RX270', 'lexus-rx270', 1, 245, 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'a:3:{s:13:"Engine volume";s:4:"2458";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:9:"img_cover";s:59:"http://starhirecar/smarty/templates/images/cars_list/c2.jpg";}', '2014-11-30 17:04:17'),
(2, 'BMW 520i Turbo', 'bmw-520i-turbo', 1, 199, 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'a:3:{s:13:"Engine volume";s:4:"2458";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:6:"slider";a:2:{s:13:"1419187733986";s:28:"/uploads/cars/1f819c9cdd.jpg";s:13:"1419187745832";s:28:"/uploads/cars/7d24f6b730.jpg";}}', '2014-11-30 20:11:02'),
(3, 'Honda Skyline GTR', 'honda-skyline-gtr', 2, 352, 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'a:3:{s:13:"Engine volume";s:4:"2008";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:9:"img_cover";s:59:"http://starhirecar/smarty/templates/images/cars_list/c3.jpg";}', '2014-12-01 20:43:48'),
(4, 'Chevrolete X3', 'chevrolete-x3', 2, 200, 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'a:3:{s:13:"Engine volume";s:4:"1900";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:9:"img_cover";s:59:"http://starhirecar/smarty/templates/images/cars_list/c4.jpg";}', '2014-12-01 20:45:44'),
(17, 'Audi Q7', 'audi-q7', 2, 300, 'This X-Demonstrator 2013 Audi Q7 TDI quattro is well equipped! It features the Panoramic Sunroof and 3rd row seating, Bose Premium Audio, Black Styling Trim and Technik Package. Along with several standard features such as an 8-speed Automatic transmission, quattro all-wheel drive, and Audi MMI Interface; this Q7 has the versatility and spacious cargo to meet the demand of your needs and desires; especially when paired with the Efficient yet Powerful TDI engine. Take advantage of these exceptional savings with less than 2,500KM.', '', 'a:1:{s:6:"slider";a:4:{s:13:"1419169913685";s:28:"/uploads/cars/d2c0285d75.jpg";s:13:"1419169917595";s:28:"/uploads/cars/0f997d8947.jpg";s:13:"1419169919503";s:28:"/uploads/cars/69e845da67.jpg";s:13:"1419169923373";s:28:"/uploads/cars/e63d8f1680.jpg";}}', '2014-12-21 00:00:00'),
(18, 'Audi S5 quattro', 'audi-s5', 2, 250, 'The Audi S5 Coupe boasts its style with finely engineered substance. Hear the roar from the 4.2 V8 Engine and feel pure confident handling, thanks to Audi''s quattro All-Wheel Drive System. The S5 stands apart with its wide stance and muscular lines. Equipped with the quattro trim and optioned with Navigation and Carbon Interior Inlays.', 'a:3:{s:13:"Engine volume";s:3:"300";s:8:"Gear box";s:7:"automat";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:6:"slider";a:4:{s:13:"1419173032962";s:28:"/uploads/cars/aafe7fbd53.jpg";s:13:"1419173035821";s:28:"/uploads/cars/f6da6ee7fd.jpg";s:13:"1419173037926";s:28:"/uploads/cars/cfebf06c0f.jpg";s:13:"1419173039621";s:28:"/uploads/cars/6ca508ca09.jpg";}}', '2014-12-21 00:00:00'),
(19, 'Aston Martin Vanquish', 'aston-martin-vanquish', 1, 299, 'ASTON MARTIN VANQUISH V 12 Zylinder, 6 liter, eines der letzten in Handarbeit gebauten Modelle, mit der Nr 106 Coupe, 2 Plus 2 f&#252;r 4 Personen zugelassen.Besichtigung auch an den Wochenenden nach Termin Legen Sie Ihr Geld gut an, bei der geringen St&#252;ckzahlen wird der Wagen sicherlich mit den Jahren an Wert zulegen, ein zuk&#252;nftige Klassiker, f&#252;r den Aston Martin Fan`sDEUTSCHES AUTO', 'a:3:{s:13:"Engine volume";s:3:"850";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:6:"slider";a:4:{s:13:"1419178788706";s:28:"/uploads/cars/83058cf22c.jpg";s:13:"1419178791558";s:28:"/uploads/cars/075e0e7bd1.jpg";s:13:"1419178793546";s:28:"/uploads/cars/f38f2d04b0.jpg";s:13:"1419178795403";s:28:"/uploads/cars/4fd3780819.jpg";}}', '2014-12-21 00:00:00'),
(20, 'BMW x6', 'bmw-x6', 3, 150, 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.', 'a:3:{s:13:"Engine volume";s:3:"300";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:6:"slider";a:4:{s:13:"1419179104636";s:28:"/uploads/cars/bbbe90f80b.jpg";s:13:"1419179108087";s:28:"/uploads/cars/045c17dd50.jpg";s:13:"1419179109858";s:28:"/uploads/cars/f20fa4987a.jpg";s:13:"1419179112227";s:28:"/uploads/cars/109f6297f9.jpg";}}', '2014-12-21 00:00:00'),
(21, 'Mitsubishi Lancer EvoX', 'mitsubishi-lancer-evo-x', 2, 125, 'Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna.', 'a:3:{s:13:"Engine volume";s:3:"405";s:8:"Gear box";s:6:"manual";s:4:"Fuel";s:6:"diesel";}', 'a:1:{s:6:"slider";a:4:{s:13:"1419179500349";s:28:"/uploads/cars/5a1a8a86df.jpg";s:13:"1419179502956";s:28:"/uploads/cars/ff4fca0184.jpg";s:13:"1419179504810";s:28:"/uploads/cars/0acda0f6f9.jpg";s:13:"1419179506816";s:28:"/uploads/cars/74b30feab6.jpg";}}', '2014-12-21 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `shc_car_params`
--

CREATE TABLE IF NOT EXISTS `shc_car_params` (
  `id_param` int(11) NOT NULL AUTO_INCREMENT,
  `param_title` varchar(200) NOT NULL,
  PRIMARY KEY (`id_param`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shc_car_params`
--


-- --------------------------------------------------------

--
-- Table structure for table `shc_category`
--

CREATE TABLE IF NOT EXISTS `shc_category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) NOT NULL,
  `category_text` text,
  `category_link` varchar(50) NOT NULL,
  `category_image` text,
  PRIMARY KEY (`id_category`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `shc_category`
--

INSERT INTO `shc_category` (`id_category`, `category_name`, `category_text`, `category_link`, `category_image`) VALUES
(1, 'Sport', 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'sport', 'http://starhirecar/smarty/templates/images/list-cars-sport.jpg'),
(2, 'Luxury', 'Welcome to Star Car Hire. Rent a car online now from one of our worldwide locations. With over 90 years’ experience in car and van rentals, take advantage of our large vehicle rental selection and make your booking online instantly. With all the best offers and deals on car rental on the website right now, and the option to pay online or upon collection of your car, Hertz is the best place to book your car hire. Start your booking process using the reservation system above or check out latest car rental offers and van hire promotions that are currently available.', 'luxury', 'http://starhirecar/smarty/templates/images/list-cars-sport.jpg'),
(3, 'City car', 'The company that''s famous for excellent customer service, having the most rental locations, and free pick-up, also offers a terrific business rental programme to save you more time and money, as a member you and your employees will receive even more.', 'city-car', NULL),
(4, 'Multi-purpose vehicle', 'Make your way from A to B with car hire in the United Kingdom from Europcar. We have car hire branches all over the country and offer a wide range of makes and models to meet your needs, no matter where you''re off to.\r\n \r\nWhether you''re landing in London for business or exploring the Scottish countryside on holiday, car hire is an easy and affordable way to travel around the UK, giving you the freedom to set your own schedule.', 'multi-purpose-vehicle', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shc_faq`
--

CREATE TABLE IF NOT EXISTS `shc_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `question` text NOT NULL,
  `answer` text NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `shc_faq`
--

INSERT INTO `shc_faq` (`faq_id`, `question`, `answer`) VALUES
(1, 'Where i can find money?', 'At the bank USA.'),
(2, 'Same day reservation', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'),
(3, 'What kind of cars I can rent?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'),
(4, 'Can I get one-way rental?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.'),
(5, 'What is included in my rental?', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.');

-- --------------------------------------------------------

--
-- Table structure for table `shc_offer`
--

CREATE TABLE IF NOT EXISTS `shc_offer` (
  `id_offer` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) NOT NULL,
  `link` varchar(200) NOT NULL,
  `short_text` varchar(150) NOT NULL,
  `full_text` text NOT NULL,
  `date_add` datetime NOT NULL,
  `image` text,
  PRIMARY KEY (`id_offer`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `shc_offer`
--

INSERT INTO `shc_offer` (`id_offer`, `title`, `link`, `short_text`, `full_text`, `date_add`, `image`) VALUES
(10, 'Complimentary third weekend day', 'complimentary-third-weekend-day', 'Excepteur sint occaecat cupidatat non proident.', 'Excepteur sint <b>occaecat </b>cupidatat non proident.', '2015-01-12 23:33:26', '/uploads/offers/bc15944553.jpg'),
(9, 'Nordics: save up to 30%', 'nordics-save-up-to-30', 'By making reservation on this website the discount will automatically calculate.', 'By making reservation on this website the discount will automatically calculate.', '2015-01-12 23:26:34', '/uploads/offers/3f5f4f7a0a.jpg'),
(7, 'BMW 8 Series (E31)', 'bmw-8-series-e31', 'The BMW 8 Series (chassis code: E31) is a Grand Tourer built by BMW from 1989 to 1999 powered by either a V8 or V12 engine.', 'The <b>BMW 8 Series</b> (chassis code: E31) is a Grand Tourer built by BMW from 1989 to 1999 powered by either a V8 or V12 engine. While it did supplant the original E24 based 6 Series in 1991, a common misconception is that the 8 Series was developed as a successor. However, it was actually an entirely new class aimed at a different market, with a substantially higher price and better performance than the 6 series. It was BMW''s flagship car and had an electronically limited top speed of <a href="http://hora.md" target="_blank">155 mph</a> (250 km/h).<br><br><h4>History of development</h4><h6>BMW E31 rear styling</h6>Design of the 8 Series began in 1984, with the final design phase and production development (starting) in 1986. The 8 Series debuted at the Frankfurt Motor Show (IAA) in early September 1989. The 8 Series was designed to move beyond the market of the original 6 Series. The 8 Series however had substantially improved performance, as well as a far higher purchase price.<br><br><b>Over 1.5 billion Deutschemark</b> was spent on total development (2008 USD nearly $1 billion). BMW used CAD tools, still unusual at the time, to design the car''s all-new body. Combined with wind tunnel testing, the resulting car had a drag coefficient of 0.29, a major improvement from the previous BMW M6/635CSi''s 0.39.<br><br>The 8 Series supercar offered the first V-12 engine mated to a 6-speed manual gearbox on a road car. It was also one of the first vehicles to be fitted with an electronic "drive-by-wire" throttle. The 8 Series was one of BMW''s first cars, together with the Z1, to use a multi-link rear axle.', '2015-01-12 23:04:34', '/uploads/offers/c2d57988c0.jpg'),
(8, 'Enjoy a complimentary upgrade', 'enjoy-a-complimentary-upgrade', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', '2015-01-12 23:20:09', '/uploads/offers/aec9d3fe8c.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `shc_users`
--

CREATE TABLE IF NOT EXISTS `shc_users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(30) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_hash` varchar(32) NOT NULL,
  `user_ip` varchar(16) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `shc_users`
--

INSERT INTO `shc_users` (`user_id`, `user_login`, `user_password`, `user_hash`, `user_ip`) VALUES
(1, 'admin', 'c3284d0f94606de1fd2af172aba15bf3', '7694dbde2b57721d426f43cf21158bf4', '127.0.0.1');
