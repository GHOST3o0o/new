<?php

    require_once('auth.php');
	
	$vSQL = "Select ID_zipcode, Zipcode, ZipDescrip FROM rs_zipcodes ORDER BY Zipcode";
	require_once('connectionSedna.php');
		
	$vNumOfRows = 0;
				
	$rsChkList = mysqli_query($link, $vSQL);
	while($row = mysqli_fetch_array($rsChkList))
		{
		// Run through the table and check it against the items from the form the should match
		$vID = $row['ID_zipcode'];
		//echo "Inside While <br />";
		If ($row['Zipcode'] != $_POST[$vID])
			{
				echo "OOPs";
			}
   		Else 
			{
			//echo "Inside First Else <br />";
			//echo $vID;
			$vZipDelete = $_POST["Del".$vID];
	   			If ($vZipDelete == "on")
				{
		   			//echo "Delete  ".$vZipDelete."<br />";
					//echo "ID from z: ".$vID."<br />";
					//echo "zip from Post: ".$_POST[$vID]."<br />";
					$result = mysqli_query($link, "Delete From rs_zipcodes WHERE ID_zipcode = '".$vID."'");
					$result2 = mysqli_query($link, "Delete From rs_Clients_Zipcodes WHERE ID_zipcode = '".$vID."'"); 					
				}
				Else
				{
				//echo "Inside second Else <br />";
				//  Do updates
				$vNewDesc = $_POST["Desc".$vID];
				
				$vNewDesc = mysqli_real_escape_string($link, $vNewDesc);
				//echo "zip description ".$vNewDesc."<br />";
				$result3 = mysqli_query($link, "Update rs_zipcodes Set zipcode = '".$_POST[$vID]."', ZipDescrip = '".$vNewDesc."' WHERE ID_zipcode = '".$vID."'");  	
				}
		}
   }
	header("location: AdminSednaMenu.php");
 
