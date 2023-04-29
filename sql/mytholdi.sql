-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 02 avr. 2023 à 16:00
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mytholdi`
--

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

DROP TABLE IF EXISTS `devis`;
CREATE TABLE IF NOT EXISTS `devis` (
  `codeDevis` char(5) NOT NULL,
  `dateDevis` date NOT NULL,
  `montantDevis` decimal(6,2) NOT NULL,
  `volume` decimal(4,0) DEFAULT NULL,
  `nbContainers` decimal(1,0) DEFAULT NULL,
  `valider` char(1) DEFAULT NULL,
  PRIMARY KEY (`codeDevis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `devis`
--

INSERT INTO `devis` (`codeDevis`, `dateDevis`, `montantDevis`, `volume`, `nbContainers`, `valider`) VALUES
('1', '2018-02-20', '745.25', '245', '3', 'O'),
('2', '2018-03-07', '112.50', '85', '1', 'O'),
('3', '2018-03-07', '235.25', '187', '2', 'N'),
('4', '2018-08-17', '112.50', '85', '1', 'N'),
('5', '2018-11-07', '287.50', '105', '2', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `codePays` char(4) NOT NULL,
  `nomPays` varchar(255) NOT NULL,
  PRIMARY KEY (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`codePays`, `nomPays`) VALUES
('AD', 'ANDORRE'),
('AE', 'EMIRATS ARABES UNIS'),
('AF', 'AFGHANISTAN'),
('AG', 'ANTIGUA-ET-BARBUDA'),
('AL', 'ALBANIE'),
('AM', 'ARMENIE'),
('AN', 'ANTILLES NEERLANDAIS'),
('AO', 'ANGOLA'),
('AR', 'ARGENTINE'),
('AT', 'AUTRICHE'),
('AU', 'AUSTRALIE'),
('AZ', 'AZERBAIDJAN'),
('BA', 'BOSNIE-HERZEGOVINE'),
('BB', 'BARBADE'),
('BD', 'BANGLADESH'),
('BE', 'BELGIQUE'),
('BF', 'BURKINA FASO'),
('BG', 'BULGARIE'),
('BH', 'BAHREIN'),
('BI', 'BURUNDI'),
('BJ', 'BENIN'),
('BM', 'BERMUDES'),
('BN', 'BRUNEI DARUSSALAM'),
('BO', 'BOLIVIE'),
('BR', 'BRESIL'),
('BS', 'BAHAMAS'),
('BT', 'BHOUTAN'),
('BW', 'BOTSWANA'),
('BY', 'BELARUS'),
('BZ', 'BELIZE'),
('CA', 'CANADA'),
('CD', 'CONGO (ZAIRE)'),
('CF', 'CENTRAFRICAINE, REPU'),
('CG', 'CONGO (BRAZZA)'),
('CH', 'SUISSE'),
('CI', 'COTE D\'IVOIRE'),
('CK', 'COOK, ILES'),
('CL', 'CHILI'),
('CM', 'CAMEROUN'),
('CN', 'CHINE'),
('CO', 'COLOMBIE'),
('CR', 'COSTA RICA'),
('CS', 'SERBIE-ET-MONTENEGRO'),
('CU', 'CUBA'),
('CV', 'CAP-VERT'),
('CY', 'CHYPRE'),
('CZ', 'TCHEQUIE'),
('DE', 'ALLEMAGNE'),
('DJ', 'DJIBOUTI'),
('DK', 'DANEMARK'),
('DM', 'DOMINIQUE'),
('DO', 'DOMINICAINE, REPUBL.'),
('DZ', 'ALGERIE'),
('EC', 'EQUATEUR'),
('EE', 'ESTONIE'),
('EG', 'EGYPTE'),
('ER', 'ERYTHREE'),
('ES', 'ESPAGNE'),
('ET', 'ETHIOPIE'),
('FI', 'FINLANDE'),
('FJ', 'FIDJI'),
('FM', 'MICRONESIE'),
('FR', 'FRANCE'),
('GA', 'GABON'),
('GB', 'GRANDE-BRETAGNE'),
('GD', 'GRENADE'),
('GE', 'GEORGIE'),
('GH', 'GHANA'),
('GI', 'GIBRALTAR'),
('GM', 'GAMBIE'),
('GN', 'GUINEE'),
('GQ', 'GUINEE EQUATORIALE'),
('GR', 'GRECE'),
('GT', 'GUATEMALA'),
('GU', 'GUAM'),
('GW', 'GUINEE-BISSAU'),
('GY', 'GUYANA'),
('HK', 'HONG-KONG'),
('HN', 'HONDURAS'),
('HR', 'CROATIE'),
('HT', 'HAITI'),
('HU', 'HONGRIE'),
('ID', 'INDONESIE'),
('IE', 'IRLANDE'),
('IL', 'ISRAEL'),
('IN', 'INDE'),
('IQ', 'IRAQ'),
('IR', 'IRAN'),
('IS', 'ISLANDE'),
('IT', 'ITALIE'),
('JM', 'JAMAIQUE'),
('JO', 'JORDANIE'),
('JP', 'JAPON'),
('KE', 'KENYA'),
('KG', 'KIRGHIZISTAN'),
('KH', 'CAMBODGE'),
('KI', 'KIRIBATI'),
('KM', 'COMORES'),
('KN', 'SAINT-KITTS-ET-NEVIS'),
('KP', 'COREE DU NORD'),
('KR', 'COREE DU SUD'),
('KW', 'KOWEIT'),
('KZ', 'KAZAKHSTAN'),
('LA', 'LAOS'),
('LB', 'LIBAN'),
('LC', 'SAINTE-LUCIE'),
('LI', 'LIECHTENSTEIN'),
('LK', 'SRI LANKA'),
('LR', 'LIBERIA'),
('LS', 'LESOTHO'),
('LT', 'LITUANIE'),
('LU', 'LUXEMBOURG'),
('LV', 'LETTONIE'),
('LY', 'LIBYE'),
('MA', 'MAROC'),
('MC', 'MONACO'),
('MD', 'MOLDAVIE'),
('MG', 'MADAGASCAR'),
('MH', 'MARSHALL, ILES'),
('MK', 'MACEDOINE'),
('ML', 'MALI'),
('MM', 'MYANMAR (BIRMANIE)'),
('MN', 'MONGOLIE'),
('MO', 'MACAO'),
('MR', 'MAURITANIE'),
('MT', 'MALTE'),
('MU', 'MAURICE'),
('MV', 'MALDIVES'),
('MW', 'MALAWI'),
('MX', 'MEXIQUE'),
('MY', 'MALAISIE'),
('MZ', 'MOZAMBIQUE'),
('NA', 'NAMIBIE'),
('NE', 'NIGER'),
('NG', 'NIGERIA'),
('NI', 'NICARAGUA'),
('NL', 'PAYS-BAS'),
('NO', 'NORVEGE'),
('NP', 'NEPAL'),
('NR', 'NAURU'),
('NU', 'NIUE'),
('NZ', 'NOUVELLE-ZELANDE'),
('OM', 'OMAN'),
('PA', 'PANAMA'),
('PE', 'PEROU'),
('PG', 'PAPOUASIE-NOUV.-GUIN'),
('PH', 'PHILIPPINES'),
('PK', 'PAKISTAN'),
('PL', 'POLOGNE'),
('PR', 'PORTO RICO'),
('PT', 'PORTUGAL'),
('PW', 'PALAOS'),
('PY', 'PARAGUAY'),
('QA', 'QATAR'),
('RO', 'ROUMANIE'),
('RU', 'RUSSIE'),
('RW', 'RWANDA'),
('SA', 'ARABIE SAOUDITE'),
('SB', 'SALOMON, ILES'),
('SC', 'SEYCHELLES'),
('SD', 'SOUDAN'),
('SE', 'SUEDE'),
('SG', 'SINGAPOUR'),
('SI', 'SLOVENIE'),
('SK', 'SLOVAQUIE'),
('SL', 'SIERRA LEONE'),
('SM', 'SAINT-MARIN'),
('SN', 'SENEGAL'),
('SO', 'SOMALIE'),
('SR', 'SURINAME'),
('ST', 'SAO TOME-ET-PRINCIPE'),
('SV', 'EL SALVADOR'),
('SY', 'SYRIE'),
('SZ', 'SWAZILAND'),
('TD', 'TCHAD'),
('TG', 'TOGO'),
('TH', 'THAILANDE'),
('TJ', 'TADJIKISTAN'),
('TL', 'TIMOR-LESTE'),
('TM', 'TURKMENISTAN'),
('TN', 'TUNISIE'),
('TO', 'TONGA'),
('TR', 'TURQUIE'),
('TT', 'TRINITE-ET-TOBAGO'),
('TV', 'TUVALU'),
('TW', 'TAIWAN'),
('TZ', 'TANZANIE'),
('UA', 'UKRAINE'),
('UG', 'OUGANDA'),
('US', 'ETATS-UNIS'),
('UY', 'URUGUAY'),
('UZ', 'OUZBEKISTAN'),
('VA', 'VATICAN'),
('VC', 'SAINT-VINCENT'),
('VE', 'VENEZUELA'),
('VN', 'VIET NAM'),
('VU', 'VANUATU'),
('WS', 'SAMOA'),
('YE', 'YEMEN'),
('ZA', 'AFRIQUE DU SUD'),
('ZM', 'ZAMBIE'),
('ZW', 'ZIMBABWE');

-- --------------------------------------------------------

--
-- Structure de la table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE IF NOT EXISTS `personne` (
  `codeP` int(11) NOT NULL AUTO_INCREMENT,
  `raisonSociale` varchar(50) NOT NULL,
  `adresse` varchar(80) NOT NULL,
  `cp` char(5) DEFAULT NULL,
  `ville` varchar(40) DEFAULT NULL,
  `adrMel` varchar(100) DEFAULT NULL,
  `telephone` char(20) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `codePays` char(4) DEFAULT NULL,
  `loginn` char(10) NOT NULL,
  `mdp` char(100) NOT NULL,
  PRIMARY KEY (`codeP`),
  UNIQUE KEY `login` (`loginn`),
  KEY `fk_perspays` (`codePays`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personne`
--

INSERT INTO `personne` (`codeP`, `raisonSociale`, `adresse`, `cp`, `ville`, `adrMel`, `telephone`, `contact`, `codePays`, `loginn`, `mdp`) VALUES
(1, 'Entreprise Bernard', '23 allée des accacias', '78600', 'Conflans sainte honorine', 'Ent.Bernard@orange.fr', '0134504215', 'Bernard Jean', 'FR', 'jber', 'azerty'),
(2, 'Bouchat et Fils', '12 avenue Foch', '75003', 'Paris', 'Bouchat@gmail.com', '0156854575', 'Martin Philippe', 'FR', 'pmar', 'toto'),
(3, 'Gondrand', 'route d\'alicante', '23154', 'Valence', 'contact@gondrandValence.com', '0971354499', 'Granjean Maria', 'ES', 'mgra', 'maria'),
(4, 'Agrolait', '69 rue de Chimay', '5478', 'Wavre', 's.l@agrolait.be', '3281588558', 'Sylvie Lelitre', 'BE', 'agrolait', '*F2E84D3EB'),
(5, 'ASUStek', '31 Hong Kong street', '23410', 'Taiwan', 'info@asustek.com', '+ 1 64 61 04 01', 'Tang', 'TW', 'asustek', '*F2E84D3EB'),
(6, 'Axelor', '12 rue Albert Einstein', '77420', 'Champs sur Marne', 'info@axelor.com', '+33 1 64 61 04', 'Laith Jubair', 'FR', 'axelor', '*F2E84D3EB'),
(7, 'BalmerInc S.A.', 'Rue des Palais 51, bte 33', '1000', 'Bruxelles', 'info@balmerinc.be', '(+32)2 211 34 8', 'Michel Schumacher', 'BE', 'balmerincs', '*F2E84D3EB'),
(8, 'Bank Wealthy and sons', '1 rue Rockfeller', '75016', 'Paris', 'a.g@wealthyandsons.com', '3368978776', 'Arthur Grosbonnet', 'FR', 'bankwealth', '*F2E84D3EB'),
(9, 'Camptocamp', 'PSE-A, EPFL', '1015', 'Lausanne', '', '+41 21 619 10 0', 'Luc Maurer', 'CH', 'camptocamp', '*F2E84D3EB'),
(10, 'Centrale d\'achats BML', '89 Chaussée de Liège', '1000', 'Bruxelles', 'carl.françois@bml.be', '32-258-256545', 'Carl François', 'BE', 'centraleac', '*F2E84D3EB'),
(11, 'China Export', '52 Chop Suey street', '47855', 'Shanghai', 'zen@chinaexport.com', '86-751-64845671', 'Zen', 'CN', 'chinaexpor', '*F2E84D3EB'),
(12, 'Distrib PC', '42 rue de la Lesse', '2541', 'Namur', 'info@distribpc.com', '32081256987', 'Jean Guy Lavente', 'BE', 'distribpc', '*F2E84D3EB'),
(13, 'Dubois sprl', 'Avenue de la Liberté 56', '1000', 'Brussels', 'm.dubois@dubois.be', '', '', 'BE', 'duboissprl', '*F2E84D3EB'),
(14, 'Ecole de Commerce de Liege', '2 Impasse de la Soif', '5478', 'Liege', 'k.lesbrouffe@eci-liege.info', '3242152571', 'Karine Lesbrouffe', 'BE', 'ecoledecom', '*F2E84D3EB'),
(15, 'Elec Import', '23 rue du Vieux Bruges', '2365', 'Brussels', 'info@elecimport.com', '32025897456', 'Etienne Lacarte', 'BE', 'elecimport', '*F2E84D3EB'),
(16, 'Eric Dubois', 'Chaussée de Binche, 27', '7000', 'Mons', 'e.dubois@gmail.com', '(+32).758 958 7', 'Eric Dubois', 'BE', 'ericdubois', '*F2E84D3EB'),
(17, 'Fabien Dupont', 'Blvd Kennedy, 13', '5000', 'Namur', '', '', 'Fabien Dupont', 'BE', 'fabiendupo', '*F2E84D3EB'),
(18, 'Leclerc', 'rue Grande', '29200', 'Brest', 'marine@leclerc.fr', '+33-298.334558', 'Marine Leclerc', 'FR', 'leclerc', '*F2E84D3EB'),
(19, 'Lucie Vonck', 'Chaussée de Namur', '1367', 'Grand-Rosière', '', '', 'Lucie Vonck', 'BE', 'lucievonck', '*F2E84D3EB'),
(20, 'Magazin BML 1', '89 Chaussée de Liège', '5000', 'Namur', 'lucien.ferguson@bml.be', '-569567', 'Lucien Ferguson', 'BE', 'magazinbml', '*F2E84D3EB'),
(21, 'Maxtor', '56 Beijing street', '23540', 'Hong Kong', 'info@maxtor.com', '118528456789', 'Wong', 'CN', 'maxtor', '*F2E84D3EB'),
(22, 'Mediapole SPRL', 'Rue de l\'Angelique, 1', '1348', 'Louvain-la-Neuve', '', '(+32).10.45.17.', 'Thomas Passot', 'BE', 'mediapoles', '*F2E84D3EB'),
(23, 'NotSoTiny SARL', 'Antwerpsesteenweg 254', '2000', 'Antwerpen', '', '(+32).81.81.37.', 'NotSoTiny SARL', 'BE', 'notsotinys', '*F2E84D3EB'),
(24, 'Seagate', '10200 S. De Anza Blvd', '95014', 'Cupertino', 'info@seagate.com', '1408256987', 'Seagate Technology', 'US', 'seagate', '*F2E84D3EB'),
(25, 'SmartBusiness', 'Palermo, Capital Federal', '1659', 'Buenos Aires', 'contact@smartbusiness.ar', '(5411) 4773-966', 'Jack Daniels', 'AR', 'smartbusin', '*F2E84D3EB'),
(26, 'Syleam', '1 place de l\'Église', '61000', 'Alencon', 'contact@syleam.fr', '+33 (0) 2 33 31', 'Sebastien LANGE', 'FR', 'syleam', '*F2E84D3EB'),
(27, 'Tecsas', '85 rue du traite de Rome', '84911', 'Avignon CEDEX 09', 'contact@tecsas.fr', '(+33)4.32.74.10', 'Laurent Jacot', 'FR', 'tecsas', '*F2E84D3EB'),
(28, 'The Shelve House', '25 av des Champs Elysées', '75000', 'Paris', '', '', 'Henry Chard', 'FR', 'theshelveh', '*F2E84D3EB'),
(29, 'Tiny AT Work', 'One Lincoln Street', '5501', 'Boston', 'info@tinyatwork.com', '+33 (0) 2 33 31', 'Tiny Work', 'US', 'tinyatwork', '*F2E84D3EB'),
(30, 'Université de Liège', 'Place du 20Août', '4000', 'Liège', 'martine.ohio@ulg.ac.be', '32-45895245', 'Martine Ohio', 'BE', 'université', '*F2E84D3EB'),
(31, 'Vicking Direct', 'Schoonmansveld 28', '2870', 'Puurs', '', '(+32).70.12.85.', 'Leen Vandenloep', 'BE', 'vickingdir', '*F2E84D3EB'),
(32, 'Wood y Wood Pecker', '', '', 'Kainuu', '', '(+358).9.589 68', 'Roger Pecker', 'FI', 'woodywoodp', '*F2E84D3EB'),
(33, 'ZeroOne Inc', '', '', 'Brussels', '', '', 'Geoff', 'BE', '', '*F2E84D3EB'),
(34, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'Bernard Vignard', NULL, 'bernardvig', 'christ2000'),
(36, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'Bernard Vignard', NULL, 'bernardy', 'yaoleboss'),
(39, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'Bernard Vignard', NULL, 'yaohi', 'lebossrdt'),
(42, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'konÃ© arnaud', NULL, 'arnaudn', 'Arnaud2022'),
(45, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'konÃ© arnaud', NULL, 'yaobearsty', 'azertyui'),
(46, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ekissi442@gmail.com', '767908214', 'marco paulo', NULL, 'marcodu', 'azertyuiop'),
(51, 'Babi Express', '6 rue abidjan', '78963', 'cocody', 'babiexpress@contact.fr', '114758963', 'konate', NULL, 'kone', '6f7b5d8e6a5ff42a9942e04d2f8dc151f2c6c740'),
(52, 'phanuela', '3 rue des caves perdus', '78945', 'aboisso', 'phanuela@contact.fr', '', 'Celestin Ncho', NULL, 'ncho', '078df223a73f803464ab01b7f6ab448d9a5b7f87'),
(53, 'Cergy Tansit', '11 passage de la porte comprise', '95800', 'Cergy', 'cergy.transit@contact.com', '799321458', 'Kobenan', NULL, 'krncn', '397390c8e2be4ffd6ae1c14559c8c37b59582344'),
(54, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'yaokissi.pro@gmail.com', '767908214', 'Aniecole', NULL, 'krna', '397390c8e2be4ffd6ae1c14559c8c37b59582344'),
(55, 'BlueTrans', '11 passage de la porte comprise', '95800', 'Cergy', 'BlueTrans@contact.fr', '767908214', 'Olivier Giroud', NULL, 'giroud', '56014c4652dc837dd1d58c82c4a0e42d19c7e88c'),
(56, 'Express Transit', '11 passage de la porte comprise', '95800', 'Cergy', 'ExpressTransit@gmail.com', '767908214', 'Kissi Yao', NULL, 'ykissi', '397390c8e2be4ffd6ae1c14559c8c37b59582344'),
(57, 'MicroService', '11 passage de la porte comprise', '95800', 'Cergy', 'microservice@gmail.com', '767908214', 'Jean Pierre', NULL, 'jeanp', '$2y$10$WaoErx19Acobva.eEwKs9ODikXjZOcOksd.1.Y1LP9dUrTOfFDJu2'),
(58, 'Google', '11 passage de la porte comprise', '95800', 'Cergy', 'google2@gmail.com', '767908214', 'Larry Page', NULL, 'larry', '$2y$10$q6Amnn2K3h78N1s.9g0GeO20Ztj.wQDlD40SAQ1iqXjN7X1r8yGdy'),
(59, 'micro', '11 passage de la porte comprise', '95800', 'Cergy', 'micro@gmail.com', '767908214', 'bill gates', NULL, 'billg', '$2y$10$L2HXt1Up.rRy.h9bMzwcRusT/Rzh5cxpO3ZXPTqvZoqjgLdiFl5YC'),
(60, 'phanuela', '11 passage de la porte comprise', '95800', 'Cergy', 'phanuela@gmail.com', '767908214', 'phanuel', NULL, 'phanu', '397390c8e2be4ffd6ae1c14559c8c37b59582344');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
CREATE TABLE IF NOT EXISTS `reservation` (
  `codeReservation` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebutReservation` timestamp NULL DEFAULT NULL,
  `dateFinReservation` timestamp NULL DEFAULT NULL,
  `dateReservation` timestamp NULL DEFAULT NULL,
  `volumeEstime` decimal(4,0) DEFAULT NULL,
  `codeDevis` char(5) DEFAULT NULL,
  `codeVilleMiseDispo` char(3) NOT NULL,
  `codeVilleRendre` char(3) NOT NULL,
  `codeCLient` int(11) NOT NULL,
  `etat` char(1) DEFAULT NULL,
  PRIMARY KEY (`codeReservation`),
  KEY `fk_devis` (`codeDevis`),
  KEY `fk_villeD` (`codeVilleMiseDispo`),
  KEY `fk_villeR` (`codeVilleRendre`),
  KEY `fk_pers` (`codeCLient`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`codeReservation`, `dateDebutReservation`, `dateFinReservation`, `dateReservation`, `volumeEstime`, `codeDevis`, `codeVilleMiseDispo`, `codeVilleRendre`, `codeCLient`, `etat`) VALUES
(1, '2018-01-16 23:00:00', '2018-02-23 23:00:00', '2018-01-02 23:00:00', '50', '3', '03', '02', 1, 'V'),
(2, '2018-03-15 23:00:00', '2018-04-03 22:00:00', '2018-01-07 23:00:00', '100', '2', '03', '01', 1, 'A'),
(3, '2017-12-22 23:00:00', '2017-12-23 23:00:00', '2017-12-13 23:00:00', '50', '1', '04', '01', 2, 'R'),
(4, '2018-01-16 23:00:00', '2018-02-23 23:00:00', '2018-01-02 23:00:00', '75', '5', '03', '02', 3, 'V');

-- --------------------------------------------------------

--
-- Structure de la table `reservationn`
--

DROP TABLE IF EXISTS `reservationn`;
CREATE TABLE IF NOT EXISTS `reservationn` (
  `codeReservation` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebutReservation` date NOT NULL,
  `dateFinReservation` date NOT NULL,
  `dateReservation` date NOT NULL,
  `volumeEstime` decimal(10,0) DEFAULT NULL,
  `codeDevis` char(5) DEFAULT NULL,
  `codeVilleMiseDispo` char(3) NOT NULL,
  `codeVilleRendre` char(3) NOT NULL,
  `codeClient` int(11) NOT NULL,
  `etat` char(1) DEFAULT NULL,
  PRIMARY KEY (`codeReservation`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reservationn`
--

INSERT INTO `reservationn` (`codeReservation`, `dateDebutReservation`, `dateFinReservation`, `dateReservation`, `volumeEstime`, `codeDevis`, `codeVilleMiseDispo`, `codeVilleRendre`, `codeClient`, `etat`) VALUES
(45, '2023-04-02', '2023-04-16', '2023-04-02', '500', NULL, '2', '3', 56, NULL),
(44, '2023-04-16', '2023-05-16', '2023-04-02', '50', NULL, '4', '5', 56, NULL),
(26, '2023-04-01', '2023-04-09', '2023-03-31', '3', NULL, '3', '6', 55, NULL),
(27, '2023-04-01', '2023-04-09', '2023-03-31', '3', NULL, '3', '6', 55, NULL),
(46, '2023-04-02', '2023-04-16', '2023-04-02', '500', NULL, '2', '3', 56, NULL),
(54, '2023-04-23', '2023-04-24', '2023-04-02', '4', NULL, '2', '1', 56, NULL),
(55, '2023-04-23', '2023-04-30', '2023-04-02', '1', NULL, '5', '5', 60, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `reserver`
--

DROP TABLE IF EXISTS `reserver`;
CREATE TABLE IF NOT EXISTS `reserver` (
  `codeReservation` int(11) NOT NULL,
  `typeContainer` char(4) NOT NULL,
  `qteReserver` decimal(2,0) NOT NULL,
  PRIMARY KEY (`codeReservation`,`typeContainer`),
  KEY `fk_codtyp` (`typeContainer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reserver`
--

INSERT INTO `reserver` (`codeReservation`, `typeContainer`, `qteReserver`) VALUES
(1, 'OTOP', '2'),
(1, 'REEF', '1'),
(2, 'RE20', '1'),
(3, 'FLAT', '4');

-- --------------------------------------------------------

--
-- Structure de la table `reserverr`
--

DROP TABLE IF EXISTS `reserverr`;
CREATE TABLE IF NOT EXISTS `reserverr` (
  `codeReservation` int(11) NOT NULL,
  `typeContainer` char(4) NOT NULL,
  `qteReserver` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `reserverr`
--

INSERT INTO `reserverr` (`codeReservation`, `typeContainer`, `qteReserver`) VALUES
(15, 'OTOP', '5'),
(16, 'OTOP', '2'),
(17, 'REF', '5'),
(18, 'REF', '5'),
(19, 'REF', '5'),
(20, 'OTOP', '1'),
(21, 'OTOP', '1'),
(22, 'OTOP', '1'),
(23, 'OTOP', '13'),
(45, 'OTOP', '10'),
(44, 'OTOP', '1'),
(26, 'RE20', '5'),
(27, 'RE20', '5'),
(28, 'RE20', '5'),
(29, 'RE20', '5'),
(30, 'RE20', '5'),
(31, 'RE20', '5'),
(32, 'OTOP', '2'),
(33, 'RE20', '10'),
(34, 'RE20', '10'),
(35, 'FLAT', '2'),
(36, 'FLAT', '2'),
(37, 'FLAT', '2'),
(38, 'FLAT', '2'),
(39, 'OTOP', '2'),
(40, 'OTOP', '2'),
(41, 'OTOP', '2'),
(42, 'OTOP', '2'),
(43, 'OTOP', '2'),
(46, 'OTOP', '10'),
(54, 'FLAT', '4'),
(55, 'RE20', '1');

-- --------------------------------------------------------

--
-- Structure de la table `typecontainer`
--

DROP TABLE IF EXISTS `typecontainer`;
CREATE TABLE IF NOT EXISTS `typecontainer` (
  `typeContainer` char(4) NOT NULL,
  `libelleTypeContainer` varchar(30) NOT NULL,
  `longueurCont` decimal(5,0) NOT NULL,
  `largeurCont` decimal(5,0) NOT NULL,
  `hauteurCont` decimal(4,0) NOT NULL,
  `poidsCont` decimal(5,0) DEFAULT NULL,
  `volume` decimal(3,0) DEFAULT NULL,
  `capaciteDeCharge` decimal(8,2) DEFAULT NULL,
  `tarifJour` decimal(5,2) DEFAULT NULL,
  `tarifTrim` decimal(6,2) DEFAULT NULL,
  `tarifAnn` decimal(7,2) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`typeContainer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `typecontainer`
--

INSERT INTO `typecontainer` (`typeContainer`, `libelleTypeContainer`, `longueurCont`, `largeurCont`, `hauteurCont`, `poidsCont`, `volume`, `capaciteDeCharge`, `tarifJour`, `tarifTrim`, `tarifAnn`, `photo`) VALUES
('FLAT', 'Flatracks 40', '1219', '244', '259', '4250', '70', '28000.00', '745.00', '2300.00', '7520.00', 'flat.jpg'),
('OTOP', 'Open Top 20', '606', '244', '259', '2300', '33', '26000.00', '650.00', '1980.00', '6225.00', 'otop.jpg'),
('RE20', 'Reefer 20', '606', '244', '259', '3100', '27', '23900.00', '485.00', '1050.00', '3275.00', 're20.jpg'),
('REEF', 'Reefer 40', '1219', '244', '290', '5800', '54', '26000.00', '700.00', '2250.00', '7400.00', 'reef.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

DROP TABLE IF EXISTS `ville`;
CREATE TABLE IF NOT EXISTS `ville` (
  `codeVille` char(3) NOT NULL,
  `nomVille` varchar(30) NOT NULL,
  `codePays` char(4) NOT NULL,
  PRIMARY KEY (`codeVille`),
  KEY `fk_pays` (`codePays`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`codeVille`, `nomVille`, `codePays`) VALUES
('01', 'Le Havre', 'FR'),
('02', 'Marseille', 'FR'),
('03', 'Gennevilliers', 'FR'),
('04', 'Anvers', 'BE'),
('05', 'Barcelone', 'ES'),
('06', 'Hambourg', 'DE'),
('07', 'Rotterdam', 'NL');

-- --------------------------------------------------------

--
-- Structure de la table `villes`
--

DROP TABLE IF EXISTS `villes`;
CREATE TABLE IF NOT EXISTS `villes` (
  `codeVille` char(3) NOT NULL,
  `nomVille` varchar(30) NOT NULL,
  PRIMARY KEY (`codeVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `villes`
--

INSERT INTO `villes` (`codeVille`, `nomVille`) VALUES
('01', 'Le Havre'),
('02', 'Marseille'),
('03', 'Gennevilliers'),
('04', 'Anvers'),
('05', 'Barcelone'),
('06', 'Hambourg'),
('07', 'Rotterdam');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `personne`
--
ALTER TABLE `personne`
  ADD CONSTRAINT `fk_perspays` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk_devis` FOREIGN KEY (`codeDevis`) REFERENCES `devis` (`codeDevis`),
  ADD CONSTRAINT `fk_pers` FOREIGN KEY (`codeCLient`) REFERENCES `personne` (`codeP`),
  ADD CONSTRAINT `fk_villeD` FOREIGN KEY (`codeVilleMiseDispo`) REFERENCES `ville` (`codeVille`),
  ADD CONSTRAINT `fk_villeR` FOREIGN KEY (`codeVilleRendre`) REFERENCES `ville` (`codeVille`);

--
-- Contraintes pour la table `reserver`
--
ALTER TABLE `reserver`
  ADD CONSTRAINT `fk_codres` FOREIGN KEY (`codeReservation`) REFERENCES `reservation` (`codeReservation`),
  ADD CONSTRAINT `fk_codtyp` FOREIGN KEY (`typeContainer`) REFERENCES `typecontainer` (`typeContainer`);

--
-- Contraintes pour la table `ville`
--
ALTER TABLE `ville`
  ADD CONSTRAINT `fk_pays` FOREIGN KEY (`codePays`) REFERENCES `pays` (`codePays`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
