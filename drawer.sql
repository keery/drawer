-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 26 Avril 2018 à 09:02
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
  `id_categorie` int(11) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `cd_article`
--

INSERT INTO `cd_article` (`id`, `titre`, `description`, `id_categorie`, `date_creation`, `date_update`) VALUES
(11, 'Mon 19men dessin', 'Lorem Ipsum', 5, '2018-04-24 03:12:24', '2018-04-24 16:11:52'),
(12, 'Mon 19men dessin', 'Lorem Ipsum', 6, '2018-04-24 14:04:12', NULL);

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
(81, 'Ma categ numero 2');

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
  `alt` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT pour la table `cd_commentaire`
--
ALTER TABLE `cd_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `cd_image`
--
ALTER TABLE `cd_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
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
