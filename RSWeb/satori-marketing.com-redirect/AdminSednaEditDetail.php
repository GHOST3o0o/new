<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
	?>
<html>
<head>

<meta charset="utf-8">
<title>DG Referral System Administration Programs </title>
<link rel="stylesheet" type="text/css" href="Style.css">

<link rel="stylesheet" type="text/css" href="tabview.css" />

<script type="text/javascript" src="tabview.js">

//Tab View script- By Ilya Lyubinskiy (http://www.php-development.ru)
//Script featured and available at JavaScriptKit.com (http://www.javascriptkit.com)

</script>

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

// Need to change below to handle discounts
$vSQLCliDis = "Select ID_discounts from rs_Clients_Discounts Where ID_client = '".$vID."' Order by ID_discounts";
$GetCliDis = mysqli_query($link, $vSQLCliDis);
$cliDiss = array();
	while($cd = mysqli_fetch_array($GetCliDis)) {
		$cliDiss[] = $cd['ID_discounts'];
	}
	unset($cd);
	$clidiscount = count($cliDiss);	

$vSQLCli = "Select ID_client, Name, rs_Status, startdate, enddate, BusCardImage, BCOrientation, Contact, Zip, Phone, Email, Link, Address, City, State, PhysicalAddress, PhysicalCity, PhysicalState, PhysicalZip, Facebook, Twitter, Pitch, Notes FROM rs_clients Where ID_client = '".$vID."'";

//echo $vSQLCli."<br />";

