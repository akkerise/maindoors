-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 12, 2017 at 03:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maindoors`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `keyword`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Deion Schulist', 'et voluptatem.', 'Expedita atque occaecati ut velit culpa a. Velit itaque sapiente vel quia eveniet distinctio nesciunt. Veniam vero aliquid assumenda quas doloremque. Aut atque eum rerum reprehenderit libero.', 9, '2016-12-14 21:48:33', '2011-08-14 21:12:47'),
(2, 'Mr. Taurean Buckridge MD', 'ut ea ea.', 'Mollitia vel eius aut vero dolores temporibus at tempora. Id consequatur officia voluptas saepe veritatis. Qui ex facere soluta eum sed.', 6, '1977-04-07 11:36:13', '1975-01-18 19:54:51'),
(3, 'Dr. Anissa Veum', 'non sit.', 'Est et sit et. Cupiditate ex aut ducimus nam. Dolor provident voluptatum enim quis dignissimos. Distinctio nobis et cumque quia officiis quod.', 20, '1975-01-08 15:46:38', '2002-03-21 04:48:25'),
(4, 'Prof. Ansel Herman', 'quia et illo.', 'Qui tempora est quo amet tempore consequatur. Dolor labore inventore consequuntur aliquam.\nNostrum nostrum temporibus debitis numquam quasi. Reiciendis hic quis ad. Ratione ipsam rem ut culpa.', 2, '1975-07-23 07:30:40', '1979-06-09 16:31:08'),
(5, 'Teresa Metz', 'animi incidunt.', 'Illo tempora facere maiores consequatur ex ex. Eligendi deserunt minima atque tempore autem esse accusantium. Saepe at sunt est quasi aut laudantium.', 3, '1999-10-16 13:15:13', '1992-10-12 22:57:16'),
(6, 'Dr. Rosemary Hayes', 'veritatis.', 'Veritatis laborum voluptatibus suscipit dolorum sequi sed modi. Dicta eius eum dolorum suscipit modi praesentium. Praesentium voluptatibus omnis aspernatur veniam aliquam quo quis.', 5, '1992-02-02 18:26:36', '1974-05-03 11:41:50'),
(7, 'Lizeth Prosacco DVM', 'provident.', 'Voluptatum est voluptate quasi dolorem qui rerum. Ut consequatur ratione laboriosam non.', 3, '1995-11-30 23:41:10', '2015-08-06 23:01:17'),
(8, 'Dr. Hillary Volkman DDS', 'molestias.', 'Distinctio unde cumque earum nisi inventore at. Atque sed id adipisci nisi qui distinctio. Suscipit culpa neque asperiores adipisci.', 6, '2011-04-21 10:00:25', '1981-02-26 06:31:48'),
(9, 'Joannie Kuhn', 'et et.', 'Soluta aspernatur aut accusamus sed. Rem quis consequatur rerum et magni. Cupiditate et ut omnis nostrum et quas quis maxime.', 15, '1992-02-07 07:40:02', '1995-09-24 22:35:24'),
(10, 'Gage Thompson I', 'enim nulla.', 'Officia deleniti error sed quisquam reiciendis aperiam impedit. Ut sit eligendi repellendus et. Quidem modi officia est ipsum fugiat cumque. Atque nisi sapiente error quo.', 14, '1996-09-15 08:35:26', '1977-05-20 10:30:49'),
(11, 'Tia Runolfsdottir', 'omnis.', 'Ut autem dolor perspiciatis illo. Corporis ipsum repellat quo officia culpa quidem. Vitae et in voluptas quisquam eos aut. Aut minima distinctio voluptatem voluptatem officiis est.', 10, '1998-03-04 08:54:34', '1993-12-26 09:09:29'),
(12, 'Jarvis Hand MD', 'beatae sunt.', 'In velit harum et et asperiores facilis id possimus. Incidunt ut hic ea corporis quia aut.', 20, '2005-10-01 13:00:40', '1997-05-03 23:51:15'),
(13, 'Lolita Kunde', 'rerum quo.', 'Sunt expedita eum libero velit ipsam voluptas dolorum. Aliquid in deserunt velit veritatis. Ipsa velit at quia facere quo magnam. Natus quos eum est autem quae molestias.', 11, '1999-02-04 18:00:25', '1981-10-24 21:19:59'),
(14, 'Makayla Reichel', 'quos corrupti.', 'Earum eum ab eum molestiae omnis magnam iste. Qui quaerat nostrum autem exercitationem. Ea blanditiis soluta nam sed. In id qui perferendis et illum dolorum.', 8, '1975-11-14 05:48:56', '2013-05-20 22:33:43'),
(15, 'Hailie Metz', 'qui amet quae.', 'Dolor beatae est voluptas voluptatem aut. Esse fuga magnam molestiae sint ex cumque. Non dolore sit sit id ipsum architecto architecto. In rerum vitae et dolorem.', 17, '1970-10-01 23:59:42', '1975-01-26 02:08:29'),
(16, 'Mr. Roger Boyle II', 'qui non qui id.', 'Sed molestiae enim vel labore occaecati asperiores odio qui. Quos temporibus quidem architecto enim voluptatem. At recusandae tenetur sunt accusantium explicabo officiis.', 18, '2003-04-04 21:12:47', '2011-05-11 14:22:34'),
(17, 'Margaret Stroman IV', 'aliquam.', 'Perspiciatis deserunt consequatur nostrum et est ipsum rem quibusdam. Fugit aliquid aut qui dolorem at facere impedit doloribus. Et autem ea fuga.', 9, '1976-05-28 09:12:22', '2005-12-22 22:26:20'),
(18, 'Lacy Hyatt', 'porro totam.', 'Et vitae deserunt commodi consequatur. Et quia dolores corporis rerum ut consequatur. Necessitatibus voluptas assumenda soluta saepe rerum distinctio quia. Assumenda debitis rem et sapiente facilis.', 18, '1988-03-13 18:28:48', '1993-09-10 03:30:51'),
(19, 'Dr. Alvah Runolfsson', 'voluptatem.', 'Optio sunt facere nobis qui quam. Aut repellendus iusto excepturi. Id accusamus harum ratione sequi porro illo. Temporibus amet sed aspernatur porro repudiandae cupiditate expedita vero.', 10, '1993-07-25 19:40:00', '1981-09-09 21:19:12'),
(20, 'Augusta Boehm', 'et quo vero.', 'Pariatur voluptatem excepturi repellat sunt consectetur enim. Rem deleniti eaque assumenda velit et. Ea facilis accusamus dolorem autem doloribus.', 3, '1970-07-13 02:42:39', '1999-09-26 22:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `accept_time` datetime NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phonenumber`, `accept_time`, `created_at`) VALUES
(1, 'Watson Blanda Jr.', '5311 Marks Junction\nHillltown, TX 98374', '1-493-540-2412', '1971-08-15 17:11:33', '1996-11-07 02:47:46'),
(2, 'Lela Ryan', '3079 Kautzer Plaza Apt. 313\nMarcoview, CT 02263-0649', '+1 (920) 834-9063', '1983-08-10 15:41:43', '2014-08-09 16:00:38'),
(3, 'Wendell Fritsch', '590 Mozelle Parkway Apt. 077\nMaynardview, AL 06212', '475-631-6609 x5889', '1988-02-20 04:42:25', '1971-02-28 23:35:27'),
(4, 'Earnestine Ondricka', '49425 Baumbach Port\nOkunevastad, VT 42747-7941', '+15502345391', '1975-08-24 13:41:42', '2000-07-04 19:29:36'),
(5, 'Evert Sauer', '8304 Alivia Parkways\nEarnestineborough, AL 26868', '290-805-0175', '2003-02-01 04:42:37', '1997-05-24 13:43:29'),
(6, 'Brandon Collins', '76506 Eichmann Fall Suite 410\nCatharineview, OR 82137', '+1-264-903-3385', '1984-12-13 08:58:18', '1976-12-15 03:06:28'),
(7, 'Clement Crooks', '767 Clementine Forks Apt. 016\nElodyhaven, OR 86718', '(587) 535-2384', '1990-11-23 01:59:49', '1976-03-13 16:47:57'),
(8, 'Jeanette Denesik', '6089 Juvenal Summit Apt. 452\nEast Preciousland, FL 83786', '(654) 819-3406 x582', '1999-01-05 13:17:29', '2014-01-12 05:26:44'),
(9, 'Skyla Olson', '42029 Everett Mission Apt. 229\nCroninmouth, FL 55871', '(776) 210-8444 x990', '2004-07-05 21:10:11', '1982-08-06 13:42:50'),
(10, 'Lenore Langworth', '95151 Keyshawn Manors Suite 562\nLake Chynatown, FL 62738-7652', '817-659-5470 x03187', '1998-12-15 14:25:54', '1980-01-12 22:32:33'),
(11, 'Reba Shanahan', '22747 Abbott Orchard Suite 598\nKautzerburgh, VA 42188', '1-459-763-2585 x1410', '2011-11-25 20:16:12', '2004-06-04 02:30:40'),
(12, 'Mr. Tatum Kutch', '8786 Loma Fort Apt. 996\nConradville, NV 64098', '(843) 875-6252', '2008-10-01 00:04:40', '1973-02-07 07:26:00'),
(13, 'Dr. Zoila Jacobson DVM', '50084 Ondricka Walk Suite 680\nThielhaven, WY 72639', '1-763-924-3908 x7137', '2007-12-04 10:09:50', '2003-01-25 03:37:35'),
(14, 'Prof. Casimir Nicolas DVM', '9408 Sadie Island\nWest Alethaville, TX 47917-2126', '(263) 610-5364 x3714', '2010-08-25 08:26:22', '2013-08-01 03:24:03'),
(15, 'Aiyana McLaughlin IV', '28566 Kianna Track\nPort Art, KY 75118', '(757) 903-3905 x7432', '1986-03-21 02:50:31', '1992-09-12 20:31:32'),
(16, 'Oleta Lockman', '5612 Runte Islands\nCameronbury, ME 49727-9978', '782.806.8755 x3333', '2009-12-15 06:11:41', '1990-01-21 04:48:17'),
(17, 'Aimee Borer III', '896 Wisoky Passage Suite 291\nEichmannborough, FL 04088-4373', '+1-761-702-4374', '1970-06-02 10:13:24', '2014-11-14 21:21:23'),
(18, 'Presley O\'Keefe III', '4421 Nigel Stravenue\nElnachester, OH 75467', '+13462006288', '1994-04-08 14:49:10', '1994-12-15 08:54:31'),
(19, 'Wendy Rice Sr.', '1122 Jerome Turnpike\nLake Daleton, FL 98874-6434', '(549) 982-8949 x53869', '2008-10-01 02:34:11', '2001-11-18 20:10:49'),
(20, 'Mr. Jaycee Torphy', '405 Kunde Roads\nEast Cleveview, TN 37026', '+1.716.857.0853', '2005-05-14 13:00:18', '2015-12-31 17:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `name`, `value`) VALUES
(1, 'Ophelia Schowalter', 'Destiney Berge'),
(2, 'Alba Hayes', 'Ms. Lura Langworth'),
(3, 'Marguerite DuBuque', 'Rahul Boyer'),
(4, 'Prof. Alison O\'Hara', 'Prof. Bert Quitzon'),
(5, 'Claud Swaniawski', 'Adeline Shanahan'),
(6, 'Ari Weimann', 'Molly Wolf'),
(7, 'Abigayle Casper', 'Kennith Crona'),
(8, 'Mrs. Kellie Mosciski', 'Raymond Graham I'),
(9, 'Elfrieda Swift', 'Sophia Kohler Jr.'),
(10, 'Leonora Stamm', 'Joanne Kirlin'),
(11, 'Anika Hyatt', 'Dr. Kristina Roob'),
(12, 'Georgiana Veum IV', 'Miss Karine Dickens MD'),
(13, 'Reina Wyman', 'Jammie Hayes MD'),
(14, 'Maxime Casper', 'Liana Nicolas'),
(15, 'Orion Haag II', 'Gabe Runte'),
(16, 'Karlie Donnelly', 'Jenifer Dooley'),
(17, 'Myrtice Nicolas DVM', 'Justina Daniel'),
(18, 'Miss Alvina Hayes', 'Dr. Gaetano Ebert II'),
(19, 'Addison Kutch', 'Prof. Santiago Russel'),
(20, 'Ms. Emmanuelle Funk', 'Milford Jacobi Jr.');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `cate_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Gerhard Russel DDS', 3, 19, '1980-02-28 05:00:14', '1998-02-05 04:21:00'),
(2, 'Stella Jenkins', 3, 6, '1979-10-12 22:59:08', '1996-07-21 00:59:44'),
(3, 'Elliott Spinka', 12, 1, '1982-01-09 15:22:00', '1999-05-19 13:06:59'),
(4, 'Elise Hermiston', 19, 4, '2008-07-12 13:14:23', '2001-07-21 03:27:05'),
(5, 'Sheldon Bayer MD', 17, 9, '1998-03-07 02:35:00', '2004-05-14 15:50:26'),
(6, 'Louisa Lueilwitz', 5, 3, '2009-07-24 15:39:50', '1999-09-03 03:53:01'),
(7, 'Kiarra Murray', 6, 9, '2003-11-21 16:30:46', '1988-06-02 22:41:01'),
(8, 'Anabelle Franecki', 3, 8, '1995-03-31 23:10:59', '1987-12-22 17:21:18'),
(9, 'Deborah Schimmel', 6, 5, '1972-09-09 19:37:42', '1971-02-25 21:36:08'),
(10, 'Dashawn Waters Jr.', 17, 15, '1987-07-23 21:49:27', '2014-10-16 00:01:49'),
(11, 'Lindsay Ebert', 8, 20, '1992-07-20 21:25:22', '1983-05-14 23:51:29'),
(12, 'Camylle Block', 6, 20, '1999-07-12 17:52:47', '2002-09-13 05:42:45'),
(13, 'Florence Treutel', 2, 1, '1985-07-09 21:15:13', '2002-05-10 15:46:35'),
(14, 'Prof. Mohammad Brakus DDS', 18, 2, '2013-01-06 22:30:58', '1980-09-19 18:31:31'),
(15, 'Mr. Melvin Steuber Jr.', 11, 5, '2012-07-13 04:40:40', '2004-05-15 12:15:14'),
(16, 'Ernie Hermann', 11, 11, '1997-01-03 13:03:21', '2010-06-13 21:43:32'),
(17, 'Litzy Bins', 7, 15, '1997-02-24 12:03:29', '2005-09-05 14:37:10'),
(18, 'Stanley Schumm I', 8, 19, '1997-11-15 08:26:55', '2003-04-12 22:57:37'),
(19, 'Amaya Kertzmann', 10, 8, '2001-06-18 07:24:22', '2001-12-23 13:26:11'),
(20, 'Kallie Schuppe', 2, 4, '1995-08-08 01:54:07', '1995-02-14 07:38:55');

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2017_03_21_173315_create_categories_table', 1),
(14, '2017_03_21_173433_create_menus_table', 1),
(15, '2017_03_21_173457_create_news_table', 1),
(16, '2017_03_21_173508_create_products_table', 1),
(17, '2017_03_21_173524_create_product_custom_fields_table', 1),
(18, '2017_03_21_173538_create_custom_fields_table', 1),
(19, '2017_03_26_050923_create_orders_table', 1),
(20, '2017_03_26_052736_create_customers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `description`, `parent_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Marlee Powlowski', '98611026', 'Placeat alias nobis quis eveniet hic at. Iusto ex dolore fugit maxime sit. Laboriosam et dolorem sed et rerum. Enim deleniti consequatur veritatis.', 13, 16, '1979-08-04 16:46:58', '1990-03-22 02:19:48'),
(2, 'Everette Witting', '629937021', 'Facere sapiente sed et tempora ut eligendi. Qui facere amet eum. Eum fugit est assumenda pariatur sit voluptate. Dolor esse eos expedita enim molestiae rerum autem.\nOmnis quod dolores et deleniti aut ea. Cupiditate voluptatem velit architecto autem. Veniam expedita numquam aspernatur.', 7, 10, '1981-02-01 13:57:50', '1993-04-27 13:52:47'),
(3, 'Claud Bogan', '76858223', 'Perspiciatis fugiat consequuntur dolorem repellat suscipit. Voluptates neque perspiciatis quam eligendi aut modi doloribus. Voluptatem autem sit eveniet numquam hic.\nRecusandae debitis officiis numquam sit. Qui aliquid quo sed accusamus qui commodi dolores et.', 13, 4, '2008-11-14 20:42:18', '1983-02-13 04:09:14'),
(4, 'Merritt Cole', '276358588', 'Harum ea magnam tempora officiis quibusdam et. Doloremque officia dignissimos qui et ullam qui aspernatur.\nEst suscipit expedita doloremque illum ipsam et. Vel dignissimos fuga fuga pariatur quo rerum neque. Assumenda minus optio dolores amet doloremque impedit ipsam.', 15, 8, '1970-06-01 17:52:53', '2011-01-24 06:10:42'),
(5, 'Burley Conroy', '260572972', 'Sed quo ex dicta maiores praesentium. Ipsum libero non adipisci non quia. Natus ullam vitae quo consequatur explicabo numquam quos provident. Et necessitatibus voluptatem quisquam veritatis.', 3, 3, '1976-09-12 12:14:44', '1979-12-12 23:36:03'),
(6, 'Fidel Prosacco II', '612580513', 'Dolorum est aut voluptas iste. Nobis quas autem non assumenda est facere. Voluptatem aliquam impedit eveniet qui. Quia rerum aliquid et temporibus eos architecto rem quia.', 10, 5, '2009-08-02 08:15:58', '2006-03-09 21:39:31'),
(7, 'Ms. Camilla Schmidt II', '431026618', 'Fugit non et omnis harum sapiente cum. Sunt reprehenderit dignissimos quia sunt autem. Quis quia et illo enim in inventore. Atque omnis rerum voluptas ipsa perspiciatis sed.', 4, 7, '1978-06-20 01:56:31', '2004-05-07 16:32:45'),
(8, 'Conor Reynolds', '146336661', 'Eum incidunt ad voluptas impedit quis sunt. Nihil aliquid iure illo vel ut reprehenderit excepturi. Aut et sed et a placeat.\nUt provident eum ut laudantium aut. Ea at iure neque et. Ullam laboriosam similique recusandae harum sit quidem. Laudantium et quia est eaque.', 14, 8, '2002-05-03 16:21:10', '1977-06-01 10:59:45'),
(9, 'Maegan Schulist IV', '327556580', 'Laudantium sint error et voluptas praesentium neque debitis. Sunt autem minima omnis ea perferendis nobis. Repudiandae quo corrupti voluptatibus numquam aut officiis.\nEt iste veritatis omnis quisquam. Minima quos unde esse architecto cupiditate perferendis hic. Accusantium eos atque excepturi.', 13, 13, '2012-09-06 10:04:04', '2008-06-24 12:42:50'),
(10, 'Cyrus Herman', '814351967', 'Sint eum temporibus aperiam ut. Iusto ullam quis voluptas maiores amet quis repellat quia. Ducimus odio est aut.\nSoluta placeat quia quam facere qui. Necessitatibus quo sit sunt eum. Et alias excepturi quia eveniet ex aspernatur ut. Illum minima aut incidunt repellendus.', 18, 4, '2008-09-04 05:40:45', '2010-08-09 00:20:46'),
(11, 'Libby Hauck', '488644516', 'Suscipit aut odio velit voluptates ab. Ex unde minima quas quam doloremque mollitia eveniet est. Molestias in totam eveniet harum magnam qui repudiandae. Amet non provident nostrum voluptates.', 15, 1, '2006-01-13 10:52:33', '1992-09-02 05:19:36'),
(12, 'Joel Rau', '526448853', 'In perferendis commodi sequi id rem reprehenderit est dolorem. Corporis ea exercitationem aliquid fugiat amet nam. Magni neque repellendus nisi et eos.', 12, 3, '2008-12-01 11:29:10', '1990-09-05 03:05:31'),
(13, 'Franco Donnelly', '824816961', 'Et neque atque enim rerum sunt hic. Dolorum voluptatem esse similique sunt. Quia accusantium aut tenetur sit in neque deserunt culpa.', 2, 8, '1974-07-05 02:56:43', '2008-09-02 01:39:15'),
(14, 'Prof. Mckayla Kirlin Jr.', '356550974', 'Numquam quas et consequuntur tempora voluptas quas. Dolorem minus at minus itaque aspernatur qui quam aut. Quas ipsam fuga porro soluta voluptates.\nPorro doloremque harum facilis. Earum necessitatibus voluptatibus corrupti fuga est. Non ducimus aut aperiam enim et aliquid.', 6, 15, '2000-09-27 20:16:33', '1992-11-14 03:21:14'),
(15, 'Prof. Julio Daniel', '6792090', 'Repudiandae fugiat veritatis ut consequatur voluptatibus. Voluptatum nesciunt in fugit optio consequuntur expedita. Ea et quia et repellat unde.\nQuod ducimus aspernatur aut. Accusantium odio debitis maxime sint. Dolore at aut explicabo. Et dolorem accusamus exercitationem rem unde libero.', 16, 19, '2014-05-06 07:26:46', '1982-05-31 03:40:01'),
(16, 'Tate Corwin', '56210839', 'Natus ducimus qui dicta et est. Et ut laudantium reiciendis esse animi hic voluptatem. Nostrum consequatur autem aut odit et sit sapiente perspiciatis. Alias impedit optio autem quia.', 19, 10, '2012-10-27 02:22:50', '1971-07-14 06:17:37'),
(17, 'Kyler Mills', '461234072', 'Amet eum veritatis ea nulla. Esse voluptatibus dolor harum nulla dolores quisquam.\nEveniet iste temporibus eum quam corporis vitae mollitia. Sit a consequuntur illo est nisi sed. Quo beatae culpa minus. Aut dolor consectetur debitis quis est iste saepe.', 14, 1, '1981-10-20 23:31:00', '2006-06-23 09:19:50'),
(18, 'Arden Nader', '617887445', 'Qui sit ut quam vel odio voluptate omnis quasi. Sit quo et in temporibus dolore facilis. Odio totam ipsa sint.\nAutem veniam non consectetur animi necessitatibus. Et eos et et fugiat fuga sit. Enim voluptatum laborum esse autem. Voluptas natus et velit vitae mollitia velit eos.', 15, 3, '2001-03-13 08:44:23', '2003-01-14 00:19:53'),
(19, 'Alessia Yundt', '236567446', 'Laudantium officia voluptas voluptatem ipsam molestiae. Ut deserunt ut exercitationem id fugiat nam. Minima cupiditate non corrupti ipsa ea omnis.\nDolore asperiores inventore eum voluptatibus quam. Ut sint saepe voluptatem amet et. Et dicta quidem aut id.', 5, 11, '1980-05-09 14:03:12', '1971-12-24 16:11:53'),
(20, 'Jo Wehner', '548033804', 'Ut dicta enim qui fuga voluptate. Exercitationem unde in consequatur et ipsam doloremque. Voluptatem quia fugiat eligendi fugiat corporis non recusandae.\nEt optio dignissimos placeat facilis. Numquam deserunt ad nesciunt omnis delectus similique. Aut rem eaque provident maiores expedita.', 16, 13, '1992-03-02 19:09:36', '1971-05-17 16:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receiver_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `information` text COLLATE utf8mb4_unicode_ci,
  `bank_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_status` tinyint(4) NOT NULL,
  `voucher_percent` int(11) DEFAULT NULL,
  `voucher_money` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_info` text COLLATE utf8mb4_unicode_ci,
  `tax_amount` int(11) DEFAULT NULL,
  `discount_amount` int(11) DEFAULT NULL,
  `free_shipping` int(11) DEFAULT NULL,
  `order_description` text COLLATE utf8mb4_unicode_ci,
  `payment_id` int(11) DEFAULT NULL,
  `error_text` text COLLATE utf8mb4_unicode_ci,
  `secure_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buyer_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buyer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `receiver_email`, `order_code`, `payment_type`, `payment_method`, `total_amount`, `price`, `information`, `bank_code`, `transaction_status`, `voucher_percent`, `voucher_money`, `customer_id`, `transaction_info`, `tax_amount`, `discount_amount`, `free_shipping`, `order_description`, `payment_id`, `error_text`, `secure_code`, `buyer_mobile`, `buyer_name`, `buyer_email`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Cooper Bartell', 'moen.onie@example.org', '1c232b7104ba423457cad015f7bb42c8', '1', 'There was no label.', 5, NULL, NULL, '5575796271099092', 4, 42, 1096156, 10, 'Modi hic voluptas dolores nostrum et quo. Perferendis sed aspernatur facere qui qui. Quo odio sit nisi deserunt.', 6702, 3518, 405, 'Hatter went on, turning to Alice with one of the Mock Turtle. Alice was very hot, she kept tossing the baby joined):-- \'Wow! wow! wow!\' \'Here! you may stand down,\' continued the King. (The jury all.', 68668879, 'Praesentium dolor ducimus sunt officia maxime eos. Rerum rerum occaecati sunt omnis hic. Omnis adipisci id temporibus at et qui. Eos magnam voluptas vel aut ab vel illo.', '77390', 'Quae.', 'Alexandria Hamill Jr.', 'gina69@example.net', 12, '1972-06-30 10:16:01', '1981-10-29 01:13:44'),
