-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2024 at 11:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loyola_memorial_park`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `name`, `email`, `password`, `date_added`) VALUES
(1, 'admin1', 'John Doe', 'johndoe@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 05:59:14'),
(2, 'admin2', 'Jane Smith', 'janesmith@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 05:59:14'),
(3, 'admin3', 'Michael Brown', 'michaelbrown@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 05:59:14'),
(4, 'isoy15', 'me', 'adonisjrsanjuan@gmail.com', '$2y$10$4Rm//0/zJMdT.BEFW5g9pOLNQCI2x7I0GFmp8EXunb/Y4F2YAML/K', '2024-11-04 06:18:40'),
(5, 'itsmeisoy', 'Adonis Jr S Sanchez', 'adonissanjuan123@gmail.com', '$2y$10$b80MfdFYh7IFrGqNNVxfaOFleaKrpb9.tY5nve2WJXjj4liaPBuCe', '2024-11-04 08:28:16'),
(6, 'admin4', 'Alice Johnson', 'alicejohnson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(7, 'admin5', 'Robert Davis', 'robertdavis@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(8, 'admin6', 'Emily Garcia', 'emilygarcia@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(9, 'admin7', 'Chris Martinez', 'chrismartinez@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(10, 'admin8', 'Patricia Wilson', 'patriciawilson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(11, 'admin9', 'Linda Anderson', 'lindaanderson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(12, 'admin10', 'David Thomas', 'davidthomas@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(13, 'admin11', 'Susan Jackson', 'susanjackson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(14, 'admin12', 'James White', 'jameswhite@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(15, 'admin13', 'Barbara Harris', 'barbaraharris@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(16, 'admin14', 'Paul Clark', 'paulclark@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(17, 'admin15', 'Karen Lewis', 'karenlewis@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(18, 'admin16', 'Mark Robinson', 'markrobinson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(19, 'admin17', 'Betty Walker', 'bettywalker@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(20, 'admin18', 'Charles Young', 'charlesyoung@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(21, 'admin19', 'Nancy King', 'nancyking@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(22, 'admin20', 'Kenneth Wright', 'kennethwright@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(23, 'admin21', 'Donna Scott', 'donnascott@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(24, 'admin22', 'George Green', 'georgegreen@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(25, 'admin23', 'Maria Adams', 'mariaadams@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(26, 'admin24', 'Edward Baker', 'edwardbaker@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(27, 'admin25', 'Megan Gonzalez', 'megangonzalez@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(28, 'admin26', 'Steve Nelson', 'stevenelson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(29, 'admin27', 'Sandra Carter', 'sandracarter@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(30, 'admin28', 'Patrick Mitchell', 'patrickmitchell@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(31, 'admin29', 'Amy Perez', 'amyperez@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(32, 'admin30', 'Timothy Roberts', 'timothyroberts@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(33, 'admin31', 'Jessica Evans', 'jessicaevans@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(34, 'admin32', 'Larry Turner', 'larryturner@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(35, 'admin33', 'Elizabeth Phillips', 'elizabethphillips@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(36, 'admin34', 'Brian Campbell', 'briancampbell@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(37, 'admin35', 'Deborah Parker', 'deborahparker@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(38, 'admin36', 'Scott Collins', 'scottcollins@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(39, 'admin37', 'Rebecca Stewart', 'rebeccastewart@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(40, 'admin38', 'Bruce Sanchez', 'brucesanchez@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(41, 'admin39', 'Laura Morris', 'lauramorris@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(42, 'admin40', 'Kevin Rogers', 'kevinrogers@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(43, 'admin41', 'Michelle Reed', 'michellereed@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(44, 'admin42', 'Eric Cook', 'ericcook@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(45, 'admin43', 'Sarah Morgan', 'sarahmorgan@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(46, 'admin44', 'Matthew Bell', 'matthewbell@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(47, 'admin45', 'Angela Murphy', 'angelamurphy@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(48, 'admin46', 'Joshua Bailey', 'joshuabailey@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(49, 'admin47', 'Stephanie Rivera', 'stephanierivera@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(50, 'admin48', 'Andrew Cooper', 'andrewcooper@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(51, 'admin49', 'Megan Richardson', 'meganrichardson@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(52, 'admin50', 'Jacob Cox', 'jacobcox@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(53, 'admin51', 'Amber Howard', 'amberhoward@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(54, 'admin52', 'Jeremy Ward', 'jeremyward@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42'),
(55, 'admin53', 'Katherine Torres', 'katherinetorres@example.com', '$2a$12$j7WtKM8yvmyDQWprNh09IuJZpPCaD3rB5lPF8w7fonf89bzwhViG2', '2024-11-04 08:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `deceased`
--

CREATE TABLE `deceased` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_of_death` date NOT NULL,
  `plot_id` int(11) DEFAULT NULL,
  `cause_of_death` varchar(255) DEFAULT NULL,
  `next_of_kin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `deceased`
--

INSERT INTO `deceased` (`id`, `name`, `date_of_death`, `plot_id`, `cause_of_death`, `next_of_kin`) VALUES
(1, 'sd', '2024-11-14', 14, 'dsds', 'dsds'),
(2, 'Lorem Ipsum', '2024-11-07', 16, 'test1', 'tes1'),
(3, 'hahahaha', '2024-11-01', 21, 'wd', 'dsds');

-- --------------------------------------------------------

--
-- Table structure for table `plot`
--

CREATE TABLE `plot` (
  `id` int(11) NOT NULL,
  `status` enum('Available','Reserve','Occupied','Maintenance') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plot`
