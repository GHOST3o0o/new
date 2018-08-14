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
	$CliFacebook = $_POST['CliFacebook'];
	$CliTwitter = $_POST['CliTwitter'];
	$vMaxZipID = $_POST['MaxZipID'];
	$vMaxCatID = $_POST['MaxCatID'];
		
	//echo $vID."<br />";
	//echo $CliName."<br />";
	
	require_once('connectionSedna.php');
	$CliName = mysqli_real_escape_string($link, $CliName);
	$CliBusCardImage = mysqli_real_escape_string($link, $CliBusCardImage);
	$CliAddress = mysqli_real_escape_string($link, $CliAddress);
	$CliCity = mysqli_real_escape_string($link, $CliCity);
	$CliPAddress = mysqli_real_escape_string($link, $CliPAddress);
	$CliPCity = mysqli_real_escape_string($link, $CliPCity);
	$CliFacebook = mysqli_real_escape_string($link, $CliFacebook);
	$CliTwitter = mysqli_real_escape_string($link, $CliTwitter);
	$CliPitch = mysqli_real_escape_string($link, $CliPitch);
	$CliNotes = mysqli_real_escape_string($link, $CliNotes);
		
	$vSQL = "Update rs_clients Set rs_status = '".$CliStatus."', startdate = '".$CliStartDate."', enddate = '".$CliEndDate."', Name = '".$CliName."', PhysicalZip = '".$CliPZip."',  Contact = '".$CliContact."', BusCardImage = '".$CliBusCardImage."', BCOrientation = '".$CliBCO."', Phone = '".$CliPhone."', Email = '".$CliEmail."', Link = '".$CliLink."', Address = '".$CliAddress."', City = '".$CliCity."', State = '".$CliState."', Zip = '".$CliZip."', PhysicalAddress = '".$CliPAddress."', PhysicalCity = '".$CliPCity."', PhysicalState = '".$CliPState."', Facebook = '".$CliFacebook."', Twitter = '".$CliTwitter."', Notes = '".$CliNotes."', Pitch = '".$CliPitch."' Where ID_client = '".$vID."'";
	
//echo $vSQL."<br />";	
	
$vResult =  mysqli_query($link, $vSQL);
 
header("location: AdminSednaMenu.php");