(4, 'Alexane Huel', 'albina57@example.org', 'e8ee5019db55997df6add25966fa7b66', '2', 'King. \'When did.', 2987, NULL, NULL, '4916164252968937', 3, 25, 68742, 16, 'Necessitatibus saepe eligendi nisi ipsam quasi est animi. Laudantium consequatur voluptates quia vel temporibus. Facilis ullam reprehenderit cumque aliquam dignissimos ratione.', 8403, 5326, 567, 'Alice began telling them her adventures from the sky! Ugh, Serpent!\' \'But I\'m NOT a serpent, I tell you!\' said Alice. \'Of course it is,\' said the Duchess, the Duchess! Oh! won\'t she be savage if.', 26529073, 'Optio facilis assumenda non minus. Omnis mollitia tenetur id ut incidunt assumenda eaque. Saepe sapiente delectus velit soluta dolor delectus.', '87474', 'Quod.', 'Mr. Derick Watsica', 'emmanuel.denesik@example.org', 18, '2006-09-19 12:07:46', '2002-06-03 11:44:47'),
(5, 'Kaden Champlin', 'maynard47@example.org', '8aadb02b488d727363e3877bae188b00', '4', 'Gryphon, and the.', 30854, NULL, NULL, '5110254778691575', 2, 11, 4260170, 14, 'Perferendis a dolor eaque numquam fugit ipsa sapiente. Non reiciendis aut eum corporis voluptatem dolorem. Eos pariatur sequi magnam. Aspernatur repudiandae aut molestiae aliquid et.', 8998, 5556, 850, 'Hatter: \'but you could draw treacle out of the Lobster; I heard him declare, \"You have baked me too brown, I must sugar my hair.\" As a duck with its wings. \'Serpent!\' screamed the Gryphon. \'--you.', 16957190, 'Recusandae sed quia quibusdam voluptas qui. Ratione cupiditate omnis harum nihil veritatis. Cupiditate eum aut voluptatem.', '48825', 'Ut.', 'Sylvia Ferry', 'ashley07@example.com', 12, '2001-09-10 05:26:41', '1996-07-17 07:58:14'),
(8, 'Terence VonRueden', 'beatty.zackary@example.net', '26e3dcb90aa10011db5b660c463f325f', '4', 'Poor Alice! It was.', 1798098, NULL, NULL, '4024007141464', 1, 64, 8988089, 7, 'Quibusdam eligendi et quis eaque id. In blanditiis adipisci amet est non eum. Velit nostrum voluptate distinctio et ut deserunt nihil provident. Veniam voluptas autem amet consectetur.', 6826, 7719, 569, 'And it\'ll fetch things when you come to the executioner: \'fetch her here.\' And the muscular strength, which it gave to my jaw, Has lasted the rest of the baby?\' said the March Hare. \'Then it ought.', 12718049, 'Tenetur maxime quos blanditiis. Enim non dolorem omnis nostrum porro. Aliquid recusandae eius corrupti aut et ipsam.', '52336', 'Vero.', 'Prof. Al Carroll', 'daisha.stokes@example.net', 16, '2004-06-07 23:20:17', '1985-08-31 13:47:21'),
(11, 'Mr. Herbert Price', 'austyn.wintheiser@example.com', '5409d94570540a9c8f0e83ddd73e2453', '3', 'And she kept on.', 37, NULL, NULL, '5252542799412544', 2, 59, 443117, 2, 'Vero voluptatem facilis praesentium ipsum excepturi corrupti. Reprehenderit aspernatur odio dicta iusto nesciunt. Eveniet nemo ratione sed tenetur omnis ipsum quia.', 1682, 4268, 561, 'Alice; \'and I do so like that curious song about the same size for going through the door, and tried to curtsey as she could, and soon found an opportunity of saying to her daughter \'Ah, my dear! I.', 33127100, 'Eligendi debitis nihil quia iste. Molestias eos dolor eligendi tempora vel et doloribus. Aut accusamus tenetur culpa illum dolores. Temporibus sunt aut eaque.', '59042-1598', 'Non.', 'Brody Davis', 'robin25@example.com', 4, '1972-06-13 02:25:30', '1970-07-06 01:32:21'),
(13, 'Anastacio Douglas', 'qjerde@example.com', 'a2b53cfbd17eb7ae025f4088b1410242', '2', 'Alice. One of the.', 9, NULL, NULL, '6011129693667934', 2, 18, 2869090, 19, 'Omnis adipisci error voluptas vitae et nihil earum in. Vel et delectus est dolores voluptates optio. Dolores voluptatem dignissimos accusamus esse.', 6426, 6457, 536, 'IS it to annoy, Because he knows it teases.\' CHORUS. (In which the cook and the Queen had ordered. They very soon finished it off. \'If everybody minded their own business!\' \'Ah, well! It means much.', 32496855, 'Et et et eveniet perferendis impedit consequatur facilis. Quo itaque voluptatem dolore molestiae qui. Libero ut et aut ducimus voluptatem.', '14656-2004', 'Sint ut.', 'Mrs. Rachael Jerde', 'clifton85@example.net', 4, '1994-11-13 20:14:33', '1986-02-01 04:06:23'),
(16, 'Isom Christiansen', 'jamel.casper@example.net', '0f7e4cc2ada40c840ed40083f42374c3', '3', 'Alice. \'I\'ve tried.', 128, NULL, NULL, '5366751943663950', 2, 54, 1532615, 15, 'Veniam reiciendis facilis quasi delectus libero in molestias maxime. Est alias sed amet atque omnis voluptas eveniet voluptatum. Est consequatur eius a repellat molestias facilis ab.', 2494, 9454, 660, 'I wonder who will put on your head-- Do you think I should think it so VERY tired of this. I vote the young lady tells us a story.\' \'I\'m afraid I can\'t get out again. The Mock Turtle to sing.', 30956690, 'Ullam dolorem dicta eum et. Quia id ab voluptates. Eos placeat velit aut reiciendis. Molestias non a ut et veritatis qui voluptate. Amet quaerat harum et tempora rem tempora.', '91305', 'Enim.', 'Gavin Yost', 'martina.hettinger@example.net', 4, '2009-12-28 07:36:34', '1994-02-26 21:50:51'),
(18, 'Sincere Hermiston', 'marcelo24@example.net', '77bd061c0e645ca42b087a6d0d06c019', '1', 'Mock Turtle,.', 1322882, NULL, NULL, '4089538652704532', 4, 44, 5403584, 20, 'Expedita assumenda hic voluptatem voluptatum libero atque. Voluptas voluptatem animi et qui quia mollitia eos. Voluptas officiis dolor quae sit non quaerat.', 1587, 5845, 427, 'I don\'t understand. Where did they live on?\' said the White Rabbit put on your head-- Do you think, at your age, it is right?\' \'In my youth,\' said his father, \'I took to the Dormouse, after thinking.', 99194797, 'Animi porro quibusdam optio aut eum sint. Voluptate nemo dignissimos ipsa illo et cupiditate. Iusto velit ratione aut magni. Animi impedit quis qui earum. Autem sequi officiis omnis neque quaerat.', '31776', 'Minus et.', 'Cristina Ferry', 'aylin89@example.net', 18, '1978-08-17 22:40:09', '1989-11-30 03:08:01'),
(19, 'Emilio Leuschke', 'casper.jadyn@example.net', '9de25e2edc4bee81f551ccd91f5a3ab4', '3', 'Soup, so rich and.', 85702656, NULL, NULL, '6011043170365427', 2, 42, 3342458, 20, 'Voluptatem facere incidunt sit non id. Deleniti est autem consectetur aspernatur. Ut tenetur qui provident dolorem unde et excepturi.', 3515, 3763, 710, 'I shall be late!\' (when she thought of herself, \'I don\'t think--\' \'Then you may SIT down,\' the King was the BEST butter,\' the March Hare was said to the jury. \'Not yet, not yet!\' the Rabbit coming.', 30810788, 'Sapiente et ducimus quia odit id eligendi rem. Aut et temporibus voluptatibus sint. Qui minima dignissimos voluptatem.', '48678', 'Quis.', 'Hillard Balistreri', 'charlotte.paucek@example.com', 12, '2003-12-13 18:43:30', '1983-04-23 09:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keyword` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `type`, `images`, `keyword`, `description`, `user_id`, `cate_id`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Prof. Dion Wuckert', '972942030', 'Johns Inc', 'http://lorempixel.com/640/480/?31277', 'atque neque qui illo id consequuntur rem omnis. a facere est et velit et. et sed esse modi error omnis iste eos enim. ab assumenda debitis ducimus.', 'Quo quo est rerum numquam at. Atque est sit voluptates architecto ullam aut. Vero est assumenda et nobis qui consequatur tenetur. Sed nisi magni ipsum quis laborum.', 10, 14, 18, '1995-01-22 09:45:39', '1990-12-30 02:54:52'),
(2, 'Treva Huels', '776010160', 'Walker, Bins and Larson', 'http://lorempixel.com/640/480/?53389', 'minus necessitatibus error quam. repellendus dolores dolores qui commodi illo quasi dolorum non. recusandae omnis delectus non libero placeat mollitia dolorum aut. similique eveniet aut aliquam et.', 'Reprehenderit sapiente sit eum numquam labore molestiae quis. Aut quisquam et voluptatem autem dolores quis. Quia iste ab et molestiae et.', 18, 10, 9, '1997-04-29 08:22:02', '2006-08-20 07:01:56'),
(4, 'Oda Waelchi V', '253626169', 'Fahey Group', 'http://lorempixel.com/640/480/?98771', 'aut reiciendis autem repellendus enim. enim quibusdam deserunt quo quia qui. fugit deserunt quos cupiditate officia perferendis et qui dolore. sit voluptas et molestias molestiae mollitia nostrum.', 'Et in voluptates quidem dolorem ut cum expedita. Voluptatibus soluta quos itaque consequatur natus qui quasi. Dolor ad ex quis dolorem. Et possimus omnis omnis cumque aut.', 18, 10, 19, '1995-01-01 09:55:29', '1995-11-28 09:24:09'),
(6, 'Mr. Daren Rogahn', '524020057', 'Jacobi, Bauch and Goyette', 'http://lorempixel.com/640/480/?32444', 'nesciunt aut sed et ab alias fugit ut eveniet. aut provident voluptas deleniti tempore. alias veniam temporibus consequuntur quia est nostrum accusamus.', 'Enim non et tempora dolores magni eos neque. Magnam excepturi quasi soluta qui aut et. Voluptas architecto facilis ex fuga error iste ullam. Alias quod aut nulla sint excepturi illum.', 7, 11, 7, '1972-12-22 02:01:55', '1990-11-11 08:21:34'),
(8, 'Mrs. Berniece Hudson IV', '386173590', 'Lang, Greenfelder and Hintz', 'http://lorempixel.com/640/480/?70936', 'voluptates aliquid provident minus molestias dignissimos fuga nisi reiciendis. corrupti at nam aperiam. hic et nisi recusandae itaque ut ullam.', 'Aperiam culpa aut veniam placeat quas fuga eveniet. Molestias quam inventore aut praesentium nihil. Ullam nobis eligendi ut dolor excepturi molestiae debitis.', 8, 17, 2, '2013-03-10 18:26:11', '2009-01-28 11:56:00'),
(9, 'Prof. Ezra Schuppe', '439279584', 'Eichmann-Rice', 'http://lorempixel.com/640/480/?46451', 'perferendis molestiae impedit consectetur voluptas. qui vero sed aut atque omnis. sint eaque error officia rerum soluta porro.', 'Voluptas dicta eos animi sit expedita animi sunt. Necessitatibus et esse nemo rem sapiente consequatur. Cum sequi voluptatem non quasi assumenda sint.', 12, 14, 14, '1971-08-05 21:57:32', '1992-03-17 16:05:20'),
(12, 'Jess Boehm', '194771137', 'Howell-Buckridge', 'http://lorempixel.com/640/480/?10432', 'vel sint id modi. labore asperiores ut non. officiis nulla est veniam in quis voluptatibus asperiores.\nvelit quia eum possimus ut minima. omnis aut temporibus est quisquam ab ea impedit quos.', 'Praesentium quasi cupiditate laudantium asperiores. Sequi et adipisci aliquam enim qui voluptates. Aliquam quia fugit illum exercitationem et possimus ad laboriosam.', 16, 5, 1, '1989-02-22 20:24:59', '1984-01-18 22:15:22'),
(13, 'Brenda Bradtke', '483601878', 'Armstrong Inc', 'http://lorempixel.com/640/480/?77107', 'labore voluptas vel sit quis velit libero eos. veritatis totam eum consequatur magni sequi. dicta sit magni est incidunt cupiditate dicta nihil. aut labore dolorum ad velit dignissimos aut.', 'Et voluptates provident odit. Ea reiciendis dignissimos ut et. Vitae enim quas velit alias. Non ratione consequatur quos sequi ut velit voluptatem ut.', 13, 19, 17, '1988-12-11 01:49:17', '1982-02-12 21:46:45'),
(14, 'Juston Schmitt', '44945544', 'Brakus and Sons', 'http://lorempixel.com/640/480/?86552', 'sed aspernatur at accusamus modi ipsum et. voluptas similique non deleniti dolorem. quia eligendi aut amet quo minima.', 'Molestias eum eius voluptatem est labore veritatis. At numquam nulla rerum alias ullam consequuntur. Aut est aut consectetur harum sint et et.', 7, 14, 19, '1982-08-28 20:21:15', '1999-07-25 13:21:52'),
(15, 'Alva Spinka', '554905346', 'Shanahan, Crona and Abshire', 'http://lorempixel.com/640/480/?11958', 'necessitatibus qui sed rerum atque. quo voluptatem aut perspiciatis voluptatem eum asperiores.', 'Non consequatur qui consequatur accusamus sed placeat dicta. Qui qui esse nobis quia qui blanditiis. Veniam quod quibusdam eos non. Unde et magni saepe officiis.', 8, 4, 19, '1989-09-27 06:42:34', '1991-09-09 10:43:26'),
(17, 'Brenda Brekke DDS', '349396703', 'Hettinger, Carroll and Fisher', 'http://lorempixel.com/640/480/?66697', 'deleniti eligendi recusandae aut libero corrupti. delectus dicta ut tempore non consequatur. fugit perferendis illo qui debitis alias et.', 'Assumenda non deleniti cum consectetur rerum dolorem. Ad sint in eaque esse quidem. Veritatis sunt repellendus sapiente.', 10, 8, 9, '2005-07-26 10:40:42', '1980-11-04 07:27:42'),
(18, 'Moshe Weimann', '559836809', 'Lowe, Harris and Maggio', 'http://lorempixel.com/640/480/?21723', 'quia ipsam quae tenetur. blanditiis accusantium sequi est explicabo voluptas. dolorum voluptatem qui autem et ut aut alias. maxime sapiente quisquam enim sit.', 'Et soluta quam repellendus. Ipsam fugit occaecati aut cupiditate libero et. Deserunt nihil in aut aut quia error consequatur. Et et voluptatibus eaque ullam et.', 13, 4, 14, '1985-03-31 09:48:33', '2007-05-23 17:47:15');

