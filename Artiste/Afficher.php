<?php
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");

  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base)
  or die("Impossible de sélectionner la base : $base");

  
$requete=$_GET['requete'];
$requete= strtr($requete, "\\", " "); 

$NumQuestion=$_GET['NumQuestion'];

echo "<h3>Requete Numero $NumQuestion:</h3> $requete ";
?>
 
 

  <?php   
  echo "<h3>Résultat:</h3> ";
      // lancement de la requête,

      $resultat=mysqli_query($id, "$requete") or die("erreur dans la requete : $requete");

      echo "<TABLE BORDER=1>" ;
	  
             for($j=0;$j<mysqli_num_fields($resultat);$j++){
               $nomChamp = $resultat->fetch_field()->name;
			echo "<TD> $nomChamp </TD>";
		   }
		   
      for($i=0;$i<mysqli_num_rows($resultat);$i++)
        { 
		   $ligne=mysqli_fetch_row($resultat);
		   echo "<TR>";
		   for($j=0;$j<sizeof($ligne);$j++){		   
		   echo "<TD> $ligne[$j] </TD>";
		   }
		   echo "</TR>\n" ;
        }
      echo "</TABLE>\n";
      

?>