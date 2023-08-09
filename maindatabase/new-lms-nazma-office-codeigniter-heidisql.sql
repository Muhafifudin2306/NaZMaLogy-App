-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table lms-nazma-office-codeigniter.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.categories: ~3 rows (approximately)
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Marketing', '2023-05-24 22:01:05', '2023-05-24 22:01:05'),
	(2, 'Business', '2023-05-24 22:01:05', '2023-05-24 22:01:05'),
	(3, 'Management', '2023-05-24 22:01:05', '2023-05-24 22:01:05'),
	(8, 'mimpi', '2023-06-09 03:08:31', '2023-06-09 03:08:31');

-- Dumping structure for table lms-nazma-office-codeigniter.courses
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `cover` text COLLATE utf8mb4_general_ci,
  `rating` decimal(20,1) DEFAULT '0.0',
  `participant` int DEFAULT '0',
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instructor` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `summary` text COLLATE utf8mb4_general_ci,
  `intro_link` text COLLATE utf8mb4_general_ci,
  `intro_duration` int DEFAULT NULL,
  `mentoring_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.courses: ~2 rows (approximately)
INSERT INTO `courses` (`id`, `cover`, `rating`, `participant`, `title`, `instructor`, `summary`, `intro_link`, `intro_duration`, `mentoring_link`, `created_at`, `updated_at`) VALUES
	(25, 'Screenshot_(16)1.png', 0.0, 0, 'Belajar Digital Marketing 101', 'Wiwit AB', '<p><strong>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Placeat odio quibusdam eum excepturi molestiae doloribus inventore iste ullam, enim quasi neque. Ex sint rerum nostrum? Sequi cumque eius quam, provident assumenda beatae aperiam temporibus, amet ullam non aliquid recuaasaasandae ipsum odit soluta commodi deleniti corrupti! Numquam quae facere consequuntur sint.</strong></p>\r\n', 'OdLGq9y_OC8', 3, 'https://www.google.com/', '2023-06-09 12:54:09', '2023-06-09 12:54:09'),
	(27, 'hqdefault.jpg', 0.0, 0, 'Global Enterpreneurship', 'Wiwi AB', '<p><span xss=removed><b>Hallo, Sobat..\r\nKali ini kita akan belajar bareng lagi ya mengenai Desain Organisasi, yuk mari kita simak bersama!\r\n\r\nJangan Lupa Like, Comment, Share & Subscribe Untuk Video Belajar Lainnya!</b></span><br></p>', 'vIudlgadXlw', 5, 'https://www.google.com/', '2023-05-25 03:05:42', '2023-05-25 03:05:42');

-- Dumping structure for table lms-nazma-office-codeigniter.course_has_category
CREATE TABLE IF NOT EXISTS `course_has_category` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_course` bigint unsigned DEFAULT NULL,
  `id_category` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_course_has_category_courses` (`id_course`),
  KEY `FK_course_has_category_categories` (`id_category`),
  CONSTRAINT `FK_course_has_category_categories` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_course_has_category_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=214 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.course_has_category: ~4 rows (approximately)
INSERT INTO `course_has_category` (`id`, `id_course`, `id_category`, `created_at`, `updated_at`) VALUES
	(182, 27, 1, '2023-05-23 04:05:17', '2023-05-23 04:05:17'),
	(183, 27, 2, '2023-05-23 04:05:17', '2023-05-23 04:05:17'),
	(212, 25, 1, '2023-06-09 12:54:09', '2023-06-09 12:54:09'),
	(213, 25, 3, '2023-06-09 12:54:09', '2023-06-09 12:54:09');

-- Dumping structure for table lms-nazma-office-codeigniter.course_has_playlist
CREATE TABLE IF NOT EXISTS `course_has_playlist` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_course` bigint unsigned DEFAULT NULL,
  `id_playlist` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_course_has_playlist_courses` (`id_course`),
  KEY `FK_course_has_playlist_playlists` (`id_playlist`),
  CONSTRAINT `FK_course_has_playlist_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_course_has_playlist_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.course_has_playlist: ~5 rows (approximately)
INSERT INTO `course_has_playlist` (`id`, `id_course`, `id_playlist`, `created_at`, `updated_at`) VALUES
	(16, 27, 10, '2023-06-13 17:17:01', '2023-06-13 17:17:01'),
	(17, 27, 11, '2023-06-13 17:17:01', '2023-06-13 17:17:01'),
	(54, 25, 5, '2023-06-13 17:17:01', '2023-06-13 17:17:01'),
	(55, 25, 7, '2023-06-13 17:17:01', '2023-06-13 17:17:01'),
	(56, 25, 8, '2023-06-13 17:17:01', '2023-06-13 17:17:01');

-- Dumping structure for table lms-nazma-office-codeigniter.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `summary` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `district` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `region` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `posCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `province` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT '12_52923_image.png',
  `id_user` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_members_users` (`id_user`),
  CONSTRAINT `FK_members_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.members: ~2 rows (approximately)
