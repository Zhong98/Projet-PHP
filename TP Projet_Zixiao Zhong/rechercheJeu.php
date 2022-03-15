<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<style>
		BODY{
			background-size:1370px 800px;
		}
	</style>
    <title>Informations des Jeux</title>
</head>
<body BGCOLOR="white"   background="./image/Call-of-duty-modern-warfare-2019.jpg" style="font-size:100%;color:blue">
    <?php
        ini_set('default_charset',"windows-1252");
        include("Parametres.php");

        $NomJeux = $_GET['NomJeux'];
        echo "<h1>Nom de jeu: ".$NomJeux."</br></h1>";

        $id=mysqli_connect($host,$user,$pass);
        mysqli_select_db($id, $base)
        or die("Impossible de sélectionner la base : $base");

        $resultat=mysqli_query($id, "SELECT Type,Date,NomEntreprise
                             FROM JEUX,DATE,ENTREPRISE
                             WHERE JEUX.idJ=DATE.idJ
							 AND ENTREPRISE.NomJeux=JEUX.NomJeux
							 AND JEUX.NomJeux='$NomJeux';
                             ;");
		echo "<TABLE BORDER=1> 
            <TR><TH>Type</TH><TH>Date de sortie</TH><TH>Entreprise</TH></TR>\n";							 
			$ligne_jeux = mysqli_fetch_assoc($resultat);
			$Type = $ligne_jeux["Type"];
			$Date = $ligne_jeux["Date"];
			$Entreprise = $ligne_jeux["NomEntreprise"];
			echo "<TR><TD>$Type</TD><TD>$Date</TD><TD>$Entreprise</TD></TR>";
		echo "</TABLE>\n";
    ?>
</body>	