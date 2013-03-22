-- phpMyAdmin SQL Dump
-- version 2.11.7
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 15 Juin 2012 à 15:10
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `vente_bijoux`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `ID_ADMIN` int(4) NOT NULL auto_increment,
  `LOGIN_ADMIN` char(32) default NULL,
  `MDP_ADMIN` char(32) default NULL,
  PRIMARY KEY  (`ID_ADMIN`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`ID_ADMIN`, `LOGIN_ADMIN`, `MDP_ADMIN`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `ID_CAT` int(4) NOT NULL auto_increment,
  `NOM_CAT` char(32) default NULL,
  PRIMARY KEY  (`ID_CAT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`ID_CAT`, `NOM_CAT`) VALUES
(1, 'bague'),
(2, 'montre'),
(3, 'collier');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(8) NOT NULL auto_increment,
  `LOGIN_CLIENT` char(32) default NULL,
  `MDP_CLIENT` char(32) default NULL,
  `NOM_CLIENT` char(32) default NULL,
  `PRENOM_CLIENT` char(32) default NULL,
  `DTN_CLIENT` date default NULL,
  `ADRESSE_CLIENT` varchar(50) default NULL,
  `CP_CLIENT` int(8) default NULL,
  `VILLE_CLIENT` varchar(50) default NULL,
  `PAYS_CLIENT` varchar(50) default NULL,
  `TEL_CLIENT` char(32) default NULL,
  `MAIL_CLIENT` char(32) default NULL,
  PRIMARY KEY  (`ID_CLIENT`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `LOGIN_CLIENT`, `MDP_CLIENT`, `NOM_CLIENT`, `PRENOM_CLIENT`, `DTN_CLIENT`, `ADRESSE_CLIENT`, `CP_CLIENT`, `VILLE_CLIENT`, `PAYS_CLIENT`, `TEL_CLIENT`, `MAIL_CLIENT`) VALUES
(1, 'a', 'a', 'nom', 'prenom', '1111-11-11', 'adr', 11111, 'a', 'a', '1111111111', 'a'),
(2, 'vikas', 'kumar', 'vk', 'vk', '0000-00-00', '2545', 42, 'vk', 'vk', '456', 'dx@gh.com'),
(3, 'dimitri', 'le baliner', 'dim', 'dim', '0000-00-00', 'z', 45654, 'dim', 'dim', 'dim', 'dim@vik.vik');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `ID_PANIER` int(8) NOT NULL,
  `ID_PRODUIT` int(8) NOT NULL,
  PRIMARY KEY  (`ID_PANIER`,`ID_PRODUIT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `contenir`
--

INSERT INTO `contenir` (`ID_PANIER`, `ID_PRODUIT`) VALUES
(0, 1),
(0, 2),
(0, 4),
(1, 1),
(1, 5),
(2, 1),
(2, 2),
(2, 5),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(4, 4),
(5, 1),
(6, 1),
(7, 1),
(7, 2);

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `IDETAT` int(2) NOT NULL,
  `nomEtat` varchar(50) NOT NULL,
  PRIMARY KEY  (`IDETAT`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `etat`
--

INSERT INTO `etat` (`IDETAT`, `nomEtat`) VALUES
(0, 'En cours de traitement'),
(1, 'En cours de livraison'),
(2, 'Produit livré');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `ID_MATIERE` int(8) NOT NULL auto_increment,
  `NOM_MATIERE` char(32) default NULL,
  PRIMARY KEY  (`ID_MATIERE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `matiere`
--

INSERT INTO `matiere` (`ID_MATIERE`, `NOM_MATIERE`) VALUES
(1, 'or'),
(2, 'argent');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `ID_PANIER` int(8) NOT NULL auto_increment,
  `ID_CLIENT` int(8) NOT NULL,
  `DATE_PANIER` date default NULL,
  `ID_ETAT` int(11) NOT NULL,
  PRIMARY KEY  (`ID_PANIER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `panier`
--

INSERT INTO `panier` (`ID_PANIER`, `ID_CLIENT`, `DATE_PANIER`, `ID_ETAT`) VALUES
(1, 1, '2012-06-03', 0),
(2, 1, '2012-06-10', 0),
(3, 1, '2012-06-10', 0),
(4, 1, '2012-06-10', 0),
(5, 1, '2012-06-13', 1),
(6, 2, '2012-06-15', 0),
(7, 2, '2012-06-15', 2);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `ID_PRODUIT` int(8) NOT NULL auto_increment,
  `ID_CAT` int(4) NOT NULL,
  `ID_MATIERE` int(8) NOT NULL,
  `NOM_PRODUIT` char(32) default NULL,
  `PRIX_PRODUIT` int(4) default NULL,
  `COULEUR_PRODUIT` char(32) default NULL,
  `CARAC_PRODUIT` varchar(50) default NULL,
  `IMAGE_PRODUIT` varchar(50) default NULL,
  `QTEDISPO_PRODUIT` int(8) default NULL,
  PRIMARY KEY  (`ID_PRODUIT`),
  KEY `I_FK_PRODUIT_CATEGORIE` (`ID_CAT`),
  KEY `I_FK_PRODUIT_MATIERE` (`ID_MATIERE`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`ID_PRODUIT`, `ID_CAT`, `ID_MATIERE`, `NOM_PRODUIT`, `PRIX_PRODUIT`, `COULEUR_PRODUIT`, `CARAC_PRODUIT`, `IMAGE_PRODUIT`, `QTEDISPO_PRODUIT`) VALUES
(1, 1, 1, 'Bague Or', 800, 'or', 'pour homme', '', 7),
(2, 2, 1, 'Montre Or', 500, 'or', 'pour homme', '', 15),
(3, 3, 1, 'Collier Or', 1112, 'or', 'pour homme', '', 20),
(4, 3, 2, 'Collier de perle', 1000, 'argent', 'pour homme', '', 10),
(5, 1, 2, 'Bague argent', 245, 'argent', 'pour homme', '', 10),
(6, 1, 2, 'TEST', 950, 'TEST', 'TEST', NULL, 20);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_PRODUIT_CATEGORIE` FOREIGN KEY (`ID_CAT`) REFERENCES `categorie` (`ID_CAT`),
  ADD CONSTRAINT `FK_PRODUIT_MATIERE` FOREIGN KEY (`ID_MATIERE`) REFERENCES `matiere` (`ID_MATIERE`);
