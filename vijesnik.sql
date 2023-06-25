-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2023 at 02:57 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vijesnik`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) NOT NULL,
  `prezime` varchar(32) NOT NULL,
  `korisnicko_ime` varchar(32) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `razina`) VALUES
(1, 'Lovre', 'Batinjan', 'lbatinjan', '$2y$10$IZ.GzWj7hFSeLTExneYcCuojl9RcKOxhk6T2voPzoMgr0v.T251L6', 1),
(2, 'Marko', 'Faletar', 'mfaletar', '$2y$10$Jp0FF/Urw/KXN.wMVUsjcOBA2.Ba1eb/36bBRek2/9IhUP.QrnkMy', 0),
(3, 'Karlo', 'Gutert', 'kgutert123', '$2y$10$Ld/Sv/fIxy2JY/OLvnmdZOPKTmZyloytrkjxWMTQmNl1wR9LtFJde', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vijesti`
--

CREATE TABLE `vijesti` (
  `id` int(11) NOT NULL,
  `datum` varchar(32) NOT NULL,
  `naslov` varchar(128) NOT NULL,
  `sazetak` text NOT NULL,
  `tekst` text NOT NULL,
  `slika` varchar(64) NOT NULL,
  `kategorija` varchar(64) NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vijesti`
--

INSERT INTO `vijesti` (`id`, `datum`, `naslov`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(2, '21/06/2023', 'RED BIRB GUMI ON MISSION TO TAKE OVER THE WORLD', '', '<p class=\'p_article\'>Text here...</p>\r\n\r\n<p class=\'p_article\'>Text here...</p>\r\n\r\n<p class=\'p_article\'>Text here...</p>', 'redbirb.jpg', 'sport', 1),
(3, '21/06/2023', 'PS1 HAGRID', 'Hogrid', '<p class=\'p_article\'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean laoreet lectus a justo molestie, a fermentum sem ornare. Suspendisse eu fringilla quam. Proin rutrum sollicitudin nisl at pellentesque. Morbi posuere vehicula bibendum. Nam quam metus, rutrum et enim sit amet, molestie vulputate enim. Cras ornare condimentum justo ac dictum. Aenean interdum libero vel pharetra fermentum. Quisque congue ante venenatis eros dignissim faucibus. Nunc ultricies tincidunt congue. Proin at sagittis neque. Quisque vel nibh ut eros auctor rhoncus. Praesent ac dignissim sapien, auctor mollis nisl. Curabitur ligula sem, pulvinar at blandit id, sollicitudin non nunc. Mauris sit amet eros pretium, molestie diam ac, aliquet quam. Aenean mollis efficitur dapibus.</p>\r\n\r\n<p class=\'p_article\'>Fusce viverra urna vitae ante posuere aliquet. Ut ut ipsum ultrices, fringilla diam in, cursus elit. Duis varius tellus sit amet fringilla blandit. Nunc tincidunt erat sed risus tempus faucibus. Phasellus ut porttitor ipsum. Nunc eget metus vel nisi tincidunt imperdiet. Pellentesque nulla mi, mattis ac libero vel, lacinia condimentum felis. Mauris vehicula risus ac imperdiet molestie. Praesent gravida vulputate mi, id sagittis ligula vestibulum eget. Cras suscipit imperdiet eros, sed pretium diam tincidunt gravida. Curabitur bibendum lobortis ex non mattis.</p>', 'ps1hagrid.jpg', 'muzika', 1),
(4, '22/06/2023', 'STEVEN ADLER: \'LAS VEGAS IS ONE OF THE GREATEST PLACES ON EARTH.\'', 'Steven Adler\'s thoughts on Las Vegas', '<p class=\'p_article\'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor purus eros, sed commodo dui finibus vitae. Ut ut elit nunc. Nam et justo in tortor mollis fringilla molestie eget diam. Ut egestas gravida neque, vitae lacinia est blandit fermentum. Nunc feugiat gravida lacus, a auctor mi euismod nec. Vivamus sit amet mollis erat, nec rhoncus magna. In egestas felis a dolor tincidunt fermentum ut sed leo. Vivamus elementum vehicula nunc. In sed augue in nulla convallis cursus. Nam sollicitudin, ante ut feugiat imperdiet, urna lectus imperdiet nisl, et semper elit justo ac sapien.</p>\r\n\r\n<p class=\'p_article\'>Maecenas lorem erat, egestas a feugiat a, finibus ut ex. Nulla vel risus eget urna consectetur ullamcorper et varius nibh. Curabitur faucibus mi venenatis velit lobortis, at ultrices augue malesuada. Nulla maximus sapien sit amet eros suscipit egestas. Nam rutrum metus eu odio mollis pharetra. Phasellus posuere quam ante, id congue nibh laoreet ut. Quisque sit amet nulla non mi bibendum cursus vitae at urna. Aenean porttitor nibh at felis blandit posuere. Integer pellentesque, orci vitae lobortis malesuada, arcu justo facilisis tortor, sit amet tempus augue sem in enim.</p>\r\n\r\n<p class=\'p_article\'>Donec porta nibh eu nisi imperdiet sollicitudin. Pellentesque dictum et sem eu pharetra. Integer cursus at lacus ac pretium. Fusce sed commodo sapien, ac porttitor ante. Nunc ut finibus neque. Nunc vehicula scelerisque tincidunt. Nunc feugiat risus vel justo tempor convallis. Nunc egestas nisl non dolor bibendum, eget ultricies augue fringilla. Curabitur lobortis iaculis dolor quis faucibus.</p>', 'Steven-Adler.jpg', 'muzika', 0),
(5, '22/06/2023', 'ROBIE WILLIAMS DELIVERS HIS GREATEST HITS AT IOW.', 'Robie Williams delivers a breathtaking spectacle at IOW', '<p class=\'p_article\'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor purus eros, sed commodo dui finibus vitae. Ut ut elit nunc. Nam et justo in tortor mollis fringilla molestie eget diam. Ut egestas gravida neque, vitae lacinia est blandit fermentum. Nunc feugiat gravida lacus, a auctor mi euismod nec. Vivamus sit amet mollis erat, nec rhoncus magna. In egestas felis a dolor tincidunt fermentum ut sed leo. Vivamus elementum vehicula nunc. In sed augue in nulla convallis cursus. Nam sollicitudin, ante ut feugiat imperdiet, urna lectus imperdiet nisl, et semper elit justo ac sapien.</p>\r\n\r\n<p class=\'p_article\'>Maecenas lorem erat, egestas a feugiat a, finibus ut ex. Nulla vel risus eget urna consectetur ullamcorper et varius nibh. Curabitur faucibus mi venenatis velit lobortis, at ultrices augue malesuada. Nulla maximus sapien sit amet eros suscipit egestas. Nam rutrum metus eu odio mollis pharetra. Phasellus posuere quam ante, id congue nibh laoreet ut. Quisque sit amet nulla non mi bibendum cursus vitae at urna. Aenean porttitor nibh at felis blandit posuere. Integer pellentesque, orci vitae lobortis malesuada, arcu justo facilisis tortor, sit amet tempus augue sem in enim.</p>\r\n\r\n<p class=\'p_article\'>Donec nulla justo, suscipit vitae molestie nec, aliquet a erat. Nunc faucibus elit at ullamcorper sagittis. Nulla ac euismod tortor. Morbi et metus sit amet dui elementum finibus. Pellentesque ultricies dolor sem, nec porta est sodales egestas. Cras convallis tincidunt enim in efficitur. Donec interdum nibh justo, ac mollis neque luctus ac. Nullam ut mattis diam, in fringilla dui. Integer consectetur, nulla eget pharetra convallis, ex lectus venenatis lacus, luctus commodo nisi ligula eget justo. Praesent sapien diam, mattis in aliquet sit amet, hendrerit nec mauris. Etiam a enim tempor, faucibus lectus nec, molestie justo. Nulla facilisi. Sed bibendum erat id nunc viverra consectetur. Donec feugiat velit eget ipsum vulputate vestibulum. Mauris egestas tincidunt tellus, vitae accumsan mauris ultrices id.</p>\r\n\r\n<p class=\'p_article\'>Praesent interdum eu tellus vitae laoreet. Nam feugiat suscipit tellus, sed vulputate ante volutpat quis. Integer placerat hendrerit nulla, sed accumsan nunc tempus in. Curabitur tincidunt sapien sed iaculis laoreet. Praesent ex felis, pellentesque commodo vulputate ac, sollicitudin ut metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel quam id elit consequat vulputate eget at arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur fringilla enim quis sem hendrerit dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nunc enim, faucibus id blandit vitae, blandit sed elit. Aenean ac euismod nibh.</p>', 'robie-williams.jpeg', 'muzika', 0),
(6, '22/06/2023', 'SKILLET NEW ALBUM SET TO RELEASE LATE 2023.', 'Skillet\'s John Cooper revealed information regarding their next album release coming out November or December 2023.', '<p class=\'p_article\'>Maecenas lorem erat, egestas a feugiat a, finibus ut ex. Nulla vel risus eget urna consectetur ullamcorper et varius nibh. Curabitur faucibus mi venenatis velit lobortis, at ultrices augue malesuada. Nulla maximus sapien sit amet eros suscipit egestas. Nam rutrum metus eu odio mollis pharetra. Phasellus posuere quam ante, id congue nibh laoreet ut. Quisque sit amet nulla non mi bibendum cursus vitae at urna. Aenean porttitor nibh at felis blandit posuere. Integer pellentesque, orci vitae lobortis malesuada, arcu justo facilisis tortor, sit amet tempus augue sem in enim.</p>\r\n\r\n<p class=\'p_article\'>Donec nulla justo, suscipit vitae molestie nec, aliquet a erat. Nunc faucibus elit at ullamcorper sagittis. Nulla ac euismod tortor. Morbi et metus sit amet dui elementum finibus. Pellentesque ultricies dolor sem, nec porta est sodales egestas. Cras convallis tincidunt enim in efficitur. Donec interdum nibh justo, ac mollis neque luctus ac. Nullam ut mattis diam, in fringilla dui. Integer consectetur, nulla eget pharetra convallis, ex lectus venenatis lacus, luctus commodo nisi ligula eget justo. Praesent sapien diam, mattis in aliquet sit amet, hendrerit nec mauris. Etiam a enim tempor, faucibus lectus nec, molestie justo. Nulla facilisi. Sed bibendum erat id nunc viverra consectetur. Donec feugiat velit eget ipsum vulputate vestibulum. Mauris egestas tincidunt tellus, vitae accumsan mauris ultrices id.</p>\r\n\r\n<p class=\'p_article\'>Donec porta nibh eu nisi imperdiet sollicitudin. Pellentesque dictum et sem eu pharetra. Integer cursus at lacus ac pretium. Fusce sed commodo sapien, ac porttitor ante. Nunc ut finibus neque. Nunc vehicula scelerisque tincidunt. Nunc feugiat risus vel justo tempor convallis. Nunc egestas nisl non dolor bibendum, eget ultricies augue fringilla. Curabitur lobortis iaculis dolor quis faucibus.</p>', 'skillet.jpg', 'muzika', 0),
(7, '22/06/2023', 'CRISTIANO RONALDO SHARES HIS THOUGHTS ON SAUDI ARABIA.', 'Cristiano Ronaldo is satisfied with his new home in Saudi Arabia.', '<p class=\'p_article\'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor purus eros, sed commodo dui finibus vitae. Ut ut elit nunc. Nam et justo in tortor mollis fringilla molestie eget diam. Ut egestas gravida neque, vitae lacinia est blandit fermentum. Nunc feugiat gravida lacus, a auctor mi euismod nec. Vivamus sit amet mollis erat, nec rhoncus magna. In egestas felis a dolor tincidunt fermentum ut sed leo. Vivamus elementum vehicula nunc. In sed augue in nulla convallis cursus. Nam sollicitudin, ante ut feugiat imperdiet, urna lectus imperdiet nisl, et semper elit justo ac sapien.</p>\r\n\r\n<p class=\'p_article\'>Praesent interdum eu tellus vitae laoreet. Nam feugiat suscipit tellus, sed vulputate ante volutpat quis. Integer placerat hendrerit nulla, sed accumsan nunc tempus in. Curabitur tincidunt sapien sed iaculis laoreet. Praesent ex felis, pellentesque commodo vulputate ac, sollicitudin ut metus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vel quam id elit consequat vulputate eget at arcu. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Curabitur fringilla enim quis sem hendrerit dictum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nunc enim, faucibus id blandit vitae, blandit sed elit. Aenean ac euismod nibh.</p>\r\n\r\n<p class=\'p_article\'>Donec porta nibh eu nisi imperdiet sollicitudin. Pellentesque dictum et sem eu pharetra. Integer cursus at lacus ac pretium. Fusce sed commodo sapien, ac porttitor ante. Nunc ut finibus neque. Nunc vehicula scelerisque tincidunt. Nunc feugiat risus vel justo tempor convallis. Nunc egestas nisl non dolor bibendum, eget ultricies augue fringilla. Curabitur lobortis iaculis dolor quis faucibus.</p>', 'cristiano.jpg', 'sport', 0),
(8, '22/06/2023', 'BAYERN WITH AN IMPRESSIVE 4-0 FINISH.', 'Bayern demolishes Borussia Dortmund 4-0, scorers include: (...)', '<p class=\'p_article\'>Donec nulla justo, suscipit vitae molestie nec, aliquet a erat. Nunc faucibus elit at ullamcorper sagittis. Nulla ac euismod tortor. Morbi et metus sit amet dui elementum finibus. Pellentesque ultricies dolor sem, nec porta est sodales egestas. Cras convallis tincidunt enim in efficitur. Donec interdum nibh justo, ac mollis neque luctus ac. Nullam ut mattis diam, in fringilla dui. Integer consectetur, nulla eget pharetra convallis, ex lectus venenatis lacus, luctus commodo nisi ligula eget justo. Praesent sapien diam, mattis in aliquet sit amet, hendrerit nec mauris. Etiam a enim tempor, faucibus lectus nec, molestie justo. Nulla facilisi. Sed bibendum erat id nunc viverra consectetur. Donec feugiat velit eget ipsum vulputate vestibulum. Mauris egestas tincidunt tellus, vitae accumsan mauris ultrices id.</p>\r\n\r\n<p class=\'p_article\'>Donec porta nibh eu nisi imperdiet sollicitudin. Pellentesque dictum et sem eu pharetra. Integer cursus at lacus ac pretium. Fusce sed commodo sapien, ac porttitor ante. Nunc ut finibus neque. Nunc vehicula scelerisque tincidunt. Nunc feugiat risus vel justo tempor convallis. Nunc egestas nisl non dolor bibendum, eget ultricies augue fringilla. Curabitur lobortis iaculis dolor quis faucibus.</p>', 'bayern.jpg', 'sport', 0),
(9, '22/06/2023', 'LAKERS SIGNING A NEW PLAYER, FANS CONFLICTED...', 'Some fans are not happy with Lakers new signings, manager stands his ground saying it was a good decision.', '<p class=\'p_article\'>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tempor purus eros, sed commodo dui finibus vitae. Ut ut elit nunc. Nam et justo in tortor mollis fringilla molestie eget diam. Ut egestas gravida neque, vitae lacinia est blandit fermentum. Nunc feugiat gravida lacus, a auctor mi euismod nec. Vivamus sit amet mollis erat, nec rhoncus magna. In egestas felis a dolor tincidunt fermentum ut sed leo. Vivamus elementum vehicula nunc. In sed augue in nulla convallis cursus. Nam sollicitudin, ante ut feugiat imperdiet, urna lectus imperdiet nisl, et semper elit justo ac sapien.</p>\r\n\r\n<p class=\'p_article\'>Donec porta nibh eu nisi imperdiet sollicitudin. Pellentesque dictum et sem eu pharetra. Integer cursus at lacus ac pretium. Fusce sed commodo sapien, ac porttitor ante. Nunc ut finibus neque. Nunc vehicula scelerisque tincidunt. Nunc feugiat risus vel justo tempor convallis. Nunc egestas nisl non dolor bibendum, eget ultricies augue fringilla. Curabitur lobortis iaculis dolor quis faucibus.</p>', 'nba.jpg', 'sport', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisnicko_ime` (`korisnicko_ime`);

--
-- Indexes for table `vijesti`
--
ALTER TABLE `vijesti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vijesti`
--
ALTER TABLE `vijesti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
