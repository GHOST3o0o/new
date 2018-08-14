<?php

    require_once('auth.php');
	
	//$vSQL = "Select ID_client. rs_Status, Name, BusCardName, BusCardPhone, BusCardTagLine, BusCardImage, PhysicalZip, Phone, Link, Email, Address, City, State, Pitch, Notes";
	
	require_once('connectionSedna.php');
	
	//Get stuff from form
	$CliName = $_POST['CliName'];
		$CliName = mysqli_real_escape_string($link, $CliName);
	$CliStatus = $_POST['CliStatus'];
	$CliBusCardImage = $_POST['CliBusCardImage'];	
		$CliBusCardImage = mysqli_real_escape_string($link, $CliBusCardImage);
	$CliBusCardOrient = $_POST['CliBusCardOrient'];
	$CliContact = $_POST['CliContact'];
		$CliContact = mysqli_real_escape_string($link, $CliContact);	
	$CliPhone = $_POST['CliPhone'];
	$CliEmail = $_POST['CliEmail'];
	$CliLink = $_POST['CliLink'];
	$CliAddress = $_POST['CliAddress'];
		$CliAddress = mysqli_real_escape_string($link, $CliAddress);
	$CliCity = $_POST['CliCity'];
		$CliCity = mysqli_real_escape_string($link, $CliCity);
	$CliState = $_POST['CliState'];
	$CliZip = $_POST['CliZip'];
	$CliPAddress = $_POST['CliPAddress'];
		$CliPAddress = mysqli_real_escape_string($link, $CliPAddress);
	$CliPCity = $_POST['CliPCity'];
		$CliPCity = mysqli_real_escape_string($link, $CliPCity);
	$CliPState = $_POST['CliPState'];
	$CliPZip = $_POST['CliPZip'];
	$CliPitch = $_POST['CliPitch'];
		$CliPitch = mysqli_real_escape_string($link, $CliPitch);
	$CliNotes = $_POST['CliNotes'];
		$CliNotes = mysqli_real_escape_string($link, $CliNotes);
	
	/*
	echo $CliName."<br />";
	echo $CliStatus."<br />";
	echo $CliBusCardName."<br />";
	echo $CliBusCardPhone."<br />";
	echo $CliBusCardTagLine."<br />";
	echo $CliBusCardImage."<br />";	
	echo $CliZip."<br />";
	echo $CliPhone."<br />";
	echo $CliEmail."<br />";
	echo $CliAddress."<br />";
	echo $CliCity."<br />";
	echo $CliState."<br />";	
	echo $CliNotes."<br />";
	*/
		
	$vSQL = "Insert Into rs_clients (rs_status, Name, BusCardImage, BCOrientation, Contact, Phone, Email, Link, Address, City, State, Zip, PhysicalAddress, PhysicalCity, PhysicalState, PhysicalZip, Pitch, Notes) values ('".$CliStatus."', '".$CliName."', '".$CliBusCardImage."', '".$CliBusCardOrient."', '".$CliPhone."', '".$CliContact."', '".$CliEmail."',  '".$CliLink."', '".$CliAddress."', '".$CliCity."', '".$CliState."', '".$CliZip."', '".$CliPAddress."', '".$CliPCity."', '".$CliPState."', '".$CliPZip."', '".$CliPitch."', '".$CliNotes."')"; 
	
	$vResult1 =  mysqli_query($link, $vSQL);
 	
	//echo $vSQL."<br />";
	//echo $vResult1."<br />";
	
	//  now add the zipcodes into rs_clients_zipcodes
	//     but first get the new client ID Number
	// printf ("New Record has id %d.\n", mysqli_insert_id($link));
	//echo "<br />";
	$vNewID = mysqli_insert_id($link);
	//echo $vNewID."<br />";
	
	$vMaxZipID = $_POST['MaxZipID'];
	$vMaxCatID = $_POST['MaxCatID'];
	//echo $vMaxZipID."<br />";
	//echo $vMaxCatID."<br />";
	//echo "<br />";
	$vZipCtr = 1;
	
	While($vZipCtr <= $vMaxZipID)
		{
			//echo $vZipCtr."<br />"; 
			$vZip = "Zip".$vZipCtr;
			IF (isset($_POST[$vZip]))
				{
					If($_POST[$vZip] = "on")
					{
						$vSQLz = "Insert Into rs_Clients_Zipcodes (ID_zipcode, ID_client) Values ('".$vZipCtr."', '".$vNewID."')";
						$vResult2 = mysqli_query($link, $vSQLz);
					}
				}
			$vZipCtr = $vZipCtr + 1;
		}
		$vCatCtr = 1;
	While($vCatCtr <= $vMaxCatID)
		{ 
			//echo $vCatCtr."<br />"; 
			$vCat = "Cat".$vCatCtr;
			IF (isset($_POST[$vCat]))
				{
					If($_POST[$vCat] = "on")
					{
						$vSQLc = "Insert Into rs_Clients_Categories (ID_Category, ID_client) Values ('".$vCatCtr."', '".$vNewID."')";
						$vResult2 = mysqli_query($link, $vSQLc);
					}
				}
			$vCatCtr = $vCatCtr + 1;
		}
	header("location: AdminSednaMenu.php");			
 