INSERT INTO `members` (`id`, `summary`, `job`, `address`, `district`, `region`, `posCode`, `province`, `instagram`, `linkedin`, `image`, `id_user`, `created_at`, `updated_at`) VALUES
	(20, 'At dignissimos sit ', 'Tempora magnam quaer', 'Qui in nemo molestia', 'Sequi amet est veli', 'Ut amet voluptate s', 'Harum dolor illum q', 'Ut voluptas omnis vo', 'Duis sit quod non ut', 'Magnam dolor aut sed', 'Foto_Profil_persego.png', 21, '2023-06-13 17:16:54', '2023-06-13 17:16:54'),
	(33, 'halo saya Afif', 'Web Developer', 'Yogyakarta', 'Mollit dolore facere', 'Et esse temporibus ', 'Adipisci vero iure l', 'Molestias quisquam e', 'afifudin.dev', 'muhammad Afifudin', 'Foto_Muhammad_Afifudin.png', 27, '2023-06-13 17:16:54', '2023-06-13 17:16:54');

-- Dumping structure for table lms-nazma-office-codeigniter.playlists
CREATE TABLE IF NOT EXISTS `playlists` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.playlists: ~9 rows (approximately)
INSERT INTO `playlists` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(5, 'Bab 1. Perkenalan dan Benchmarking', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(7, 'Bab 2. Strategi Marketing', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(8, 'Bab 3. Mitra dan Sponsorship', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(9, 'Bab 4. Laba dan Koneksi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(10, 'Desain Organisasi', '2023-05-23 04:12:24', '2023-05-23 04:12:24'),
	(11, 'Global Enterprenership', '2023-05-25 03:40:58', '2023-05-25 03:40:58'),
	(20, 'desianan', '2023-06-08 06:47:28', '2023-06-08 06:47:28'),
	(21, 'aaaaaa', '2023-06-09 02:49:38', '2023-06-09 02:49:38'),
	(22, 'aaaaaaa', '2023-06-09 02:49:50', '2023-06-09 02:49:50');

-- Dumping structure for table lms-nazma-office-codeigniter.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.roles: ~3 rows (approximately)
INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Super Admin', '2023-06-13 17:16:44', '2023-06-13 17:16:44'),
	(2, 'Instructor', '2023-06-13 17:16:44', '2023-06-13 17:16:44'),
	(3, 'Member', '2023-06-13 17:16:44', '2023-06-13 17:16:44');

-- Dumping structure for table lms-nazma-office-codeigniter.subscribes
CREATE TABLE IF NOT EXISTS `subscribes` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.subscribes: ~14 rows (approximately)
INSERT INTO `subscribes` (`id`, `email`, `created_at`, `updated_at`) VALUES
	(1, 'muhafifudin66@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(2, 'muhafifudin2306@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(3, 'jowenize@mailinator.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(4, 'cobacobalagi@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(5, 'anisa66@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(6, 'anisa66@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(7, 'cobacobalagi@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(8, 'cek@mail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(9, 'muhafifudin266@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(10, 'jowenize@mailinator.comfgffhgf', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(11, 'anisa66@gmail.comjjkjkjk', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(12, 'tester@gmail.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(13, 'fgdfgdfg@ffdf.com', '2023-06-08 02:47:39', '2023-06-08 02:47:39'),
	(14, 'ngadmin@fimunnes.com', '2023-07-08 02:47:39', '2023-06-08 02:48:08');

-- Dumping structure for table lms-nazma-office-codeigniter.testimonies
CREATE TABLE IF NOT EXISTS `testimonies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `job` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_general_ci,
  `rating` decimal(20,6) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.testimonies: ~4 rows (approximately)
INSERT INTO `testimonies` (`id`, `image`, `author`, `job`, `message`, `rating`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', '    Lorem ipsum dolor sit amet consectetur adipisicing elit. At magni praesentium deleniti rem accusantium blanditiis voluptatibus sapiente! Reiciendis quia sunt unde dolorum possimus sit consequuntur ducimus, minus incidunt quisquam necessitatibus quidem voluptates aliquid nostrum ullam omnis illum quaerat nulla atque saepe tempore doloribus vero aperiam. Asperiores suscipit distinctio deleniti alias.', 5.000000, 0, '2023-06-07 04:34:09', '2023-06-07 04:34:09'),
	(2, 'Foto_Muhammad_Afifudin.png', 'Muhammad Afifudin', 'Web Developer', '  Lorem ipsum dolor, sit amet consectetur adipisicing elit. Aliquam suscipit expedita quibusdam recusandae dolore magni voluptas id voluptatem consequatur facilis!', 5.000000, 1, '2023-05-26 08:12:17', '2023-05-26 08:12:17'),
	(3, 'Foto_Muhammad_Afifudin.png', 'Arif', 'Web Developer', '       Lorem ipsum dolor, sit amet consectetur adipisicing elit. Reprehenderit earum est facilis, quia provident amet obcaecati suscipit natus. Fuga veritatis dolores fugit magni, quisquam facere ipsa vel consectetur corrupti explicabo?', 5.000000, 1, '2023-06-23 04:23:22', '2023-06-08 02:49:51'),
	(7, 'logo-mobile.png', 'Ea consectetur magn', 'Voluptate enim iure', '<p>dfdgdfg</p>', 3.000000, 0, '2023-06-09 12:22:59', '2023-06-09 12:22:59');

-- Dumping structure for table lms-nazma-office-codeigniter.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `id_role` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_users_roles` (`id_role`),
  CONSTRAINT `FK_users_roles` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.users: ~9 rows (approximately)
INSERT INTO `users` (`id`, `email`, `name`, `password`, `id_role`, `created_at`, `updated_at`) VALUES
	(10, 'muhafifudin66@gmail.com', 'Muhammad Afifudin', '$2y$10$LvUn3mQZXhqfNKuzUHtHKOKje5bB7F7ACXphpgO4wWMN4sHEs1JW6', 1, '2023-06-09 01:21:48', '2023-06-08 02:40:50'),
	(21, 'anisa66@gmail.com', 'Anisa Mahda Habsari', '$2y$10$sVq5z2Tr774mJJ2UiVK7OOWbN1fxPuoVAv2Z/fD76hLh.CNCC2uHC', 3, '2023-05-09 01:52:28', '2023-05-09 01:52:28'),
	(27, 'muhafifudin2306@gmail.com', 'Muhammad Afifudin', '$2y$10$zsNHcv.ydTmfRqvF2Rxyf.r6LRwR65don6O5aNuIFIqwc69GHxND6', 3, '2023-06-10 03:52:24', '2023-06-10 03:52:24'),
	(29, 'muhafifudin66@gmail', 'Anisa Mahda Habsari', '$2y$10$kXMQ15Dgu9wH7StfBdrS2uBXJjZXZf0WKiblrZWSt2oZCWUpwNwfy', 3, '2023-05-30 02:09:26', '2023-05-30 02:09:26'),
	(30, 'muhafifudin66@h', 'Anisa Mahda Habsari', '$2y$10$4rKW9E8sWPeqCb2dHlGNy.MRJLxZa73EKE35v5/DfU.C2gjyvzBga', 3, '2023-06-30 02:09:53', '2023-06-08 02:41:04'),
	(31, 'muhafifudin66@f', 'Anisa Mahda Habsari', '$2y$10$EoFRnNsFzROcGXx1KdGg6OknqSJ8CWJKA/t32kwQv.08PjbWPS.Be', 3, '2023-05-30 02:10:59', '2023-05-30 02:10:59'),
	(32, 'muhafifudin668@gmai.dd', 'kjjkkj', '$2y$10$2cVo7.ygqN95mlgQ5SmxkO1LAkwCsTw0pOk8oOkP3NjffhRM3TXIu', 3, '2023-05-30 02:11:46', '2023-05-30 02:11:46'),
	(33, 'muhafifudin45@gmail.com', 'Afifudin', '$2y$10$Jc6Q9iAark0axhN2DZNUEOZTuhPTBaxwsL3noABzRGFxiVn8.fvj2', 3, '2023-05-30 02:20:03', '2023-05-30 02:20:03'),
	(35, 'afif69@gmail.com', 'Afif', '$2y$10$/nmOsEcaK8rcyYE1Mi4qiO/GNHhubSv2RGB529mlKSMWmUoVcQp.q', 3, '2023-06-13 16:47:41', '2023-06-13 16:47:41'),
	(36, 'hubu@mailinator.com', 'Colorado Aguirre', '$2y$10$ryK5l7bJSjaeFGAX8dLw6e.4thR8yoJLvCXvBPEtjF1dhGHeApX56', 3, '2023-06-21 02:49:10', '2023-06-21 02:49:10'),
	(37, 'muhafifudin2306@students.unnes.ac.id', 'Muhammad Afifudin', '$2y$10$os4CPCKmHvT01pVXrkPys.BOFj4a18YpbdeiPUtng5ulLINRNSqwG', 3, '2023-06-21 03:30:27', '2023-06-21 03:30:27');

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_course
CREATE TABLE IF NOT EXISTS `user_has_course` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `progress` decimal(20,6) DEFAULT NULL,
  `rating` decimal(20,1) DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_course_users` (`id_user`),
  KEY `FK_user_has_course_courses` (`id_course`),
  CONSTRAINT `FK_user_has_course_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_course_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_course: ~4 rows (approximately)
INSERT INTO `user_has_course` (`id`, `id_user`, `id_course`, `status`, `progress`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
	(35, 21, 27, 1, 100.000000, 4.0, 'mantap, bismillah bang', '2023-06-13 02:00:51', '2023-06-13 02:00:51'),
	(41, 27, 27, 1, 100.000000, 5.0, 'Mantap bang\r\n', '2023-06-10 08:52:04', '2023-06-10 08:52:04'),
	(42, 21, 25, 1, NULL, NULL, NULL, '2023-06-13 16:44:40', '2023-06-13 16:44:40'),
	(43, 35, 25, 1, NULL, NULL, NULL, '2023-06-13 16:48:59', '2023-06-13 16:48:59');

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_course_saved
CREATE TABLE IF NOT EXISTS `user_has_course_saved` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_course_saved_users` (`id_user`),
  KEY `FK_user_has_course_saved_courses` (`id_course`),
  CONSTRAINT `FK_user_has_course_saved_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_course_saved_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_course_saved: ~1 rows (approximately)
INSERT INTO `user_has_course_saved` (`id`, `id_user`, `id_course`, `created_at`, `updated_at`) VALUES
	(155, 21, 27, '2023-06-13 17:16:10', '2023-06-13 17:16:10');

-- Dumping structure for table lms-nazma-office-codeigniter.user_has_video
CREATE TABLE IF NOT EXISTS `user_has_video` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned DEFAULT NULL,
  `id_video` bigint unsigned DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `id_course` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_user_has_video_users` (`id_user`),
  KEY `FK_user_has_video_videos` (`id_video`),
  KEY `FK_user_has_video_courses` (`id_course`),
  CONSTRAINT `FK_user_has_video_courses` FOREIGN KEY (`id_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_video_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_user_has_video_videos` FOREIGN KEY (`id_video`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.user_has_video: ~9 rows (approximately)
INSERT INTO `user_has_video` (`id`, `id_user`, `id_video`, `status`, `id_course`, `created_at`, `updated_at`) VALUES
	(62, 21, 10, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(63, 21, 11, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(64, 21, 12, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(66, 21, 13, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(67, 21, 5, 1, 25, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(68, 27, 10, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(69, 27, 12, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(70, 27, 13, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59'),
	(72, 27, 11, 1, 27, '2023-06-13 17:15:59', '2023-06-13 17:15:59');

-- Dumping structure for table lms-nazma-office-codeigniter.videos
CREATE TABLE IF NOT EXISTS `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `link` text COLLATE utf8mb4_general_ci,
  `duration` int DEFAULT NULL,
  `id_playlist` bigint unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_videos_videos` (`id_playlist`) USING BTREE,
  CONSTRAINT `FK_videos_playlists` FOREIGN KEY (`id_playlist`) REFERENCES `playlists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table lms-nazma-office-codeigniter.videos: ~9 rows (approximately)
INSERT INTO `videos` (`id`, `link`, `duration`, `id_playlist`, `title`, `created_at`, `updated_at`) VALUES
	(5, 'eLWBHVRn7QQ', 3, 7, 'Mengenal Strategi Marketing', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(6, 'cpas2BjauvU', 2, 7, 'Tips Jitu Marketing', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(8, 'FRh7LvlQTuA', 1, 5, 'Pengertian Marketing', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(9, 'UU1hPQp4h_0', 8, 9, 'Instrumentasi Sponsorship', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(10, 'vIudlgadXlw', 5, 10, 'Desain Organisasi | PART 2', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(11, 'FwbnCRFXJT0', 6, 10, 'Desain Organisasi | PART 1', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(12, 'TOaBJtmaphU', 8, 11, 'Pengenalan Pemasaran Global', '2023-06-09 02:12:57', '2023-06-09 02:12:57'),
	(13, '955Y3QxiJ5c', 9, 11, 'Global Entrepreneurship', '2023-06-09 02:12:57', '2023-06-09 02:12:57');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
