<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
	?>
<html>

<head>
	<meta charset="utf-8">
	<title>DG Referral System Administration Programs </title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>
<?php	  
	$vDoWhat = $_GET["What"];
	Switch ($vDoWhat) {
		Case 'Z';
		$vTitle = "Edit or Delete Zipcodes from system";
		$vSQL = "Select ID_zipcode, Zipcode, zipDescrip FROM rs_zipcodes ORDER BY Zipcode";
		break;
		
		Case 'Ca';
		$vTitle = "Edit or Delete Categories from system";
		$vSQL = "Select ID_category, Category, CatDescrip FROM rs_categories ORDER BY Category";
		break;
		
		Case 'Cl';
		$vTitle = "Edit or Delete Clients from system";
		$vSQL = "Select ID_client, Name, rs_Status, BusCardName, BusCardPhone, BusCardTagLine, BusCardImage, PhysicalZip, Phone, Email, Address, City, State, Notes FROM rs_clients ORDER BY ID_client";
		break;
	}
	
?>


<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="content">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>
    
     <h2><?=$vTitle?> </h2>
      <form action="AdminSednaEditPostz.php" name="EditZip" method="POST" >
     <table Table width="90%" align="center">
     <?php  
	 	If ($vDoWhat = "Z") {
		?>
    	<tr>
        	<td style="width:20%" >Zipcode</td> <td style="width:50%">Description</td><td style="width:10%">&nbsp;</td><td style="width:20%" align="center">Delete</td>
        </tr>
       
     <?php
	 	//Include database connection details
		require_once('connection.php');
		
		$vNumOfRows = 0;
				
		$rsEditList = mysqli_query($link, $vSQL);
		while($row = mysqli_fetch_array($rsEditList))
		 {
			 
     		$vDescName = "Desc".$row['ID_zipcode'];
			$vDelName = "Del".$row['ID_zipcode'];
     ?>
     	
     	<tr>
        	<td><input type="text" size="5" maxlength="5" name="<?= $row['ID_zipcode']; ?>" value="<?= $row['Zipcode']; ?>" > </td>
            <td><input type="text" size="50" maxlength="500" name="<?= $vDescName ?>" value="<?= $row['zipDescrip']; ?>" > </td> 
     		<td> </td>
        	<td align="center"><input type="checkbox" name="<?= $vDelName ?>" > </td>
        </tr>
        
        
    <?php
			$vNumOfRows = $vNumOfRows + 1;
			}  // End of While    
   		}	// End of If ($vDoWhat = "Z")

   		?>  
         <tr>
        	<td colspan="4">&nbsp;</td>
        </tr>   
 		<tr>
        	<td colspan="4" >
     			<input type="submit" name="EditZip" value="Submit Edits and/or Deletions"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
                <input type="hidden" name="NumOfRows" value="<?= $vNumOfRows ?>"	 />				
				
			</td>
        </tr>
 </table>
 </form>
   	<!-- end .content  --></div>	
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>

</body>

</html>