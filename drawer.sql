-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 29 Mai 2018 à 10:03
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
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `id_categorie` int(11) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_article`
--

INSERT INTO `cd_article` (`id`, `titre`, `description`, `active`, `id_categorie`, `date_creation`, `date_update`) VALUES
(12, 'coucou la vie', '<p>Lorem Ipsum</p>', 0, 0, '2018-04-24 14:04:12', NULL);

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
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_categorie_article`
--

INSERT INTO `cd_categorie_article` (`id`, `nom`) VALUES
(1, 'Ma categ numero 2'),
(2, 'Ma categ numero 2'),
(3, 'Ma categ numero 2'),
(4, 'Ma categ numero 2'),
(5, 'Ma categ numero 2'),
(6, 'Ma categ numero 2'),
(7, 'Ma categ numero 2'),
(8, 'Ma categ numero 2'),
(9, 'Ma categ numero 2'),
(10, 'Ma categ numero 2'),
(11, 'Ma categ numero 2'),
(12, 'Ma categ numero 2'),
(13, 'Ma categ numero 2'),
(14, 'Ma categ numero 2'),
(15, 'Ma categ numero 2'),
(16, 'Ma categ numero 2'),
(17, 'Ma categ numero 2'),
(18, 'Ma categ numero 2'),
(19, 'Ma categ numero 2'),
(20, 'Ma categ numero 2'),
(21, 'Ma categ numero 2'),
(22, 'Ma categ numero 2'),
(23, 'Ma categ numero 2'),
(24, 'Ma categ numero 2'),
(25, 'Ma categ numero 2'),
(26, 'Ma categ numero 2'),
(27, 'Ma categ numero 2'),
(28, 'Ma categ numero 2'),
(29, 'Ma categ numero 2'),
(30, 'Ma categ numero 2'),
(31, 'Ma categ numero 2'),
(32, 'Ma categ numero 2'),
(33, 'Ma categ numero 2'),
(34, 'Ma categ numero 2'),
(35, 'Ma categ numero 2'),
(36, 'Ma categ numero 2'),
(37, 'Ma categ numero 2'),
(38, 'Ma categ numero 2'),
(39, 'Ma categ numero 2'),
(40, 'Ma categ numero 2'),
(41, 'Ma categ numero 2'),
(42, 'Ma categ numero 2'),
(43, 'Ma categ numero 2'),
(44, 'Ma categ numero 2'),
(45, 'Ma categ numero 2'),
(46, 'Ma categ numero 2'),
(47, 'Ma categ numero 2'),
(48, 'Ma categ numero 2'),
(49, 'Ma categ numero 2'),
(50, 'Ma categ numero 2'),
(51, 'Ma categ numero 2'),
(52, 'Ma categ numero 2'),
(53, 'Ma categ numero 2'),
(54, 'Ma categ numero 2'),
(55, 'Ma categ numero 2'),
(56, 'Ma categ numero 2'),
(57, 'Ma categ numero 2'),
(58, 'Ma categ numero 2'),
(59, 'Ma categ numero 2'),
(60, 'Ma categ numero 2'),
(61, 'Ma categ numero 2'),
(62, 'Ma categ numero 2'),
(63, 'Ma categ numero 2'),
(64, 'Ma categ numero 2'),
(65, 'Ma categ numero 2'),
(66, 'Ma categ numero 2'),
(67, 'Ma categ numero 2'),
(68, 'Ma categ numero 2'),
(69, 'Ma categ numero 2'),
(70, 'Ma categ numero 2'),
(71, 'Ma categ numero 2'),
(72, 'Ma categ numero 2'),
(73, 'Ma categ numero 2'),
(74, 'Ma categ numero 2'),
(75, 'Ma categ numero 2'),
(76, 'Ma categ numero 2'),
(77, 'Ma categ numero 2'),
(78, 'Ma categ numero 2'),
(79, 'Ma categ numero 2'),
(80, 'Ma categ numero 2'),
(81, 'Ma categ numero 2'),
(82, 'Ma categ numero 2'),
(83, 'Ma categ numero 2'),
(84, 'Ma categ numero 2'),
(85, 'Ma categ numero 2'),
(86, 'Ma categ numero 2'),
(87, 'Ma categ numero 2'),
(88, 'Ma categ numero 2'),
(89, 'Ma categ numero 2'),
(90, 'Ma categ numero 2'),
(91, 'Ma categ numero 2'),
(92, 'Ma categ numero 2'),
(93, 'Ma categ numero 2'),
(94, 'Ma categ numero 2'),
(95, 'Ma categ numero 2'),
(96, 'Ma categ numero 2'),
(97, 'Ma categ numero 2'),
(98, 'Ma categ numero 2'),
(99, 'Ma categ numero 2'),
(100, 'Ma categ numero 2'),
(101, 'Ma categ numero 2'),
(102, 'Ma categ numero 2'),
(103, 'Ma categ numero 2'),
(104, 'Ma categ numero 2'),
(105, 'Ma categ numero 2'),
(106, 'Ma categ numero 2'),
(107, 'Ma categ numero 2'),
(108, 'Ma categ numero 2'),
(109, 'Ma categ numero 2'),
(110, 'Ma categ numero 2'),
(111, 'Ma categ numero 2'),
(112, 'Ma categ numero 2'),
(113, 'Ma categ numero 2'),
(114, 'Ma categ numero 2'),
(115, 'Ma categ numero 2'),
(116, 'Ma categ numero 2'),
(117, 'Ma categ numero 2'),
(118, 'Ma categ numero 2'),
(119, 'Ma categ numero 2'),
(120, 'Ma categ numero 2'),
(121, 'Ma categ numero 2'),
(122, 'Ma categ numero 2'),
(123, 'Ma categ numero 2'),
(124, 'Ma categ numero 2'),
(125, 'Ma categ numero 2'),
(126, 'Ma categ numero 2'),
(127, 'Ma categ numero 2'),
(128, 'Ma categ numero 2'),
(129, 'Ma categ numero 2'),
(130, 'Ma categ numero 2'),
(131, 'Ma categ numero 2'),
(132, 'Ma categ numero 2'),
(133, 'Ma categ numero 2'),
(134, 'Ma categ numero 2'),
(135, 'Ma categ numero 2'),
(136, 'Ma categ numero 2'),
(137, 'Ma categ numero 2'),
(138, 'Ma categ numero 2'),
(139, 'Ma categ numero 2'),
(140, 'Ma categ numero 2'),
(141, 'Ma categ numero 2'),
(142, 'Ma categ numero 2'),
(143, 'Ma categ numero 2'),
(144, 'Ma categ numero 2'),
(145, 'Ma categ numero 2'),
(146, 'Ma categ numero 2'),
(147, 'Ma categ numero 2'),
(148, 'Ma categ numero 2'),
(149, 'Ma categ numero 2'),
(150, 'Ma categ numero 2'),
(151, 'Ma categ numero 2'),
(152, 'Ma categ numero 2'),
(153, 'Ma categ numero 2'),
(154, 'Ma categ numero 2'),
(155, 'Ma categ numero 2'),
(156, 'Ma categ numero 2'),
(157, 'Ma categ numero 2'),
(158, 'Ma categ numero 2'),
(159, 'Ma categ numero 2'),
(160, 'Ma categ numero 2'),
(161, 'Ma categ numero 2'),
(162, 'Ma categ numero 2'),
(163, 'Ma categ numero 2'),
(164, 'Ma categ numero 2'),
(165, 'Ma categ numero 2'),
(166, 'Ma categ numero 2'),
(167, 'Ma categ numero 2'),
(168, 'Ma categ numero 2'),
(169, 'Ma categ numero 2'),
(170, 'Ma categ numero 2'),
(171, 'Ma categ numero 2');

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
  `id_parent` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
