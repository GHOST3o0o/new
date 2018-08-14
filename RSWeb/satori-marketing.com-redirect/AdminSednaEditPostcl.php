<?php

    require_once('auth.php');
	
	require_once('connectionSedna.php');
	$vSQL = "Select ID_client, Name, rs_Status FROM rs_clients ORDER BY ID_client";
	$vNumOfRows = $_Post['NumOfRows'];
	$rsList = mysqli_query($link, $vSQL);
	while($row = mysqli_fetch_array($rsList)) {
		$vID = $row['ID_client'];
		If (isset($_POST["Del".$vID])) { 
			$vSQLDel = "Delete from rs_clients Where ID_client = '".$vID."'";
			$vDoDel = mysqli_query($link, $vSQLDel);
			$vSQLDelz = "Delete from rs_Clients_Zipcodes Where ID_client = '".$vID."'";
			$vDoDelz = mysqli_query($link, $vSQLDelz);
			$vSQLDelc = "Delete from rs_Clients_Categories Where ID_client = '".$vID."'";
			$vDoDelc = mysqli_query($link, $vSQLDelc);
		}
	}
 header("location: AdminSednaMenu.php");