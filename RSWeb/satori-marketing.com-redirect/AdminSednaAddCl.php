<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
    <?php
	require_once('auth.php');
	?>
<html>

<head>
	<meta charset="utf-8">
	<title>MyLABD System Administration Programs </title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>

<body>

<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>

  <div class="tallcontent">
    <h1>My Local Area Business Directory System Administration Program</h1>
    
     <h2>Add Clients to the system</h2>
      <form action="AdminSednaAddPostcl.php" name="AddClient" method="POST" >
     <table width="90%" align="center">
    	<tr>
        	<td style="width:30%" >Name: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliName" value" " > </td>
        </tr>
      	<tr>
        	<td style="width:30%" >Status: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliStatus" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Bus. Card Image: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliBusCardImage" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Website: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliLink" value" " ><br />(include "http://")</td>
        </tr>
        <tr>
        	<td style="width:30%" >Contact: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliContact" value" " > </td>
        </tr>  
    	<tr>
        	<td style="width:30%" >Phone: </td>
            <td style="width:70%"><input type="text" size="21" maxlength="20" name="CliPhone" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Email: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliEmail" value" " > </td>
        </tr>      
    	<tr>
        	<td style="width:30%" >Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliAddress" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliCity" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="CliState" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliZip" value" " > </td>
        </tr>       
        <tr>
        	<td style="width:30%" >Physical Address: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliPAddress" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Physical City: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="100" name="CliPCity" value" " > </td>
        </tr>
    	<tr>
        	<td style="width:30%" >Physical State: </td>
            <td style="width:70%"><input type="text" size="3" maxlength="2" name="CliPState" value" " > </td>
        </tr> 
        <tr>
        	<td style="width:30%" >Physical Zip: </td>
            <td style="width:70%"><input type="text" size="6" maxlength="5" name="CliPZip" value" " > </td>
        </tr>
        <tr>
        	<td style="width:30%" >Facebook: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliFacebook" value" " ><br />(include "http://")</td>
        </tr>
        <tr>
        	<td style="width:30%" >Twitter: </td>
            <td style="width:70%"><input type="text" size="101" maxlength="250" name="CliTwitter" value" " ><br />(include "http://")</td>
        </tr>                
        <tr>
        	<td style="width:30%">Pitch: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="CliPitch" ></textarea></td>
        </tr>
    	<tr>
        	<td style="width:30%">Notes: </td>
            <td style="width:70%"><textarea rows="5" cols="76" name="CliNotes" ></textarea></td>
        </tr>
 
        </table>
        
       <?php 
			//Include database connection details
			require_once('connection.php');	
        
        	$vSQLZip = "Select ID_zipcode, Zipcode, zipDescrip From rs_zipcodes Order by zipDescrip";
			$vSQLCat = "Select ID_category, Category From rs_categories Order by Category";
	   ?>
   <div class="ClDetLeft" style="width:500px">     
        <table width="90%" align="left">
     	<tr>
        	<td style="width:100%" align="center" ><b>Zipcodes</b> </td>

        </tr>
 
		<?php	
			$rsZipList = mysqli_query($link, $vSQLZip);

			$vMaxZipID = 1;
			while($row = mysqli_fetch_array($rsZipList))
		 		{
				$vZip = "Zip".$row['ID_zipcode'];
				If($row['ID_zipcode'] > $vMaxZipID)
					{ $vMaxZipID = $row['ID_zipcode'];
					}
				$vZipWithD = $row['Zipcode']."&nbsp;&nbsp;&nbsp;<small>".$row['zipDescrip']."</small>";		
				?>
                <tr>
                	<td align="Left" ><input type="checkbox" name="<?= $vZip ?>" /> <?= $vZipWithD ?> </td>
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
      <div class="ClDetRight" >
           <table width="90%" align="center">
				<tr>
					<td style="width:100%" align="left" ><b>Categories</b></td>

				</tr>
                <?php 
			$rsCatList = mysqli_query($link, $vSQLCat);	
			$vMaxCatID = 1;
			while($row = mysqli_fetch_array($rsCatList))
		 		{
				$vCat = "Cat".$row['ID_category'];
				If($row['ID_category'] > $vMaxCatID)
					{ $vMaxCatID = $row['ID_category'];
					}				
				?>
                <tr>
 					<td align="left" ><input type="checkbox" name="<?= $vCat ?>" /> <?= $row['Category'] ?> </td>
				</tr>
				<?php 
				}
        		?>                
                <tr>
					<td>&nbsp;</td>
				</tr>                   
 		<table>
    </div>

	<input type="submit" name="AddClient" value="Submit New Client"  />  <input type="button" value="Cancel" onClick="location.href='AdminSednaMenu.php'" />	
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