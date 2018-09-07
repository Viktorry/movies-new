-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2018 at 04:42 PM
-- Server version: 5.7.23-0ubuntu0.16.04.1
-- PHP Version: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Movies`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

CREATE TABLE `actors` (
  `actor_id` int(11) NOT NULL,
  `actor` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`actor_id`, `actor`) VALUES
(39, 'Rob Lanza'),
(40, 'David Lee Smith'),
(41, 'Holt McCallany'),
(42, 'Joel Bissonnette'),
(43, 'Eion Bailey'),
(44, 'Evan Mirand'),
(45, 'Robby Robinson'),
(46, 'Tim Robbins'),
(47, 'Morgan Freeman'),
(48, 'Bob Gunton'),
(49, 'William Sadler'),
(50, 'Clancy Brown'),
(51, 'Gil Bellows'),
(52, 'Mark Rolston'),
(53, 'James Whitmore'),
(54, 'Jeffrey DeMunn'),
(55, 'Larry Brandenburg'),
(56, 'Marlon Brando'),
(57, 'Al Pacino'),
(58, 'James Caan'),
(59, 'Richard S. Castellano'),
(60, 'Robert Duvall'),
(61, 'Sterling Hayden'),
(62, 'John Marley'),
(63, 'Richard Conte');

-- --------------------------------------------------------

--
-- Table structure for table `actorsgenresinmovies`
--

CREATE TABLE `actorsgenresinmovies` (
  `actor_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `actorsgenresinmovies`
--

INSERT INTO `actorsgenresinmovies` (`actor_id`, `genre_id`, `movie_id`) VALUES
(42, 5, 19),
(42, 6, 19);

-- --------------------------------------------------------

--
-- Table structure for table `actorsinmovies`
--

CREATE TABLE `actorsinmovies` (
  `actor_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comm_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `comments` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

CREATE TABLE `directors` (
  `director_id` int(11) NOT NULL,
  `director_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `director_lastname` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dirinmovies`
--

CREATE TABLE `dirinmovies` (
  `dir_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genres_id` int(11) NOT NULL,
  `genre` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genres_id`, `genre`) VALUES
(3, 'Aerospace'),
(4, 'Biography'),
(5, ' Buddy Cop'),
(6, 'Burlesque '),
(7, ' Chick Flick'),
(8, 'Circus'),
(9, ' Comedy'),
(10, 'Coming-of-age'),
(11, 'Comic Book'),
(12, ' Concert'),
(13, ' Courtroom drama'),
(14, 'Current Events '),
(15, 'Detective'),
(16, ' Disaster'),
(17, 'Drama '),
(18, ' Educational'),
(19, ' Exploitation '),
(20, ' Fantasy '),
(21, 'Gangster'),
(22, ' Heist'),
(23, ' History'),
(24, 'Horror'),
(25, 'Jungle'),
(26, 'Martial arts'),
(27, 'Medieval'),
(28, 'Military '),
(29, 'Mountie '),
(30, 'Mystery'),
(31, 'Nature'),
(34, ' Prison'),
(35, 'Psycho'),
(36, 'Religion'),
(37, 'Revolution'),
(38, 'Road'),
(39, ' Romance'),
(40, ' Science '),
(41, 'Science fiction'),
(42, 'Sitcom'),
(43, ' Social guidance'),
(44, 'Spiritual film'),
(45, 'Sports'),
(46, 'Spy'),
(47, ' Travelogue'),
(48, 'Variety'),
(49, 'War ');

-- --------------------------------------------------------

--
-- Table structure for table `genresinmovies`
--

