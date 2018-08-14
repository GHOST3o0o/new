<?php

    require_once('auth.php');
	
	$vSQL = "Select ID_category, Category, CatDescrip FROM rs_categories ORDER BY Category";
	require_once('connectionSedna.php');
		
	$vNumOfRows = 0;
				
	$rsChkList = mysqli_query($link, $vSQL);
	while($row = mysqli_fetch_array($rsChkList))
		{
		// Run through the table and check it against the items from the form the should match
		$vID = $row['ID_category'];
		//echo "Inside While <br />";
		//echo $vID." <br />";
		//echo $row['Category']." <br />";
		//echo $_POST[$vID]." <br />";
		
		//echo "Inside First Else <br />";
		//echo $vID." <br />";
		$vCatDelete = $_POST["Del".$vID];
			If ($vCatDelete == "on")
			{
				//echo "Delete  ".$vCatDelete."<br />";
				//echo "ID from z: ".$vID."<br />";
				//echo "zip from Post: ".$_POST[$vID]."<br />";
				$result = mysqli_query($link, "Delete From rs_categories WHERE ID_category = '".$vID."'");
				$result2 = mysqli_query($link, "Delete From rs_Clients_Categories WHERE ID_Category = '".$vID."'"); 					
			}
			Else
			{
			//echo "Inside second Else <br />";
			//  Do updates
			$vNewDesc = "Desc".$vID;
			$result3 = mysqli_query($link, "Update rs_categories Set Category = '".$_POST[$vID]."', CatDescrip = '".$_POST[$vNewDesc]."' WHERE ID_category = '".$vID."'");  	
			}
		}
  header("location: AdminSednaMenu.php");