--

INSERT INTO `plot` (`id`, `status`) VALUES
(1, 'Available'),
(2, 'Available'),
(3, 'Reserve'),
(4, 'Occupied'),
(5, 'Reserve'),
(6, 'Available'),
(7, 'Available'),
(8, 'Available'),
(9, 'Available'),
(10, 'Available'),
(11, 'Available'),
(12, 'Available'),
(13, 'Available'),
(14, 'Available'),
(15, 'Maintenance'),
(16, 'Occupied'),
(17, 'Available'),
(18, 'Available'),
(19, 'Available'),
(20, 'Available'),
(21, 'Occupied');

-- --------------------------------------------------------

--
-- Table structure for table `plots`
--

CREATE TABLE `plots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text DEFAULT NULL,
  `position_x` int(11) NOT NULL,
  `position_y` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `plots`
--

INSERT INTO `plots` (`id`, `name`, `details`, `position_x`, `position_y`, `width`, `height`) VALUES
(1, 'slot 1', '<br> name: Adonis', 28, 120, 15, 15),
(2, 'slot 2', '<br> name: xynn', 27, 140, 15, 15),
(3, 'slot 3', '<br> name: kyla', 26, 160, 15, 15),
(4, 'slot 4', '<br> name: lou', 25, 180, 15, 15),
(5, 'slot 5', '<br> name: test1', 50, 122, 15, 15),
(6, 'slot 6', '<br> name: test2', 49, 140, 15, 15),
(7, 'slot 7', '<br> name: test3', 48, 160, 15, 15),
(8, 'slot 8', '<br> name: test4', 47, 180, 15, 15),
(9, 'slot 9', '<br> name: test5', 72, 123, 15, 15),
(10, 'slot 10', '<br> name: test6', 71, 141, 15, 15),
(11, 'slot 11', '<br> name: test7', 69, 160, 15, 15),
(12, 'slot 12', '<br> name: test8', 69, 180, 15, 15);

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `position_x` int(11) NOT NULL,
  `position_y` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `name`, `details`, `position_x`, `position_y`, `width`, `height`) VALUES
(1, 'slot 1', '<br> name: Adonis', 28, 120, 15, 15),
(2, 'slot 2', '<br> name: xynn', 27, 140, 15, 15),
(3, 'slot 3', '<br> name: kyla', 26, 160, 15, 15),
(4, 'slot 4', '<br> name: lou', 25, 180, 15, 15),
(5, 'slot 5', '<br> name: test1', 50, 122, 15, 15),
(6, 'slot 6', '<br> name: test2', 49, 140, 15, 15),
(7, 'slot 7', '<br> name: test3', 48, 160, 15, 15),
(8, 'slot 8', '<br> name: test4', 47, 180, 15, 15),
(9, 'slot 9', '<br> name: test5', 72, 123, 15, 15),
(10, 'slot 10', '<br> name: test6', 71, 141, 15, 15),
(11, 'slot 11', '<br> name: test7', 69, 160, 15, 15),
(12, 'slot 12', '<br> name: test8', 69, 180, 15, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `deceased`
--
ALTER TABLE `deceased`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plot_id` (`plot_id`);

--
-- Indexes for table `plot`
--
ALTER TABLE `plot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plots`
--
ALTER TABLE `plots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `deceased`
--
ALTER TABLE `deceased`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `plot`
--
ALTER TABLE `plot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `plots`
--
ALTER TABLE `plots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `deceased`
--
ALTER TABLE `deceased`
  ADD CONSTRAINT `deceased_ibfk_1` FOREIGN KEY (`plot_id`) REFERENCES `plot` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
