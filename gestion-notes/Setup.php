<?php

  include("Parametres.php");

  // Connexion au serveur MySQL
  $id=mysqli_connect($host,$user,$pass) or die("Impossible de se connecter au serveur : $host");

  // Suppression / Cr�ation / S�lection de la base de donn�es : $base
  $resultat=mysqli_query($id, "DROP DATABASE IF EXISTS $base");
  $resultat=mysqli_query($id, "CREATE DATABASE $base");
  mysqli_select_db($id, $base) or die("Impossible de s�lectionner la base : $base");


  // Cr�ation de la table MATIERE
  // Remarque : il est inutile de supprimer la table au pr�alable,
  //            la base de donn�es venant juste d'�tre cr��e
  //            [ mysqli_query($id, "DROP TABLE IF EXISTS MATIERE;"); ]

  $resultat=mysqli_query($id, "CREATE TABLE MATIERE 
                         (intitule char(20) NOT NULL default ''
	  	       ) ;");

  // Insertions des 4 mati�res
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Maths');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Bases de donn�es');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('PHP');");
  $resultat=mysqli_query($id, "INSERT INTO MATIERE VALUES ('Allemand');");

  // Cr�ation de la table ELEVE
  $resultat=mysqli_query($id, "CREATE TABLE ELEVE
                         (prenom char(20) NOT NULL default '',
     		          PRIMARY KEY  (prenom)
                       ) ;");

  // Insertions des 4 �l�ves
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Pierre');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Paul');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Jean');");
  $resultat=mysqli_query($id, "INSERT INTO ELEVE VALUES ('Jacques');");

  // Cr�ation de la table RESULTAT
  $resultat=mysqli_query($id, "CREATE TABLE RESULTAT 
                         ( eleve   char(20) NOT NULL default '',
    			   matiere char(20) NOT NULL default '',
  			   note    int(2)   NOT NULL default '0',
  			   PRIMARY KEY  (eleve,matiere)
		       ) ;");
		       
?>