$GetCli = mysqli_query($link, $vSQLCli);

 		while($row = mysqli_fetch_array($GetCli))
   			{
?>

<div class="container">

 	<h1>Referral System Administration Program</h1>
	 <h2>Edit Client Information for Client ID:  <?= $vID ?>, <?= $row['Name']; ?> </h2> 
     
<div class="TabView" id="TabView">

<!-- *** Tabs ************************************************************** -->

<div class="Tabs" style="width: 1060px;">
  <a>General</a>
  <a>Zipcodes</a>
  <a>Categories</a>
  <a>Discounts</a>
  <a>Partners</a>
  <a>Uploads</a>
</div>

<!-- *** Pages ************************************************************* -->

<div class="Pages" style="width: 1060px; height: 1000px;">

  <div class="Page">
  <div class="Pad">

  <!-- *** General Start *** -->

     <form action="AdminSednaEditDetailPostGen.php" name="EditClient" method="POST" >

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
        	<td style="width:30%" >Start Date: </td>
            <td style="width:70%"><input type="text" size="10" maxlength="12" name="CliStartDate" value="<?= $row['startdate']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp; <small> yyyy-mm-dd </small></td>
        </tr>
        
        <tr>
        	<td style="width:30%" >End Date: </td>
            <td style="width:70%"><input type="text" size="10" maxlength="12" name="CliEndDate" value="<?= $row['enddate']; ?>" >&nbsp;&nbsp;&nbsp;&nbsp; <small>yyyy-mm-dd </small> </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Tag Line (Pitch): </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="CliPitch" ><?= $row['Pitch']; ?> </textarea> </td>
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
        	<td style="width:30%" >Bus. Card Orientation: </td>
            <td style="width:70%"><input type="text" size="5" maxlength="1" name="CliBCO" value="<?= $row['BCOrientation']; ?>" > (H or V)</td>
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
        	<td style="width:30%" >Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliZip" value="<?= $row['Zip']; ?>" > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Physical Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliPAddress" value="<?= $row['PhysicalAddress']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Physical City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliPCity" value="<?= $row['PhysicalCity']; ?>" > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Physical State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="CliPState" value="<?= $row['PhysicalState']; ?>" > </td>
        </tr> 
        <tr>
        	<td style="width:30%" >Physical Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliPZip" value="<?= $row['PhysicalZip']; ?>" > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Facebook: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliFacebook" value="<?= $row['Facebook']; ?>" > <br />(include "http://")</td>
        </tr>
        <tr>
        	<td style="width:30%" >Twitter: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliTwitter" value="<?= $row['Twitter']; ?>" ><br />(include "http://")</td>
        </tr>         
        
        
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="CliNotes" ><?= $row['Notes']; ?> </textarea></td>
        </tr>
        </table>
        
        <input type="submit" name="EditClientDetailGen" value="Update Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    
    	<input type="hidden" name="ID" value="<?= $vID ?>" >
   	
 </form>
	<?php
			}
	?>
  <!-- *** General End ***** -->

  </div>
  </div>

  <!-- *** Zipcodes Start *** -->

  <div class="Page">
  <div class="Pad">

         <?php
			//Include database connection details
			require_once('connection.php');	
        
        	$vSQLZip = "Select ID_zipcode, Zipcode, ZipDescrip From rs_zipcodes Order by zipDescrip";
			$vSQLCat = "Select ID_category, Category From rs_categories Order by Category";
			$vSQLDis = "Select ID_discounts, discount From rs_Discounts Order by discount";
	   ?>
   <div class="ClDetLeft" style="width:500px" >     
        <table width="100%" align="left" >
     	<tr>
        	<td style="width:100%" align="center" ><b>Zipcodes</b> </td>
        </tr>
 		<form action="AdminSednaEditDetailPostZip.php" name="EditClient" method="POST" >
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
					<td>&nbsp; 
        				<input type="submit" name="EditClientDetail" value="Update Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    					<input type="hidden" name="ID" value="<?= $vID ?>" >
                </form>
                    </td>
				</tr>
           </table>
      </div>

  <!-- *** Zipcodes End ***** -->

  </div>
  </div>

  <div class="Page">
  <div class="Pad">

  <!-- *** Categories Start *** -->

  <br />
      <div class="ClDetLeft" style="width:600px" >
           <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Categories</b></td>

				</tr>
                 <form action="AdminSednaEditDetailPostCat.php" name="EditClient" method="POST" >

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
					<td colspan="2">&nbsp; 
        				<input type="submit" name="EditClientDetail" value="Update Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    					<input type="hidden" name="ID" value="<?= $vID ?>" >
                 </form>        
                    </td>
				</tr>                   
 		</table>
    </div>

  <!-- *** Categories End ***** -->

  </div>
  </div>
  
  <div class="Page">
  <div class="Pad">

  <!-- *** Discounts Start *** -->

  <br />
		  <br />
      <div class="ClDetLeft" style="width:600px" >
           <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Discounts</b></td>

				</tr>
                 <form action="AdminSednaEditDetailPostDis.php" name="EditClient" method="POST" >

                <?php 
			$rsDisList = mysqli_query($link, $vSQLDis);	
			$vMaxDisID = 1;
			while($row = mysqli_fetch_array($rsDisList))
		 		{
				$selDis = " ";	
				$vDis = "Dis".$row['ID_discounts'];
				If($row['ID_discounts'] > $vMaxDisID)
					{ $vMaxDisID = $row['ID_discounts'];
					}
				foreach ($cliDiss as $cd) { 
					If ($cd == $row['ID_discounts']) {
						$selDis = "checked";
					}
				}				
				?>
                <tr>
 					<td align="left" ><input type="checkbox" name="<?= $vDis ?>" <?= $selDis ?> /> <?= $row['discount'] ?> </td>
				</tr>
				<?php 
				}
        		?>                
                <tr>
					<td colspan="2">&nbsp; 
        				<input type="submit" name="EditClientDetailDis" value="Update Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />
    					<input type="hidden" name="ID" value="<?= $vID ?>" >
                 </form>
                    </td>
				</tr>                   
 		</table>
    </div>
 

  <!-- *** Discounts End ***** -->

  </div>
  </div>

 <div class="Page">
  <div class="Pad">

  <!-- *** Partners Start *** -->

  <br />
		Partners stuff here
 

  <!-- *** Partners End ***** -->

  </div>
  </div>
  
   <div class="Page">
  <div class="Pad">

  <!-- *** Page6 Start *** -->
	  <br />  <br />
	 <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Upload Business Card Image</b></td>
				</tr>
                <tr>
                	<td>
  						<form action="upload_file.php" method="post" enctype="multipart/form-data">
    					<label for="file">Filename:</label>
    					<input type="file" name="file" id="file"><br /><br />
    				</td>
               <tr>
               		<td>
    					<input type="submit" name="submit" value="Submit">
    					</form>
    				</td>
               <tr>
                <td colspan="2">&nbsp; 
                    
                </td>
            </tr>                   
    </table>
    
    	  <br />  <br />
	 <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Upload Discount Icon Image</b></td>
				</tr>
                <tr>
                	<td>
  						<form action="upload_Iconfile.php" method="post" enctype="multipart/form-data">
    					<label for="file">Filename:</label>
    					<input type="file" name="file" id="file"><br /><br />
    				</td>
               <tr>
               		<td>
    					<input type="submit" name="submit" value="Submit">
    					</form>
    				</td>
               <tr>
                <td colspan="2">&nbsp; 
                    
                </td>
            </tr>                   
    </table>


  <!-- *** Page6 End ***** -->

  </div>
  </div>

</div>

</div>

</div>	<!-- container -->

<script type="text/javascript">

tabview_initialize('TabView');

</script>

</body>
</html>