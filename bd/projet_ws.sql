-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 24 oct. 2022 à 00:46
-- Version du serveur :  8.0.18
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_ws`
--

-- --------------------------------------------------------

--
-- Structure de la table `bureau`
--

DROP TABLE IF EXISTS `bureau`;
CREATE TABLE IF NOT EXISTS `bureau` (
  `idBureau` int(11) NOT NULL AUTO_INCREMENT,
  `codeB` int(11) NOT NULL,
  `idLieuF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idBureau`),
  KEY `idLieuF` (`idLieuF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `candidat`
--

DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `idCandidat` int(11) NOT NULL AUTO_INCREMENT,
  `nomParti` varchar(20) NOT NULL,
  `idElecteurF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCandidat`),
  KEY `idElecteurF` (`idElecteurF`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `candidat`
--

INSERT INTO `candidat` (`idCandidat`, `nomParti`, `idElecteurF`) VALUES
(1, 'mdf', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commune`
--

DROP TABLE IF EXISTS `commune`;
CREATE TABLE IF NOT EXISTS `commune` (
  `idCommune` int(11) NOT NULL AUTO_INCREMENT,
  `nomC` varchar(20) NOT NULL,
  `idDepartF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCommune`),
  KEY `idDepartF` (`idDepartF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `idDepartement` int(11) NOT NULL AUTO_INCREMENT,
  `nomD` varchar(20) NOT NULL,
  `idRegionF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idDepartement`),
  KEY `idRegionF` (`idRegionF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `electeurs`
--

DROP TABLE IF EXISTS `electeurs`;
CREATE TABLE IF NOT EXISTS `electeurs` (
  `idElecteur` int(11) NOT NULL AUTO_INCREMENT,
  `numCNI` int(11) NOT NULL,
  `idBureau` int(11) DEFAULT NULL,
  `idUserF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idElecteur`),
  UNIQUE KEY `numCNI` (`numCNI`),
  KEY `idUser` (`idUserF`),
  KEY `idBureau` (`idBureau`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `electeurs`
--

INSERT INTO `electeurs` (`idElecteur`, `numCNI`, `idBureau`, `idUserF`) VALUES
(1, 12345, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `idLieu` int(11) NOT NULL AUTO_INCREMENT,
  `codeL` int(11) NOT NULL,
  `idCommuneF` int(11) DEFAULT NULL,
  PRIMARY KEY (`idLieu`),
  KEY `idCommuneF` (`idCommuneF`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

DROP TABLE IF EXISTS `profil`;
CREATE TABLE IF NOT EXISTS `profil` (
  `idProfil` int(11) NOT NULL AUTO_INCREMENT,
  `nomProfil` varchar(20) NOT NULL,
  PRIMARY KEY (`idProfil`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `nomProfil`) VALUES
(1, 'administrateur'),
(2, 'electeur');

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE IF NOT EXISTS `region` (
  `idRegion` int(11) NOT NULL AUTO_INCREMENT,
  `nomR` varchar(20) NOT NULL,
  PRIMARY KEY (`idRegion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `naissance` date NOT NULL,
  `adresse` varchar(20) DEFAULT NULL,
  `idProfilF` int(11) DEFAULT NULL,
  `mot_de_passe` varchar(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `etat` int(1) DEFAULT NULL,
  PRIMARY KEY (`idUser`),
  KEY `idProfilF` (`idProfilF`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`idUser`, `nom`, `prenom`, `naissance`, `adresse`, `idProfilF`, `mot_de_passe`, `mail`, `etat`) VALUES
(1, 'HOUANSOU', 'seth', '1999-09-23', 'thies', 1, 'passer', 'hnsseth@gmail.com', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
