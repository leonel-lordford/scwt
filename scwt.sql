-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 03, 2017 at 10:36 PM
-- Server version: 5.5.54-0+deb8u1
-- PHP Version: 5.6.29-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scwt`
--

-- --------------------------------------------------------

--
-- Table structure for table `accommodation`
--

CREATE TABLE IF NOT EXISTS `accommodation` (
`id` int(11) NOT NULL,
  `cover_image` text COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `english_name` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `price` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `accommodation`
--

INSERT INTO `accommodation` (`id`, `cover_image`, `name`, `english_name`, `price`, `description`) VALUES
(1, 'assets/imgs/accommodations/rincon_del_cielo.png', 'Rincón del Cielo', 'Sky Nook', '$20 to $50 CUC', ' Less than one block to the central park of Santa Clara "Rincón del Cielo" is a comfortable "hostal" (lodging house). With a beautiful view of the old city, and "Luis Estevez" street, one of the most popular walks. Surrounded by banks, restaurants and just 15m to the Boulevard.'),
(2, 'assets/imgs/accommodations/colibri_azul.png', 'Colibrí Azul', 'Blue Humming-Bird', '$25 to $35', ' Near to the central park of Santa Clara "Colibrí Azul" is a magic "hostal" (lodging house). Made in a colonial house has marvelous room and interior yard. You can interact with family food business and the Labiofam pharmacy.'),
(3, 'assets/imgs/accommodations/ochun_yemaya_hostal.png', 'Ochún - Yemayá', 'No Translation - folkloric name', '$35 to $45', 'Located in the city of Trinidad this is a very traditional place. Include bar and restaurant with a bohemian climate.');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `name` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `username` varchar(64) COLLATE latin1_spanish_ci NOT NULL,
  `password` varchar(64) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci COMMENT='user/pass inicial md5(scwt)';

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'scwt', 'e9f4f62afa36c1453b13b263c210893e', 'e9f4f62afa36c1453b13b263c210893e');

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE IF NOT EXISTS `carousel` (
`id` int(11) NOT NULL,
  `image` text COLLATE latin1_spanish_ci NOT NULL,
  `main_text` text COLLATE latin1_spanish_ci NOT NULL,
  `secondary_text` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `image`, `main_text`, `secondary_text`) VALUES
(1, 'assets/imgs/carousel/Santa_Clara2a.png', 'Free guiding & help in managing your stay', 'Know the real Cuba by the hand of its protagonists!'),
(2, 'assets/imgs/carousel/Habana2a.png', 'Share with our family', 'Welcome at the airport, feel the Cuban warmness'),
(3, 'assets/imgs/carousel/Trinidad2a.png', 'Twenty hours of cultural exchange', 'Let''s share news about our countries and families!');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL,
  `name` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(65) COLLATE latin1_spanish_ci NOT NULL,
  `comment` longtext COLLATE latin1_spanish_ci NOT NULL,
  `verification_code` varchar(32) COLLATE latin1_spanish_ci NOT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `comment`, `verification_code`, `verified`) VALUES
(1, 'jjj', 'n@j.m', 'knn', 'agmD8VIl9CXbU7ecT6AZhijw3QyvRdnK', 0),
(2, 'Abel', 'sorice@scwt.com', 'Texto de prueba...', 'wtjpW0s8FJoeCgP5GxXQn7au1NcV9zmE', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
`id` int(11) NOT NULL,
  `image` text COLLATE latin1_spanish_ci NOT NULL,
  `opinion` text COLLATE latin1_spanish_ci NOT NULL,
  `author` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `image`, `opinion`, `author`) VALUES
(1, 'assets/imgs/friends/20160421_Alessandra.png', '"Thank you very much for everything! For opening the doors of your home, heart and family. Cuba wouldn''t have been the same without you, guys. Thank you for taking care of me and helping me in everything"', 'Alessandra Feruglio'),
(2, 'assets/imgs/friends/20160921_Leo.png', 'I felt loved by you, and glad with the city tours. The travel was worth every second. I will return with my girlfriend to wander about the city of Santa Clara.', 'Leonel Salazar');

-- --------------------------------------------------------

--
-- Table structure for table `static_images`
--

CREATE TABLE IF NOT EXISTS `static_images` (
`id` int(11) NOT NULL,
  `overview_img_welcome` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_img_transport` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_img_accommodation` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_img_tours` text COLLATE latin1_spanish_ci NOT NULL,
  `contact_img_yanet` text COLLATE latin1_spanish_ci NOT NULL,
  `contact_img_abel` text COLLATE latin1_spanish_ci NOT NULL,
  `contact_img_jane` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `static_images`
