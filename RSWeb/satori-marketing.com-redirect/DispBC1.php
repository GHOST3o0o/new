<?php
	//Get Category and Zipcode from Post
	$vPostOrGet = $_SERVER['REQUEST_METHOD'];
	If ($vPostOrGet == "POST") {
		$vMcat = $_POST['MCat'];
		//echo $vPostOrGet;
		//echo "<br />";
		$vCat = $_POST['Category'];
		//$vZip = $_POST['Zipcode'];
		$vZip = $_POST['GetZip'];
		// reGet the ip of user
		$ip_address = $_SERVER["REMOTE_ADDR"];		// user's IP address
		$match = preg_match("#[0-9]{5}#", $vZip);
			If ($match !== 1) {
				$Location = "Location: Select.php?msg=Please enter a valid Zip Code.&Mcat=".$vMcat;
				header($Location);
				exit;
			}
	}
	else {
		$vCat = $_GET['Cat'];
		$vZip = $_GET['Zip'];
		$vMcat = $_GET['Mcat'];
	}
	
	//Include database connection details
	require_once('connection.php');
	
	$rsWhatz = mysqli_query($link,"SELECT ID_zipcode, Zipcode FROM rs_zipcodes WHERE Zipcode = $vZip");
	//$rsWhatz - mysqli_query($link, "Call p_GetZipIDFromZip($vZip)");
	$numrows = mysqli_num_rows($rsWhatz);
	//echo $numrows;
	if ($numrows == 0) {
		$Location = "Location: Select.php?msg=There are no Providers for the Category and Zip Code you selected.&Mcat=".$vMcat;
		header($Location);
			exit;
		}
	
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
	<meta charset="utf-8">
	<title>My Local Area Business Directory </title>
        <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="text.css">
    <link rel="stylesheet" type="text/css" href="960_24_col.css">
    <link rel="stylesheet" type="text/css" href="StyleD.css" >

</head>
<?php

	while($row = mysqli_fetch_array($rsWhatz)){
		$vWhatZ = $row['Zipcode'];
		$vZipID = $row['ID_zipcode'];
	}
	
	$rsWhatc = mysqli_query($link,"SELECT Category FROM rs_categories WHERE ID_category = $vCat");
	while($row = mysqli_fetch_array($rsWhatc)){
		$vWhatC = $row['Category'];
	}
	
	$rsPutSelect = mysqli_query($link,"INSERT INTO rs_Activity (What, rs_Time, IP, Zip, Cat) VALUES ('Select', NOW(), '$ip_address', '$vZipID'  ,'$vCat')");
	
	$rsRefs = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.rs_Status, rs_clients.BusCardImage, rs_clients.Link FROM rs_clients 
	JOIN rs_Clients_Categories On rs_Clients_Categories.ID_Client = rs_clients.ID_client
	JOIN rs_Clients_Zipcodes ON rs_Clients_Zipcodes.ID_Client = rs_clients.ID_Client
	WHERE rs_Clients_Categories.ID_category = $vCat AND rs_Clients_Zipcodes.ID_zipcode = $vZipID AND rs_clients.rs_Status > 0 AND rs_clients.rs_Status < 96 AND (DATE(NOW()) > rs_clients.startdate AND DATE(NOW()) < rs_clients.enddate)
	ORDER BY rs_clients.rs_Status, rs_clients.Name");
	
	$rs90 = mysqli_query($link,"SELECT rs_clients.ID_client, rs_clients.Name, rs_clients.rs_Status, rs_clients.BusCardImage, rs_clients.Link FROM rs_clients WHERE rs_clients.rs_Status > 95 AND rs_clients.rs_Status < 100 AND (DATE(NOW()) > rs_clients.startdate AND DATE(NOW()) < rs_clients.enddate) ORDER BY rs_clients.rs_Status");
	
?>

<body>

<div class="container_24">
	<div class="grid_24" >
        <p> </p>
    </div>
    <div class="clear" ></div>
	<div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_22">
    	<h1>Welcome to My Local Area Business Directory</h1>
    </div>
    <div class="clear" ></div>
	<div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_20">
        <h2><font color="#FF0000"><?= $vWhatC ?></font> <font color="#0000FF">for Zip Code <?= $vZip ?></font></h2>
	</div>
    <div class="clear" ></div>
	<div class="grid_2" >
        <p> </p>
    </div>  
    <div class="grid_10">
        <div  class="breadcrumb" >&lt;&lt;<a href="indexTest.php" target="_self" > Home</a> | <a href="Select.php?MCat=<?= $vMcat ?>" target="_self" >Select Category & Zip Code</a>  </div>
    </div>
    <div class="clear" ></div>
  
    <div class="clear" ></div>
	<div class="grid_24">
    	 <p><center><h5>Click on the ad to view more information.</h5></center> </p>
    </div>
    <div class="clear" ></div>
      
