<?php

    require_once('auth.php');
	
		
	require_once('connectionSedna.php');
	
	//Get stuff from form
	$ParName = $_POST['ParName'];
		$ParName = mysqli_real_escape_string($link, $ParName);
	$ParTitle = $_POST['ParTitle'];
		$ParTitle = mysqli_real_escape_string($link, $ParTitle);
	$ParContact = $_POST['ParContact'];
		$ParContact = mysqli_real_escape_string($link, $ParContact);	
	$ParZip = $_POST['ParZip'];
	$ParPhone1 = $_POST['ParPhone1'];
	$ParPhone2 = $_POST['ParPhone2'];
	$ParEmail = $_POST['ParEmail'];
	$ParAddress = $_POST['ParAddress'];
		$ParAddress = mysqli_real_escape_string($link, $ParAddress);
	$ParCity = $_POST['ParCity'];
		$ParCity = mysqli_real_escape_string($link, $ParCity);
	$ParState = $_POST['ParState'];	
	$ParZip = $_POST['ParZip'];
	$ParNotes = $_POST['ParNotes'];
		$ParNotes = mysqli_real_escape_string($link, $ParNotes);
	
	/*
	echo $ParName."<br />";
	echo $ParTitle."<br />";
	echo $ParContact."<br />";
	//echo $ParBusCardPhone."<br />";
	//echo $ParBusCardTagLine."<br />";
	//echo $ParBusCardImage."<br />";	
	echo $ParZip."<br />";
	echo $ParPhone1."<br />";
	echo $ParEmail."<br />";
	echo $ParAddress."<br />";
	echo $ParCity."<br />";
	echo $ParState."<br />";	
	echo $ParNotes."<br />";
	*/
		
	$vSQL = "Insert Into rs_Partners (Name, Title, Contact, Phone1, Phone2, Email, Address, City, State, Zip, Notes) values ('".$ParName."', '".$ParTitle."', '".$ParContact."', '".$ParPhone1."', '".$ParPhone2."', '".$ParEmail."', '".$ParAddress."',  '".$ParCity."', '".$ParState."', '".$ParZip."', '".$ParNotes."')"; 
	
	$vResult1 =  mysqli_query($link, $vSQL);
 	
	
	header("location: AdminSednaMenu.php");			
 
