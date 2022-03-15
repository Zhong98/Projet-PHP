<?php
  ini_set('default_charset',"windows-1252");
  include("Parametres.php");

  $ListeMatieres = $_GET['ListeMatieres'];
  $ListeEleves = $_GET['ListeEleves'];
  $tri = $_GET['tri'];

  $id=mysqli_connect($host,$user,$pass);
  mysqli_select_db($id, $base) or die("Impossible de sélectionner la base : $base");

  // Traitement des paramètres 
  // Les matières et les élèves sélectionnés sont respectivement récupurés
  // dans les tableaux  $ListeMatieres et $ListeEleves
  $NbMatieres=sizeof($ListeMatieres);
  if($NbMatieres==0) echo "Vous devez sélectionner au moins une matière<BR>\n";
  
  $NbEleves  =sizeof($ListeEleves);
  if($NbEleves==0) echo "Vous devez sélectionner au moins un élève<BR>\n";

  echo"<BODY BGCOLOR=\"white\"   background=\"./images/bgVACANCES.jpg\" style=\"font-size:80%;color:yellow\">";


  if(($NbMatieres>0)&&($NbEleves>0))
    { 
      // construction de la requête avec la 1ère matière sélectionnée
      $requete="SELECT * FROM RESULTAT WHERE ( matiere='$ListeMatieres[0]'";
      
      // ajout de toutes les autres matières sélectionnées
      for($i=1;$i<$NbMatieres;$i++)
        { $requete.=" OR matiere='$ListeMatieres[$i]'";
        }
        
      // ajout du 1er élève sélectionné
      $requete.=") AND ( eleve='$ListeEleves[0]'";
      
        // ajout de toutes les autres matières sélectionnées
      for($i=1;$i<$NbEleves;$i++)
        { $requete.=" OR eleve='$ListeEleves[$i]'";
        }
        
      // ajout de l'élément de tri
      $requete.=") ORDER BY `$tri` ASC;";
      
      // lancement de la requête,  
      $resultat=mysqli_query($id, "$requete");
      
      echo "<TABLE BORDER=1> 
            <TR><TH>&Eacute;lève</TH><TH>Matière</TH><TH>Note</TH></TR>\n";
      for($i=0;$i<mysqli_num_rows($resultat);$i++) {
          $ligne = mysqli_fetch_assoc($resultat);
          $eleve  = $ligne["eleve"];
       	  $matiere= $ligne["matiere"];
          $note   = $ligne["note"];;
        
          echo "<TR><TD>$eleve</TD><TD>$matiere</TD><TD>$note</TD></TR>\n";
        }
      echo "</TABLE>\n";
    }  

?>