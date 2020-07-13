-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2018 at 11:22 PM
-- Server version: 10.2.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6222655_blend`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(20) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `src`, `alt`, `text`) VALUES
(1, 'slike/about1.png', 'Coffe 1', 'Since the doors first opened in 1887 coffee and tea have dominated the shops atmosphere. Today, 130 years later, Coffe Store Blend has evolved into one of the worlds best known and leading suppliers of coffee. Offering a choice of over 80 coffees from around the world. The list continues to grow as we continue to source speciality coffee from small corners of the world. We also pride ourselves on sourcing original, delicious and fine confectionery.'),
(2, 'slike/about2.jpg', 'Coffe 2', 'There is also a large variety of domestic coffee makers.\r\n\r\nThe shop still retains some original features, the wooden shelves along the walls, the original wooden counter and display case. If you are in the area please come and visit us. You may also like to join us for a coffee.'),
(3, 'slike/about3.jpg', 'Coffe 3', 'If ever there is something that you cannot find please contact us as we may have something in store that is not featured online.');

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(10) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `src`, `alt`, `text`) VALUES
(1, 'slike/1529366057canva-photo-editor.png', 'Author', 'My name is David Carevć. I\'m 4th year student at Viskoa ICT,Belgrade. This website was made as school project and is meant to showcase my current skillset when it comes to web programming.\r\n					 It was made using HTML, CSS, JS (and Jquery), PHP, AJAX.	Most of the content of the website is being pulled from a database for easier maniuplation and updating.\r\n					 The reason why I chose a coffee store as the theme for the website is simply because I\'m a huge fan of different coffee blends and I tend to like trying out different and exotic brands of coffee.\r\n					 I hope you enjoy the website and please rate it via the poll.');

-- --------------------------------------------------------

--
-- Table structure for table `home_image`
--

CREATE TABLE `home_image` (
  `id` int(20) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_image`
--

INSERT INTO `home_image` (`id`, `src`, `alt`) VALUES
(1, 'slike/CoffeeHome1.jpg', 'Coffee Home 1'),
(2, 'slike/CoffeeHome2.jpg', 'Coffee Home 2'),
(3, 'slike/CoffeeHome3.jpg', 'Coffee Home 3');

-- --------------------------------------------------------

--
-- Table structure for table `home_text`
--

