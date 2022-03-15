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
	
	<BODY BGCOLOR="white"  style="font-size:100%;color:Black">
	<H1 align="CENTER">Liste des clients de la société Soulet</H1>
	
	
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
	
<table style='text-align:left;' border='1'>
         <tr><th>IDClient</th><th>NomClient</th><th>Rue</th><th>Ville</th><th>CodePostale</th><th>IDAire</th></tr>
    <?php
        require 'conn.php';
         $sql = mysql_query("select * from CLIENT");
         $datarow = mysql_num_rows($sql); 
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysql_fetch_assoc($sql);
                $id = $sql_arr['IdClient'];
                $nom = $sql_arr['NomClient'];
                $rue = $sql_arr['Rue'];
                $ville = $sql_arr['Ville'];
				$cp = $sql_arr['CodePostale'];
				$idaire = $sql_arr['IdAire'];
                echo "<tr><td>$id</td><td>$nom</td><td>$rue</td><td>$ville</td><td>$cp</td><td>$idaire</td><tr>";
            }
    ?>
</table>

<table style='text-align:left;' border='1'>
         <tr><th>ID</th><th>Nom</th><th>Désignation</th><th>Annee</th><th>Mois</th><th>Journee</th><th>Prix unitatire</th><th>Quantité</th></tr>
    <?php
        require 'conn.php';
         $sql = mysql_query("select CLIENT.IdClient,NomClient,NomProduit,Annee,Mois,Journee,PrixUnit,Quantite
							from CLIENT,PRODUIT,COMMANDE
							where CLIENT.IdClient=COMMANDE.IdClient
							and COMMANDE.IdProduit=PRODUIT.IdProduit
							order by IdClient
							");
         $datarow = mysql_num_rows($sql); 
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysql_fetch_assoc($sql);
                $id = $sql_arr['IdClient'];
                $nom = $sql_arr['NomClient'];
                $designation = $sql_arr['NomProduit'];
                $annee = $sql_arr['Annee'];
				$mois = $sql_arr['Mois'];
				$journee = $sql_arr['Journee'];
				$prix = $sql_arr['PrixUnit'];
				$quantite = $sql_arr['Quantite'];
                echo "<tr><td>$id</td><td>$nom</td><td>$designation</td><td>$annee</td><td>$mois</td><td>$journee</td><td>$prix</td><td>$quantite</td><tr>";
            }
    ?>
</table>
<table style='text-align:left;' border='1'>
         <tr><th>Désignation matière</th><th>Fournisseur</th><th>Prix unitaire</th></tr>
    <?php
        require 'conn.php';
         $sql = mysql_query("select NomMP,NomFournisseur,PrixUnit
							from MatierePremiere,FOURNISSEUR
							where MatierePremiere.IdFournisseur=FOURNISSEUR.IdFournisseur
							order by NomMP
							");
         $datarow = mysql_num_rows($sql); 
            for($i=0;$i<$datarow;$i++){
                $sql_arr = mysql_fetch_assoc($sql);
                $nomP = $sql_arr['NomMP'];
                $nom = $sql_arr['NomFournisseur'];
				$prix = $sql_arr['PrixUnit'];
                echo "<tr><td>$nomP</td><td>$nom</td><td>$prix</td><tr>";
            }
    ?>
</table>

<?php
	ini_set('default_charset',"windows-1252");
	include("Initialiser.php");
	$resultat=mysqli_query($id,"SELECT DISTINCT NomMP FROM MatierePremiere;");
	$nb_nomMPs=mysqli_num_rows($resultat);
	for($i=0;$i<$nb_nomMPs;$i++) {
      $ligne_nomMP = mysqli_fetch_assoc($resultat);
      $nomMPs[$i]= $ligne_nomMP["NomMP"];
	}
	
?>
<FORM METHOD="GET" TARGET="Resultat" ACTION="rechercheMP.php">
		<H2 style="padding:50px 545px;color:red">Matières Premières 
		<SELECT NAME="nomMP" size="1">
		<option value="*"></option>
		<?php				
           foreach($nomMPs as $nomMP) 
		{ echo "\t\t\t<OPTION>$nomMP</OPTION>\n";
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
	$resultat=mysqli_query($id,"SELECT NomClient FROM CLIENT;");
	$nb_nomclients=mysqli_num_rows($resultat);
	for($i=0;$i<$nb_nomclients;$i++) {
      $ligne_nomclient = mysqli_fetch_assoc($resultat);
      $nomclients[$i]= $ligne_nomclient["NomClient"];
	}
	
?>

<FORM METHOD="GET" TARGET="Resultat" ACTION="rechercheCL.php">
		<H2 style="padding:50px 545px;color:red">Nom de Client
		<SELECT NAME="nomclient" size="1">
		<option value="*"></option>
		<?php				
           foreach($nomclients as $nomclient) 
		{ echo "\t\t\t<OPTION>$nomclient</OPTION>\n";
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
	
</html>