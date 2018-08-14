<?php
	//Get Category and Zipcode from Post
	$vCat = $_POST['Category'];
	//$vZip = $_POST['Zipcode'];
	$vZip = $_POST['GetZip'];
	$match = preg_match("#[0-9]{5}#", $vZip);
	If ($match !== 1) {
		header('Location: http://www.satori-marketing.com/indexTestNW.php?msg=Please enter a valid Zip Code.');
		exit;
	}
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta charset="utf-8">
	<title>DG Referral System </title>
	<link rel="stylesheet" type="text/css" href="StyleDisplay.css">
</head>
<?php

	//Include database connection details
	require_once('connection.php');
	
	$rsWhatz = mysqli_query($link,"SELECT ID_zipcode, Zipcode FROM rs_zipcodes WHERE Zipcode = $vZip");
	//$rsWhatz - mysqli_query($link, "Call p_GetZipIDFromZip($vZip)");
	while($row = mysqli_fetch_array($rsWhatz)){
		$vWhatZ = $row['Zipcode'];
		$vZipID = $row['ID_zipcode'];
	}
	
	$rsWhatc = mysqli_query($link,"SELECT Category FROM rs_categories WHERE ID_category = $vCat");
	while($row = mysqli_fetch_array($rsWhatc)){
		$vWhatC = $row['Category'];
	}
	
	$rsRefs = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.rs_Status,  rs_clients.BusCardImage, rs_clients.Link FROM rs_clients 
	JOIN rs_Clients_Categories On rs_Clients_Categories.ID_Client = rs_clients.ID_client
	JOIN rs_Clients_Zipcodes ON rs_Clients_Zipcodes.ID_Client = rs_clients.ID_Client
	WHERE rs_Clients_Categories.ID_category = $vCat AND rs_Clients_Zipcodes.ID_zipcode = $vZipID AND rs_clients.rs_Status != 99
	ORDER BY rs_clients.rs_Status");
	
	$rsCard99 = mysqli_query($link,"SELECT rs_clients.Name, rs_clients.rs_Status, rs_clients.BusCardImage, rs_clients.Link FROM rs_clients WHERE rs_clients.rs_Status = 99");
	
?>

<body>
<div class="container">
<!--
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="40" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>
-->
  <div class="tallcontent">
    <h1>Welcome to your Local Area Referral Service</h1>
    
      <h2><font color="#FF0000"><?= $vWhatC ?></font> Service Providers for Zip Code <font color="#0000FF"><?= $vZip ?></font></h2>
<div class="ReturnButton" align="left">

<?php
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a href='$url'>Change Service Category and/or Zip Code</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small>Click on the Business card to view the Service Provider web site.</small>"; 
?> 
   
</div>        
<?php
	
	$vBCCtr = 1;
	while($row = mysqli_fetch_array($rsRefs))
  {
	switch($vBCCtr) {
		  case '1';
		  	If (!empty($row['ID_client'])) {
				$vID1 = $row['ID_client'];
				$vCard1 = 1;
				$vImage1 = $row['BusCardImage'];
				If (empty($row['Link'])) {
					$vLink1 = "Skip" ;
				}
				else {
					$vLink1 = $row['Link'];
				}
				If (strpos($vImage1,".") > 0 ) {
					$vDoImage1 = "Yes";
					$vImageDisplay1 = "/Images/".$vImage1;
					//echo $vDoImage1;
				}
				Else {
					$vDoImage1 = "No";
				}
			}
			Else {
				$vCard1 = 0;
			}
	  		break;
		case '2';
		  	If (!empty($row['ID_client'])) {
				$vID2 = $row['ID_client'];
				$vCard2 = 1;
				$vImage2 = $row['BusCardImage'];
				If (empty($row['Link'])) {
					$vLink2 = "Skip" ;
				}
				else {
					$vLink2 = $row['Link'];
				}
				If (strpos($vImage2,".") > 0 ) {
					$vDoImage2 = "Yes";
					$vImageDisplay2 = "/Images/".$vImage2;
					//echo $vDoImage2;
				}
				Else {
					$vDoImage2 = "No";
				}
				
			}
			Else {
				$vCard2 = 0;
			}
	  		break;
		case '3';
		  	If (!empty($row['ID_client'])) {
				$vID3 = $row['ID_client'];
				$vCard3 = 1;
				$vImage3 = $row['BusCardImage'];
				If (empty($row['Link'])) {
					$vLink3 = "Skip" ;
				}
				else {
					$vLink3 = $row['Link'];
				}
				If (strpos($vImage3,".") > 0 ) {
					$vDoImage3 = "Yes";
					$vImageDisplay3 = "/Images/".$vImage3;
					//echo $vDoImage3;
				}
				Else {
					$vDoImage3 = "No";
				}
				
			}
			Else {
				$vCard3 = 0;
			}
	  		break;
		case '4';
		  	If (!empty($row['ID_client'])) {
				$vID4 = $row['ID_client'];
				$vCard4 = 1;
				$vImage4 = $row['BusCardImage'];
				If (empty($row['Link'])) {
					$vLink4 = "Skip" ;
				}
				else {
					$vLink4 = $row['Link'];
				}
				If (strpos($vImage4,".") > 0 ) {
					$vDoImage4 = "Yes";
					$vImageDisplay4 = "/Images/".$vImage4;
					//echo $vDoImage4;
				}
				Else {
					$vDoImage4 = "No";
				}
				
			}
			Else {
				$vCard4 = 0;
			}
	  		break;		
	}
			
  //echo $row['ID_client'] . " " . $row['Name'];
  //echo "<br>";
  //}
  $vBCCtr = $vBCCtr + 1;
}
mysqli_close($link);
//  If vBCCtr is still 1 means that there were no records returned. 
If ($vBCCtr == 1)  {
	
	$vMessage = "<Center><h2>Sorry, the Referral Service currently does not have any Service Providers for the Service Category and Zip Code you selected.</h2></center>";
}