<?php
	//if (mysqli_affected_rows($rsRef) > 0) {   // see if there are any cards at all
		
		while($row = mysqli_fetch_array($rsRefs)) {
			$V = "No";
 ?>		
		<div class="grid_2" >
        	&nbsp;	
    	</div>

            	<?php 
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vImageDisplay = $row['BusCardImage'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					if ($row['ID_client'] == 80) {
						$V = "Yes";
				?>
                	<div class="grid_2" >
                        &nbsp;	
                    </div>
                	<div class="grid_7" >
                	<div class="BCardV" >
						<a href="<?= $vLinkSingle ?>" target="_self" ><img height = "350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>
                    </div>
                     
				<?php 
					}
					else {
						$V = "No";	
				?>
                <div class="grid_9" >
                	<div class="BCard1I">
            			<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>
                </div>
               
                <?php
					}
				?>
     
	<!--   space between cards should be 90px  -->
     <div class="grid_2" >
     		<p> </p>  <!-- Space between cards  -->
     </div>   
            <?php
					$row = mysqli_fetch_array($rsRefs);
					if (!empty($row['ID_client'])) {
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					$vImageDisplay = $row['BusCardImage'];
            ?> 
            	<div class="grid_9" >
            		<div class="BCard1I">            		
                		<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>	
                </div>  
			<?php
					}  //  end of if there is a BC to display
			?>
		<div class="clear" ></div>
        <div class="grid_24" >
            	<p> </p>		<!-- space between rows of cards  -->
    	</div>
        <div class="clear" ></div>
        <?php			
		}  // end of while loop
	?>
         
    <div class="clear" ></div>   
	<div class="grid_2" >
        <p> </p>
    </div>
    <div class="grid_10">
        <div  class="breadcrumb" >&lt;&lt;<a href="indexTest.php" target="_self" > Home</a> | <a href="Select.php?MCat=<?= $vMcat ?>" target="_self" >Select Category & Zip Code</a>  </div>
    </div>
       
        <div class="clear" ></div> 
        <div class="grid_24">
        	<div class="Goldbar" > 
           		<img src="Images/goldLine.jpg" width="940" height="6" align="absmiddle" /> 
        	</div>
        </div>
        <div class="clear" ></div> 
        <div class="grid_24" >
        	<p> </p>
    	</div>
    <!--  start of cards for sponsors -->    
<?php
		while($row = mysqli_fetch_array($rs90)) {
			$V = "No";
 ?>		
		<div class="grid_2" >
        	&nbsp;	
    	</div>

            	<?php 
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vImageDisplay = $row['BusCardImage'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					
					if ($row['ID_client'] == 80) {
						$V = "Yes";
				?>
                	<div class="grid_2" >
                        &nbsp;	
                    </div>
                	<div class="grid_7" >
                	<div class="BCardV" >
						<a href="<?= $vLinkSingle ?>" target="_self" ><img height = "350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>
                    </div>
                     
				<?php 
					}
					else {
						$V = "No";	
				?>
                <div class="grid_9" >
                	<div class="BCard1I">
            			<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>
                </div>
               
                <?php
					}
				?>
     
	<!--   space between cards should be 90px  -->
     <div class="grid_2" >
     		<p> </p>  <!-- Space between cards  -->
     </div>   
            <?php
					$row = mysqli_fetch_array($rs90);
					if (!empty($row['ID_client'])) {
					$vLinkSingle = "DispBCSingle.php?ID=".$row['ID_client'];
					$vLinkSingle = $vLinkSingle."&Cat=".$vCat."&Zip=".$vZip."&Mcat=".$vMcat;
					$vImageDisplay = $row['BusCardImage'];
            ?> 
            	<div class="grid_9" >
            		<div class="BCard1I">            		
                		<a href="<?= $vLinkSingle ?>" target="_self" ><img width="350px" src="<?= $imgpath.$vImageDisplay ?>" /></a>
					</div>	
                </div>  
			<?php
					}  //  end of if there is a BC to display
			?>
		<div class="clear" ></div>
        <div class="grid_24" >
            	<p> </p>		<!-- space between rows of cards  -->
    	</div>
        <div class="clear" ></div>
        <?php			
		}  // end of while loop
	?> 
        <div class="clear" ></div> 
            <div class="grid_24" >
        <p> </p>
    </div>
    <div class="clear" ></div>  

	   <?php include_once("footer.php") ?>
  
  </div> <!-- end .container_24  -->
  
</body>
</html>