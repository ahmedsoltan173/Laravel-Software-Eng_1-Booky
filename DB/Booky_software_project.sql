-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 05:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `software`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ahmed', 'admin@gmail.com', '$2y$10$7ahSQ1FFE8CBnRL0faK.8Ojm//2FmwlhIn1uSblbLWiJ658LcR9Yi');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `categories` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `price`, `description`, `photo`, `author`, `stock`, `categories`, `created_at`, `updated_at`) VALUES
(1, 'Jules Verne', 160, 'harry pooter', '61g6AktDuEL._AC_UY218_.jpg', 'Paper back', 10, 1, '2022-04-18 19:49:04', '2022-04-16 00:13:34'),
(5, 'The Bookshop', 48, 'asdna', '91GnJSXve0L._AC_UY218_.jpg', 'Soltan', 4, 1, '2022-04-18 19:49:16', '2022-04-15 01:54:40'),
(10, 'Scary Smart', 150, 'Scary Smart: The Future of Artificial Intelligence and How You Can Save Our World', '61vTX15JkfL._AC_UY218_.jpg', 'Mo Gawdat', 15, 1, '2022-04-18 19:52:54', '2022-04-02 19:49:54'),
(12, 'George Orwell', 125, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'asda.jpg', 'Georgy Orwell', 5, 1, '2022-04-18 20:21:30', '2022-04-13 17:29:22'),
(13, 'To Kill a mockingbird', 125, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'tokill.jpg', 'harren lee', 5, 1, '2022-04-18 20:22:03', '2022-04-13 17:30:00'),
(14, 'Hamlet', 155, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '610AYXBRE6L._AC_UY218_.jpg', 'william shakespearr', 1, 1, '2022-04-18 19:53:05', '2022-04-13 17:30:28'),
(15, 'Betty Veronica', 70, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '91vrds29GQL._AC_UY218_.jpg', 'sharon aman', 1, 2, '2022-04-18 19:56:18', '2022-04-13 17:30:44'),
(17, 'Comic Book on earth', 10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop ', '81HtuswG1ES._AC_UY218_.jpg', 'Ruffello', 15, 2, '2022-04-18 19:56:04', '2022-04-14 22:24:18'),
(19, 'Brain battison', 1500, 'pe and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with des', '81kLwFYYgGS._AC_UY218_.jpg', 'kindle eddition', 5, 3, '2022-04-18 19:57:15', '2022-04-15 00:28:02'),
(20, 'Cradle To Grave', 30, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text', '81vmXvBQJYL._AC_UY218_.jpg', 'Rachel Amphlett', 2, 3, '2022-04-18 19:55:01', NULL),
(21, 'Couple at No.9', 25, 'the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1650312076815ui3W0ESS._AC_UY218_.jpg', 'Claire Douglas', 3, 4, '2022-04-18 18:01:17', '2022-04-18 18:01:17'),
(22, 'The jigsaw Man', 35, 'the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '165031211981mKfzHRcIS._AC_UY218_.jpg', 'Nadine Matheson', 4, 4, '2022-04-18 18:01:59', '2022-04-18 18:01:59'),
(23, 'Dead Man\'s Grave', 45, 'the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '165031216981RgiuEbsrS._AC_UY218_.jpg', 'Neil Lancaster', 7, 4, '2022-04-18 18:02:49', '2022-04-18 18:02:49'),
(24, 'Snow Kills', 90, 'the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'snow.jpg', 'R.C.Bridgestock', 1, 4, '2022-04-18 20:22:51', '2022-04-18 18:03:41'),
(25, 'Harry Potter And the Order Of Phoenix', 15, 'unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'harry.jpg', 'j.k.Rowling , Stephen fry', 9, 5, '2022-04-18 20:23:21', '2022-04-18 18:09:17'),
(26, 'Harry Potter and the Chamber of Secrets', 17, 'unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1650312588914IucHuGSL._AC_UY218_.jpg', 'j.k.Rowling , Stephen fry', 9, 5, '2022-04-18 18:09:48', '2022-04-18 18:09:48'),
(27, 'Sevenfold Sword: Necromancer', 19, 'unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1650312625716hYH65ZlL._AC_UY218_.jpg', 'Jonathon Moller', 9, 5, '2022-04-18 18:10:25', '2022-04-18 18:10:25'),
(28, 'Battle Mage', 57, 'unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '165031267581JbMwbzOJL._AC_UY218_.jpg', 'Peter flannery', 1, 5, '2022-04-18 18:11:15', '2022-04-18 18:11:15'),
(29, 'DRAGON\'S GAP', 57, 'unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1650312700A1UKVjuFLoL._AC_UY218_.jpg', 'L.M.lacee', 4, 5, '2022-04-18 18:11:40', '2022-04-18 18:11:40'),
(30, 'Fortress Of Blood', 120, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has s', '16498779441.jpg', 'L.D.Goffigan', 3, 7, '2022-04-18 20:18:43', NULL),
(31, 'Sorry For Your Loss', 105, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text e', 'book2.jpg', 'Jessie Ann Foley', 15, 7, '2022-04-18 20:18:43', NULL),
(32, 'Company Of One ', 178, 'popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'book1.jpg', 'Paul Jarvis', 6, 7, '2022-04-18 20:19:43', NULL),
(33, 'Horowitz Scard', 150, 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Asperiores temporibus, repudiandae maxime odio necessitatibus ex laudantium harum soluta ad quia nemo et! Sapiente, itaque architecto. Nulla deserunt, ipsa minus consectetur voluptatem eligendi! Eius itaque assumenda perspiciatis maiores, optio dignissimos mollitia velit iste quidem, dolor, aliquid molestiae? Facere saepe quis totam nisi possimus aperiam veritatis error vitae! Consequatur nostrum velit blanditiis vel! Voluptatem, vero? Debitis molestias quos suscipit veniam, magni nemo. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Incidunt voluptate iure reprehenderit adipisci? Rerum placeat aliquid veritatis nihil velit! Itaque ut corporis temporibus, architecto minus, earum id officia labore omnis sunt nemo veniam, quibusdam porro facere necessit', '1650313495horrer.jpg', 'K.L.Mani', 7, 6, '2022-04-18 18:24:56', '2022-04-18 18:24:56');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(20) NOT NULL,
  `users_id` int(11) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `number` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `users_id`, `book_id`, `number`, `created_at`, `updated_at`) VALUES
(43, 5, 1, 12, '2022-04-17 01:58:12', '2022-04-16 23:58:12'),
(57, 11, 1, 4, '2022-04-18 21:32:56', '2022-04-18 19:32:56'),
(59, 5, 17, 2, '2022-04-18 19:23:13', '2022-04-18 17:23:13'),
(68, 5, 5, 2, '2022-04-18 20:25:27', '2022-04-18 18:25:27'),
(70, 5, 15, 1, '2022-04-18 17:22:55', '2022-04-18 17:22:55'),
(71, 5, 26, 3, '2022-04-18 21:32:34', '2022-04-18 19:32:34'),
(72, 5, 14, 1, '2022-04-18 20:32:55', '2022-04-18 20:32:55'),
(73, 13, 5, 1, '2022-04-18 20:37:21', '2022-04-18 20:37:21'),
(74, 14, 1, 5, '2022-04-19 15:11:40', '2022-04-19 13:11:40'),
(76, 14, 10, 1, '2022-04-19 13:11:49', '2022-04-19 13:11:49'),
(77, 15, 20, 1, '2022-04-19 13:26:16', '2022-04-19 13:26:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Classic', '2022-04-18 22:38:35', '2022-04-18 20:38:35'),
(2, 'Comic', '2022-04-15 02:54:06', NULL),
(3, 'Detective', '2022-04-15 02:54:14', NULL),
(4, 'Crime', '2022-04-15 01:06:29', '2022-04-15 01:06:29'),
(5, 'Fantasy', '2022-04-15 01:06:44', '2022-04-15 01:06:44'),
(6, 'Horror', '2022-04-15 01:06:53', '2022-04-15 01:06:53'),
(7, 'Suspense', '2022-04-15 03:36:11', '2022-04-15 01:36:11'),
(9, 'software', '2022-04-19 15:28:29', '2022-04-19 13:28:29'),
(10, 'JavaScript', '2022-04-19 15:32:42', '2022-04-19 13:32:42'),
(11, 'Web', '2022-04-19 13:32:21', '2022-04-19 13:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ahmed.soltan160160@gmail.com', '$2y$10$d.9AA7INTKdOQzVI5HQuGuKRGfh1VcQCuLacOZv5Juif/fs6LGAOS', '2022-04-06 18:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `groupID` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `groupID`) VALUES
(2, 'ahmed', 'ahmed@gmail.com', NULL, '$2y$10$io4lf.f484CPKncpKZErZekU622AzrIdi20g2gBTuSHa7oSKxT6oi', NULL, '2022-03-28 13:50:05', '2022-03-28 13:50:05', 0),
(5, 'ahmed', 'ahmed.soltan160160@gmail.com', NULL, '$2y$10$7ahSQ1FFE8CBnRL0faK.8Ojm//2FmwlhIn1uSblbLWiJ658LcR9Yi', NULL, '2022-03-28 13:37:11', '2022-03-28 13:37:11', 0),
(7, 'Mohamed', 'mohamed@soltan.com', NULL, '$2y$10$r1wORN8XElAN1YDLVr6yuuhjo7B1fchqgRWH7sDIqLV4lsT.mH9Ue', NULL, '2022-04-15 01:57:23', '2022-04-15 01:57:23', 0),
(11, 'Mahmoud', 'Mahmoud@soltan.com', '2022-04-15 02:34:43', '$2y$10$8gS6Az5Oeqb/Gh1VmQJskOHVmSsRieZ./Pbgr6XkCLJ4Vz/taBUki', NULL, '2022-04-15 02:14:54', '2022-04-15 02:34:43', 0),
(12, 'mohmaed', 'mohamed.soltan@gmail.com', NULL, '$2y$10$875F6vdJ1eHWXx9juEHZRO5MfmPDcbNA/0dk79Qb0XyJP/nv7ME9S', NULL, '2022-04-15 02:35:23', '2022-04-15 02:35:23', 0),
(13, 'Ref3at', 'ref3at@gmail.com', NULL, '$2y$10$jUhhsFAOmvm6B1XVGu.rI.COmlzFmTOUfBxDRKOAmqQtIa6jYM5Gi', NULL, '2022-04-18 20:36:22', '2022-04-18 20:36:22', 0),
(14, 'Mohamed', 'mohamed.alaa@gmail.com', '2022-04-19 13:10:37', '$2y$10$nVUAcB/rKdfGdDYdVarAXueQ2PZotBsK8OM7/0VdMOTHmg12LnHk.', NULL, '2022-04-19 13:08:58', '2022-04-19 13:10:37', 0),
(15, 'Soltan', 'soltan@gmail.com', '2022-04-19 13:25:56', '$2y$10$Io5PB65m4fZLXYMPKwXMtuuHRMLznnxOQ38SMo/7.Enf9x4.7qeX2', NULL, '2022-04-19 13:25:17', '2022-04-19 13:25:56', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories` (`categories`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_cart` (`users_id`),
  ADD KEY `book_cart` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `categories` FOREIGN KEY (`categories`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `book_cart` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_cart` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
