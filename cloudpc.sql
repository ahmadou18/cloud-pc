-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2017 at 10:50 AM
-- Server version: 5.7.19-0ubuntu0.17.04.1
-- PHP Version: 7.1.8-1+ubuntu17.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cloudpc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8_unicode_ci NOT NULL,
  `draft` tinyint(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `category_id`, `title`, `description`, `body`, `draft`, `user_id`) VALUES
(19, NULL, 'Bonjour le monde', 'Un nouveau sur le navire youpi', 'bonjour je m\'appelle ahmadou j\'ai 24 ans et je viens d\'acheter le cloud pc, et je trouve ça très intéressant', 0, 1),
(20, NULL, 'Hello', 'présentation', 'For 50 years, WWF has been protecting the future of nature. The world\'s leading conservation organization, WWF works in 100 countries and is supported by 1.2 million members in the United States and close to 5 million globally.', 0, 7),
(21, 2, 'Oui', 'je suis oui', 'hello world dolorum enim esse impedit rerum. Alias eum incidunt iusto laudantium libero necessitatibus nesciunt obcaecati quaerat ratione recusandae? Ab ad assumenda consectetur, culpa dolorum eius et facilis ipsa, iusto magni minima mollitia odio reiciendis repellendus suscipit, vitae voluptas voluptatem! Aut consequatur corporis distinctio ducimus esse fuga, inventore labore, non odit praesentium repudiandae soluta unde voluptatem, voluptates voluptatum? Consequatur, velit.', 0, 9);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Présentation');

-- --------------------------------------------------------

--
-- Table structure for table `fos_user`
--

CREATE TABLE `fos_user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fos_user`
--

INSERT INTO `fos_user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`) VALUES
(1, 'rinja', 'rinja', 'ah.gueye@laposte.net', 'ah.gueye@laposte.net', 1, NULL, '$2y$13$5O0c6b/HytpsGzbUeQGUlO.s9VwY3M1HjRHAL4X8ttf7.rujXjhea', '2017-08-28 10:09:32', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(2, 'olivia', 'olivia', 'oliviapenycoblentz@gmail.com', 'oliviapenycoblentz@gmail.com', 1, NULL, '$2y$13$TZeCFvp03VVUhOSkzunG7.B3HbfNfcxooQbDzM61bkm8ef/hCFCG2', '2017-08-04 16:21:53', NULL, NULL, 'a:0:{}'),
(3, 'oui', 'oui', 'efvf@grrt.com', 'efvf@grrt.com', 1, NULL, '$2y$13$utBpWNmhMzC2UdUsZslR0eVkvbFUoRVMTDwNEIOLMgb2DIGrkaHB2', '2017-08-07 23:13:49', NULL, NULL, 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(4, 'cui', 'cui', 'tryujn@rhty.com', 'tryujn@rhty.com', 1, NULL, '$2y$13$CM3CziZmSAS/xxTkwnk4Bux/yEfMIFPIbz1guVzHBI0y0Ur9rdDNS', '2017-08-06 20:29:24', NULL, NULL, 'a:0:{}'),
(5, 'la', 'la', 'zdesvf@dfevr.com', 'zdesvf@dfevr.com', 1, NULL, '$2y$13$qxu4/HX.2DqLl3gtP3GLx.mHa0kFEU5mA1s3rI/6Lp1rEJ0RJXJ2S', '2017-08-07 12:08:38', NULL, NULL, 'a:0:{}'),
(6, 'ahmadou', 'ahmadou', 'ah.gueye@laposte.com', 'ah.gueye@laposte.com', 1, NULL, '$2y$13$HYWSnGqrPCXouVve0QrGKetOs7KYZHWRvk1eEMZb20uklnn3lONdS', '2017-08-07 14:32:36', NULL, NULL, 'a:0:{}'),
(7, 'ahmad', 'ahmad', 'ahmadou.gue@gmail.co', 'ahmadou.gue@gmail.co', 1, NULL, '$2y$13$RN0LqCDK3Yf5.ftGR0BoCOJ.UsQ5QzNXiH4uj7nHroyZfwA4Cqv8a', '2017-08-08 15:52:20', NULL, NULL, 'a:0:{}'),
(8, 'truc', 'truc', 'truc@truc.com', 'truc@truc.com', 1, NULL, '$2y$13$UDCgRJSNz86IR4ymcRJo3.iN9mrhh6yYhuJghRUPwKK7iX6BBo2kK', '2017-08-10 11:38:08', NULL, NULL, 'a:0:{}'),
(9, 'ouai', 'ouai', 'oui@oui.oui', 'oui@oui.oui', 1, NULL, '$2y$13$/qakd4yHwr4w8DsQeph5yuwLWfUPDriXnddb4LbWpHsvfw1qo9IxC', '2017-08-10 11:48:40', NULL, NULL, 'a:0:{}'),
(10, 'fr', 'fr', 'efdsdf@dfdg.com', 'efdsdf@dfdg.com', 1, NULL, '$2y$13$5cKqXB.Q90q9XzMI4bDc7OF1KO2iPJQq9IHmpWGND.JrlqdhLIZmK', '2017-08-14 12:11:13', NULL, NULL, 'a:0:{}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_BA5AE01D12469DE2` (`category_id`),
  ADD KEY `IDX_BA5AE01DA76ED395` (`user_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fos_user`
--
ALTER TABLE `fos_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_957A647992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_957A6479C05FB297` (`confirmation_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `fos_user`
--
ALTER TABLE `fos_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `FK_BA5AE01D12469DE2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FK_BA5AE01DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `fos_user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
