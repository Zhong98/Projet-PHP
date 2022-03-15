<?php
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");

  $note = $_GET['note'];
  $eleve = $_GET['eleve'];
  $matiere = $_GET['matiere'];
  
  if( ($note<0) || ($note>20) )
    {
      echo "Erreur : Les notes doivent être entre 0 et 20<BR>";
      exit;
    }

  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");

  $resultat=mysqli_query($id, "SELECT * 
                         FROM RESULTAT
                         WHERE eleve='$eleve'
                           AND matiere='$matiere';");

  if(@mysqli_num_rows($resultat)>0)
    { // modification de la note
      $resultat=mysqli_query($id, "UPDATE RESULTAT 
	                     set note=$note  
                       	     WHERE eleve='$eleve' 
	                       AND matiere='$matiere';");
	                       
      //echo "Modification de la note de $eleve en $matiere : $note<BR>\n"; 	                       
		$msg="Modification de la note de $eleve en $matiere : $note";
		 header("Location:index.php?msg=$msg");
   		 exit;

    }
  else
    { // 1er enregistrement de la note pour ces matiere et eleve
      $resultat=mysqli_query($id, "INSERT INTO RESULTAT (`eleve`, `matiere`, `note`)
                             VALUES ('$eleve', '$matiere', '$note');");
							 /*echo "INSERT INTO RESULTAT (`eleve`, `matiere`, `note`)
                             VALUES ('$eleve', '$matiere', '$note')";
      echo "Enregistrement de la note de $eleve en $matiere : $note<BR>\n"; */
	  
	  $msg="Enregistrement de la note de $eleve en $matiere : $note";
	  header("Location:index.php?msg=$msg");
   	  exit;
	

    }
?>