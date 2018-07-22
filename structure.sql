SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";



CREATE TABLE `cd_article` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `auteur` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keyword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `id_categorie` int(11) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_update` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


CREATE TABLE `cd_article_image` (
  `id` int(11) NOT NULL,
  `id_image` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_avis` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `note` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_categorie_article` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_commentaire` (
  `id` int(11) NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `publication` timestamp NOT NULL,
  `active` int(11) NOT NULL DEFAULT '0',
  `idarticle` int(11) NOT NULL,
  `iduser` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_image` (
  `id` int(11) NOT NULL,
  `src` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` tinyint(4) DEFAULT NULL,
  `id_article` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_infosite` (
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cd_page` (
  `id` int(11) NOT NULL,
  `id_parent` int(11) DEFAULT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `protected` tinyint(1) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `inmenu` tinyint(1) NOT NULL DEFAULT '1',
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'contenu'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cd_page` (`id`, `id_parent`, `titre`, `description`, `url`, `protected`, `active`, `inmenu`, `date_creation`, `type`) VALUES
(1, NULL, 'Accueil', '<p>Page accueil</p>', '-', 1, 1, 1, '2018-05-30 16:06:18', 'site'),
(2, NULL, 'Mes oeuvres', NULL, 'mes-oeuvres', 0, 1, 1, '2018-05-30 17:07:07', 'oeuvre'),
(3, NULL, 'Me contacter', NULL, 'contact', 0, 1, 1, '2018-05-30 19:09:00', 'contact'),
(4, NULL, 'Mentions lÃ©gales', '<p><strong style="font-size: 24px;">Information l&eacute;gales</strong></p>\r\n<p><strong>D&eacute;veloppeur</strong> : ESNAULT Guillaume , AKAR Hassan , DELUCHE Louis , CHARLOT</p>\r\n<p>Alexandre.</p>\r\n<p><strong>Adresse des cr&eacute;ateurs</strong>: 242 Rue du Faubourg Saint-Antoine, 75012 Paris</p>\r\n<p><strong>Num&eacute;ro de t&eacute;l&eacute;phone</strong> : 07 82 75 12 40</p>\r\n<p><strong>Adresse email</strong> : creativedrawer@gmail.com</p>\r\n<p>Copyright, Propri&eacute;t&eacute; intellectuelle et industrielle</p>\r\n<p>Tous les textes, images, sons et animations de ce site web sont soumis &agrave; la loi de la propri&eacute;t&eacute;</p>\r\n<p>intellectuelle. Toute reproduction sans autorisation &eacute;crite de son auteur est strictement</p>\r\n<p>interdite.</p>\r\n<p>&nbsp;</p>\r\n<p><span style="font-size: 18pt;"><strong>H&eacute;bergement</strong></span></p>\r\n<p>Nom de l&rsquo;h&eacute;bergeur : OVH</p>\r\n<p>Adresse : 2 rue Kellermann -59100 Roubaix - France</p>\r\n<p>Raisons social : SAS au capital de 10 069 020</p>\r\n<p>Num&eacute;ro de t&eacute;l&eacute;phone (Service client) : 1007</p>', 'mentions-legales', 1, 1, 0, '2018-07-11 08:10:08', 'contenu');

CREATE TABLE `cd_settings` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soustitre` varchar(255) COLLATE utf8_unicode_ci NULL,
  `description` text COLLATE utf8_unicode_ci,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `date_inscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `profession` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `token` varchar(25) COLLATE utf8_unicode_ci NULL,
  `expire` timestamp NULL DEFAULT NULL,
  `id_image` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_user_article` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `vote` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



CREATE TABLE `cd_user_role` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `cd_template` (
  `id` int(11) NOT NULL,
  `mainfront` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `font1front` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `font2front` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `background` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `cd_template` (`id`, `mainfront`, `font1front`, `font2front`, `background`) VALUES
(1, '#473F3F', '#FFFFFF', '#000000', '#FFFFFF');

ALTER TABLE `cd_article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_article_image`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_avis`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_categorie_article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_commentaire`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_image`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_infosite`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_page`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_settings`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `cd_user_article`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_user_role`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_template`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `cd_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_article_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cd_avis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cd_categorie_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_commentaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_infosite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cd_page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_user_article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

ALTER TABLE `cd_user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cd_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;