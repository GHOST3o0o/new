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

<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="tallcontent">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>
    
    
     <h2>Add Clients to the system</h2>
      <form action="AdminSednaAddPostcl.php" name="AddClient" method="POST" >
     <table width="90%" align="center">
    	<tr>
        	<td style="width:30%" >Name: </td>
            <td style="width:70%"><input type="text" size="20" maxlength="100" name="CliName" value" " > </td>
        </tr>
      	<tr>
        	<td style="width:30%" >Status: </td>
            <td style="width:70%"><input type="text" size="2" maxlength="2" name="CliStatus" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Bus. Card Name: </td>
            <td style="width:70%"><input type="text" size="20" maxlength="100" name="CliBusCardName" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Bus. Card Phone: </td>
            <td style="width:70%"><input type="text" size="20" maxlength="100" name="CliBusCardPhone" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Bus. Card Tagline: </td>
            <td style="width:70%"><input type="text" size="50" maxlength="250" name="CliBusCardTagLine" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Bus. Card Image: </td>
            <td style="width:70%"><input type="text" size="30" maxlength="30" name="CliBusCardImage" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Physical Zip: </td>
            <td style="width:70%"><input type="text" size="5" maxlength="100" name="CliZip" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Phone: </td>
            <td style="width:70%"><input type="text" size="20" maxlength="20" name="CliPhone" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Email: </td>
            <td style="width:70%"><input type="text" size="50" maxlength="50" name="CliEmail" value" " > </td>
        </tr>        
    	<tr>
        	<td style="width:30%" >Address: </td>
            <td style="width:70%"><input type="text" size="50" maxlength="50" name="CliAddress" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >City: </td>
            <td style="width:70%"><input type="text" size="50" maxlength="50" name="CliCity" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >State: </td>
            <td style="width:70%"><input type="text" size="2" maxlength="20" name="CliState" value" " > </td>
        </tr> 
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="3" cols="50" name="CliNotes" ></textarea></td>
        </tr>
        </table>
        
        <table width="90%" align="center">
     	<tr>
        	<td style="width:50%" align="center" ><b>Zipcodes</b> </td>
            <td style="width:50%" align="center" ></td>
        </tr>
        <?php 
			//Include database connection details
			require_once('connection.php');	
        
        	$vSQLZip = "Select ID_zipcode, Zipcode From rs_zipcodes Order by Zipcode";
			$vSQLCat = "Select ID_category, Category From rs_categories Order by Category";
			
			$rsZipList = mysqli_query($link, $vSQLZip);

			$vRowCtr = 1;
			while($row = mysqli_fetch_array($rsZipList))
		 		{
				$vZip = "Zip".$row['ID_zipcode'];
				?>
                <tr>
                <td align="center" ><input type="checkbox" name="<?= $vZip ?>" /> <?= $row['Zipcode'] ?> </td>
				<td></td>
				</tr>
				<?php 
				}
				//  Now list the categories
				?>
                <tr>
					<td>&nbsp;</td>
                    <td></td>
				</tr>
				<tr>
					<td style="width:50%" align="center" ><b>Categories</b></td>
                    <td></td>
				</tr>
                <?php 
			$rsCatList = mysqli_query($link, $vSQLCat);	
			while($row = mysqli_fetch_array($rsCatList))
		 		{
				$vCat = "Cat".$row['ID_category'];
				//echo $row['Categroy'];
				?>
                <tr>
 				<td align="center" ><input type="checkbox" name="<?= $vCat ?>" /> <?= $row['Category'] ?> </td>
                <td></td>
				</tr>
				<?php 
				}
        		?>                
                <tr>
					<td>&nbsp;</td>
                    <td></td>
				</tr>                   
 		<tr>
        	<td colspan="2" >
     			<input type="submit" name="AddClient" value="Submit New Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />			
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