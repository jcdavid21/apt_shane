-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 14, 2024 at 05:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shane_qmet`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `name` varchar(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `start_time` time(6) NOT NULL,
  `end_time` time(6) NOT NULL,
  `id` int(255) NOT NULL,
  `professor_name` varchar(255) NOT NULL,
  `mess` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prof_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`name`, `student_number`, `appointment_date`, `start_time`, `end_time`, `id`, `professor_name`, `mess`, `user_id`, `prof_id`) VALUES
('Jc David', '2185365777', '2024-05-22', '10:30:00.000000', '11:30:00.000000', 21, 'Mic Salado', 'ssa', 1, 3),
('Juan Carlo David', '2185365777', '2024-05-22', '07:30:00.000000', '10:30:00.000000', 22, 'James Moriarty', 'asdasd', 1, 4),
('Jc David', '2185365777', '2024-05-21', '10:30:00.000000', '11:30:00.000000', 23, 'Mico Alvarez', 'asdsa', 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cellphone` int(255) NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `professor_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `middlename`, `password`, `address`, `cellphone`, `student_number`, `username`, `role`, `professor_name`) VALUES
(1, 'Rannces Mico', 'Mallari', 'Cagalawan', '$2y$10$yvfO0R2ehJVvYeaYshr5Te5AjQkHnm21f70jMQrExo0/EMJAxNez6', '#62 Leon Cleofas St.', 2147483647, '2147483647', 'mindyour0wnx1', 'student', ''),
(2, 'Rannces Mico', 'Mallari', 'Cagalawan', '$2y$10$KrI9LcurEXnR4TVlmUxAzOD0MfzlNLVvigMR1yNgWxAe6hL20zPf.', '#62 Leon Cleofas St.', 2147483647, '2147483647', 'giicrime00', 'student', ''),
(3, 'Mic', 'Salado', 'Cagalawan', '$2y$10$EqGMtx.YwWkZ4JrlAz8b.ehvqB2HBd/zHekqAglwZ4cscyI8sSMCO', '#62 Leon Cleofas St.', 2147483647, '2147483647', 'teacher1', 'teacher', 'Mic Salado'),
(4, 'James', 'Moriarty', 'Cagalawan', '$2y$10$P5Il.Qxs5nMvRjnML1nzYOjYBn5kgPYSBmgon3gBa2L6sZ/vLekuy', '#62 Leon Cleofas St.', 2147483647, '2147483647', 'teacher2', 'teacher', 'James Moriarty'),
(6, 'Rannces Mico', 'Alvarez', 'Cagalawan', '$2y$10$/s46TtbG2a9LHZo4ziIXGOjRCj70F6vZwLwiDVm04ftm2UsCqI7P2', '#62 Leon Cleofas St.', 2147483647, '2200', 'mindyour0wnx111', 'teacher', 'Mico Alvarez'),
(7, 'shane', 'bonghanoy', '', '$2y$10$zwxCNzm1gsNyPmjshcyeCukevK49wF91mXu/p7yZWGB0T.drKi14.', 'Novaliches', 2147483647, '220', 'shen', 'student', ''),
(8, 'shane', 'bonghanoy', '', '$2y$10$268ynwB6B5OF/NopY1tHBeqYh9COr4Pevtmjbr3u9FrplaQEoIsEG', 'vxcvsvsfsd', 2147483647, '346854521', 'mamamo', 'student', ''),
(9, 'shane', 'neis', '', '$2y$10$TGme8kNd9EIkbsP5yAz9D.eCJ27G0NcSq5NfHiGHExyX.etfI0t52', 'quezon city', 2147483647, '200002020', 'shennn', 'student', ''),
(10, 'christian', 'azores', 'rico', '$2y$10$fbonwINC7JH6fElj0mMxkeWX09eA96q..XJqKOhsniIJN1bBCOjjG', 'montalban', 2147483647, '2147483647', 'batutoy', 'student', ''),
(11, 'sad', 'bonghanoy', 'sad', '$2y$10$DAZv3J7dvjlRMewO9/I/Z.Culk1vmDXg1fEC/Bk6aUSmhxvSGlMLS', 'dfasd', 2147483647, '2147483647', 'chi', 'teacher', ''),
(12, 'miccc', 'salado', 'sal', '$2y$10$gd9EQAlLr/P0/PcCIkFtzOULTlEulxZgDSLwF1BpbkUliBKEgyF4W', 'cdsfdsfsd', 2147483647, '4234324', 'sal', 'student', ''),
(13, 'jc', 'david', 'pogi', '$2y$10$lgOXfLrpRuUYTVRvuaMa1O24UNUjKhiEhin8.jTBvL0BOkSafJy..', 'asdada', 956535401, '2147483647', 'jcpogi', 'student', ''),
(14, 'Jamir', 'Lagua', 'Dolba', '$2y$10$WxuhtRjCVOZqjXyXadOQO.r3PKXVfJ5gKWjlPGKt4dP63Tg2uVN1m', 'montalban', 2147483647, '2147483647', 'asdasdasd', 'student', ''),
(15, 'Jecca', 'Pepe', '', '$2y$10$LKHJjV/s9k5qLAOS/yEote01HBv6Mr6DeXPBXK4rhXf1iEqD237fK', 'Novaliches', 99999999, '2202255', 'claire', 'student', ''),
(16, 'Gungi', 'Komugi', 'D', '$2y$10$tvty3y9qFvpHYnekcMg69e2Bt3.1EkpD4GqI1NPaurI9S5o.S5n4u', 'scscascas23', 23, '12389129', 'lebron', 'teacher', ''),
(17, 'sarah', 'clemen', '', '$2y$10$cI0gqvtl3dDWno7MmLkph.b/6aBuCCogU4QhFjIZC3rtKteur8ITC', 'amparo caloocan city', 2147483647, '2147483647', 'shiro', 'student', ''),
(18, 'thyra', 'lee', '', '$2y$10$Bnjfz1yyibzDOC3rVHaDD.8jY0iFXY7dXwq0cl/uOtrB4TBvUimIC', 'holy spirit', 2147483647, '2147483647', 'thy', 'student', ''),
(19, 'Jhomari', 'Taqueban', '', '$2y$10$SX9IQZICxgs2GUZaE.I5RetYnDWmD/QgFHISYucVBwAXNh05pUTRS', 'Llano', 2147483647, '2147483647', 'jhom', 'student', ''),
(20, 'Jhon Cedrick', 'Martinez', '', '$2y$10$8hnx8I/Vkd4OCa.FqIPwWO5wViGG95/V77wRzvsJoNMCo6QNULAbe', 'amparo caloocan city', 2147483647, '216', 'tats', 'teacher', '');

-- --------------------------------------------------------

--
-- Table structure for table `users1`
--

CREATE TABLE `users1` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cellphone` int(100) NOT NULL,
  `role` varchar(255) NOT NULL,
  `teacher_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users1`
--

INSERT INTO `users1` (`id`, `firstname`, `lastname`, `middlename`, `password`, `cellphone`, `role`, `teacher_number`, `username`, `address`) VALUES
(1, 'Mael', 'Alvarez', 'Cagalawan', '$2y$10$MlnbufaUY.qFvNAfCwMlYOZU8YxtOHIWpYK15b9i/RSWozTsUh3W.', 2147483647, 'teacher', '0101', 'giicrime2', '#62 Leon Cleofas St.'),
(2, 'Despair', 'Alvarez', 'Cagalawan', '$2y$10$jksQoQnQYNm47tDo4EhKuOz8ctw.sMBSpxkCPTYyVbhHoZRCqqily', 2147483647, '', '', 'mindyour0wnx11', '#62 Leon Cleofas St.'),
(3, 'Mic', 'Mallari', 'Cagalawan', '$2y$10$gNblkJKbYBed0LQfTyboo.053HJOmCLitsezexAlzgvt91sPNbQnW', 2147483647, 'teacher', '0293', 'mindyour0wnx10', '#62 Leon Cleofas St.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_professor_name` (`professor_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users1`
--
ALTER TABLE `users1`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users1`
--
ALTER TABLE `users1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