CREATE TABLE `genresinmovies` (
  `genres_id` int(11) NOT NULL,
  `movies_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `movies_name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `movies_date` datetime NOT NULL,
  `duration_time` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `ratings` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `youtube` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `imdb` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movies_id`, `movies_name`, `movies_date`, `duration_time`, `ratings`, `youtube`, `imdb`, `url`, `updated_at`) VALUES
(16, 'The Shawshank Redemption', '2018-09-13 00:00:00', '12', '2', 'https://www.youtube.com/watch?v=NF-kLy44Hls', 'asd', 'https://www.youtube.com/watch?v=NF-kLy44Hls', '2018-09-07 10:25:00'),
(17, 'The Godfather ', '1972-07-15 13:11:23', '2h 55min', '9.2', 'https://www.youtube.com/watch?v=sY1S34973zA', 'https://www.imdb.com/title/tt0068646/?ref_=adv_li_tt', '', '2018-09-04 13:24:32'),
(18, 'The Dark Knight', '2008-04-15 07:34:23', ' 2h 32min ', '9.0', 'https://www.youtube.com/watch?v=EXeTwQWrcwY', 'https://www.imdb.com/title/tt0468569/?ref_=adv_li_tt', '', '2018-09-04 13:24:32'),
(19, 'Inception ', '2010-07-15 13:11:23', ' 2h 28min ', '8.8', 'https://www.youtube.com/watch?v=YoHD9XEInc0', 'https://www.imdb.com/title/tt1375666/?ref_=adv_li_i', '', '2018-09-04 13:28:37'),
(20, 'Fight Club', '1999-04-15 07:34:23', '2h 19min', '8.8', 'https://www.youtube.com/watch?v=SUXWAEX2jlg', 'https://www.imdb.com/title/tt0137523/?ref_=adv_li_tt', '', '2018-09-04 13:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `description` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `image` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pictures`
--

INSERT INTO `pictures` (`id`, `image`) VALUES
(38, 'images.jpeg'),
(61, 'download.jpeg'),
(62, 'download.jpeg'),
(63, 'download.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `Admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `pass`, `username`, `Admin`) VALUES
(27, 'biskehttt@gmail.com', 'user123', 'viktor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `video` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actors`
--
ALTER TABLE `actors`
  ADD PRIMARY KEY (`actor_id`);

--
-- Indexes for table `actorsgenresinmovies`
--
ALTER TABLE `actorsgenresinmovies`
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `movie_id` (`movie_id`),
  ADD KEY `genre_id` (`genre_id`);

--
-- Indexes for table `actorsinmovies`
--
ALTER TABLE `actorsinmovies`
  ADD KEY `actor_id` (`actor_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `directors`
--
ALTER TABLE `directors`
  ADD PRIMARY KEY (`director_id`);

--
-- Indexes for table `dirinmovies`
--
ALTER TABLE `dirinmovies`
  ADD KEY `dir_id` (`dir_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genres_id`);

--
-- Indexes for table `genresinmovies`
--
ALTER TABLE `genresinmovies`
  ADD KEY `genres_id` (`genres_id`),
  ADD KEY `movies_id` (`movies_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actors`
--
ALTER TABLE `actors`
  MODIFY `actor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `directors`
--
ALTER TABLE `directors`
  MODIFY `director_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genres_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `actorsgenresinmovies`
--
ALTER TABLE `actorsgenresinmovies`
  ADD CONSTRAINT `actorsgenresinmovies_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`),
  ADD CONSTRAINT `actorsgenresinmovies_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`movies_id`),
  ADD CONSTRAINT `actorsgenresinmovies_ibfk_3` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`genres_id`);

--
-- Constraints for table `actorsinmovies`
--
ALTER TABLE `actorsinmovies`
  ADD CONSTRAINT `actorsinmovies_ibfk_1` FOREIGN KEY (`actor_id`) REFERENCES `actors` (`actor_id`),
  ADD CONSTRAINT `actorsinmovies_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`movies_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`movies_id`);

--
-- Constraints for table `dirinmovies`
--
ALTER TABLE `dirinmovies`
  ADD CONSTRAINT `dirinmovies_ibfk_1` FOREIGN KEY (`dir_id`) REFERENCES `directors` (`director_id`),
  ADD CONSTRAINT `dirinmovies_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`movies_id`);

--
-- Constraints for table `genresinmovies`
--
ALTER TABLE `genresinmovies`
  ADD CONSTRAINT `genresinmovies_ibfk_1` FOREIGN KEY (`genres_id`) REFERENCES `genres` (`genres_id`),
  ADD CONSTRAINT `genresinmovies_ibfk_2` FOREIGN KEY (`movies_id`) REFERENCES `movies` (`movies_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
