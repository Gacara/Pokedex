-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  Dim 03 juin 2018 à 11:27
-- Version du serveur :  5.6.34-log
-- Version de PHP :  7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `pokedex`
--

-- --------------------------------------------------------

--
-- Structure de la table `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `descri` text,
  `sound` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `picture`, `descri`, `sound`) VALUES
(1, 'Pikachu', 'https://78.media.tumblr.com/d9105814c15295196a3dbe75c32ba1a0/tumblr_oagpklvBGf1scncwdo1_500.gif', 'Nom : Pikachu\r\nTaille :0.4m \r\nPoids : 6.0kg \r\nEspèce : Rongeur\r\n', 'son/pika.mp3'),
(2, 'Rattatac', 'http://25.media.tumblr.com/7ab6fbbf35170e350df0b9e8a61e19a4/tumblr_n2zj1rrOrT1r8l4lao1_500.gif', 'Nom : Rattatac \r\n\r\nTaille : 0.7m \r\nPoids : 18.5kg \r\nEspèce : Rongeur', 'son/ratata.mp3'),
(3, 'Salameche', 'https://media.giphy.com/media/eacSJw7emzl9S/giphy.gif', 'Nom : Salameche \r\n\r\nTaille : 0,6m \r\nPoids : 8,5kg \r\nEspèce : Lézard', 'son/issou.mp3'),
(4, 'Dracaufeu', 'https://images.wikidexcdn.net/mwuploads/wikidex/7/74/latest/20140807015236/Charizard_XY.gif', 'Nom : Dracaufeu  \r\n\r\nTaille : 1,7m \r\nPoids : 90,5kg \r\nEspèce : Lézard', 'son/draco.mp3'),
(5, 'Carapuce', 'http://25.media.tumblr.com/tumblr_mbju11dMMQ1r3ovego1_500.gif', 'Il est gentil ça peut aller', 'son/pika.mp3'),
(6, 'Evoli', 'http://2.media.dorkly.cvcdn.com/25/38/4d9df0e6985ab9e9218f3874ccf9649d.gif', 'Il évolue', 'son/issou.mp3'),
(7, 'Togepi', 'http://www.20cents-video.com/userdata/animated-gif/library/Pokemon_9.gif', 'Il est mignon', 'son/issou.mp3'),
(8, 'Another Pikachu', 'https://m.popkey.co/c8089e/l3KWZ_s-200x150.gif', 'Kawaii ne', 'img/pika.mp3'),
(9, 'Smogogo', 'https://media.giphy.com/media/UwtmvvPkRjIEE/giphy.gif', 'Nom : Inconnu Taille : Inconnue Poids : Inconnu Espèce : Inconnue', 'son/issou.mp3'),
(10, 'Tortank', 'http://www.animatedimages.org/data/media/1446/animated-pokemon-image-0089.gif', 'Nom : Inconnu Taille : Inconnue Poids : Inconnu Espèce : Inconnue', 'son/issou.mp3'),
(11, 'Ossatueur', 'https://avatars.mds.yandex.net/get-pdb/477388/6439c6dd-b283-4920-83b5-ef44ca6cf966/orig', 'Nom : Inconnu Taille : Inconnue Poids : Inconnu Espèce : Inconnue', 'img/pika.mp3');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
