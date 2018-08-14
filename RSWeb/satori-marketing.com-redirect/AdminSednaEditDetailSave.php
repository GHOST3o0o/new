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

$vID = $_GET['ID'];

require_once('connectionSedna.php');

$vSQLCliZip = "Select ID_zipcode from rs_Clients_Zipcodes Where ID_client = '".$vID."' Order by ID_zipcode";
$GetCliZip = mysqli_query($link, $vSQLCliZip);
$clizips = array();
	while($cz = mysqli_fetch_array($GetCliZip)) {
		$clizips[] = $cz['ID_zipcode'];
	}
	unset($cz);
	$clizipcount = count($clizips);
	
$vSQLCliCat = "Select ID_Category from rs_Clients_Categories Where ID_client = '".$vID."' Order by ID_Category";
$GetCliCat = mysqli_query($link, $vSQLCliCat);
$clicats = array();
	while($cc = mysqli_fetch_array($GetCliCat)) {
		$clicats[] = $cc['ID_Category'];
	}
	unset($cc);
	$clicatcount = count($clicats);

$vSQLCli = "Select ID_client, Name, rs_Status, BusCardImage, Contact, PhysicalZip, Phone, Email, Link, Address, City, State, Notes FROM rs_clients Where ID_client = '".$vID."'";

//echo $vSQLCli."<br />";

$GetCli = mysqli_query($link, $vSQLCli);
?>

<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>
 
  <div class="tallcontent">
    <h1>Coeur d'Alene Area Referral System Administration Program</h1>
    
     <h2>Edit Client Information for Client ID:  <?= $vID ?> </h2>
     <form action="AdminSednaEditDetailPost.php" name="EditClient" method="POST" >
   	 <?php  
   		while($row = mysqli_fetch_array($GetCli))
   			{
	?>
     <table width="90%" align="center">
    	<tr>
        	<td style="width:30%" >Name: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliName" value="<?= $row['Name']; ?>" > </td>
        </tr>
      	<tr>
        	<td style="width:30%" >Status: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliStatus" value="<?= $row['rs_Status']; ?>" > </td>
        </tr>
    	
        <tr>
        	<td style="width:30%" >Bus. Card Image: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliBusCardImage" value="<?= $row['BusCardImage']; ?>" > </td>
        </tr>
        <?php $vImageDisplay = "/Images/".$row['BusCardImage'];
			?>
        <tr>
        	<td style="width:30%" ></td>
            <td style="width:70%"><img width="423px" height="225px" src="<?= $vImageDisplay ?>" /> </td>
        </tr>
         <tr>
        	<td style="width:30%" >Website: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliLink" value="<?= $row['Link']; ?>" > (include "http://")</td>
        </tr>
        
        
        <tr>
        	<td style="width:30%" >Contact: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliContact" value="<?= $row['Contact']; ?>" > </td>
    	
    	<tr>
        	<td style="width:30%" >Phone: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="CliPhone" value="<?= $row['Phone']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Email: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliEmail" value="<?= $row['Email']; ?>" > </td>
        </tr>
               
    	<tr>
        	<td style="width:30%" >Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliAddress" value="<?= $row['Address']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliCity" value="<?= $row['City']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="CliState" value="<?= $row['State']; ?>" > </td>
        </tr> 
        <tr>
        	<td style="width:30%" >Physical Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliZip" value="<?= $row['PhysicalZip']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="CliNotes" ><?= $row['Notes']; ?> </textarea></td>
        </tr>
        </table>
        
       <?php
		}
			//Include database connection details
			require_once('connection.php');	
        
        	$vSQLZip = "Select ID_zipcode, Zipcode, ZipDescrip From rs_zipcodes Order by zipDescrip";
			$vSQLCat = "Select ID_category, Category From rs_categories Order by Category";

	   ?>
   <div class="ClDetLeft" style="width:500px" >     
        <table width="100%" align="left">
     	<tr>
        	<td style="width:100%" align="center" ><b>Zipcodes</b> </td>
        </tr>
 
		<?php	
			$vMaxZipID = 1;
			// set up an array with the zip code Ids that the client covers
			$rsZipList = mysqli_query($link, $vSQLZip);
			while($row = mysqli_fetch_array($rsZipList))
		 		{
				$selZip = " ";	
				$vZipID = $row['ID_zipcode'];
				$vZipDescrip = $row['Zipcode']."&nbsp;&nbsp;&nbsp;<small>".$row['ZipDescrip']."</small>";	
				$vZip = "Zip".$vZipID;
				If($vZipID > $vMaxZipID)
					{ $vMaxZipID = $vZipID;
					}
				foreach ($clizips as $value) { 
					If ($value == $row['ID_zipcode']) {
						$selZip = "checked";
					}
				}
				?>
                <tr>
                	<td align="left" ><input type="checkbox" name="<?= $vZip ?>" <?= $selZip ?> /> <?= $vZipDescrip ?> </td>
				</tr>
				<?php 
				}
				?>
                <tr>
					<td>&nbsp;</td>
                    <td></td>
				</tr>
           </table>
      </div>
      <div class="ClDetRight" style="width:400px" >
           <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Categories</b></td>

				</tr>
                <?php 
			$rsCatList = mysqli_query($link, $vSQLCat);	
			$vMaxCatID = 1;
			while($row = mysqli_fetch_array($rsCatList))
		 		{
				$selCat = " ";	
				$vCat = "Cat".$row['ID_category'];
				If($row['ID_category'] > $vMaxCatID)
					{ $vMaxCatID = $row['ID_category'];
					}
				foreach ($clicats as $cc) { 
					If ($cc == $row['ID_category']) {
						$selCat = "checked";
					}
				}				
				?>
                <tr>
 					<td align="left" ><input type="checkbox" name="<?= $vCat ?>" <?= $selCat ?> /> <?= $row['Category'] ?> </td>
				</tr>
				<?php 
				}
        		?>                
                <tr>
					<td>&nbsp;</td>
				</tr>                   
 		<table>
    </div>

	<input type="submit" name="EditClientDetail" value="Update Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    <input type="hidden" name="ID" value="<?= $vID ?>" >
    <input type="hidden" name="MaxZipID" value="<?= $vMaxZipID ?>" >
    <input type="hidden" name="MaxCatID" value="<?= $vMaxCatID ?>" >		
 </form>
 <br />
 <br />
 		<h2>Upload Business Card Image</h2>
        <br />
     <form action="upload_file.php" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="file" name="file" id="file"><br /><br />
    <input type="submit" name="submit" value="Submit">
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