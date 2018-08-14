<?php

    require_once('auth.php');
	
	$vSQL = "Select ID_discounts, discount, icon FROM rs_Discounts ORDER BY discount";
	require_once('connectionSedna.php');
		
	$vNumOfRows = 0;
				
	$rsChkList = mysqli_query($link, $vSQL);
	while($row = mysqli_fetch_array($rsChkList))
		{
		// Run through the table and check it against the items from the form the should match
		$vID = $row['ID_discounts'];
		//echo "Inside While <br />";
		//echo $vID." <br />";
		//echo $row['discount']." <br />";
		//echo $_POST[$vID]." <br />";
		//echo $_POST[$vID]." <br />";
		//echo "Inside First Else <br />";
		//echo $vID." <br />";
		$vIIDelete = $_POST["Del".$vID];
			If ($vIIDelete == "on")
			{
				//echo "Delete  ".$vCatDelete."<br />";
				//echo "ID from z: ".$vID."<br />";
				//echo "zip from Post: ".$_POST[$vID]."<br />";
				$result = mysqli_query($link, "Delete From rs_Discounts WHERE ID_discounts = '".$vID."'");
				$result2 = mysqli_query($link, "Delete From rs_Clients_Discounts WHERE ID_discounts = '".$vID."'"); 					
			}
			Else
			{
			//echo "Inside second Else <br />";
			//  Do updates
			$vNewDesc = "Desc".$vID;
			$result3 = mysqli_query($link, "Update rs_Discounts Set discount = '".$_POST[$vID]."', icon = '".$_POST[$vNewDesc]."' WHERE ID_discounts = '".$vID."'");
			}
		}
  header("location: AdminSednaMenu.php");