CREATE TABLE `home_text` (
  `id` int(10) NOT NULL,
  `text` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `home_text`
--

INSERT INTO `home_text` (`id`, `text`) VALUES
(1, 'Are you a fan of coffee? Like trying out differnt types of coffee?'),
(2, 'Look no further, here we offer you the best blends of coffee you can find for a cheap price.'),
(3, 'Please create your account and see what we have to offer.');

-- --------------------------------------------------------

--
-- Table structure for table `nav`
--

CREATE TABLE `nav` (
  `id` int(10) NOT NULL,
  `href` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nav`
--

INSERT INTO `nav` (`id`, `href`, `name`, `type`) VALUES
(1, 'index.php?page=home', 'Home', 1),
(2, 'index.php?page=about', 'About us', 1),
(3, 'index.php?page=shop', 'Shop', 2),
(4, 'index.php?page=user', 'User', 4),
(5, 'index.php?page=admin', 'Admin', 5),
(6, 'index.php?page=contact', 'Contact', 2),
(7, 'index.php?page=author', 'Author', 2),
(8, 'logout.php', 'Log Out', 2),
(9, 'index.php?page=reg', 'Register', 3),
(10, '#', 'Log In', 3),
(11, 'dokumentacija.pdf', 'Documentation', 2);

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `id` int(10) NOT NULL,
  `vote_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`id`, `vote_name`) VALUES
(1, 'Very Bad'),
(2, 'Bad'),
(3, 'Good'),
(4, 'Very Good'),
(5, 'Excellent');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(20) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `src` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumb` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `src`, `thumb`, `title`, `price`, `description`) VALUES
(1, 'slike/shop/Affogato.jpg', 'slike/thumbnails/affogato.jpg', 'Affogato', 2, 'An affogato is a simple dessert coffee that is treat during summer and after dinner. It is made by placing one big scoope of vanilla ice cream within a single or double shot of espresso'),
(2, 'slike/shop/Espresso.jpg', 'slike/thumbnails/espresso.jpg', 'Espresso', 1, 'The espresso (aka “short black”) is the foundation and the most important part to every espresso based drink'),
(3, 'slike/shop/LongMacchiato.jpg', 'slike/thumbnails/long-macchiato.jpg', 'Long Macchiato', 3, 'A long macchiato is the same as a short macchiato but with a double shot of espresso. The same rule of thirds applies in the traditionally made long macchiato'),
(4, 'slike/shop/LongBlack.jpg', 'slike/thumbnails/long-black.jpg', 'Americano', 2, 'A long black (aka “americano”) is hot water with an espresso shot extracted on top of the hot water'),
(5, 'slike/shop/Piccolo.jpg', 'slike/thumbnails/piccolo-latte.jpg', 'Piccolo Latte', 3, 'A piccolo latte is a café latte made in an espresso cup. This means it has a very strong but mellowed down espresso taste thanks to the steamed milk and micro foam within it. There are two ways of making a piccolo latte, with either 1 espresso shot or 1 ristretto shot'),
(6, 'slike/shop/Ristretto.jpg', 'slike/thumbnails/ristretto.jpg', 'Ristretto', 2, 'A ristretto is an espresso shot that is extracted with the same amount of coffee but half the amount of water. The end result is a more concentrated and darker espresso extraction');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idRole` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `lastname`, `idRole`) VALUES
(1, 'admin', 'f949d7ba0bbd24214b186df7154f48f2', 'david.carevic.159.14@ict.edu.rs', 'David', 'Carevic', 1),
(27, 'David', '172522ec1028ab781d9dfd17eaca4427', 'david@david.com', 'David', 'David', 2),
(30, 'Nex95', '0d4e3eb97b434fce188ce85215f875db', 'nemanja@nemanja.com', 'Nemanja', 'Milic', 2),
(31, 'Strahinja', '4096fbf8691f74ce95fbc675869a38fa', 'strahinja1@strahinja.com', 'Strahinja', 'Mikic', 2),
(32, 'Marko', 'c28aa76990994587b0e907683792297c', 'marko1@marko.com', 'Marko', 'Marko', 2),
(33, 'Milica', '932e512d0da2821efe2b81539f0b82c5', 'milica@milica.com', 'Milica', 'Milica', 2),
(34, 'Marija', 'cb74c183402afe708a490f0048af6e41', 'maja@maja.com', 'Marija', 'Marija', 2),
(38, 'Mirko', '13592f2caf86af30572a825229a2a8dc', 'mirko@mirko.co', 'Mirko', 'Mirko', 2),
(39, 'Borka', '1e0fa2162b09107c463a2ad4157743cb', 'borka@borka.com', 'Borka', 'Borka', 2),
(47, 'Katarina', 'fe5648c1e094d163e68b8bc36ef84254', 'kata@kata.com', 'Katarina', 'Katarina', 1),
(62, 'Dex56', '8ffcafda621ae99733b9dec51a52d5b5', 'dex565@gmaill.com', 'Dex', 'Dexai', 2),
(63, 'max95', 'ec8ad9b53bcc4ddf5859138f06081251', 'max95@max.com', 'Max', 'Maximus', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_poll`
--

CREATE TABLE `user_poll` (
  `id_user` int(50) NOT NULL,
  `id_vote` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_poll`
--

INSERT INTO `user_poll` (`id_user`, `id_vote`) VALUES
(1, 5),
(30, 5),
(27, 4),
(31, 1),
(32, 3),
(33, 4),
(34, 5),
(38, 2),
(62, 5),
(63, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_image`
--
ALTER TABLE `home_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_text`
--
ALTER TABLE `home_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nav`
--
ALTER TABLE `nav`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idRole` (`idRole`);

--
-- Indexes for table `user_poll`
--
ALTER TABLE `user_poll`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_user_2` (`id_user`),
  ADD KEY `id_vote` (`id_vote`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `home_image`
--
ALTER TABLE `home_image`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_text`
--
ALTER TABLE `home_text`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nav`
--
ALTER TABLE `nav`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`idRole`) REFERENCES `role` (`id`);

--
-- Constraints for table `user_poll`
--
ALTER TABLE `user_poll`
  ADD CONSTRAINT `user_poll_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_poll_ibfk_2` FOREIGN KEY (`id_vote`) REFERENCES `poll` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