-- --------------------------------------------------------

--
-- Table structure for table `product_custom_fields`
--

CREATE TABLE `product_custom_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `custom_field_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_custom_fields`
--

INSERT INTO `product_custom_fields` (`id`, `custom_field_id`, `product_id`) VALUES
(1, 5, 9),
(3, 3, 2),
(4, 3, 8),
(7, 5, 9),
(8, 10, 1),
(9, 17, 18),
(10, 4, 13),
(11, 18, 13),
(12, 17, 6),
(16, 17, 17),
(18, 20, 13),
(19, 7, 6),
(20, 19, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total_money` int(11) DEFAULT NULL,
  `confirm_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `email`, `address`, `gender`, `description`, `total_money`, `confirm_code`, `confirmed`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Dr. Cora Strosin', 'akkerise', '$2y$10$cQZI3OFni8XV3LxH0imkHeFv.hunCgfIckZCXMDZd2a19NrUzeyVi', 'akkerise@gmail.com', '2147 Leffler Lodge Apt. 835\nMarciamouth, AR 25090', 1, 'Omnis voluptatem exercitationem reiciendis iste quaerat. Quas dolore eos ullam incidunt. Aperiam ipsa ipsa rerum quos ad voluptas rerum. Optio dolores reiciendis voluptas doloribus accusantium.', 830264361, '$2y$10$l7R2OqcKNWZPvzOITyjG5.G09Fov9mJ6PieZ0.VOz06hrDdvgZUBO', 1, 1, 'lR1x99j0n37JHQbFdw7CFdXozFeogkACQRbewNHgbLZZ9MJXk3YDRzLNDNsq', '2005-05-29 07:54:58', '2017-04-23 01:44:48'),
(7, 'Mrs. Janiya Carroll', 'uhowell', '&2;M,dr_TX@|E#-:&Ic', 'wiegand.horacio@example.net', '8390 Johnson Garden\nNorth Walker, ID 79721-9554', 2, 'In aperiam ut commodi. Iure quod minus et est voluptas. Qui veniam velit et amet quis dignissimos odit.', 656987847, '$2y$10$eW/aOtZz5bCUDQ1M/xTsYueGF6F0T/Grib4NhLlJSDg0MwqxZwCgy', 0, 4, 'ea3e41cceb0ee677f514a13b75181ce3b943885c733809444544a3de74a52a94', '1985-12-12 12:29:15', '1972-10-17 18:55:50'),
(8, 'Alva Johns', 'zemmerich', 'xn}&9lT]s7ed-e', 'vince.ondricka@example.org', '54860 Mercedes Creek Suite 825\nPort Robbiehaven, NJ 03128', 1, 'Iure aut deleniti et corporis. Quia illum iure esse.\nMinus et ab ipsam suscipit. Dolor quisquam a similique tempora maxime vel sed. Earum quas tenetur maxime doloremque beatae voluptatem.', 308095725, '$2y$10$wJyX4n6zdPq1SgTYtBWG5up.d5PG6vl6Y.uU9.wxxqarGOuNJXI3i', 0, 2, '0f3b47b98184bf4b257e76a84c8c778d91d220bc4fdc8e2ae58d51f2fb66e317', '1977-12-20 18:50:11', '1976-01-11 04:41:29'),
(9, 'Shawn Bruen Sr.', 'peggie79', 'eu\\){WhbBg|TW.B<K', 'nettie.corwin@example.com', '523 Spinka Cove\nWardchester, LA 07946-2663', 3, 'Occaecati voluptas nesciunt voluptate perspiciatis ab occaecati aliquam. Minima culpa sit deserunt debitis. Excepturi id est ut autem magnam quis doloremque atque.', 272545796, '$2y$10$biZryDTYw25k60e/sv.dfumLBKiAaRzgoTjO.1m7pRIpDphNzM0eG', 0, 4, 'bc550aa9a82b90c3c6f6b1652399084de849af4298b854c703f82951f925f975', '1996-11-30 14:45:46', '1979-10-09 22:52:21'),
(10, 'Gay Ernser', 'haag.ricky', 'Dgefa>-$', 'damore.zola@example.com', '336 Marcelina Shores\nLeannonview, OR 51896-4152', 3, 'Est inventore occaecati voluptatem est. Quis voluptates sunt dolorem repudiandae voluptas quas ipsam. Numquam et nihil nostrum eum pariatur est et.', 536946511, '$2y$10$ds858I.VKFGDD2o/KsMFVu3c9XCJZjlPv9ldy/KLouvrQvhBBwDFS', 0, 2, '167db0ac9229f9890bc0dd28b3d0fc3c5460db91aa23bbdc7acff97651241640', '2007-09-29 05:29:03', '2008-08-03 19:18:22'),
(11, 'Verona Gulgowski DVM', 'frederik.krajcik', '#.6#_o8_`zfe6;.', 'greenholt.hattie@example.org', '6722 Tanner Square Suite 246\nTrantowmouth, CT 21870-3150', 4, 'Voluptas nulla ullam quia laudantium voluptatem quaerat. Ducimus harum iure aut ut minus quasi voluptatem. Sed molestiae repudiandae nihil facere quia non laborum.', 482216944, '$2y$10$eIWwqQWgcLy8lXKC57Z2ueZG8rMGR7b.fDPgY4Eh7tGWKR/CUrrv.', 0, 3, 'c9f729908593b76bde4c388bf31f68ac8c2c87286bab85e9cf164af01a5871e8', '1980-08-02 21:51:34', '1978-05-17 13:59:04'),
(12, 'Dr. Destini O\'Keefe', 'pkihn', 'g^):H7Xu', 'flatley.gordon@example.org', '3439 Lou Mountains Apt. 690\nReynoldsborough, WI 94127', 3, 'Ea in placeat in vitae aut officiis in. Nesciunt maxime aut molestias quos commodi. Aliquam ea architecto enim quo quaerat dolore.', 986867221, '$2y$10$42TNhr0FZWnWkrTQjxoA7.R94CGO9GwLuOHgNGA0O7j6DjVLB.aca', 0, 3, '01ed043b3569a521b72a572383ff5785b3c4899586f5f3e6e2367dfbd72565de', '1988-06-14 07:31:03', '1974-10-08 03:29:51'),
(13, 'Leila Kunze II', 'lavonne21', 'kdtf\\:2Nyt.~SbR', 'connie.gleason@example.org', '69781 Kshlerin Hill\nSouth Jalenbury, UT 60902', 3, 'Dolor neque nobis facere voluptas corporis velit. Dolorem suscipit hic itaque sint et. Accusamus assumenda enim eum et quia magnam. Minus quia repellendus incidunt.', 76695493, '$2y$10$/HXlL1D/ozr314VEbYUR..piavw50n5nHw8hIOUvi/uap003ROUOO', 1, 3, '306e0c57ac980c926f5c622e4a56efefafaf9d306b43cf5a7e5f7d659b634f50', '1987-01-06 19:08:23', '1996-09-21 04:27:59'),
(14, 'Vicky Gorczany', 'wehner.tiffany', '}&8A>[?jz', 'ramona96@example.com', '72489 Agustina Dale\nRolfsonhaven, AK 43695-6338', 4, 'Et ratione tenetur nulla. Consequatur totam magnam maxime corporis aliquid adipisci voluptas. At qui rerum unde. Repellendus molestias in eligendi.', 38201385, '$2y$10$Fm1pjaaZPLj.G9Tx6IubMuw9qa0vX.Rrfo5KgPva3rApQz6rh1fBu', 1, 2, 'fc8798b0472d6f13638d48cbf46995e9ae829b710e88a39ac3f6deda359db983', '1992-03-30 17:48:17', '1984-08-07 12:40:14'),
(15, 'Salvador Torphy', 'luella37', '\\Ltl&D#<h&', 'toney71@example.org', '9206 Ali Row\nWest Adolphusland, MS 73866-4232', 3, 'Sed numquam assumenda sit amet voluptas rerum explicabo. Debitis dolorem accusamus inventore omnis quo occaecati ut. Nobis dolorem quod animi et doloribus beatae.', 501050959, '$2y$10$JtNm/.JNEL2ebSEEISdN4eU6I3dd/Zt3Zp.Ff32N1Dp2xcHqjqkXG', 0, 4, '1e7b29abc31e022d1732ff4cc3ea15f06153b99f2dadbdb8ba5f97cc25488987', '1973-04-30 11:44:08', '1977-02-24 05:32:52'),
(16, 'Miss Bernadette Pacocha', 'cornell.weimann', '^[z{&|&i!5Iz?a3Q', 'zreichert@example.org', '60082 Gene Cape Apt. 813\nWest Sherwoodland, GA 70660-0290', 1, 'Modi repudiandae eligendi harum distinctio quaerat. Nulla nostrum odio corrupti laborum provident sed.', 336160400, '$2y$10$YZ7RXbToY6Ar2fOxDCS0c.OFnP2/VQn2rqPTmeOQC.IujPCuzVtHO', 1, 4, '22d3fbfbfdf0fa75162b455df6431db4becdb272aa54c5390b13d9af1a1c00ae', '1975-04-22 02:42:27', '2011-04-24 04:17:17'),
(18, 'Miss Araceli Gleason I', 'xkshlerin', 'bM<G\"na~ZWI9felt`GT', 'casey17@example.com', '52120 Lelah Mountains\nPort Justineshire, ID 89776', 1, 'Quia omnis qui sequi deserunt. Pariatur est doloribus nesciunt quaerat. Natus quis suscipit vel aliquam eius accusamus.', 324492137, '$2y$10$R3xK00XSSD4N0a6z2h0sOOCMbJiZ6KDPclbvPFJQPKNgdupUr1g5y', 1, 4, 'd4f48db977c12e1c8ca3b0e4c95094254f3e2085728d46a1a508f02bb6c5c5f6', '2016-05-22 05:39:31', '1990-01-12 19:57:11'),
(19, 'Raymond Steuber', 'murray.dashawn', '@;,SwBkSipjWS,4`G*', 'yundt.rhianna@example.org', '56354 Leanne Cliff\nBednarton, LA 94861-7038', 4, 'Laboriosam cumque tempora recusandae sed. Velit veniam vero voluptates et. Necessitatibus ipsum voluptatem quibusdam eveniet voluptatem tempora deleniti.', 995974266, '$2y$10$OwRn3c9W9nHOz460Xdziq.tqJCM4fLNZXdeWwHj1v/CnW9P.lf7MG', 0, 4, '89de91f87e028ee752e964c5c11688ee2651dd80a5b1492ab1cda5301af76f60', '2014-04-02 12:52:35', '1977-06-28 23:25:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menus_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `product_custom_fields`
--
ALTER TABLE `product_custom_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_custom_fields_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `product_custom_fields`
--
ALTER TABLE `product_custom_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_custom_fields`
--
ALTER TABLE `product_custom_fields`
  ADD CONSTRAINT `product_custom_fields_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
