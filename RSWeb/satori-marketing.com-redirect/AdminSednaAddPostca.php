<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vNewCat1 = $_POST['NewCat1'];
	$vNewDesc1 = $_POST['NewDesc1'];
	$vNewCat2 = $_POST['NewCat2'];
	$vNewDesc2 = $_POST['NewDesc2'];
	$vNewCat3 = $_POST['NewCat3'];
	$vNewDesc3 = $_POST['NewDesc3'];
	$vNewCat4 = $_POST['NewCat4'];
	$vNewDesc4 = $_POST['NewDesc4'];
	
	//echo $vNewCat1;
	
	require_once('connectionSedna.php');
		
	If(strlen($vNewCat1) > 2){
		$vNewCat1 = mysqli_real_escape_string($link, $vNewCat1);
		$vNewDesc1 = mysqli_real_escape_string($link, $vNewDesc1);	
		$vSql1 = "Insert Into rs_categories (Category, CatDescrip) Values ('".$vNewCat1."', '".$vNewDesc1."')";
		$result1 = mysqli_query($link, $vSql1);	
	}
	
	//echo $vSql1;
	
	If(strlen($vNewCat2) > 2){
		$vNewCat2 = mysqli_real_escape_string($link, $vNewCat2);
		$vNewDesc2 = mysqli_real_escape_string($link, $vNewDesc2);	
		$vSql2 = "Insert Into rs_categories (Category, CatDescrip) Values ('".$vNewCat2."', '".$vNewDesc2."')";
		$result2 = mysqli_query($link, $vSql2);
	}
	
	If(strlen($vNewCat3) > 2){
		$vNewCat3 = mysqli_real_escape_string($link, $vNewCat3);
	 	$vNewDesc3 = mysqli_real_escape_string($link, $vNewDesc3);	
		$vSql3 = "Insert Into rs_categories (Category, CatDescrip) Values ('".$vNewCat3."', '".$vNewDesc3."')";
		$result3 = mysqli_query($link, $vSql3);	
	}
	
	If(strlen($vNewCat4) > 2){
		$vNewCat4 = mysqli_real_escape_string($link, $vNewCat4);
		$vNewDesc4 = mysqli_real_escape_string($link, $vNewDesc4);	
		$vSql4 = "Insert Into rs_categories (Category, CatDescrip) Values ('".$vNewCat4."', '".$vNewDesc4."')";
		$result4 = mysqli_query($link, $vSql4);	
	}		
	
	header("location: AdminSednaMenu.php");

