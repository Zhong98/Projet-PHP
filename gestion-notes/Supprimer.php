<?php
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");
  
  $eleve = $_GET['eleve'];
  $matiere = $_GET['matiere'];

  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");

  $resultat=mysqli_query($id, "DELETE FROM RESULTAT
                         WHERE eleve='$eleve' 
                           AND matiere='$matiere';");

  //echo "Suppression de la note de $eleve en $matiere.<BR>\n";
	$msg="Suppression de la note de $eleve en $matiere";
	header("Location:index.php?msg=$msg");
   	exit;

?>
