-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Client :  localhost:3306
-- Généré le :  Mar 04 Avril 2017 à 09:16
-- Version du serveur :  5.5.49-log
-- Version de PHP :  7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_imie`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `login` varchar(25) DEFAULT NULL,
  `mdp` varchar(60) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `login`, `mdp`, `nom`, `prenom`) VALUES
(1, 'kenny.richard@imie.fr', '6451ce6c06298eb87a0e1a87b9b6749cb11105a2', 'richard', 'kenny'),
(2, 'julien.pinto@imie.fr', '6451ce6c06298eb87a0e1a87b9b6749cb11105a2', 'pinto', 'julien'),
(3, 'elisaklein66@gmail.com', '6451ce6c06298eb87a0e1a87b9b6749cb11105a2', 'KLEIN', 'Elisa'),
(8, 'yan.j@imie.fr', '6451ce6c06298eb87a0e1a87b9b6749cb11105a2', 'jeudy', 'yan');

-- --------------------------------------------------------

--
-- Structure de la table `campus_imie`
--

CREATE TABLE IF NOT EXISTS `campus_imie` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `code_campus` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `campus_imie`
--

INSERT INTO `campus_imie` (`id`, `nom`, `code_campus`) VALUES
(1, 'Le Mans', 'LEM'),
(2, 'Angers', 'ANG'),
(3, 'Laval', 'LAV'),
(4, 'Caen', 'CAE'),
(5, 'Nantes', 'NAN'),
(6, 'Rennes', 'REN');

-- --------------------------------------------------------

--
-- Structure de la table `fiche_contact`
--

CREATE TABLE IF NOT EXISTS `fiche_contact` (
  `id` int(11) NOT NULL,
  `civilite` int(2) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `date_naissance` date NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `formation` varchar(25) DEFAULT NULL,
  `diplome_obtenu` varchar(25) NOT NULL,
  `etab_origine` varchar(25) NOT NULL,
  `info_imie` varchar(25) DEFAULT NULL,
  `disponibilite` varchar(50) NOT NULL,
  `date_formulaire` date NOT NULL,
  `id_campus_imie` int(11) NOT NULL,
  `id_statut` int(11) DEFAULT NULL,
  `id_formation` int(11) NOT NULL,
  `id_formation_1` int(11) DEFAULT NULL,
  `id_formation_2` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `fiche_contact`
--

INSERT INTO `fiche_contact` (`id`, `civilite`, `nom`, `prenom`, `date_naissance`, `tel`, `email`, `formation`, `diplome_obtenu`, `etab_origine`, `info_imie`, `disponibilite`, `date_formulaire`, `id_campus_imie`, `id_statut`, `id_formation`, `id_formation_1`, `id_formation_2`) VALUES
(2, 2, 'KLEIN', 'Elisa', '1991-06-06', 632964965, 'elisaklein66@gmail.com', 'it start', 'bts', 'imie', '', 'immédiate', '2017-03-20', 2, 2, 1, 2, 2),
(3, 1, 'jean', 'dev', '1992-12-05', 645789421, 'jeandev@gmail.com', '', 'jiforg', '', 'presse', 'Immédiate', '2017-03-23', 5, 5, 7, NULL, NULL),
(4, 1, 'HAMELIN', 'Paul', '1997-04-12', 614859362, 'paul.h@hotmail.fr', '', 'BAC S', '', 'site internet', '', '2017-03-29', 1, 5, 1, NULL, NULL),
(5, 2, 'jean', 'dev', '1995-02-15', 245789451, 'jean.dev@bg.fr', '', 'BAC S', '', 'site internet', '', '2017-03-30', 3, 5, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `code_formation` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id`, `nom`, `code_formation`) VALUES
(1, 'Chef de projet Conception de SI', '001'),
(2, 'Concepteur développeur projets numériques', '002'),
(3, 'Développeur Logiciel', '003'),
(4, 'Responsable Infrastructures Systèmes Réseaux', '004'),
(5, 'Technicien support informatique', '005'),
(6, 'Web master designer', '006'),
(7, 'Bachelor digital', '007'),
(8, 'BTS SIO', '008'),
(9, 'Digistart', '009'),
(10, 'IT Start', '010'),
(11, 'Concepteur développeur (Autres financements)', '011'),
(12, 'Développeur logiciel (Autres financements)', '012'),
(13, 'Responsable infrastructure (Autres financements)', '013'),
(14, 'Technicien réseaux & télécoms (Autres financements)', '014'),
(15, 'Technicien support informatique (Autres financements)', '015');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE IF NOT EXISTS `statut` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) DEFAULT NULL,
  `code_statut` varchar(25) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `statut`
--

INSERT INTO `statut` (`id`, `nom`, `code_statut`) VALUES
(1, 'Congé Individuel Formation', '001'),
(2, 'Contrat de professionnalisation', '002'),
(3, 'Contrat sécurisation professionnelle', '003'),
(4, 'Convention d''observation', '004'),
(5, 'Demandeur d''emploi', '005'),
(6, 'Etudiant', '006'),
(7, 'Formation professionnelle', '007'),
(8, 'Période de professionnalisation', '008'),
(9, 'Salarié', '009'),
(10, 'Stagiaire', '010');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `campus_imie`
--
ALTER TABLE `campus_imie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `fiche_contact`
--
ALTER TABLE `fiche_contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_fiche_contact_id_campus_imie` (`id_campus_imie`),
  ADD KEY `FK_fiche_contact_id_statut` (`id_statut`),
  ADD KEY `FK_fiche_contact_id_formation` (`id_formation`),
  ADD KEY `FK_fiche_contact_id_formation_1` (`id_formation_1`),
  ADD KEY `FK_fiche_contact_id_formation_2` (`id_formation_2`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `campus_imie`
--
ALTER TABLE `campus_imie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `fiche_contact`
--
ALTER TABLE `fiche_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `fiche_contact`
--
ALTER TABLE `fiche_contact`
  ADD CONSTRAINT `FK_fiche_contact_id_campus_imie` FOREIGN KEY (`id_campus_imie`) REFERENCES `campus_imie` (`id`),
  ADD CONSTRAINT `FK_fiche_contact_id_formation` FOREIGN KEY (`id_formation`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_fiche_contact_id_formation_1` FOREIGN KEY (`id_formation_1`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_fiche_contact_id_formation_2` FOREIGN KEY (`id_formation_2`) REFERENCES `formation` (`id`),
  ADD CONSTRAINT `FK_fiche_contact_id_statut` FOREIGN KEY (`id_statut`) REFERENCES `statut` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
