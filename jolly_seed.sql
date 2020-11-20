-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 20 nov. 2020 à 15:40
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jolly_seed`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `ads_id` int(11) NOT NULL,
  `ads_type` varchar(30) NOT NULL,
  `ads_category` varchar(30) NOT NULL,
  `ads_date` date NOT NULL,
  `ads_description` varchar(300) NOT NULL,
  `ads_picture` varchar(300) NOT NULL,
  `ads_active` int(11) NOT NULL,
  `ads_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ads`
--

INSERT INTO `ads` (`ads_id`, `ads_type`, `ads_category`, `ads_date`, `ads_description`, `ads_picture`, `ads_active`, `ads_title`) VALUES
(1, 'don', 'fruit/legume/fleur', '2020-10-26', 'Venez cueillir ces délicieuses pommes. Pour ceux qui ne la connaisse pas, elles sont petites mais délicieuses à souhait!', 'reinette-etoilee.jpg', 1, 'Reinettes Etoilées'),
(2, 'don', 'graines', '2020-10-24', 'Venez cueillir ces délicieuses pommes. Pour ceux qui ne la connaisse pas, elles sont petites mais délicieuses à souhait!', 'graines.jpg', 1, 'Graines de Potiron'),
(3, 'don', 'fruits/legumes/fleurs', '2020-10-22', 'Venez cueillir ces délicieuses pommes. Pour ceux qui ne la connaisse pas, elles sont petites mais délicieuses à souhait!', 'tomates.jpg', 0, 'Pants de Tomates'),
(4, 'don', 'fruits/legumes/fleurs', '2020-10-26', 'Venez cueillir ces délicieuses pommes. Pour ceux qui ne la connaisse pas, elles sont petites mais délicieuses à souhait!', 'reinette-etoilee.jpg', 1, 'Reinettes Etoilées'),
(5, 'Jardinier', 'Demi-journée', '2020-10-26', 'Une demi-journée à la campagne pour du travail de désherbage (ou autre travail léger), je veux bien ce WE :-)', '', 1, 'Offre'),
(6, 'Jardinier', 'Journée', '2020-10-14', 'Au secours, mes pommiers croulent sous le poids ! Cueillette de pommes nécessaire afin de les apporter à la presse. Du bon jus de pomme à la clé :-)', 'pommier.jpg', 1, 'Demande'),
(7, 'Jardinier', 'Un peu de temps', '2020-10-22', 'Un peu de temps pour m\'aider à enlever les fleurs de mes rhododendrons? ', '', 1, 'Offre'),
(8, 'Jardinier', 'Journée', '2020-10-18', 'Dispo samedi… Un peu d\'air frais me fera du bien!', '', 0, 'Demande');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_firstname` varchar(50) NOT NULL,
  `user_pseudo` varchar(20) NOT NULL,
  `user_mdp` varchar(30) NOT NULL,
  `user_street` varchar(50) NOT NULL,
  `user_street_number` int(11) NOT NULL,
  `user_box` varchar(10) NOT NULL,
  `user_city` varchar(20) NOT NULL,
  `user_citycode` int(11) NOT NULL,
  `user_phone` int(11) NOT NULL,
  `user_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_pseudo`, `user_mdp`, `user_street`, `user_street_number`, `user_box`, `user_city`, `user_citycode`, `user_phone`, `user_email`) VALUES
(1, 'Doe', 'Paulette', '', '', 'rue de la Bruyère', 3, '', 'Lasne', 1380, 26524693, 'paulette.doe@gmail.com'),
(2, 'Dupont', 'Caroline', '', '', 'Rue du bazar', 25, '', 'Rixensart', 1332, 476894523, 'caroline.dupont@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `users_ads`
--

CREATE TABLE `users_ads` (
  `user_id` int(11) NOT NULL,
  `ads_id` int(11) NOT NULL,
  `favorite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`ads_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `users_ads`
--
ALTER TABLE `users_ads`
  ADD PRIMARY KEY (`user_id`,`ads_id`),
  ADD KEY `fk_userads_ads` (`ads_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `ads_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `users_ads`
--
ALTER TABLE `users_ads`
  ADD CONSTRAINT `fk_userads_ads` FOREIGN KEY (`ads_id`) REFERENCES `ads` (`ads_id`),
  ADD CONSTRAINT `fk_userads_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
