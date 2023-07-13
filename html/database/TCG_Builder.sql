-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql:3306
-- Généré le : mer. 12 juil. 2023 à 19:20
-- Version du serveur : 8.0.20
-- Version de PHP : 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `TCG_Builder`
--

-- --------------------------------------------------------

--
-- Structure de la table `attack`
--

CREATE TABLE `attack` (
  `name` varchar(100) NOT NULL,
  `power` int NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `attack`
--

INSERT INTO `attack` (`name`, `power`, `description`) VALUES
('slash', 20, 'slash your enemy with your mythy sword');

-- --------------------------------------------------------

--
-- Structure de la table `Card`
--

CREATE TABLE `Card` (
  `name` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `background_picture` varchar(100) NOT NULL,
  `type_card` varchar(100) NOT NULL,
  `life_points` int NOT NULL,
  `attack` varchar(100) NOT NULL,
  `activation` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Deck`
--

CREATE TABLE `Deck` (
  `name` varchar(100) NOT NULL,
  `nb_cards` int NOT NULL,
  `description` varchar(100) NOT NULL,
  `bg_picture` varchar(100) NOT NULL,
  `card` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `deck_card`
--

CREATE TABLE `deck_card` (
  `deck` varchar(100) NOT NULL,
  `card` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='table pivot';

-- --------------------------------------------------------

--
-- Structure de la table `Type_card`
--

CREATE TABLE `Type_card` (
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `User`
--

CREATE TABLE `User` (
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='user = UUID';

-- --------------------------------------------------------

--
-- Structure de la table `user_deck`
--

CREATE TABLE `user_deck` (
  `refDeck` varchar(100) NOT NULL,
  `refUser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='table pivot';

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `attack`
--
ALTER TABLE `attack`
  ADD PRIMARY KEY (`name`);

--
-- Index pour la table `Card`
--
ALTER TABLE `Card`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `type_card` (`type_card`),
  ADD UNIQUE KEY `attack` (`attack`);

--
-- Index pour la table `Deck`
--
ALTER TABLE `Deck`
  ADD PRIMARY KEY (`name`),
  ADD UNIQUE KEY `card` (`card`);

--
-- Index pour la table `deck_card`
--
ALTER TABLE `deck_card`
  ADD PRIMARY KEY (`deck`,`card`),
  ADD UNIQUE KEY `deck` (`deck`,`card`),
  ADD KEY `card` (`card`);

--
-- Index pour la table `Type_card`
--
ALTER TABLE `Type_card`
  ADD PRIMARY KEY (`type`);

--
-- Index pour la table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`user`);

--
-- Index pour la table `user_deck`
--
ALTER TABLE `user_deck`
  ADD PRIMARY KEY (`refDeck`,`refUser`),
  ADD UNIQUE KEY `refDeck` (`refDeck`,`refUser`),
  ADD KEY `refUser` (`refUser`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Card`
--
ALTER TABLE `Card`
  ADD CONSTRAINT `Card_ibfk_1` FOREIGN KEY (`attack`) REFERENCES `attack` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `deck_card`
--
ALTER TABLE `deck_card`
  ADD CONSTRAINT `deck_card_ibfk_1` FOREIGN KEY (`card`) REFERENCES `Card` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `deck_card_ibfk_2` FOREIGN KEY (`deck`) REFERENCES `Deck` (`card`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `Type_card`
--
ALTER TABLE `Type_card`
  ADD CONSTRAINT `Type_card_ibfk_1` FOREIGN KEY (`type`) REFERENCES `Card` (`type_card`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `user_deck`
--
ALTER TABLE `user_deck`
  ADD CONSTRAINT `user_deck_ibfk_1` FOREIGN KEY (`refUser`) REFERENCES `User` (`user`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `user_deck_ibfk_2` FOREIGN KEY (`refDeck`) REFERENCES `Deck` (`name`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
