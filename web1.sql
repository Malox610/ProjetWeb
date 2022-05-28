-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 12:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `web`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`id_admin`, `nom`, `prenom`, `mail`, `password`) VALUES
(1, 'Segado', 'JP', 'jps@ece.fr', 'aze123');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id_adresse` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rue` varchar(50) NOT NULL,
  `num_rue` int(11) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `digicode` int(4) DEFAULT NULL,
  `pays` varchar(20) NOT NULL,
  `ville` varchar(20) NOT NULL,
  PRIMARY KEY (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id_adresse`, `nom_rue`, `num_rue`, `code_postal`, `digicode`, `pays`, `ville`) VALUES
(1, 'rue Robert de Flers', 3, 75015, 1265, 'France', 'Paris'),
(2, 'Boulevard Raspail', 27, 75015, 932, 'France', 'Paris'),
(3, 'Carrer Roncal', 2, 7600, 2158, 'Espagne', 'Es Pil·larí'),
(4, 'Essex Court', 1, 12345, 4507, 'Royaume-Uni', 'Londres'),
(6, 'rue de la croxi', 345, 7860, NULL, 'france', 'villennes sur seine');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `num_etudiant` int(11) NOT NULL,
  `id_paiement` int(11) DEFAULT NULL,
  `id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `id_paiement` (`id_paiement`),
  KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `telephone`, `email`, `password`, `num_etudiant`, `id_paiement`, `id_adresse`) VALUES
(1, 'Esmiller', 'Mathis', 601020304, 'matmat.esmi@edu.ece.fr', 'azerty1', 1234567, NULL, 3),
(2, 'Cohen', 'Nathanael', 699989796, 'nath.coco@edu.ece.fr', 'wxcvbn', 2345678, NULL, 4);

-- --------------------------------------------------------

--
-- Structure de la table `coach`
--

DROP TABLE IF EXISTS `coach`;
CREATE TABLE IF NOT EXISTS `coach` (
  `id_coach` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `bureau` varchar(5) NOT NULL,
  `id_sport` int(11) NOT NULL,
  PRIMARY KEY (`id_coach`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `coach`
--

INSERT INTO `coach` (`id_coach`, `nom`, `prenom`, `telephone`, `email`, `password`, `bureau`, `id_sport`) VALUES
(1, 'Lambert', 'Clement', 0, 'clement.lambert@edu.ece.fr', 'qsd12345', '', 1),
(2, 'Lolo', 'Toto', 0, 'toto.lolo@edu.ece.fr', 'azerty', '', 2),
(3, 'edfe', 'fzef', 245, 'scwv', 'qsfdsvd', 'G-023', 2),
(4, 'Lambert', 'Clement', 245, 'clement.lambert@edu.ece.fr', 'coucou', 'G-023', 3),
(5, 'erg', 'ertfdb', 2343, 'bdfb', 'DGDFHB', 'G-0', 4);

-- --------------------------------------------------------

--
-- Structure de la table `dispo`
--

DROP TABLE IF EXISTS `dispo`;
CREATE TABLE IF NOT EXISTS `dispo` (
  `id_dispo` int(11) NOT NULL AUTO_INCREMENT,
  `Jours` date NOT NULL,
  `Matin` tinyint(1) NOT NULL,
  `Aprem` tinyint(1) NOT NULL,
  `id_coach` int(11) NOT NULL,
  PRIMARY KEY (`id_dispo`),
  KEY `id_coach` (`id_coach`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `id_paiement` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `expiration` date NOT NULL,
  `securite` int(3) NOT NULL,
  PRIMARY KEY (`id_paiement`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `paiement`
--

INSERT INTO `paiement` (`id_paiement`, `type`, `numero`, `nom`, `expiration`, `securite`) VALUES
(1, 'Visa', 1234567891011121, 'Lopezinho', '2024-05-31', 46),
(2, 'Mastercard', 1234123412341234, 'Cohen', '2024-07-31', 219);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id_rdv` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `heure` time NOT NULL,
  `id_coach` int(11) NOT NULL,
  `id_sport` int(11) NOT NULL,
  PRIMARY KEY (`id_rdv`),
  KEY `id_coach` (`id_coach`),
  KEY `id_sport` (`id_sport`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id_rdv`, `date`, `heure`, `id_coach`, `id_sport`) VALUES
(1, '2022-06-02', '00:00:00', 1, 1),
(2, '2022-06-03', '00:00:00', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `id_client` int(11) NOT NULL,
  `id_rdv` int(11) NOT NULL,
  PRIMARY KEY (`id_client`,`id_rdv`),
  KEY `id_client` (`id_client`),
  KEY `id_rdv` (`id_rdv`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_client`, `id_rdv`) VALUES
(1, 1),
(2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `id_salle` int(11) NOT NULL AUTO_INCREMENT,
  `num_salle` varchar(5) NOT NULL,
  `telephone` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  PRIMARY KEY (`id_salle`),
  KEY `id_adresse` (`id_adresse`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `salle`
--

INSERT INTO `salle` (`id_salle`, `num_salle`, `telephone`, `email`, `id_adresse`) VALUES
(1, 'P123', 0, '', 1),
(2, 'G013', 0, '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `sport`
--

DROP TABLE IF EXISTS `sport`;
CREATE TABLE IF NOT EXISTS `sport` (
  `id_sport` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sport` varchar(20) NOT NULL,
  `places` int(11) NOT NULL,
  `id_salle` int(11) NOT NULL,
  PRIMARY KEY (`id_sport`),
  KEY `id_salle` (`id_salle`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `sport`
--

INSERT INTO `sport` (`id_sport`, `nom_sport`, `places`, `id_salle`) VALUES
(1, 'Musculation', 1, 1),
(2, 'Football', 22, 2),
(3, 'Volleyball', 10, 1),
(4, 'Sabre Laser', 2, 1);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `fk_adresse` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`),
  ADD CONSTRAINT `fk_paiement` FOREIGN KEY (`id_paiement`) REFERENCES `paiement` (`id_paiement`);

--
-- Contraintes pour la table `coach`
--
ALTER TABLE `coach`
  ADD CONSTRAINT `fk_sport` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id_sport`);

--
-- Contraintes pour la table `dispo`
--
ALTER TABLE `dispo`
  ADD CONSTRAINT `fk_coach2` FOREIGN KEY (`id_coach`) REFERENCES `coach` (`id_coach`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `fk_coach` FOREIGN KEY (`id_coach`) REFERENCES `coach` (`id_coach`),
  ADD CONSTRAINT `fk_sport2` FOREIGN KEY (`id_sport`) REFERENCES `sport` (`id_sport`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_client` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `fk_rdv` FOREIGN KEY (`id_rdv`) REFERENCES `rdv` (`id_rdv`);

--
-- Contraintes pour la table `salle`
--
ALTER TABLE `salle`
  ADD CONSTRAINT `fk_adresse2` FOREIGN KEY (`id_adresse`) REFERENCES `adresse` (`id_adresse`);

--
-- Contraintes pour la table `sport`
--
ALTER TABLE `sport`
  ADD CONSTRAINT `fk_salle` FOREIGN KEY (`id_salle`) REFERENCES `salle` (`id_salle`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;