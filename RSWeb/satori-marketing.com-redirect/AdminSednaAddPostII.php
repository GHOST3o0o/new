<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vNewII1 = $_POST['NewII1'];
	$vNewDesc1 = $_POST['NewDesc1'];
	$vNewLink1 = $_Post['Link1'];
	$vNewII2 = $_POST['NewII2'];
	$vNewDesc2 = $_POST['NewDesc2'];
	$vNewLink2 = $_Post['Link2'];
	$vNewII3 = $_POST['NewII3'];
	$vNewDesc3 = $_POST['NewDesc3'];
	$vNewLink3 = $_Post['Link3'];
	$vNewII4 = $_POST['NewII4'];
	$vNewDesc4 = $_POST['NewDesc4'];
	$vNewLink4 = $_Post['Link4'];
	
	//echo $vNewII1;
	
	require_once('connectionSedna.php');
		
	If(strlen($vNewII1) > 2){
		$vNewII1 = mysqli_real_escape_string($link, $vNewII1);
		$vNewDesc1 = mysqli_real_escape_string($link, $vNewDesc1);
		$vNewLink1 = mysqli_real_escape_string($link, $vNewLink1);	
		$vSql1 = "Insert Into rs_Discounts (discount, icon, Link) Values ('".$vNewII1."', '".$vNewDesc1."', '".$vNewLink1."')";
		$result1 = mysqli_query($link, $vSql1);	
	}
	
	//echo $vSql1;
	
	If(strlen($vNewII2) > 2){
		$vNewII2 = mysqli_real_escape_string($link, $vNewII2);
		$vNewDesc2 = mysqli_real_escape_string($link, $vNewDesc2);
		$vNewLink2 = mysqli_real_escape_string($link, $vNewLink2);	
		$vSql2 = "Insert Into rs_Discounts (discount, icon) Values ('".$vNewII2."', '".$vNewDesc2."', '".$vNewLink2."')";
		$result2 = mysqli_query($link, $vSql2);
	}
	
	If(strlen($vNewII3) > 2){
		$vNewII3 = mysqli_real_escape_string($link, $vNewII3);
	 	$vNewDesc3 = mysqli_real_escape_string($link, $vNewDesc3);
		$vNewLink3 = mysqli_real_escape_string($link, $vNewLink3);	
		$vSql3 = "Insert Into rs_Discounts (discount, icon) Values ('".$vNewII3."', '".$vNewDesc3."', '".$vNewLink3."')";
		$result3 = mysqli_query($link, $vSql3);	
	}
	
	If(strlen($vNewII4) > 2){
		$vNewII4 = mysqli_real_escape_string($link, $vNewII4);
		$vNewDesc4 = mysqli_real_escape_string($link, $vNewDesc4);
		$vNewLink4 = mysqli_real_escape_string($link, $vNewLink4);
		$vSql4 = "Insert Into rs_Discounts (discount, icon) Values ('".$vNewII4."', '".$vNewDesc4."', '".$vNewLink4."')";
		$result4 = mysqli_query($link, $vSql4);	
	}		
	
	header("location: AdminSednaMenu.php");

