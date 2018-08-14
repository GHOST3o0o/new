<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vID = $_POST['ID'];
	$vMaxZipID = $_POST['MaxZipID'];
	$vMaxCatID = $_POST['MaxCatID'];
		
	//echo $vID."<br />";
	//echo $CliName."<br />";
		
	require_once('connectionSedna.php');
	
//Now do the zip codes

// This is a bad way to do this but wipe everything out first and redo it
$deleteAllz = mysqli_query($link, "Delete from rs_Clients_Zipcodes Where ID_client = '".$vID."'");
//Get the whole list
$vSQLZips = "Select ID_zipcode, Zipcode from rs_zipcodes Order by Zipcode";
$rsZipList = mysqli_query($link, $vSQLZips);
while($row = mysqli_fetch_array($rsZipList)) {
	$vZipID = $row['ID_zipcode'];	
	$vZip = "Zip".$vZipID;
	//echo $vZip."<br />";
	//echo $_POST[$vZip]."<br />";		
	If (isset($_POST[$vZip]) ) {
		//echo "Inside if Post <br />";
		$AddZip = mysqli_query($link, "Insert Into rs_Clients_Zipcodes (ID_zipcode, ID_client) Values ('".$vZipID."', '".$vID."')");
		}
}  //  end of big zipcode loop


header("location: AdminSednaMenu.php");
