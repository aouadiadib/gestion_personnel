-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 29 Juillet 2015 à 12:30
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `rh`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(100) NOT NULL AUTO_INCREMENT,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login`, `pass`) VALUES
(1, 'admin', '123\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `conge`
--

CREATE TABLE IF NOT EXISTS `conge` (
  `id_conge` int(11) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `debut` date NOT NULL,
  `fin` date NOT NULL,
  `id_personnel` int(100) NOT NULL,
  PRIMARY KEY (`id_conge`),
  KEY `id_personnel` (`id_personnel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `conge`
--

INSERT INTO `conge` (`id_conge`, `type`, `debut`, `fin`, `id_personnel`) VALUES
(1, '', '2015-03-10', '2015-03-28', 51);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id_contact` int(100) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `sujet` text NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id_contact`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `contact`
--

INSERT INTO `contact` (`id_contact`, `email`, `sujet`, `texte`) VALUES
(1, 'hajer@mail.com', 'contact', 'contact'),
(2, 'bboyadib@live.fr', 'sujet', 'texte'),
(3, 'bboyadib@live.fr', 'sujet', 'texte'),
(4, 'c ', 'cc', 'c');

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

CREATE TABLE IF NOT EXISTS `departement` (
  `id_departement` int(100) NOT NULL AUTO_INCREMENT,
  `departement` text NOT NULL,
  PRIMARY KEY (`id_departement`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`id_departement`, `departement`) VALUES
(1, 'informatique'),
(2, 'finance'),
(3, 'qualité'),
(4, 'production');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id_personnel` int(100) NOT NULL AUTO_INCREMENT,
  `poste` text NOT NULL,
  `ncin` text NOT NULL,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `id_departement` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_personnel`),
  KEY `id_departement` (`id_departement`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=52 ;

--
-- Contenu de la table `personnel`
--

INSERT INTO `personnel` (`id_personnel`, `poste`, `ncin`, `email`, `tel`, `nom`, `prenom`, `id_departement`, `id_user`) VALUES
(44, 'technicien', '07622933', 'amin@live.fr', '27333444', 'amin', 'ayadi', 1, 21),
(45, 'chef de projet', '07622933', 'adib@gmail.com', '22222882', 'adib', 'aouadi', 1, 22),
(46, 'technicien', '07883122', 'khemrii@gmail.com', '95667788', 'amir', 'khemeiri', 1, 22),
(47, 'technicien', '07937749', 'ahmadi@gmail.com', '98664774', 'amin', 'ahmadi', 2, 22),
(48, 'ingenieur', '07947549', 'amal@live.fr', '22992222', 'amal ', 'amiri', 1, 22),
(49, 'ingenieur', '07888855', 'asmaad@gmail.com', '26710071', 'asma', 'amiri', 1, 22),
(50, 'technicien', '07654900', 'rania@gmail.com', '22332882', 'rania', 'bouslimi', 1, 22),
(51, 'agent', '07900549', 'karim@live.fr', '40998877', 'karim', 'nasri', 4, 22);

-- --------------------------------------------------------

--
-- Structure de la table `pointage`
--

CREATE TABLE IF NOT EXISTS `pointage` (
  `id_pointage` int(100) NOT NULL AUTO_INCREMENT,
  `date_t` date NOT NULL,
  `mois` text NOT NULL,
  `heur_e` text NOT NULL,
  `heur_s` text,
  `id_personnel` int(100) NOT NULL,
  PRIMARY KEY (`id_pointage`),
  KEY `id_personnel` (`id_personnel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Contenu de la table `pointage`
--

INSERT INTO `pointage` (`id_pointage`, `date_t`, `mois`, `heur_e`, `heur_s`, `id_personnel`) VALUES
(14, '2015-02-21', '02', '08:00', '18:00', 46),
(15, '2015-02-21', '02', '08:00', '18:00', 47),
(16, '2015-02-21', '02', '08:00', '18:00', 48),
(17, '2015-02-21', '02', '08:00', '18:00', 49),
(18, '2015-02-21', '02', '08:00', '19:00', 50),
(19, '2015-02-21', '02', '08:00', '18:00', 51),
(20, '2015-02-21', '02', '08:00', '18:00', 45),
(22, '2015-02-21', '02', '10:00', '18:00', 45),
(23, '2015-02-22', '02', '08:00', '18:00', 45),
(24, '2015-03-02', '03', '08:00', '18:00', 45),
(25, '2015-03-07', '03', '08:00', '18:00', 49),
(26, '2015-03-12', '03', '08:00', '18:00', 45);

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE IF NOT EXISTS `poste` (
  `id_poste` int(100) NOT NULL AUTO_INCREMENT,
  `poste` text NOT NULL,
  `id_user` int(100) NOT NULL,
  PRIMARY KEY (`id_poste`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `poste`, `id_user`) VALUES
(9, 'chef de projet    ', 22),
(10, 'technicien', 22),
(11, 'ingenieur', 22),
(12, 'agent', 22);

-- --------------------------------------------------------

--
-- Structure de la table `reclamation`
--

CREATE TABLE IF NOT EXISTS `reclamation` (
  `id_rec` int(100) NOT NULL AUTO_INCREMENT,
  `etat` text NOT NULL,
  `sujet` text NOT NULL,
  `texte` text NOT NULL,
  `repense` text,
  `id_user` int(100) NOT NULL,
  PRIMARY KEY (`id_rec`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `reclamation`
--

INSERT INTO `reclamation` (`id_rec`, `etat`, `sujet`, `texte`, `repense`, `id_user`) VALUES
(1, 'traiter', 'ouh', 'ijij', '		 \r\n		 lo,l,ds, sd', 22),
(2, 'traiter', 'ujhb', 'jn		 \r\n		 ', '		 \r\n		 knKIn', 22),
(3, 'traiter', 'klqnsvùljqsvlj', 'kjbsdvklnqskvb		 \r\n		 ', '		 \r\n		 ,snljjlb', 22),
(4, 'en cours de traitement', 'wlknvsdkqn', '		 \r\n		 moqsjcpoqsjpn', NULL, 22),
(5, 'en cours de traitement', 'qlsknvljqd ', 'qkjnlj \r\n		 ', NULL, 22);

-- --------------------------------------------------------

--
-- Structure de la table `salaire`
--

CREATE TABLE IF NOT EXISTS `salaire` (
  `id_salaire` int(100) NOT NULL AUTO_INCREMENT,
  `salaire` double NOT NULL,
  `id_poste` int(100) NOT NULL,
  PRIMARY KEY (`id_salaire`),
  KEY `id_poste` (`id_poste`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `salaire`
--

INSERT INTO `salaire` (`id_salaire`, `salaire`, `id_poste`) VALUES
(2, 70, 9),
(3, 30, 10),
(4, 40, 11),
(5, 25, 12);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `tel` text NOT NULL,
  `entreprise` text NOT NULL,
  `login` text NOT NULL,
  `pass` text NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id_user`, `email`, `tel`, `entreprise`, `login`, `pass`) VALUES
(21, 'adib@gmail.com', '26715671', 'tunisoft', 'adib', '123'),
(22, 'selmi@gmail.com', '22522222', 'iset', 'karim', '123456');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `conge`
--
ALTER TABLE `conge`
  ADD CONSTRAINT `conge_ibfk_1` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`id_departement`) REFERENCES `departement` (`id_departement`),
  ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `pointage`
--
ALTER TABLE `pointage`
  ADD CONSTRAINT `pointage_ibfk_1` FOREIGN KEY (`id_personnel`) REFERENCES `personnel` (`id_personnel`);

--
-- Contraintes pour la table `poste`
--
ALTER TABLE `poste`
  ADD CONSTRAINT `poste_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `reclamation`
--
ALTER TABLE `reclamation`
  ADD CONSTRAINT `reclamation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Contraintes pour la table `salaire`
--
ALTER TABLE `salaire`
  ADD CONSTRAINT `salaire_ibfk_1` FOREIGN KEY (`id_poste`) REFERENCES `poste` (`id_poste`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
