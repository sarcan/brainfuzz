-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 12, 2021 at 06:35 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brainfuzz`
--

-- --------------------------------------------------------

--
-- Table structure for table `journal`
--

CREATE TABLE `journal` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `firstGoal` varchar(255) NOT NULL,
  `secondGoal` varchar(255) NOT NULL,
  `thirdGoal` varchar(255) NOT NULL,
  `summary` varchar(255) DEFAULT '--',
  `importantTask` varchar(255) NOT NULL,
  `wentWell` varchar(255) DEFAULT '--',
  `doBetter` varchar(255) DEFAULT '--',
  `ideas` varchar(255) DEFAULT '--',
  `sleep` int(11) NOT NULL,
  `mood` int(11) DEFAULT '0',
  `motivation` int(11) DEFAULT '0',
  `concentration` int(11) DEFAULT '0',
  `tranquility` int(11) DEFAULT '0',
  `physical` int(11) DEFAULT '0',
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `journal`
--

INSERT INTO `journal` (`id`, `date`, `firstGoal`, `secondGoal`, `thirdGoal`, `summary`, `importantTask`, `wentWell`, `doBetter`, `ideas`, `sleep`, `mood`, `motivation`, `concentration`, `tranquility`, `physical`, `userId`) VALUES
(23, '2021-10-03', 'Draw a mandala', 'Be nice to people', 'Write a story', 'I achieved all of my goals', 'Be nice to people', 'Everything', 'Nothing', 'Nothing', 1, 5, 4, 5, 5, 5, 26),
(24, '2021-10-03', 'Do a workout', 'Study', 'Read', 'Yes', 'Do a workout', 'The Workou', 'Read a bit more', 'Nothing really unfortunately', 2, 3, 3, 4, 3, 1, 27),
(25, '2021-10-03', 'Study', 'Work', '--', '--', 'Study', '--', '--', '--', 3, 0, 0, 0, 0, 0, 24),
(26, '2021-10-03', 'Brush teeth 4 times', 'Go cycling', 'Find geocache', '--', 'Brush teeth', '--', '--', '--', 1, 0, 0, 0, 0, 0, 25),
(27, '2021-10-04', 'Watch new show', 'Go to neurofeedback', 'Drive safely', 'Yes', 'Go to neurofeedback', 'Everything', 'Everything', 'Nothing', 4, 4, 4, 5, 3, 3, 24),
(28, '2021-10-05', 'Go to appointement', 'Speak eloquently', 'Relax', 'Yes I did, I had a productive day and spoke eloquently.', 'Speak eloquently', 'Everything', 'Relax more', 'Spend more time in nature', 1, 3, 4, 4, 3, 2, 24),
(34, '2021-10-11', 'Study', 'Be concentrated', '--', '--', 'Study', '--', '--', '--', 5, 0, 0, 0, 0, 0, 24),
(35, '2021-10-12', 'Relax', 'Study', 'Prepare for tomorrows tasks', 'Yes, I did achieve all of my goals.', 'Relax', 'Relaxing', 'Study more', '--', 4, 5, 3, 4, 3, 2, 24);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `authorization` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `authorization`) VALUES
(24, 'Test', 'test@test.com', '$2y$10$iUXa6r/sz1wyDgaFoKuNR.rGBgq/Ch75jJ2XtVDpjKl0N/1AUgydG', 1),
(25, 'Testd', 'est@test.com', '$2y$10$iUXa6r/sz1wyDgaFoKuNR.rGBgq/Ch75jJ2XtVDpjKl0N/1AUgydG', 1),
(26, 'hello', 'hello@bye.com', '$2y$10$lJC7LHLCh6Lhx1/iwXMOXuNQ53iqkHeRUZm2DNew4aRUQbQj1Rzoe', 1),
(27, 'Me', 'me@me.com', '$2y$10$9Tj8wAzTBSkMpwnLhrRZDejB5GKJXXsb6yOM6jLuSduDGXIAw4DqS', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `journal`
--
ALTER TABLE `journal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
