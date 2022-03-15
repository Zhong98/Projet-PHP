<?php

  include("Parametres.php");

  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass) or die("Impossible de se connecter au serveur : $host");

  // Suppression / Création / Sélection de la base de données : $base
  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base) or die("Impossible de sélectionner la base : $base");


  // Création de la table MATIERE
  // Remarque : il est inutile de supprimer la table au préalable,
  //            la base de données venant juste d'être créée
  //            [ mysqli_query($id, "DROP TABLE IF EXISTS MATIERE;"); ]

  $resultat=mysqli_query($id, "CREATE TABLE MATIERE 
                         (intitule char(20) NOT NULL default ''
	  	       ) ;");

  // Insertions des 4 matières
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Maths');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Bases de données');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('PHP');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Allemand');");

  // Création de la table ELEVE
  $resultat=mysqli_query($id, "CREATE TABLE ELEVE
                         (prenom char(20) NOT NULL default '',
     		          PRIMARY KEY  (prenom)
                       ) ;");

  // Insertions des 4 élèves
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Pierre');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Paul');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Jean');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Jacques');");

  // Création de la table RESULTAT
  $resultat=mysqli_query($id, "CREATE TABLE RESULTAT 
                         ( eleve   char(20) NOT NULL default '',
    			   matiere char(20) NOT NULL default '',
  			   note    int(2)   NOT NULL default '0',
  			   PRIMARY KEY  (eleve,matiere)
		       ) ;");
		       
?>