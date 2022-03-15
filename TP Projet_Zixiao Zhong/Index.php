<?php
	ini_set('default_charset',"windows-1252");
	include("Initialiser.php");
	$resultat=mysqli_query($id,"SELECT DISTINCT Type FROM JEUX;");
	$nb_types=mysqli_num_rows($resultat);
	for($i=0;$i<$nb_types;$i++) {
      $ligne_type = mysqli_fetch_assoc($resultat);
      $types[$i]= $ligne_type["Type"];
	}
	
?>
<html>
	<head>
	    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		body{
			background-size:1400px 850px;
			background-repeat:no-repeat;
		}
		
		SELECT{
			padding:5px 10px;
		}		
		
	</style>
    <title>Informations des Jeux</title>
	</head>
	
	<BODY BGCOLOR="white"   background="./image/fortnite.jpg" style="font-size:100%;color:Black">
	<H1 align="CENTER">Welcome to the world of games</H1>
	
	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="ReInitialiser.php">
	<TABLE WIDTH="1350" BORDER="1">
	<TR><TD>
		<TABLE BORDER="0">
		<TR>
		    <TD WIDTH="230" ALIGN="CENTER">&nbsp;</TD>
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
	
	
	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="rechercheTy.php">
		<H2 style="padding:50px 545px;color:red">Type: 
		<SELECT NAME="type" size="1">
		<option value="*"></option>
		<?php				
           foreach($types as $type) 
		{ echo "\t\t\t<OPTION>$type</OPTION>\n";
		}
?>
		</SELECT>
		<TD WIDTH="120" ALIGN="CENTER">		    
		    &nbsp;	
		</TD>
		<TD WIDTH="110" ALIGN="CENTER">	
		    <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Search">	
		</TD>		
		</H2>
	</FORM>
	
<?php
	ini_set('default_charset',"windows-1252");
	include("Initialiser.php");
	$resultat=mysqli_query($id,"SELECT DISTINCT NomEntreprise FROM ENTREPRISE;");
	$nb_NomEntreprises=mysqli_num_rows($resultat);
	for($i=0;$i<$nb_NomEntreprises;$i++) {
      $ligne_NomEntreprise = mysqli_fetch_assoc($resultat);
      $NomEntreprises[$i]= $ligne_NomEntreprise["NomEntreprise"];
	}
	
?>	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="rechercheEn.php">
		<H2 style="padding:50px 481px; color:pink">Entreprise: 
		<SELECT NAME="NomEntreprise" size="1">
		<option value="*"></option>
		<?php				
           foreach($NomEntreprises as $NomEntreprise) 
		{ echo "\t\t\t<OPTION>$NomEntreprise</OPTION>\n";
		}
?>
		</SELECT>
		<TD WIDTH="120" ALIGN="CENTER">		    
		    &nbsp;	
		</TD>
		<TD WIDTH="110" ALIGN="CENTER">	
		    <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Search">	
		</TD>		
		</H2>
	</FORM>
	
	
	
<?php
	ini_set('default_charset',"windows-1252");
	include("Initialiser.php");
	$resultat=mysqli_query($id,"SELECT DISTINCT NomJeux FROM JEUX;");
	$nb_NomJeux=mysqli_num_rows($resultat);
	for($i=0;$i<$nb_NomJeux;$i++) {
      $ligne_NomJeux = mysqli_fetch_assoc($resultat);
      $NomJeux[$i]= $ligne_NomJeux["NomJeux"];
	}
	
?>	
	<FORM METHOD="GET" TARGET="Resultat" ACTION="rechercheJeu.php">
		<H2 style="padding:60px 459px; color:purple">Nom de Jeu: 
		<SELECT NAME="NomJeux" size="1">
		<option value="*"></option>
		<?php				
           foreach($NomJeux as $NomJeux) 
		{ echo "\t\t\t<OPTION>$NomJeux</OPTION>\n";
		}
?>
		</SELECT>
		<TD WIDTH="120" ALIGN="CENTER">		    
		    &nbsp;	
		</TD>
		<TD WIDTH="110" ALIGN="CENTER">	
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Search">	
		</TD>
		</H2>
	</FORM>
</BODY>