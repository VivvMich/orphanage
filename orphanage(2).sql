-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 22 nov. 2023 à 15:13
-- Version du serveur : 8.0.35-0ubuntu0.22.04.1
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `orphanage`
--

-- --------------------------------------------------------

--
-- Structure de la table `child`
--

CREATE TABLE `child` (
  `id_child` int NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `origin` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` tinyint(1) NOT NULL,
  `user` int DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `child`
--

INSERT INTO `child` (`id_child`, `first_name`, `last_name`, `birthdate`, `origin`, `sex`, `isDelete`, `user`) VALUES
(156, 'Sophia', 'Garcia', '2019-06-17', 'France', 'femme', 0, NULL),
(157, 'Edelnide', 'Rodrigues', '2017-01-29', 'Brazil', 'femme', 0, 1),
(158, 'Sokil', 'Rizun', '2020-11-03', 'Ukraine', 'homme', 0, 1),
(159, 'Neeti', 'Jain', '2007-03-26', 'India', 'femme', 0, 3),
(160, 'Niklas', 'Sakala', '2021-01-19', 'Finland', 'homme', 0, 1),
(161, 'Balhaar', 'Mathew', '2020-10-25', 'India', 'homme', 0, 1),
(162, 'Luis Miguel', 'Vásquez', '2012-03-19', 'Mexico', 'homme', 0, 1),
(163, 'Damian', 'Junker', '2019-08-27', 'Germany', 'homme', 0, 1),
(164, 'Nuria', 'Rojas', '2008-03-01', 'Spain', 'femme', 0, 1),
(165, 'Volkan', 'Özgörkey', '2022-02-17', 'Turkey', 'homme', 0, 1),
(166, 'Todd', 'Jordan', '2019-05-18', 'United States', 'homme', 0, 1),
(167, 'Hugh', 'Ford', '2013-10-24', 'Australia', 'homme', 0, 1),
(168, 'Alice', 'Walker', '2019-03-22', 'New Zealand', 'femme', 0, 1),
(169, 'Maria', 'Gregory', '2020-12-09', 'United Kingdom', 'femme', 0, 1),
(170, 'Celia', 'Carrasco', '2015-09-25', 'Spain', 'femme', 0, 1),
(171, 'Eemil', 'Kallio', '2014-10-05', 'Finland', 'homme', 0, 1),
(172, 'Radenko', 'Rađen', '2007-03-26', 'Serbia', 'homme', 0, 1),
(173, 'فاطمه زهرا', 'سلطانی نژاد', '2022-07-27', 'Iran', 'femme', 0, 1),
(174, 'Daksh', 'Mugeraya', '2010-05-23', 'India', 'homme', 0, 1),
(175, 'Mike', 'Deschamps', '2020-03-04', 'Switzerland', 'homme', 0, 1),
(176, 'Máximo', 'Farias', '2016-11-23', 'Brazil', 'homme', 0, 1),
(177, 'Nicole', 'Sullivan', '2009-10-24', 'United States', 'femme', 0, 1),
(178, 'Livio', 'Martinez', '2012-04-27', 'Switzerland', 'homme', 0, 1),
(179, 'Nalan', 'Sadıklar', '2007-04-15', 'Turkey', 'femme', 0, 1),
(180, 'Darrell', 'Murray', '2014-10-17', 'United States', 'homme', 0, 1),
(181, 'Dana', 'Lambert', '2015-05-13', 'Australia', 'femme', 0, 1),
(182, 'Salvador', 'Haro', '2010-02-22', 'Mexico', 'homme', 0, 1),
(183, 'Jonathan', 'Pastor', '2008-01-11', 'Spain', 'homme', 0, 1),
(184, 'Jorge', 'Rojas', '2019-09-01', 'Spain', 'homme', 0, 1),
(185, 'Delia', 'Candelaria', '2011-04-23', 'Mexico', 'femme', 0, 1),
(186, 'Anna', 'Dubovik', '2012-10-24', 'Ukraine', 'femme', 0, 1),
(187, 'Elizabeth', 'King', '2021-02-14', 'Ireland', 'femme', 0, 1),
(188, 'Mathilde', 'Mortensen', '2020-09-06', 'Denmark', 'femme', 0, 1),
(189, 'Cooper', 'Taylor', '2019-03-16', 'New Zealand', 'homme', 0, 1),
(190, 'Marius', 'Mortensen', '2017-08-18', 'Denmark', 'homme', 0, 1),
(191, 'Nalan', 'Beşerler', '2012-06-17', 'Turkey', 'femme', 0, 1),
(192, 'Namratha', 'Bhoja', '2017-01-05', 'India', 'femme', 0, 1),
(193, 'Stephanie', 'Davis', '2016-05-31', 'Ireland', 'femme', 0, 1),
(194, 'Nooa', 'Saari', '2008-12-10', 'Finland', 'homme', 0, 1),
(195, 'Jara', 'Perrin', '2021-04-17', 'Switzerland', 'femme', 0, 1),
(196, 'ماهان', 'پارسا', '2020-08-05', 'Iran', 'homme', 0, 1),
(197, 'Nepobor', 'Boycun', '2017-03-18', 'Ukraine', 'homme', 0, 1),
(198, 'Gregorio', 'Soler', '2007-05-11', 'Spain', 'homme', 0, 1),
(199, 'Elouan', 'Dupuis', '2007-09-20', 'France', 'homme', 0, 1),
(200, 'Kathy', 'Evans', '2020-11-05', 'Ireland', 'femme', 0, 1),
(201, 'Jason', 'Terry', '2019-06-24', 'United States', 'homme', 0, 1),
(202, 'Pallavi', 'Dhamdhame', '2009-03-27', 'India', 'femme', 0, 1),
(203, 'Dobrivoje', 'Ćirković', '2022-04-08', 'Serbia', 'homme', 0, 1),
(204, 'Rodney', 'Lambert', '2012-04-14', 'United States', 'homme', 0, 1),
(205, 'Tverdislav', 'Pestushko', '2009-01-25', 'Ukraine', 'homme', 0, 1),
(206, 'Ostoja', 'Stanojević', '2013-04-06', 'Serbia', 'homme', 0, 1),
(207, 'Gilbert', 'Elliott', '2007-08-10', 'United States', 'homme', 0, 1),
(208, 'Carmela', 'Siemers', '2014-12-30', 'Germany', 'femme', 0, 1),
(209, 'Carolina', 'Hidalgo', '2021-10-08', 'Spain', 'femme', 0, 1),
(210, 'Mehdi', 'Martin', '2016-09-04', 'Switzerland', 'homme', 0, 1),
(211, 'Ugo', 'Bonnet', '2007-03-20', 'France', 'homme', 0, 1),
(212, 'الینا', 'گلشن', '2016-01-01', 'Iran', 'femme', 0, 1),
(213, 'كيان', 'پارسا', '2019-05-05', 'Iran', 'homme', 0, 1),
(214, 'Mileta', 'Perić', '2011-06-24', 'Serbia', 'homme', 0, 1),
(215, 'Lorraine', 'Wade', '2012-06-30', 'United States', 'femme', 0, 1),
(216, 'Maude', 'Vincent', '2008-10-02', 'Switzerland', 'femme', 0, 1),
(217, 'Rokus', 'Marskamp', '2019-07-14', 'Netherlands', 'homme', 0, 1),
(218, 'درسا', 'حیدری', '2012-08-31', 'Iran', 'femme', 0, 1),
(219, 'Samuel', 'Clark', '2009-04-26', 'Australia', 'homme', 0, 1),
(220, 'Roope', 'Wuollet', '2022-11-21', 'Finland', 'homme', 0, 1),
(221, 'Carol', 'Sims', '2017-09-17', 'United Kingdom', 'femme', 0, 1),
(222, 'Mario', 'Garcia', '2018-03-03', 'Australia', 'homme', 0, 1),
(223, 'Marlon', 'Dubois', '2019-09-12', 'Switzerland', 'homme', 0, 1),
(224, 'Gérard', 'Girard', '2010-09-19', 'Switzerland', 'homme', 0, 1),
(225, 'Bernd', 'Renard', '2008-03-30', 'Switzerland', 'homme', 0, 1),
(226, 'Barbara', 'Griffin', '2013-10-09', 'United Kingdom', 'femme', 0, 1),
(227, 'Eva', 'Austin', '2012-02-28', 'Australia', 'femme', 0, 1),
(228, 'Bently', 'Gill', '2019-10-15', 'Canada', 'homme', 0, 1),
(229, 'Rochelle', 'Enthoven', '2022-03-11', 'Netherlands', 'femme', 0, 1),
(230, 'Marline', 'Aksoy', '2008-03-31', 'Netherlands', 'femme', 0, 1),
(231, 'Amandine', 'Bourgeois', '2011-10-21', 'France', 'femme', 0, 1),
(232, 'Mestan', 'Akman', '2012-04-06', 'Turkey', 'femme', 0, 1),
(233, 'Alice', 'Novak', '2015-04-21', 'Canada', 'femme', 0, 1),
(234, 'مریم', 'کریمی', '2009-02-01', 'Iran', 'femme', 0, 1),
(235, 'Maria', 'Gibson', '2019-05-18', 'United Kingdom', 'femme', 0, 1),
(236, 'Maja', 'Živanović', '2020-03-29', 'Serbia', 'femme', 0, 1),
(237, 'Enola', 'Lecomte', '2021-03-16', 'France', 'femme', 0, 1),
(238, 'Elias', 'Walli', '2010-09-28', 'Finland', 'homme', 0, 1),
(239, 'Mirja', 'Kampe', '2012-05-25', 'Germany', 'femme', 0, 1),
(240, 'مهدي', 'حسینی', '2015-02-13', 'Iran', 'homme', 0, 1),
(241, 'Florence', 'Williams', '2008-01-29', 'New Zealand', 'femme', 0, 1),
(242, 'Gonzalo', 'Gómez', '2018-05-06', 'Spain', 'homme', 0, 1),
(243, 'Chloe', 'Silva', '2011-02-26', 'United Kingdom', 'femme', 0, 1),
(244, 'Elisa', 'Alonso', '2014-11-01', 'Spain', 'femme', 0, 1),
(245, 'Balendra', 'Rao', '2009-06-10', 'India', 'homme', 0, 1),
(246, 'Federico', 'Van Bilsen', '2020-07-02', 'Netherlands', 'homme', 0, 1),
(247, 'Salome', 'Guerin', '2021-08-20', 'Switzerland', 'femme', 0, 1),
(248, 'Arthur', 'Austin', '2017-10-30', 'United Kingdom', 'homme', 0, 1),
(249, 'Nicky', 'Matthews', '2019-10-16', 'United Kingdom', 'femme', 0, 1),
(250, 'Deniz', 'Taşçı', '2015-04-03', 'Turkey', 'femme', 0, 1),
(251, 'Ljuba', 'Vidaković', '2014-07-03', 'Serbia', 'femme', 0, 1),
(252, 'Caroline', 'Riviere', '2009-04-17', 'Switzerland', 'femme', 0, 1),
(253, 'Lilly', 'Syrstad', '2007-08-24', 'Norway', 'femme', 0, 1),
(254, 'Cecil', 'Hudson', '2007-10-25', 'United States', 'homme', 0, 1),
(255, 'Toivo', 'Anttila', '2017-01-24', 'Finland', 'homme', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `first_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `street_name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `zip_code` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `mail` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `street_name`, `city`, `zip_code`, `role`, `password`, `mail`) VALUES
(1, 'Jean-Marc', 'Troudu', 'En belgique', 'En belgique', 'regg', 'user', 'ugiugiogigiogi', 'sdhdffhfdhhdh@dsgd'),
(3, 'Lady', 'Gaga', 'sdgsdgsdgsdgsdgsdg', 'sdgsdgsdfgsdgsdg', '26362', 'sdfgsdgsdgsdgsdgdg', 'sdgsdgsdgsdgsdgsdgsdg', 'sgdsdgsdgsdgsdgsdgsdgdg'),
(4, 'Steven', 'Rastaman', '14 rue de la Roquette', 'Verdun', '55100', 'Truand', '1234', 'jesuischiant@rasta.com'),
(5, 'Bertrand', 'Monfort', '14 rue de la Roquette', 'Verdun', '5510', 'Truand', '$argon2i$v=19$m=65536,t=4,p=1$bjEzQkxTZkUzbkdQSFJ5MQ$HypjoSa2YO/aE9AExcyN4E016FdVl4L1z2tV7D6/KFw', 'popo@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `child`
--
ALTER TABLE `child`
  ADD PRIMARY KEY (`id_child`),
  ADD KEY `user` (`user`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `child`
--
ALTER TABLE `child`
  MODIFY `id_child` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `user_child` FOREIGN KEY (`user`) REFERENCES `user` (`id_user`) ON DELETE SET NULL ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
