<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>
	<meta charset="utf-8">
	<title>DG Referral System </title>
	<link rel="stylesheet" type="text/css" href="Style.css">
</head>
<?php
	//Get Category and Zipcode from Post
	$vCat = $_POST['Category'];
	$vZip = $_POST['Zipcode'];

	//Include database connection details
	require_once('connection.php');
	
	$rsWhatz = mysqli_query($link,"SELECT Zipcode FROM rs_zipcodes WHERE ID_zipcode = $vZip");
	while($row = mysqli_fetch_array($rsWhatz)){
		$vWhatZ = $row['Zipcode'];
	}
	
	$rsWhatc = mysqli_query($link,"SELECT Category FROM rs_categories WHERE ID_category = $vCat");
	while($row = mysqli_fetch_array($rsWhatc)){
		$vWhatC = $row['Category'];
	}
	
	$rsRefs = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.rs_Status, rs_clients.BusCardName, rs_clients.BusCardPhone, rs_clients.BusCardTagLine, rs_clients.BusCardImage FROM rs_clients 
	JOIN rs_Clients_Categories On rs_Clients_Categories.ID_Client = rs_clients.ID_client
	JOIN rs_Clients_Zipcodes ON rs_Clients_Zipcodes.ID_Client = rs_clients.ID_Client
	WHERE rs_Clients_Categories.ID_category = $vCat AND rs_Clients_Zipcodes.ID_zipcode = $vZip AND rs_clients.rs_Status != 99
	ORDER BY rs_clients.rs_Status");
?>

<body>
<div class="container">
  <div class="header">
    <a href="#"><img src="" alt="Insert Logo Here" width="180" height="90" id="Insert_logo" style="background: #C6D580; display:block;" /></a>
  </div>
  <div class="sidebar1">
    <nav>
      <ul>
        <li><a href="#">Link one</a></li>
        <li><a href="#">Link two</a></li>
        <li><a href="#">Link three</a></li>
        <li><a href="#">Link four</a></li>
      </ul>
    </nav>
  <!-- end .sidebar1 --></div>
  <div class="tallcontent">
    <h1>Welcome to the Coeur d'Alene Area Referral System</h1>
    
      <h2>Your recommeded <i><?= $vWhatC ?></i> Providers for Zipcode: <?= $vWhatZ ?></h2>
      
<?php
	
	$vBCCtr = 1;
	while($row = mysqli_fetch_array($rsRefs))
  {
	switch($vBCCtr) {
		  case '1';
		  	If (!empty($row['ID_client'])) {
				$vID1 = $row['ID_client'];
				$vCard1 = 1;
				$vName1 = $row['BusCardName'];
				$vPhone1 = $row['BusCardPhone'];
				$vTagLine1 = $row['BusCardTagLine'];
				$vImage1 = $row['BusCardImage'];
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
				$vName2 = $row['BusCardName'];
				$vPhone2 = $row['BusCardPhone'];
				$vTagLine2 = $row['BusCardTagLine'];
			}
			Else {
				$vCard2 = 0;
			}
	  		break;
		case '3';
		  	If (!empty($row['ID_client'])) {
				$vID3 = $row['ID_client'];
				$vCard3 = 1;
				$vName3 = $row['BusCardName'];
				$vPhone3 = $row['BusCardPhone'];
				$vTagLine3 = $row['BusCardTagLine'];
			}
			Else {
				$vCard3 = 0;
			}
	  		break;
		case '4';
		  	If (!empty($row['ID_client'])) {
				$vID4 = $row['ID_client'];
				$vCard4 = 1;
				$vName4 = $row['BusCardName'];
				$vPhone4 = $row['BusCardPhone'];
				$vTagLine4 = $row['BusCardTagLine'];
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
	
	$vMessage = "<Center><h2>Sorry, the Rererral System currently does not have any Providers for the zipcode and category you choose.</h2></center> ";
}

If ($vCard1 != 1) {
	
	echo $vMessage;
}
Else
{
		If ($vCard1 == 1 And $vDoImage1 == "No") {
			//echo "Inside BCard1 regular";
			?>  
        <div class="BCcontent">
        	<div class="BCard1">
                 <h1><?= $vName1 ?></h1>                
                  <center> <?= $vPhone1 ?>  </center><br /><br />
                <h2><?= $vTagLine1 ?></h2>
    		</div>
            
 	<?php }
		  Else {
			    ?>
		<div class="BCcontent">
        	<div class="BCard1I">
            	<img width="282px" height="150px" src="<?= $vImageDisplay1 ?>" >
    		</div>

	<?php		  
		  }
		If ($vCard2 == 1) {
			?>    
            <div class="BCard2">
                <h1><?= $vName2 ?></h1>                
                  <center><?= $vPhone2 ?>  </center><br /><br />
                <h2><?= $vTagLine2 ?></h2>
            </div>
 	<?php }  
		If ($vCard3 == 1) {
			?>         
            <div class="BCard3">
                <h1><?= $vName3 ?></h1>                
                  <center><?= $vPhone3 ?>  </center><br /><br />
                <h2><?= $vTagLine3 ?></h2>
            </div>
 	<?php }  
		If ($vCard4 == 1) {
			?>           
            <div class="BCard4">
                 <h1><?= $vName4 ?></h1>                
                  <center><?= $vPhone4 ?> </center><br /><br />
                <h2><?= $vTagLine4 ?></h2>
            </div>
 	<?php } 
	
}
			?>     
            
    	</div>  <!--  End of BCContent  -->
        
        <?php
  			$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  			echo "<a href='$url'>Change Provider Selection Criteria</a>"; 
		?>           
 		<div class="banner" align="center" >
        </div>
  	<!-- end .content  --></div>
        <div class="footer">
        	<address>
          		Footer stuff
        	</address>
      <!-- end .footer  --></div>
  
  <!-- end .container  --></div>
  
</body>
</html>