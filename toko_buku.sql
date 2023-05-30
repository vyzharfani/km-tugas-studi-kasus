-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 10:25 AM
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
-- Database: `toko_buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `author_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `author_name`) VALUES
(1, 'Bokuto Uno'),
(2, 'Miya Kazuki'),
(3, 'Mamoru Hosoda'),
(4, 'Akira'),
(5, 'Yu Aida'),
(6, 'Gwon Gyeoeul'),
(7, 'Akiyoshi Rikako'),
(8, 'Minato Kanae'),
(9, 'Eiji Mikage'),
(10, 'Saizou Harawata'),
(11, 'Muneyuki Kaneshiro'),
(12, 'Akasaka Aka'),
(13, 'Emi Ishikawa'),
(14, 'Hisamitsu Ueo'),
(15, 'Kyo Shirodaira'),
(16, 'Sakon Kaidou'),
(17, 'Sakon Kaidou'),
(18, 'Makoto Hoshino');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `isbn` varchar(100) NOT NULL,
  `author_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `language` enum('English','Indonesian') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `isbn`, `author_id`, `publisher_id`, `category_id`, `language`, `price`, `stock`, `image`) VALUES
(1, 'Reign of the Seven Spellblades volume 1', '9781975317195', 1, 1, 1, 'English', '300000.00', 25, 'Reign of the Seven Spellblades Vol 1.jpg'),
(2, 'Reign of the Seven Spellblades volume 2', '9781975317201', 1, 1, 1, 'English', '300000.00', 35, 'Reign of the Seven Spellblades Vol 2.jpg'),
(3, 'Ascendance of a Bookworm Part 1 volume 1', '9781718356009', 2, 2, 1, 'English', '300000.00', 38, 'Ascendance of a Bookworm part 1 v1.jpg'),
(4, 'Wolf Children: Ame & Yuki', '9781975356866', 3, 1, 1, 'English', '350000.00', 10, 'Wolf Children.jpg'),
(5, 'SCP Foundation: Iris Through the Looking Glass', '9781645051770', 4, 3, 1, 'English', '300000.00', 30, 'SCP.jpg'),
(6, 'Gunslinger Girl Omnibus Collection 1', '9781934876923', 5, 3, 2, 'English', '350000.00', 10, 'Gunslinger Girl.jpg'),
(7, 'Villains Are Destined to Die volume 1', '9798400900006', 6, 1, 2, 'English', '350000.00', 15, 'Villains are Destined to Die volume 1.jpg'),
(8, 'Girls in The Dark', '9786025297281', 7, 4, 1, 'English', '85000.00', 23, 'Girls in the Dark.jpg'),
(9, 'Holy Mother', '9786025385810', 7, 4, 1, 'English', '85000.00', 20, 'Holy Mother.jpg'),
(10, 'Confessions', '9786025385889', 8, 4, 1, 'English', '87000.00', 28, 'Confessions.jpg'),
(11, 'The Empty Box and Zeroth Maria volume 1', '9780316561105', 9, 1, 1, 'English', '300000.00', 30, 'Hakomari volume 1.jpg'),
(12, 'Battle Game in 5 Seconds volume 1', '9786020431864', 10, 5, 2, 'English', '28000.00', 15, 'Battle Game in 5 Seconds.jpg'),
(13, 'Blue Lock volume 1', '9786230029974', 11, 5, 2, 'English', '45000.00', 1, 'Blue Lock volume 1.jpg'),
(14, 'Oshi no Ko: Anak Idola volume 1', '9786230305269', 12, 6, 2, 'English', '45000.00', 17, 'Oshi no Ko volume 1.jpg'),
(15, 'Scary Lessons - Reincarnation volume 1', '9786020491387', 13, 5, 2, 'English', '25000.00', 25, 'Scary Lessons 1.jpg'),
(16, 'Kaguya-sama, Love is War volume 1', '9786230301841', 12, 6, 2, 'English', '45000.00', 5, 'Kaguya-sama volume 1.jpeg'),
(17, 'Qualia the Purple', '9781638585749', 14, 3, 1, 'English', '350000.00', 10, 'Qualia the Purple.jpg'),
(18, 'She is More Ordinary Than I Expected volume 1', '9786230033315', 15, 5, 2, 'English', '45000.00', 30, 'Tengai-san 1.jpg'),
(19, 'Spiral: The Bonds of the Reasoning volume 1', '9789792771985', 15, 5, 2, 'Indonesian', '20000.00', 5, 'Spiral 1.jpg'),
(20, 'Spiral: The Bonds of the Reasoning volume 2', '9789792773712', 15, 5, 2, 'Indonesian', '20000.00', 12, 'Spiral 2.jpg'),
(21, 'Infinite Dendrogram volume 1', '9781718355002', 16, 2, 1, 'English', '300000.00', 10, 'Infinite Dendrogram volume 1.jpg'),
(22, 'Infinite Dendrogram volume 2', '9781718355019', 17, 2, 1, 'English', '300000.00', 10, 'Infinite Dendrogram volume 2.jpg'),
(23, 'The Valiant Must Fall volume 1', '9781685793203', 5, 3, 2, 'English', '300000.00', 20, 'The Valiant Must Fall volume 1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Novel'),
(2, 'Comic'),
(3, 'Non-fiction');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(100) NOT NULL,
  `country of origin` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `publisher_name`, `country of origin`) VALUES
(1, 'Yen Press', 'United States'),
(2, 'J-Novel Club', 'United States'),
(3, 'Seven Seas', 'United States'),
(4, 'Penerbit Haru', 'Indonesia'),
(5, 'Elex Media Komputindo', 'Indonesia'),
(6, 'm&c!', 'Indonesia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publisher` (`publisher_id`),
  ADD KEY `fk_id_author` (`author_id`),
  ADD KEY `fk_id_category` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `fk_id_author` FOREIGN KEY (`author_id`) REFERENCES `author` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_category` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_id_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
