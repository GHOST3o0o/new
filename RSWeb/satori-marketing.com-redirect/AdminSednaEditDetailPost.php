<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vID = $_POST['ID'];
	$CliName = $_POST['CliName'];
	$CliStatus = $_POST['CliStatus'];
	$CliStartDate = $_POST['CliStartDate'];
	$CliEndDate = $_POST['CliEndDate'];
	$CliBusCardName = $_POST['CliBusCardName'];
	$CliBusCardPhone = $_POST['CliBusCardPhone'];
	$CliPitch = $_POST['CliPitch'];
	$CliBusCardImage = $_POST['CliBusCardImage'];
	$CliBCO = $_POST['CliBCO'];
	$CliContact = $_POST['CliContact'];	
	
	$CliPhone = $_POST['CliPhone'];
	$CliEmail = $_POST['CliEmail'];
	$CliLink = $_POST['CliLink'];
	$CliAddress = $_POST['CliAddress'];
	$CliCity = $_POST['CliCity'];
	$CliState = $_POST['CliState'];
	$CliZip = $_POST['CliZip'];
	$CliPAddress = $_POST['CliPAddress'];
	$CliPCity = $_POST['CliPCity'];
	$CliPState = $_POST['CliPState'];
	$CliPZip = $_POST['CliPZip'];
	$CliNotes = $_POST['CliNotes'];
	$vMaxZipID = $_POST['MaxZipID'];
	$vMaxCatID = $_POST['MaxCatID'];
		
	//echo $vID."<br />";
	//echo $CliName."<br />";
	
	/*
	echo $CliStatus."<br />";
	echo $CliBusCardImage."<br />";	
	echo $CliZip."<br />";
	echo $CliPhone."<br />";
	echo $CliEmail."<br />";
	echo $CliAddress."<br />";
	echo $CliCity."<br />";
	echo $CliState."<br />";	
	echo $CliNotes."<br />";
	*/
	
	require_once('connectionSedna.php');
	$CliName = mysqli_real_escape_string($link, $CliName);
	$CliBusCardImage = mysqli_real_escape_string($link, $CliBusCardImage);
	$CliAddress = mysqli_real_escape_string($link, $CliAddress);
	$CliCity = mysqli_real_escape_string($link, $CliCity);
	$CliPAddress = mysqli_real_escape_string($link, $CliPAddress);
	$CliPCity = mysqli_real_escape_string($link, $CliPCity);
	$CliPitch = mysqli_real_escape_string($link, $CliPitch);
	$CliNotes = mysqli_real_escape_string($link, $CliNotes);
		
	$vSQL = "Update rs_clients Set rs_status = '".$CliStatus."', startdate = '".$CliStartDate."', enddate = '".$CliEndDate."', Name = '".$CliName."', PhysicalZip = '".$CliPZip."',  Contact = '".$CliContact."', BusCardImage = '".$CliBusCardImage."', BCOrientation = '".$CliBCO."', Phone = '".$CliPhone."', Email = '".$CliEmail."', Link = '".$CliLink."', Address = '".$CliAddress."', City = '".$CliCity."', State = '".$CliState."', Zip = '".$CliZip."', PhysicalAddress = '".$CliPAddress."', PhysicalCity = '".$CliPCity."', PhysicalState = '".$CliPState."', Notes = '".$CliNotes."', Pitch = '".$CliPitch."' Where ID_client = '".$vID."'";
	
//echo $vSQL."<br />";	
	
$vResult =  mysqli_query($link, $vSQL);
 	
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

//Now do the categories

// This is a bad way to do this but wipe everything out first and redo it
$deleteAllc = mysqli_query($link, "Delete from rs_Clients_Categories Where ID_client = '".$vID."'");
//Get the whole list
$vSQLCats = "Select ID_category, Category from rs_categories Order by Category";
$rsCatList = mysqli_query($link, $vSQLCats);
while($row = mysqli_fetch_array($rsCatList)) {
	$vCatID = $row['ID_category'];	
	$vCat = "Cat".$vCatID;
	//echo $vZip."<br />";
	//echo $_POST[$vZip]."<br />";		
	If (isset($_POST[$vCat]) ) {
		//echo "Inside if Post <br />";
		$AddCat = mysqli_query($link, "Insert Into rs_Clients_Categories (ID_Category, ID_client) Values ('".$vCatID."', '".$vID."')");
		}
}  //  end of big category loop

//Now do the discounts

// This is a bad way to do this but wipe everything out first and redo it
//$deleteAlld = mysqli_query($link, "Delete from rs_Clients_Discounts Where ID_client = '".$vID."'");
//Get the whole list
//$vSQLDiss = "Select ID_discounts, discounts from rs_Discounts Order by disount";
//$rsDisList = mysqli_query($link, $vSQLDiss);
//while($row = mysqli_fetch_array($rsDisList)) {
//	$vDisID = $row['ID_discounts'];	
//	$vDis = "Dis".$vDisID;
	//echo $vZip."<br />";
	//echo $_POST[$vZip]."<br />";		
//	If (isset($_POST[$vDis]) ) {
		//echo "Inside if Post <br />";
//		$AddDis = mysqli_query($link, "Insert Into rs_Clients_Discounts (ID_discounts, ID_client) Values ('".$vDisID."', '".$vID."')");
//		}
//}  //  end of big category loop


header("location: AdminSednaMenu.php");
