<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		BODY{
			background-size:1370px 800px;
		}
	</style>
    <title>Formulaire Soulet</title>
</head>
<body BGCOLOR="white"  style="font-size:100%;color:blue">
<?php
        ini_set('default_charset',"windows-1252");
        include("Parametres.php");

        $nomMP = $_GET['nomMP'];
        echo "<h1>Matiere Premiere:".$nomMP."</h1>";

        $id=mysqli_connect($host,$user,$pass);
        mysqli_select_db($id, $base)
        or die("Impossible de sélectionner la base : $base");

        $resultat=mysqli_query($id, "SELECT NomFournisseur,MIN(PrixUnit)
                             FROM FOURNISSEUR,MatierePremiere
                             WHERE FOURNISSEUR.IdFournisseur=MatierePremiere.IdFournisseur
							 AND NomMP='$nomMP';
                             ;");
        
		$nb_fournisseur=mysqli_num_rows($resultat);
		echo "<TABLE BORDER=1> 
            <TR><TH>Meilleur Fournisseur</TH><TH>Meilleur prix</TH></TR>\n";
        for($i=1;$i<=$nb_fournisseur;$i++) {
            $ligne_fournisseur = mysqli_fetch_assoc($resultat);
            $nom = $ligne_fournisseur["NomFournisseur"];
			$prix = $ligne_fournisseur["MIN(PrixUnit)"];
			echo "<TR><TD>$nom</TD><TD>$prix</TD></TR>";
        }
	    echo "</TABLE>\n";
		
?>
</body>	