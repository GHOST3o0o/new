<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vID = $_POST['ID'];
	require_once('connectionSedna.php');
//Now do the discounts

// This is a bad way to do this but wipe everything out first and redo it
$deleteAlld = mysqli_query($link, "Delete from rs_Clients_Discounts Where ID_client = '".$vID."'");
//Get the whole list
$vSQLDiss = "Select ID_discounts, discount from rs_Discounts Order by discount";
$rsDisList = mysqli_query($link, $vSQLDiss);
while($row = mysqli_fetch_array($rsDisList)) {
	$vDisID = $row['ID_discounts'];	
	$vDis = "Dis".$vDisID;
	//echo $vZip."<br />";
	//echo $_POST[$vZip]."<br />";		
	If (isset($_POST[$vDis]) ) {
		//echo "Inside if Post <br />";
		$AddDis = mysqli_query($link, "Insert Into rs_Clients_Discounts (ID_discounts, ID_client) Values ('".$vDisID."', '".$vID."')");
		}
}  //  end of discounts loop

//echo $AddDis

header("location: AdminSednaMenu.php");
