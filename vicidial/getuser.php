<?php


require_once("dbconnect_mysqli.php");
require_once("functions.php");

$id;
$idAgent;
$idList;
$accion;
### If you have globals turned off uncomment these lines
if (isset($_GET["id"]))						{$id=$_GET["id"];}
	elseif (isset($_POST["id"]))				{$id=$_POST["id"];}


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
			 echo "save success";
		}else{
			   echo "error save";
		}
 }


if ($accion =='deleteAgents'){
    $stmt = "DELETE FROM vicidial_list_manual_dial  WHERE id_listmanual=$id";
    $rslt=mysql_to_mysqli($stmt, $link);
		if ($rslt) {
			  echo "delete success";
		}else{
			   echo "error delete";
		}
 }



 if ($accion =='listAgent'){
    $stmt = "SELECT a.id_listmanual ,b.user_id,b.full_name ,c.list_name FROM vicidial_list_manual_dial a
			inner join vicidial_users b 
			on a.user_id = b.user_id
			inner join vicidial_lists c 
			on a.list_id = c.list_id
			where b.user_id = $idAgent";

    $rslt=mysql_to_mysqli($stmt, $link);
    $scripts_to_print = mysqli_num_rows($rslt);
    $array =array();
	$o=0;	
		while ($scripts_to_print > $o) 
		{
		$row=mysqli_fetch_row($rslt);
        $array[] = array("id_listmanual"=>$row[0],"user_id"=>$row[1],"full_name"=>$row[2],"list_name"=>$row[3]);
		$o++;
		}
    $myJSON = json_encode($array);
    echo $myJSON ;
 }




	 
	


?>