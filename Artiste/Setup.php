<?php
  include("Parametres.php");

  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass);

  // Suppression / Création / Sélection de la base de données : $base
  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");


 /*
-- --------------------------------------------------------

-- 
-- Structure de la table `AVoir`
-- 
*/

  $resultat=mysqli_query($id, "CREATE TABLE `AVoir` (
  `Oeuvre` int(11) NOT NULL default '0',
  `Musee` int(11) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

/*-- 
-- Contenu de la table `AVoir`
-- */

  $resultat=mysqli_query($id, "INSERT INTO `AVoir` (`Oeuvre`, `Musee`) VALUES 
(0, 7),
(1, 0),
(2, 7),
(3, 7),
(4, 7),
(5, 0),
(6, 0),
(9, 6),
(10, 6),
(11, 6),
(12, 7),
(13, 7),
(14, 5),
(15, 5),
(16, 5),
(17, 5),
(19, 0),
(20, 0),
(21, 0),
(22, 0),
(23, 2),
(24, 2),
(25, 2),
(26, 2),
(27, 1),
(28, 1),
(29, 1);");
 


/*-- --------------------------------------------------------

-- 
-- Structure de la table `Artiste`
-- */

  $resultat=mysqli_query($id, "CREATE TABLE `Artiste` (
  `idA` int(11) NOT NULL default '0',
  `Nom` mediumtext NOT NULL,
  `Origine` mediumtext NOT NULL,
  `Epoque` smallint(4) NOT NULL default '0',
  KEY `idA` (`idA`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

 
/*-- 
-- Contenu de la table `Artiste`
-- */

  $resultat=mysqli_query($id, "INSERT INTO `Artiste` (`idA`, `Nom`, `Origine`, `Epoque`) VALUES 
(0, 'Leonard de Vinci', 'Italie', 16),
(1, 'Courbet', 'France', 20),
(2, 'Canaletto', 'Italie', 18),
(3, 'Manet', 'France', 19),
(4, 'Klee', 'Suisse', 20),
(5, 'Klimt', 'Autriche', 20),
(6, 'Gauguin', 'France', 20),
(7, 'Bosch', 'Hollande', 16),
(8, 'Bruegel', 'Belgique', 16),
(9, 'Rubens', 'Belgique', 17),
(10, 'Cezanne', 'France', 19),
(11, 'Holbein', 'Allemagne', 16),
(12, 'Ingres', 'France', 19),
(13, 'Veronese', 'Italie', 16),
(14, 'Cranach', 'Allemagne', 16),
(15, 'Chagall', 'Russie', 20),
(16, 'Braque', 'France', 20),
(17, 'Carpeaux', 'France', 19),
(18, 'Redon', 'France', 20),
(19, 'Titien', 'Italie', 16),
(20, 'Rembrandt', 'Hollande', 17),
(21, 'Turner', 'Angleterre', 19),
(22, 'Rodin', 'France', 19),
(23, 'Giacometti', 'Italie', 20),
(24, 'Rubens', 'Hollande', 17);");
 

/*-- --------------------------------------------------------

-- 
-- Structure de la table `Musee`
-- */

  $resultat=mysqli_query($id,"CREATE TABLE `Musee` (
  `numero` int(11) NOT NULL default '0',
  `NomMusee` text NOT NULL,
  `Ouverture` int(11) NOT NULL default '0',
  `Fermeture` int(11) NOT NULL default '0',
  `Assurance` int(11) NOT NULL default '0',
  PRIMARY KEY  (`numero`),
  UNIQUE KEY `numero` (`numero`),
  KEY `numero_2` (`numero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

/*-- 
-- Contenu de la table `Musee`
-- */
	
  $resultat=mysqli_query($id, "INSERT INTO `Musee` (`numero`, `NomMusee`, `Ouverture`, `Fermeture`, `Assurance`) VALUES 
(0, 'Louvre', 8, 17, 10000),
(1, 'Vatican', 9, 15, 2000),
(2, 'Academia', 10, 19, 1000),
(4, 'Dresde', 7, 12, 20),
(5, 'Bruxelle', 9, 18, 3000),
(6, 'Maeght', 10, 15, 10000),
(7, 'Orsay', 9, 18, 15000);");


/*-- --------------------------------------------------------

-- 
-- Structure de la table `Oeuvre`
-- */

    $resultat=mysqli_query($id, "CREATE TABLE `Oeuvre` (
  `idO` int(11) NOT NULL default '0',
  `Titre` mediumtext NOT NULL,
  `Genre` tinytext NOT NULL,
  `Estimation` int(11) NOT NULL default '0',
  PRIMARY KEY  (`idO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

/*-- 
-- Contenu de la table `Oeuvre`
-- */

	$resultat=mysqli_query($id, "INSERT INTO `Oeuvre` (`idO`, `Titre`, `Genre`, `Estimation`) VALUES 
(1, 'La joconde', 'peinture', 234),
(0, 'L''origine du monde', 'peinture', 10000),
(2, 'Le dejeuner sur l''herbe', 'peinture', 2500),
(3, 'La danse', 'sculpture', 234),
(4, 'Femme nue couchee sur le ventre', 'sculpture', 4321),
(5, 'Le scribe', 'sculpture', 3210),
(6, 'La venus de Milo', 'sculpture', 4235),
(7, 'Panna', 'peinture', 12),
(8, 'Bonjour monsieur Gauguin', 'peinture', 123),
(9, 'L''homme qui marche', 'sculpture', 1250),
(10, 'La roue de la vie', 'sculpture', 1935),
(11, 'Les poissons', 'sculpture', 3246),
(12, 'Le boudha', 'pastel', 1940),
(13, 'Le reve', 'pastel', 2110),
(14, 'La venus et amour', 'peinture', 1800),
(15, 'L''enlevement des Sabines', 'peinture', 125),
(16, 'Le denombrement de Bethleem', 'peinture', 650),
(17, 'L''assomption', 'peinture', 321),
(18, 'Le jardin des delices', 'peinture', 1230),
(19, 'Portrait d''Erasme ecrivant', 'peinture', 227),
(20, 'Le radeau de la meduse', 'peinture', 200),
(21, 'Le portrait de Mlle Riviere', 'peinture', 174),
(22, 'Les noces de Cana', 'peinture', 45),
(23, 'L''arrivee des ambassadeurs', 'peinture', 734),
(24, 'L''arrivee de Sainte Ursule', 'peinture', 345),
(25, 'Le repas chez Levi', 'peinture', 18),
(26, 'La presentation de Marie au temple', 'peinture', 19),
(27, 'Deposition de la croix', 'peinture', 1918),
(28, 'Le couronnement de la vierge', 'peinture', 1914),
(29, 'Saint Jerome', 'peinture', 1900);");

/*-- --------------------------------------------------------

-- 
-- Structure de la table `Par`
-- */

$resultat=mysqli_query($id, "CREATE TABLE `Par` (
  `Artiste` tinyint(4) NOT NULL default '0',
  `Oeuvre` tinyint(4) NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;");

/*-- 
-- Contenu de la table `Par`
-- */

$resultat=mysqli_query($id, "INSERT INTO `Par` (`Artiste`, `Oeuvre`) VALUES 
(1, 0),
(0, 1),
(3, 2),
(17, 3),
(17, 4),
(5, 7),
(6, 8),
(23, 9),
(15, 10),
(16, 11),
(18, 12),
(18, 13),
(14, 14),
(24, 15),
(8, 16),
(24, 17),
(7, 18),
(11, 19),
(12, 21),
(13, 22),
(13, 25),
(19, 26),
(0, 29);");
	
?>