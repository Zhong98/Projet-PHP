<?php
  ini_set('default_charset',"windows-1252");
  include("Initialiser.php");
?>

<BODY  WIDTH="640" BGCOLOR="white"   style="font-size:80%;color:black">
<table><tr><td background="./images/BandeBleu.jpg"  border="0" align="center" width=1000 height=65><H1 align="CENTER" style="color:white">Projet base de données 3A</H1></td></tr></table>
<br></br>

<H1 ><b  style="color:navy">Interface SQL: </b></H1><hr align="left" width="100%" color="gray" size="1"> 
			
	<!-- 1ere ligne -->
	<br></br>


	<FORM METHOD="GET" TARGET="Resultat" ACTION="ReInitialiser.php">
	<TABLE style="margin-left:3cm" BORDER="1">
	<TR><TD>
		<TABLE BORDER="0">
		
		<TR>
		    <TD><b>Réinitialiser la base</b></TD>
		    <TD WIDTH="110" ALIGN="CENTER">
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="  Initialiser  ">	
		    </TD>
		</TR>
		</TABLE>
	</TD></TR>
	</TABLE>	
	</FORM>


	                            
		
	<!-- 4eme ligne -->

	<FORM METHOD="GET" TARGET="Resultat" ACTION="Afficher.php">
	 	<TABLE style="margin-left:3cm" WIDTH="640" BORDER="1" >
	<TR><TD>
		<TABLE BORDER="0" >
		
		<TD><H3>Requete SQL <H3></TD>
		
<TR>
<TD WIDTH="120" ALIGN="center">		    
		        Question N° : <INPUT TYPE="TEXT" SIZE="2" MAXLENGTH="2" NAME="NumQuestion">	
		    </TD>	
</TR>

<TR>
			<TD>
	 <TEXTAREA style="margin-left:3cm" rows=14 cols=40 name="requete">
	 </TEXTAREA>
	</TD>

	    <TD WIDTH="110" VALIGN="CENTER" ALIGN="CENTER">		    
		        <INPUT TYPE="SUBMIT" WIDTH="100" VALUE="Executer">	
		    </TD>
</TR>
		</TABLE>
	</TD></TR>
	</TABLE>
	</FORM>

<br></br>	
<br></br>	
<hr align="left" width="100%" color="gray" size="1"> 
<div id="pageFooter"><div id="contentCurve"></div><div class="clearfix" id="footerContainer">
<div class="lfloat"><div class="uiTextSubtitle">
<span title="HPHP - 67 - 10.22.76.119 - 697720"> walid fdhila © </span>
</BODY>
</HTML>