--

INSERT INTO `static_images` (`id`, `overview_img_welcome`, `overview_img_transport`, `overview_img_accommodation`, `overview_img_tours`, `contact_img_yanet`, `contact_img_abel`, `contact_img_jane`) VALUES
(1, 'assets/imgs/overview/u9JfjFg5.png', 'assets/imgs/overview/pJR7Lfb3.png', 'assets/imgs/overview/accommodation3a.png', 'assets/imgs/overview/tours2a.png', 'assets/imgs/contact/yanet2a.png', 'assets/imgs/contact/abel2a.png', 'assets/imgs/contact/0sUhdzOb.png');

-- --------------------------------------------------------

--
-- Table structure for table `static_text`
--

CREATE TABLE IF NOT EXISTS `static_text` (
`id` int(11) NOT NULL,
  `overview` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_welcome` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_transport` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_accommodation` text COLLATE latin1_spanish_ci NOT NULL,
  `overview_tours` text COLLATE latin1_spanish_ci NOT NULL,
  `stories` text COLLATE latin1_spanish_ci NOT NULL,
  `friends` text COLLATE latin1_spanish_ci NOT NULL,
  `address` text COLLATE latin1_spanish_ci NOT NULL,
  `phone` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `email` varchar(60) COLLATE latin1_spanish_ci NOT NULL,
  `contact_info_yanet` text COLLATE latin1_spanish_ci NOT NULL,
  `contact_info_abel` text COLLATE latin1_spanish_ci NOT NULL,
  `contact_info_jane` text COLLATE latin1_spanish_ci NOT NULL,
  `transport` text COLLATE latin1_spanish_ci NOT NULL,
  `accommodation` text COLLATE latin1_spanish_ci NOT NULL,
  `tours` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `static_text`
--

INSERT INTO `static_text` (`id`, `overview`, `overview_welcome`, `overview_transport`, `overview_accommodation`, `overview_tours`, `stories`, `friends`, `address`, `phone`, `email`, `contact_info_yanet`, `contact_info_abel`, `contact_info_jane`, `transport`, `accommodation`, `tours`) VALUES
(1, 'This website is a family site for international cultural exchange. Our experience with friends and clients helped us figure out the needs of Cuba''s visitors. So our main goal is to help foreign friends who come to Cuba with basic and important things like lodging, transport, language barriers, free tours by means of this website about the real Cuba from our point of view.', 'We welcome you at the airport. Quick exchange on how to have a happy stay in Cuba.', 'How to go from airport to "casa particular" in the city? How to go around the city?', 'Where to stay? A small hotel in the heart of the Cuban family!', 'Discover the real Cuba. Walk with us through our reality!', 'Never miss a story, live them with us.', 'Our friends are important to us and we listen to them always.', 'Calle B #13, e/ Maleza y 7ma, <p>Santa Clara, Villa Clara, Cuba. CP 85300.</p>', '+5353981601', 'info@santaclarawalkingtour.com', 'English, French and Italian professional interpreter. Digital journal translator and today tour guide at Cayo Santa María Tourist Resort in Villa Clara.', 'Python scientist, college professor for 12 years, now dedicated to Python technologies for language processing.', 'Yanet and Abel''s daughter! 6 years old, she likes to play for hours. Drawing skills for communication. Loves making new friends like us. We are encouraging her to learn English.', 'All you need to know about the kind of transport you can use during your trip.', 'Know and select the "Casa Particular" of your interest. Just very Cuban friendly "hostals" (lodging house) are listed. All checked!', 'Walk with us across the cities and its singularities.');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE IF NOT EXISTS `stories` (
`id` int(11) NOT NULL,
  `title` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `summary` varchar(600) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `cover_image` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `title`, `summary`, `description`, `cover_image`) VALUES
(1, 'Ireland knock, knock', 'I was heading home from the school where I was teaching at the time when I saw him. He was on a corner and seemed indecisive so I dared to ask: "Hi, are you looking for something?". Sean O''Halloran, from Ireland, looked definitely relieved of having finally found someone who spoke his language. "Yes, I''m looking for a casa particular where I could stay the night". So I took him to one and he asked me later if I was free the next day and if I could show him some interesting places in Santa Clara. He gave us this wonderful idea of creating the website.', '', 'assets/imgs/stories/IMG_6664.JPG'),
(2, 'Sharing with West Canada', 'Leo and Margaret are two of our first Canadian friends. They come from Vancouver. Nice, humble, and talkative like us. Their last visit had been 10 years ago. We met them while selling souvenirs in a craft market in Cayo Santa Maria. Now old and intrigued they ask a lot about the new Cuban reality. We share a lot, and today we are still communicating. They want to come back in the near future.', '', 'assets/imgs/stories/20160216_Margaret_and_Leo.JPG'),
(3, 'Italy, surprise!', 'Alessa came to Cuba after 3 months in Brazil. Her family had come here with the idea of seeing "the last of Cuba"; but new Cuba-US relations have changed nothing! Then we taught how her to travel across Cuba with very few resources. She returned with a big picture of our reality and good wishes. After exchanging experiences from her journey here and her vision about everything, we learned many things about our own country.', '', 'assets/imgs/stories/che_phrase.png');

-- --------------------------------------------------------

--
-- Table structure for table `stories_gallery`
--

CREATE TABLE IF NOT EXISTS `stories_gallery` (
`id` int(11) NOT NULL,
  `id_story` int(11) NOT NULL,
  `thumbnail` text COLLATE latin1_spanish_ci NOT NULL,
  `image` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tours`
--

CREATE TABLE IF NOT EXISTS `tours` (
`id` int(11) NOT NULL,
  `weight` int(11) NOT NULL DEFAULT '1',
  `cover_image` text COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL,
  `brochure` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `tours`
--

INSERT INTO `tours` (`id`, `weight`, `cover_image`, `name`, `description`, `brochure`) VALUES
(1, 0, 'assets/imgs/tours/IMG_6679.JPG', 'Welcome Day', 'When you arrive to a new country you need someone of your trust with knowledge of the place. We wait for you at the Santa Clara airport. After a little meeting of presentation we share with you all the global details of our city. After that we will show you the transportations, and finally accompany you to the "casa particular".', 'assets/pdfs/Tour_01_Reception.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE IF NOT EXISTS `transport` (
`id` int(11) NOT NULL,
  `cover_image` text COLLATE latin1_spanish_ci NOT NULL,
  `name` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `description` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`id`, `cover_image`, `name`, `description`) VALUES
(1, 'assets/imgs/transports/bicitaxi1.png', 'Bicitaxi', 'Bicycle Taxi. Is an adapted bicycle for short travels inside the city. Their maximum capacity are two persons. Fresh air, a good view of the road are their best qualities.'),
(2, 'assets/imgs/transports/almendron1.png', 'Almendrón ("carro americano")', 'Also known as "Máquina" (machine), this cars are original pieces of the fifths. You can pick this kind of cars with air-conditioner, music, and other features. Specials for 50km travels.');

-- --------------------------------------------------------

--
-- Table structure for table `transport_gallery`
--

CREATE TABLE IF NOT EXISTS `transport_gallery` (
`id` int(11) NOT NULL,
  `id_transport` int(11) NOT NULL,
  `thumbnail` text COLLATE latin1_spanish_ci NOT NULL,
  `image` text COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accommodation`
--
ALTER TABLE `accommodation`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_images`
--
ALTER TABLE `static_images`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `static_text`
--
ALTER TABLE `static_text`
 ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `stories_gallery`
--
ALTER TABLE `stories_gallery`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_story` (`id_story`);

--
-- Indexes for table `tours`
--
ALTER TABLE `tours`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transport_gallery`
--
ALTER TABLE `transport_gallery`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id_transport` (`id_transport`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accommodation`
--
ALTER TABLE `accommodation`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `static_images`
--
ALTER TABLE `static_images`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `static_text`
--
ALTER TABLE `static_text`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `stories_gallery`
--
ALTER TABLE `stories_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tours`
--
ALTER TABLE `tours`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `transport_gallery`
--
ALTER TABLE `transport_gallery`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `stories_gallery`
--
ALTER TABLE `stories_gallery`
ADD CONSTRAINT `stories_gallery_ibfk_1` FOREIGN KEY (`id_story`) REFERENCES `stories` (`id`);

--
-- Constraints for table `transport_gallery`
--
ALTER TABLE `transport_gallery`
ADD CONSTRAINT `transport_gallery_ibfk_1` FOREIGN KEY (`id_transport`) REFERENCES `transport` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