If ($vCard1 != 1) {
	
	echo $vMessage;
}
Else
{
		
	If ($vCard1 == 1) {
			    ?>
		<div class="BCcontent">
        	<div class="BCard1I">
            	<?php
					If ($vLink1 == "Skip") {
						?> 
            			<img width="423px" height="225px" src="<?= $vImageDisplay1 ?>" />
                        
                <?php
					}
					Else {
                ?>
                	<a href="<?= $vLink1 ?>" target="_blank" ><img width="423px" height="225px" src="<?= $vImageDisplay1 ?>" /></a>
                <?php
					}
				?>
    		</div>
	<?php		  
		  }
		  
		  If ($vCard2 == 1) {
			    ?>
        	<div class="BCard2I">
            	<?php
					If ($vLink2 == "Skip") {
						?> 
            			<img width="423px" height="225px" src="<?= $vImageDisplay2 ?>" />
                        
                <?php
					}
					Else {
                ?>
                	<a href="<?= $vLink2 ?>" target="_blank" ><img width="423px" height="225px" src="<?= $vImageDisplay2 ?>" /></a>
                <?php
					}
				?>
				
    		</div>

	<?php		  
		  }	  
		  If ($vCard3 == 1) {
			    ?>
        	<div class="BCard3I">
            	<?php
					If ($vLink3 == "Skip") {
						?> 
            			<img width="423px" height="225px" src="<?= $vImageDisplay3 ?>" />
                        
                <?php
					}
					Else {
                ?>
                	<a href="<?= $vLink3 ?>" target="_blank" ><img width="423px" height="225px" src="<?= $vImageDisplay3 ?>" /></a>
                <?php
					}
				?>
    		</div>
	<?php		  
		  }
		  	  
		  If ($vCard4 == 1) {
			    ?>
        	<div class="BCard4I">
            	<?php
					If ($vLink4 == "Skip") {
						?> 
            			<img width="423px" height="225px" src="<?= $vImageDisplay4 ?>" />
                        
                <?php
					}
					Else {
                ?>
                	<a href="<?= $vLink4 ?>" target="_blank" ><img width="423px" height="225px" src="<?= $vImageDisplay4 ?>" /></a>
                <?php
					}
				?>
    		</div>
	<?php		  
		  }	
}
			?>     
            
    	</div>  <!--  End of BCContent  -->
       
        <div class="ReturnButton" align="left" >
			<?php
                $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
                echo "<a href='$url'>Change Service Category and/or Zip Code</a>"; 
           ?>
        </div>
        <div class="Goldbar" > 
         <img src="Images/goldLine.jpg" width="940" height="6" /> 
        </div>
  		<div class="Card99" align="center" >
        <?php
			while($row = mysqli_fetch_array($rsCard99)){
			$vImage99 = $row['BusCardImage'];
			$vImageDisplay99 = "/Images/".$vImage99;
			$vLink99 = $row['Link'];
			If (empty($row['Link'])) {
					$vLink99 = "Skip" ;
				}
				else {
					$vLink99 = $row['Link'];
				}
			}
		?>
        	<br />
            <?php
           If ($vLink99 == "Skip") {
						?> 
            			<img style="border:outset #900; padding:10px 0px 10px 10px; background-color:#FFFFFF; " width="423px" height="225px" src="<?= $vImageDisplay99 ?>" >
                
                <?php
					}
			Else {
                ?>
                	<a href="<?= $vLink99 ?>" target="_blank" ><img style="border:outset #900; padding:10px 0px 10px 10px;background-color:#FFFFFF; " width="423px" height="225px" src="<?= $vImageDisplay99 ?>" ></a>
                <?php
					}
				?>
        	
        </div>
  	</div>  <!-- end .tallcontent  -->
        <div class="footer">
        	<address>
          		&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:info@satori-marketing.com" >Contact your Local Area Referral Service</a>
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>
  
</body>
</html>