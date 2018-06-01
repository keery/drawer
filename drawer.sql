-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Ven 01 Juin 2018 à 11:43
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `drawer`
--

-- --------------------------------------------------------

--
-- Structure de la table `cd_article`
--

CREATE TABLE `cd_article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `id_categorie` int(11) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_article`
--

INSERT INTO `cd_article` (`id`, `titre`, `description`, `auteur`, `active`, `id_categorie`, `date_creation`, `date_update`) VALUES
(12, 'coucou la vie', '<p>Lorem Ipsum</p>', '', 1, 14, '2018-04-24 14:04:12', '2018-05-30 21:20:29');

-- --------------------------------------------------------

--
-- Structure de la table `cd_article_image`
--

CREATE TABLE `cd_article_image` (
  `id` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cd_avis`
--

CREATE TABLE `cd_avis` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cd_categorie_article`
--

CREATE TABLE `cd_categorie_article` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_categorie_article`
--

INSERT INTO `cd_categorie_article` (`id`, `nom`, `active`) VALUES
(1, 'New categ', 1),
(2, 'Ma categ numero 2', 0),
(3, 'Best categ', 0),
(4, 'Ma categ numero 2', 0),
(5, 'Ma categ numero 2', 0),
(6, 'Ma categ numero 2', 0),
(7, 'Ma categ numero 2', 0),
(8, 'Ma categ numero 2', 0),
(9, 'Ma categ numero 2', 0),
(10, 'Ma categ numero 2', 0),
(11, 'Ma categ numero 2', 0),
(12, 'Ma categ numero 2', 0),
(13, 'Ma categ numero 2', 0),
(14, 'Ma categ numero 2', 0),
(15, 'Ma categ numero 2', 0),
(16, 'Ma categ numero 2', 0),
(17, 'Ma categ numero 2', 0),
(18, 'Ma categ numero 2', 0),
(19, 'Ma categ numero 2', 0),
(20, 'Ma categ numero 2', 0),
(21, 'Ma categ numero 2', 0),
(22, 'Ma categ numero 2', 0),
(23, 'Ma categ numero 2', 0),
(24, 'Ma categ numero 2', 0),
(25, 'Ma categ numero 2', 0),
(26, 'Ma categ numero 2', 0),
(27, 'Ma categ numero 2', 0),
(28, 'Ma categ numero 2', 0),
(29, 'Ma categ numero 2', 0),
(30, 'Ma categ numero 2', 0),
(31, 'Ma categ numero 2', 0),
(32, 'Ma categ numero 2', 0),
(33, 'Ma categ numero 2', 0),
(34, 'Ma categ numero 2', 0),
(35, 'Ma categ numero 2', 0),
(36, 'Ma categ numero 2', 0),
(37, 'Ma categ numero 2', 0),
(38, 'Ma categ numero 2', 0),
(39, 'Ma categ numero 2', 0),
(40, 'Ma categ numero 2', 0),
(41, 'Ma categ numero 2', 0),
(42, 'Ma categ numero 2', 0),
(43, 'Ma categ numero 2', 0),
(44, 'Ma categ numero 2', 0),
(45, 'Ma categ numero 2', 0),
(46, 'Ma categ numero 2', 0),
(47, 'Ma categ numero 2', 0),
(48, 'Ma categ numero 2', 0),
(49, 'Ma categ numero 2', 0),
(50, 'Ma categ numero 2', 0),
(51, 'Ma categ numero 2', 0),
(52, 'Ma categ numero 2', 0),
(53, 'Ma categ numero 2', 0),
(54, 'Ma categ numero 2', 0),
(55, 'Ma categ numero 2', 0),
(56, 'Ma categ numero 2', 0),
(57, 'Ma categ numero 2', 0),
(58, 'Ma categ numero 2', 0),
(59, 'Ma categ numero 2', 0),
(60, 'Ma categ numero 2', 0),
(61, 'Ma categ numero 2', 0),
(62, 'Ma categ numero 2', 0),
(63, 'Ma categ numero 2', 0),
(64, 'Ma categ numero 2', 0),
(65, 'Ma categ numero 2', 0),
(66, 'Ma categ numero 2', 0),
(67, 'Ma categ numero 2', 0),
(68, 'Ma categ numero 2', 0),
(69, 'Ma categ numero 2', 0),
(70, 'Ma categ numero 2', 0),
(71, 'Ma categ numero 2', 0),
(72, 'Ma categ numero 2', 0),
(73, 'Ma categ numero 2', 0),
(74, 'Ma categ numero 2', 0),
(75, 'Ma categ numero 2', 0),
(76, 'Ma categ numero 2', 0),
(77, 'Ma categ numero 2', 0),
(78, 'Ma categ numero 2', 0),
(79, 'Ma categ numero 2', 0),
(80, 'Ma categ numero 2', 0),
(81, 'Ma categ numero 2', 0),
(82, 'Ma categ numero 2', 0),
(83, 'Ma categ numero 2', 0),
(84, 'Ma categ numero 2', 0),
(85, 'Ma categ numero 2', 0),
(86, 'Ma categ numero 2', 0),
(87, 'Ma categ numero 2', 0),
(88, 'Ma categ numero 2', 0),
(89, 'Ma categ numero 2', 0),
(90, 'Ma categ numero 2', 0),
(91, 'Ma categ numero 2', 0),
(92, 'Ma categ numero 2', 0),
(93, 'Ma categ numero 2', 0),
(94, 'Ma categ numero 2', 0),
(95, 'Ma categ numero 2', 0),
(96, 'Ma categ numero 2', 0),
(97, 'Ma categ numero 2', 0),
(98, 'Ma categ numero 2', 0),
(99, 'Ma categ numero 2', 0),
(100, 'Ma categ numero 2', 0),
(101, 'Ma categ numero 2', 0),
(102, 'Ma categ numero 2', 0),
(103, 'Ma categ numero 2', 0),
(104, 'Ma categ numero 2', 0),
(105, 'Ma categ numero 2', 0),
(106, 'Ma categ numero 2', 0),
(107, 'Ma categ numero 2', 0),
(108, 'Ma categ numero 2', 0),
(109, 'Ma categ numero 2', 0),
(110, 'Ma categ numero 2', 0),
(111, 'Ma categ numero 2', 0),
(112, 'Ma categ numero 2', 0),
(113, 'Ma categ numero 2', 0),
(114, 'Ma categ numero 2', 0),
(115, 'Ma categ numero 2', 0),
(116, 'Ma categ numero 2', 0),
(117, 'Ma categ numero 2', 0),
(118, 'Ma categ numero 2', 0),
(119, 'Ma categ numero 2', 0),
(120, 'Ma categ numero 2', 0),
(121, 'Ma categ numero 2', 0),
(122, 'Ma categ numero 2', 0),
(123, 'Ma categ numero 2', 0),
(124, 'Ma categ numero 2', 0),
(125, 'Ma categ numero 2', 0),
(126, 'Ma categ numero 2', 0),
(127, 'Ma categ numero 2', 0),
(128, 'Ma categ numero 2', 0),
(129, 'Ma categ numero 2', 0),
(130, 'Ma categ numero 2', 0),
(131, 'Ma categ numero 2', 0),
(132, 'Ma categ numero 2', 0),
(133, 'Ma categ numero 2', 0),
(134, 'Ma categ numero 2', 0),
(135, 'Ma categ numero 2', 0),
(136, 'Ma categ numero 2', 0),
(137, 'Ma categ numero 2', 0),
(138, 'Ma categ numero 2', 0),
(139, 'Ma categ numero 2', 0),
(140, 'Ma categ numero 2', 0),
(141, 'Ma categ numero 2', 0),
(142, 'Ma categ numero 2', 0),
(143, 'Ma categ numero 2', 0),
(144, 'Ma categ numero 2', 0),
(145, 'Ma categ numero 2', 0),
(146, 'Ma categ numero 2', 0),
(147, 'Ma categ numero 2', 0),
(148, 'Ma categ numero 2', 0),
(149, 'Ma categ numero 2', 0),
(150, 'Ma categ numero 2', 0),
(151, 'Ma categ numero 2', 0),
(152, 'Ma categ numero 2', 0),
(153, 'Ma categ numero 2', 0),
(154, 'Ma categ numero 2', 0),
(155, 'Ma categ numero 2', 0),
(156, 'Ma categ numero 2', 0),
(157, 'Ma categ numero 2', 0),
(158, 'Ma categ numero 2', 0),
(159, 'Ma categ numero 2', 0),
(160, 'Ma categ numero 2', 0),
(161, 'Ma categ numero 2', 0),
(162, 'Ma categ numero 2', 0),
(163, 'Ma categ numero 2', 0),
(164, 'Ma categ numero 2', 0),
(165, 'Ma categ numero 2', 0),
(166, 'Ma categ numero 2', 0),
(167, 'Ma categ numero 2', 0),
(168, 'Ma categ numero 2', 0),
(169, 'Ma categ numero 2', 0),
(170, 'Ma categ numero 2', 0),
(171, 'Ma categ numero 2', 0);

-- --------------------------------------------------------

--
-- Structure de la table `cd_commentaire`
--

CREATE TABLE `cd_commentaire` (
  `id` int(11) NOT NULL,
  `texte` text COLLATE utf8_unicode_ci NOT NULL,
  `date_creation` timestamp NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cd_image`
--

CREATE TABLE `cd_image` (
  `id` int(11) NOT NULL,
  `src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_image`
--

INSERT INTO `cd_image` (`id`, `src`, `title`, `alt`, `position`, `id_article`) VALUES
(1, '5ae1a08faaa82.png', NULL, NULL, NULL, NULL),
(2, '5ae1a0f77bfeb.png', NULL, NULL, NULL, NULL),
(3, '5ae1a13c679cb.png', NULL, NULL, NULL, NULL),
(4, '5ae1a15e47797.png', NULL, NULL, NULL, NULL),
(5, '5ae1a19b48fbc.png', NULL, NULL, NULL, NULL),
(6, '5ae1a3adb89f5.png', NULL, NULL, NULL, NULL),
(7, '5ae1a4d0b9209.png', NULL, NULL, NULL, NULL),
(8, '5ae1a50261923.png', NULL, NULL, NULL, NULL),
(9, '5ae1a5cdeb9d4.png', NULL, NULL, NULL, NULL),
(10, '5ae1a5f0b2de0.png', NULL, NULL, NULL, NULL),
(11, '5ae1a6cddd154.png', NULL, NULL, NULL, NULL),
(12, '5ae1a6e010645.png', NULL, NULL, NULL, NULL),
(13, '5ae1a7028b35e.png', NULL, NULL, NULL, NULL),
(14, '5ae1a70f62071.png', NULL, NULL, NULL, NULL),
(15, '5ae1a72bda1e9.png', NULL, NULL, NULL, NULL),
(16, '5ae1a74ef29fe.png', NULL, NULL, NULL, NULL),
(17, '5ae1a79180e94.png', NULL, NULL, NULL, NULL),
(18, '5ae1a7e57b77c.png', NULL, NULL, NULL, NULL),
(19, '5ae1a80c9ef97.png', NULL, NULL, NULL, NULL),
(20, '5ae1a87dba01d.png', NULL, NULL, NULL, NULL),
(21, '5ae1a8b424c79.png', NULL, NULL, NULL, NULL),
(22, '5ae1a8dc7daf7.png', NULL, NULL, NULL, NULL),
(23, '5ae1a90e68125.png', NULL, NULL, NULL, NULL),
(24, '5ae1a938d1f2b.png', NULL, NULL, NULL, NULL),
(25, '5ae1a93f5d15c.png', NULL, NULL, NULL, NULL),
(26, '5ae1a967a3a4d.png', NULL, NULL, NULL, NULL),
(27, '5ae1a967b0ce3.png', NULL, NULL, NULL, NULL),
(28, '5ae1aafe922ea.png', NULL, NULL, NULL, NULL),
(29, '5ae1aafe9eec5.png', NULL, NULL, NULL, NULL),
(30, '5ae1ab53d076d.png', NULL, NULL, NULL, NULL),
(31, '5ae1ab53dcfaf.png', NULL, NULL, NULL, NULL),
(32, '5ae1ab935eab3.png', NULL, NULL, NULL, NULL),
(33, '5ae1ab936f91f.png', NULL, NULL, NULL, NULL),
(34, '5ae1abd7967f7.png', NULL, NULL, NULL, NULL),
(35, '5ae1abe6a5a7b.png', NULL, NULL, NULL, NULL),
(36, '5ae1acbd433d0.png', NULL, NULL, NULL, NULL),
(37, '5ae1acd4b94f6.png', NULL, NULL, NULL, NULL),
(38, '5ae1acfc403ea.png', NULL, NULL, NULL, NULL),
(39, '5ae1ad1415302.png', NULL, NULL, NULL, NULL),
(40, '5ae1ae58746ef.png', NULL, NULL, NULL, NULL),
(41, '5ae1ae9a7fd76.png', NULL, NULL, NULL, NULL),
(42, '5ae1ae9f9356d.png', NULL, NULL, NULL, NULL),
(43, '5ae1aeb10ce92.png', NULL, NULL, NULL, NULL),
(44, '5ae1aeb11f0fb.png', NULL, NULL, NULL, NULL),
(45, '5ae1aeec790bb.png', NULL, NULL, NULL, NULL),
(46, '5ae1aeec91f6a.png', NULL, NULL, NULL, NULL),
(47, '5ae1af0c7a15c.png', NULL, NULL, NULL, NULL),
(48, '5ae1af0c88044.png', NULL, NULL, NULL, NULL),
(49, '5ae1af27c3f44.png', NULL, NULL, NULL, NULL),
(50, '5ae1af27d9fd4.png', NULL, NULL, NULL, NULL),
(51, '5ae1af5e5e232.png', NULL, NULL, NULL, NULL),
(52, '5ae1af5e77509.png', NULL, NULL, NULL, NULL),
(53, '5ae1aff02303e.png', NULL, NULL, NULL, NULL),
(54, '5ae1aff030c58.png', NULL, NULL, NULL, NULL),
(55, '5ae1b01c13ce6.png', NULL, NULL, NULL, NULL),
(56, '5ae1b01c21893.png', NULL, NULL, NULL, NULL),
(57, '5ae1b02a14f0b.png', NULL, NULL, NULL, NULL),
(58, '5ae1b02a235f9.png', NULL, NULL, NULL, NULL),
(59, '5ae1b0b928125.png', NULL, NULL, NULL, NULL),
(60, '5ae1b0c1925a0.png', NULL, NULL, NULL, NULL),
(61, '5ae1b0c25707f.png', NULL, NULL, NULL, NULL),
(62, '5ae1b0c37472f.png', NULL, NULL, NULL, NULL),
(63, '5ae31b49ddba6.png', NULL, NULL, NULL, NULL),
(64, '5ae31b59b7f0a.png', NULL, NULL, NULL, NULL),
(65, '5ae31b8d7279b.jpeg', NULL, NULL, NULL, NULL),
(66, '5ae31b8dc2f85.jpeg', NULL, NULL, NULL, NULL),
(67, '5ae31b8dcbcb5.jpeg', NULL, NULL, NULL, NULL),
(68, '5ae31b8dd2eb7.jpeg', NULL, NULL, NULL, NULL),
(69, '5ae31b8ddd634.jpeg', NULL, NULL, NULL, NULL),
(70, '5ae31bba1b4ff.jpeg', NULL, NULL, NULL, NULL),
(71, '5ae31bba2b2e4.jpeg', NULL, NULL, NULL, NULL),
(72, '5ae31bba429a4.jpeg', NULL, NULL, NULL, NULL),
(73, '5ae31bba54d1f.jpeg', NULL, NULL, NULL, NULL),
(74, '5ae31bba7b508.jpeg', NULL, NULL, NULL, NULL),
(75, '5ae31bde7569b.jpeg', NULL, NULL, NULL, NULL),
(76, '5ae31bdec0261.jpeg', NULL, NULL, NULL, NULL),
(77, '5ae31bdec48b3.jpeg', NULL, NULL, NULL, NULL),
(78, '5ae31bdec7d49.jpeg', NULL, NULL, NULL, NULL),
(79, '5ae31bdeea490.jpeg', NULL, NULL, NULL, NULL),
(80, '5ae329c093ed4.jpeg', NULL, NULL, NULL, NULL),
(81, '5ae329c0c577a.jpeg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cd_infosite`
--

CREATE TABLE `cd_infosite` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cd_page`
--

CREATE TABLE `cd_page` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_page`
--

INSERT INTO `cd_page` (`id`, `id_parent`, `titre`, `description`, `url`, `active`, `date_creation`) VALUES
(1, NULL, 'tecdsqf', '<p>qdsfsdf</p>', 'test', 1, '2018-05-30 16:06:18'),
(2, 1, 'coucou', NULL, 'dqfdsf', 1, '2018-05-30 16:06:52'),
(3, NULL, 'kikito', NULL, 'dfqdsf', 1, '2018-05-30 17:07:07'),
(4, 2, 'azertyuiop', NULL, 'azertyuiop', 1, '2018-05-30 18:08:22'),
(5, 4, 'niveau 4', '<p>sqdfdsf</p>', 'sqfdbnv', 1, '2018-05-30 18:08:58'),
(6, 5, 'niveau 5', '<p>sdfqsdfsdf</p>', 'svsdqfqsdfs', 1, '2018-05-30 18:08:59'),
(8, NULL, 'niveau 0', '<p>sdfqsdfsd</p>', 'sdfqsdfsd', 1, '2018-05-30 19:09:00'),
(9, 8, 'niveau 1', '<p>dsfsqdfsdf</p>', 'fsgbdfgfd', 1, '2018-05-30 19:09:01'),
(10, 9, 'niveau 2', NULL, 'azerty', 1, '2018-05-30 19:09:01');

-- --------------------------------------------------------

--
-- Structure de la table `cd_user`
--

CREATE TABLE `cd_user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_image` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cd_user_role`
--

CREATE TABLE `cd_user_role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cd_article`
--
ALTER TABLE `cd_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_article_image`
--
ALTER TABLE `cd_article_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_avis`
--
ALTER TABLE `cd_avis`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_categorie_article`
--
ALTER TABLE `cd_categorie_article`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_commentaire`
--
ALTER TABLE `cd_commentaire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_image`
--
ALTER TABLE `cd_image`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_infosite`
--
ALTER TABLE `cd_infosite`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_page`
--
ALTER TABLE `cd_page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `cd_user`
--
ALTER TABLE `cd_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Index pour la table `cd_user_role`
--
ALTER TABLE `cd_user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cd_article`
--
ALTER TABLE `cd_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `cd_article_image`
--
ALTER TABLE `cd_article_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cd_avis`
--
ALTER TABLE `cd_avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cd_categorie_article`
--
ALTER TABLE `cd_categorie_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT pour la table `cd_commentaire`
--
ALTER TABLE `cd_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cd_image`
--
ALTER TABLE `cd_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT pour la table `cd_infosite`
--
ALTER TABLE `cd_infosite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cd_page`
--
ALTER TABLE `cd_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `cd_user`
--
ALTER TABLE `cd_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `cd_user_role`
--
ALTER TABLE `cd_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
