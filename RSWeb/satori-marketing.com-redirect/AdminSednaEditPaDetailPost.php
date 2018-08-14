<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vID = $_POST['ID'];
	$ParName = $_POST['ParName'];
	$ParTitle = $_POST['ParTitle'];
	$ParContact = $_POST['ParContact'];	
	$ParZip = $_POST['ParZip'];
	$ParPhone1 = $_POST['ParPhone1'];
	$ParPhone2 = $_POST['ParPhone2'];
	$ParEmail = $_POST['ParEmail'];
	$ParAddress = $_POST['ParAddress'];
	$ParCity = $_POST['ParCity'];
	$ParState = $_POST['ParState'];	
	$ParNotes = $_POST['ParNotes'];
		
	//echo $vID."<br />";
	//echo $ParName."<br />";
	
	require_once('connectionSedna.php');
	$ParName = mysqli_real_escape_string($link, $ParName);
	$ParTitle = mysqli_real_escape_string($link, $ParTitle);
	$ParContact = mysqli_real_escape_string($link, $ParContact);
	$ParAddress = mysqli_real_escape_string($link, $ParAddress);
	$ParCity = mysqli_real_escape_string($link, $ParCity);
	$ParNotes = mysqli_real_escape_string($link, $ParNotes);
		
	$vSQL = "Update rs_Partners Set Name = '".$ParName."', Title = '".$ParTitle."', Zip = '".$ParZip."',  Contact = '".$ParContact."', Phone1 = '".$ParPhone1."', Phone2 = '".$ParPhone2."', Email = '".$ParEmail."', Address = '".$ParAddress."', City = '".$ParCity."', State = '".$ParState."', Notes = '".$ParNotes."' Where ID_Partner = '".$vID."'";
	
//echo $vSQL."<br />";	
	
$vResult =  mysqli_query($link, $vSQL);
 
header("location: AdminSednaMenu.php");
