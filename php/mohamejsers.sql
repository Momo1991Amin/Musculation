-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 27 sep. 2020 à 15:58
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mohamejsers`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(200) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom_categorie`) VALUES
(1, 'Table'),
(2, 'Musculation'),
(3, 'Poignées'),
(4, 'Accessoires');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mail_client` varchar(1000) NOT NULL,
  `mdp_client` varchar(100) NOT NULL,
  `username_client` varchar(255) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `mail_client`, `mdp_client`, `username_client`) VALUES
(1, 'admin@gmail.com', '$2y$10$GJHcINsYIM8YLDc2g63fCuhmfAateb.1pJquDBJbTuhqJT8kWB2X.', 'admin'),
(9, 'momo@gmail.com', '$2y$10$GJHcINsYIM8YLDc2g63fCuhmfAateb.1pJquDBJbTuhqJT8kWB2X.', 'momo'),
(10, 'momo2@gmail.com', '$2y$10$GJHcINsYIM8YLDc2g63fCuhmfAateb.1pJquDBJbTuhqJT8kWB2X.', 'momo92');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id_commande` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_client_commande` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_commande`),
  KEY `id_client_commande` (`id_client_commande`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id_commentaire` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `contenu_commentaire` text NOT NULL,
  `date_commentaire` datetime NOT NULL DEFAULT current_timestamp(),
  `id_produit_commentaire` int(10) UNSIGNED NOT NULL,
  `id_client_commentaire` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_commentaire`),
  KEY `id_produit_commentaire` (`id_produit_commentaire`),
  KEY `id_client_commentaire` (`id_client_commentaire`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `commprod`
--

DROP TABLE IF EXISTS `commprod`;
CREATE TABLE IF NOT EXISTS `commprod` (
  `id_commprod` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prix_commprod` int(10) NOT NULL,
  `quantite_commprod` int(10) NOT NULL,
  `id_commande_commprod` int(10) UNSIGNED NOT NULL,
  `id_produit_commprod` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_commprod`),
  KEY `id_commande_commprod` (`id_commande_commprod`),
  KEY `id_produit_commprod` (`id_produit_commprod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre_produit` varchar(200) NOT NULL,
  `prix_produit` decimal(10,0) NOT NULL,
  `img_produit` text NOT NULL,
  `description_produit` text NOT NULL,
  `id_categorie_produit` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie_produit` (`id_categorie_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf32;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre_produit`, `prix_produit`, `img_produit`, `description_produit`, `id_categorie_produit`) VALUES
(1, 'Poignée Ruban', '49', 'sources/poignee-ruban.jpg', 'Idéal pour la fixation à la poulie régulée. Spécialement conçu pour renforcer le poignet et les doigts.', 3),
(2, 'Poignée épaisse', '79', 'sources/poignee-epaisse.jpg', 'Il fonctionne parfaitement avec l\'ascenseur régulé. La poignée a été épaissie pour vous aider à travailler votre grip et à renforcer vos doigts.', 3),
(3, 'Poignée conique', '99', 'sources/poignee-conique.jpg', 'Il coopère parfaitement avec un ascenseur réglementé. Sa conception spéciale, augmente la force du poignet et des doigts.', 3),
(4, 'Sangle Strap Match', '5', 'sources/strap.jpg', 'Sangle de l\'arbitre pour les Strap Match. Satisfait aux normes de WAF i EAF.', 4),
(5, 'Fat Gripz', '20', 'sources/fatgripz.jpg', 'Longueur : 12,7 cm - Epaisseur : 5.7cm, adaptable à toutes les barres\r\nBiseautées pour un meilleur maintien\r\nConvient aux haltères et à tout type de barres\r\nDouble l\'épaisseur d\'une barre olympique\r\nDimension (L x L x H ) : 6,35 x 12,7 x 6,35 cm\r\nPoids: 460 g.', 4),
(6, 'Élastique d\'entrainement', '16', 'sources/elastique.jpg', 'Cette bande de résistance est parfait pour la musculation, la tonification, le crossfit, le pull-up, l\'aérobic, la musculation, la perte de poids et la physiothérapie. Aussi comme un groupe de gymnastique pour l\'entraînement d\'échauffement ou d\'étirement après une séance d\'entraînement', 4),
(7, 'Tour à poulie simple', '199', 'sources/poulie.jpg', 'La poulie ajustable est un poste essentiel pour un travail approfondi du dos, des bras, des épaules, de la sangle abdominale et du dos et devrait idéalement se trouver dans toutes les salles de sport dignes de ce nom.', 2),
(8, 'Barre incurvée', '30', 'sources/barre.jpg', 'La Barre de Curl (ou barre courbée) olympique super CAP Barbell de 2 pouces, Barre de 48 pouces', 2),
(9, 'Barre triceps', '30', 'sources/barre2.jpg', 'Conçue spécifiquement pour localiser au maximum le travail des triceps avec bague en cuivre.\r\n', 2),
(10, 'Table Armwrestling', '350', 'sources/table.jpg', 'Table officielle d\'Armwrestling', 1),
(17, 'sac', '702100', 'https://www.w3schools.com/howto/img_fjords.jpg', 'sac a patate', 4),
(18, 'top', '50', 'sources/table2.jpg', 'musculation top', 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_client` FOREIGN KEY (`id_client_commande`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `commentaire_client` FOREIGN KEY (`id_client_commentaire`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `commentaire_produit` FOREIGN KEY (`id_produit_commentaire`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `commprod`
--
ALTER TABLE `commprod`
  ADD CONSTRAINT `commprod_commande` FOREIGN KEY (`id_commande_commprod`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `commprod_produit` FOREIGN KEY (`id_produit_commprod`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_categorie` FOREIGN KEY (`id_categorie_produit`) REFERENCES `categorie` (`id_categorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
