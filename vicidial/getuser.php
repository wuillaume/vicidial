<?php


require_once("dbconnect_mysqli.php");
require_once("functions.php");

$idAgent;
$idList;
$accion;
### If you have globals turned off uncomment these lines
if (isset($_GET["idAgent"]))						{$idAgent=$_GET["idAgent"];}
	elseif (isset($_POST["idAgent"]))				{$idAgent=$_POST["idAgent"];}

if (isset($_GET["idList"]))						{$idList=$_GET["idList"];}
	elseif (isset($_POST["idList"]))				{$idList=$_POST["idList"];}

if (isset($_GET["accion"]))						{$accion=$_GET["accion"];}
	elseif (isset($_POST["accion"]))				{$accion=$_POST["accion"];}


if ($accion =='insertAgents'){
    $stmt = "INSERT INTO vicidial_list_manual_dial(user_id, list_id) VALUES ('$idAgent','$idList')";
    $rslt=mysql_to_mysqli($stmt, $link);
		if ($rslt) {
			 echo "Agregado correctamente";
		}else{
			   echo "error al agregar";
		}
 }




?>