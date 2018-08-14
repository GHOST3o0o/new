<?php

    require_once('auth.php');
	
	//$vSQL = "Select ID_client. rs_Status, Name, BusCardName, BusCardPhone, BusCardTagLine, BusCardImage, PhysicalZip, Phone, Email, Address, City, State, Notes";
	
	//Get stuff from form
	$vNewZip1 = $_POST['NewZip1'];
	$vNewDesc1 = $_POST['NewDesc1'];
	$vNewZip2 = $_POST['NewZip2'];
	$vNewDesc2 = $_POST['NewDesc2'];
	$vNewZip3 = $_POST['NewZip3'];
	$vNewDesc3 = $_POST['NewDesc3'];
	$vNewZip4 = $_POST['NewZip4'];
	$vNewDesc4 = $_POST['NewDesc4'];
	
	//echo $vNewZip1;
	
	// deal with possible escape characters in the description field.  Particularly apostrophes.
	require_once('connectionSedna.php');
	$vNewDesc1 = mysqli_real_escape_string($link, $vNewDesc1);
	$vNewDesc2 = mysqli_real_escape_string($link, $vNewDesc2);
	$vNewDesc3 = mysqli_real_escape_string($link, $vNewDesc3);
	$vNewDesc4 = mysqli_real_escape_string($link, $vNewDesc4);
	
	//  Test to see if the zips are valid
	If(strlen($vNewZip1) !== 5){
		$vmsg = $vNewZip1." is not a valid zip code.";
		header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
		exit;
	}
			
	$match = preg_match("#[0-9]{5}#", $vNewZip1);
	If ($match !== 1) {
		$vmsg = $vNewZip1." is not a valid zip code.";
		header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
		exit;
	}
	
	//  Test to see if zipcode is in the database
	$vSqlTest1 = "Select Zipcode from rs_zipcodes where Zipcode = '".$vNewZip1."'";
	$rsziplist = mysqli_query($link, $vSqlTest1);
	while ($row = mysqli_fetch_array($rsziplist))
		{
		$vExistZip =  $row['Zipcode'];
		}
	if (strcasecmp($vExistZip, $vNewZip1) == 0) {
		$vmsg = "Zip Code ".$vNewZip1." already in database.";
		//echo $vmsg;
		header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
		exit;
	}
	Else {
		$vSql1 = "Insert Into rs_zipcodes (Zipcode, zipDescrip) Values ('".$vNewZip1."', '".$vNewDesc1."')";
		$result1 = mysqli_query($link, $vSql1);
	}	
	// zip code 2	
	If(strlen($vNewZip2) > 0) {   // 
		If(strlen($vNewZip2) !== 5){
			$vmsg = $vNewZip2." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
				
		$match = preg_match("#[0-9]{5}#", $vNewZip2);
		If ($match !== 1) {
			$vmsg = $vNewZip2." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		
		//  Test to see if zipcode is in the database
		$vSqlTest2 = "Select Zipcode from rs_zipcodes where Zipcode = '".$vNewZip2."'";
		$rsziplist = mysqli_query($link, $vSqlTest2);
		while ($row = mysqli_fetch_array($rsziplist))
			{
			$vExistZip =  $row['Zipcode'];
			}
		if (strcasecmp($vExistZip, $vNewZip2) == 0) {
			$vmsg = "Zip Code ".$vNewZip2." already in database.";
			//echo $vmsg;
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		Else {
			$vSql2 = "Insert Into rs_zipcodes (Zipcode, zipDescrip) Values ('".$vNewZip2."', '".$vNewDesc2."')";
			$result2 = mysqli_query($link, $vSql2);
		}	
	}
	// zip code 3	
	If(strlen($vNewZip3) > 0) {   // 
		If(strlen($vNewZip3) !== 5){
			$vmsg = $vNewZip3." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
				
		$match = preg_match("#[0-9]{5}#", $vNewZip3);
		If ($match !== 1) {
			$vmsg = $vNewZip3." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		
		//  Test to see if zipcode is in the database
		$vSqlTest3 = "Select Zipcode from rs_zipcodes where Zipcode = '".$vNewZip3."'";
		$rsziplist = mysqli_query($link, $vSqlTest3);
		while ($row = mysqli_fetch_array($rsziplist))
			{
			$vExistZip =  $row['Zipcode'];
			}
		if (strcasecmp($vExistZip, $vNewZip3) == 0) {
			$vmsg = "Zip Code ".$vNewZip3." already in database.";
			//echo $vmsg;
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		Else {
			$vSql3 = "Insert Into rs_zipcodes (Zipcode, zipDescrip) Values ('".$vNewZip3."', '".$vNewDesc3."')";
			$result3 = mysqli_query($link, $vSql3);
		}	
	}	
	// zip code 4	
	If(strlen($vNewZip4) > 0) {   // 
		If(strlen($vNewZip4) !== 5){
			$vmsg = $vNewZip4." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
				
		$match = preg_match("#[0-9]{5}#", $vNewZip4);
		If ($match !== 1) {
			$vmsg = $vNewZip4." is not a valid zip code.";
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		
		//  Test to see if zipcode is in the database
		$vSqlTest4 = "Select Zipcode from rs_zipcodes where Zipcode = '".$vNewZip4."'";
		$rsziplist = mysqli_query($link, $vSqlTest4);
		while ($row = mysqli_fetch_array($rsziplist))
			{
			$vExistZip =  $row['Zipcode'];
			}
		if (strcasecmp($vExistZip, $vNewZip4) == 0) {
			$vmsg = "Zip Code ".$vNewZip4." already in database.";
			//echo $vmsg;
			header('Location: http://www.satori-marketing.com/AdminSednaAddZ.php?msg='.$vmsg);
			exit;
		}
		Else {
			$vSql4 = "Insert Into rs_zipcodes (Zipcode, zipDescrip) Values ('".$vNewZip4."', '".$vNewDesc4."')";
			$result4 = mysqli_query($link, $vSql4);
		}	
	}	
	
	header("location: AdminSednaMenu.php");

