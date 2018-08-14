<?php

    require_once('auth.php');
	
	//Get stuff from form
	$vID = $_POST['ID'];
	$vMaxCatID = $_POST['MaxCatID'];
		
	//echo $vID."<br />";
	//echo $CliName."<br />";
	require_once('connectionSedna.php');
		

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


header("location: AdminSednaMenu.php");
