<?php
	require_once('auth.php');

	require_once('connectionSedna.php');
//	$result = mysqli_query($link, "Select ID_client from rs_Clients_Zipcodes Where ID_client = '".$vID."' and ID_zipcode = '".$vZipID."'");
	$result = mysqli_query($link, "Select ID_client from rs_Clients_Zipcodes Where ID_client = '12' and ID_zipcode = '1'");
	while($row = mysqli_fetch_row($result)) {
	echo $row[0];
	}