-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2023 at 04:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vac-it`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `vacancy_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `selected` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230824144205', '2023-08-24 16:43:05', 274),
('DoctrineMigrations\\Version20230824155436', '2023-08-24 17:54:48', 99),
('DoctrineMigrations\\Version20230828080317', '2023-08-28 10:04:02', 1462),
('DoctrineMigrations\\Version20230828080758', '2023-08-28 10:08:29', 2198);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `firstname` varchar(70) NOT NULL,
  `lastname` varchar(70) DEFAULT NULL,
  `picture` varchar(255) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `tel_nr` varchar(10) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  `city` varchar(40) NOT NULL,
  `motivation` longtext NOT NULL,
  `cv` varchar(80) DEFAULT NULL,
  `address` varchar(70) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `picture`, `date_of_birth`, `tel_nr`, `postal_code`, `city`, `motivation`, `cv`, `address`) VALUES
(2, 'admin', '[\"ROLE_ADMIN\"]', '$2y$13$aFyCP8SahfYQcVhAtte3DOHXVUEed/xI.NDhc5R8ZTQB0eERXot06', 'admin', 'admin', 'admin', '2018-01-01', NULL, NULL, 'area-51', '/', NULL, NULL),
(4, 'employer', '[\"ROLE_EMPLOYER\"]', '$2y$13$/sZ13R6RJHSu24cVdIThyeWKjV2Drj6Xx3xmR9cTuq5aMLOdD1w3e', 'Coca Cola', NULL, 'cola', NULL, NULL, NULL, 'Atlanta, Georgia, US', 'A company with history and a long line of experience!', NULL, NULL),
(5, 'candidate', '[\"ROLE_CANDIDATE\"]', '$2y$13$id3MgEVoHNDv/uNnVWvxZeiKKotqWpyDhaeTR82kU/RPn59nhFj0a', 'can', 'didate', 'user', '2018-01-01', '11111', '5555', 'date', 'candidation', 'candidate', 'candi 5');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy`
--

CREATE TABLE `vacancy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `function` varchar(60) NOT NULL,
  `description` longtext NOT NULL,
  `difficulty` varchar(6) DEFAULT NULL,
  `location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vacancy`
--

INSERT INTO `vacancy` (`id`, `user_id`, `startdate`, `function`, `description`, `difficulty`, `location`) VALUES
(1, 4, '2023-08-23', '.NET', 'A way too short description!', 'JUNIOR', 'Sittard'),
(2, 4, '2023-08-23', 'DevOps', 'Another short one!', 'MEDIOR', 'Heerlen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A45BDDC1433B78C4` (`vacancy_id`),
  ADD KEY `IDX_A45BDDC1A76ED395` (`user_id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Indexes for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A9346CBDA76ED395` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vacancy`
--
ALTER TABLE `vacancy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `FK_A45BDDC1433B78C4` FOREIGN KEY (`vacancy_id`) REFERENCES `vacancy` (`id`),
  ADD CONSTRAINT `FK_A45BDDC1A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `vacancy`
--
ALTER TABLE `vacancy`
  ADD CONSTRAINT `FK_A9346CBDA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
