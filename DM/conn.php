<?php
    $con = mysql_connect("localhost","root","root");
    if(!$con){
        die(mysql_error());
    }
    mysql_select_db("BaseTest",$con);
?>