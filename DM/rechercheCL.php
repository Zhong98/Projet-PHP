<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		BODY{
			background-size:1370px 800px;
		}
	</style>
    <title>Informations</title>
</head>

<body BGCOLOR="white"  style="font-size:100%;color:blue">
<?php
        ini_set('default_charset',"windows-1252");
        include("Parametres.php");

        $nomclient = $_GET['nomclient'];
        echo "<h1>Nom:".$nomclient."</h1>";

        $id=mysqli_connect($host,$user,$pass);
        mysqli_select_db($id, $base)
        or die("Impossible de sélectionner la base : $base");

        $resultat=mysqli_query($id, "SELECT *
                             FROM CLIENT,COMMANDE,PRODUIT
                             WHERE CLIENT.IdClient=COMMANDE.IdClient
							 AND PRODUIT.IdProduit=COMMANDE.IdProduit
							 AND NomClient='$nomclient';
                             ;");
        
		$nb_client=mysqli_num_rows($resultat);
		echo "<TABLE BORDER=1> 
            <TR><TH>ID</TH><TH>Nom</TH><TH>Designation</TH><TH>Annee</TH><TH>Mois</TH><TH>Journee</TH><TH>Quantite</TH></TR>\n";
        for($i=1;$i<=$nb_client;$i++) {
            $ligne_client = mysqli_fetch_assoc($resultat);
			$id = $ligne_client["IdClient"];
            $nom = $ligne_client["NomClient"];
			$nomP = $ligne_client["NomProduit"];
			$Annee = $ligne_client["Annee"];
			$Mois = $ligne_client["Mois"];
			$Journee = $ligne_client["Journee"];
			$quantite = $ligne_client["Quantite"];
			echo "<TR><TD>$id</TD><TD>$nom</TD><TD>$nomP</TD><TD>$Annee</TD><TD>$Mois</TD><TD>$Journee</TD><TD>$quantite</TD></TR>";
			
        }
	    echo "</TABLE>\n";

		
?>
<?php
        ini_set('default_charset',"windows-1252");
        include("Parametres.php");
		
		
		$id=mysqli_connect($host,$user,$pass);
        mysqli_select_db($id, $base)
        or die("Impossible de sélectionner la base : $base");
		
		$nomclient = $_GET['nomclient'];
        echo "<h1>Nom:".$nomclient."</h1>";
		
		$resultat=mysqli_query($id, "SELECT SUM(Prix)
								FROM COMMANDE,CLIENT
								WHERE COMMANDE.IdClient=CLIENT.IdClient
								AND NomClient='$nomclient';
								;");
								
		$nb_prix=mysqli_num_rows($resultat);
		for($i=1;$i<=$nb_prix;$i++) {
            $ligne_prix = mysqli_fetch_assoc($resultat);
		$prix = $ligne_prix["SUM(Prix)"];
		}
		echo "<h1>Total: ".$prix." euros</h1>";
?>
</body>	