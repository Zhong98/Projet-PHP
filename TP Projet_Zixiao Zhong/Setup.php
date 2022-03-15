<?php
  include("Parametres.php");

  $id=mysqli_connect($host,$user,$pass);

  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");
  
  $resultat=mysqli_query($id, "CREATE TABLE `JEUX` (
  `idJ` int(11) NOT NULL default '0',
  `NomJeux` char(50) NOT NULL ,
  `Type` char(10) NOT NULL,
  PRIMARY KEY  (`idJ`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
  
  $resultat=mysqli_query($id, "INSERT INTO `JEUX` (`idJ`, `NomJeux`, `Type`) VALUES 
  (0,'Fortnite','TPS'),
  (1,'Call Of Duty','FPS'),
  (2,'League Of Legends','MOBA'),
  (3,'Final Fantasy XIV','RPG'),
  (4,'Devil May Cry V','ACT'),
  (5,'Resident Evil 2 Remake','TPS')");
  
  $resultat=mysqli_query($id, "CREATE TABLE `DATE` (
  `idJ` int(11) NOT NULL default '0',
  `Date` char(20) NOT NULL,
  PRIMARY KEY  (`idJ`)
   ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
   
  $resultat=mysqli_query($id, "INSERT INTO `DATE`(`idJ`, `Date`) VALUES
  (0,'21/07/2017'),
  (1,'23/08/2019'),
  (2,'27/10/2009'),
  (3,'30/09/2010'),
  (4,'08/03/2019'),
  (5,'25/01/2019')");
  
  $resultat=mysqli_query($id,"CREATE TABLE `ENTREPRISE`(
  `NomJeux` char(50) NOT NULL,
  `NomEntreprise` char(50) NOT NULL,
  PRIMARY KEY  (`NomJeux`)
  ) ENGINE=MyISAM DEFAULT CHARSET=latin1;");
  
  $resultat=mysqli_query($id, "INSERT INTO `ENTREPRISE`(`NomJeux`, `NomEntreprise`) VALUES
  ('Fortnite','Epic Games'),
  ('Call Of Duty','Activision'),
  ('League Of Legends','Riot Games'),
  ('Final Fantasy XIV','Square Enix'),
  ('Devil May Cry V','Capcom'),
  ('Resident Evil 2 Remake','Capcom')");
   
 ?>
  
  
  
  
  
  
  
  
  
  
  
  