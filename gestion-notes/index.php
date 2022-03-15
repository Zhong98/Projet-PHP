<?php
  ini_set('default_charset',"windows-1252");
  include("Initialiser.php");

  // Chargement des élèves dans un tableau
  $resultat=mysqli_query($id, "SELECT * FROM ELEVE;");
  $nb_eleves=mysqli_num_rows($resultat);
  for($i=0;$i<$nb_eleves;$i++)
    {
        $ligne_eleve = mysqli_fetch_assoc($resultat);
        $eleves[$i]= $ligne_eleve["prenom"];
    }

  // Chargement des matières dans un tableau
  $resultat=mysqli_query($id, "SELECT * FROM MATIERE;");
  $nb_matieres=mysqli_num_rows($resultat);
  for($i=0;$i<$nb_matieres;$i++) {
      $ligne_matiere = mysqli_fetch_assoc($resultat);
      $matieres[$i]= $ligne_matiere["intitule"];
  }

?>

<BODY BGCOLOR="white"   background="./images/blackbullet.jpg" style="font-size:100%;color:blue">
	<H1 align="CENTER">Gestion des résultats de partiels</H1>
	

	<H2>Fonctionnalités d'accès</H2>
		

	<?php
		if($msg!="") echo"<p style=\"FONT-WEIGHT: bold;font-family:verdana;color:red\">$msg</p>"
	?>

	<!-- 1ere ligne -->
	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="ReInitialiser.php">
	<TABLE WIDTH="640" BORDER="1">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
		    <TD WIDTH="170" ALIGN="CENTER">&nbsp;</TD>
		    <TD WIDTH="230" ALIGN="CENTER">&nbsp;</TD>
		    <TD WIDTH="120" ALIGN="CENTER">&nbsp;</TD>
		    <TD WIDTH="110" ALIGN="CENTER">
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="  Initialiser  ">	
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>


	
	<!-- 2eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Enregistrer.php">
	<TABLE WIDTH="640" BORDER="1">
	<TR><TD>

		<TABLE BORDER="0">
		<TR>
		    <TD WIDTH="170" ALIGN="LEFT">
		    	&Eacute;lève :
		    	<SELECT NAME="eleve" size="1">

<?php				
  foreach($eleves as $eleve) 
    { echo "\t\t\t<OPTION>$eleve</OPTION>\n";
    }
?>


			</SELECT>
		    </TD>
		    <TD WIDTH="230" ALIGN="LEFT">
		    	Matière :
		    	<SELECT NAME="matiere" size="1">
	
				
<?php				
  foreach($matieres as $matiere) 
    { echo "\t\t\t<OPTION>$matiere</OPTION>\n";
    }
?>


			</SELECT>
		    </TD>
		    <TD WIDTH="120" ALIGN="CENTER">		    
		        Note : <INPUT TYPE="TEXT" SIZE="2" MAXLENGTH="2" NAME="note">	
		    </TD>
		    
		    <TD WIDTH="110" ALIGN="CENTER">		    
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Enregistrer">	
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>
		


        <!-- 3eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Supprimer.php">
	<TABLE WIDTH="640" BORDER="1">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
		    <TD WIDTH="170" ALIGN="LEFT">
		    	&Eacute;lève :
		    	<SELECT NAME="eleve" size="1">
				
<?php				
  foreach($eleves as $eleve) 
    { echo "\t\t\t<OPTION>$eleve</OPTION>\n";
    }
?>

			</SELECT>
		    </TD>
		    <TD WIDTH="230" ALIGN="LEFT">
		    	Matière :
		    	<SELECT NAME="matiere" size="1">

				
<?php				
  foreach($matieres as $matiere) 
    { echo "\t\t\t<OPTION>$matiere</OPTION>\n";
    }
?>
		
			</SELECT>
		    </TD>
		    <TD WIDTH="120" ALIGN="CENTER">		    
		        &nbsp;	
		    </TD>
		    
		    <TD WIDTH="110" ALIGN="CENTER">		    
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Supprimer">	
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>	
		                            
			
	<!-- 4eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Afficher.php">
	<TABLE WIDTH="640" BORDER="1">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
		    <TD WIDTH="70" VALIGN="TOP "ALIGN="LEFT">
		    	&Eacute;lèves :
		    </TD>
		    <TD WIDTH="100">


<?php				
  foreach($eleves as $eleve) 
    { echo "<INPUT TYPE=\"CHECKBOX\" NAME=\"ListeEleves[]\" VALUE=\"$eleve\">$eleve<BR>\n";


    }
?>

			
		    </TD>
		    <TD WIDTH="80" VALIGN="TOP ALIGN="LEFT">
		    	Matières :
		    </TD>
		    <TD WIDTH="150">
		    	
<?php				
  foreach($matieres as $matiere) 
    { echo "<INPUT TYPE=\"CHECKBOX\" NAME=\"ListeMatieres[]\" VALUE=\"$matiere\">$matiere<BR>\n";
    }
?>
	
		    </TD>
		    <TD WIDTH="30">&nbsp;</TD> 
		    <TD WIDTH="90" VALIGN="TOP" ALIGN="LEFT">Trié par :<BR>
		        <INPUT NAME="tri" TYPE="RADIO" VALUE="eleve"    CHECKED>&Eacute;lèves<BR>
           		<INPUT NAME="tri" TYPE="RADIO" VALUE="matiere"         >Matières
		    </TD>
		    
		    <TD WIDTH="110" VALIGN="TOP" ALIGN="CENTER">		    
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Afficher">	
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>


</BODY>
</HTML>
